<?php
include 'db.php';

// Fetch all records
$stmt = $conn->prepare("SELECT * FROM non_teaching_staff");
$stmt->execute();
$staff = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Non-Teaching Staff</title>
    <link rel="stylesheet" href="css/style.css?v=1.1">
</head>
<body>
    <header>
        <h1>Non-Teaching Staff Table</h1>
        <a href="index.php">Back to Dashboard</a>
    </header>
    <main>
        <section>
            <h2>Non-Teaching Staff Records</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Assigned Responsibility</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($staff as $person): ?>
                        <tr>
                            <td><?= htmlspecialchars($person['id']) ?></td>
                            <td><?= htmlspecialchars($person['name']) ?></td>
                            <td><?= htmlspecialchars($person['role']) ?></td>
                            <td><?= htmlspecialchars($person['assigned_responsibility']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <section>
            <h2>Add Non-Teaching Staff</h2>
            <form action="add_record.php" method="POST" class="ajax-form">
                <input type="hidden" name="table" value="non_teaching_staff">
                <input type="text" name="name" placeholder="Name" required>
                <input type="text" name="role" placeholder="Role" required>
                <textarea name="assigned_responsibility" placeholder="Assigned Responsibility" required></textarea>
                <button type="submit">Add Staff</button>
            </form>
        </section>
    </main>
</body>
</html>
