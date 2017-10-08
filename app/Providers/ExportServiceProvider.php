<?php

namespace App\Providers;

use App\Services\Concrete\GeneratorUsersCSVFileService;
use App\Services\Concrete\StudentService;
use App\Services\Contract\IGeneratorCSVFile;
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
        $this->app->instance(IGeneratorCSVFile::class, new GeneratorUsersCSVFileService(new StudentService()));
    }
}
