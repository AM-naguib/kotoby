<?php

namespace App\Jobs;

use App\Models\Book;
use App\Models\Author;
use App\Models\Section;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Log;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\BrowserKit\HttpBrowser;

class KutubypdfJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $url;
    public function __construct($link)
    {
        $this->url = $link;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $data = $this->getDate($this->url);
        $data["image_url"] = $this->fileSave($data["image_url"], "uploads");

        $data["pdf_url"] = $this->fileSave($data["pdf_url"], "files");


        $this->addPost($data);


    }


    public function getDate($url)
    {
        $client = new HttpBrowser(HttpClient::create());

        $crawler = $client->request('GET', $url);

        if ($client->getResponse()->getStatusCode() !== 200) {
            return false;
        }


        $data = [
            "title" => $this->getValue($crawler->filter(' div > div > div.row.mx-3 > div.display-7.fw-bold.lh-lg.px-3.col-sm-9 > div:nth-child(1) > span')->text('Not found')),
            "description" => $crawler->filter(' div > div > div.container.mt-3 > p:nth-child(1)')->text('Not found'),
            "author" => $this->getValue($crawler->filter(' div > div > div.row.mx-3 > div.display-7.fw-bold.lh-lg.px-3.col-sm-9 > div:nth-child(2) > span')->text('Not found')),
            "section" => $this->getValue($crawler->filter(' div > div > div.row.mx-3 > div.display-7.fw-bold.lh-lg.px-3.col-sm-9 > div:nth-child(3) > span')->text('Not found')),
            "lang" => $this->getValue($crawler->filter(' div > div > div.row.mx-3 > div.display-7.fw-bold.lh-lg.px-3.col-sm-9 > div:nth-child(4) > span')->text('Not found')),
            "no_pages" => $crawler->filter('.body-info')->eq(3)->text('220'),
            "size" => $this->getValue($crawler->filter(' div > div > div.row.mx-3 > div.display-7.fw-bold.lh-lg.px-3.col-sm-9 > div:nth-child(5) > span')->text('Not found')),
            "image_url" => $crawler->filter(' div > div > div.row.mx-3 > div.px-0.col-sm-3 > img')->count()
                ? $crawler->filter(' div > div > div.row.mx-3 > div.px-0.col-sm-3 > img')->attr('src')
                : "",
        ];


        $dowenloadUrl = "https://www.kutubypdf.com" . $crawler->filter('div > div > div:nth-child(5) > a')->attr('href');

        $crawler = $client->request('GET', $dowenloadUrl);

        if ($client->getResponse()->getStatusCode() !== 200) {
            return false;
        }
        $data["pdf_url"] = $crawler->filter(' div:nth-child(8) > a')->attr('href');

        return $data;
    }


    public function addPost($data)
    {

        $book = Book::where('title', $data["title"])->first();
        if (!$book) {
            if ($data["author"] != "Not found") {
                $author = Author::firstOrCreate(['name' => $data["author"], 'slug' => Str::slug($data["author"])]);
            }
            if ($data["section"] != "Not found") {
                $section = Section::firstOrCreate(['name' => $data["section"], 'slug' => Str::slug($data["section"])]);
            }

            Book::create([
                "title" => $data["title"],
                "section_id" => $section->id ?? null,
                "author_id" => $author->id ?? null,
                "slug" => Str::slug($data["title"]),
                "image_url" => $data["image_url"] ?? null,
                "description" => $data["description"] ?? null,
                "no_pages" => $data["no_pages"] ?? null,
                "lang" => $data["lang"] ?? null,
                "size" => $data["size"] ?? null,
                "pdf_url" => $data["pdf_url"] ?? null,
            ]);
            Log::info("Book added: " . $data["title"]);

        } else {
            Log::info("Book already exists: " . $data["title"]);

        }


    }

    public function fileSave($url, $path)
    {
        $fileContents = file_get_contents($url);
        $fileName = hexdec(uniqid('')) . '.' . pathinfo($url, PATHINFO_EXTENSION);
        Storage::put("public/$path/" . $fileName, $fileContents);
        return "$path/" . $fileName;
    }
    function getValue($text) {
        $parts = explode(":", $text);
        return isset($parts[1]) ? trim($parts[1]) : 'Not found';
    }

}
