<x-layouts.base>
    <div class="title align-middle text-center">
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Solicitudes del Stand {{ $stand->id }}</h1>

        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Observa todas
            las solicitudes realizadas para adquirir el stand. <span href="#"
                class="font-semibold text-gray-900 underline dark:text-white decoration-blue-500 decoration-double">Atiende
                cada solicitud</span>
        </p>
        @if ($stand_requests->isNotEmpty())
            <x-stands.requests.table :stand_requests="$stand_requests" />
        @else
            <p>Espera las solicitudes, que pronto llegan. Mientras tanto puedes <a class="underline"
                    href="{{ route('expos.stands.edit', [$stand->expo, $stand]) }}">editar el stand</a>, crear una
                solicitud manualmente o saltarte al paso de la <a class="underline" href="">ejecución de
                    alquiler</a></p>
        @endif
        <div class="flex justify-center items-center gap-4 my-4">
            <x-atomic.action-button href="#">Creación manual de solicitud</x-atomic.action-button>
        </div>
    </div>
</x-layouts.base>
