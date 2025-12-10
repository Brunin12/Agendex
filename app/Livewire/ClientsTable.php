<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Clients;
use Livewire\WithPagination;

class ClientsTable extends Component
{
    use WithPagination;

    public $search = '';
    protected $updatesQueryString = ['search']; // mantém pesquisa na URL

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
