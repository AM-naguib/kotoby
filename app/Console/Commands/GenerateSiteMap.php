<?php

namespace App\Console\Commands;

use Log;
use Carbon\Carbon;
use App\Models\Book;
use App\Models\Author;
use App\Models\Keyword;
use App\Models\Section;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Console\Command;

class GenerateSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:sitemap';

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
        $sectionSitemap = Sitemap::create();
        Section::chunk(100, function ($sections) use ($sectionSitemap) {
            foreach ($sections as $section) {
                $sectionSitemap->add(url('/section/' . $section->slug));
            }
        });
        $sectionSitemap->writeToFile(public_path('sitemap_sections.xml'));


        $bookSitemap = Sitemap::create();
        Book::chunk(100, function ($books) use ($bookSitemap) {
            foreach ($books as $book) {
                $bookSitemap->add(
                    Url::create(url('/book/' . $book->slug))
                        ->setLastModificationDate(Carbon::create($book->updated_at))
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                        ->setPriority(1)

                );
            }
        });
        $bookSitemap->writeToFile(public_path('sitemap_books.xml'));


        $authorSitemap = Sitemap::create();
        Author::chunk(100, function ($authors) use ($authorSitemap) {
            foreach ($authors as $author) {
                $authorSitemap->add(url('/author/' . $author->slug));
            }
        });
        $authorSitemap->writeToFile(public_path('sitemap_authors.xml'));

        $keywordSitemap = Sitemap::create();
        Keyword::chunk(100, function ($keywords) use ($keywordSitemap) {
            foreach ($keywords as $keyword) {
                $keywordSitemap->add(url('/keyword/' . $keyword->slug));
            }
        });
        $keywordSitemap->writeToFile(public_path('sitemap_keywords.xml'));

        $mainSitemap = Sitemap::create();
        $mainSitemap->add(url('/sitemap_sections.xml'));
        $mainSitemap->add(url('/sitemap_books.xml'));
        $mainSitemap->add(url('/sitemap_authors.xml'));
        $mainSitemap->add(url('/sitemap_keywords.xml'));
        $mainSitemap->writeToFile(public_path('sitemap.xml'));

        Log::info("Sitemap generated" . date('Y-m-d H:i:s'));
    }
}
