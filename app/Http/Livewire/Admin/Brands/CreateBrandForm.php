<?php

namespace App\Http\Livewire\Admin\Brands;

use App\Contracts\ManagesBrands;
use App\Contracts\ManagesVehicles;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Vehicle;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateBrandForm extends Component
{
    use WithFileUploads;

    public bool $open = false;
    public array $data = ['name' => ''];
    public ?Brand $brand = null;
    public string $title = 'Create New Brand';
    public string $shortTitle = 'Create';
    protected $listeners = ['open','imageCropped'];
    public $image = null;
    public $imageUrl = '/storage/img/gallery.png';
    public $urlImageCropped = null;

    public function mount():void {
        if (!is_null($this->brand)) {
            $this->data = $this->brand->withoutRelations()->toArray();
            $this->imageUrl = $this->brand->image_url;
            $this->title = 'Update brand information';
            $this->shortTitle = 'Update';
        }
        $this->title = __($this->title);
        $this->shortTitle = __($this->shortTitle);
    }

    public function open($brand = null):void {
        if(is_numeric($brand)) $this->brand = Brand::find($brand);
        $this->open = true;
        $this->mount();
    }

    public function updatedImage() {
        $this->emitTo('modal-cropper','open',['transmitter' => 'brands.create-brand-form','url' => $this->image->temporaryUrl()]);
    }

    public function imageCropped(array $data) {
        $this->imageUrl = $data['preview'];
        $this->urlImageCropped = $data['localUrl'];
    }

    public function save(ManagesBrands $manager):void {
        $brand = $manager->save($this->data,$this->urlImageCropped, $this->brand);
        if($brand) {
            $this->emit('saved');
            $this->dispatchBrowserEvent('back');
        }
        else $this->emit('error');
    }



    public function render()
    {

        return view('livewire.admin.brands.create-brand-form');
    }
}
