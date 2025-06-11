    <?php
$conn = mysqli_connect("localhost", "root", "", "diary_db");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = "";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if user already exists
    $check_sql = "SELECT * FROM users WHERE username='$username'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        $message = "Username already taken!";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";

        if (mysqli_query($conn, $sql)) {
            $message = "Registered successfully! You can now <a href='login.php'>login</a>.";
        } else {
            $message = "Registration failed: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Join the Diary Family ✨</h2>
    <?php if ($message): ?>
        <p style="color:red;"><?php echo $message; ?></p>
    <?php endif; ?>
<form method="POST">
    <label for="username">Username</label>
    <input type="text" name="username" required>

    <label for="password">Password</label>
    <input type="password" name="password" required>

    <input type="submit" name="register" value="Register">
</form>

    <p class="note">Already have an account? <a href="login.php">Login here</a></p>
</body>
</html>

