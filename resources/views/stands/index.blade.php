<x-layouts.base>
    <div class="title align-middle text-center">
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Stands {{$selected_expo?->summary()}}</h1>
            <form action="{{route('stands.index')}}" method="get" class="flex justify-center items-baseline gap-4">
                <x-form.select name="expo_id" :label="null" :collection="$expos" default="Todos los eventos" summary_method="summary" :selected_value="$selected_expo?->id"/>
                <x-form.submit-button>Elegir</x-form.submit-button>
            </form>
        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Centro de administración de stands para tu evento. <span href="#"
                class="font-semibold text-gray-900 underline dark:text-white decoration-blue-500 decoration-double">Puedes crear stands nuevos</span>
        </p>
        @if ($stands->isNotEmpty())

            @foreach ($stands as $stand)
            @if ($stand->partial_time)
            <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">{{$stand->code}}</button>
            @else

            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{$stand->code}}</button>
            @endif

            @endforeach
        @else
        @if ($selected_expo)

        <p>No hay stands en este evento aún. Ve a <a class="underline" href="{{route('stands.bulk-create', $selected_expo)}}">esta página</a> para realizar la creación en masa o créalos uno por uno con el botón de abajo</p>
        @endif
        <x-atomic.action-button>Crear Stand</x-atomic.action-button>
        @endif
    </div>
</x-layouts.base>
