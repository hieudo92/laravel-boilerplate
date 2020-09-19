<?php

namespace App\Utilities\FileUploader;

use App\Contracts\FileUploaderContract;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class FileUploaderService implements FileUploaderContract
{

    public $config;

    public function __construct($_config)
    {
        $this->config = $_config;
    }

    /**
     * @inheritDoc
     */
    public function upload($path, $file)
    {
        return Storage::putFile($path, $file, 'public');
    }

    /**
     * @inheritDoc
     */
    public function exists($path)
    {
        return Storage::exists($path);
    }

    /**
     * @inheritDoc
     */
    public function delete($paths = [])
    {
        if (!empty($paths)) {
            $existPaths = collect($paths)->filter(
                function ($path) {
                    return $this->exists($path);
                }
            )->values()->toArray();

            if (!empty($existPaths)) {
                Storage::delete($existPaths);
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function copy($originalPath, $targetPath)
    {
        return Storage::copy($originalPath, $targetPath);
    }

    /**
     * @inheritDoc
     */
    public function store($path, $file)
    {
        return Storage::put($path, $file, 'public');
    }

    /**
     * @inheritDoc
     */
    function resize($file, $targetWidth, $targetHeight)
    {
        $image = Image::make($file);
        $originalHeight = $image->height();
        $originalWidth = $image->width();
        if ($originalHeight < $originalWidth) {
            $resizeWidth = $targetHeight * $originalWidth / $originalHeight;
            $image->resize($resizeWidth, $targetHeight);
        } else {
            $resizeHeight = $targetWidth * $originalHeight / $originalWidth;
            $image->resize($targetWidth, $resizeHeight);
        }
        return $image->stream();
    }
}
