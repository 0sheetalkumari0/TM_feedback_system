<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'customer') {
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Customer Dashboard | Tata Motors CRM-System</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Segoe UI", Tahoma, sans-serif;
    }

    body {
      background: linear-gradient(to right, #dae2f8, #d6a4a4);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .header {
      background-color: #1c1f2e;
      color: #fff;
      padding: 15px 30px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .header img {
      height: 40px;
      margin-right: 15px;
    }

    .header h1 {
      font-size: 22px;
      font-weight: bold;
    }

    .header .logout {
      font-size: 14px;
      color: #f44336;
      text-decoration: none;
      font-weight: 500;
    }

    .container {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px 20px;
    }

    .dashboard-card {
      background: #ffffff;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
      width: 100%;
      max-width: 500px;
      text-align: center;
    }

    .dashboard-card h2 {
      margin-bottom: 20px;
      color: #333;
    }

    .dashboard-card a {
      display: block;
      margin: 12px 0;
      background-color: #007bff;
      color: #fff;
      padding: 12px;
      text-decoration: none;
      border-radius: 6px;
      transition: background-color 0.3s;
    }

    .dashboard-card a:hover {
      background-color: #0056b3;
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
    <div class="dashboard-card">
      <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>
      <a href="submit_feedback.php">Submit Feedback</a>
      <a href="view_feedback.php">View My Feedback</a>
      <a href="update_profile.php">Update Profile</a>
    </div>
  </div>

</body>
</html>
