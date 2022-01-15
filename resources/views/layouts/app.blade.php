<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/loader.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />
    
    <style>
        @keyframes loader-rotate {
            0% {
                transform: rotate(0);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        .loader {
            border-right-color: transparent;
            animation: loader-rotate 1s linear infinite;
        }

    </style>

    @livewireStyles

  </head>

  <body>

    <div class="overflow-x-auto">  

      <!-- Page Content -->

      <main>
        
        {{ $slot }}
      </main>
      
    </div>

    @stack('modals')

    @livewireScripts

   <!-- Scripts -->

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.1/chart.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        

  </body>

  
</html>
