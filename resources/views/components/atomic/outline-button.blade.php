@props([
    'color' => 'default', // default, dark, green, red, yellow, purple
    'type' => 'button',
    'base_class' => ['hover:text-white', 'border', 'focus:ring-4', 'focus:outline-none', 'font-medium', 'rounded-lg', 'text-sm', 'px-5', 'py-2.5', 'text-center', 'mr-2', 'mb-2'],
    'default_class' => ['text-blue-700', 'border-blue-700', 'hover:bg-blue-800', 'focus:ring-blue-300', 'dark:border-blue-500', 'dark:text-blue-500', 'dark:hover:text-white', 'dark:hover:bg-blue-500', 'dark:focus:ring-blue-800'],
    'dark_class' => ['text-gray-900', 'border-gray-800', 'hover:bg-gray-900', 'focus:ring-gray-300', 'dark:border-gray-600', 'dark:text-gray-400', 'dark:hover:text-white', 'dark:hover:bg-gray-600', 'dark:focus:ring-gray-800'],
    'green_class' => ['text-green-700', 'border-green-700', 'hover:bg-green-800', 'focus:ring-green-300', 'dark:border-green-500', 'dark:text-green-500', 'dark:hover:text-white', 'dark:hover:bg-green-600', 'dark:focus:ring-green-800'],
    'red_class' => ['text-red-700', 'border-red-700', 'hover:bg-red-800', 'focus:ring-red-300', 'dark:border-red-500', 'dark:text-red-500', 'dark:hover:text-white', 'dark:hover:bg-red-600', 'dark:focus:ring-red-900'],
    'yellow_class' => ['text-yellow-400', 'border-yellow-400', 'hover:bg-yellow-500', 'focus:ring-yellow-300', 'dark:border-yellow-300', 'dark:text-yellow-300', 'dark:hover:text-white', 'dark:hover:bg-yellow-400', 'dark:focus:ring-yellow-900'],
    'purple_class' => ['text-purple-700', 'border-purple-700', 'hover:bg-purple-800', 'focus:ring-purple-300', 'dark:border-purple-400', 'dark:text-purple-400', 'dark:hover:text-white', 'dark:hover:bg-purple-500', 'dark:focus:ring-purple-900'],
])
<div>

    <button type="{{$type}}" @class(array_merge(
            $base_class,
            (function ($color, $default_class, $dark_class, $green_class, $red_class, $yellow_class, $purple_class) {
                switch ($color) {
                    case 'dark':
                        return $dark_class;
                    case 'green':
                        return $green_class;
                    case 'red':
                        return $red_class;
                    case 'yellow':
                        return $yellow_class;
                    case 'purple':
                        return $purple_class;

                    default:
                        return $default_class;
                }
            })($color, $default_class, $dark_class, $green_class, $red_class, $yellow_class, $purple_class)))>
        {{ $slot }}
    </button>
    {{-- <button type="button"
        class="text-gray-900 border-gray-800 hover:bg-gray-900 focus:ring-gray-300 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800">Dark</button>
    <button type="button"
        class="text-green-700 border-green-700 hover:bg-green-800 focus:ring-green-300 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">Green</button>
    <button type="button"
        class="text-red-700 border-red-700 hover:bg-red-800 focus:ring-red-300 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Red</button>
    <button type="button"
        class="text-yellow-400 border-yellow-400 hover:bg-yellow-500 focus:ring-yellow-300 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">Yellow</button>
    <button type="button"
        class="text-purple-700 border-purple-700 hover:bg-purple-800 focus:ring-purple-300 dark:border-purple-400 dark:text-purple-400 dark:hover:text-white dark:hover:bg-purple-500 dark:focus:ring-purple-900">Purple</button> --}}
</div>
