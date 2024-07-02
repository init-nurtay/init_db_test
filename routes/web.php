<?php

use App\Http\Controllers\LeadsController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::post('/leads', [LeadsController::class, 'store'])->name('leads.store');
