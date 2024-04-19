<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Description du Client</title>
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
  <div class="min-h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
      <h2 class="text-3xl font-bold text-center mb-6">Description du Client</h2>
      <form>
        <div class="mb-4">
          <label for="prenom" class="block text-lg font-medium text-gray-700">Prénom</label>
          <input type="text" id="prenom" name="prenom" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="John" required>
        </div>
        <div class="mb-4">
          <label for="nom" class="block text-lg font-medium text-gray-700">Nom</label>
          <input type="text" id="nom" name="nom" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="Doe" required>
        </div>
        <div class="mb-4">
          <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
          <input type="email" id="email" name="email" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="john.doe@example.com" required>
        </div>
        <div class="mb-4">
          <label for="password" class="block text-lg font-medium text-gray-700">Mot de passe</label>
          <input type="password" id="password" name="password" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="********" required>
        </div>
        <div class="mb-4">
          <label for="favoris" class="block text-lg font-medium text-gray-700">Favoris</label>
          
        </div>
        <div class="text-center">
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
