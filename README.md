# WebSiteCMS

A simple PHP-based Content Management System (CMS) for a music records website. The project demonstrates basic CMS features such as user authentication, file browsing, product catalog (shop), forms, and dynamic content rendering using PHP, HTML, CSS, and JavaScript.

---

## 📑 Table of Contents

- [Overview](#-overview)
- [Features](#-features)
- [Project Structure](#-project-structure)
- [Technologies Used](#-technologies-used)
- [Installation](#-installation)
- [Usage](#-usage)
- [Examples](#-examples)
- [Screenshots](#-screenshots)
- [License](#-license)

---

## 📝 Overview

**WebSiteCMS** is a lightweight CMS for managing and displaying music records, user authentication, and file browsing. It is designed for educational purposes and demonstrates integration of PHP backend with XML data, user sessions, and frontend interactivity.

---

## 🚀 Features

- **User Authentication:** Login/logout system using CSV file for user credentials.
- **Product Catalog:** Displays music records loaded from XML ([data/data.xml](data/data.xml)) with images and details.
- **File Browser:** Browse server directories and files with sorting options.
- **Forms:** User registration form with client-side and server-side validation.
- **Redirection:** Timed redirection page with countdown.
- **Animated UI:** Background animation and interactive elements using JavaScript.
- **Responsive Layout:** Styled with custom CSS for a modern look.

---

## 📂 Project Structure

```
/
├── about.php
├── animation.php
├── auth.php
├── files.php
├── forms.php
├── index.php
├── redirection.php
├── shop.php
├── style.css
├── user.csv
├── data/
│   ├── data.dtd
│   └── data.xml
├── html/
│   ├── animation.html
│   ├── forms.html
│   ├── home.html
│   ├── redirection.html
├── img/
│   ├── ... (images)
│   └── shop/
│       └── ... (product images)
├── js/
│   └── script.js
└── php/
    ├── footer.php
    ├── func.php
    └── header.php
```

---

## 🛠 Technologies Used

- **PHP** (Core logic, backend, templating)
- **HTML5** (Markup)
- **CSS3** ([style.css](style.css) for styling)
- **JavaScript** ([js/script.js](js/script.js) for interactivity)
- **XML** ([data/data.xml](data/data.xml) for product data)
- **CSV** ([user.csv](user.csv) for user authentication)
- **Sessions** (PHP session management)

---

## ⚙ Installation

1. **Clone or Download the Repository**
   ```sh
   git clone https://github.com/DmyTROSAlii/WebSiteCMS.git
   ```

2. **Place the Project in Your Web Server Directory**
   - For example, `htdocs` for XAMPP or `www` for WAMP.

3. **Ensure PHP is Installed**
   - PHP 7.x or higher is recommended.

4. **Set Permissions**
   - Ensure the web server can read/write to the project directory if needed.

5. **Start Your Web Server**
   - Access the project via `http://localhost/WebSiteCMS-main/index.php`

---

## ▶ Usage

- **Home Page:** `index.php` — Main landing page with information.
- **Authentication:** `auth.php` — Login/logout with credentials from [user.csv](user.csv).
- **Shop:** `shop.php` — Browse music records loaded from XML.
- **File Browser:** `files.php` — Browse and sort files/directories on the server.
- **Forms:** `forms.php` — Registration form with validation.
- **Redirection:** `redirection.php` — Page with timed redirect.
- **About:** `about.php` — Displays server, GET, and POST variables for debugging.

---

## 💡 Examples

- **Login Credentials Example:**
  - Username: `admin1`
  - Password: `mypass11` (hashed with MD5 in [user.csv](user.csv))

- **Adding a Product:**
  - Edit [data/data.xml](data/data.xml) and add a new `<product>` entry following the existing structure.

- **File Browser Usage:**
  - Navigate to `files.php` to browse and sort files/directories.

---

## 📋 License

This project is for educational purposes. No commercial license is provided.
