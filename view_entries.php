<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "<p style='color:red;'>Please log in to view your entries.</p>";
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "diary_db");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM entries WHERE user_id = '$user_id' ORDER BY created_at DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Diary Entries</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Your Memories 📝</h2>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while ($entry = mysqli_fetch_assoc($result)): ?>
            <div class="entry">
                <h3><?php echo htmlspecialchars($entry['title']); ?></h3>
                <p class="date"><?php echo date("F j, Y", strtotime($entry['created_at'])); ?></p>
                <p class="preview"><?php echo nl2br(htmlspecialchars($entry['content'])); ?></p>

                <div class="button-group">
                    <a class="btn view" href="view_entry.php?id=<?php echo $entry['id']; ?>">View</a>
                    <a class="btn edit" href="edit_entry.php?id=<?php echo $entry['id']; ?>">Edit</a>
                    <a class="btn delete" href="delete_entry.php?id=<?php echo $entry['id']; ?>" onclick="return confirm('Are you sure you want to delete this entry?')">Delete</a>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>You haven’t written anything yet. Time to start journaling! 💌</p>
    <?php endif; ?>

    <a href="menu.php" class="link">← Back to Dashboard</a>
</body>
</html>
