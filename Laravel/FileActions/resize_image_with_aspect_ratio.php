<?php

class ImageController {

    /**
     * Change image sizes
     */
    public function changeImageSizes()
    {
        $images = Image::all();

        foreach ($images as $image) {
            $fileName = $image->stored_name . '.' . $image->extension;
            $savedDocument = Document::getStorage()->get(Document::STORAGE_DIR . '/' . $fileName);
            $content = imagecreatefromstring($savedDocument);
            $max = 2048;
            $width = imagesx($content);
            $height = imagesy($content);

            if ($width > $max || $height > $max) {
                $aspectRatio = $width / $height;
                if ($aspectRatio >= 1) {
                    $newWidth = $max;
                    $newHeight = $max / $aspectRatio;
                } else {
                    $newWidth = $max * $aspectRatio;
                    $newHeight = $max;
                }

                $resizedImg = \Intervention\Image\Facades\Image::make($savedDocument)->resize($newWidth, $newHeight)->stream();
                Document::getStorage()->put(Document::STORAGE_DIR . '/' . $fileName, $resizedImg);
            }
        }

        dd('all images resized');
    }
}