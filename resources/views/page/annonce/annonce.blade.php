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

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-blue-600 text-center mb-6">{{ $annonce->titre }}</h1>
    <p class="text-gray-700 mb-4">{{ $annonce->description }}</p>

    <div id="carouselExampleIndicators" class="carousel slide relative" data-bs-ride="carousel">
        <div class="carousel-inner relative w-full overflow-hidden rounded-lg">
            @foreach ($images as $image)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }} float-left w-full">
                    <img src="{{ asset($image->chemin_image) }}" class="block w-full h-96 object-cover imgggggggggg" alt="Image">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev absolute top-0 bottom-0 left-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next absolute top-0 bottom-0 right-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="my-6">
        <!-- Informations supplémentaires sur l'annonce -->
        <p class="bg-blue-600 text-white mb-2 p-4 text-center rounded">{{ $annonce->adresse }}</p>
        <p class="bg-blue-600 text-white mb-2 p-4 text-center rounded">{{ $annonce->prix }} €</p>
    </div>

    <div class="my-6">
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


@push('scripts')
<script>
    // Script pour initialiser la carte Google
    function initMap() {
        // Coordonnées de l'annonce (exemple)
        var annonceLocation = { lat: {{ $annonce->latitude }}, lng: {{ $annonce->longitude }} };
        
        // Options de la carte
        var mapOptions = {
            zoom: 15,
            center: annonceLocation,
        };
        
        // Création de la carte
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);
        
        // Ajout d'un marqueur pour localiser l'annonce
        var marker = new google.maps.Marker({
            position: annonceLocation,
            map: map,
            title: 'Localisation de l\'annonce'
        });
    }
</script>
@endpush

</body>

</html>
