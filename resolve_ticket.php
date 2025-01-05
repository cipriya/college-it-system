<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ticket_id = $_POST['ticket_id'] ?? null;
    $resolved_by = $_POST['resolved_by'] ?? null;

    if ($ticket_id && $resolved_by) {
        try {
            // Update ticket's resolved_by field, the status will be set to 'Resolved' via database trigger
            $stmt = $conn->prepare("
                UPDATE support_tickets 
                SET resolved_by = :resolved_by 
                WHERE id = :ticket_id
            ");
            $stmt->bindParam(':resolved_by', $resolved_by);
            $stmt->bindParam(':ticket_id', $ticket_id);
            $stmt->execute();

            // Redirect with success status
            header('Location: support_tickets.php?status=resolved_success');
            exit();
        } catch (PDOException $e) {
            // Handle errors gracefully
            header('Location: support_tickets.php?status=error&message=' . urlencode($e->getMessage()));
            exit();
        }
    } else {
        // Redirect with error if input is missing
        header('Location: support_tickets.php?status=error&message=' . urlencode("Invalid input"));
        exit();
    }
}
?>
