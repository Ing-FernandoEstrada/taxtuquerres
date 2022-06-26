<?php

namespace App\Http\Livewire\Vehicles;

use App\Contracts\ManagesVehicles;
use App\Models\{Brand,Category,Vehicle};
use Livewire\{Component, WithFileUploads};
use Illuminate\Http\Testing\MimeType;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CreateVehicleForm extends Component
{
    use WithFileUploads;

    public bool $open = false;
    public array $data = ['number' => '', 'model' => '', 'plate' => '', 'quota' => '', 'category_id' => '', 'brand_id' => ''];
    public ?Vehicle $vehicle = null;
    public string $title = 'Create New User';
    public string $shortTitle = 'Create';
    protected $listeners = ['open','imageCropped'];
    public $image = null;
    public $imageUrl = '/storage/img/car.png';
    public $urlImageCropped = null;

    public function mount(?Vehicle $vehicle):void {
        $this->vehicle = $vehicle;
        if (!is_null($this->vehicle)) {
            $this->data = $vehicle->withoutRelations()->toArray();
            $this->imageUrl = $vehicle->image_url;
            unset($this->data['brand_id']);
            unset($this->data['category_id']);
            $this->data['category'] = $vehicle->category_id;
            $this->data['brand'] = $vehicle->brand_id;
            $this->title = 'Update vehicle information';
            $this->shortTitle = 'Update';
        } else $this->vehicle = new Vehicle();
        $this->title = __($this->title);
        $this->shortTitle = __($this->shortTitle);
    }

    public function getBrandsProperty(): string {
        return Brand::optionsHTML();
    }

    public function open($vehicle = null):void {
        if(is_numeric($vehicle)) $vehicle = Vehicle::find($vehicle);
        $this->open = true;
        $this->mount($vehicle);
    }

    public function updatedOpen():void {
        if (!$this->open) $this->close();
    }

    public function updatedImage() {
        $this->emitTo('vehicles.modal-cropper','open',['transmitter' => 'vehicles.create-vehicle-form','url' =>$this->image->temporaryUrl()]);
    }

    public function imageCropped(array $data) {
        $this->imageUrl = $data['preview'];
        $this->urlImageCropped = $data['localUrl'];
    }

    public function getCategoriesProperty():string {
        return Category::optionsHTML();
    }

    public function save(ManagesVehicles $manager):void {
        $vehicle = $manager->save($this->data,$this->urlImageCropped, $this->vehicle);
        if(!$vehicle) $this->emit('error');
        else $this->emit('success-vehicle');
    }

    public function render()
    {
        return view('livewire.vehicles.create-vehicle-form');
    }
}
