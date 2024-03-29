- composer create-project laravel/laravel:=^10.0 name_project
- cp .env.example .env.local
- cp .env.example .env.production

- php artisan migrate --env=local ou --env=production
- php artisan db:show

- création d'une variable d'environnement globale APP_ENV reliée à local ainsi lorsqu'on fera cette commande :
php artisan migrate cela va se baser sur le .env.local

- php artisan lang:publish

- php artisan make:request NameRequest

- extension sqlite téléchargée
- extension sqlite viewer téléchargée
- création d'un fichier Middleware (commande : php artisan make:middleware NameMiddleware)

- php artisan event:generate
- php artisan make:mail NameMail
- php artisan make:view emails.user-created-mail

- developper google smtp

- composer require --dev barryvdh/laravel-ide-helper

- DB_CONNECTION=sqlite

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