<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription</title>
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}">
</head>
<body>
  @include('tools/buttonHome')
  <div class="min-h-screen flex justify-center items-center">
    <div class="orange p-8 rounded-lg shadow-md w-96">
      <h2 class="text-3xl font-bold text-center mb-6">Inscription</h2>
      <form action="/register" method="POST">
        {{ csrf_field() }}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br>
        @endif
        <div class="mb-4">
          <label for="nom" class="block text-xl font-medium text-gray-700">Nom</label>
          <input type="text" id="nom" name="nom" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
        </div>
        <div class="mb-4">
          <label for="prenom" class="block text-xl font-medium text-gray-700">Prénom</label>
          <input type="text" id="prenom" name="prenom" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
        </div>
        <div class="mb-4">
          <label for="email" class="block text-xl font-medium text-gray-700">Email</label>
          <input type="email" id="email" name="email" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
        </div>
        <div class="mb-4">
          <label for="password" class="block text-xl font-medium text-gray-700">Mot de passe</label>
          <input type="password" id="password" name="password" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
        </div>
        <div class="text-center">
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">S'inscrire</button>
        </div>
        <p class="mt-4"><a href="/login" class="text-blue-600 hover:text-gray-900">Déjà inscrit ?</a></p>
      </form>
    </div>
  </div>
</body>
</html>
