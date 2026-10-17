# CPEMS - Curfew e-Pass Management System

A PHP and MySQL web app for issuing, searching and reporting on curfew e-passes. Built as an undergraduate mini-project.

![PHP](https://img.shields.io/badge/PHP-8.3_tested-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8-4479A1?logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-3-7952B3?logo=bootstrap&logoColor=white)
![jQuery](https://img.shields.io/badge/jQuery-0769AD?logo=jquery&logoColor=white)
[![PHP check](https://github.com/smadhu6364-beep/CPEMS-finall/actions/workflows/ci.yml/badge.svg)](https://github.com/smadhu6364-beep/CPEMS-finall/actions/workflows/ci.yml)

## Features

- **Public page** - anyone can look up a pass by its number.
- **Admin panel** - log in, issue and edit passes, manage pass categories and sub-admins.
- **Sub-admin panel** - a restricted login that can issue and search passes only.
- **Reports** - passes issued today, yesterday, in the last 7 days, between two dates, and by creator.

## Stack

PHP (PDO), MySQL, Bootstrap, jQuery, DataTables

## Run it locally

1. Install [XAMPP](https://www.apachefriends.org/) (Apache + PHP 8 + MySQL) or any similar stack.
2. Copy `c-curfew/c-curfew` into your web root, e.g. `htdocs/c-curfew`.
3. Create a database named `cpms` and import the schema and sample data:
   ```bash
   mysql -u root -e "CREATE DATABASE cpms"
   mysql -u root cpms < c-curfew/c-curfew/SQL/cmps.sql
   ```
4. If your MySQL user is not `root` with no password, edit the three `includes/dbconnection.php` files (`includes/`, `admin/includes/`, `admin/sub/includes/`).
5. Open `http://localhost/c-curfew/`. The admin panel is at `/c-curfew/admin/`.

Sample login from the SQL file: user `admin`, password `Test@123`. Change it straight away.

Quick alternative without Apache: `cd c-curfew/c-curfew && php -S localhost:8080`.

## Structure

```
c-curfew/c-curfew/
  index.php            public pass lookup
  admin/               admin panel (passes, categories, sub-admins, reports)
  admin/sub/           sub-admin panel
  includes/            DB connection, header, footer
  SQL/cmps.sql         schema + sample data
CPEMS finall.pdf       project report
CEPMS-PPT (2).pptx     presentation slides
```

## Status

- Archived college project, kept for reference.
- CI runs on every push: every PHP file passes `php -l` on PHP 8.3, the SQL imports into MySQL 8, and the public page, admin login and main admin pages load without PHP errors.
- Fixed in the 2026 refresh: the SQL file referenced a `tblsubadmin` table that does not exist, so the import failed part-way.
- Known limits, left as they were: passwords are stored as unsalted MD5 and the DB credentials are hard-coded. Fine for a local demo, not for real use.
