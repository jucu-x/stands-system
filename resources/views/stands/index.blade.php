<x-layouts.base>
    <div class="title align-middle text-center">
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Stands {{ $selected_expo?->summary() }}</h1>
        <form action="{{ route('stands.index') }}" method="get" class="flex justify-center items-baseline gap-4">
            <x-form.select name="expo_id" :label="null" :collection="$expos" default="Todos los eventos"
                summary_method="summary" :selected_value="$selected_expo?->id" />
            <x-form.submit-button>Elegir</x-form.submit-button>
        </form>
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
            @if ($selected_expo)
                <p>No hay stands en este evento aún. Ve a <a class="underline"
                        href="{{ route('stands.bulk-create', $selected_expo) }}">esta página</a> para realizar la
                    creación en masa o créalos uno por uno con el botón de abajo</p>
            @endif
        @endif
        <div class="flex justify-center items-center gap-4 my-4">
            <x-atomic.action-button>Crear Stand</x-atomic.action-button>
            @if ($selected_expo != null && $stands->isNotEmpty())
                <x-atomic.default-button type="button" data-modal-target="delete_all_modal"
                    data-modal-toggle="delete_all_modal" color="red" :class="[]">Eliminar TODOS los stands del
                    evento</x-atomic.default-button>
                <x-atomic.deletion-modal id="delete_all_modal"
                    action="{{ route('stands.destroy-all-in-expo', $selected_expo) }}" />
            @endif
        </div>
    </div>
</x-layouts.base>
