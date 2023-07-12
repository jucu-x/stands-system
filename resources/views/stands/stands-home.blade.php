<x-layouts.base>
    <div class="title align-middle text-center">
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Stands FITECTUR</h1>
        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Elige uno de
            los stands disponibles para nuestro próximo evento. <span href="#"
                class="font-semibold text-gray-900 underline dark:text-white decoration-blue-500 decoration-double">Sé
                parte de este destino junto a nosotros</span>
        </p>
        @if ($stands->isNotEmpty())
            <p>Hay stands</p>
            @foreach ($stands as $stand)
            @if ($stand->partial_time)
            <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">{{$stand->code}}</button>
            @else

            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{$stand->code}}</button>
            @endif

            @endforeach
        @else
        <div class="max-w-4xl mx-auto">
            <x-atomic.alert>No Hay stands disponibles para este evento</x-atomic.alert>
            {{-- IF AUTH --}}
            <x-atomic.alert>Si es administrador puede crearlos <i class="ri-corner-right-down-fill"></i></x-atomic.alert>
            <form action="{{route('stands.initial')}}" method="post" >
                @csrf
                <x-form.select name="expo_id" label="Seleccione Evento Actual" :collection="$expos" default="Elige un evento" summary_method="summary"/>
                <x-form.counter label="Cuántos stands normales tendrá" name="normal-stands-count" placeholder="98"/>
                <x-form.counter label="Cuántos stands de tiempo parcial tendrá" name="partial-stands-count" placeholder="98"/>
                <x-form.submit-button label="Crear stands" class="my-4" id="create-stands-button">Crear Stands</x-form.submit-button>
            </form>
            <x-atomic.action-button>Crear Stands</x-atomic.action-button>
        </div>
        @endif
    </div>
</x-layouts.base>
