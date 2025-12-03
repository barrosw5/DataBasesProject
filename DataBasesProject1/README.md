# SIESTÁGIOS - Part 2: Database Automation & Web Prototype

This directory contains the **second phase** of the practical assignment for the **Databases** course (2025/2026).
Building upon the data model created in Part 1, this phase focuses on database **automation**, **optimization**, and the development of a **Web-Based Prototype** to manage the internship system.

## 📌 Overview

The goal of this phase was to operationalize the "SIESTÁGIOS" system. We implemented server-side logic using SQL (Triggers, Stored Procedures, Functions) to ensure data integrity and automate tasks. Additionally, we built a functional web interface using PHP to allow different user profiles (Admin, Student, Supervisor) to interact with the database.

## 🚀 Key Features

### 1. SQL Automation & Logic
We implemented the following mechanisms directly in the database:

* **Triggers:**
    * **T1:** Validates that intern ratings are within the 1-5 range (on Insert and Update).
    * **T2:** Ensures internship consistency by preventing `start_date` from being later than `end_date`.
* **Stored Procedures:**
    * **P1:** Registers a new internship with strict validation (checks if Student, Company, and Supervisor exist before insertion).
    * **P2:** Lists internships starting within a specific number of days (input parameter).
* **Functions:**
    * **F1:** Calculates the average rating of a specific establishment for a given academic year.
    * **F2:** Calculates the weighted average for the final internship grade based on 4 distinct evaluation components.

### 2. Data Analysis (Views)
We created complex SQL Views to answer specific management indicators:
* **Q1-Q6:** Statistical queries (e.g., Supervisors with >1 internship, Companies with ratings >14, Courses with class counts above average).
* **V1:** Detailed view of internships per supervisor.
* **V2:** Average final grades grouped by Company and Course.

### 3. Web-Based Prototype
A web application developed in **PHP** utilizing the **MariaDB** database, featuring three distinct portals:
* **Administrator Portal:** Manage internships (Create/Edit/Delete) using Stored Procedure P1 for validation; register new students.
* **Student Portal:** Search available companies (filtering by location) and view detailed internship info (transport, supervisor contacts).
* **Supervisor (Formador) Portal:** View assigned interns and grade them. The system automatically calculates the final grade upon submission.

## 📂 Folder Structure

* **`siestagios_web_based/`**: Contains the source code for the web application.
    * `admin/`: Scripts for the Administrator profile.
    * `aluno/`: Scripts for the Student profile.
    * `formador/`: Scripts for the Supervisor profile.
    * `db.php`: Database connection configuration.
* **`BDVersions/`**: Contains SQL backups and versioning.
* **`bd2526_v2.sql`**: The final SQL script containing the schema, data, and all automatisms (Triggers/Procedures/Functions).
* **`Relatório BD - parte 2.pdf`**: The detailed report explaining the implementation.

## 🛠️ Setup & Installation

1.  **Database Import:**
    * Open your database manager (e.g., phpMyAdmin via XAMPP).
    * Create a database named `siestagios2_v1` (or match the name in `db.php`).
    * Import the file `bd2526_v2.sql`.
2.  **Web Configuration:**
    * Copy the `siestagios_web_based` folder to your server's root (e.g., `C:\xampp\htdocs\`).
    * Verify `db.php` to ensure the username/password matches your local SQL setup.
3.  **Access:**
    * Open your browser at `http://localhost/siestagios_web_based/`.
    * **Login Credentials** (Examples from test data):
        * *Admin:* `paulo.rocha` / `pass123`
        * *Student:* `joao.silva` / `pass123`
        * *Supervisor:* `ana.mendes` / `pass123`

## 👥 Group - Members

* **David Vicente** 
* **João Almeida** 
* **Martim Barros** 
* **Pedro Coelho** 

---
*Databases Course - LEI- ISCTE-IUL*
