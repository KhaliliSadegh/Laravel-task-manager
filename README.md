# Laravel Task Manager

A clean, modern **Task Management web application** built with **Laravel 11**, **MySQL**, **Docker**, **Tailwind CSS**, and **vanilla JavaScript**.  
This project was designed for clarity, simplicity, and code readability — following **Laravel best practices** throughout.

---

## 🧱 Features

✅ Create, edit, and delete tasks  
✅ Drag-and-drop reordering (priority auto-updates in database)  
✅ Filter tasks by project  
✅ Manage projects (create/edit/delete)  
✅ Persistent MySQL storage  
✅ Fully Dockerized (LEMP stack)  
✅ Built using Blade templates + Tailwind CSS  

---

## 🚀 Quick Start Guide

### 1️⃣ Clone the Repository
```bash
git clone https://github.com/minionhub/laravel-task-manager.git
cd laravel-task-manager
```
Then you can easily generate pplication key, do the migration and run the app locally:
```bash
php artisan key:generate
php artisan migrate
php artisan serve
```
Once run sucessfully: 

👉 http://localhost:8000

Or can execute it in docker. 
### 2️⃣ Copy Environment File
```bash
cp .env.example .env

docker-compose up -d --build
```
3️⃣ Start Docker Containers
```bash
docker-compose up -d --build
```

4️⃣ Install Dependencies
```bash
docker exec -it laravel-app composer install
```

5️⃣ Generate Application Key
```bash
docker exec -it laravel-app php artisan key:generate
```

6️⃣ Run Migrations & Seed Demo Data
```bash
docker exec -it laravel-app php artisan migrate --seed
```

This seeds 3 demo projects, each with 5–8 random tasks.
Access the App

Once setup is complete, open:

👉 http://localhost:8000

You’ll see a task list you can drag and drop to reorder.
Projects can be filtered from the dropdown at the top.