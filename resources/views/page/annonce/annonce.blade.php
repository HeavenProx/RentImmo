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
<body class="">

<div class="mx-auto px-10 py-3 max-w-screen-2xl">
    <h1 class="text-3xl font-bold text-blue-600 text-center mb-6">{{ $annonce->titre }}</h1>
    <p class="text-gray-700 mb-4">{{ $annonce->description }}</p>
</div>

<div class="container mx-auto  flex">
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
                <form action="" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-orange-600 transition duration-300">Ajouter aux favoris</button>
                </form>
            @else
                <p class="text-gray-700 mb-4">Connectez-vous pour ajouter cette annonce aux favoris.</p>
                <a href="/login" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-orange-600 transition duration-300">Se connecter</a>
            @endauth
        </div>
    </div>
</div>

<script>
    
</script>

<script src="{{ asset('js/caroussel.js') }}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCAjpCNHZXQiBRY3MSoZ7YYOQST1HtF0U&callback=initMap"></script>
<script src="{{ asset('js/map.js') }}"></script>
</body>
</html>
