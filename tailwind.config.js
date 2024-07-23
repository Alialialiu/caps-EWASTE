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
        'bgbox': '#B7FBB8',
        'bgtext': '#023106',
        'bgdevider': '#0dac13',
        'mainbg': '#dafeda',
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
