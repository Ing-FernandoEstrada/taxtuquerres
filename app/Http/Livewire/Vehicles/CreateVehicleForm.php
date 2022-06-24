<?php

namespace App\Http\Livewire\Vehicles;

use App\Contracts\ManagesVehicles;
use App\Models\{Brand,Category,Vehicle};
use Livewire\{Component, WithFileUploads};
use Illuminate\Http\UploadedFile;

class CreateVehicleForm extends Component
{
    use WithFileUploads;

    public bool $open = false;
    public array $data = ['number' => '', 'model' => '', 'plate' => '', 'quota' => '', 'category_id' => '', 'brand_id' => ''];
    public ?Vehicle $vehicle = null;
    public string $title = 'Create New User';
    public string $shortTitle = 'Create';
    protected $listeners = ['open','modal.closed' => 'close'];
    public ?UploadedFile $image;

    public function mount(?Vehicle $vehicle):void {
        $this->vehicle = $vehicle;
        if (!is_null($this->vehicle)) {
            $this->data = $vehicle->withoutRelations()->toArray();
            unset($this->data['brand_id']);
            unset($this->data['category_id']);
            $this->data['category'] = $vehicle->category_id;
            $this->data['brand'] = $vehicle->brand_id;
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

    public function close() {
        $this->reset();
    }

    public function getCategoriesProperty():string {
        return Category::optionsHTML();
    }

    public function save(ManagesVehicles $manager):void {
        if ($this->image) $this->vehicle->updateImage($this->image);
        $vehicle = $manager->save($this->data,$this->vehicle);
        if(!$vehicle) $this->emit('error');
        else {
            $this->emitTo('admin.vehicles.vehicles-list','render');
            $this->emit('saved');
        }
        $this->close();
    }
    public function render()
    {
        return view('livewire.vehicles.create-vehicle-form');
    }
}
