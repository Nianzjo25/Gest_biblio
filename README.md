# Laravel Project Setup (Existing Project)

## Prerequisites

Before you begin, make sure you have the following installed:

- **PHP (version 8.1 or higher)**
- **Composer**
- **MySQL or another database system (depending on the project)**

## Steps to Set Up the Existing Laravel Project

### 1. Clone the Project

Clone the project repository to your local machine:

```bash
git clone https://github.com/Nianzjo25/Gest_biblio.git
```

Navigate to the project directory:

```bash
cd Gest_biblio
```

### 2. Install Dependencies

Use Composer to install the PHP dependencies:

```bash
composer install
```

### 3. Set Up Environment Variables

Copy the .env.example file to .env:

```bash
cp .env.example .env
```

Configure the .env file to match your local setup, especially the database details:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Generate an Application Key

Generate a new application key:

```bash
php artisan key:generate
```

### 5. Set Up the Database

Create the database manually, and then run the migrations to create the necessary tables:

```bash
php artisan migrate
```

Run seeders if necessary:

```bash
php artisan db:seed
```

### 6. Start the Development Server

Start the Laravel development server:

```bash
php artisan serve
```

By default, the application will be accessible at http://localhost:8000.
