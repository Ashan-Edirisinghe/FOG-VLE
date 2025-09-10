
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Graduate Studies Application

This application is designed to streamline and manage the graduate studies process for students, candidates, and administrators. It provides a platform for submitting, tracking, and reviewing graduate study applications, as well as managing candidate information and application statuses. The system aims to simplify workflows, improve communication, and ensure transparency throughout the graduate studies lifecycle.

## Features

- Online application submission and management
- Candidate profile management
- Application status tracking and notifications
- Administrative dashboard for reviewing and processing applications
- Secure authentication and user roles
- Reporting and analytics for graduate studies data

## Getting Started

Follow these steps to set up and run the Graduate Studies App on your local machine:

### Prerequisites

- PHP >= 8.0
- Composer
- MySQL or compatible database
- Node.js and npm (for frontend assets)

### Installation

1. **Clone the repository:**
	```sh
	git clone <repository-url>
	cd FOG-SM
	```
2. **Install PHP dependencies:**
	```sh
	composer install
	```
3. **Install Node.js dependencies:**
	```sh
	npm install
	```
4. **Copy the example environment file and configure your settings:**
	```sh
	cp .env.example .env
	# Edit .env to match your database and mail settings
	```
5. **Generate the application key:**
	```sh
	php artisan key:generate
	```
6. **Run database migrations:**
	```sh
	php artisan migrate
	```
7. **(Optional) Seed the database:**
	```sh
	php artisan db:seed
	```
8. **Build frontend assets:**
	```sh
	npm run dev
	```

## Running the Application

Start the local development server:

```sh
php artisan serve
```

The application will be available at [http://localhost:8000](http://localhost:8000).

---

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>


## About Laravel

Laravel is a PHP web application framework that emphasizes simplicity, elegance, and readability. It is designed to make the development process a delightful experience for developers by providing a clean and expressive syntax, as well as a rich set of features out of the box.

Key features of Laravel include:

- [Simple, fast routing engine](https://laravel.com/docs/routing)
- [Powerful dependency injection container](https://laravel.com/docs/container)
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage
- Expressive, intuitive [database ORM (Eloquent)](https://laravel.com/docs/eloquent)
- Database-agnostic [schema migrations](https://laravel.com/docs/migrations)
- [Robust background job processing](https://laravel.com/docs/queues)
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting)
- [Blade templating engine](https://laravel.com/docs/blade) for clean and reusable views
- [Comprehensive authentication and authorization](https://laravel.com/docs/authentication)
- [RESTful API development tools](https://laravel.com/docs)

Laravel also boasts a vibrant ecosystem, including tools like [Laravel Forge](https://forge.laravel.com/) for server management, [Laravel Vapor](https://vapor.laravel.com/) for serverless deployment, and [Laravel Nova](https://nova.laravel.com/) for administration panels. The active community and extensive documentation make Laravel accessible for both beginners and experienced developers, supporting rapid development of secure, scalable, and maintainable applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
