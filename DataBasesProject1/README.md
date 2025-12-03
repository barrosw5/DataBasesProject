# SIESTÁGIOS - Part 1: Database Design & Modeling

This directory contains the **first phase** of the practical assignment for the **Databases** course (2025/2026).
The goal of this phase was to design and implement the relational database for the "SIESTÁGIOS" system, an information system dedicated to managing internships in a vocational school.

## 📌 Overview

In this part, we focused on the conceptual and logical modeling of the system, transitioning from a UML Class Diagram to a Relational Schema, and finally implementing it in SQL.

### Key Deliverables:
* **Conceptual Modeling:** UML Class Diagram representing entities like *Students*, *Companies*, *Internships*, *Teachers*, etc.
* **Logical Modeling:** Relational Schema derived from the UML diagram, including normalization and integrity constraints.
* **Physical Implementation:** SQL scripts (`.sql`) to create the database structure (DDL) and populate it with test data (DML).
* **Documentation:** A full report (`Relatório P-P1.pdf`) detailing the design decisions, assumptions, and data dictionary.

## 📂 Folder Structure

* **`SIESTAGIOS/`**: Contains the source files for the BOUML project (UML diagrams).
* **`Relatório P-P1.pdf`**: The detailed report for Part 1.
* **`SIESTAGIOS.sql` / `siestagios_v5.sql`**: The SQL script containing the database schema (`CREATE TABLE`) and initial data insertion (`INSERT INTO`).
* **`128014.diagram`**: Image/Export of the Class Diagram.

## 🛠️ Tools Used

* **Modeling:** [Bouml](https://www.bouml.fr/) (for UML Class Diagrams).
* **DBMS:** MariaDB (via XAMPP).
* **Language:** SQL.

## 🚀 How to Use

1.  **Pre-requisite:** Ensure you have a MySQL/MariaDB server running (e.g., via XAMPP).
2.  **Import:**
    * Open your database management tool (e.g., phpMyAdmin).
    * Create a new database (e.g., `siestagios`).
    * Import the `siestagios_v5.sql` (or the latest `.sql` version available in this folder).
3.  **Verify:** Check if all tables (e.g., `aluno`, `empresa`, `estagio`, `formador`) are created and populated with test data.

## 👥 Group - Members

* **David Vicente**
* **João Almeida** 
* **Martim Barros** 
* **Pedro Coelho**

---
*Databases Course - LEI- ISCTE-IUL*
