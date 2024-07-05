<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadController;
use App\Models\Lead;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::get('/admin/dashboard',DashboardController::class)->name('admin.dashboard');

Route::as('admin.')->prefix('admin')->group(function (){
    Route::get('/',function(){
        return to_route('admin.dashboard');
    });
    Route::resource('/leads',LeadController::class);
    Route::resource('/documents',\App\Http\Controllers\DocumentController::class);
    Route::resource('/projects',\App\Http\Controllers\ProjectController::class);
    Route::resource('/clients',\App\Http\Controllers\ClientController::class);
});
