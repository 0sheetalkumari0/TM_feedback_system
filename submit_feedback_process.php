<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'customer') {
  header("Location: login.php");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  include 'db.php'; // Make sure db.php connects to MySQL

  $user_id = $_SESSION['user_id'];
  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $message = mysqli_real_escape_string($conn, $_POST['message']);

  $query = "INSERT INTO feedback (user_id, category, message) VALUES ('$user_id', '$category', '$message')";

  if (mysqli_query($conn, $query)) {
    echo "<script>alert('Feedback submitted successfully!'); window.location.href = 'customer_dashboard.php';</script>";
  } else {
    echo "<script>alert('Something went wrong. Please try again.'); window.history.back();</script>";
  }
} else {
  header("Location: submit_feedback.php");
}
?>
