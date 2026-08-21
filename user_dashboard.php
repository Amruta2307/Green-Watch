<?php
$conn = new mysqli("localhost", "root", "", "greenwatch");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM issues ORDER BY id ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style>
        #t1 {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        #t1, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        img {
           /* max-width: 100px;
            height: auto;*/
            width: 100px;
           height:auto;
        }
        button
        {
            margin-top: 20px;
            padding: 10px 0;
            width: 100%;
            font-size: 18px;
            background-color: #4CAF50;
            border:none;
            border-radius:10px;
            color: white;
            font-weight:bold;
        }
    </style>
</head>
<body style="background-color:#06402B">


    <table width="100%">
    <tr>
   <td style="background:#06402B;text-align: center;">
<nav>
    <div>
        <a href="admin_login.php"><span style="color:white; font-size: 20px;">Admin</span></a><span style="color:white;">  ||  </span>
        <a href="report_form.php"><span style="color:white; font-size: 20px;">Report</a></span><span style="color:white;">  ||  </span>
        </span> <a href="user_dashboard.php"><span style="color:white; font-size: 20px;">Verify</a></span>

    </div>
</nav>
</td>

<td>
<header width="100%" height="50px" style="background: #06402B; text-align: center;">
    <h1 style="color:white;">User Dashboard - View Reported Issues</h1></header>
</td>
</tr>
</table>

<table border="1" cellpadding="10" cellspacing="0" id="t1">
    <tr style="background-color:lightgreen">
        <th>ID</th>
        <th>Location</th>
        <th>Description</th>
        <th>Status</th>
        <th>Image</th>
        <th>Feedback</th>
        <th>Action</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['location'] ?></td>
        <td><?= $row['description'] ?></td>
        <td><?= $row['status'] ?></td>
        <td>
            <?php if (!empty($row['image_after'])): ?>
                <img src="<?= $row['image_after'] ?>" width="120">
            <?php endif; ?>
        </td>
        <td><?= !empty($row['feedback']) ? $row['feedback'] : '-' ?></td>
        <td>
            <?php if ($row['status'] == 'Pending'): ?>
                Pending
            <?php elseif ($row['status'] == 'Solved'): ?>
                <form method="POST" action="verify_issue.php">
                    <input type="hidden" name="issue_id" value="<?= $row['id'] ?>">
                    <button type="submit" name="verify" style="background: ;">Verify as Solved</button>
                </form>
            <?php elseif ($row['status'] == 'Verified'): ?>
               ✔ Verified
            <?php endif; ?>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
