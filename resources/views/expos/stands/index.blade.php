<x-layouts.base>
    <div class="title align-middle text-center">
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Stands del evento: <button id="dropdownDefaultButton" data-dropdown-toggle="expos_dropdown" class="underline">{{ $expo?->summary() }} <i class="ri-arrow-drop-down-line"></i></button></h1>

        <x-atomic.dropdown id="expos_dropdown" :collection="$all_expos" route="expos.stands.index" />

        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Centro de
            administración de stands para tu evento. <span href="#"
                class="font-semibold text-gray-900 underline dark:text-white decoration-blue-500 decoration-double">Puedes
                crear stands nuevos</span>
        </p>
        @if ($stands->isNotEmpty())
            <div class="flex mx-4 my-4 gap-4">
                <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white"><span
                        class="flex w-2.5 h-2.5 bg-yellow-400 rounded-full mr-1.5 flex-shrink-0"></span>Stands de tiempo
                    parcial</span>
                <span class="flex items-center text-sm font-medium text-gray-900 dark:text-white"><span
                        class="flex w-2.5 h-2.5 bg-blue-600 rounded-full mr-1.5 flex-shrink-0"></span>Stands full
                    time</span>
            </div>

            <x-stands.table :stands="$stands" />
        @else
            <p>No hay stands en este evento aún. Ve a <a class="underline"
                    href="{{ route('expos.stands.bulk.create', $expo) }}">esta página</a> para realizar la
                creación en masa o créalos uno por uno con el botón de abajo</p>
        @endif
        <div class="flex justify-center items-center gap-4 my-4">
            <x-atomic.action-button :href="route('expos.stands.create', $expo)" >Crear nuevo stand del evento</x-atomic.action-button>
            @if ($stands->isNotEmpty())
                <x-atomic.default-button type="button" data-modal-target="delete_all_modal"
                    data-modal-toggle="delete_all_modal" color="red" :class="[]">Eliminar TODOS los stands del
                    evento</x-atomic.default-button>
                <x-atomic.deletion-modal id="delete_all_modal"
                    action="{{ route('expos.stands.bulk.destroy', $expo) }}" />
            @endif
        </div>
    </div>
</x-layouts.base>
