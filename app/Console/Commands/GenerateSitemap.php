<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Illuminate\Support\Facades\File;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap for the application';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating sitemap...');

        // Tentukan path absolut untuk sitemap
        $sitemapPath = '/home/success5/infrastruktur.sijunjung.go.id/public/sitemap.xml';

        // Generate sitemap
        SitemapGenerator::create('https://infrastruktur.sijunjung.go.id/')
            ->getSitemap()
            ->writeToFile($sitemapPath);

        // Pastikan file memiliki izin yang benar
        if (File::exists($sitemapPath)) {
            chmod($sitemapPath, 0644);
            $this->info('Sitemap generated successfully at ' . $sitemapPath);
        } else {
            $this->error('Failed to generate sitemap at ' . $sitemapPath);

            // Coba cari di mana file sitemap.xml dibuat
            $this->info('Searching for sitemap.xml file...');
            $this->call('exec', ['command' => 'find /home/success5 -name "sitemap.xml" -type f']);
        }
    }
}