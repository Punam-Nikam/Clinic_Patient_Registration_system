# 🏥 Clinic Patient Register

A simple **Clinic Patient Register** web application built using **Laravel and MySQL** to manage patient information and maintain their medical visit history.

The system allows clinic staff to register patients, update patient details, search patients, record visits, and view previous visit history.

---

## 📌 About the Project

The **Clinic Patient Register** is designed to digitize the basic patient registration and visit-record management process of a clinic.

Instead of maintaining patient information manually, the application provides a centralized system where patient details and their visit records can be stored and accessed easily.

### Main Workflow

```text
Register Patient
       ↓
Store Patient Details
       ↓
View Patient
       ↓
Add Patient Visit
       ↓
Store Symptoms & Prescription
       ↓
View Visit History
       ↓
Search / Filter Records
```

---

## ✨ Features

### 👤 Patient Management

* Register new patients
* View patient details
* Edit patient information
* Delete patient records
* Search patients by name or phone number

### 🩺 Visit Management

* Add a visit for an existing patient
* Store visit date
* Store patient symptoms
* Store prescription
* View complete patient visit history
* Filter visits using a date range

### ✅ Validation

The application validates:

* Patient name
* Age
* Gender
* Phone number
* Visit date
* Symptoms
* Prescription

### 🔗 Database Relationship

The project uses a **one-to-many relationship**:

```text
One Patient
    │
    ├── Visit 1
    ├── Visit 2
    ├── Visit 3
    └── Visit N
```

---

## 🛠️ Technologies Used

| Technology   | Purpose                   |
| ------------ | ------------------------- |
| PHP          | Backend programming       |
| Laravel      | Web application framework |
| MySQL        | Database                  |
| Blade        | Frontend templating       |
| HTML         | Page structure            |
| CSS          | Styling                   |
| Eloquent ORM | Database interaction      |
| Git & GitHub | Version control           |

---

## 🏗️ Architecture

The project follows the **MVC (Model-View-Controller)** architecture provided by Laravel.

```text
                 User
                  │
                  ▼
               Browser
                  │
                  ▼
              Routes
                  │
                  ▼
             Controllers
                  │
                  ▼
               Models
                  │
                  ▼
              MySQL DB
                  │
                  ▼
              Blade Views
                  │
                  ▼
               Browser
```

### Model

Models communicate with the database and define relationships.

```text
app/Models/
├── Patient.php
└── Visit.php
```

### View

Blade templates provide the user interface.

```text
resources/views/
├── layouts/
├── patients/
└── visits/
```

### Controller

Controllers handle application logic.

```text
app/Http/Controllers/
├── PatientController.php
└── VisitController.php
```

---

## 🗄️ Database Design

The application contains two main tables.

### Patients Table

```text
patients
--------------------------------
id
name
age
gender
phone
address
created_at
updated_at
```

### Visits Table

```text
visits
--------------------------------
id
patient_id
visit_date
symptoms
prescription
created_at
updated_at
```

### Relationship

The `visits.patient_id` column is a foreign key referencing `patients.id`.

```text
patients
   │
   │ 1
   │
   │
   │ many
   ▼
visits
```

In Laravel:

```php
// Patient.php

public function visits()
{
    return $this->hasMany(Visit::class);
}
```

```php
// Visit.php

public function patient()
{
    return $this->belongsTo(Patient::class);
}
```

---

## 📂 Project Structure

```text
ClinicPatientRegister/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── PatientController.php
│   │       └── VisitController.php
│   │
│   └── Models/
│       ├── Patient.php
│       └── Visit.php
│
├── database/
│   └── migrations/
│       ├── create_patients_table.php
│       └── create_visits_table.php
│
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       │
│       ├── patients/
│       │   ├── index.blade.php
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   └── show.blade.php
│       │
│       └── visits/
│           └── create.blade.php
│
├── routes/
│   └── web.php
│
├── .env.example
├── .gitignore
├── composer.json
└── README.md
```

---

## ⚙️ Installation & Setup

### 1. Clone the Repository

```bash
git clone https://github.com/YOUR_USERNAME/ClinicPatientRegister.git
```

Go into the project:

```bash
cd ClinicPatientRegister
```

---

### 2. Install PHP Dependencies

```bash
composer install
```

---

### 3. Create Environment File

Copy the example environment file:

```bash
copy .env.example .env
```

For Linux/macOS:

```bash
cp .env.example .env
```

---

### 4. Generate Application Key

```bash
php artisan key:generate
```

---

### 5. Configure Database

Create a MySQL database:

```text
clinic_patient_register
```

Then configure `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=clinic_patient_register
DB_USERNAME=root
DB_PASSWORD=
```

Update the username/password according to your local MySQL configuration.

---

### 6. Run Database Migrations

```bash
php artisan migrate
```

This creates the required database tables.

---

### 7. Start Laravel Development Server

```bash
php artisan serve
```

Open:

```text
http://127.0.0.1:8000
```

---

## 🚀 Application Flow

### 1. Patient Registration

The user enters:

```text
Name
Age
Gender
Phone
Address
```

The application validates the information and stores it in the `patients` table.

---

### 2. Patient Search

Patients can be searched using:

```text
Patient Name
Phone Number
```

---

### 3. Patient Details

The application displays:

```text
Patient Information
        +
Visit History
```

---

### 4. Add Visit

A visit can be added to an existing patient.

Example:

```text
Visit Date: 20-09-2026

Symptoms:
Fever and headache

Prescription:
Paracetamol and rest
```

---

### 5. Visit History

All visits belonging to the patient can be viewed.

The visit history can also be filtered using:

```text
From Date
To Date
```

---

## 🔐 Validation & Security

The project uses Laravel's built-in validation system.

Example:

```php
$request->validate([
    'name' => 'required|string|max:255',
    'age' => 'required|integer|min:0|max:120',
    'gender' => 'required|in:Male,Female,Other',
]);
```

Laravel CSRF protection is also used in forms:

```blade
@csrf
```

Sensitive environment configuration is excluded from Git using `.gitignore`.

The `.env` file is **not committed to the repository**.

---

## 🧩 Laravel Concepts Used

This project demonstrates the following Laravel concepts:

* MVC Architecture
* Routing
* Resource Controllers
* Blade Templates
* Eloquent ORM
* One-to-Many Relationships
* Route Model Binding
* Database Migrations
* Request Validation
* Mass Assignment
* CSRF Protection
* CRUD Operations
* Query Builder
* Search and Filtering
* MySQL Integration

---

## 📋 CRUD Operations

| Operation | Description                 |
| --------- | --------------------------- |
| Create    | Register a new patient      |
| Read      | View patient information    |
| Update    | Edit patient information    |
| Delete    | Remove patient              |
| Search    | Search by name/phone        |
| Visit     | Add and view patient visits |
| Filter    | Filter visits by date       |

---

## 🎯 Project Objective

The objective of this project is to provide a simple digital solution for managing clinic patient registration and visit records.

It demonstrates how Laravel can be used to build a structured CRUD-based web application with database relationships, validation, and search functionality.

---

## 🔮 Future Improvements

The application can be extended with:

* User authentication
* Admin and receptionist roles
* Doctor management
* Appointment scheduling
* Prescription management
* Billing and invoice generation
* Dashboard with statistics
* Patient report generation
* PDF export
* Email/SMS notifications
* Advanced reporting

---

## 👩‍💻 Author

**Punam Nikam**

MCA Student | Java & Web Development

---

## 📄 License

This project is developed for educational and portfolio purposes.
