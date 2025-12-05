<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Appointments;
use Livewire\WithPagination;

class AppointmentsTable extends Component
{
    use WithPagination;

    public $search = '';

    protected $updatesQueryString = ['search']; // mantém pesquisa na URL

    public function delete($id)
    {
        $appointment = Appointments::find($id);
        if ($appointment) {
            $appointment->delete();
            session()->flash('success', 'Agendamento removido!');
        }
    }

    public function render()
    {
        $appointments = Appointments::with(['client', 'service', 'user'])
            ->whereHas('client', function($q) {
                $q->where('name', 'like', "%{$this->search}%");
            })
            ->orWhereHas('service', function($q) {
                $q->where('name', 'like', "%{$this->search}%");
            })
            ->orderBy('start_time', 'desc')
            ->paginate(10);

        return view('livewire.appointments-table', [
            'appointments' => $appointments
        ]);
    }
}
