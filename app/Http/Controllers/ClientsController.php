<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;

class ClientsController extends Controller
{
    public function index() {
        return view('clients/list');
    }

    public function create() {
        return view('clients/form', [
            'client' => null,
            'editing' => false
        ]);
    }

    public function edit(Clients $client) {
        return view('clients/form', [
            'client' => $client,
            'editing' => true
        ]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'notes' => 'nullable|string',
        ]);

        $data['user_id'] = auth()->id();

        Clients::create($data);

        return redirect()
        ->route('clients')   // troca pro nome da rota que você quer
        ->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function update(Request $request, Clients $client) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'notes' => 'nullable|string',
        ]);

        $client->update($data);

        return redirect()
        ->route('clients')   // troca pro nome da rota que você quer
        ->with('success', 'Dados do cliente alterados com sucesso!');
    }
}
