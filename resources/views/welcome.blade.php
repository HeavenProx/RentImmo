<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="font-sans">
        
        @include('tools/navbar')

        <section class="relative flex items-center justify-center h-screen bg-cover bg-center" 
        style="background-image: url('{{ asset('images/2-personne-dos-visite.svg') }}'); ">
            <div class="absolute inset-0 bg-black opacity-40"></div> 
            <div class="relative z-10 text-center text-white">
                <h1 class="text-6xl font-bold">RentImmo</h1>
                <p class="mt-4 text-xl">Achetez et vendez des biens immobiliers facilement</p>
            </div>
        </section>

        <div class="flex-3 flex justify-center p-10">
          <div class="flex-grow">
            <input type="text" placeholder="Rechercher" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
          </div>
          <div class="flex-grow ml-4">
            <input type="text" placeholder="Ville" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
          </div>
          <div class="flex-grow ml-4">
            <input type="text" placeholder="Code Postal" class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
          </div>
          <button class="ml-4 bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md">
            <img src="{{ asset('images/loupe.svg') }}" alt="Loupe de recherche" width="20" height="20">
          </button>
        </div>

        @include('tools/footer')         
    </body>
</html>
