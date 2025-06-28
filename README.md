# Dandelion Pet Reminder

Dandelion Pet Reminder is a Laravel 12 application for managing pets and their reminders. The administrative area is built with Filament 3 and provides CRUD operations for pets and reminders, including photo uploads and relation management. PostgreSQL is used as the primary database.

## Requirements

- PHP 8.3 or higher with the `pdo_pgsql` extension
- Composer
- Node.js and npm (for assets)
- PostgreSQL server

## Installation

1. Clone the repository.
2. Copy `.env.example` to `.env` and adjust your database credentials.
3. Install PHP dependencies with `composer install`.
4. Install JavaScript dependencies with `npm install` and build assets using `npm run build`.
5. Run database migrations with `php artisan migrate`.
6. Create an admin user to access the Filament panel.

The administration panel will be available at `/admin`.

## Testing

Run the PHPUnit test suite from the project root. If the project is deployed to
`/var/www/DandelionPetR`, run:

```bash
cd /var/www/DandelionPetR && php artisan test
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
