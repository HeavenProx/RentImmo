@extends('layout')     

@section('content')

<div class="bg-gray-200">
  @include('tools/buttonHome')
  <div class="min-h-screen flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
      
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    <br>
    @endif

    @if ($errors->has('email'))
    <span class="invalid-feedback" role="alert">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
    <br>
    @endif

    <h2 class="text-3xl font-bold text-center mb-6">Votre compte</h2>

    <!-- Formulaire de mise à jour -->
    <form action="{{ route('user.update') }}" method="post">
        @csrf

        <div class="mb-4">
            <label for="prenom" class="block text-lg font-medium text-gray-700">Prénom</label>
            <input type="text" id="prenom" name="prenom" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $user->prenom }}" required>
        </div>
        <div class="mb-4">
            <label for="nom" class="block text-lg font-medium text-gray-700">Nom</label>
            <input type="text" id="nom" name="nom" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $user->nom }}" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-lg font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $user->email }}" required>
        </div>
        <div class="text-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">Enregistrer</button>
        </div>
    </form>

    <div class="text-center mt-5">
      <a href="{{ route('favoris.index') }}" class="bg-green-500 text-white px-4 py-2 rounded-md">Voir mes favoris</a>
    </div>
    </div>
  </div>
</div>

@endsection