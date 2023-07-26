<x-layouts.base>
    <div class="text-left max-w-3xl mx-auto">
        <div class="text-left mb-12">
            <h1
                class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-3xl dark:text-white">
                Solicitud #{{ $stand_request->id }}</h1>
        </div>

        <div class="">
            <div class="">
                <h2 class="text-gray-500 dark:text-gray-400">
                    Institución, entidad o empresa solicitante:
                </h2>
                <p class="text-5xl font-bold dark:text-white text-right">{{ $stand_request->name }}</p>
            </div>
        </div>

        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
        <div class="flex items-end justify-between flex-wrap">
            <div class="">
                <h2 class="text-gray-500 dark:text-gray-400">
                    Solicitó el Stand:
                </h2>
                <a class="text-2xl font-bold dark:text-white" href="#">{{ $stand_request->stand->id }}</a>
            </div>
            <div class="">
                <h2 class="text-gray-500 dark:text-gray-400">
                    Para el evento:
                </h2>
                <a class="text-2xl font-bold dark:text-white" href="#">{{ $stand_request->stand->expo->id }}: {{$stand_request->stand->expo->name}}</a>
            </div>
            <div class="">
                <h2 class="text-gray-500 dark:text-gray-400">
                    En fecha:
                </h2>
                <a class="text-2xl font-bold dark:text-white" href="#">{{ $stand_request->created_at->format('d/m/Y') }}</a>
            </div>
            <div class="">
                <h2 class="text-gray-500 dark:text-gray-400">
                    A horas:
                </h2>
                <a class="text-2xl font-bold dark:text-white" href="#">{{ $stand_request->created_at->format('h:i:s') }}</a>
            </div>
        </div>

        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

        <div class="flex justify-between">
            <div class="max-w-sm">
                <h2 class="text-gray-500 dark:text-gray-400">
                    Mensaje de solicitud:
                </h2>
                <blockquote class=" text-gray-900 dark:text-white">
                    <p>"
                        @if ($stand_request->request_message)
                            {{ $stand_request->request_message }}
                            @else
                            ---
                            @endif
                        "</p>
                </blockquote>
            </div>
            <div class="flex flex-col gap-4  border-gray-500 dark:border-gray-400 pl-3 grow text-right">

                <div class="">
                    <h2 class="text-gray-500 dark:text-gray-400">
                        Correo electrónico de contacto:
                    </h2>
                    <a class="text-2xl font-bold dark:text-white"
                        href="mailto:{{ $stand_request->email }}">{{ $stand_request->email }}</a>
                </div>
                <div class="">
                    <h2 class="text-gray-500 dark:text-gray-400">
                        Teléfono/Celular de contacto:
                    </h2>
                    <a class="text-2xl font-bold dark:text-white" href="">{{ $stand_request->phone_number }}</a>
                </div>
                <div class="">
                    <h2 class="text-gray-500 dark:text-gray-400">
                        Dirección:
                    </h2>
                    <a class="text-2xl font-bold dark:text-white" href="#">{{ $stand_request->address }}</a>
                </div>
            </div>

        </div>




    </div>
</x-layouts.base>
