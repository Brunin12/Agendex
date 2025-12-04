<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Services;

class ServicesTable extends Component
{
    public function render()
    {
        return view('livewire.services-table', [
            'services' => Services::with('user')->get()
        ]);
    }

    public function delete($id)
    {
        $service = Services::find($id);

        if ($service) {
            $service->delete();
        }

        // atualiza a tabela automaticamente
        $this->dispatch('deleted');
    }
}
