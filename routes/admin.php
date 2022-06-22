<?php

use App\Http\Livewire\Admin\Users\ShowUser;
use App\Http\Livewire\Admin\Users\UsersList;
use Illuminate\Support\Facades\Route;

Route::get('users', UsersList::class)->name('users.index');
Route::get('users/{user}', ShowUser::class)->name('users.show');
