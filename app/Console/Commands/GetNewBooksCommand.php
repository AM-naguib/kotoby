<?php

namespace App\Console\Commands;

use App\Jobs\KutubypdfJob;
use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\BrowserKit\HttpBrowser;

class GetNewBooksCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getnew:books';

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

        $url = "https://www.kutubypdf.com/";

        $crawler = $client->request('GET', $url);

        $urls = [];

        $crawler->filter('#main > div > div > div > div > a')->each(function (Crawler $node) use (&$urls) {
            $urls[] = $node->attr('href');
        });

        foreach ($urls as $url) {
            KutubypdfJob::dispatch($url);
        }

    }
}
