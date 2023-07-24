@props(['headings' => ['Nombre', 'Versión', 'Descripción', 'Fechas', 'Organiza'], 'expos' => null, 'current_expo' => null])

<div class="relative overflow-x-auto shadow-md">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Selector de Evento Actual</span>
                </th>
                @foreach ($headings as $heading)
                    <th scope="col" class="px-6 py-3">
                        {{ $heading }}
                    </th>
                @endforeach
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Acciones</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expos as $expo)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-gray-900">
                    <td class="pl-6 py-4">
                        @if ($current_expo?->id == $expo->id)
                            <form action="{{ route('current_expos.destroy', $expo) }}" method="post">
                                @method('DELETE')
                            @else
                                <form action="{{ route('current_expos.update', $expo) }}" method="post">
                                    @method('PATCH')
                        @endif
                        @csrf

                        <x-atomic.toggle-button :switched_on="$current_expo?->id == $expo->id" type="submit"
                            data-tooltip-target="tooltip-select-link" class="text-3xl" />
                        </form>
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $expo->name }}
                    </th>
                    <td class="px-6 py-4 dark:border-gray-700 border-r">
                        {{ $expo->version }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $expo->description }}
                    </td>
                    <td class="px-6 py-4">
                        Del <span
                            class="font-mono bg-green-100 text-green-800 text-xs mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                            {{ $expo->start_date->format('d-m/y') }}
                        </span>
                        al <span
                            class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                            {{ $expo->end_date->format('d-m-y') }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        {{ $expo->organizer }}
                    </td>

                    <td class="px-6 py-4 flex gap-4">
                        <a data-tooltip-target="tooltip-edit-link" href="{{ route('expos.edit', $expo) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            <i class="ri-pencil-fill"></i>
                        </a>
                        <a data-tooltip-target="tooltip-stands-link" href="{{ route('expos.stands.index', $expo) }}"
                            class="font-medium text-green-600 dark:text-green-500 hover:underline">
                            <i class="ri-store-2-line"></i>
                        </a>
                        <form action="{{ route('expos.destroy', $expo) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" data-tooltip-target="tooltip-delete-link"
                                class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                <i class="ri-delete-bin-fill"></i>
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <div id="tooltip-select-link" role="tooltip"
        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        Seleccionar evento como evento actual
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
    <div id="tooltip-stands-link" role="tooltip"
        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        Stands del evento
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
    <div id="tooltip-edit-link" role="tooltip"
        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        Editar evento
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
    <div id="tooltip-delete-link" role="tooltip"
        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        Eliminar evento
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
</div>
