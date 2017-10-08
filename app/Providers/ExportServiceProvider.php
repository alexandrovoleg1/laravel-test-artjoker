<?php

namespace App\Providers;

use App\Services\Concrete\CSVGeneratorFileService;
use App\Services\Concrete\StudentService;
use App\Services\Contract\IGeneratorFile;
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
        $this->app->instance(IGeneratorFile::class, new CSVGeneratorFileService(new StudentService()));
    }
}
