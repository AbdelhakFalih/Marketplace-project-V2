module.exports = {
    content: [
        './resources/views/**/*.blade.php',
        './resources/views/*.blade.php',
        './public/js/*.js',
    ],
    plugins: [],
    darkMode: 'selector', // Use [data-theme="dark"]
    theme: {
        extend: {
            colors: {
                primary: { 50: '#f0f9ff', 500: '#38a169', 600: '#2f855a', 700: '#276749' },
                user: { 50: '#f8fafc', 500: '#6366f1', 600: '#4f46e5', 700: '#4338ca' },
                admin: { 50: '#fef2f2', 500: '#ef4444', 600: '#dc2626', 700: '#b91c1c' },
                cooperative: { 500: '#f0fdf4', 500: '#22c55e', 600: '#16a34a', 700: '#15803d' },
                'primary-green': { DEFAULT: '#38a169', dark: '#2f855a', light: '#48bb78' },
                'secondary-green': '#68d391',
                'accent-green': '#c6f6d5',
                'success-green': '#38a169',
                'warning-green': '#d69e2e',
                'danger-red': '#e53e3e',
            },
        },
    }
};
