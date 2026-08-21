<!-- report_form.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Report Environmental Issue | Green Watch</title>
  <style>
    label
    {
      font-size: 20px;
      color: darkgreen;
      text-align: left;

    }
    form   
    {
      text-align: left;
      padding-left: 20px;
      padding-top: 20px;
    }
   body  
    {
      background-image: url("images/nature.webp");
      background-repeat: no-repeat;
      background-size: 100% 130%;
    }
    nav {
  height: 2rem;
  background: linear-gradient(to right, #10be84, #2a5eb2);
  width: 25rem;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 5px;
  box-shadow: 0 0px 10px #2a5eb2, 0 0px 10px #10be84;
}
  </style>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

  <header style="background: #06402B; text-align: center;color: white; width: 100%; height: 60px;">
<h2><img src="images/earth.gif" height="60px" width="80px">   Green Watch - Nature Issue Reporting & Awareness Portal   <img src="images/earth.gif" height="60px" width="80px"></h2>
  </header>
  
  <center>
<nav>
    <div style="background:">
      <a href="admin_login.php"><span style="color:white; font-size: 20px;">Admin</span></a><span style="color:white;">  ||  </span>
        <a href="report_form.php"><span style="color:white; font-size: 20px;">Report</a></span><span style="color:white;">  ||  </span>
        </span> <a href="user_dashboard.php"><span style="color:white; font-size: 20px;">Verify</a></span>

    </div>
</nav>
</center>



<center>
  <div style="height:650px; width:700px;background: lightgreen; border: 3px solid darkgreen; border-radius: 20px;">
     <marquee width="100%" height="50px" scrollamount="10px" style="background: #74C365; text-align: center;">
   <h3 style="color:#4B5320;display: inline-block;">Report Nature/Environmental Issue</h3>
</marquee>

    <!-- Form Starts -->
    <form action="submit_issue.php" method="POST" enctype="multipart/form-data">
      <!-- Issue Title -->
      <div>
        <label for="title">Issue Title</label><br>
        <input type="text" class="form-control"  id="title" name="title" placeholder="E.g. Garbage Dumping" style="width: 650px; height: 50px;" required>
      </div>

      <!-- Description -->
      <div>
        <label for="description" class="form-label">Description of the Issue</label>
        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Describe what's happening..." required style="width: 650px; height: 200px;"></textarea>
      </div>

      <!-- Location -->
      <div>
        <label for="location">Location</label><br>
        <input type="text" class="form-control" id="location" name="location" placeholder="E.g. Near Bus Stop, Sector 10" style="width: 650px; height: 50px;" required>
      </div>

      <!-- Upload Image -->
      <div>
        <label for="image_before" class="form-label">Upload Image of the Issue</label>
        <input class="form-control" type="file" id="image_before" name="image_before" accept="image/*" style="width: 650px; height: 50px;" required>
      </div><br>

      <!-- Submit -->
      <div class="text-center" >
      <button type="submit" style="font-size:18px;" class="btn btn-success" name="b1">Submit Issue</button>
      </div>
  </form>
    <!-- Form Ends -->
  </div>
</center>
</body>
</html>