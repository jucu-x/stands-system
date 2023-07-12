<x-layouts.base>

    <div class="max-w-4xl mx-auto text-center">
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Crear Evento</h1>
        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">A continuación llena los datos de tu nuevo evento
        </p>
        <x-expos-form :action="route('expos.store')" method="POST"/>
    </div>
</x-layouts.base>