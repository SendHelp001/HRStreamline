Sure! Here's the edited version of your provided information in a clean, structured format for a `README.md` file.

````markdown
# HRIS (Human Resource Information System) - Laravel Application

## Overview
This is a comprehensive **HRIS system** built with **Laravel** that manages employee information, attendance, leaves, payroll, and performance reviews. The system features **role-based access control** with **admin**, **manager**, and **user** roles.

## Installation

### Prerequisites
Before getting started, make sure you have the following installed:

- **PHP 8.1 or higher**
- **Composer**
- **MySQL/MariaDB**
- **Node.js** (for frontend assets)
- Laravel requirements:
  - OpenSSL
  - PDO
  - Mbstring

### Steps

1. **Clone the repository**:
   ```bash
   git clone [repository-url]
   cd hris-laravel
````

2. **Install PHP dependencies**:

   ```bash
   composer install
   ```

3. **Install Node.js dependencies**:

   ```bash
   npm install
   ```

4. **Create and configure the `.env` file**:

   ```bash
   cp .env.example .env
   ```

   Edit the `.env` file with your database credentials and other necessary settings.

5. **Generate application key**:

   ```bash
   php artisan key:generate
   ```

6. **Run database migrations and seeders**:

   ```bash
   php artisan migrate --seed
   ```

7. **Build frontend assets**:

   ```bash
   npm run build
   ```

8. **Set up storage link**:

   ```bash
   php artisan storage:link
   ```

## Database Setup

The application comes with seeders that will create:

* **Default admin user**:

  * Email: `admin@example.com`
  * Password: `admin123`

* **Basic system data**:

  * Departments
  * Job positions
  * Salary grades
  * Payment frequency types

## Usage

### Accessing the System

* **Admin Dashboard**:

  * URL: `/dashboard`
  * Credentials: `admin@example.com / admin123`

* **User Login**:

  * URL: `/login`
  * Users can register themselves or be created by admins.

### Key Features

#### Employee Management:

* Add/edit employee profiles
* Track personal information and contact details
* Manage employment details (department, position)

#### Attendance Tracking:

* Clock in/out functionality
* Attendance records

#### Leave Management:

* Request and approve leaves
* Track leave balances

#### Payroll Processing:

* Generate payroll
* Track payment history

#### Performance Reviews:

* Conduct employee evaluations
* Track performance metrics

## Development

### Running the Development Server

1. **Start Laravel server**:

   ```bash
   php artisan serve
   ```

2. **Run frontend development server**:

   ```bash
   npm run dev
   ```

Now you're all set up to start developing or testing the HRIS application!

