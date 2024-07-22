
# Pokemon APP

Welcome to Pokemon App! This is an app designed to show details about specific pokemons using the public API (https://pokeapi.co)

## Instalation

- Clone this repository and enter the folder.
- Install dependencies with `composer install`.
- Create your env file with `cp .env.example .env`. No extra configuration is needed.
- Run the migrations `php artisan migrate`. By default, a SQLite database is used, so it is not necesary to setup a database server.
- Seed the database with `php artisan db:seed`.
- Set your encryption key up with `php artisan key:generate`.
- Execute the app with `php artisan serve`.
