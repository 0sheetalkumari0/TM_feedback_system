<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
  header("Location: login.php");
  exit;
}

include 'db.php';

if (isset($_GET['format']) && $_GET['format'] === 'pdf') {
  // PDF Report Placeholder (can be implemented using libraries like TCPDF or FPDF)
  header("Content-Type: application/pdf");
  header("Content-Disposition: attachment; filename=feedback_report.pdf");
  echo "PDF generation not implemented yet.";
  exit;
}

if (isset($_GET['format']) && $_GET['format'] === 'html') {
  $result = mysqli_query($conn, "SELECT f.*, u.name FROM feedback f JOIN users u ON f.user_id = u.id ORDER BY f.created_at DESC");
  echo "<html><head><title>Feedback Report</title></head><body><h2 style='text-align:center;'>Feedback Report</h2><table border='1' cellpadding='8' cellspacing='0' style='margin: auto;'>";
  echo "<tr><th>Customer Name</th><th>Category</th><th>Message</th><th>Status</th><th>Date</th></tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
    echo "<td>" . htmlspecialchars($row['category']) . "</td>";
    echo "<td>" . nl2br(htmlspecialchars($row['message'])) . "</td>";
    echo "<td>" . htmlspecialchars($row['status']) . "</td>";
    echo "<td>" . date("d M Y, h:i A", strtotime($row['created_at'])) . "</td>";
    echo "</tr>";
  }
  echo "</table></body></html>";
  exit;
}

// Default to CSV
$result = mysqli_query($conn, "SELECT f.*, u.name FROM feedback f JOIN users u ON f.user_id = u.id ORDER BY f.created_at DESC");

header("Content-Type: text/csv");
header("Content-Disposition: attachment;filename=feedback_report.csv");

$output = fopen("php://output", "w");
fputcsv($output, ['Customer Name', 'Category', 'Message', 'Status', 'Date']);

while ($row = mysqli_fetch_assoc($result)) {
  fputcsv($output, [
    $row['name'],
    $row['category'],
    $row['message'],
    $row['status'],
    date("d M Y, h:i A", strtotime($row['created_at']))
  ]);
}

fclose($output);
exit;
?>
