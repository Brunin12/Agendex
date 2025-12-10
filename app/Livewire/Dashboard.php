<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Clients;
use App\Models\Appointments;

class Dashboard extends Component
{
    public $totalClients;
    public $todayAppointments;
    public $pendingAppointments;
    public $recentAppointments;
    public $nextAppointments;

    public function updateData()
    {
        $this->totalClients = Clients::count();

        $this->todayAppointments = Appointments::whereDate('start_time', today())->count();

        $this->pendingAppointments = Appointments::where('status', 'pending')->count();

        $this->recentAppointments = Appointments::with('client')
            ->latest()
            ->take(5)
            ->get();

        $this->nextAppointments = Appointments::with('client')
            ->where('start_time', '>=', now())
            ->orderBy('start_time', 'asc')
            ->limit(5)
            ->get();

    }

    public function mount()
    {
        $this->updateData();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
