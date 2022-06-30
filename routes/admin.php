<?php

use App\Http\Livewire\Admin\Brands\BrandsList;
use App\Http\Livewire\Admin\Brands\CreateBrandForm;
use App\Http\Livewire\Admin\Categories\CategoriesList;
use App\Http\Livewire\Admin\Categories\CreateCategoryForm;
use App\Http\Livewire\Admin\Tickets\CreateTicketForm;
use App\Http\Livewire\Admin\Tickets\TicketsList;
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
Route::get('brands', BrandsList::class)->name('brands.index');
Route::get('brands/create/{brand?}', CreateBrandForm::class)->name('brands.create');

/* Routes for Categories */
Route::get('categories', CategoriesList::class)->name('categories.index');
//Route::get('categories/{category?}', CreateCategoryForm::class)->name('categories.show');

/* Routes for tickets management */
Route::get('tickets', TicketsList::class)->name('tickets.index');
Route::get('tickets/create/{ticket?}', CreateTicketForm::class)->name('tickets.create');
