<?php

namespace App\Console\Commands;

use Log;
use App\Jobs\KutubypdfJob;
use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\BrowserKit\HttpBrowser;

class GetOldBooksCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'old:books';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = new HttpBrowser(HttpClient::create());

        // get number of pages
        $url = "https://www.kutubypdf.com/";
        $crawler = $client->request('GET', $url);
        $noPages = $crawler->filter("#primary > div > nav > div > a:nth-child(4)")->text();
        $noPages = str_replace("٬", "", $noPages);



        for ($i = 2; $i <= $noPages; $i++) {
            $url = "https://www.kutubypdf.com/page/" . $i;
            $crawler = $client->request('GET', $url);

            if ($client->getResponse()->getStatusCode() !== 200) {
                Log::error("Failed to load page: " . $url);
                continue;
            }

            $crawler->filter('#main > div > div > div > div > a')->each(function (Crawler $node) {
                KutubypdfJob::dispatch($node->attr('href'));
                Log::info($node->attr('href'));
            });
        }
    }
}
