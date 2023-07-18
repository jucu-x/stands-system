<x-layouts.base>
    <div class="title align-middle text-center">
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            {{ $selected_expo?->summary() }}</h1>

        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Creación en
            masa de stands para el evento seleccionado <span href="#"
                class="font-semibold text-gray-900 underline dark:text-white decoration-blue-500 decoration-double">Vuelve
                atrás si deseas seleccionar otro evento</span>
        </p>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                @if ($error == 'validation.min.numeric')
                    <x-atomic.alert>Ingresa números positivos</x-atomic.alert>
                @endif
                @if ($error == 'validation.max.numeric')
                    <x-atomic.alert>No puedes crear más de 150 stands</x-atomic.alert>
                @endif
            @endforeach
        @endif
        <div class="max-w-4xl mx-auto">
            <form action="{{ route('stands.bulk-store') }}" method="post">
                @csrf
                <input type="hidden" name="expo_id" value="{{ $selected_expo->id }}">
                <x-form.counter label="Cuántos stands normales tendrá" name="normal-stands-count" placeholder="98" min=0
                    max=150 />
                <x-form.counter label="Cuántos stands de tiempo parcial tendrá" name="partial-stands-count"
                    placeholder="98" min=0 max=150 />
                <x-form.submit-button label="Crear stands" class="my-4" id="create-stands-button">Crear Stands
                </x-form.submit-button>
            </form>
        </div>
    </div>
</x-layouts.base>
