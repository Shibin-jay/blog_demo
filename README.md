# Blog Management System

This is a Laravel-based Blog Management System that allows administrators to manage articles, categories, and tags through an admin panel.

## Features
- User Authentication (via Laravel Breeze)
- Article Management (Create, Read, Update, Delete)
- Category & Tag Management
- Admin Dashboard
- CSRF Protection & Secure Authentication

## Installation

### Prerequisites
- PHP >= 8.0
- Composer
- MySQL or PostgreSQL
- Node.js & NPM (for frontend assets)

### Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/your-repo.git
   cd your-repo
   ```
2. Install dependencies:
   ```bash
   composer install
   npm install && npm run dev
   ```
3. Set up environment variables:
   ```bash
   cp .env.example .env
   ```
   Configure your `.env` file with database details.
4. Generate application key:
   ```bash
   php artisan key:generate
   ```
5. Run migrations and seeders:
   ```bash
   php artisan migrate --seed
   ```
6. Start the development server:
   ```bash
   php artisan serve
   ```

## Routes

### Admin Routes (Protected by Authentication Middleware)
```php
Route::middleware(['auth'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('articles', ArticleController::class);
    Route::get('/dashboard', function () { return view('admin.dashboard'); })->name('dashboard');
});
```

### Frontend Routes
```php
Route::get('/', [ArticleController::class, 'index']);
Route::get('/articles/{article}', [ArticleController::class, 'show']);
```

### User Profile Management
```php
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
```

## Database Schema
- `users` (id, name, email, password, etc.)
- `articles` (id, title, content, category_id, user_id, created_at, updated_at)
- `categories` (id, name, slug, created_at, updated_at)
- `tags` (id, name, slug, created_at, updated_at)
- `article_tag` (article_id, tag_id)

## Database & Images Directory
All database-related scripts and assets (images) are stored in the `docs/` directory.

## Security Best Practices
- Use `HTTPS` in production.
- Store secrets in `.env` and never commit them.
- Run `php artisan config:cache` for better security.

## License
This project is licensed under the MIT License.

