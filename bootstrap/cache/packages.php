<?php return array (
  'anhskohbo/no-captcha' => 
  array (
    'aliases' => 
    array (
      'NoCaptcha' => 'Anhskohbo\\NoCaptcha\\Facades\\NoCaptcha',
    ),
    'providers' => 
    array (
      0 => 'Anhskohbo\\NoCaptcha\\NoCaptchaServiceProvider',
    ),
  ),
  'arcanedev/log-viewer' => 
  array (
    'providers' => 
    array (
      0 => 'Arcanedev\\LogViewer\\LogViewerServiceProvider',
      1 => 'Arcanedev\\LogViewer\\Providers\\DeferredServicesProvider',
    ),
  ),
  'barryvdh/laravel-dompdf' => 
  array (
    'providers' => 
    array (
      0 => 'Barryvdh\\DomPDF\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'PDF' => 'Barryvdh\\DomPDF\\Facade',
    ),
  ),
  'facade/ignition' => 
  array (
    'aliases' => 
    array (
      'Flare' => 'Facade\\Ignition\\Facades\\Flare',
    ),
    'providers' => 
    array (
      0 => 'Facade\\Ignition\\IgnitionServiceProvider',
    ),
  ),
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'fruitcake/laravel-cors' => 
  array (
    'providers' => 
    array (
      0 => 'Fruitcake\\Cors\\CorsServiceProvider',
    ),
  ),
  'intervention/image' => 
  array (
    'aliases' => 
    array (
      'Image' => 'Intervention\\Image\\Facades\\Image',
    ),
    'providers' => 
    array (
      0 => 'Intervention\\Image\\ImageServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'livewire/livewire' => 
  array (
    'aliases' => 
    array (
      'Livewire' => 'Livewire\\Livewire',
    ),
    'providers' => 
    array (
      0 => 'Livewire\\LivewireServiceProvider',
    ),
  ),
  'mews/captcha' => 
  array (
    'aliases' => 
    array (
      'Captcha' => 'Mews\\Captcha\\Facades\\Captcha',
    ),
    'providers' => 
    array (
      0 => 'Mews\\Captcha\\CaptchaServiceProvider',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'simplesoftwareio/simple-qrcode' => 
  array (
    'providers' => 
    array (
      0 => 'SimpleSoftwareIO\\QrCode\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'QrCode' => 'SimpleSoftwareIO\\QrCode\\Facade',
    ),
  ),
  'yoeunes/toastr' => 
  array (
    'aliases' => 
    array (
      'Toastr' => 'Yoeunes\\Toastr\\Facades\\Toastr',
    ),
    'providers' => 
    array (
      0 => 'Yoeunes\\Toastr\\ToastrServiceProvider',
    ),
  ),
);