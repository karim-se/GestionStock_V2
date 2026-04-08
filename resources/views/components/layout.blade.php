<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>{{ $title ?? 'MonProjet Laravel' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
   
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

   <x-header>
            {{ $slot }}
   </x-header >

    <main class="flex-grow container mx-auto p-4">
        {{ $slot }}
    </main>

    
  


   <x-footer>
            {{ $slot }}
   </x-footer >
   @stack('scripts')
</body>
</html>