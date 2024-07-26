@extends('layout')     

@section('content')

@include('tools/buttonHome')

<div class="container mx-auto px-4 pb-10">
    <div class="my-6">
        <h2 class="text-2xl font-bold text-center my-4">Créer une nouvelle annonce</h2>

        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif
    </div>

    <div class="bg-gray-100 shadow-xl rounded-md p-6">
        <form action="{{ route('annonces.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-10">
                <label for="titre" class="block text-gray-700 text-xl font-bold mb-2">Titre</label>
                <input type="text" class="form-input w-full shadow-md rounded-md border-gray-300 p-2" id="titre" name="titre" required>
            </div>

            <div class="mb-10">
                <label class="block text-gray-700 text-xl font-bold mb-2">Vente ou location :</label>
                <div>
                    <input type="radio" id="vente" name="venteLocation" value="1" class="form-radio text-blue-500">
                    <label for="vente" class="ml-2 text-gray-700">Vente</label>
                    
                    <input type="radio" id="location" name="venteLocation" value="0" class="form-radio text-blue-500 ml-10">
                    <label for="location" class="ml-2 text-gray-700">Location</label>
                </div>
            </div>

            <div class="mb-10">
                <label for="description" class="block text-gray-700 text-xl font-bold mb-2">Description</label>
                <textarea class="form-textarea w-full rounded-md shadow-md border-gray-300 p-2" id="description" name="description" rows="3" required></textarea>
            </div>

            <div class="mb-10">
                <label for="adresse" class="block text-gray-700 text-xl font-bold mb-2">Adresse</label>
                <input type="text" class="form-input w-full shadow-md rounded-md border-gray-300 p-2" id="adresse" name="adresse" required>
            </div>

            <div class="mb-10">
                <label for="prix" class="block text-gray-700 text-xl font-bold mb-2">Prix</label>
                <input type="number" class="form-input w-full shadow-md rounded-md border-gray-300 p-2" id="prix" name="prix" required>
            </div>

            <div class="mb-10">
                <label for="metre" class="block text-gray-700 text-xl font-bold mb-2">Nombre de mètre carré :</label>
                <input type="number" class="form-input w-full shadow-md rounded-md border-gray-300 p-2" id="metre" name="metre" required>
            </div>

            <div class="mb-10">
                <label for="chambre" class="block text-gray-700 text-xl font-bold mb-2">Nombre de chambre :</label>
                <input type="number" class="form-input w-full shadow-md rounded-md border-gray-300 p-2" id="chambre" name="chambre" required>
            </div>

            <div class="mb-10">
                <label for="salleDeBain" class="block text-gray-700 text-xl font-bold mb-2">Nombre de salle de bain :</label>
                <input type="number" class="form-input w-full shadow-md rounded-md border-gray-300 p-2" id="salleDeBain" name="salleDeBain" required>
            </div>

            <div class="mb-10">
                <label class="block text-gray-700 text-xl font-bold mb-2">Type de logement :</label>
                <div>
                    <input type="radio" id="maison" name="type" value="Maison" class="form-radio text-blue-500">
                    <label for="maison" class="ml-2 text-gray-700">Maison</label>
                    
                    <input type="radio" id="appartement" name="type" value="Appartement" class="form-radio text-blue-500 ml-10">
                    <label for="appartement" class="ml-2 text-gray-700">Appartement</label>

                    <input type="radio" id="studio" name="type" value="Studio " class="form-radio text-blue-500 ml-10">
                    <label for="studio " class="ml-2 text-gray-700">Studio</label>

                    <input type="radio" id="chalet" name="type" value="Chalet" class="form-radio text-blue-500 ml-10">
                    <label for="chalet " class="ml-2 text-gray-700">Chalet</label>

                    <input type="radio" id="villa" name="type" value="Villa" class="form-radio text-blue-500 ml-10">
                    <label for="villa " class="ml-2 text-gray-700">Villa</label>

                    <input type="radio" id="autre" name="type" value="Autre" class="form-radio text-blue-500 ml-10">
                    <label for="autre " class="ml-2 text-gray-700">Autre</label>
                </div>
            </div>

            <div class="mb-10">
                <label class="block text-gray-700 text-xl font-bold mb-2">Parking :</label>
                <div>
                    <input type="radio" id="trueParking" name="parking" value="1" class="form-radio text-blue-500">
                    <label for="trueParking" class="ml-2 text-gray-700">Oui</label>
                    
                    <input type="radio" id="falseParking" name="parking" value="0" class="form-radio text-blue-500 ml-10">
                    <label for="falseParking" class="ml-2 text-gray-700">Non</label>
                </div>
            </div>

            <div class="mb-10">
                <label class="block text-gray-700 text-xl font-bold mb-2">Garage :</label>
                <div>
                    <input type="radio" id="trueGarage" name="garage" value="1" class="form-radio text-blue-500">
                    <label for="trueGarage" class="ml-2 text-gray-700">Oui</label>
                    
                    <input type="radio" id="falseGarage" name="garage" value="0" class="form-radio text-blue-500 ml-10">
                    <label for="falseGarage" class="ml-2 text-gray-700">Non</label>
                </div>
            </div>

            <div class="mb-10">
                <label class="block text-gray-700 text-xl font-bold mb-2">Terrain :</label>
                <div>
                    <input type="radio" id="trueTerrain" name="terrain" value="1" class="form-radio text-blue-500">
                    <label for="trueTerrain" class="ml-2 text-gray-700">Oui</label>
                    
                    <input type="radio" id="falseTerrain" name="terrain" value="0" class="form-radio text-blue-500 ml-10">
                    <label for="falseTerrain" class="ml-2 text-gray-700">Non</label>
                </div>
            </div>

            <div class="mb-10">
                <label class="block text-gray-700 text-xl font-bold mb-2">État :</label>
                <div>
                    <input type="radio" id="neuf" name="etat" value="Neuf" class="form-radio text-blue-500">
                    <label for="neuf" class="ml-2 text-gray-700">Neuf</label>
                    
                    <input type="radio" id="renove" name="etat" value="Rénové" class="form-radio text-blue-500 ml-10">
                    <label for="renove" class="ml-2 text-gray-700">Rénové</label>

                    <input type="radio" id="plateau" name="etat" value="Plateau" class="form-radio text-blue-500 ml-10">
                    <label for="plateau" class="ml-2 text-gray-700">Plateau</label>
                </div>
            </div>

            <div class="mb-10">
                <label for="images" class="block text-gray-700 text-xl font-bold mb-2">Images <span class="text-md font-normal">(sélectionner plusieurs images en même temps)</span></label>
                <input type="file" class="form-input w-full shadow-md rounded-md border-gray-300" id="images" name="images[]" multiple accept="image/*">
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Créer l'annonce</button>
        </form>
    </div>
</div>

@endsection