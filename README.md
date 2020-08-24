# Simple URL Shortener

Create with laravel framework

### Clone the code from github

``git clone https://github.com/michael520/simpleURLshorten.git``

### install package from composer

``composer install``

### Edit .env which mysql connection

``cp .env.example .env``
``vim .env``

### give a new app key

``php artisan key:generate``

### do migration to install url shorten table

``php artisan migrate``

### run the service

``php artisan serve``

### Go to the main page and get better life

``http://localhost:8000/generate-shorten-link``
