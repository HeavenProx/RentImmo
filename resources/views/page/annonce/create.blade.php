<!-- resources/views/annonces/create.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription</title>
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="../resources/css/app.css">
</head>
<body>
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

        <div class="bg-gray shadow-xl rounded-md p-6">
            <form action="{{ route('annonces.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-10">
                    <label for="titre" class="block text-gray-700 text-xl font-bold mb-2">Titre</label>
                    <input type="text" class="form-input w-full shadow-md rounded-md border-gray-300 p-2" id="titre" name="titre" required>
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

                @auth
                <div class="mb-10">
                    <label for="images" class="block text-gray-700 text-xl font-bold mb-2">Images <span class="text-md font-normal">(sélectionner plusieurs images en même temps)</span></label>
                    <input type="file" class="form-input w-full shadow-md rounded-md border-gray-300" id="images" name="images[]" multiple accept="image/*">
                </div>
                @endauth

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Créer l'annonce</button>
            </form>
        </div>
    </div>

</body>
</html>