# task
----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/8.x/installation)

Alternative installation is possible without local dependencies relying on [Docker](#docker). 
Follow the following steps to run the application

Clone the repository 

Switch to the repo folder
 cd task

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

***Note*** : It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

    php artisan migrate:refresh


## Folders

- `app` - Contains all the Eloquent models
- `app/Http/Controllers` - Contains all the controllers 
- `config` - Contains all the application configuration files
- `Resources/views` - Contains all the application layouts and interface files 
- `Resources/views/layouts` - Contains header and footer for dashbard 
- `Resources/views/departments` - Contains create, read, update and delete interfaces for deaprtments 
- `Resources/views/employees` - Contains import, create, read, update and delete interfaces for employees  

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

# Testing Task

Run the laravel development server

    php artisan serve

The project can now be accessed at

    http://localhost:8000/register

## Sample XML file for import
sample xml file is located on root directory you can use it for import ***sample-employees.xml***
Also you can import complete database which is placed in root directory **task.sql**


