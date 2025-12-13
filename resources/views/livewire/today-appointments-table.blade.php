<div wire:poll.2s class="space-y-4">

    <div class="flex flex-col w-[80%] mb-4">
        <label class="text-sm text-white mb-1">
            Pesquisar por cliente ou serviço
        </label>

        <x-text-input type="text" wire:model.debounce.300ms="search" placeholder="Pesquisa..."
            class="px-3 py-2 rounded border border-gray-800" />
    </div>


    <table class="w-[80%] border border-gray-300 rounded-lg table-auto">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2 text-left font-semibold">Hora</th>
                <th class="border px-4 py-2 text-left font-semibold">Cliente</th>
                <th class="border px-4 py-2 text-left font-semibold">Serviço</th>
                <th class="border px-4 py-2 text-left font-semibold">Status</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($appointments as $appointment)
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2">{{ $appointment->start_time }}</td>
                    <td class="border px-4 py-2">{{ $appointment->client->name }}</td>
                    <td class="border px-4 py-2">{{ $appointment->service->name }}</td>
                    <td class="border px-4 py-2">
                        <span
                            class="
                            text-xs px-3 py-1 rounded-full
                            @if ($appointment->status === 'pending') bg-yellow-500/20 text-gray-800
                            @elseif($appointment->status === 'completed') bg-green-500/20 text-gray-800
                            @else bg-gray-500/20 text-gray-800 @endif
                                             ">
                            {{ ucfirst($appointment->status) }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
