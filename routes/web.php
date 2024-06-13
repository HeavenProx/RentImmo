<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


/*Route::get('/blog/{slug}-{id}', function (slug id) {
    return view('welcome');
});*/

// Ajouter un blog
Route::get('/blog-insert-{id}', function (string $id) {
    $blog = new App\Models\Blog();
    $blog->title = "Mon blog " . $id;
    $blog->slug = "Mon article " . $id;
    $blog->content = "Mon contenu " .$id;

    $blog->save();
    return $blog;
});

// Afficher tout les blogs
Route::get('/blog-show', function () {
    $blog = App\Models\Blog::all('title', 'slug');
    return $blog;
});

// Afficher un blog en particulier
Route::get('/blog-show-{id}', function (string $id) {
    $blog = App\Models\Blog::findOrFail($id);
    return $blog;
});

// Modifier un blog en particulier
Route::get('/blog-update-{id}', function (string $id) {
    $blog = App\Models\Blog::find($id);
    $blog->title = "Nouveau titre " . $id;
    $blog->save();
});

// Supprimer un blog en particulier
Route::get('/blog-delete-{id}', function (string $id) {
    $blog = App\Models\Blog::find($id);
    $blog->delete();
});


// Afficher controller 
Route::get('/controller-index', [App\Http\Controllers\BlogController::class, 'index']);


// ------------------------- Login, Sign up et Logout---------------------------------//
// Sign up
Route::get('/signup', function () {
    return view('signup');
});
// Enregistrement en bdd
Route::post('/register', [App\Http\Controllers\UserController::class, 'register']);

// Log in
Route::get('/login', function () {
    return view('login');
});
// Verification en bdd
Route::post('/connection', [App\Http\Controllers\ConnectionController::class, 'connection']);

// Se déconnecter
Route::get('/logout', [App\Http\Controllers\LogoutController::class, 'logout'])->name('logout');
// ------------------------- Login et Sign up ---------------------------------//


// User Description
Route::middleware(['auth'])->group(function () {
    Route::get('/user-description', [App\Http\Controllers\UserController::class, 'edit'])->name('user.description');
    Route::post('/user-update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
});

// Navbar
Route::get('/navbar', function () {
    return view('navbar');
});

// Contact
Route::get('/contact', function () {
    return view('page/contact');
});

// Qui sommes nous
Route::get('/qui-sommes-nous', function () {
    return view('page/quiSommesNous');
});


/* --------------------- Annonce ------------------- */
// routes/web.php
Route::get('/annonces/create', [App\Http\Controllers\AnnonceController::class, 'create'])->name('annonces.create');
Route::post('/annonces', [App\Http\Controllers\AnnonceController::class, 'store'])->name('annonces.store');


Route::get('/annonce/{id}', 'AnnonceController@show')->name('annonce.show');

