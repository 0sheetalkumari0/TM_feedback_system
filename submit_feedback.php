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
  <title>Submit Feedback | Tata Motors CRM-System</title>
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

    .feedback-card {
      background: #ffffff;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
      width: 100%;
      max-width: 500px;
    }

    .feedback-card h2 {
      text-align: center;
      color: #333;
      margin-bottom: 25px;
    }

    .form-group {
      margin-bottom: 18px;
    }

    label {
      display: block;
      font-weight: 600;
      margin-bottom: 8px;
    }

    select,
    textarea {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 15px;
      resize: vertical;
    }

    textarea {
      height: 100px;
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
    <div class="feedback-card">
      <h2>Submit Feedback</h2>
      <form action="submit_feedback_process.php" method="POST">
        <div class="form-group">
          <label for="category">Category</label>
          <select name="category" id="category" required>
            <option value="">-- Select Category --</option>
            <option value="Product">Product</option>
            <option value="Service">Service</option>
            <option value="Staff">Staff</option>
            <option value="Suggestion">Suggestion</option>
          </select>
        </div>

        <div class="form-group">
          <label for="message">Your Feedback</label>
          <textarea name="message" id="message" placeholder="Write your feedback here..." required></textarea>
        </div>

        <button type="submit" class="btn">Submit Feedback</button>
      </form>
    </div>
  </div>

</body>
</html>
