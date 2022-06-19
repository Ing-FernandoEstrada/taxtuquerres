<?php

use App\Http\Livewire\Admin\Users\UsersList;
use Illuminate\Support\Facades\Route;

Route::get('users', UsersList::class)->name('users.index');
