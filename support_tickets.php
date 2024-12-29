<?php
include 'db.php';

// Fetch all records
$stmt = $conn->prepare("SELECT * FROM support_tickets");
$stmt->execute();
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch all IT managers for the `assigned_to` dropdown
$managersStmt = $conn->prepare("SELECT id, name FROM it_managers");
$managersStmt->execute();
$managers = $managersStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Tickets</title>
    <link rel="stylesheet" href="css/style.css?v=1.1">
</head>
<body>
    <header>
        <h1>Support Tickets Table</h1>
        <a href="index.php">Back to Dashboard</a>
    </header>
    <main>
        <section>
            <h2>Support Tickets Records</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Assigned To</th>
                        <th>Resolved By</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tickets as $ticket): ?>
                        <tr>
                            <td><?= htmlspecialchars($ticket['id']) ?></td>
                            <td><?= htmlspecialchars($ticket['title']) ?></td>
                            <td><?= htmlspecialchars($ticket['description']) ?></td>
                            <td><?= htmlspecialchars($ticket['status']) ?></td>
                            <td><?= htmlspecialchars($ticket['assigned_to']) ?></td>
                            <td><?= htmlspecialchars($ticket['resolved_by']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <section>
            <h2>Create Support Ticket</h2>
            <form action="add_record.php" method="POST" class="ajax-form">
                <input type="hidden" name="table" value="support_tickets">
                <input type="text" name="title" placeholder="Title" required>
                <textarea name="description" placeholder="Description" required></textarea>
                <select name="status">
                    <option value="Pending">Pending</option>
                    <option value="Resolved">Resolved</option>
                </select>
                <select name="assigned_to" required>
                    <option value="">Select Assigned To</option>
                    <?php foreach ($managers as $manager): ?>
                        <option value="<?= htmlspecialchars($manager['id']) ?>">
                            <?= htmlspecialchars($manager['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <button type="submit">Create Ticket</button>
            </form>
        </section>
    </main>
</body>
</html>
