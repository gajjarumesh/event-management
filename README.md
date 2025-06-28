# Laravel Event Management System

This project is a basic Event Management System built using the latest Laravel version. It includes authentication, admin/user role management, event creation, event registration, image upload, protected API, and email notifications with queue handling.

---

## 1. Laravel Version Used

- **Laravel 12**

---

## 2. Installation Steps

1. Clone the repository:
   ```bash
   git clone <your-repository-url>
   cd <project-folder>
   ```

2. Install dependencies:
   ```bash
   composer install
   npm install
   npm run build
   ```

3. Setup environment file:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configure `.env` with your database and mail credentials.

5. Run migrations:
   ```bash
   php artisan migrate
   ```

6. Create storage link for image uploads:
   ```bash
   php artisan storage:link
   ```

7. Setup queue tables (for queued emails):
   ```bash
   php artisan queue:table
   php artisan migrate
   ```

8. Start the queue worker (required for email sending):
   ```bash
   php artisan queue:work
   ```

9. Start the application:
   ```bash
   php artisan serve
   ```

---

## 3. Admin and User Test Credentials

| Role  | Email              | Password |
|-------|-------------------|----------|
| Admin | admin@example.com | admin@123 |
| User  | user@example.com  | admin@123 |

*Note:* You can also register new users and assign the `role` field manually in the `users` table as either `admin` or `user`.

---

## 4. API Endpoint and Sample Response

### Get Registered Users for an Event (Admin Only)

- **Endpoint:** `GET /api/events/{event}/registrations`
- **Authentication:** Required (Laravel Sanctum)  
- **Role Restriction:** Admin only  

**Sample JSON Response:**

```json
[
  {
    "id": 2,
    "name": "John Doe",
    "email": "john@example.com"
  },
  {
    "id": 3,
    "name": "Jane Smith",
    "email": "jane@example.com"
  }
]
```

---

## 5. Bonus Features Implemented

✔ Search and filter events by **location** and **date**  
✔ AJAX-based event listing with **pagination**  
✔ **Email notification** on successful registration (using Laravel queue)  
✔ Image upload for event banners to `storage/app/public/events`  
✔ Role-based route protection with custom middleware  

---
