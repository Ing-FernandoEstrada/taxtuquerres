<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ModalCropper extends Component
{
    use WithFileUploads;

    public bool $open = false;
    public string $url = '/storage/img/gallery.png';
    public $tempImage = null;
    public $transmitter = null;
    protected $listeners = ['open', 'modal.closed' => 'close'];

    public function open(array $data) {
        $this->url = $data['url'];
        $this->transmitter = $data['transmitter'];
        $this->open = true;
        $this->emit('initCropper');
    }

    public function updatedTempImage() {
        $this->emitTo($this->transmitter,'imageCropped',['preview' => $this->tempImage->temporaryUrl(),'localUrl' => $this->tempImage->path()]);
        $this->close();
        $this->emit('resetCopper');
    }

    public function close() {
        $this->reset(['open','url','transmitter']);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('modal-cropper');
    }
}
