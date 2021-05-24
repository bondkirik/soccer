# Installation:

1. Clone the project from git repository

`git clone ...`
   
2. Install dependencies

`composer install`

3. Copy ".env.example" to ".env" file

`cp .env.example .env`

4. Create a database named `DB_DATABASE` in ".env" file

`create database soccer`

5. Generate new application security token

`php artisan key:generate`

6. Run database migrations

`php artisan migrate`

7. Seed the database

`php artisan db:seed`

8. start local serv

`php artisan serv`
