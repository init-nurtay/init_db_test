<?php

use App\Events\LeadsAdded;
use App\Livewire\RealTimeData;
use App\Models\Leads;
use Illuminate\Support\Facades\Route;

Route::get('/data', RealTimeData::class);

Route::get('/lead/new/{name}', function (string $name) {
    $lead = Leads::create([
        'phone'  => $name,
    ]);
    LeadsAdded::dispatch($lead);

    return 'ok';
});
