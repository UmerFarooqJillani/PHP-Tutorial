# <p align="center"> PHP Tutorial </p>

- PHP stands for: Hypertext Preprocessor
- PHP is a backend/server-side scripting language. When a user opens a webpage in the browser, the PHP code runs on the server, and only the result (HTML) is sent to the user's browser.
- PHP is a server scripting language, and a powerful tool for making dynamic and interactive Web pages.
- PHP are not case-sensitive.
- For example, if a page has this PHP code:
```PHP
<? php
echo "Hello, World!";
?>
```
The server processes it and sends:

```html
Hello, Umer!
```
to the browser — not the PHP code
### What Can PHP Do?
- PHP can generate dynamic page content
- PHP can create, open, read, write, delete, and close files on the server
- PHP can collect form data
- PHP can send and receive cookies
- PHP can add, delete, modify data in your database
- PHP can be used to control user-access
- PHP can encrypt data
- PHP supports a wide range of databases

### What is a PHP File?
- PHP files can contain text, HTML, CSS, JavaScript, and PHP code
- PHP code is executed on the server, and the result is returned to the browser as plain HTML
- PHP files have extension ".php"

## 🔹 Initial Setup of PHP (on Windows, macOS, and Linux)
You can set up PHP in two main ways:
1- Using XAMPP 
2- Manual Setup (Advanced Users)
### ✅ Method 1: Using XAMPP (Recommended for Beginners)
XAMPP is a free package that includes:
- Apache server
- MySQL/MariaDB database
- PHP interpreter
- phpMyAdmin (for managing databases)
#### 🔧 Steps to Install XAMPP:
- Download XAMPP
- Select your OS (Windows/Linux/macOS).
- Install XAMPP
- Follow the installation wizard → choose components:
✅ Apache, ✅ MySQL, ✅ PHP, ✅ phpMyAdmin
#### Start Apache Server
- Open XAMPP Control Panel and start:
- Apache (for running PHP code)
- MySQL (optional, for database)
#### Write PHP Code
- Open this folder: C:\xampp\htdocs
- Create a new file/folder: <b> test.php </b> or  <b> xyz/test.php </b>
- Add this code:
``` php
<? php
echo "PHP is working!";
?>
```
Run in Browser
- Open your browser and visit:
<a> http://localhost/test.php </a>
- You should see: PHP is working!
- Or you can use the HTML in PHP file:
``` php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Tutorial</title>
</head>
<body>
    <div class="container">
        Hey, This's a First PHP web-page
    </div>
    <?php       // opening tag
        echo "Hey, This's a first script of PHP";
    // Closing tag ?>      
</body>
</html>
```
The server processes it and sends:

```html
Hey, This's a First PHP web-page
Hey, This's a first script of PHP
```

--- 