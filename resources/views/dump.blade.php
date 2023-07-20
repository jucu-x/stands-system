{{-- Dummy view to use in new controller actions that are about to be developed --}}
<x-layouts.base>
    <div class="grid place-content-center h-screen">
        <h1 class="max-w-md">Backend not ready yet for {{request()->url()}}</h1>
        @if (isset($message))
        <x-atomic.alert>{{$message}}</x-atomic.alert>
        @endif
    </div>
</x-layouts.base>
