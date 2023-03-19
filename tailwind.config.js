const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')
/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/filament/pages/*.blade.php',
        './vendor/filament/**/*.blade.php'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                danger: colors.rose,
                primary: colors.blue,
                success: colors.green,
                warning: colors.yellow,
                amber: {
                    100: '#fff8e1',
                    200: '#ffecb3',
                    300: '#ffe082',
                    400: '#F7CE64',
                    500: '#deb95a',
                    600: '#c69e56',
                    700: '#af8c4c',
                    800: '#977b3c',
                    900: '#856a2c',
                  },
                  lime: {
                    100: '#afeacd',
                    200: '#9be5c1',
                    300: '#86dfb4',
                    400: '#36CA82',
                    500: '#2ba268',
                    600: '#1f9357',
                    700: '#197b4e',
                    800: '#126a45',
                    900: '#0e5a3c',
                  },
                  rose: {
                    100: '#fbe9e7',
                    200: '#ffccc7',
                    300: '#ffa7a7',
                    400: '#C88986',
                    500: '#B77C7C',
                    600: '#8A575C',
                    700: '#7C4C4C',
                    800: '#6F4240',
                    900: '#633C3C',
                  },
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
