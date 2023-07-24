@props(['switched_on' => false])
<button {{$attributes}}>
    @if ($switched_on)
        <i class="ri-toggle-fill"></i>
    @else
        <i class="ri-toggle-line"></i>
    @endif
</button>
