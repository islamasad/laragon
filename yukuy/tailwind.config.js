import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            scale: {
                '0': '0',
                '25': '.25',
                '50': '.5',
                '75': '.75',
                '90': '.9',
                '95': '.95',
                '100': '1',
                '105': '1.05',
                '110': '1.1',
                '115': '1.15',
                '120': '1.2',
                '125': '1.25',
                '130': '1.3',
                '135': '1.35',  // Tambahkan nilai skala 135
                '140': '1.4',   // Tambahkan nilai skala 140
                '145': '1.45',  // Tambahkan nilai skala 145
                '150': '1.5',
                '155': '1.55',  // Tambahkan nilai skala 155
                '160': '1.6',   // Tambahkan nilai skala 160
                '165': '1.65',  // Tambahkan nilai skala 165
                '170': '1.7',   // Tambahkan nilai skala 170
                '175': '1.75',  // Tambahkan nilai skala 175
                '180': '1.8',   // Tambahkan nilai skala 180
                '185': '1.85',  // Tambahkan nilai skala 185
                '190': '1.9',   // Tambahkan nilai skala 190
                '195': '1.95',  // Tambahkan nilai skala 195
                '200': '2',     // Tambahkan nilai skala 200
                '205': '2.05',  // Tambahkan nilai skala 205
                '210': '2.1',   // Tambahkan nilai skala 210
                '215': '2.15',  // Tambahkan nilai skala 215
                '220': '2.2',
                '225': '2.25',  // Tambahkan nilai skala 225
                '230': '2.3',   // Tambahkan nilai skala 230
                '235': '2.35',  // Tambahkan nilai skala 235
                '240': '2.4',   // Tambahkan nilai skala 240
                '245': '2.45',  // Tambahkan nilai skala 245
                '250': '2.5',   // Tambahkan nilai skala 250
            },
        },
    },

    plugins: [forms],
};
