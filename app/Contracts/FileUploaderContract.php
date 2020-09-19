<?php

namespace App\Contracts;

interface FileUploaderContract {
    /**
     * Automatic Streaming
     *
     * @param $path
     * @param $file
     * @return mixed
     */
    public function upload($path, $file);

    /**
     * Check exists
     *
     * @param $path
     * @return mixed
     */
    public function exists($path);

    /**
     * Delete file
     *
     * @param array $paths
     * @return mixed
     */
    public function delete($paths = []);

    /**
     * Copy file from original path to the target path
     *
     * @param $originalPath
     * @param $targetPath
     * @return mixed
     */
    public function copy($originalPath, $targetPath);

    /**
     * Store a file into a path
     *
     * @param $path
     * @param $file
     * @return mixed
     */
    public function store($path, $file);

    /**
     * Resize an streaming file
     *
     * @param $file
     * @param $targetWidth
     * @param $targetHeight
     * @return mixed
     */
    function resize($file, $targetWidth, $targetHeight);
}
