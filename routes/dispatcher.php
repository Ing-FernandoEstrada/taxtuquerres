<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dispatcher\Tickets\CreateTicketForm;
use App\Http\Livewire\Dispatcher\Tickets\TicketsList;
use App\Http\Livewire\Dispatcher\VehiclesInCirculation;

//Route::get('/tickets', TicketsList::class)->name('tickets.index');

/* Routes for tickets management */
Route::get('tickets', TicketsList::class)->name('tickets.index');
Route::get('tickets/create/{ticket?}', CreateTicketForm::class)->name('tickets.create');

/* Routes for tickets management */
Route::get('tickets', TicketsList::class)->name('tickets.index');
Route::get('vehicles-in-circulation', VehiclesInCirculation::class)->name('vehicles-in-circulation');
Route::get('tickets/create/{ticket?}', CreateTicketForm::class)->name('tickets.create');
