<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get("/", function() {
    return "hello world " . app()->version();
});

// Route ne nécéssitant que l'utilisateur ne soit pas authentifié

// route d'inscription
 Route::get('/register', [RegisterController::class, 'create']);

// route pour soumettre le formulaire d'inscription
 Route::post('/register', [RegisterController::class, 'store']);

// route de connexion
 Route::get('/login', function() {
    return "Connexion";
 });

// route de réinitialisation du mot de passe
 Route::get('/forgot-password', function() {
    return "Mot de passe oublié";
 });

 Route::get('/reset-password', function() {
    return "Réinitialiser le mot de passe";
 });


// Route nécéssitant que l'utilisateur soit authentifié

/**
 * route de vérification d'email
 * route de confirmation du mot de passe
 */