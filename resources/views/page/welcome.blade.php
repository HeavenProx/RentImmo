@extends('layout')     

@section('content')

@include('tools/navbar')


<section class="relative flex items-center justify-center h-screen bg-cover bg-center" 
style="background-image: url('{{ asset('images/2-personne-dos-visite.svg') }}'); ">
    <div class="absolute inset-0 bg-black opacity-40"></div> 
    <div class="relative z-10 text-center text-white">
        <h1 class="text-6xl font-bold">RentImmo</h1>
        <p class="mt-4 text-xl">Achetez et vendez des biens immobiliers facilement</p>
    </div>
</section>

@include('tools/footer')         

@endsection
