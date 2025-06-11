<?php
session_start();

// Step 1: Check if the user is logged in
if(!isset($_SESSION['user_id'])){
    echo "<p style='color:red;'> You must be logged in to delete an entry.</p>";
    exit;
}

// Step 2: Connect to the database
$conn = mysqli_connect("localhost","root","","diary_db");
if (!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}

// Step 3: Check if an entry ID was passed in the URL
if(isset($_GET['id'])){
    $entry_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Step 4: Make sure the entry belongs to the logged-in user
    $check_sql = "SELECT * FROM entries WHERE id = '$entry_id' AND user_id = '$user_id'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result)==1){
        // Step 5: Delete the query
        $delete_sql = "DELETE FROM entries WHERE id = '$entry_id'";
        if (mysqli_query($conn, $delete_sql)) {
            echo "<p style= 'color:green;'> Entry deleted successfully. </p>";
        } else {
            echo "<p style= 'color:red;'> Error deleting entry: " . mysqli_error($conn) . "</p>";  
        }
    } else {
        echo "<p style='color:red;'> You are not allowed to delete this entry.</p>";
    }   
} else {
    echo "<p style='color:red;'> No entry ID provided.</p>";
}

// Redirect back to the view page after 2 seconds
header("refresh:2; url=view_entries.php");

mysqli_close($conn);
?>

