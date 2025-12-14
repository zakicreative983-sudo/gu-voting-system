<?php
// Ku xir database-ka
$conn = new mysqli("localhost", "root", "", "votin_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Soo qaado fariimaha
$sql = "SELECT * FROM contact_messages ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="so">
<head>
  <meta charset="UTF-8">
  <title>Fariimaha La Soo Diray</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f9f9f9;
      padding: 40px;
    }
    h2 {
      color: #6b21a8;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    th, td {
      padding: 12px 16px;
      border-bottom: 1px solid #eee;
      text-align: left;
    }
    th {
      background: #6b21a8;
      color: white;
    }
    tr:hover {
      background: #f3e8ff;
    }
  </style>
</head>
<body>

  <h2>Fariimaha La Soo Diray</h2>

  <table>
    <tr>
      <th>Magac</th>
      <th>Email</th>
      <th>Fariin</th>
      <th>Waqti</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= htmlspecialchars($row['name']) ?></td>
      <td><?= htmlspecialchars($row['email']) ?></td>
      <td><?= nl2br(htmlspecialchars($row['message'])) ?></td>
      <td><?= $row['created_at'] ?></td>
    </tr>
    <?php endwhile; ?>
  </table>

</body>
</html>
