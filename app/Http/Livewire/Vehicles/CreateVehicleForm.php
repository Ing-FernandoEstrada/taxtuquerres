<?php

namespace App\Http\Livewire\Vehicles;

use App\Contracts\ManagesVehicles;
use App\Models\{Brand,Category,Vehicle};
use Livewire\{Component, WithFileUploads};
use Illuminate\View\View;

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

    public function mount():void {
        if (!is_null($this->vehicle)) {
            $this->data = $this->vehicle->withoutRelations()->toArray();
            $this->imageUrl = $this->vehicle->image_url;
            unset($this->data['brand_id']);
            unset($this->data['category_id']);
            $this->data['category'] = $this->vehicle->category_id;
            $this->data['brand'] = $this->vehicle->brand_id;
            $this->title = 'Update vehicle information';
            $this->shortTitle = 'Update';
        }
        $this->title = __($this->title);
        $this->shortTitle = __($this->shortTitle);
    }

    public function getBrandsProperty(): string {
        return Brand::optionsHTML();
    }

    public function open($vehicle = null):void {
        if(is_numeric($vehicle)) $this->vehicle = Vehicle::find($vehicle);
        $this->open = true;
        $this->mount();
    }

    public function updatedOpen():void {
        if (!$this->open) $this->close();
    }

    public function updatedImage() {
        $this->emitTo('modal-cropper','open',['transmitter' => 'vehicles.create-vehicle-form','url' => $this->image->temporaryUrl()]);
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
        if($vehicle) {
            $this->emit('saved');
            $this->dispatchBrowserEvent('back');
        } else $this->emit('error');
    }

    public function render():View {
        return view('livewire.vehicles.create-vehicle-form');
    }
}
