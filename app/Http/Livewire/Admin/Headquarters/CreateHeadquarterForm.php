<?php

namespace App\Http\Livewire\Admin\Headquarters;

use App\Contracts\ManagesHeadquarters;
use App\Models\Headquarter;
use Illuminate\View\View;
use Livewire\Component;

class CreateHeadquarterForm extends Component
{
    public bool $open = false;
    public array $data = ['name' => ''];
    public ?Headquarter $headquarter = null;
    public string $title = 'Create New Headquarter';
    public string $shortTitle = 'Create';
    protected $listeners = ['open'];


    public function mount():void {
        if (!is_null($this->headquarter)) {
            $this->data = $this->headquarter->withoutRelations()->toArray();
            $this->title = 'Update headquarter information';
            $this->shortTitle = 'Update';
        }
        $this->title = __($this->title);
        $this->shortTitle = __($this->shortTitle);
    }

    public function open($headquarter = null):void {
        if(is_numeric($headquarter)) $this->headquarter = Headquarter::find($headquarter);
        $this->open = true;
        $this->mount();
    }

    public function save(ManagesHeadquarters $manager):void {
        $headquarter = $manager->save($this->data, $this->headquarter);
        if($headquarter) {
            $this->emit('saved');
            $this->reset();
        } else $this->emit('error');
    }

    public function render():View {
        return view('livewire.admin.headquarters.create-headquarter-form');
    }
}
