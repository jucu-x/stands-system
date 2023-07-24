<x-layouts.base>

    <div class="title align-middle text-center">
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Estos son tus eventos</h1>
        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Puedes editar
            (<i class="ri-pencil-fill"></i>)
            los existentes, ver (<i class="ri-eye-fill"></i>) sus stands (<i class="ri-store-2-line"></i>)
            correspondientes o crear (<i class="ri-add-fill"></i>)
            uno nuevo. <span href="#"
                class="font-semibold text-gray-900 underline dark:text-white decoration-blue-500 decoration-double">Es
                necesario para crear tus stands</span>
        </p>
        @isset($current_expo)
            <p>El evento actual es {{ $current_expo->summary() }}. Puedes cambiarlo seleccionando otro de la tabla</p>
        @else
            <p>No hay ningún evento seleccionado como el actual. Selecciona uno de la tabla</p>
        @endisset
        @if ($expos->isNotEmpty())
            {{-- THIS IS THE TABLE --}}
            <x-expos-table :expos="$expos" :current_expo="$current_expo"/>
        @else
            <p>Crea tu primer evento!</p>
        @endif
        <a href="{{ route('expos.create') }}"
            class="mt-4 inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
            Crear Nuevo Evento
            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </a>
    </div>
</x-layouts.base>
