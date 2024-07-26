@extends('layout')

@section('content')
<div class="container mx-auto py-10">
    <div class="bg-white py-5 px-8 rounded-lg shadow-md bg-gray-200">
            <h2 class="text-3xl font-bold text-center mb-6">Modifier l'annonce</h2>
            <form action="{{ route('user.annonces.update', $annonce->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="titre" class="block text-lg font-medium text-gray-700">Titre</label>
                    <input type="text" id="titre" name="titre" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $annonce->titre }}" required>
                </div>

                <div class="mb-4">
                    <label for="venteLocation" class="block text-lg font-medium text-gray-700">Vente ou location :</label>
                    <select id="venteLocation" name="venteLocation" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="1" {{ $annonce->venteLocation ? 'selected' : '' }}>Vente</option>
                        <option value="0" {{ !$annonce->venteLocation ? 'selected' : '' }}>Location</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>{{ $annonce->description }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="adresse" class="block text-lg font-medium text-gray-700">Adresse</label>
                    <input type="text" id="adresse" name="adresse" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $annonce->adresse }}" required>
                </div>

                <div class="mb-4">
                    <label for="prix" class="block text-lg font-medium text-gray-700">Prix</label>
                    <input type="number" id="prix" name="prix" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $annonce->prix }}" required>
                </div>

                <div class="mb-4">
                    <label for="metre" class="block text-lg font-medium text-gray-700">Mètres carrés</label>
                    <input type="number" id="metre" name="metre" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $annonce->metre }}" required>
                </div>

                <div class="mb-4">
                    <label for="chambre" class="block text-lg font-medium text-gray-700">Chambres</label>
                    <input type="number" id="chambre" name="chambre" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $annonce->chambre }}" required>
                </div>

                <div class="mb-4">
                    <label for="salleDeBain" class="block text-lg font-medium text-gray-700">Salles de bain</label>
                    <input type="number" id="salleDeBain" name="salleDeBain" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $annonce->salleDeBain }}" required>
                </div>

                <div class="mb-4">
                    <label for="parking" class="block text-lg font-medium text-gray-700">Parking</label>
                    <select id="parking" name="parking" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="1" {{ $annonce->parking ? 'selected' : '' }}>Oui</option>
                        <option value="0" {{ !$annonce->parking ? 'selected' : '' }}>Non</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="garage" class="block text-lg font-medium text-gray-700">Garage</label>
                    <select id="garage" name="garage" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="1" {{ $annonce->garage ? 'selected' : '' }}>Oui</option>
                        <option value="0" {{ !$annonce->garage ? 'selected' : '' }}>Non</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="terrain" class="block text-lg font-medium text-gray-700">Terrain</label>
                    <select id="terrain" name="terrain" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="1" {{ $annonce->terrain ? 'selected' : '' }}>Oui</option>
                        <option value="0" {{ !$annonce->terrain ? 'selected' : '' }}>Non</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="etat" class="block text-lg font-medium text-gray-700">État</label>
                    <select id="etat" name="etat" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="Neuf" {{ $annonce->etat == 'Neuf' ? 'selected' : '' }}>Neuf</option>
                        <option value="Rénové" {{ $annonce->etat == 'Rénové' ? 'selected' : '' }}>Rénové</option>
                        <option value="Plateau" {{ $annonce->etat == 'Plateau' ? 'selected' : '' }}>Plateau</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
