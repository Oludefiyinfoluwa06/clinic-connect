# ClinicConnect – Patient Card Opening

This is the Patient Card Opening section of **ClinicConnect**, a Laravel-based health record management system for school clinics. This section enables admins to register patients (students) and store their health profiles in a structured, secure, and retrievable format.

## 🩺 Purpose

To digitize and streamline the process of creating new patient records when students visit the school clinic, reducing paperwork and improving data accessibility and accuracy.

## 🚀 Features

-   Admin authentication
-   Patient card registration
-   View, edit, and delete patient records
-   Blade templates with reusable components

---

## 🧱 Tech Stack

-   **Framework**: Laravel 12
-   **Database**: SQLite
-   **Frontend**: Blade templating, Tailwind CSS
-   **Authentication**: Custom login logic

---

## 🗂️ Folder Structure (Relevant Parts)

```
app/
├── Http/
│ ├── Controllers/
│ │ ├── AuthController.php
│ │ └── PatientController.php
resources/
├── views/
│ ├── app/
│ │ ├── pages/
│ │ │ ├── auth/
│ │ │ │ ├── login.blade.php
│ │ │ └── dashboard/
│ │ │ ├── index.blade.php
│ │ │ ├── patients/
│ │ │ │ ├── index.blade.php
│ │ │ │ ├── create.blade.php
│ │ │ │ └── edit.blade.php
│ ├── components/
│ │ ├── auth-layout.blade.php
│ │ ├── input.blade.php
│ │ ├── button.blade.php
│ │ └── card.blade.php
│ │ └── layout.blade.php
│ │ └── navbar.blade.php
│ │ └── quick-links.blade.php
│ │ └── sidebar.blade.php
routes/
└── web.php
```

---

## 🔐 Authentication

Admin login is implemented manually via the `AuthController`. It checks the provided email/password against stored records (hashed password check) in the `admins` table.

### Routes

```php
Route::get('login', [AuthController::class, 'showLoginPage'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('logout',[AuthController::class, 'logout'])->name('logout');
```

---

## 📝 Patient Card Management

### Routes

```php
Route::middleware('auth:admin')->group(function () {
Route::prefix('patients')
->name('patients.')
->controller(PatientController::class)
->group(function () {
Route::get('/', 'index')->name('index');
Route::get('create', 'create')->name('create');
Route::post('/', 'store')->name('store');
Route::get('{patient}/edit', 'edit')->name('edit');
Route::put('{patient}', 'update')->name('update');
Route::delete('{patient}', 'destroy')->name('destroy');
});
});
```

### Model Fields

Ensure your `Patient` model and migration include:

-   `surname`
-   `first_name`
-   `other_name` (nullable)
-   `hospital_number` (auto-generated)
-   `place_of_origin`
-   `state`
-   `local_government_area`
-   `phone_number`
-   `address`

Related tables:

-   **NextOfKin**: `patient_id`, `full_name`, `relationship`, `phone_number`, `address`
-   **VitalSign**: `patient_id`, `temperature`, `blood_pressure`, `pulse`

---

## 🖥️ Blade Components

-   **Input**: `<x-input name="field" label="Label" :value="..." required />`
-   **Button**: `<x-button tone="primary">Click</x-button>`
-   **Card**: `<x-card title="Title" :value="$value" icon="users" tone="primary" />`

---

## ✅ Setup Instructions

1. Clone the repository
2. Run `composer install`
3. Copy `.env.example` to `.env` and configure your database
4. Run `php artisan migrate`
5. (Optional) Run `php artisan db:seed` to create an admin
6. Run `php artisan serve`

---
