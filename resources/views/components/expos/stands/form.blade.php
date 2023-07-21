@props(['action', 'method' => 'POST', 'expo', 'stand' => null])
<div>

    <form action="{{ $action }}" method="post">
        @csrf
        @method($method)
        <div class="flex flex-wrap items-end gap-4 justify-between">
            <x-form.basic-input label='Código único en evento' :value="$stand?->code" name='code' placeholder='23'
                class="grow" required={{true}} maxlength="4"/>
            <x-form.bordered-checkbox label="Alquilable por tiempo parcial" name="partial_time" :checked="$stand?->partial_time"
                class="flex-shrink grow" />
        </div>
        <x-form.basic-input name="building" label='Ubicación dentro del campo ferial' :value="$stand?->building"
            placeholder='Bloque Amarillo Interiores' />
        <div class="flex gap-4 items-center">
            <x-form.counter name="width" label="Ancho (profundidad) del stand [m]" placeholder="2" step="any"
                :value="$stand?->width" class="grow" />
            <x-form.counter name="length" label="Largo (frontis) del stand [m]" placeholder="2.5" step="any"
                :value="$stand?->width" class="grow" />
        </div>
        <x-form.counter name="expected_cost" label="Precio tentativo (tiempo completo) (Bs)" placeholder="300.00"
            step="0.01" :value="$stand?->expected_cost" />
        @if ($method == 'POST')
            <x-form.submit-button id="jucuxstandgo" label="Crear" class="my-4">Crear</x-form.submit-button>
        @else
            <x-form.submit-button id="jucuxstandgo" label="Modificar" class="my-4">Modificar</x-form.submit-button>
        @endif
    </form>
</div>
