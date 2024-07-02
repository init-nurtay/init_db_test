<?php

namespace App\Livewire;

use App\Models\Leads;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class RealTimeData extends Component
{
    public $data;

    public function mount()
    {
        $this->data = Leads::all();
    }

    #[On('updateData')]
    public function updateData($leadId)
    {
        $this->data->unshift(Leads::findOrFail($leadId));
    }

    public function render()
    {
        return view('livewire.real-time-data')
            ->layout('layouts.view');
    }
}
