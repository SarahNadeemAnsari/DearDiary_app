<!-- login.php -->
<!DOCTYPE html>
<html>
    <head>
        <title> Login </title>
    </head>

    <body>
        <h2> Login </h2>

        <form action= "login.php" method="POST">
            Username: <input type="text" name="username" required><br><br>
            Password: <input type="password" name="password" required><br><br>
            <input type="submit" name="login" value="Login">
        </form>

        <?php
        session_start();

        $conn = mysqli_connect("localhost","root","","diary_db");

        if (!$conn){
            die("Connection failed: " . mysqli_connect_error());
        }

        if (isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            //Checking if the user exists
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn,$sql);

            if (mysqli_num_rows($result)==1){
                $row = mysqli_fetch_assoc($result);

                //Verify the password
                if (password_verify($password, $row['password'])){
                    $_SESSION['user_id']= $row['id'];
                    echo "<p style = 'color:green;'>Login successful! Welcome, $username </p>";
                    //Redirect to homepage
                    //Functionality not  yet created
                }
                else {
                    echo "<p style='color:red;'>Incorrect password .</p>";   
                }}
            else {
                echo "<p style= 'color:red;'>Username not found.</p>";
                }
            }
        ?>
    </body>
</html>    
        