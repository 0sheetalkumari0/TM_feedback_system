<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register | Tata Motors CRM-System</title>
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

    .register-card {
      background: #ffffff;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 400px;
    }

    .register-card h2 {
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
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px 12px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 15px;
      transition: border 0.3s;
    }

    input:focus {
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
      .register-card {
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
    <div class="register-card">
      <h2>Create Your Account</h2>
      <form action="register_process.php" method="POST">
        <div class="form-group">
          <label for="userid">User ID</label>
          <input type="text" name="userid" id="userid" required>
        </div>

        <div class="form-group">
          <label for="name">Full Name</label>
          <input type="text" name="name" id="name" required>
        </div>

        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" name="email" id="email" required>
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" required>
        </div>

        <button type="submit" class="btn">Register</button>
      </form>

      <div class="footer-text">
        Already have an account? <a href="login.php">Login here</a>
      </div>
    </div>
  </div>

</body>
</html>
