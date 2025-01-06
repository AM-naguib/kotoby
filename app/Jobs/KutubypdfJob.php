<?php

namespace App\Jobs;

use Log;
use App\Models\Book;
use App\Models\Author;
use App\Models\Keyword;
use App\Models\Section;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
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
        if (getSetting()->save_local == 1) {
            $data["pdf_url"] = $this->fileSave($data["pdf_url"], "uploads");
        }


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



        $dowenloadId = $crawler->filter('div > div > div:nth-child(5) > a')->attr('href');

        $dowenloadId = explode("?", $dowenloadId)[1];

        $dowenloadUrl = "https://pdfkutub.co/d1.php?id=" . $dowenloadId;


        Log::info($dowenloadUrl);

        $crawler = $client->request('GET', $dowenloadUrl);

        if ($client->getResponse()->getStatusCode() !== 200) {
            return false;
        }
        $data["pdf_url"] = $crawler->filter(' body > main > button > a')->attr('href');

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

            $book = Book::create([
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
            $this->addCustomKeywords($book);
            Log::info("Book added: " . $data["title"]);

        } else {
            Log::info("Book already exists: " . $data["title"]);

        }


    }

    public function fileSave($url, $path)
    {
        $fileName = hexdec(uniqid('')) . '.' . pathinfo($url, PATHINFO_EXTENSION);
        $filePath = "public/$path/" . $fileName;

        $stream = fopen($url, 'r');
        if ($stream) {
            Storage::put($filePath, $stream);
            fclose($stream);
        } else {
            Log::info("Unable to open URL stream.");
        }

        return "$path/" . $fileName;
    }

    function getValue($text)
    {
        $parts = explode(":", $text);
        return isset($parts[1]) ? trim($parts[1]) : 'Not found';
    }
    public function addCustomKeywords($book)
    {
        $author = $book->author->name ?? "";
        $titles = [
            "تحميل $book->title pdf",
            "رواية $book->title pdf",
            "تنزيل $book->title مجانا",
            "$book->title pdf",
            "$book->title $author",
            "رواية $book->title ل$author",
            "$book->title $author pdf"
        ];
        foreach ($titles as $title) {
            Keyword::create([
                "name" => $title,
                "slug" => Str::slug($title),
                "book_id" => $book->id
            ]);
        }
        return true;
    }

}
