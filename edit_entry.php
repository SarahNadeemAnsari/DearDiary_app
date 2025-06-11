<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<p style='color:red;'>You must be logged in to edit an entry.</p>";
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "diary_db");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = $_SESSION['user_id'];

if (isset($_GET['id'])) {
    $entry_id = $_GET['id'];

    // Get entry
    $sql = "SELECT * FROM entries WHERE id='$entry_id' AND user_id='$user_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $entry = mysqli_fetch_assoc($result);
    } else {
        echo "<p style='color:red;'>Entry not found or not authorized.</p>";
        exit;
    }
} else {
    echo "<p style='color:red;'>No entry ID provided.</p>";
    exit;
}

// Handle update
if (isset($_POST['update'])) {
    $new_title = $_POST['title'];
    $new_content = $_POST['content'];

    $update_sql = "UPDATE entries SET title='$new_title', content='$new_content' WHERE id='$entry_id' AND user_id='$user_id'";
    if (mysqli_query($conn, $update_sql)) {
        echo "<p style='color:green;'>Entry updated successfully!</p>";
        header("refresh:2; url=view_entries.php");
        exit;
    } else {
        echo "<p style='color:red;'>Error updating: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Diary Entry</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Edit Your Diary Entry</h2>

    <?php if (isset($entry)): ?>
    <form method="POST">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($entry['title']); ?>" required>

        <label for="content">Your Thoughts</label>
        <textarea name="content" id="content" required><?php echo htmlspecialchars($entry['content']); ?></textarea>

        <input type="submit" name="update" value="Update Entry">
    </form>
    <p class="note">Keep your story alive 💗</p>
    <?php endif; ?>
    <a href="view_entries.php" class="link">← Back to Entries</a>
</body>
</html>
