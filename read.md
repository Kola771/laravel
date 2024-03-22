- composer create-project laravel/laravel:=^10.0 name_project
- cp .env.example .env.local
- cp .env.example .env.production

- php artisan migrate --env=local ou --env=production
- php artisan db:show

- création d'une variable d'environnement globale APP_ENV reliée à local ainsi lorsqu'on fera cette commande :
php artisan migrate cela va se baser sur le .env.local