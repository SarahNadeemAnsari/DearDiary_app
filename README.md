# DearDiary App 📓✨

DearDiary is a simple PHP-based web application that allows users to securely register, log in, and manage their personal diary entries. It uses MySQL for data storage and ensures password security using hashing.

## 🛠 Features

* User Registration with hashed passwords
* Secure Login system using sessions
* Personalized dashboard for logged-in users
* MySQL Database connectivity
* Basic front-end styling with HTML & CSS
* Built with PHP and MySQL (XAMPP stack)

## 📂 Folder Structure

```
diary_app/
├── dashboard.php
├── login.php
├── logout.php
├── register.php
├── style.css
├── db_config.php (optional if you abstract DB)
└── README.md
```

## 🧑‍💻 Technologies Used

* PHP
* MySQL (phpMyAdmin via XAMPP)
* HTML/CSS
* Sessions for login management

## 📓 Database Schema

**Table: users**

| Field    | Type           | Description     |
| -------- | -------------- | --------------- |
| id       | INT (Auto-Inc) | Primary Key     |
| username | VARCHAR(255)   | Unique Username |
| password | VARCHAR(255)   | Hashed Password |

## 🚀 Getting Started

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/yourusername/DearDiary_app.git
   ```

2. **Move Files to XAMPP:**
   Place the files in `C:/xampp/htdocs/diary_app`.

3. **Start Services:**
   Launch Apache and MySQL via XAMPP.

4. **Create Database:**

   * Open `phpMyAdmin`
   * Create a database named `diary_db`
   * Run the following SQL:

     ```sql
     CREATE TABLE users (
         id INT AUTO_INCREMENT PRIMARY KEY,
         username VARCHAR(255) NOT NULL UNIQUE,
         password VARCHAR(255) NOT NULL
     );
     ```

5. **Access the App:**
   Visit `http://localhost/diary_app/register.php` in your browser.

## 🔐 Security Note

* Passwords are hashed using `password_hash()` and verified with `password_verify()`.
* Avoid storing plain text passwords in the database.

## 🙋‍♀️ Author

Built with 💙 by Sarah Nadeem

## 📄 License

This project is open source and available under the [MIT License](LICENSE).
