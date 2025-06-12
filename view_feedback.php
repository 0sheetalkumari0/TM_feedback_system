<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'customer') {
  header("Location: login.php");
  exit;
}
include 'db.php';

$user_id = $_SESSION['user_id'];
$result = mysqli_query($conn, "SELECT * FROM feedback WHERE user_id = '$user_id' ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Feedback | Tata Motors CRM-System</title>
  <style>
    body {
      font-family: "Segoe UI", sans-serif;
      background: linear-gradient(to right, #dae2f8, #d6a4a4);
      margin: 0;
      padding: 0;
    }

    .header {
      background-color: #1c1f2e;
      color: #fff;
      padding: 15px 30px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .header img {
      height: 40px;
      margin-right: 15px;
    }

    .header h1 {
      font-size: 22px;
    }

    .header .logout {
      color: #f44336;
      text-decoration: none;
      font-weight: bold;
    }

    .container {
      max-width: 900px;
      margin: 40px auto;
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 12px 14px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }

    th {
      background-color: #007bff;
      color: white;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    .status {
      font-weight: bold;
      padding: 5px 10px;
      border-radius: 6px;
    }

    .Pending {
      background: #ffc107;
      color: #000;
    }

    .Verified {
      background: #17a2b8;
      color: #fff;
    }

    .Resolved {
      background: #28a745;
      color: #fff;
    }
  </style>
</head>
<body>

  <div class="header">
    <div style="display: flex; align-items: center;">
      <img src="Tata-logo.jpg" alt="Tata Motors Logo">
      <h1>Tata Motors CRM-System</h1>
    </div>
    <a href="logout.php" class="logout">Logout</a>
  </div>

  <div class="container">
    <h2>Your Submitted Feedback</h2>

    <?php if (mysqli_num_rows($result) > 0): ?>
      <table>
        <tr>
          <th>Category</th>
          <th>Message</th>
          <th>Status</th>
          <th>Date</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?php echo htmlspecialchars($row['category']); ?></td>
            <td><?php echo nl2br(htmlspecialchars($row['message'])); ?></td>
            <td><span class="status <?php echo $row['status']; ?>"><?php echo $row['status']; ?></span></td>
            <td><?php echo date("d M Y, h:i A", strtotime($row['created_at'])); ?></td>
          </tr>
        <?php endwhile; ?>
      </table>
    <?php else: ?>
      <p style="text-align:center;">You haven't submitted any feedback yet.</p>
    <?php endif; ?>
  </div>

</body>
</html>
