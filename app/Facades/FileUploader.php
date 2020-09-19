<?php

namespace App\Facades;

use App\Contracts\FileUploaderContract;
use Illuminate\Support\Facades\Facade;

class FileUploader extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return FileUploaderContract::class;
    }
}
