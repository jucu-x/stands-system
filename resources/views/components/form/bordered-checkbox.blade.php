@props(['name' => 'checkbox', 'label' => 'Presione aquí', 'checked' => false])
<div {{$attributes->merge(['class' => 'flex items-center justify-start px-4 border border-gray-200 rounded dark:border-gray-700'])}}>
    <input @checked($checked) id="{{ $name }}" type="checkbox"
        name="{{ $name }}"
        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="{{ $name }}"
        class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 text-left">{{ $label }}</label>
</div>
