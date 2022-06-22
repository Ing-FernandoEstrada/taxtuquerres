<?php

namespace App\Http\Livewire\Admin\Users;

use App\Contracts\ManagesUsers;
use App\Models\User;
use Livewire\Component;

class UpdateUserStateForm extends Component
{
    public User $user;
    public bool $open=false;
    public string $state;
    protected $listeners=["open"];

    public function mount()
    {
        $this->state=$this->user->state;
    }

    public function open()
    {
        $this->open=true;
    }

    public function update(ManagesUsers $manager)
    {
        $updated = $manager->updateState($this->user,$this->state);
        if($updated){
            $this->emitTo('admin.users.show-user','render');
            $this->emit("saved");
            $this->open=false;
        } else $this->emit("error");
    }

    public function render()
    {
        return view('livewire.admin.users.update-user-state-form');
    }
}
