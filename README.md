# Task Management

## Introduction

This test is developed using Laravel as backend, Angular as frontend and MySQL as database.

Following are the features developed using above mentioned technologies:

 - Login and logout using predefined users credentials in the database.
 - User authentication using simple username and password as:
	 - One admin user.
	 - Two normal users.
 - User roles predefined in the database.
 - Display project dropdown. On change, display the tasks associated with the selected project.
 - Create a new task with name and project fields entered by the user. Priority is calculated based on the highest priority found under the selected project.
 - Edit task where user can edit name and project associated with the task.
 - Delete a task.
 - Reorder the task list under selected project and save the new task order into the database.

## Laravel and database summary

I have used Service Oriented Architecture because of following reasons:

 - Code resuability and maintainence becomes easy.
 - We can easily add N number of different types of clients such web apps, mobile apps or even make it available as an external APIs in form of B2B approach.
 - Laravel is widely used as a backend backbone providing a strong backbone for REST APIs and other API formats as well.

Concepts used while development:

 - Database Migrations
 - Database Seeder
 - Database Model
 - Database normalization till 3NF
 - Repository Pattern
	 - Interfaces for each repository class
	 - Repository for each entity
 - Traits
 - REST APIs format
 - Dependency injection
 - Controllers
 - Routes
 - Relationships
	 - hasMany
	 - belongsTo

Steps to install and run the backend application on your local system:

 - Install PHP, Composer and the choice of your IDE for coding and MySQL queries.
 - Download and extract the provided laravel application. Also, please create a database with the details mentioned in the .env file.
 - Run `composer install` which will install the packages mentioned in *composer.json* file.
 - Run `php artisan migrate` to create the database table and default records for role	and user tables.
 - Run `php artisan serve` start the backend application.

## Angular

I have used Angular framework along with Bootstrap framework for designing and Angular Material for readily available components.

Concepts used while development:

 - Application skeleton
	 - Components
		 - Header
		 - Footer
		 - Login
		 - Dashboard
		 - Task management
	 - Services
		 - HttpHandler: A HTTP custom service provider built using core HTTP module to have better control over the API calls.
	 - Model
		 - User 
		 - Project
		 - Task

Steps to install and run the frontend application on your local system:

 - Install Node and Angular/CLI using following commands/guides:
	 - Node: [Install node](https://nodejs.org/en/download)
	 - NPM: `npm install -g @angular/cli`
 - Download and extract the provided Angular application.
 - Run `npm install` to install the packages listed in *package.json* file.
 - Run `npm start` to start the frontend application.

## In progress extra features

I am working on extra features such as:

 - Provision for Admin users to allocate task or project to other users. After allocation, users will only see contents assigned to them upon login.

That's it. You can now play around the Task Management application :)

