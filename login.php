<?php
if (isset($_GET['message']) && $_GET['message'] === 'loggedout') {
  echo "<p style='text-align:center; color:green;'>You have been logged out successfully.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tata Motors CRM-System | Login</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Segoe UI", Tahoma, sans-serif;
    }

    body {
      height: 100vh;
      background: linear-gradient(to right, #dae2f8, #d6a4a4);
      display: flex;
      flex-direction: column;
    }

    .header {
      background-color: #1c1f2e;
      color: #fff;
      padding: 15px 30px;
      display: flex;
      align-items: center;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .header img {
      height: 40px;
      margin-right: 15px;
    }

    .header h1 {
      font-size: 22px;
      font-weight: bold;
      letter-spacing: 1px;
    }

    .container {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-card {
      background: #ffffff;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 400px;
    }

    .login-card h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 18px;
    }

    label {
      display: block;
      font-weight: 600;
      margin-bottom: 8px;
      color: #444;
    }

    input[type="text"],
    input[type="password"],
    select {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 15px;
      transition: border 0.3s;
    }

    input:focus,
    select:focus {
      border-color: #007bff;
      outline: none;
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
      transition: background 0.3s;
      margin-top: 10px;
    }

    .btn:hover {
      background: #0056b3;
    }

    .footer-text {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
      color: #666;
    }

    .footer-text a {
      color: #007bff;
      text-decoration: none;
    }

    .footer-text a:hover {
      text-decoration: underline;
    }

    @media screen and (max-width: 500px) {
      .login-card {
        padding: 30px 20px;
      }
    }
  </style>
</head>
<body>

  <div class="header">
    <img src="Tata-logo.jpg" alt="Tata Motors Logo">
    <h1>Tata Motors CRM-System</h1>
  </div>

  <div class="container">
    <div class="login-card">
      <h2>Welcome Back</h2>
      <form action="login_process.php" method="POST">
        <div class="form-group">
          <label for="username">User ID</label>
          <input type="text" id="username" name="username" placeholder="Enter your ID" required>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>

        <div class="form-group">
          <label for="role">Login As</label>
          <select name="role" id="role" required>
            <option value="">-- Select Role --</option>
            <option value="customer">Customer</option>
            <option value="admin">Admin</option>
          </select>
        </div>

        <button type="submit" class="btn">Login</button>
      </form>

      <div class="footer-text">
        Don't have an account? <a href="register.php">Register here</a>
      </div>
    </div>
  </div>

</body>
</html>
