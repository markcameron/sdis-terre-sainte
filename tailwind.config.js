
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./app/View/Components/*.php",
    "./app/View/Components/**/*.php",
  ],

  safelist: [
    {
        pattern: /grid-cols-(1|2|3|4|6)/,
        variants: ['sm', 'md', 'lg', 'xl', '2xl'],
    },
    {
        pattern: /text-(black|white|slate|gray|zinc|neutral|stone|red|orange|amber|yellow|lime|green|emerald|teal|cyan|sky|blue|indigo|violet|purple|fuchsia|pink|rose)-(50|100|200|300|400|500|600|700|800|900)/,
    },
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['DM Sans', ...defaultTheme.fontFamily.sans],
        barlow: ['Barlow', ...defaultTheme.fontFamily.sans],
        barlowCondensed: ['Barlow Condensed', ...defaultTheme.fontFamily.sans],
      },
      colors: {
        primary: {
          DEFAULT: '#E93C3D',
          dark: '#B51213',
        },
        secondary: '#2C75BC',
        black: '#111',
      }
    },
  },

  plugins: [],
}
