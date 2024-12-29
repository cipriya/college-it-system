<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $table = $_POST['table'];
    unset($_POST['table']); // Remove the `table` field for insertion

    $columns = implode(', ', array_keys($_POST));
    $placeholders = ':' . implode(', :', array_keys($_POST));

    try {
        $stmt = $conn->prepare("INSERT INTO $table ($columns) VALUES ($placeholders)");
        $stmt->execute($_POST);
        header('Location: ' . $table . '.php');
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
