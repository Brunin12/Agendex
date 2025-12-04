<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($editing ? 'Editar Serviço' : 'Cadastrar Serviço') }}
        </h2>
    </x-slot>

    <div class="py-12 px-5">
        <div class="overflow-none shadow-sm bg-gray-800 mx-auto max-w-md p-6 rounded">
            <h2 class="text-3xl font-medium text-gray-800 dark:text-gray-200 text-center">
                {{ __($editing ? 'Editar Serviço' : 'Cadastrar Serviço') }}
            </h2>
            <form action="{{ $editing ? route('services.update', $service) : route('services.store') }}" method="POST">
                @csrf
                @if ($editing)
                    @method('PUT')
                @endif

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />

                    <x-text-input id="name" class="block mt-1 w-full md:" type="text" name="name"
                        :value="old('name', $service->name ?? '')" required autofocus />

                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Duration -->
                <div class="mt-5">
                    <x-input-label for="duration" :value="__('Duração (minutos)')" />

                    <x-text-input id="duration" name="duration" type="text" inputmode="numeric" pattern="[0-9]*"
                        class="block mt-1 w-full" :value="old('duration', $service->duration ?? '')" required />

                    <x-input-error :messages="$errors->get('duration')" class="mt-2" />
                </div>

                <!-- Valor do Serviço -->
                <div class="mt-5">
                    <x-input-label for="price" :value="__('Valor do Serviço')" />

                    <x-text-input id="price" class="block mt-1 w-full" type="number" min="0.00" step="0.01" name="price"
                        :value="old('price', $service->price ?? '')" />

                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
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
