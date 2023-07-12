@props(['action' => '#', 'method' => 'POST', 'expo' => null])
<div>
    <form action="{{ $action }}" method="post">
        @csrf
        @method($method)
        <x-form.basic-input label='Nombre del Evento' :value="$expo?->name" name='name' placeholder='FITECTUR La Paz' />
        <x-form.basic-input label='Versión' :value="$expo?->version" name='version' placeholder='La Paz 2021' />
        <div class="flex gap-6">
            <x-form.date-picker label='Fecha de Inicio' :value="$expo?->start_date" name='start_date' />
            <x-form.date-picker label='Fecha de Cierre' :value="$expo?->end_date" name='end_date' />
        </div>
        <x-form.basic-input label='Organiza:' :value="$expo?->organizer" name='organizer' placeholder='A-TEC SRL' />
        <x-form.text-area label='Descripción' :value="$expo?->description" name='description'
            placeholder='Destinos Turísticos Inteligentes. La mejor feria del país...' />
            @if ($method == "POST")
            <x-form.submit-button id="jucuxexpogo" label="Crear" class="my-4">Crear</x-form.submit-button>

            @else
            <x-form.submit-button id="jucuxexpogo" label="Modificar" class="my-4">Modificar</x-form.submit-button>

            @endif
    </form>
</div>
