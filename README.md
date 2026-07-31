# SIU Cover Page Generator

[![PHP](https://img.shields.io/badge/php-%5E8.2-blue.svg)](https://www.php.net)
[![Laravel](https://img.shields.io/badge/laravel-12.x-red.svg)](https://laravel.com)
[![License](https://img.shields.io/badge/license-MIT-green.svg)](LICENSE)

## Overview

SIU Cover Page Generator is a Laravel-based application designed to generate professional assignment and lab report cover page PDFs with a clean form-driven workflow.

## Problem Statement

Many students and academic teams spend unnecessary time formatting cover pages for assignments and lab reports. Manual styling is error-prone and inconsistent across documents.

## Solution

This project provides a simple web interface to enter academic details, select a task type, and generate a polished PDF cover page instantly.

## Features

- Modern Laravel 12 architecture with Blade templates
- Responsive form-based UI for assignment and lab report cover pages
- Strong server-side validation for required fields and conditional inputs
- PDF generation powered by `barryvdh/laravel-dompdf`
- Vite asset pipeline for frontend resources
- Automated feature tests for routes, validation, and PDF output

## Technology Stack

| Layer | Technology |
| --- | --- |
| Backend | PHP 8.2, Laravel 12 |
| Frontend | Blade, Bootstrap, Vite |
| PDF | barryvdh/laravel-dompdf |
| Testing | PHPUnit, Laravel Feature Tests |
| Tooling | Composer, npm, Vite |

## Architecture

- MVC structure with dedicated controller, request validation, and views
- `CoverPageMakerController` handles form display and PDF generation
- `GenerateCoverPageRequest` enforces validation rules and custom error messages
- Blade layout modularization keeps UI structure clean and maintainable

## Screenshots

- Home page hero section with Get Started CTA
- Cover page generator form with conditional fields
- PDF export workflow from user input to downloadable document

> Screenshots can be added under a `screenshots/` directory for future releases.

## Installation

### Requirements

- PHP 8.2 or higher
- Composer
- Node.js and npm
- SQLite, MySQL, or compatible database

### Setup

```bash
git clone https://github.com/mdtareqmiah/coverpagemaker.git
cd coverpagemaker
composer install
cp .env.example .env
php artisan key:generate
npm install
npm run build
```

### Run Locally

```bash
php artisan serve
```

Visit `http://127.0.0.1:8000` to open the homepage.

## Generate PDF

1. Open `/form-page`
2. Complete the form fields
3. Click **Preview & Download PDF**
4. The generated PDF is streamed in the browser

## Testing

Run the test suite with:

```bash
php artisan test
```

## Project Structure

| Folder | Purpose |
| --- | --- |
| `app/Http/Controllers` | Application controllers |
| `app/Http/Requests` | Form request validation |
| `resources/views` | Blade templates and partials |
| `routes` | Application routing definitions |
| `tests` | Automated feature tests |
| `public` | Public web assets and build output |

## Folder Structure

- `app/` - backend application code
- `bootstrap/` - framework bootstrap files
- `config/` - configuration settings
- `database/` - migrations, seeders, factories
- `public/` - entry point and frontend assets
- `resources/` - views, CSS, JavaScript
- `routes/` - HTTP route definitions
- `storage/` - compiled templates, logs, caches
- `tests/` - application test cases

## Future Improvements

- Add user authentication and profile management
- Implement actual PDF preview before download
- Add multilingual support
- Introduce CI/CD workflow and release automation
- Add accessibility audit reports and refinements

## Contributing

See [CONTRIBUTING.md](CONTRIBUTING.md) for contribution guidelines.

## License

This project is licensed under the MIT License. See [LICENSE](LICENSE) for details.

## Author

Md. Tareq Miah

## Acknowledgements

- Laravel Framework
- Barryvdh Laravel DomPDF
- Bootstrap
- Vite
