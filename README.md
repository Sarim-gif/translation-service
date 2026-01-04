`Sarim Ali Khan`
`Senior Full Stack Developer`
## Translation Management Service (Laravel)

A scalable, API-driven Translation Management Service built with Laravel.

It supports:

- Multiple locales (languages)
- Context tagging (web, mobile, desktop, etc.)
- Searching translations by key, locale, content, and tags
- JSON export for frontend apps
- Token-based API authentication
- High performance for large datasets (100k+ records)

## Requirements

- PHP >= 8.2
- Composer
- MySQL >= 8
- Node.js >= 20
- Laravel 11

## Clone the repository
- git clone https://github.com/your-username/translation-service.git
- cd translation-service

## Install Dependencies
- composer install
- npm install

## Update database settings in `.env`:
- DB_DATABASE=translation_service 
- DB_USERNAME=root 
- DB_PASSWORD=

## Generate app key:
php artisan key:generate


## Run migration
php artisan migrate

## Run Seeder
php artisan db:seed

## Generate large dataset for scalability testing
Generate large dataset for scalability testing

## Start the server
php artisan serve

## API Authentication

Default test token: `sarimkhan123`

Add this header in Postman:

Authorization: `Bearer sarimkhan123`


## Example Requests

Create translation: POST /api/translations

body:
`{
"key": "dashboard.title",
"value": "Dashboard",
"locale_id": 1,
"tags": [1]
}`

Search: GET /api/translations?locale=en&tag=web&key=home

## Postman Setup

Import the provided Postman collection:
`translationServiceAPIsPostmanCollection`

Set base URL: http://127.0.0.1:8000/api

Add Authorization:

Type: Bearer Token

Token: sarimkhan123

`!!Have a Nice Day!!`
