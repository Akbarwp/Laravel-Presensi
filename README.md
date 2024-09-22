# Laravel Presensi

Laravel Presensi is a website designed to digitally record employee attendance by utilizing GPS and location tracking. This allows companies to monitor employee attendance accurately, ensuring that the attendance data aligns with the employee's physical location. This feature makes the attendance process more efficient and transparent.

## Tech Stack

- **Laravel 11**
- **Laravel Breeze**
- **MySQL Database**
- **TailwindCSS**
- **daisyUI**
- **[barryvdh/laravel-dompdf](https://github.com/barryvdh/laravel-dompdf)**
- **[LeafletJS](https://leafletjs.com/examples/quick-start/)**

## Features

- Main features available in this application:
  - Employee presence
  - Admin panel

## Installation

Follow the steps below to clone and run the project in your local environment:

1. Clone repository:

    ```bash
    git clone https://github.com/Akbarwp/Laravel-Presensi.git
    ```

2. Install dependencies use Composer and NPM:

    ```bash
    composer install
    npm install
    ```

3. Copy file `.env.example` to `.env`:

    ```bash
    cp .env.example .env
    ```

4. Generate application key:

    ```bash
    php artisan key:generate
    ```

5. Setup database in the `.env` file:

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel_presensi
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6. Run migration database:

    ```bash
    php artisan migrate
    ```

7. Run seeder database:

    ```bash
    php artisan db:seed
    ```

8. Run website:

    ```bash
    npm run dev
    php artisan serve
    ```

## Screenshot

- ### **Dashboard**

<img src="https://github.com/user-attachments/assets/a6f11269-960e-4c56-a95b-3d533e646f42" alt="Halaman Dashboard Karyawan" width="" />
&nbsp;&nbsp;&nbsp;
<img src="https://github.com/user-attachments/assets/272b17a6-07cc-4403-9b71-b88a249138ed" alt="Halaman Dashboard Admin" width="" />
<br><br>

- ### **Employee presence page**

<img src="https://github.com/user-attachments/assets/45309e13-8256-4615-96fb-45ccc4a6dde1" alt="Halaman Histori Presensi Karyawan" width="" />
&nbsp;&nbsp;&nbsp;
<img src="https://github.com/user-attachments/assets/d1dab88a-d7e7-4365-a786-b2bd2c9808fe" alt="Halaman Izin Karyawan" width="" />
<br><br>

- ### **Admin Panel**

<img src="https://github.com/user-attachments/assets/0ced25cc-b33c-4e06-9f7a-2de1bd6764c8" alt="Halaman Monitoring Presensi" width="" />
&nbsp;&nbsp;&nbsp;
<img src="https://github.com/user-attachments/assets/36f2fed3-29ba-4f89-9ecf-9a8b2f7a1eff" alt="Halaman Laporan Presensi" width="" />
&nbsp;&nbsp;&nbsp;
<img src="https://github.com/user-attachments/assets/cd5b7067-6286-4254-a82a-fa67acfce39b" alt="Halaman Administrasi Izin Karyawan" width="" />
<br><br>
