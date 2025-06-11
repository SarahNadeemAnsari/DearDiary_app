<?php
// view_entry.php
include 'db_connection.php';


if (!isset($_GET['id'])) {
    echo "Invalid entry ID.";
    exit;
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM diary_entries WHERE id = $id";
$result = mysqli_query($conn, "SELECT * FROM entries WHERE id = $id");

if (!$result || mysqli_num_rows($result) == 0) {
    echo "Entry not found.";
    exit;
}

$entry = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($entry['title']); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="entry-full">
        <h2><?php echo htmlspecialchars($entry['title']); ?></h2>
        <p class="date"><?php echo date("F j, Y", strtotime($entry['created_at'])); ?></p>
        <div class="full-content">
            <?php echo nl2br(htmlspecialchars($entry['content'])); ?>
        </div>
    </div>

    <a href="view_entries.php" class="link">← Back to Entries</a>
</body>
</html>

