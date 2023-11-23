<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

application need to run this project

	XAMPP
	NODE JS
	VISUAL STUDIO CODE
	GIT BASH
	GITHUB ACCOUNT

how to run this project:

	open cmd or other terminal
	git clone {url}
	cd waste-disposal-tracking-system	         // project directory
	code .			     		         // shortcut to open with vs code
	composer install 
	npm install
	npm install -D tailwind css
	npx tailwind css init
    
    locate config.js and paste this
    /** @type {import('tailwindcss').Config} */
    module.exports = {
    content: ["./src/**/*.{html,js}"],
    theme: {
        extend: {},
    },
    plugins: [],
    }
    
	php artisan optimize
	php artisan key:generate

	copy the env-example change to -.env 
	copy the db name and create your db

	php artisan migrate
	php artisan migrate:fresh --seed
	php artisan optimize
	php artisan serve
    npm run dev

        php artisan make:controller SampleController    // to create new controller in terminal
        php artisan make:model ModelName                // to create a new model in terminal

        php artisan optimize:clear
        php artisan route:clear
        php artisan cache:clear

git basic commands

    git pull
    git fetch
    git switch "branch name"
    git commit =m "initial commit"
    git push

Prepared by: Kevs404
