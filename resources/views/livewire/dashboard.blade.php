<div wire:poll.2s="updateData" class="p-6 space-y-8">

    {{-- Metrics Cards --}}
    <div class="flex gap-6 mb-6">

        <div class="bg-gray-800 rounded-xl p-5 shadow flex flex-col flex-1 items-center text-center">
            <span class="text-gray-400 text-sm">Total de Clientes</span>
            <span class="text-3xl font-bold text-white mt-2">
                {{ $totalClients }}
            </span>
        </div>

        <div class="bg-gray-800 rounded-xl p-5 shadow flex flex-col flex-1 items-center text-center">
            <span class="text-gray-400 text-sm">Agendamentos Hoje</span>
            <span class="text-3xl font-bold text-white mt-2">
                {{ $todayAppointments }}
            </span>
        </div>

        <div class="bg-gray-800 rounded-xl p-5 shadow flex flex-col flex-1 items-center text-center">
            <span class="text-gray-400 text-sm">Pendente</span>
            <span class="text-3xl font-bold text-yellow-400 mt-2">
                {{ $pendingAppointments }}
            </span>

        </div>


    </div>


    {{-- Recent Appointments --}}
    <div class="bg-gray-800 rounded-xl p-6 shadow">
        <h2 class="text-xl text-white font-semibold mb-4">
            Agendamentos Recentes
        </h2>

        <ul class="divide-y divide-gray-700">
            @foreach ($recentAppointments as $appointment)
                <li class="py-3 flex items-center justify-between">

                    <span class="text-white">
                        {{ $appointment->client->name ?? 'Client Removed' }}
                    </span>

                    <span
                        class="
                        text-xs px-3 py-1 rounded-full
                        @if ($appointment->status === 'pending') bg-yellow-500/20 text-yellow-300
                        @elseif($appointment->status === 'completed') bg-green-500/20 text-green-300
                        @else bg-gray-500/20 text-gray-300 @endif
                    ">
                        {{ ucfirst($appointment->status) }}
                    </span>

                </li>
            @endforeach
        </ul>
    </div>

    {{-- 5 Next Appointments --}}
    <div class="bg-gray-800 rounded-xl p-6 shadow">
        <h2 class="text-xl text-white font-semibold mb-4">
            Próximos 5 Agendamentos
        </h2>

        <div class="overflow-x-auto">
            <table class="min-w-full text-left">
                <thead>
                    <tr class="border-b border-gray-700">
                        <th class="px-4 py-3 text-gray-400">Nome do Cliente</th>
                        <th class="px-4 py-3 text-gray-400">Serviço</th>
                        <th class="px-4 py-3 text-gray-400">Começo</th>
                        <th class="px-4 py-3 text-gray-400">Fim</th>
                        <th class="px-4 py-3 text-gray-400">Valor</th>
                        <th class="px-4 py-3 text-gray-400">Duração (min)</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-800">
                    @foreach ($nextAppointments as $appointment)
                        <tr>
                            <td class="px-4 py-3 text-white">
                                {{ $appointment->client->name ?? 'Cliente Removido' }}
                            </td>

                            <td class="px-4 py-3 text-white">
                                {{ $appointment->service->name ?? 'Serviço Removido' }}
                            </td>

                            <td class="px-4 py-3 text-white">
                                {{ $appointment->start_time ?? '—' }}
                            </td>

                            <td class="px-4 py-3 text-white">
                                {{ $appointment->end_time ?? '—' }}
                            </td>

                            <td class="px-4 py-3 text-white">
                                {{ $appointment->service->price ?? '—' }}
                            </td>

                            <td class="px-4 py-3 text-white">
                                {{ $appointment->service->duration ?? '—' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

</div>
