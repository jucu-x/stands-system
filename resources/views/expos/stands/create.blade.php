<x-layouts.base>
    <div class="max-w-4xl mx-auto text-center">
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Crear Stand para el Evento <button class="underline">{{ $expo->summary() }}</button></h1>
        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
            A continuación llena los datos del nuevo stand
        </p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            @error('code')
                                @if ($error == 'validation.unique')
                                    <x-atomic.alert>Ya existe un stand con ese código. Utilice otro distinto para este nuevo stand</x-atomic.alert>
                                @endif
                                @if ($error == 'validation.max.string')
                                    <x-atomic.alert>El código para su stand no debe superar los 4 dígitos/caracteres
                                    </x-atomic.alert>
                                @endif
                            @else
                                <x-atomic.alert>{{ $error }}</x-atomic.alert>
                            @enderror
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <x-expos.stands.form :action="route('expos.stands.store', $expo)" method="POST" :expo="$expo" />
    </div>
</x-layouts.base>
