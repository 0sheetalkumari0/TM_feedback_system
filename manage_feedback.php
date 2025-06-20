<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
  header("Location: login.php");
  exit;
}

include 'db.php';

if (!isset($_GET['id'])) {
  echo "<p>Feedback ID is missing.</p>";
  exit;
}

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT f.*, u.name FROM feedback f JOIN users u ON f.user_id = u.id WHERE f.id = '$id'");

if (mysqli_num_rows($result) != 1) {
  echo "<p>Feedback not found.</p>";
  exit;
}

$feedback = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Feedback | Tata Motors CRM-System</title>
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
      max-width: 600px;
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

    .form-group {
      margin-bottom: 18px;
    }

    label {
      display: block;
      font-weight: 600;
      margin-bottom: 8px;
    }

    select, textarea {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 15px;
    }

    textarea {
      height: 100px;
      resize: vertical;
    }

    .btn {
      width: 100%;
      padding: 12px;
      background: #007bff;
      border: none;
      color: white;
      font-size: 16px;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .btn:hover {
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
    <h2>Manage Feedback</h2>
    <form action="manage_feedback_process.php" method="POST">
      <input type="hidden" name="feedback_id" value="<?php echo $feedback['id']; ?>">

      <div class="form-group">
        <label>Customer Name</label>
        <p><?php echo htmlspecialchars($feedback['name']); ?></p>
      </div>

      <div class="form-group">
        <label>Category</label>
        <p><?php echo htmlspecialchars($feedback['category']); ?></p>
      </div>

      <div class="form-group">
        <label>Message</label>
        <p><?php echo nl2br(htmlspecialchars($feedback['message'])); ?></p>
      </div>

      <div class="form-group">
        <label for="status">Update Status</label>
        <select name="status" id="status" required>
          <option value="Pending" <?php if ($feedback['status'] === 'Pending') echo 'selected'; ?>>Pending</option>
          <option value="Verified" <?php if ($feedback['status'] === 'Verified') echo 'selected'; ?>>Verified</option>
          <option value="Resolved" <?php if ($feedback['status'] === 'Resolved') echo 'selected'; ?>>Resolved</option>
        </select>
      </div>

      <div class="form-group">
        <label for="response">Response Message</label>
        <textarea name="response" id="response" placeholder="Write a response..." required></textarea>
      </div>

      <button type="submit" class="btn">Update Feedback</button>
    </form>
  </div>

</body>
</html>
