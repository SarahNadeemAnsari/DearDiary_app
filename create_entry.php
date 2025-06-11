<!--create_entry.php-->
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">

        <title> Create Diary Entry </title>
    </head>
    <body>
        <h2> Create  a New Diary Entry </h2>

<?php
session_start();

// Chack if the user is logged in
if(!isset($_SESSION['user_id'])) {
    echo "<p style= 'color:red;'> You must be logged in to write a diary entry. </p>";
    exit;
}

//Connect to the database
$conn = mysqli_connect("localhost", "root", "", "diary_db");

//Check connection
if (isset($_POST['save'])){
    //Get the user input from the form
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO entries (user_id, title, content)  VALUES ('$user_id', '$title','$content')";

    if(mysqli_query($conn, $sql)) {
        echo "<p style = 'color:green;'> Entry saved successfully! </p>";
        header("refresh:2; url=view_entries.php");
        exit;
        } else {
            echo "<p style='color:red;'>Error: ". mysqli_error($conn) . "</p>";
        }
    }
?>

<!--form to create a new diary entry -->
<h2>Dear Diary...</h2>
<form method="POST">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" required>

    <label for="content">Your Thoughts</label>
    <textarea name="content" id="content" required></textarea>

    <input type="submit" name="save" value="Save Entry"> <!-- keep "save" to match PHP -->
</form>
<p class="note">Your words are safe here 🕊️</p>
<a href="menu.php" class="link">← Back to Dashboard</a>

</body>
</html>