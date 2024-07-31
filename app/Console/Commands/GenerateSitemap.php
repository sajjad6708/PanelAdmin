<?php

namespace App\Console\Commands;

use App\Jobs\GenerateSitemapJob;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap for the website';
    /**
     * Execute the console command.
     */


    public function __construct()
    {
        parent::__construct();
    }
    public function handle()
    {
        GenerateSitemapJob::dispatch() ;
        $this->info('Sitemap generation job dispatched.');
    }


}
