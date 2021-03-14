const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            animation:{
                'lift': 'lift 0.3s ease-out 0s 1 normal forwards',
            },
            keyframes: {
                lift: {
                    '0%': { transform: 'translate(0,0rem)' },
                    '100%': { transform: 'translate(0,-0.5rem)' },
                }
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
        animation: ['hover']
    },

    plugins: [require('@tailwindcss/forms')],
};
