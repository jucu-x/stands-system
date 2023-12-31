import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    darkMode: 'class',
    theme: {
        fontFamily: {
            sans: ['Lato', 'sans-serif'],
            serif: ['Playfair Display', 'serif'],
            mono: ['JetBrains Mono', 'monospace']
        },
        extend: {
            colors:{
                fitectur:{
                    red: '#d21d22',
                    blue:{
                        normal:'#25325d',
                        dark: '#192240',
                        alt: '#284592',
                    },
                    gray:{
                        1: '#737373',
                        2: '#ebebeb',
                        3: '#9d9d9c',
                        dark: '#1c1c1c'
                    },
                    purple: '#572e7b',
                    yellow: '#f8da29',
                    pink:{
                        strong: '#b61d78',
                        light: '#b85c9e',
                    },
                    orange:{
                        strong: '#ee8a18',
                        light: '#f4a03e'
                    },
                    green:{
                        strong: '#128260',
                        light: '#7eb933',
                    }
                }
            }
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin')
    ],
};
