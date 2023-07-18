@props([
    'color' => 'default', // default, dark, green, red, yellow, purple
    'type' => 'button',
    'class' => [],
    'base_class' => ['focus:outline-none', 'text-white', 'focus:ring-4', 'font-medium', 'rounded-lg', 'text-base', 'px-5', 'py-3'],
    'default_class' => ['bg-blue-700', 'hover:bg-blue-800', 'focus:ring-blue-300', 'dark:bg-blue-600', 'dark:hover:bg-blue-700', 'dark:focus:ring-blue-800'],
    'dark_class' => ['bg-gray-800', 'hover:bg-gray-900', 'focus:ring-gray-300', 'dark:bg-gray-800', 'dark:hover:bg-gray-700', 'dark:focus:ring-gray-700', 'dark:border-gray-700'],
    'green_class' => ['bg-green-700', 'hover:bg-green-800', 'focus:ring-green-300', 'dark:bg-green-600', 'dark:hover:bg-green-700', 'dark:focus:ring-green-800'],
    'red_class' => ['bg-red-700', 'hover:bg-red-800', 'focus:ring-red-300', 'dark:bg-red-600', 'dark:hover:bg-red-700', 'dark:focus:ring-red-900'],
    'yellow_class' => ['bg-yellow-400', 'hover:bg-yellow-500', 'focus:ring-yellow-300', 'dark:focus:ring-yellow-900'],
    'purple_class' => ['bg-purple-700', 'hover:bg-purple-800', 'focus:ring-purple-300', 'dark:bg-purple-600', 'dark:hover:bg-purple-700', 'dark:focus:ring-purple-900'],
])

<button type="{{ $type }}" {{ $attributes }} @class(array_merge(
        $base_class,
        (function (
            $color,
            $default_class,
            $dark_class,
            $green_class,
            $red_class,
            $yellow_class,
            $purple_class) {
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
        })(
            $color,
            $default_class,
            $dark_class,
            $green_class,
            $red_class,
            $yellow_class,
            $purple_class),
        $class))>
    {{ $slot }}
</button>
