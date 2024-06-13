<?php
require 'config.php';

// Fetch phone statistics
$sql = 'SELECT brand, model, sales FROM phone_statistics';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$phones = $stmt->fetchAll();

// Calculate average sales
$sql_avg = 'SELECT AVG(sales) as average_sales FROM phone_statistics';
$stmt_avg = $pdo->prepare($sql_avg);
$stmt_avg->execute();
$average_sales = $stmt_avg->fetch()['average_sales'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <div class="stats-container">
        <h2>Phone Sales Statistics</h2>
        <table>
            <thead>
                <tr>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Sales</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($phones as $phone): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($phone['brand']); ?></td>
                        <td><?php echo htmlspecialchars($phone['model']); ?></td>
                        <td><?php echo htmlspecialchars($phone['sales']); ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="2"><strong>Average Sales</strong></td>
                    <td><strong><?php echo number_format($average_sales, 2); ?></strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
