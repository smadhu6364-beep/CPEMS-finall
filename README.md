# CPEMS: Curfew e-Pass Management System

College mini-project (undergraduate). A PHP/MySQL web app for issuing and managing curfew e-passes.

- Public side: look up an issued pass.
- Admin panel: log in, create and edit passes, manage pass categories and sub-admins, search passes, and run reports (passes in the last 7 days, between two dates, by creator).

The project report and slides are in the repo root (`CPEMS finall.pdf`, `CEPMS-PPT (2).pptx`).

## Stack

PHP, MySQL, Bootstrap, jQuery

## Running it locally

1. Install XAMPP (or any Apache + PHP + MySQL setup).
2. Copy `c-curfew/c-curfew` into your web root (e.g. `htdocs/c-curfew`).
3. Create a MySQL database called `cpms` and import `c-curfew/c-curfew/SQL/cmps.sql`.
4. Check the DB credentials in the `includes/` config files, then open `http://localhost/c-curfew/` (admin panel at `/c-curfew/admin/`).
