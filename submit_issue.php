<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style>
        nav 
        {
  height: 2rem;
  background: darkseagreen;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 5px;
}
body  
    {
      background-image: url("images/nature3.jfif");
      background-repeat: no-repeat;
      background-size: 100% 500%;
    }
    </style>
</head>
<body>

  <header style="background: #06402B; text-align: center;color: white; width: 100%; height:80px;">
<h2><img src="images/earth.gif" height="60px" width="80px">   Green Watch - Nature Issue Reporting & Awareness Portal   <img src="images/earth.gif" height="60px" width="80px"></h2>
  </header>

  <center>
<nav>
    <div style="background:">
        <a href="admin_login.php"><span style="color:white; font-size: 20px;">Admin</span></a> <span style="color:white;"> ||</span> 
        <a href="user_dashboard.php"><span style="color:white; font-size: 20px;">Verify</a></span> <span style="color:white;">  ||  </span>
        <a href="report_form.php"><span style="color:white; font-size: 20px;">Report</a></span>
    </div>
</nav>
</center> 

</body>
</html>
<?php
// Connect to database (replace with your actual DB credentials)
$servername = "localhost";
$username = "root";
$password = "";
$database = "greenwatch";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
  
    $title = $_POST['title'];
    $description = $_POST['description'];
    $location = $_POST['location'];

    // File handling
    $image_before_name = $_FILES['image_before']['name'];
    $image_before_tmp = $_FILES['image_before']['tmp_name'];

    // $image_after_name = $_FILES['image_after']['name'];
    // $image_after_tmp = $_FILES['image_after']['tmp_name'];
    $upload_folder = "uploads/";

    // Create uploads folder if it doesn't exist
    if (!file_exists($upload_folder)) 
    {
        mkdir($upload_folder, 0777, true);
    }

    // Move uploaded file
    $image_before_path = $upload_folder . basename($image_before_name);
    // $image_after_path = $upload_folder . basename($image_after_name);


    if (move_uploaded_file($image_before_tmp, $image_before_path)) 
    {
        // Insert into database
        $stmt = $conn->prepare("INSERT INTO issues (title, description, location, image_before) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $description, $location, $image_before_path);

        if ($stmt->execute()) 
        {
            echo "<center><h1 style='color:green'>Issue submitted successfully!</h1></center>";
            echo "<center><a href='report_form.php'><h3>Submit another<h3></a></center>";
        } 
        else 
        {
            echo "Failed to insert data: " . $stmt->error;
        }
}
       else
       {
        echo "image uplod failed!!!";
       
} 
}

    

$conn->close();
?>