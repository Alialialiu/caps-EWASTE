/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./views/**/*.{html,js,php}", "./src/**/**/*.{html,js,php}", "./src/**/**/**/*.{html,js,php}","./views/*.{html,js,php}"],
    theme: {
        extend: {},
        fontFamily: {
      "popin": [ "Poppins", "sans-serif"],
         },
        colors: {
        transparent: 'transparent',
        current: 'currentColor',
        'bgbox': '#F2FFFC',
        'bgtext': '#46E84B',
        'bgdevider': '#46E84B',
        'mainbg': '#FDE5D4',
        'sidenavbg': '#46E84B',
        'silver': '#ecebff',
        'bubble-gum': '#ff77e9',
        'bermuda': '#78dcca',
            },
    },
    plugins: [require("daisyui")],
    daisyui: {
        themes: false,
        darkTheme: "light",
    },
};
