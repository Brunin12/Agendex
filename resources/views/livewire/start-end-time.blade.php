<div class="space-y-3">
    <!-- SERVIÇO -->
    <div class="flex flex-col gap-1">
        <label class="text-sm text-white">Serviço</label>
        <select class="w-full rounded px-3 py-2 bg-gray-800 text-white border border-gray-600"
            wire:model.live="service_id" name="service_id" wire:change="calculateEndTime">
            <option value="">Selecione...</option>
            @foreach ($services as $s)
                <option value="{{ $s->id }}">
                    {{ $s->name }} ({{ $s->duration }}min)
                </option>
            @endforeach
        </select>
        @error('service_id')
            <span class="text-red-400 text-xs">{{ $message }}</span>
        @enderror
    </div>

    <!-- INÍCIO -->
    <div class="flex flex-col gap-1">
        <label class="text-sm text-white">Início</label>

        <input type="datetime-local" wire:model.live="start_time" name='start_time' wire:update="calculateEndTime"
            class="w-full rounded px-3 py-2 bg-gray-800 text-white border border-gray-600">

        @error('start_time')
            <span class="text-red-400 text-xs">{{ $message }}</span>
        @enderror
    </div>

    <!-- PREVIEW DO FIM -->
    @if ($end_time)
        <!-- FIM -->
        <div class="flex flex-col gap-1">
            <label class="text-sm text-white">Fim (previsão)</label>

            <input type="datetime-local" wire:model.live="end_time" name="end_time" readonly value="{{ $end_time }}"
                class="w-full rounded px-3 py-2 bg-gray-800 text-white border border-gray-600">

        </div>
    @else
        <input type="datetime-local" wire:model.live="start_time" name='end_time' class="hidden" type="hidden">
    @endif


</div>
