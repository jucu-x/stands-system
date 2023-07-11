/** @type {import('tailwindcss').Config} */
export default {
    content: [
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
        },
        extend: {
            colors:{
                fitectur:{
                    red: '#d21d22',
                    blue: '#2532dc',
                    blue2: '#284592',
                    gray:{
                        1: '#737373',
                        2: '#ebebeb',
                        3: '#9d9d9c',
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
        }
    },
    plugins: [
        require('flowbite/plugin')
    ]
}

