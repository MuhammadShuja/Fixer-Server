<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\SitemapGenerator;

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
    protected $description = 'Generate the description';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        SitemapGenerator::create(config('app.url'))
            ->hasCrawled(function(Url $url){
                if ($url->segment(1) === "admin"){
                    return;
                }
                else if($url->segment(1) === "storage"){
                    return;
                }

                if(strpos($url->url, '?') !== false){
                    return;
                }

                return $url;
            })
            ->writeToFile('sitemap.xml');
    }
}
