# DataBasesProject2
Part 2 of the Database Project – Internship Management (2025–2026)

This phase focuses on the efficiency, handling, and automation of the database, as well as on the creation of a web-based prototype.

> **IMPORTANT NOTE:** For this part, the database (relational model) provided by the teaching staff must be used, and not the version developed in Part 1.

# Useful Links

- **P2 Report:** https://docs.google.com/document/d/1Q9nS9DfwMJb0WWhF4Dng6ZDCNCBWoLNkoY9ikWcK8sU/edit?usp=sharing

# Development Checklist

### 1. Automation (SQL)
*Triggers (T), Stored Procedures (P), and Functions (F)*

- [x] **T1:** Validate Intern Evaluation (1 to 5).
- [x] **T2:** Validate that `start_date` < `end_date`.
- [x] **P1:** Register internship (verify existence of: student, company, supervisor).
- [x] **P2:** List internships that start in X days.
- [x] **F1:** Function to calculate the average evaluations of a company per academic year.
- [x] **F2:** Function to calculate the weighted average of the final internship grade.

### 2. Data Queries (SQL)
*Queries (Q) and Views (V)*

- [x] **Q1:** Supervisors and total number of supervised internships (>1).
- [x] **Q2:** Companies and average assigned grades (>=14).
- [x] **Q3:** Companies and total number of marketed products (at least 1).
- [x] **Q4:** Companies and total number of internships (at least 1).
- [x] **Q5:** Courses with number of classes above the overall average.
- [x] **Q6:** Supervisors “above average” (individual vs global comparison).
- [x] **V1:** View with internship details per supervisor and averages.
- [x] **V2:** View with average final grades per company and course.

### 3. Web-Based System (PHP/HTML)
*Three distinct portals*

- [x] **Administrator Portal:**
    - [x] Manage Internships (Create, Edit, Delete).
    - [x] Add Students.
- [x] **Student Portal:**
    - [x] List companies (filter by sector/location).
    - [x] View internship details (transport, supervisor, etc.).
- [x] **Supervisor Portal:**
    - [x] Register grades and finalize internship (automatic calculation).

# Final Deliverables

- [ ] P-P2 Report (.pdf/.doc)
- [ ] Database Backup with automation (.sql)
- [ ] Web Prototype (.zip or .rar)
- [ ] Presentation Video (.mp4)

# Important Notes

- **Database:** Strictly use the model provided by the lecturers.
- **Backups:** Always work with the current file and regularly compress it into a zip with the version name.
- **DO NOT DELETE BACKUPS:** Always store them in the archive folder.
- **Minimum Grade:** The overall average (P1 + P2) must be >= 8.

# Final To-Do List

- **1. Automation:** Review all points;
- **2. Comments:** Review comments in the SQL code so they do not appear overly AI-generated;
- **3. Export Database:** When importing the database into your XAMPP, keep the database name as `"siestagios2_v1"`.
