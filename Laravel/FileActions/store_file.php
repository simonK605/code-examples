<?php

namespace App\Actions\Common;

use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class StoreFile
{
    use AsAction;

    public function handle(string $dirName, UploadedFile $file = null): string | null
    {
        // check is file image
        // if yes save also md, sm sizes
        if (! $file) {
            return null;
        }

        $filePath = $file->store($dirName);
        $ext = $file->clientExtension();

        if (in_array($ext, ['png', 'jpg', 'jpeg'])) {
            $this->imageResize($ext, $filePath,'_md.', 110, 110, $file);
            $this->imageResize($ext, $filePath,'_sm.', 55, 55, $file);
        }

        return $filePath;
    }

    /**
     * @param string $ext
     * @param string $filePath
     * @param string $size
     * @param int $width
     * @param int $height
     * @param UploadedFile $file
     * @return void
     */
    public function imageResize(string $ext, string $filePath, string $size, int $width, int $height, UploadedFile $file): void
    {
        $filePathSize = str_replace("." . $ext,$size . $ext, $filePath);

        $img = Image::make($file->getRealPath());
        $img->resize($width, $height, function ($const) {
            $const->aspectRatio();
        })->save(storage_path('app/public/' . $filePathSize));;
    }
}
