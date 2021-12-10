# Laravel 8 From Scratch

Laravel From Scratch is a web application, where you can see the posts with different categories and authors,
also you can upload your posts as well and share your opinion about other posts.

![blog image](public/images/Laravel%20From%20Scratch%20Blog.png)

## Prerequisites

- [composer@2.1.9](https://getcomposer.org/)
- [php@8.0.8](https://www.php.net/downloads.php)
- [npm@8.1.0](https://nodejs.org/en/download/)

## Built with

- [Laravel](https://laravel.com/)
- [Alphine.js](https://alpinejs.dev/)
- [Tailwind](https://tailwindcss.com/)

## Getting Started

1. First of all you need to clone Laravel 8 From Scratch repository from github.
```
git clone https://github.com/RedberryInternship/lukabrazi-laravel-8-from-scratch
```
2. Next step requires you to run ``composer install`` in order to install all the dependencies.
```
composer install
```
3. After you have to install all the JS dependencies.
```
npm install
npm run dev
```
4. Now we need to set our **.env** file. Go to the root of your project and execute this command.
```
cp .env.example .env
```
This command should provide **.env** file all the necessary environment variables:

## Mysql

Now we need to provide **.env** file all necessary environment variables.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

You can delete all fields except ``DB_CONNECTION`` and insert a place **mysql** to **sqlite**
```
DB_CONNECTION=sqlite
```

After you should create in *database* folder file ``database.sqlite`` or you can create SQLITE database using the `touch` command in your terminal:
```
touch database/database.sqlite
```

After setting up **.env** file, execute:
```
php artisan key:generate
```
Which generates auth key.

### Seed database migration
Make SQLITE or MYSQL database user and connect to this project, then you can execute the commends:
```
php artisan migrate:fresh --seed
```


## Database Diagram
- **[Diagram](https://drawsql.app/redberry-15/diagrams/laravel-8-from-scratch-diagram)**

![blog image](public/images/Laravel%208%20From%20Scratch%20Diagram%20DrawSQL.png)

## Built-in development

You can run Laravel built-in development server by executing:
```
php artisan serve
```

### **Now, you should be good to go!** :sunglasses:




