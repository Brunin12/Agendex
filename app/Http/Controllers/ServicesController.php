<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;

class ServicesController extends Controller
{
    public function index() {
        return view('services/list');
    }

    public function create() {
        return view('services/form', [
            'service' => null,
            'editing' => false
        ]);
    }

    public function edit(Services $service) {
        return view('services/form', [
            'service' => $service,
            'editing' => true
        ]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|integer',
            'price' => 'required|numeric|regex:/^\d{1,10}(\.\d{1,2})?$/',
        ]);

        $data['user_id'] = auth()->id();

        Services::create($data);

        return redirect()
        ->route('services')   // troca pro nome da rota que você quer
        ->with('success', 'Serviço cadastrado com sucesso!');
    }

    public function update(Request $request, Services $service) {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|integer',
            'price' => 'required|numeric|regex:/^\d{1,10}(\.\d{1,2})?$/',
        ]);

        $service->update($data);

        return redirect()
        ->route('services')   // troca pro nome da rota que você quer
        ->with('success', 'Dados do serviço alterados com sucesso!');
    }
}
