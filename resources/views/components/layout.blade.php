<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
  </head>
  <body class="bg-neutral-900"> 
    {{-- memasukkan navbarnya --}}
   <x-navbar></x-navbar>
   {{-- memasukkan hero section nya --}}
   <x-header>{{ $title }}</x-header>
    <div class="container mx-auto">
        {{ $slot }}
    </div>
    {{-- memasukkan footer --}}
    <x-footer></x-footer>
  </body>
</html>
