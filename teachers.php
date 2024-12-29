<?php
include 'db.php';

// Fetch all records
$stmt = $conn->prepare("SELECT * FROM teachers");
$stmt->execute();
$teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers</title>
    <link rel="stylesheet" href="css/style.css?v=1.1">
</head>
<body>
    <header>
        <h1>Teachers Table</h1>
        <a href="index.php">Back to Dashboard</a>
    </header>
    <main>
        <section>
            <h2>Teachers Records</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Qualification</th>
                        <th>Department</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($teachers as $teacher): ?>
                        <tr>
                            <td><?= htmlspecialchars($teacher['id']) ?></td>
                            <td><?= htmlspecialchars($teacher['name']) ?></td>
                            <td><?= htmlspecialchars($teacher['subject']) ?></td>
                            <td><?= htmlspecialchars($teacher['qualification']) ?></td>
                            <td><?= htmlspecialchars($teacher['department']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <section>
            <h2>Add Teacher</h2>
            <form action="add_record.php" method="POST" class="ajax-form">
                <input type="hidden" name="table" value="teachers">
                <input type="text" name="name" placeholder="Name" required>
                <input type="text" name="subject" placeholder="Subject" required>
                <input type="text" name="qualification" placeholder="Qualification" required>
                <input type="text" name="department" placeholder="Department" required>
                <button type="submit">Add Teacher</button>
            </form>
        </section>
    </main>
</body>
</html>
