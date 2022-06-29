<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait VehicleHasImage
{
    /**
     * Update the vehicle's image.
     *
     * @param  \Illuminate\Http\UploadedFile  $image
     * @return void
     */
    public function updateImage(UploadedFile $image)
    {
        tap($this->image_path, function ($previous) use ($image) {
            $this->forceFill(['image_path' => $image->storePublicly('vehicle-images', ['disk' => $this->vehicleImageDisk()]),])->save();
            if ($previous) Storage::disk($this->vehicleImageDisk())->delete($previous);
        });
    }

    /**
     * Delete the vehicle's image.
     *
     * @return void
     */
    public function deleteVehicleImage()
    {
        if (is_null($this->image_path)) {
            return;
        }

        Storage::disk($this->vehicleImageDisk())->delete($this->image_path);

        $this->forceFill([
            'image_path' => null,
        ])->save();
    }

    /**
     * Get the URL to the user's vehicle image.
     *
     * @return string
     */
    public function getImageUrlAttribute()
    {
        return $this->image_path
            ? Storage::disk($this->vehicleImageDisk())->url($this->image_path)
            : $this->defaultVehicleImageUrl();
    }

    /**
     * Get the default vehicle image URL if no vehicle image has been uploaded.
     *
     * @return string
     */
    protected function defaultVehicleImageUrl()
    {
        return asset('/storage/img/car.png');
    }

    /**
     * Get the disk that vehicle images should be stored on.
     *
     * @return string
     */
    protected function vehicleImageDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : config('jetstream.image_disk', 'public');
    }
}
