# Fullstack Real Estate Marketplace

A full-stack real estate marketplace built with Laravel, Vue, Inertia.js, TypeScript, Tailwind CSS, and a relational database.

The app lets visitors browse property listings, authenticated users make offers, and realtors manage their own listings, images, offers, and notifications from a protected dashboard.

## Features

- Public property listing browse page
- Listing detail page with image gallery
- Price, beds, baths, and area filters
- Pagination for listing results
- User registration, login, logout, password reset, and email verification
- Realtor listing dashboard
- Create, edit, soft-delete, and restore listings
- Upload and delete listing images
- Buyer offer submission
- Realtor offer review and acceptance flow
- Automatic rejection of other offers when one offer is accepted
- Sold listing state
- Database notifications when offers are made
- Mark notifications as read
- User profile, password, and appearance settings
- Admin override support through `is_admin`
- Responsive Vue UI with reusable components

## Tech Stack

- Laravel 12
- PHP 8.2+
- Vue 3
- Inertia.js 2
- TypeScript
- Tailwind CSS 4
- Vite 6
- Ziggy
- Eloquent ORM
- Laravel Notifications
- Laravel Queues
- PHPUnit
- MariaDB/MySQL through Docker Compose, or SQLite for simple local setup
- Mailhog for local email testing

## Project Structure

```text
app/
  DTO/                         # Typed data objects used by the frontend bridge
  Http/Controllers/            # Listing, realtor, offer, notification, auth, settings controllers
  Models/                      # User, Listing, ListingImage, Offer
  Notifications/               # OfferMade notification
  Policies/                    # Listing and notification authorization rules
database/
  factories/                   # User and listing factories
  migrations/                  # Users, listings, images, offers, notifications, jobs, cache
  seeders/                     # Demo users and listings
resources/js/
  pages/
    Listing/                   # Public listing browse and detail pages
    Realtor/                   # Realtor listing, image, and offer management
    Notification/              # User notifications
    auth/                      # Login, register, reset password, verification
    settings/                  # Profile, password, appearance
  components/                  # App shell, navigation, listing UI, and shared UI primitives
  layouts/                     # Main, app, auth, and settings layouts
routes/
  web.php                      # Listing, realtor, offer, notification, dashboard routes
  auth.php                     # Auth routes
  settings.php                 # Account settings routes
```

## Main Domain Models

### Listing

Stores property data such as beds, baths, area, city, post code, street, and price. Listings belong to a user, support soft deletes, can have many images, and can receive many offers.

### Offer

Represents a buyer offer on a listing. Offers belong to a listing and a bidder. When a realtor accepts one offer, the listing is marked as sold and the other offers are rejected.

### Listing Image

Stores uploaded listing image filenames and exposes a generated public `src` URL.

### User

Supports authentication, email verification, listings, offers, notifications, and admin access through `is_admin`.

## Routes Overview

### Public

```text
GET /                         # Welcome page
GET /listing                  # Browse available listings
GET /listing/{listing}        # View one listing
```

### Authenticated Buyer

```text
POST /listing/{listing}/offer # Make an offer on a listing
GET /notification             # View notifications
PUT /notification/{id}/seen   # Mark notification as read
```

### Realtor

```text
GET /realtor/listing                  # Manage own listings
GET /realtor/listing/create           # Create listing form
POST /realtor/listing                 # Store new listing
GET /realtor/listing/{listing}        # View listing offers
GET /realtor/listing/{listing}/edit   # Edit listing form
PUT /realtor/listing/{listing}        # Update listing
DELETE /realtor/listing/{listing}     # Soft-delete listing
PUT /realtor/listing/{listing}/restore
PUT /realtor/offer/{offer}/accept     # Accept an offer and mark listing sold
GET /realtor/listing/{listing}/image/create
POST /realtor/listing/{listing}/image
DELETE /realtor/listing/{listing}/image/{image}
```

### Account

```text
GET /dashboard
GET /settings/profile
PATCH /settings/profile
DELETE /settings/profile
GET /settings/password
PUT /settings/password
GET /settings/appearance
```

## Requirements

- PHP 8.2 or newer
- Composer
- Node.js and npm
- SQLite, or Docker for MariaDB/MySQL

## Getting Started

Install PHP dependencies:

```bash
composer install
```

Install JavaScript dependencies:

```bash
npm install
```

Create the environment file:

```bash
cp .env.example .env
```

Generate the app key:

```bash
php artisan key:generate
```

## Database Setup

### Option 1: SQLite

The default `.env.example` uses SQLite. Create the database file:

```bash
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
```

Run migrations:

```bash
php artisan migrate
```

Seed demo data:

```bash
php artisan db:seed
```

### Option 2: MariaDB/MySQL With Docker

Start the database, Adminer, and Mailhog:

```bash
docker compose up -d
```

Update `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root

MAIL_MAILER=smtp
MAIL_HOST=127.0.0.1
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
```

Create the database if needed through Adminer:

```text
http://localhost:8080
```

Then run:

```bash
php artisan migrate --seed
```

Mailhog is available at:

```text
http://localhost:8025
```

## Running The App

The easiest development command starts Laravel, the queue listener, and Vite together:

```bash
composer run dev
```

Or run them separately:

```bash
php artisan serve
npm run dev
php artisan queue:listen --tries=1
```

Open the app:

```text
http://localhost:8000
```

## Useful Commands

```bash
npm run dev           # Start Vite
npm run build         # Build frontend assets
npm run build:ssr     # Build client and SSR bundles
npm run lint          # Run ESLint with fixes
npm run format        # Format Vue resources
npm run format:check  # Check formatting

php artisan test      # Run PHP tests
composer run test     # Clear config and run tests
php artisan migrate   # Run database migrations
php artisan db:seed   # Seed demo data
php artisan storage:link
```

Run `php artisan storage:link` before using listing image uploads so public images resolve correctly.

## Demo Data

The seeder creates:

- one admin user named `Mohi`
- five regular users
- sample property listings for the first two users

The seeded admin email is:

```text
e.mohamadhosein@gmail.com
```

The user factory usually uses the default Laravel test password:

```text
password
```

## Core User Flow

1. Browse listings from `/listing`.
2. Register or log in.
3. Create listings from `/realtor/listing/create`.
4. Upload listing images from the realtor listing dashboard.
5. Buyers make offers from the listing detail page.
6. Realtors review offers from `/realtor/listing/{listing}`.
7. Accepting one offer marks the listing as sold and rejects competing offers.
8. Offer notifications appear in `/notification`.

## Tests

The project includes feature tests for authentication, registration, password reset, email verification, dashboard access, profile updates, and password updates.

Run:

```bash
composer run test
```
