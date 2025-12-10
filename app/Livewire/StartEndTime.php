<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Services;
use Carbon\Carbon;

class StartEndTime extends Component
{
    public $start_time;
    public $end_time;

    public $services;

    public $minDateTime;

    // vem de fora
    public $service_id;

    public function mount($service_id = null, $start_time = null)
    {
        $this->service_id = $service_id;
        $this->services = Services::latest()->get();

        $this->minDateTime = now()->format('Y-m-d\TH:i');

        // Se não vier start_time, define como agora + 3 min
        $this->start_time = $start_time
            ? Carbon::parse($start_time)->format('Y-m-d\TH:i')
            : now()->addMinutes(3)->format('Y-m-d\TH:i');

        $this->calculateEndTime();
    }


    public function updatedStartTime()
    {
        $this->calculateEndTime();
    }

    public function updatedServiceId()
    {
        $this->calculateEndTime();
    }

    public function calculateEndTime()
    {
        if (!$this->service_id || !$this->start_time) {
            $this->end_time = null;
            return;
        }

        $service = Services::find($this->service_id);
        if (!$service) {
            $this->end_time = null;
            return;
        }

        $duration = $service->duration ?? 60;

        $this->end_time = Carbon::parse($this->start_time)
            ->addMinutes($duration)
            ->format('Y-m-d\TH:i');
    }

    public function render()
    {
        return view('livewire.start-end-time');
    }
}
