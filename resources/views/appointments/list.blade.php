<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gerenciar Agendamentos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex items-center justify-between mt-4 px-5">
            <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                Lista de Agendamentos:
            </h1>

            <a href="{{ route('appointments.register') }}">
                <x-primary-button>
                    Registrar Agendamento
                </x-primary-button>
            </a>
        </div>
        <div class="w-full flex justify-center mt-6">
            @livewire('appointments-table')
        </div>
    </div>
</x-app-layout>
