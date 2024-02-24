#  Laravel Project Management System

I developed this application as an introductory project to familiarize myself with Laravel's fundamental principles and capabilities. It served as a hands-on learning experience covering essential aspects such as routing, controllers, views, models, migrations, and CRUD operations—essential functionalities for web application development.

## Requirements
•	PHP 8.1 or higher

## Version
This Laravel framework is running on a version of 10.10 and Bootstrap is running on 5.2.3.

## Usage <br>
Clone the repository <br>
```
git clone https://github.com/sameera-madushan/Laravel-Product-Management-System.git
```

Change directories into web <br>
```
cd Laravel-Product-Management-System/
```

Install composer <br>
```
composer install
```

Create the .env file by duplicating the .env.example file <br>
```
cp .env.example .env
```

Set the APP_KEY value <br>
```
php artisan key:generate
```

Clear your cache & config (OPTIONAL)
``` 
php artisan cache:clear && php artisan config:clear
```

Run migrations and seeds
``` 
php artisan migrate --seed
```

Finally, run your project in the browser!
```
php artisan serve
npm run dev
```
