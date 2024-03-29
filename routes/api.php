<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
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

 Route::get("test/{id}", function(Request $request, string $id) {
    return response()->json([
        "success" => true,
        "id" => $id
    ]);
 })->middleware(["encrypt"]);


// Route nécéssitant que l'utilisateur soit authentifié

/**
 * route de vérification d'email
 * route de confirmation du mot de passe
 */
