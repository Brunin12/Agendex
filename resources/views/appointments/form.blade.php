<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white dark:text-white leading-tight">
            {{ __($editing ? 'Editar Agendamento' : 'Cadastrar Agendamento') }}
        </h2>
    </x-slot>

    <div class="py-12 px-5">
        <div class="overflow-none shadow-sm bg-gray-800 mx-auto max-w-md p-6 rounded">
            <h2 class="text-3xl font-medium text-white dark:text-white text-center">
                {{ __($editing ? 'Editar Agendamento' : 'Cadastrar Agendamento') }}
            </h2>


            <!-- ================= FORMULÁRIO ================= -->
            <form action="{{ $editing ? route('appointments.update') : route('appointments.store') }}" class="md:col-span-2 space-y-5" method="POST">
                @csrf
                @if ($editing)
                    @method('PUT')
                @endif

                <h1 class="text-xl font-semibold text-white">Novo Agendamento</h1>

                <!-- CLIENTE -->
                <div class="flex flex-col gap-1">
                    <label class="text-sm text-white">Cliente</label>
                    <select
                        class="w-full rounded px-3 py-2 bg-gray-800 text-white border border-gray-600" name="client_id">
                        <option value="">Selecione...</option>
                        @foreach ($clients as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                    @error('client_id')
                        <span class="text-red-400 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Service / START / END TIME --}}
                @livewire('start-end-time')

                <!-- STATUS -->
                <div class="flex flex-col gap-1">
                    <label class="text-sm text-white">Status</label>
                    <select wire:model="status" name="status"
                        class="w-full rounded px-3 py-2 bg-gray-800 text-white border border-gray-600">
                        <option value="pending">⏳ Pendente</option>
                        <option value="confirmed">✅ Confirmado</option>
                        <option value="canceled">❌ Cancelado</option>
                    </select>
                </div>

                <!-- BOTÃO -->
                <div class="my-4">
                    <button
                        class="bg-blue-600 hover:bg-blue-700 transition text-white px-4 py-2 rounded w-full font-medium shadow">
                        <span >Salvar</span>
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
