import defaultTheme from 'tailwindcss/defaultTheme';
// import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    daisyui: {
        themes: [
            // DAISYUI THEMES
            // "light",
            // "dark", 
            // "cupcake",
            // "bumblebee",
            // "emerald",
            // "corporate",
            // "lofi",
            // "synthwave",
            // "retro",
            // "cyberpunk",
            // "valentine",
            // "halloween",
            // "garden",
            // "forest",
            // "aqua",
            // "lofi",
            // "pastel",
            // "fantasy",
            // "wireframe",
            // "black",
            // "luxury",
            // "dracula",
            // "cmyk",
            // "autumn",
            // "business",
            // "acid",
            // "lemonade",
            // "night",
            // "coffee",
            // "winter",
            // "dim",
            // "nord",
            // "sunset",

            {
                // CUSTOM THEMES
                realtimeColorsTheme: {
                    "primary": "#d8ed8d",
                    "primary-content": "#090b03",
                    "secondary": "#7e9d0e",
                    "secondary-content": "#090b03",
                    "accent": "#c7f90e",
                    "accent-content": "#090b03",
                    "neutral": "#313c10",
                    "base-100": "#090b03",
                },
            },

        ]
    },

    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [typography, require('daisyui')],
};
