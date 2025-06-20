<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
  header("Location: login.php");
  exit;
}
include 'db.php';

$result = mysqli_query($conn, "SELECT f.*, u.name FROM feedback f JOIN users u ON f.user_id = u.id ORDER BY f.created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard | Tata Motors CRM-System</title>
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
      max-width: 1100px;
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

    .action-btn {
      background: #28a745;
      border: none;
      color: #fff;
      padding: 6px 10px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 13px;
      text-decoration: none;
    }

    .action-btn:hover {
      background: #218838;
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
    <h2>Customer Feedback Overview</h2>
    <div style="text-align: center; margin-bottom: 20px;">
      <a href="generate_report.php" class="action-btn" style="background:#007bff; margin-right: 10px;">Download CSV</a>
      <a href="generate_report.php?format=html" class="action-btn" style="background:#28a745; margin-right: 10px;">View as HTML</a>
      <a href="generate_report.php?format=pdf" class="action-btn" style="background:#6c757d;">Download PDF</a>
    </div>


      


    <?php if (mysqli_num_rows($result) > 0): ?>
      <table>
        <tr>
          <th>Customer</th>
          <th>Category</th>
          <th>Message</th>
          <th>Status</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['category']); ?></td>
            <td><?php echo nl2br(htmlspecialchars($row['message'])); ?></td>
            <td><span class="status <?php echo $row['status']; ?>"><?php echo $row['status']; ?></span></td>
            <td><?php echo date("d M Y, h:i A", strtotime($row['created_at'])); ?></td>
            <td><a class="action-btn" href="manage_feedback.php?id=<?php echo $row['id']; ?>">Manage</a></td>
          </tr>
        <?php endwhile; ?>
      </table>
    <?php else: ?>
      <p style="text-align:center;">No feedback submitted yet.</p>
    <?php endif; ?>
  </div>

</body>
</html>
