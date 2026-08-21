
<?php
$conn = new mysqli("localhost", "root", "", "greenwatch");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit_solution'])) {
    $id = $_POST['issue_id'];
    $feedback = $_POST['feedback'];

    $image_name = $_FILES['solved_image']['name'];
    $temp = $_FILES['solved_image']['tmp_name'];
    $path = "uploads/" . $image_name;
    move_uploaded_file($temp, $path);

    $conn->query("UPDATE issues SET image_after='$path', feedback='$feedback', status='Solved' WHERE id=$id");
}

$result = $conn->query("SELECT * FROM issues");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>



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
       nav {
  height: 2rem;
  background: darkseagreen;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 5px;
  
}
 button
        {
            margin-top: 20px;
            padding: 10px 0;
            width: 150px;
            height: 30px;
            font-size: 15px;
            background-color: #4CAF50;
            border:none;
            border-radius:10px;
            color: white;
            font-weight:bold;
            text-align: center;
        }

    </style>
</head>
<body style="background:#1A2421;">
     
      <header style="background: #06402B; text-align: center;color: white; width: 100%; height: 50px;">   
<h2><img src="images/earth.gif" height="40px" width="40px">
  <span style="font-size: 30px;">Green Watch - Nature Issue Reporting & Awareness Portal 
  <img src="images/earth.gif" height="40px" width="40px"></h2>
  </header>

  <center>
<nav>
    <div style="background:">
        <a href="admin_login.php"><span style="color:white; font-size: 20px;">Admin</span></a> <span style="color:white;">  ||  </span>
        <a href="report_form.php"><span style="color:white; font-size: 20px;">Report</span></a> <span style="color:white;">  || </span> 
        <a href="user_dashboard.php"><span style="color:white; font-size: 20px;">Verify</a></span>
    </div>
</nav>
</center>

    <center>
    <h1 style="color: white;">Admin Dashboard - Reported Issues</h1></center>
    <table id="t1">
        <tr style="background:lightgreen; color: white; font-size: 20px;">
            <th>ID</th>
            <th>Location</th>
            <th>Description</th>
            <th>Before Image</th>
            <th>Status</th>
            <th>After Image</th>
            <th>Feedback</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['location'] ?></td>
            <td><?= $row['description'] ?></td>
            <td><img src="<?= $row['image_before'] ?>" alt="Before" height="auto"  width="100px"></td>
            <td><?= $row['status'] ?></td>
            <td>
                <?php if (!empty($row['image_after'])) { ?>
                    <img src="<?= $row['image_after'] ?>" alt="After" height="auto"  width="100px">

                <?php } else { echo "N/A"; } ?>
            </td>
            <td><?= !empty($row['feedback']) ? $row['feedback'] : "N/A" ?></td>
            <td>
                <?php if ($row['status'] == 'Pending') { ?>
                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="issue_id" value="<?= $row['id'] ?>">
                        <input type="file" name="solved_image" required><br><br>
                        <textarea name="feedback" placeholder="Feedback..." required rows="3" cols="30"></textarea><br>
                        <button type="submit" name="submit_solution">Submit Solution</button>
                    </form>
                <?php } else { ?>
                    ✔ Solved
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>