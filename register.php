<!--register.php -->
<!DOCTYPE html>
<html>
    <head>
        <title> Register </title>
    </head>

    <body>
        <h2> Register </h2>

        <form action= "register.php" method="POST">
            Username: <input type="text" name="username" required><br><br>
            Password: <input type="password" name="password" required><br><br>
            <input type="submit" name="register" value="Register">
        </form>

        <?php
        //Connect to MySQL
        $conn = mysqli_connect("localhost","root","","diary_db");

        if (!$conn){
            die("Connection failed: " . mysqli_connect_error());
        }

        //Handle form susbmission
        if (isset($_POST['register'])){
            $username = $_POST['username'];
            $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

            //Insert into users table
            $sql = "INSERT INTO users (username, password) VALUES ('$username','$password')";

            if (mysqli_query($conn, $sql)){
                echo "<p style='color:green;'>Registered Successfully!</p>";
            }
            else{
                echo "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";   
            }
            }
        ?>
    </body>
</html>


