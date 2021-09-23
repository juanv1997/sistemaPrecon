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
        
         {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> --}}
        {{-- <link rel="stylesheet" href="/resources/demos/style.css"> --}}

        
        
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
{{-- <style>

    .hasImage:hover section {
      background-color: rgba(5, 5, 5, 0.4);
    }
    .hasImage:hover button:hover {
      background: rgba(5, 5, 5, 0.45);
    }

    #overlay p,
    i {
      opacity: 0;
    }

    #overlay.draggedover {
      background-color: rgba(255, 255, 255, 0.7);
    }
    #overlay.draggedover p,
    #overlay.draggedover i {
      opacity: 1;
    }

    .group:hover .group-hover\:text-blue-800 {
      color: #2b6cb0;
    }
    </style> --}}

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        {{-- <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script> --}}
        
        {{-- <script src="https://unpkg.com/idb/build/iife/index-min.js"></script> --}}
        {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js"></script> --}}
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> 
        {{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  --}}

    </head>
    <body>

          <div class="overflow-x-auto">  <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
