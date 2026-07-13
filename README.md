# StockPilot API 🚀

**StockPilot API** adalah backend REST API untuk sistem **SaaS Inventory Management** berbasis Laravel. Project ini dirancang dengan konsep **multi-tenant architecture**, di mana setiap perusahaan memiliki data inventory dan user masing-masing secara terisolasi.

Project ini dibuat untuk membangun sistem manajemen stok yang scalable, aman, dan siap dikembangkan menjadi aplikasi SaaS dengan frontend terpisah.

---

## 🚀 Tech Stack

* **Backend:** Laravel 12
* **Language:** PHP 8.3
* **Database:** MySQL
* **Authentication:** Laravel Sanctum
* **API Testing:** Postman
* **Development Environment:** Laragon

---

## ✨ Current Features

### Authentication

* ✅ User Registration
* ✅ User Login
* ✅ User Logout
* ✅ Get Current User (`/api/me`)
* ✅ Token Authentication menggunakan Laravel Sanctum

### Multi Tenant System

* ✅ Company Management Foundation
* ✅ User terhubung dengan Company
* ✅ Data isolation berdasarkan `company_id`

### Category Management

* ✅ Create Category
* 🔄 Read Category
* 🔄 Update Category
* 🔄 Delete Category

---

## 🏗️ Project Architecture

Konsep utama StockPilot menggunakan sistem multi-tenant:

```
Company
   |
   ├── Users
   |
   ├── Categories
   |
   ├── Products
   |
   └── Inventory Transactions
```

Setiap data bisnis akan memiliki hubungan dengan `company_id`, sehingga satu perusahaan tidak dapat mengakses data perusahaan lain.

---

## 📂 Folder Structure

```
stockpilot-api/
│
├── app/
│   ├── Models/
│   ├── Http/
│   │   └── Controllers/
│
├── database/
│   └── migrations/
│
├── routes/
│   └── api.php
│
├── config/
│
├── public/
│
└── artisan
```

---

## ⚙️ Installation

### 1. Clone Repository

```bash
git clone https://github.com/imZaaa/StockPilot-API.git
```

Masuk ke folder project:

```bash
cd StockPilot-API
```

---

### 2. Install Dependency

```bash
composer install
```

---

### 3. Setup Environment

Copy file `.env.example` menjadi `.env`

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

---

### 4. Configure Database

Edit file `.env`

```env
DB_DATABASE=stockpilot
DB_USERNAME=root
DB_PASSWORD=
```

---

### 5. Run Migration

```bash
php artisan migrate
```

---

### 6. Run Application

```bash
php artisan serve
```

API berjalan di:

```
http://127.0.0.1:8000
```

---

## 🔐 API Authentication

StockPilot menggunakan Laravel Sanctum.

Setelah login berhasil, API akan memberikan token:

```
Bearer Token
```

Token tersebut digunakan untuk mengakses endpoint yang membutuhkan autentikasi.

Contoh:

```
Authorization: Bearer {token}
```

---

## 📌 API Endpoint

### Authentication

| Method | Endpoint        | Description              |
| ------ | --------------- | ------------------------ |
| POST   | `/api/register` | Register company & owner |
| POST   | `/api/login`    | User login               |
| POST   | `/api/logout`   | Logout user              |
| GET    | `/api/me`       | Get authenticated user   |

---

### Categories

| Method | Endpoint               | Description         |
| ------ | ---------------------- | ------------------- |
| POST   | `/api/categories`      | Create category     |
| GET    | `/api/categories`      | Get categories      |
| GET    | `/api/categories/{id}` | Get category detail |
| PUT    | `/api/categories/{id}` | Update category     |
| DELETE | `/api/categories/{id}` | Delete category     |

---

## 🛣️ Development Roadmap

* [x] Authentication System
* [x] Laravel Sanctum Integration
* [x] Multi Tenant Foundation
* [x] Category Module
* [ ] Product Management
* [ ] Supplier Management
* [ ] Stock In / Stock Out
* [ ] Inventory History
* [ ] Dashboard Analytics
* [ ] Next.js Frontend Integration

---

## 🎯 Goal

StockPilot dikembangkan sebagai project portfolio untuk membangun sistem SaaS inventory management dengan pendekatan backend engineering yang scalable dan maintainable.

---

## 👨‍💻 Author

**imZaaa**

Built with Laravel ❤️
