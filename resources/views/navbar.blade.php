<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar avec Recherche</title>
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
  <nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <div class="flex-shrink-0">
          <a href="/" class="text-2xl font-bold text-indigo-600">Mon Site</a>
        </div>
        <div class="flex-3 flex justify-center">
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
        @guest
          <div class="flex items-center">
            <a href="/login" class="mr-5 text-gray-600 mr-4 hover:text-gray-900">Connexion</a>
            <a href="/signup" class="text-indigo-600 hover:text-indigo-900">Inscription</a>
          </div>
        @else
          <a href="/customer-description" class="mr-5 text-gray-600 mr-4 hover:text-gray-900">
            <span><p>{{ auth()->user()->prenom }}</p>
            <p>{{ auth()->user()->nom }}</p></span>
          </a>
          <a href="/logout" class="text-indigo-600 hover:text-indigo-900">Se déconnecter</a>
        @endguest
       
      </div>
    </div>
  </nav>
</body>
</html>
