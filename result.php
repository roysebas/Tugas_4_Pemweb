<?php
session_start();
if (!isset($_SESSION['data'])) {
    die('No data found');
}

$data = $_SESSION['data'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
            background-image: linear-gradient(to right, #6A0DAD, #8A2BE2);
        }

        h2 {
            text-align: center;
            color: #fff; /* Putih */
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #6A0DAD; /* Ungu */
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h2>Submitted Data</h2>
    <table>
        <tr>
            <th>Nama</th>
            <td><?php echo htmlspecialchars($data['name']); ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo htmlspecialchars($data['email']); ?></td>
        </tr>
        <tr>
            <th>Umur</th>
            <td><?php echo htmlspecialchars($data['age']); ?></td>
        </tr>
        <tr>
            <th>Bio</th>
            <td><?php echo htmlspecialchars($data['bio']); ?></td>
        </tr>
        <tr>
            <th>User Agent</th>
            <td><?php echo htmlspecialchars($data['userAgent']); ?></td>
        </tr>
    </table>

    <h2>File Content</h2>
    <table>
        <tr>
            <th>Nomor</th>
            <th>Isi</th>
        </tr>
        <?php foreach ($data['fileContent'] as $lineNumber => $lineContent): ?>
        <tr>
            <td><?php echo $lineNumber + 1; ?></td>
            <td><?php echo htmlspecialchars($lineContent); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>