<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Clients;

class ClientsTable extends Component
{
    public function render()
    {
        return view('livewire.clients-table', [
            'clients' => Clients::with('user')->get()
        ]);
    }

    public function delete($id)
    {
        $client = Clients::find($id);

        if ($client) {
            $client->delete();
        }

        // atualiza a tabela automaticamente
        $this->dispatch('deleted');
    }

}
