<?php

namespace App\Providers;

use App\Contracts\FileUploaderContract;
use App\Utilities\FileUploader\FileUploaderService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class FileUploaderProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register file uploader services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            FileUploaderContract::class,
            function ($app) {
                return new FileUploaderService(config('uploader'));
            }
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [FileUploaderService::class];
    }
}
