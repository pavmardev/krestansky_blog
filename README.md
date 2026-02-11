# Krestansky Blog

Krestansky Blog is a student full-stack web application focused on building a Christian blog platform.  

The main objective of the project was backend development using **PHP with PDO** for secure database communication. The frontend was based on a pre-built **Bootstrap template** and adapted to the project requirements.  

The project also includes database design using **MySQL Workbench (ERD)** and local deployment via **XAMPP**.

---

## Project Objective

The purpose of this project was to:

- Design and implement a relational database
- Create an ERD diagram in MySQL Workbench
- Develop backend logic using PHP
- Connect PHP to MySQL using PDO prepared statements
- Deploy and test the application locally using XAMPP

---

## Technologies Used

- PHP (PDO)
- MySQL
- MySQL Workbench
- Bootstrap (Frontend Template)
- HTML
- CSS
- XAMPP

---

## Features

- Display blog posts from the database
- View detailed post content
- Create, edit, and delete posts (CRUD operations)
- Secure database communication using PDO prepared statements
- Input validation and basic data sanitization
- User authentification
- Admin page accessible only for admin and registred authors
- Project is written OOP design pattern

---

## Database Design

The database was designed using **MySQL Workbench**, where an ERD (Entity-Relationship Diagram) was created before implementation.

Main tables include:

- users
- posts
- categories
- comments

---

## Installation & Setup (XAMPP)

1. Install and open **XAMPP**.
2. Start:
   - Apache
   - MySQL

3. Clone this repository into:
   C:\xampp\htdocs\
4. Open **phpMyAdmin** and create a database named:
   sj_db
5. Import the provided SQL file (if included).
6. Update database credentials in `Database.php` if needed:

    ```php
    private $host = "localhost";
    private $db = "sj_db";
    private $user = "root";
    private $pass = "";
7. Open the application in your browser:
    http://localhost/krestansky_blog/

## Author

Pavol Marko
Student Project – 2025
