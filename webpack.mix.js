const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   // tambahkan ini:
   .copy(
     'node_modules/owl.carousel/dist/assets/owl.carousel.min.css',
     'public/vendors/owl.carousel/dist/assets/owl.carousel.min.css'
   )
   .copy(
     'node_modules/owl.carousel/dist/assets/owl.theme.default.min.css',
     'public/vendors/owl.carousel/dist/assets/owl.theme.default.min.css'
   )
   .copy(
     'node_modules/owl.carousel/dist/owl.carousel.min.js',
     'public/vendors/owl.carousel/dist/owl.carousel.min.js'
   );

