<?php

namespace App\Livewire;

use App\Models\Appointments;
use Livewire\Component;

class TodayAppointmentsTable extends Component
{
    public $appointments;

    public function render()
    {
        $this->appointments = Appointments::with(['client', 'service'])
            ->whereDate('start_time', today())
            ->orderBy('start_time')
            ->get();

        return view('livewire.today-appointments-table', ['appointments' => $this->appointments]);
    }
}
