@props(['href'=>'#', ])
<div>
    <a href="{{ $href }}"
        class="mt-4 inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
        {{$slot}}
    </a>
</div>
