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
            "emerald",
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
                // mytheme: {
                //     "primary": "#7900ff",
                //     "secondary": "#3f00ff",
                //     "accent": "#00dc84",
                //     "neutral": "#12283e",
                //     "base-100": "#fff7f6",
                //     "info": "#00f1ff",
                //     "success": "#00f6cb",
                //     "warning": "#d39200",
                //     "error": "#ff7386",
                // },
                // mytheme: {
                //     "primary": "#ff00cf",
                //     "secondary": "#00e930",
                //     "accent": "#ff8300",
                //     "neutral": "#001016",
                //     "base-100": "#fff7f6",
                //     "info": "#0070e1",
                //     "success": "#00d18b",
                //     "warning": "#cb6b00",
                //     "error": "#e92d4e",
                // },
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
