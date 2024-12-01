import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */




export default {
    content: [
        "./resources/**/*.blade.php",
    ],
    theme : {
        extend: {
            animation: {
                progress: 'progress 1.5s infinite linear',
                fadeUp: 'fadeUp 0.5s ease-out',
            },
            keyframes: {
                progress: {
                    '0%': { transform: ' translateX(0) scaleX(0)' },
                    '40%': { transform: 'translateX(0) scaleX(0.4)' },
                    '100%': { transform: 'translateX(100%) scaleX(0.5)' },
                },
                fadeUp: {
                    '0%': { opacity: '0', transform: 'translateY(20px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
            },
            screens: {
                xs: '350px',
            },
            transformOrigin: {
                'left-right': '0% 50%',
            },
            colors: {
                'btn-primary': '#227EEE',
                'footer-bg' : '#212121',
                'primary': '#1F60AD',
                'secondary': '#EE2E24',
                'heading-text': '#FCFEFF',
                'brand-100': '#F2F8FF',
                'brand-200': '#9CC6F7',
                'brand-300':'#4E91E1',
                'brand-400':'#2D76CB',
                'brand-500':'#1F60AD',
                'brand-600':'#0F4F9A',
                'brand-700':'#0A3F7F',
                'brand-800':'#022E63',
                'brand-900':'#001733',

                'brand-2-100': '#F2F8FF',
                'brand-2-200': '#9CC6F7',
                'brand-2-300':'#4E91E1',
                'brand-2-400':'#2D76CB',
                'brand-2-500':'#1F60AD',
                'brand-2-600':'#0F4F9A',
                'brand-2-700':'#0A3F7F',
                'brand-2-800':'#022E63',
                'brand-2-900':'#001733',

                'primary-100': '#F7FBFF',
                'primary-200': '#A8CCF7',
                'primary-300': '#6FABF1',
                'primary-400': '#4599FC',
                'primary-500': '#157AF1',
                'primary-600': '#1067CE',
                'primary-700': '#074C9D',
                'primary-800': '#053874',
                'primary-900': '#021D3D',

                'secondary-100': '#F9E2E1',
                'secondary-200': '#FDC5C2',
                'secondary-300': '#F58F8A',
                'secondary-400': '#EF6058',
                'secondary-500': '#EF4239',
                'secondary-600': '#C71E14',
                'secondary-700': '#941008',
                'secondary-800': '#5E0904',
                'secondary-900': '#230301',

            },
            fontSize:{
                heading:40
            },
            letterSpacing: {
                'heading-tight': 1,
            }

        }

    },
    plugins: [forms],
};
