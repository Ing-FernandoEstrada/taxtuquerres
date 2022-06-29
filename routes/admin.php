<?php

use App\Http\Livewire\Admin\Users\ShowUser;
use App\Http\Livewire\Admin\Users\UsersList;
use App\Http\Livewire\Vehicles\CreateVehicleForm;
use App\Http\Livewire\Vehicles\VehiclesList;
use Illuminate\Support\Facades\Route;

/* Routes for users management */
Route::get('users', UsersList::class)->name('users.index');
Route::get('users/{user}', ShowUser::class)->name('users.show');

/* Routes for vehicles management */
Route::get('vehicles', VehiclesList::class)->name('vehicles.index');
Route::get('vehicles/create/{vehicle?}', CreateVehicleForm::class)->name('vehicles.create');

/* Routes for brands management */
Route::get('brands', VehiclesList::class)->name('brands.index');
Route::get('brands/create/{brand?}', CreateVehicleForm::class)->name('brands.create');

/* Routes for Categories */
Route::get('categories', VehiclesList::class)->name('categories.index');
Route::get('categories/create/{category?}', CreateVehicleForm::class)->name('categories.create');
