{{-- Deletion button should be used with deletion-modal for confirmation --}}
@props(['action' => '#', 'modal_id' => 'delete-modal'])
<button type="button"
    {{ $attributes->merge([
        'data-tooltip-target' => 'delete-link-tooltip',
        'data-modal-target' => $modal_id,
        'data-modal-toggle' => $modal_id,
    ]) }}
    class="font-medium text-red-600 dark:text-red-500 hover:underline"
    onclick="document.getElementById('{{$modal_id}}-form').action = '{{ $action }}'">
    {{-- Here you can change the icon to whatever you want --}}
    <i class="ri-delete-bin-fill"></i>
</button>
