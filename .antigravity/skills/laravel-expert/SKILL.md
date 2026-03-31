# Laravel 12 Expert Skill

## Description
Kỹ năng chuyên gia về Laravel 12, hỗ trợ viết code chuẩn Performance, Security và tuân thủ các tính năng mới nhất của PHP 8.3+.


## 1. PHP 8.3+ & Code Style

### Type Hinting

* Always use strict typing:

  ```php
  declare(strict_types=1);
  ```
* Define types for all parameters and return values.

### Modern Features

* Prefer **Readonly classes** for Services.
* Use **Constructor Property Promotion**.
* Use **Enums** for statuses (e.g., `Status`).
* Use **Match expressions** instead of switch-case.

### Performance

* Optimize memory usage.
* Avoid deeply nested arrays.
* Prefer **Laravel Collections** over raw arrays when possible.

---

## 2. Laravel 12 Standards

### Service Pattern

* **Never place Business Logic in Controllers.**
* All business logic must be located in `app/Services`.

### Database & Migrations

* Always add comments for columns:

  ```php
  $table->string('name')->comment('Tour name');
  ```
* Use foreign key constraints with cascade:

  ```php
  $table->foreignId('user_id')->constrained()->onDelete('cascade');
  ```
* Always add indexes for frequently queried columns:

  * `slug`
  * `status`
  * `date`

### Eloquent

* Always use **Eager Loading (`with()`)** to prevent N+1 queries.
* Use **API Resources** to standardize response data between Backend and Frontend.

---

## 3. Business Logic: Tour Management System

### Tour Validation

* Always validate:

  * `status` (e.g., `active`, `open`)
  * `availability` (remaining slots)
* Must be checked before creating a Booking.

### Smart Suggestion

* Implement related tour suggestions based on:

  * `location_id`
  * `category_id`
* Must be handled within a Service method.

### Price Calculation

* Pricing logic (discounts, adult/child pricing) must be:

  * Encapsulated in **Service** or **Action classes**
  * Not placed in Controllers

---

## 4. Workflow: Auto-Routing & Link Sync

### Step 1: Route Configuration

* Define routes in:

  * `routes/web.php`
  * `routes/admin.php`

* Naming convention:

  ```php
  Route::type('/path', [Controller::class, 'method'])
      ->name('table_name.action_name');
  ```

* Example:

  ```php
  Route::get('/tours/create', [TourController::class, 'create'])
      ->name('tours.create');
  ```

---

### Step 2: Blade Sync (Update Links)

* Replace static links with:

  ```blade
  {{ route('name') }}
  ```
* Ensure parameters are passed correctly:

  ```blade
  {{ route('tours.edit', $tour->id) }}
  ```

---

### Step 3: Integrity Check

* Ensure:

  * No duplicate route names
  * Controller methods match required parameters

---

## 5. Directory Structure

### 5.1 Controllers (Routing & Business Flow)

* Organized by role-based hierarchy:

```
app/Controllers/Admin/
app/Controllers/Client/
app/Controllers/Staff/
```

#### Responsibilities:

* Handle request flow
* Delegate logic to Services
* Enforce role-based access

#### Base Controllers

* `BaseController`
* `AdminBaseController`

Provide:

* Shared methods
* Middleware handling
* DRY principles

---

### 5.2 Views (User Interface)

#### Structure (Mirroring Controller)

```
app/Views/admin/
app/Views/client/
app/Views/staff/
```

* Mirrors Controller structure for consistency
* Easier navigation and maintenance

#### Layout & Partials System

* Use shared layouts:

  * `layout.php` (Header, Footer, Sidebar)
* Child views render into main content area

#### CRUD Folder Pattern

Each module contains:

```
index.php
create.php
edit.php
detail.php
```

Benefits:

* Standardized structure
* Faster feature development
* Easier maintenance

---

## Summary

* Enforce strict typing and modern PHP features.
* Follow Laravel Service Pattern strictly.
* Keep Controllers thin, Services thick.
* Ensure database consistency and performance.
* Apply clear workflow for routing and UI sync.
* Maintain scalable and role-based architecture.

## Metadata
- type: framework-expert
- framework: Laravel 12
- language: PHP 8.3+