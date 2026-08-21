<?php
$conn = new mysqli("localhost", "root", "", "greenwatch");

if (isset($_POST['verify'])) 
{
    $id = $_POST['issue_id'];

    // Option 1: Add a verified flag in the DB (you can modify the table to include `verified`)
    $conn->query("UPDATE issues SET status='Verified' WHERE id=$id");

    echo "<script>alert('Issue verified as solved successfully!');</script>";
    echo "<script>window.location.href = 'user_dashboard.php';</script>";
}
?>