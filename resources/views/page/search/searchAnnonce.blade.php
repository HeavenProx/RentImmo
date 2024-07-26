@extends('layout')     

@section('content')

@include('tools/navbar')
<div id="search" class="flex-3 flex justify-between p-10 m-auto bg-gray-100">
    <div class="flex-grow">
        <input type="text" placeholder="Rechercher" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
    </div>
    <div class="flex-grow ml-4">
        <input type="text" placeholder="Ville" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
    </div>
    <div class="flex-grow ml-4">
        <input type="text" placeholder="Code Postal" class="border border-gray-300 rounded-md px-4 py-2 w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
    </div>
    <button class="ml-4 bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md">
    <img src="{{ asset('images/loupe.svg') }}" alt="Loupe de recherche" width="20" height="20">
    </button>
</div>

<div class="container mx-auto px-4">
    <h2 class="text-3xl font-bold text-center my-6">Liste des Annonces</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($annonces as $annonce)
        <div class="bg-white p-4 rounded-lg shadow-md max-h-80 flex bg-gray-200">
            <div class="flex-1">
                <img src="{{ $annonce->images->first()->chemin_image ?? 'path/to/default/image.jpg' }}" alt="Image de l'annonce" class="w-full h-48 object-cover rounded-lg">
            </div>
            <div class="flex-1 pl-4">
                <h3 class="text-xl font-bold mb-2">{{ $annonce->titre }}</h3>
                <p class="text-gray-700 mb-1">Prix: {{ $annonce->prix }} €</p>
                <p class="text-gray-700 mb-1">Adresse: {{ $annonce->adresse }}</p>
                <a href="{{ route('annonce.show', $annonce->id) }}" class="text-blue-500 mt-2 block">Voir plus</a>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection