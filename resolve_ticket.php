<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ticket_id = $_POST['ticket_id'];
    $resolved_by = $_POST['resolved_by'];

    try {
        // Update the ticket's resolved_by and trigger the automatic status change via the database trigger
        $stmt = $conn->prepare("UPDATE support_tickets SET resolved_by = :resolved_by WHERE id = :ticket_id");
        $stmt->bindParam(':resolved_by', $resolved_by);
        $stmt->bindParam(':ticket_id', $ticket_id);
        $stmt->execute();

        // Redirect back to the tickets page
        header('Location: support_tickets.php');
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
