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
          <a href="/" class="text-2xl font-bold text-indigo-600">RentImmo</a>
        </div>


        <div class="text-center">
            <div class="m-4">
                <a href="/annonces/create" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md inline-block">
                    Vendre mon bien
                </a>
                <a href="" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-md inline-block ml-2">
                    Chercher mon bien
                </a>
            </div>
        </div>
        
        @guest
            <div class="flex items-center">
                <a href="/login" class="mr-5 text-gray-600 mr-4 hover:text-gray-900">Connexion</a>
                <a href="/signup" class="text-indigo-600 hover:text-indigo-900">Inscription</a>
            </div>
        @else
          <a href="{{ route('user.description') }}" class="mr-5 text-gray-600 mr-4 hover:text-gray-900">
                <span>
                    <p>{{ auth()->user()->prenom }}</p>
                    <p>{{ auth()->user()->nom }}</p>
                </span>
            </a>
            <a href="/logout" class="text-indigo-600 hover:text-indigo-900">Se déconnecter</a>
        @endguest
       
      </div>
    </div>
  </nav>
</body>
</html>
