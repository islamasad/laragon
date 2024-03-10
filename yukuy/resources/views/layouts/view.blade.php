<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://unpkg.com/htmx.org@1.9.9" integrity="sha384-QFjmbokDn2DjBjq+fM+8LUIVrAgqcNW2s0PjAxHETgRn9l4fvX31ZxDxvwQnyMOX" crossorigin="anonymous"></script>
        <style>
            @keyframes fade-in {
              from { opacity: 0; }
            }
         
            @keyframes fade-out {
              to { opacity: 0; }
            }
         
            @keyframes slide-from-right {
              from { transform: translateX(90px); }
            }
         
            @keyframes slide-to-left {
              to { transform: translateX(-90px); }
            }
         
            .slide-it {
              view-transition-name: slide-it;
            }
         
            ::view-transition-old(slide-it) {
              animation: 180ms cubic-bezier(0.4, 0, 1, 1) both fade-out,
              600ms cubic-bezier(0.4, 0, 0.2, 1) both slide-to-left;
            }
            ::view-transition-new(slide-it) {
              animation: 420ms cubic-bezier(0, 0, 0.2, 1) 90ms both fade-in,
              600ms cubic-bezier(0.4, 0, 0.2, 1) both slide-from-right;
            }

            tr.htmx-swapping td {
              opacity: 0;
              transition: opacity 1s ease-out;
            }
            
            
         </style>
          
    </head>
    <body class="antialiased overflow-x-hidden overflow-y-hidden">
      <div class="" hx-boost="true" hx-swap="transition:true">
        <!-- Page Content -->
        <main id="content" class="slide-it">
          <header class="bg-white opacity-75 flex items-center fixed bottom-0 md:inset-y-0 md:right-0 w-full h-16 h- md:h-screen md:w-32 z-10">
            <div class="container mx-auto">
              <div class="flex flex-row md:flex-col items-center justify-around md:justify-center relative my-auto md:my-2 md:mx-auto md:space-y-4 md:items-start ">
                <div class="px-4">
                  <a href="#one">One</a>
                </div>
                <div class="px-4">
                  <a href="#two">Two</a>
                </div>
                <div class="px-4">
                  <a href="#three">Three</a>
                </div>
                <div class="px-4">
                  <a href="#three">Four</a>
                </div>
                <div class="px-4">
                  <a href="#three">Five</a>
                </div>
                
                
              </div>
            </div>
          </header>
          <section class="container mx-auto">
            {{ $slot }}
          </section>
        </main>
      </div>
    </body>
</html>



