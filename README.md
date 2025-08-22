 Installation
Follow these steps to get the project up and running:

Clone the repository:

Bash

git clone https://github.com/Harithamolvh/laravel-library-api.git
cd library-app
Install PHP dependencies:

Bash

composer install
Install Node.js dependencies:

Bash

npm install
Build front-end assets:

Bash

npm run dev
⚙️ Environment Setup
Create a copy of the environment file:

Bash

cp .env.example .env
Generate an application key:

Bash

php artisan key:generate
Edit the .env file and configure your database connection and other environment variables.

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
🗄️ Database Migration & Seeding
Run the migrations to create the database tables and seed the database with initial data:


Bash

php artisan serve
The application will be accessible at http://127.0.0.1:8000.

