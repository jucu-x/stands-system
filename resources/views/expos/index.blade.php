<x-layouts.base>
    <h1>Hola</h1>
    @foreach ($expos as $expo)
        <p>{{$expo->name}}</p>
    @endforeach
</x-layouts.base>