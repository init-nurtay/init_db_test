<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadController;
use App\Models\Lead;
use Illuminate\Support\Facades\Route;

Route::get('/',)->name('leads.index');
Route::view('/', 'welcome');
Route::get('/admin/dashboard',DashboardController::class)->name('admin.dashboard');
Route::as('admin.')->prefix('admin')->group(function (){
    Route::resource('/leads',LeadController::class);
});
