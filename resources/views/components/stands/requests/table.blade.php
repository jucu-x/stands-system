@props(['fields' => ['name', 'email', 'phone_number', 'request_message', 'attended'], 'stand_requests' => null, 'heading_field' => null])
{{-- IMPORTANT name, email, message, start_date, end_date --}}
{{-- SECONDARY address, phone_number --}}
{{-- OPTIONAL website, facebook, twitter, instagram, tiktok, linkedin, youtube --}}
<div class="relative overflow-x-auto shadow-md">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                @foreach (\App\Models\StandRequest::fieldsToVerbose($fields) as $heading)
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
            @foreach ($stand_requests as $stand_request)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-gray-900">
                    {{-- Actual content from a collection --}}
                    @foreach ($fields as $i => $field)
                        @if ($field == $heading_field)
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white ">
                                <p>{{ $stand_request->{$field} }}</p>
                            </th>
                        @else
                            <td class="px-6 py-4">
                                @if ($stand_request->{$field} instanceof \App\Models\Stand)
                                    <a class="underline"
                                        href="{{ route('expos.stands.edit', $stand_request->{$field}->id) }}">{{ $stand_request->{$field}->code }}</a>
                                @else
                                    {{ $stand_request->{$field} }}
                                @endif
                            </td>
                        @endif
                    @endforeach

                    {{-- Accionable buttons --}}
                    <td class="px-6 py-4 flex gap-4 items-center">
                        <x-atomic.show-link
                            href="{{ route('stand_requests.show', $stand_request) }}" />
                        <x-atomic.edit-link
                            href="{{ route('stands.stand_requests.edit', [
                                'stand' => $stand_request->stand,
                                'stand_request' => $stand_request,
                            ]) }}" />
                        <x-atomic.delete-link :action="route('stands.stand_requests.destroy', [
                            'stand' => $stand_request->stand,
                            'stand_request' => $stand_request,
                        ])" />
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <x-atomic.deletion-modal id="delete-modal">Estas seguro de ELIMINAR esta solicitud de stand?
    </x-atomic.deletion-modal>
    <x-atomic.tooltip id="show-link-tooltip">Mostrar Información detallada</x-atomic.tooltip>
    <x-atomic.tooltip id="edit-link-tooltip">Editar Solicitud</x-atomic.tooltip>
    <x-atomic.tooltip id="delete-link-tooltip">Eliminar Solicitud</x-atomic.tooltip>
</div>
