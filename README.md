# 🚗 Car Rental Management App

A full-stack web application to manage a car rental business, built with **Laravel** and **MySQL**.

## ✨ Features

- 🔐 User authentication (register / login)
- 🚘 Cars management (create, view, edit, delete)
- 👥 Clients management (full CRUD)
- 📅 Reservations management (full CRUD)

## 🛠️ Tech Stack

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

## ⚙️ Installation

1. Clone the repository
```bash
   git clone https://github.com/nesrinelahbecha/car-rental-laravel.git
   cd car-rental-laravel
```
2. Install dependencies
```bash
   composer install
```
3. Create your environment file and generate the app key
```bash
   copy .env.example .env
   php artisan key:generate
```
4. Create a MySQL database, then set your credentials in `.env`
5. Run the migrations
```bash
   php artisan migrate
```
6. Start the server
```bash
   php artisan serve
```

## 🚧 Roadmap

- [ ] Redesign the user interface
- [ ] Add a dashboard with statistics
- [ ] Add search and filters

## 👩‍💻 Author

**Nesrine Lahbecha**, Full-Stack Web & Mobile Developer

💼 [LinkedIn](https://www.linkedin.com/in/nesrinelahbecha)
