<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Détails de l'annonce</title>
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-gray-100">
@include('tools/buttonHome')
@include('tools/buttonList')

<div class="mx-auto px-10 pt-8 pb-5 max-w-screen-2xl">
    <h1 class="text-3xl font-bold text-blue-600 text-center mb-6">{{ $annonce->titre }}</h1>
    <p class="text-gray-700 mb-4">{{ $annonce->description }}</p>
</div>

<div class="container mx-auto flex">
    <div class="w-3/4 pr-4">
        <div id="carouselExampleIndicators" class="carousel">
            <div class="carousel-inner">
                @foreach ($images as $image)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img src="{{ asset($image->chemin_image) }}" class="imgggggggggg" alt="Image">
                    </div>
                @endforeach
            </div>
            <button id="prevButton" class="carousel-control-prev">Précédent</button>
            <button id="nextButton" class="carousel-control-next">Suivant</button>
        </div>
    </div>

    <div class="w-1/2 pl-4">

        <div>
            <!-- Informations supplémentaires sur l'annonce -->
            <p class="bg-blue-600 text-white mb-2 p-4 text-center rounded" id="annonceAdresse">{{ $annonce->adresse }}</p>
            <p class="bg-blue-600 text-white mb-2 p-4 text-center rounded">{{ $annonce->prix }} €</p>
        </div>

        <!-- AIzaSyCCAjpCNHZXQiBRY3MSoZ7YYOQST1HtF0U -->
        <div class="my-4">
            <!-- Carte Google -->
            <div id="map" class="w-full h-96 bg-gray-200 rounded"></div>
        </div>

        <div class="my-6 text-center">
            <!-- Ajouter en Favoris -->
            @auth
                @if (Auth::user()->favoris->contains($annonce->id))
                <form action="{{ route('favori.toggle', $annonce->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Supprimer des favoris
                    </button>
                </form>
                @else
                <form action="{{ route('favori.toggle', $annonce->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Ajouter aux favoris
                    </button>
                </form>
                @endif
            @else
                <p class="text-gray-700 mb-4">Connectez-vous pour ajouter cette annonce aux favoris.</p>
                <a href="/login" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-orange-600 transition duration-300">Se connecter</a>
            @endauth
        </div>
    </div>
</div>

<div class="container mx-auto flex my-8">
    <div class="bg-white p-8 rounded-lg w-1/3 mr-8">
      <h2 class="text-2xl font-bold text-center mx-6 mb-4">Contacter le propriétaire</h2>
      <form>
        <div class="mb-4">
          <label for="objet" class="block text-lg font-medium text-gray-700">Nom</label>
          <input type="text" id="objet" name="objet" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
        </div>
        <div class="mb-4">
          <label for="mail" class="block text-lg font-medium text-gray-700">Mail</label>
          <input id="mail" name="mail" rows="4" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required></input>
        </div>
        <div class="mb-4">
          <label for="telephone" class="block text-lg font-medium text-gray-700">Téléphone</label>
          <input id="telephone" name="telephone" rows="4" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required></input>
        </div>
        <div class="text-center">
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">Envoyer</button>
        </div>
      </form>
    </div>
    
    <div class="bg-gray-500 text-white p-8 rounded-lg shadow-md w-2/3">
        <h2 class="text-3xl font-bold text-center mb-6">Informations</h2>
        <ul class="space-y-5 p-10 text-xl text-left">
            <div class="flex justify-around items-center">
                <li>Taille : {{ $annonce->metre }} m²</li>
                <li>Type : {{ $annonce->type }}</li>
                <li>État : {{ $annonce->etat }}</li>
            </div>
            <div class="flex justify-around items-center pt-10">
                <li>Nombre de chambre : {{ $annonce->chambre }}</li>
                <li>Nombre de salle de bain : {{ $annonce->salleDeBain }}</li>
            </div>
            <div class="flex justify-around items-center pt-10">
                <li>Parking : {{ $annonce->parking ? 'Oui' : 'Non' }}</li>
                <li>Garage : {{ $annonce->garage ? 'Oui' : 'Non' }}</li>
                <li>Terrain : {{ $annonce->terrain ? 'Oui' : 'Non' }}</li>
            </div>
        </ul>
    </div>
</div>

<script src="{{ asset('js/caroussel.js') }}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCAjpCNHZXQiBRY3MSoZ7YYOQST1HtF0U&callback=initMap"></script>
<script src="{{ asset('js/map.js') }}"></script>
</body>
</html>
