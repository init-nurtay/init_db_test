<?php

use App\Events\LeadsAdded;
use App\Models\Leads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/lead/new/{name}', function (string $name) {
    $lead = Leads::create([
        'phone'  => $name,
    ]);

    LeadsAdded::dispatch($lead);

    return 'ok';
});
