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

    <style>
        dialog[open] {
        animation: appear .30s cubic-bezier(0, 1.8, 1, 1.8);
      }

        dialog::backdrop {
          background: linear-gradient(45deg, rgba(0, 0, 0, 0.5), rgba(54, 54, 54, 0.5));
          backdrop-filter: blur(3px);
        }


      @keyframes appear {
        from {
          opacity: 0;
          transform: translateX(-3rem);
        }

        to {
          opacity: 1;
          transform: translateX(0);
        }
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.1/chart.min.js" integrity="sha512-O2fWHvFel3xjQSi9FyzKXWLTvnom+lOYR/AUEThL/fbP4hv1Lo5LCFCGuTXBRyKC4K4DJldg5kxptkgXAzUpvA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
        {{-- <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script> --}}
        {{-- <script src="https://unpkg.com/idb/build/iife/index-min.js"></script> --}}
        {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script> --}}
        {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>  --}}
       
        {{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  --}}
        {{-- <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script> --}}
        

  </body>

</html>
