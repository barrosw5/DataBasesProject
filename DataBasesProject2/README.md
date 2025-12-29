# 🎓 SI Estágios - Internship Management System (Phase 2)

![Project Status](https://img.shields.io/badge/Status-Completed-success)
![Version](https://img.shields.io/badge/Version-2.0-blue)
![Tech](https://img.shields.io/badge/PHP-8.2-purple)
![DB](https://img.shields.io/badge/MySQL-MariaDB-orange)

**SI Estágios** is a comprehensive Internship Management System developed as part of the Database Project (2025–2026). This phase focuses on database efficiency, automation (SQL), and the implementation of a functional web prototype for three distinct user profiles: Administrators, Students, and Supervisors.

---

## 🚀 Features

### 💻 Web Portal (PHP/HTML)
The web interface is divided into three distinct access portals:

* **🛡️ Administrator Portal**
    * Full CRUD management of Internships (Create, Edit, Delete).
    * Student registration and management.
    * System overview dashboard.
* **🎓 Student Portal**
    * Browse available companies (filtered by sector/location).
    * View detailed internship information (transportation, supervisors, etc.).
* **📋 Supervisor (Formador) Portal**
    * Grade registration.
    * Automatic calculation of final internship grades based on weighted averages.

### 🗄️ Database Automation (SQL)
The backend utilizes advanced SQL features to ensure data integrity and automate logic:

| Type | ID | Description |
| :--- | :--- | :--- |
| **Trigger** | `T1` | Validates that evaluation scores are within range (1-5). |
| **Trigger** | `T2` | Ensures internship `start_date` is strictly before `end_date`. |
| **Procedure** | `P1` | Registers new internships with validation checks (Student/Company/Supervisor existence). |
| **Procedure** | `P2` | Generates lists of internships starting within `X` days. |
| **Function** | `F1` | Calculates average company evaluations per academic year. |
| **Function** | `F2` | Computes the weighted average for the final internship grade. |

---

## 🛠️ Tech Stack

* **Frontend:** HTML5, CSS3, Bootstrap 5 (Custom "Blue-Dark" Theme).
* **Backend:** PHP 8.2.
* **Database:** MySQL / MariaDB (Relational Model).
* **Environment:** XAMPP (Apache Server).

---

## ⚙️ Installation & Setup

1.  **Clone the Repository**
    ```bash
    git clone [https://github.com/yourusername/si-estagios.git](https://github.com/yourusername/si-estagios.git)
    ```

2.  **Database Configuration**
    * Open **XAMPP** (or your preferred local server) and start **Apache** and **MySQL**.
    * Open phpMyAdmin (`http://localhost/phpmyadmin`).
    * Create a new database named: `siestagios2_v1`
    * Import the provided SQL file: `initialDB.sql` (or the latest backup `.sql` file).

3.  **Project Deployment**
    * Move the project folder to your server's root directory (e.g., `C:/xampp/htdocs/siestagios`).
    * Ensure `db.php` is correctly configured:
        ```php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "siestagios2_v1";
        ```

4.  **Launch**
    * Open your browser and navigate to: `http://localhost/siestagios/siestagios_web_based/`

---

## 🔐 Demo Credentials

Use the following accounts (from `initialDB.sql`) to test the different user roles:

| Role | Username | Password |
| :--- | :--- | :--- |
| **Student** | `joao.silva` | `pass123` |
| **Supervisor** | `ana.mendes` | `pass123` |
| **Admin** | `helena.alves` | `pass123` |

---

## 📂 Project Structure

```text
DataBasesProject2/
├── 📂 BDVersions/             # SQL Backups and Versioning
├── 📂 siestagios_web_based/   # Web Application Source Code
│   ├── 📂 admin/              # Administrator pages
│   ├── 📂 aluno/              # Student pages
│   ├── 📂 formador/           # Supervisor pages
│   ├── 📂 includes/           # Header/Footer partials
│   ├── 📄 db.php              # Database connection
│   └── 📄 index.php           # Login Portal
├── 📄 initialDB.sql           # Initial Database Dump
└── 📄 README.md               # Documentation
