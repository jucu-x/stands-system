@props(['fields' => ['code', 'expo', 'building', 'expected_cost', 'available'], 'stands' => null])

<div class="relative overflow-x-auto shadow-md">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                @foreach (\App\Models\Stand::fieldsToVerbose($fields) as $heading)
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
            @foreach ($stands as $stand)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-gray-900">
                    @foreach ($fields as $i => $field)
                        @if ($i == 0)
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                                <p @class([
                                    'w-fit',
                                    'p-2',
                                    'rounded-md',
                                    'text-white',
                                    'bg-yellow-400' => $stand->partial_time,
                                    'bg-blue-600' => !$stand->partial_time,
                                ])>{{ $stand->{$field} }}</p>
                            </th>
                        @else
                            <td class="px-6 py-4">
                                @if ($stand->{$field} instanceof \App\Models\Expo)
                                    <a class="underline"
                                        href="{{ route('expos.edit', $stand->{$field}->id) }}">{{ $stand->{$field}->summary() }}</a>
                                @elseif (is_bool($stand->{$field}))
                                    <form action="{{route('expos.stands.toggle_availability', ['expo'=>$stand->expo, 'stand'=>$stand])}}" method="post">
                                        @method('PATCH')
                                        @csrf
                                        <x-atomic.toggle-button :switched_on="$stand->{$field}" class="text-3xl" />
                                    </form>
                                @else
                                    {{ $stand->{$field} }}
                                @endif
                            </td>
                        @endif
                    @endforeach

                    <td class="px-6 py-4 flex gap-4 items-center">
                        <a data-tooltip-target="tooltip-edit-link"
                            href="{{ route('expos.stands.edit', ['expo' => $stand->expo, 'stand' => $stand]) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            <i class="ri-pencil-fill"></i>
                        </a>
                        <a data-tooltip-target="tooltip-stand-requests-link"
                            href="{{ route('stands.stand_requests.index', $stand) }}"
                            class="relative inline-flex items-center p-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <i class="ri-list-indefinite"></i>
                            <span class="sr-only">Requests</span>
                            <div
                                class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -right-2 dark:border-gray-900">
                                {{ $stand->requests()->count() }}</div>
                        </a>
                        <button type="button" data-tooltip-target="tooltip-delete-link"
                            data-modal-target="delete_{{ $stand->id }}_modal"
                            data-modal-toggle="delete_{{ $stand->id }}_modal"
                            class="font-medium text-red-600 dark:text-red-500 hover:underline">
                            <i class="ri-delete-bin-fill"></i>
                        </button>
                        <x-atomic.deletion-modal id="{{ 'delete_' . $stand->id . '_modal' }}"
                            action="{{ route('expos.stands.destroy', ['expo' => $stand->expo, 'stand' => $stand]) }}">
                            Estas seguro de ELIMINAR el stand {{ $stand->code }} del evento
                            {{ $stand->expo->summary() }}?</x-atomic.deletion-modal>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <div id="tooltip-stand-requests-link" role="tooltip"
        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        Solicitudes del stand
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
