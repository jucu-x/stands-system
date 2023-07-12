@props(['headings' => ['Nombre', 'Versión', 'Descripción', 'Fechas', 'Organiza'], 'expos' => null])

<div class="relative overflow-x-auto shadow-md">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
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
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
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
                        <a data-tooltip-target="tooltip-edit-link" href="#"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            <i class="ri-pencil-fill"></i>
                        </a>
                        <a data-tooltip-target="tooltip-stands-link" href="#"
                            class="font-medium text-green-600 dark:text-green-500 hover:underline">
                            <i class="ri-store-2-line"></i>
                        </a>
                        <a data-tooltip-target="tooltip-delete-link" href="#"
                            class="font-medium text-red-600 dark:text-red-500 hover:underline"><i
                                class="ri-delete-bin-fill"></i></a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

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
