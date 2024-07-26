@extends('layout')     

@section('content')

@include('tools/buttonHome')
<div class="min-h-screen flex justify-center items-center">
  <div class="bg-white p-8 rounded-lg shadow-md w-96">
    <h2 class="text-3xl font-bold text-center mb-6">Connexion</h2>
    <form action="connection" method="post">
      {{ csrf_field() }}

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

      <div class="mb-4">
        <label for="email" class="block text-xl font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email" class="py-2 px-4 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
      </div>
      <div class="mb-4">
        <label for="password" class="block text-xl font-medium text-gray-700">Mot de passe</label>
        <input type="password" id="password" name="password" class="py-2 px-4  mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
      </div>
      <div class="text-center">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">Se connecter</button>
      </div>
    </form>
    <p class="mt-4 text-center"><a href="/signup" class="text-blue-600 hover:text-gray-900">Vous n'avez pas de compte ? Créer le !</a></p>
  </div>
</div>

@endsection