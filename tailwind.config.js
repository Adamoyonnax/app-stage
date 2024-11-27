module.exports = {
    content: [
      "./resources/**/*.blade.php",  // inclut les fichiers Blade
      "./resources/**/*.js",         // inclut les fichiers JavaScript
      "./resources/**/*.vue",        // inclut les fichiers Vue
    ],
    theme: {
      extend: {},
    },
    plugins: [
      require('@tailwindcss/forms'),  // plugin de personnalisation des formulaires
    ],
  }
