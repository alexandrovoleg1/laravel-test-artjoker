<?php

namespace App\Providers;

use App\Services\Concrete\CSVDownloaderService;
use App\Services\Concrete\StudentService;
use App\Services\Contract\IDownloader;
use Illuminate\Support\ServiceProvider;

class ExportServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->instance(IDownloader::class, new CSVDownloaderService(new StudentService()));
    }
}
