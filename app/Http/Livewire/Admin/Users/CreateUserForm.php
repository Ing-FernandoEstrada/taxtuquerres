<?php

namespace App\Http\Livewire\Admin\Users;

use App\Contracts\ManagesUsers;
use App\Models\Document;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateUserForm extends Component
{
    public bool $open = false;
    public array $data = ['document' => 'CC', 'identification' => '', 'names' => '', 'surnames' => '', 'birthday' => '', 'email' => '', 'phone' => '', 'address' => '', 'role' => ''];
    public $user = null;
    public string $title = 'Create New User';
    public string $shortTitle = 'Create';
    protected $listeners = ['open','modal.closed' => 'close'];

    public function mount():void {
        if (!is_null($this->user)) {
            $this->data = $this->user->withoutRelations()->toArray();
            $this->data['document'] = $this->user->document;
            $this->data['role'] = $this->user->role->name;
            $this->title = __('Update User Information');
            $this->shortTitle = __('Update');
        }
    }

    public function getDocumentsProperty(): string {
        return Document::optionsHTML();
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
        if(!$user) $this->emit('error');
        else {
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
