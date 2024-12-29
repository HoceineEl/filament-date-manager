/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'selector',
  content: ["./resources/views/**/*.blade.php", "./src/**/*.php"],
  safelist: [
    'bg-gray-200',
    'bg-white/10',
  ],
  theme: {

  },
  plugins: [require('@tailwindcss/typography')],
};
