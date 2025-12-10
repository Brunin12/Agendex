<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Clients;
use App\Models\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('appointments.list');
    }

    /**
     * Display a listing of the resource.
     */
    public function today()
    {
        return view('appointments.today');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Clients::latest()->get();

        return view('appointments.form', [
            'appointment' => null,
            'editing' => false,
            'clients' => $clients,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'client_id' => 'required|integer|exists:clients,id',
            'service_id' => 'required|integer|exists:services,id',
            'start_time' => 'required',
            'end_time' => 'required',
            'status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $data['user_id'] = auth()->id();

        $data['start_time'] = Carbon::parse($data['start_time'])->format('Y-m-d H:i:s');
        $data['end_time']   = Carbon::parse($data['end_time'])->format('Y-m-d H:i:s');

        Appointments::create($data);

        return redirect()
            ->route('appointments')
            ->with('success', 'Agendamento cadastrado com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointments $appointment)
    {
        return view('appointments.form', [
            'appointment' => $appointment,
            'editing' => true
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointments $appointment)
    {
        $data = $request->validate([
            'client_id' => 'required|integer|exists:clients,id',
            'service_id' => 'required|integer|exists:services,id',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $appointment->update($data);

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Agendamento atualizado com sucesso!');
    }
}
