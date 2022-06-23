<?php

namespace App\Http\Livewire\Admin\Users;

use App\Contracts\ManagesUsers;
use App\Models\User;
use Livewire\Component;

class UpdatePasswordForm extends Component
{
    public bool $open = false;
    public User $user;
    public array $data = ['password' => '', 'password_confirmation' => '',];
    protected $listeners = ['open'];

    public function open() {
        $this->open = true;
    }

    public function update(ManagesUsers $manager)
    {
        $updated = $manager->updatePassword($this->data, $this->user);
        if ($updated) {
            $this->emit('saved');
            $this->reset(['open', 'data']);
        } else $this->emit('error');
    }

    public function render()
    {
        return view('livewire.admin.users.update-password-form');
    }
}
