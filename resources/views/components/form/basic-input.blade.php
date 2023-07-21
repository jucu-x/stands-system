@props(['label' => 'Task', 'value', 'name' => 'title', 'placeholder' => 'Gobernar el mundo...', 'required' => false, 'maxlength' => '524288'])
<div {{ $attributes }}>
    <label for="{{ $name }}"
        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>

    <input @if ($value != null) value="{{ $value }}" @endif name="{{ $name }}" type="text"
        id="{{ $name }}"
        class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="{{ $placeholder }}" @required($required) maxlength="{{ $maxlength }}">
</div>
