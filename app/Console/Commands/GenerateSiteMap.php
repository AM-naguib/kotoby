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
        // عدد السجلات في كل ملف
        $chunkSize = 1000;

        // مصفوفات لتخزين مسارات ملفات السايت ماب
        $sectionSitemapFiles = [];
        $bookSitemapFiles = [];
        $authorSitemapFiles = [];
        $keywordSitemapFiles = [];
        if (!file_exists(public_path('sitemaps'))) {
            mkdir(public_path('sitemaps'), 0777, true); // إنشاء المجلد مع صلاحيات 0777
        }

        // إنشاء ملفات سايت ماب للأقسام
        Section::chunk($chunkSize, function ($sections, $page) use (&$sectionSitemapFiles) {
            $sectionSitemap = Sitemap::create();
            foreach ($sections as $section) {
                $sectionSitemap->add(url('/page/section/' . $section->slug));
            }
            $sitemapFilePath = public_path('sitemaps/sitemap_sections_page_' . $page . '.xml');
            $sectionSitemap->writeToFile($sitemapFilePath);
            $sectionSitemapFiles[] = url('/sitemaps/sitemap_sections_page_' . $page . '.xml');
        });

        Book::chunk($chunkSize, function ($books, $page) use (&$bookSitemapFiles) {
            $bookSitemap = Sitemap::create();
            foreach ($books as $book) {
                $bookSitemap->add(
                    Url::create(url('/book/' . $book->slug))
                        ->setLastModificationDate(Carbon::create($book->updated_at))
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                        ->setPriority(1)
                );
            }
            $sitemapFilePath = public_path('sitemaps/sitemap_books_page_' . $page . '.xml');
            $bookSitemap->writeToFile($sitemapFilePath);
            $bookSitemapFiles[] = url('/sitemaps/sitemap_books_page_' . $page . '.xml');
        });

        Author::chunk($chunkSize, function ($authors, $page) use (&$authorSitemapFiles) {
            $authorSitemap = Sitemap::create();
            foreach ($authors as $author) {
                $authorSitemap->add(url('/page/author/' . $author->slug));
            }
            $sitemapFilePath = public_path('sitemaps/sitemap_authors_page_' . $page . '.xml');
            $authorSitemap->writeToFile($sitemapFilePath);
            $authorSitemapFiles[] = url('/sitemaps/sitemap_authors_page_' . $page . '.xml');
        });



        // إنشاء ملف سايت ماب إندكس
        $mainSitemap = Sitemap::create();

        foreach (array_merge($sectionSitemapFiles, $bookSitemapFiles, $authorSitemapFiles, $keywordSitemapFiles) as $file) {
            $mainSitemap->add($file);
        }

        $mainSitemap->writeToFile(public_path('sitemap.xml'));

        // تسجيل عملية إنشاء السايت ماب
        Log::info("Sitemap generated successfully at " . date('Y-m-d H:i:s'));
    }
}
