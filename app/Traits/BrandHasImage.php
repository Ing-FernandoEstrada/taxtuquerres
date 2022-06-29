<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait BrandHasImage
{
    /**
     * Update the brand's image.
     *
     * @param  \Illuminate\Http\UploadedFile  $image
     * @return void
     */
    public function updateImage(UploadedFile $image)
    {
        tap($this->image_path, function ($previous) use ($image) {
            $this->forceFill(['image_path' => $image->storePublicly('brand-images', ['disk' => $this->brandImageDisk()]),])->save();
            if ($previous) Storage::disk($this->brandImageDisk())->delete($previous);
        });
    }

    /**
     * Delete the brand's image.
     *
     * @return void
     */
    public function deletebrandImage()
    {
        if (is_null($this->image_path)) {
            return;
        }

        Storage::disk($this->brandImageDisk())->delete($this->image_path);

        $this->forceFill([
            'image_path' => null,
        ])->save();
    }

    /**
     * Get the URL to the user's brand image.
     *
     * @return string
     */
    public function getImageUrlAttribute()
    {
        return $this->image_path
            ? Storage::disk($this->brandImageDisk())->url($this->image_path)
            : $this->defaultBrandImageUrl();
    }

    /**
     * Get the default brand image URL if no brand image has been uploaded.
     *
     * @return string
     */
    protected function defaultBrandImageUrl()
    {
        return asset('/storage/img/gallery.png');
    }

    /**
     * Get the disk that brand images should be stored on.
     *
     * @return string
     */
    protected function brandImageDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : config('jetstream.image_disk', 'public');
    }
}
