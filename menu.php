<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Diary Portal</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('https://plus.unsplash.com/premium_photo-1676272747130-348694463771?q=80&w=1469&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Georgia', serif;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            font-family: 'Brush Script MT', cursive;
            font-size: 60px;
            margin-bottom: 10px;
            color: #fce4ec;
            text-shadow: 2px 2px 4px #000;
        }

        .menu-buttons {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .menu-buttons a {
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 10px;
            background-color: #f48fb1;
            color: white;
            font-size: 20px;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
            transition: transform 0.2s ease, background-color 0.3s ease;
        }

        .menu-buttons a:hover {
            background-color: #ec407a;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <h1>Welcome to Your Journal</h1>
    <div class="menu-buttons">
        <a href="register.php">Start New Journal</a>
        <a href="login.php">Login</a>
        <a href="create_entry.php">Add Entry</a>
        <a href="view_entries.php">View Entries</a>
    </div>
</body>
</html>
