<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;

class ShowUser extends Component
{
    public User $user;
    protected $listeners = ['render'];

    public function openUserStateForm() {
        $this->emitTo('admin.users.update-user-state-form','open');
    }

    public function openUpdatePasswordForm() {
        $this->emitTo('admin.users.update-password-form','open');
    }

    public function render()
    {
        return view('livewire.admin.users.show-user');
    }
}
