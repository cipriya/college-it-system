<?php
include 'db.php';

// Fetch all records
$stmt = $conn->prepare("SELECT * FROM it_managers");
$stmt->execute();
$managers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Managers</title>
    <link rel="stylesheet" href="css/style.css?v=1.1">
</head>
<body>
    <header>
        <h1>IT Managers Table</h1>
        <a href="index.php">Back to Dashboard</a>
    </header>
    <main>
        <section>
            <h2>IT Managers Records</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Expertise</th>
                        <th>Tasks</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($managers as $manager): ?>
                        <tr>
                            <td><?= htmlspecialchars($manager['id']) ?></td>
                            <td><?= htmlspecialchars($manager['name']) ?></td>
                            <td><?= htmlspecialchars($manager['expertise']) ?></td>
                            <td><?= htmlspecialchars($manager['tasks']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <section>
            <h2>Add IT Manager</h2>
            <form action="add_record.php" method="POST" class="ajax-form">
                <input type="hidden" name="table" value="it_managers">
                <input type="text" name="name" placeholder="Name" required>
                <input type="text" name="expertise" placeholder="Expertise" required>
                <textarea name="tasks" placeholder="Tasks" required></textarea>
                <button type="submit">Add IT Manager</button>
            </form>
        </section>
        <section>
            <form action="ticket_it.php" method="GET">
                <button type="submit" style="margin-top: 20px;">view all tickets</button>
            </form>
        </section>
    </main>
</body>
</html>
