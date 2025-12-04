<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($editing ? 'Editar Cliente' : 'Cadastrar Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12 px-5">
        <div class="overflow-none shadow-sm bg-gray-800 mx-auto max-w-md p-6 rounded">
            <h2 class="text-3xl font-medium text-gray-800 dark:text-gray-200 text-center">
                {{ __($editing ? 'Editar Cliente' : 'Cadastrar Cliente') }}
            </h2>
            <form action="{{ $editing ? route('clients.update', $client) : route('clients.store') }}" method="POST">
                @csrf
                @if ($editing)
                    @method('PUT')
                @endif

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />

                    <x-text-input id="name" class="block mt-1 w-full md:" type="text" name="name"
                        :value="old('name', $client->name ?? '')" required autofocus />

                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Telephone -->
                <div class="mt-5">
                    <x-input-label for="telephone" :value="__('Telefone')" />

                    <x-text-input id="telephone" class="block mt-1 w-full md:" type="tel" name="telephone"
                        :value="old('telephone', $client->telephone ?? '')" required />

                    <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
                </div>

                <!-- Notes -->
                <div class="mt-5">
                    <x-input-label for="notes" :value="__('Observações')" />

                    <x-text-input id="notes" class="block mt-1 w-full md:" type="text" name="notes"
                        :value="old('notes', $client->notes ?? '')" />

                    <x-input-error :messages="$errors->get('notes')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-4">
                        {{ __($editing ? 'Salvar Alterações' : 'Cadastrar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
