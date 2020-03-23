# Intellipharm Coding Challenge
## Matt Presland

Installation instructions are provided below to set this project up on your local environment. The project can also be viewed at https://intellipharm.mattpresland.com.au

## Installation Instructions

1. Clone repository from https://github.com/mpresland/intellipharm.git
2. Navigate to the project folder in your terminal or console
3. Install composer dependencies `composer install`
4. Copy the .env.example file to .env
5. Generate an application key using `php artisan key:generate`

## Database setup
If you plan on using an existing database with an existing members table, edit the .env file in the project's root directory and set the following setting to match your environment setup:
- DB_HOST
- DB_PORT
- DB_DATABASE
- DB_USERNAME
- DB_PASSWORD

If you do not have existing data available, I have included database migrations and a database seeder to provide demo data. First, you will need to create a new database and add the settings to the .env file as above. Then you can nuild the table structure and add data by running the following commands in the project's root directory:
- `php artisan migrate`
- `php artisan db:seed`

Once you have configured the database, you should be able to view the example project at the url provided by your local environment.
