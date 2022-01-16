<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About this project

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).
Laravel Task for Job Test
Getting started
Installation
Please check the official laravel installation guide for server requirements before you start. Official Documentation

Follow the following steps to run the application

Clone the repository and extract task.zip in htdocs OR www directory on your server.

Switch to the repo folder cd task

Install all the dependencies using composer

composer install
Copy the example env file and make the required configuration changes in the .env file

cp .env.example .env
Generate a new application key

php artisan key:generate
Run the database migrations (Set the database connection in .env before migrating)

php artisan migrate
Start the local development server

php artisan serve
You can now access the server at http://localhost:8000

Folders
app - Contains all the Eloquent models
app/Http/Controllers - Contains all the controllers
config - Contains all the application configuration files
Resources/views - Contains all the application layouts and interface files
Resources/views/layouts - Contains header and footer for dashbard
Resources/views/departments - Contains create, read, update and delete interfaces for deaprtments
Resources/views/employees - Contains import, create, read, update and delete interfaces for employees
Environment variables
.env - Environment variables can be set in this file
Note : You can quickly set the database information and other variables in this file and have the application fully working.

Testing Task
Run the laravel development server

php artisan serve
The project can now be accessed at

http://localhost:8000/register
Sample XML file for import
sample xml file is located on root directory you can use it for import sample-employees.xml

LIVE Demo
https://task.gameandgain.in

User: admin@admin.com

Pass: 1234567890
