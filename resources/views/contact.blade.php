<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    @include('navbar')

  <div class="min-h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
      <h2 class="text-3xl font-bold text-center mb-6">Contactez-nous</h2>
      <form>
        <div class="mb-4">
          <label for="objet" class="block text-lg font-medium text-gray-700">Objet</label>
          <input type="text" id="objet" name="objet" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
        </div>
        <div class="mb-4">
          <label for="contenu" class="block text-lg font-medium text-gray-700">Contenu</label>
          <textarea id="contenu" name="contenu" rows="4" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required></textarea>
        </div>
        <div class="text-center">
          <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">Envoyer</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
