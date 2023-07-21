@props(['label' => 'Task', 'value'=>null, 'name' => 'title', 'placeholder'=>'Gobernar el mundo...', 'min'=>null, 'max'=>null, 'step'=>'1', 'required'=>false])
<div {{$attributes}}>
    <label for="{{ $name }}"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>

    @if ($value != null)
        <input value="{{ $value }}" name="{{ $name }}" type="number" id="{{ $name }}"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            min="{{$min}}"
            max="{{$max}}"
            step="{{$step}}"
            placeholder="{{$placeholder}}" @required($required)>
    @else
        <input name="{{ $name }}" type="number" id="{{ $name }}"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            min="{{$min}}"
            max="{{$max}}"
            step="{{$step}}"
            placeholder="{{$placeholder}}" @required($required)>
    @endif

</div>
