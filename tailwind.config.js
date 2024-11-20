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
                    "primary": "#2957de",
                    "primary-content": "#eff3fc",
                    "secondary": "#ed8ed2",
                    "secondary-content": "#02050e",
                    "accent": "#e45373",
                    "accent-content": "#02050e",
                    "neutral": "#0c1c40",
                    "base-100": "#eff3fc",
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
            colors: {
                "primary-20": "oklch(var(--p) / 0.2)",
                "secondary-20": "oklch(var(--s) / 0.2)",
            },
        },
    },

    plugins: [typography, require('daisyui')],
};
