# Laravel Library API

A brief description of the Laravel application. What is its purpose? What problem does it solve?

---

## 📋 Table of Contents

* [Prerequisites](#-prerequisites)
* [Installation](#-installation)
* [Environment Setup](#-environment-setup)
* [Database Migration & Seeding](#-database-migration--seeding)
* [Running the Application](#-running-the-application)

---

## ✅ Prerequisites

Before you begin, ensure you have the following installed on your system:

* **PHP:** Version 8.1 or higher.
* **Composer:** For managing PHP dependencies.
* **Node.js & npm:** For managing front-end assets.
* **A database system:** Such as MySQL, PostgreSQL, or SQLite.

---

## 📦 Installation

Follow these steps to get the project up and running:

1.  **Clone the repository:**
    ```bash
    git clone [https://github.com/Harithamolvh/laravel-library-api.git](https://github.com/Harithamolvh/laravel-library-api.git)
    cd laravel-library-api
    ```
    *Note: The repository name in the clone URL is `laravel-library-api`, but the directory you are changing into is `library-app`. I will correct the `cd` command to match the repository name.*

2.  **Install PHP dependencies:**
    ```bash
    composer install
    ```

3.  **Install Node.js dependencies:**
    ```bash
    npm install
    ```

4.  **Build front-end assets:**
    ```bash
    npm run dev
    ```

---

## ⚙️ Environment Setup

1.  **Create a copy of the environment file:**
    ```bash
    cp .env.example .env
    ```

2.  **Generate an application key:**
    ```bash
    php artisan key:generate
    ```

3.  **Edit the `.env` file** and configure your database connection and other environment variables.

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

---

## 🗄️ Run the application


```bash
php artisan serve