<x-layouts.base>


    <div class="max-w-4xl mx-auto text-center">
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Edición del Stand {{ $stand->code }} del Evento <button class="underline">{{ $expo->summary() }}</button>
        </h1>
        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
            A continuación puedes cambiar los datos del stand
        </p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            @error('code')
                                @if ($error == 'validation.unique')
                                    <x-atomic.alert>Ya existe un stand con ese código. Utilice otro distinto o deje el
                                        código original sin cambio</x-atomic.alert>
                                @endif
                                @if ($error == 'validation.max.string')
                                    <x-atomic.alert>El nuevo código para su stand no debe superar los 4 dígitos/caracteres
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
        
        <x-expos.stands.form :action="route('expos.stands.update', ['expo' => $expo, 'stand' => $stand])" method="PATCH" :expo="$expo" :stand="$stand" />
    </div>
</x-layouts.base>
