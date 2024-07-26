@extends('layout')

@section('content')

@include('tools/buttonHome')

<div class="min-h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-md bg-gray-200">
        <div class="container mx-auto">
            <h2 class="text-3xl font-bold text-center mb-6">Mes annonces</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($annonces as $annonce)
                <div class="bg-white p-4 rounded-lg shadow-md max-h-80 flex">
                    <div class="flex-1">
                        <img src="{{ $annonce->images->first()->chemin_image ?? 'path/to/default/image.jpg' }}" alt="Image de l'annonce" class="w-full h-60 object-cover rounded-lg">
                    </div>
                    <div class="flex-1 pl-4">
                        <h3 class="text-xl font-bold mb-2">{{ $annonce->titre }}</h3>
                        <p class="text-gray-700 mb-1">Prix: {{ $annonce->prix }} €</p>
                        <p class="text-gray-700 mb-1">Adresse: {{ $annonce->adresse }}</p>
                        <a href="{{ route('annonce.show', $annonce->id) }}" class="text-blue-500 mt-2 block">Voir plus</a>
                        <a href="{{ route('user.annonces.edit', $annonce->id) }}" class="text-green-500 mt-2 block">Modifier</a>
                        <form action="{{ route('user.annonce.destroy', $annonce->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 mt-2 block">Supprimer</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection