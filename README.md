## Export CSV based on tags

Used languages
- PHP, JavaScript

Framework
- Laravel

Libraries
- JQuery, Select2.js

## Usage

You need to make tables & seed the data to the database using the commands:
- php artisan migrate
- php artisan db:seed

## The task in Russian

Поиск товаров по заданным тегам. На странице должны быть 2 списка с множественным выбором: какие теги должны входить, и какие не должны. После отправки поискового запроса необходимо выбрать из базы данных (MySQL) товары, удовлетворяющие заданному условию, используя SQL-запрос. Также подходящим товарам необходимо увеличить счетчик «просмотра» (поле show_count). После этого полученный список необходимо отправить в ответе как CSV-файл следующего формата: «идентификатор_товара – название_товара».
