<!-- resources/views/annonce.blade.php -->



@section('content')
<div class="container mx-auto px-4">
    <div class="my-6">
        <!-- Affichage du titre et de la description de l'annonce -->
        <h2 class="text-2xl font-bold">{{ $annonce->titre }}</h2>
        <p class="mt-2 text-gray-600">{{ $annonce->description }}</p>
    </div>

    <div class="my-6">
        <!-- Carousel de photos -->
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($annonce->images as $image)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ asset('storage/' . $image->chemin_image) }}" class="d-block w-100" alt="...">
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="my-6">
        <!-- Informations supplémentaires sur l'annonce -->
        <ul>
            <li><strong>Adresse:</strong> {{ $annonce->adresse }}</li>
            <li><strong>Prix:</strong> {{ $annonce->prix }} €</li>
            <!-- Ajoutez d'autres informations selon votre modèle -->
        </ul>
    </div>

    <div class="my-6">
        <!-- Formulaire de contact express -->
        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Téléphone</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>

    <div class="my-6">
        <!-- Carte Google -->
        <div id="map"></div>
    </div>

    <div class="my-6">
        <!-- Ajouter en Favoris -->
        @auth
        <form action="{{ route('favoris.add', $annonce->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Ajouter aux favoris</button>
        </form>
        @else
        <p>Connectez-vous pour ajouter cette annonce aux favoris.</p>
        <a href="{{ route('login') }}" class="btn btn-primary">Se connecter</a>
        @endauth
    </div>
</div>
@endsection

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
