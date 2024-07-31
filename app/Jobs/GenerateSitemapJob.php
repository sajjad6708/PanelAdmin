<?php

namespace App\Jobs;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateSitemapJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $sitemap = Sitemap::create()
     ->add(Url::create('/home'))
     ->add(Url::create('/about'))
     ->add(Url::create('/contact'));

     $sitemap->writeToFile(public_path('sitemap.xml'));

    }
}
