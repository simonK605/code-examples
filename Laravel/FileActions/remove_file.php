<?php

namespace App\Actions\Common;

use Illuminate\Support\Facades\Storage;
use Lorisleiva\Actions\Concerns\AsAction;

class RemoveFile
{
    use AsAction;

    public function handle(string $photoPath): void
    {
        if (!empty($photoPath) && Storage::exists($photoPath)) {
            Storage::delete($photoPath);

            $mdPhotoPath = str_replace(".", '_md.', $photoPath);
            $smPhotoPath = str_replace(".", '_sm.', $photoPath);

            if (Storage::exists($mdPhotoPath)) {
                Storage::delete($mdPhotoPath);
            }
            if (Storage::exists($smPhotoPath)) {
                Storage::delete($smPhotoPath);
            }
        }
    }
}
