<x-layouts.base>
    <div class="max-w-4xl mx-auto text-center">
        <h1
            class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Solicitud del Stand {{ $stand->code }} del evento {{ $stand->expo->name }}</h1>
        <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
            A continuación llena los datos para solicitar este stand
        </p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            @error('code')
                                @if ($error == 'validation.unique')
                                    <x-atomic.alert>Ya existe un stand con ese código. Utilice otro distinto para este nuevo
                                        stand</x-atomic.alert>
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

        {{-- IMPORTANT name, email, message, start_date, end_date --}}
        {{-- SECONDARY address, phone_number --}}
        {{-- OPTIONAL website, facebook, twitter, instagram, tiktok, linkedin, youtube --}}
        <form action="{{ route('stands.anonymous_stand_requests.store', $stand) }}" method="post">
            @csrf
            <x-form.basic-input name="name" label="Nombre de su institución, empresa o actividad *"
                placeholder="A-TEC SRL" :required="true" :value="old('name')" />
            <x-form.basic-input name="email" type="email" label="Correo Electrónico *" placeholder="company@jucux.com"
                :required="true" :value="old('email')"/>
            <x-form.basic-input name="phone_number" label="Número de contacto *" placeholder="70011122"
                :required="true" :value="old('phone_number')"/>
            <x-form.basic-input name="address" label="Dirección" placeholder="La Paz, Bolivia, Plaza X, Esquina Y, Av. Z"
                :required="false" :value="old('address')"/>
            <x-form.text-area name="message" label="Mensaje de solicitud (opcional)"
                placeholder="Queridos organizadores. Nosotros somos la empresa XYZ, cuyo objetivo en esta nueva entrega del evento es..." />
            @if ($stand->partial_time)
                <h2 class="block mt-2 text-sm font-medium text-gray-900 dark:text-white">Tiempo de uso del stand
                    solicitado</h2>
                <div class="flex gap-4 mb-3">
                    <x-form.date-picker name="start_date" label="Desde" />
                    <x-form.date-picker name="end_date" label="Hasta" />
                </div>
            @endif
            <x-form.submit-button id="send_request">Enviar Solicitud</x-form.submit-button>
        </form>
    </div>
</x-layouts.base>
