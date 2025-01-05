<?php
include 'db.php';

try {
    // Fetch resolved tickets
    $resolvedTicketsStmt = $conn->prepare("
        SELECT st.id, st.title, st.description, st.status, im.name as resolved_by
        FROM support_tickets st
        LEFT JOIN it_managers im ON st.resolved_by = im.id
        WHERE st.status = 'Resolved'
    ");
    $resolvedTicketsStmt->execute();
    $resolvedTickets = $resolvedTicketsStmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resolved Tickets</title>
</head>
<body>
    <header>
        <h1>Resolved Tickets</h1>
        <a href="support_tickets.php">Back to Tickets</a>
    </header>
    <main>
        <table border="1">
            <thead>
                <tr>
                    <th>Ticket ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Resolved By</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resolvedTickets): ?>
                    <?php foreach ($resolvedTickets as $ticket): ?>
                        <tr>
                            <td><?= htmlspecialchars($ticket['id']) ?></td>
                            <td><?= htmlspecialchars($ticket['title']) ?></td>
                            <td><?= htmlspecialchars($ticket['description']) ?></td>
                            <td><?= htmlspecialchars($ticket['status']) ?></td>
                            <td><?= htmlspecialchars($ticket['resolved_by']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No resolved tickets found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
