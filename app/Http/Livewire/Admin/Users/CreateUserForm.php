<?php

namespace App\Http\Livewire\Admin\Users;

use App\Contracts\ManagesUsers;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateUserForm extends Component
{
    public bool $open = false;
    public array $data = [];
    public $user = null;
    public string $title = '';
    public string $shortTitle = '';
    protected $listeners = ['open','modal.closed' => 'close'];

    public function mount():void {
        $this->data = ['type' => 'CC', 'identification' => '', 'name' => '', 'birthday' => '', 'email' => '', 'phone' => '', 'address' => '', 'role' => '', 'shortname' => ''];
        $this->title = __('Create New User');
        $this->shortTitle = __('Create');
        if (!is_null($this->user)) {
            $this->data = $this->user->withoutRelations()->toArray();
            $this->data['type'] = $this->user->type;
            $this->data['role'] = $this->user->role->name;
            $this->title = __('Update User Information');
            $this->shortTitle = __('Update');
        }
    }

    public function getTypesProperty(): string {
        return '<option value="">'.__('Select an option').'</option><option value="CC">'.__('Natural person').'</option><option value="NIT">'.__('Company').'</option>';
    }

    public function open($uid = null):void {
        if(is_numeric($uid)) $this->user = User::find($uid);
        $this->open = true;
        $this->mount();
    }

    public function updatedOpen():void {
        if (!$this->open) $this->close();
    }

    public function close() {
        $this->reset();
    }

    public function getRolesProperty():string {
        $roles = Role::all();
        $html = '<option value="">'.__('Select an option').'</option>';
        foreach ($roles as $role) {
            $html .= '<option value="'.$role->name.'">'.__('roles.'.$role->name.'.name').'</option>';
        }
        return $html;
    }

    public function save(ManagesUsers $manager):void {
        $user = $manager->save($this->data,$this->user);
        if(!$user) {
            ValidationException::withMessages(['error' => __('An error has occurred.')]);
            $this->emit('error');
        } else {
            $this->emitTo('admin.users.users-list','render');
            $this->emit('saved');
        }
        $this->close();
    }

    public function render()
    {
        return view('livewire.admin.users.create-user-form');
    }
}
