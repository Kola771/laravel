<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserCreatedEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Event;

class RegisterController extends Controller
{
    //
    public function create()
    {
        return view("auth.register");
    }

    public function store(Request $request, UserCreatedEvent $event)
    {
        App::setLocale("fr");
        try {
            $validated = $request->validate(
                [
                    'name' => "required|string",
                    'email' => "required|email",
                    // 'password' => "required|string|confirmed",
                    'password' => "required",
                ]
            );

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            // dispatch pour émettre un évenement
            // Event::dispatch($event);
            Event::dispatch(new UserCreatedEvent($user));

            return response()->json([
                "user" => $user,
                "message" => "utilisateur créé !"
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                "message" => "Une erreur s'est produite",
                "error" => $e->validator->errors()->messages()
            ], 422);
        }

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);

        // return response()->json($user, 201);
        /*
 200-299: les réponses de succès
  201 la resource a été créée
  204 ok mais aucun contenu dans la réponse
  300-399: les messages de redirection
  301 redirection permanente
  302 redirection temporaire
  400-499: les erreurs du client
  401 Unauthorized: le client doit s'authentifier d'abord pour accéder à la resource
  403 Forbidden: le client n'a pas les droits d'accès au contenu
  404 Not Found: le serveur n'a pas trouver le fichier ou la resource demandée.
  500-599: les erreurs du serveur
    500 Internal Server Error: le serveur à un problème qu'il ne peut traiter.
 */
    }
}
