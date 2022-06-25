<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;

    public string $search = '';
    public string $direction = 'desc';
    public string $sort = 'u.id';
    public string $rpp = '10';
    protected $listeners = ['render'];
    protected $queryString = [
        'search' => ['except' => ''],
        'sort' => ['except' => 'u.id'],
        'direction' => ['except' => 'desc'],
        'rpp' => ['except' => '10'],
    ];

    public function updatingSearch() {
        $this->resetPage();
    }

    public function sort(string $sort):void{
        if($sort==$this->sort) {
            $this->direction = $this->direction=='desc'?'asc':'desc';
        } else $this->sort = $sort;
    }

    public function openForm(?int $uid = null) {
        if (is_numeric($uid)) $this->emitTo('admin.users.create-user-form','open',$uid);
        else $this->emitTo('admin.users.create-user-form','open');
    }

    public function render()
    {
        $users = User::select('u.*')->from('users as u')
            ->join('model_has_roles as mhr','mhr.model_id','=','u.id')
            ->join('roles as r','r.id','=','mhr.role_id')
            ->where('u.email','like',"%$this->search%")
            ->orWhere('u.phone','like',"%$this->search%")
            ->orWhere('r.name','like',"%$this->search%")
            ->orWhere(DB::raw("concat(names,' ',surnames)"),'like',"%$this->search%")
            ->orWhere('identification','like',"%$this->search%")
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->rpp);
        return view('livewire.admin.users.users-list',compact('users'));
    }
}
