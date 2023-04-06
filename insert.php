<?php
$showalert=false;
$showsuccess=false;

$var=$_SERVER['REQUEST_METHOD'];
if($var=='POST')
{
  include 'conn.php';
  $std_id=$_POST["std_id"];
  $std_name=$_POST["std_name"];
  $std_cntct_no=$_POST["std_cntct_no"];
  $std_dept=$_POST["std_dept"];
  $room_no=$_POST["room_no"];
  $sql="insert into students (`Std_Id`, `Std_Name`,`Std_CntctNo` , `Std_Dept`, `Room_no`) VALUES ('$std_id',' $std_name', '$std_cntct_no','$std_dept','$room_no')";
  $result=mysqli_query($conn,$sql);
  if($result)
  {
    $showsuccess=true;
  }
  else
  {
    $showalert=true;
  }
    

}
?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Enroll new</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" >
  </head>
  <body style="background-color:lightblue ;">
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
    <nav class="navbar navbar-expand-lg py-0 bg-light">
  <div class="container-fluid">
    <img src="NU-logo.png"
    alt="FastNU-logo"
    height="80px"
    >
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul style="font-size: 28px;text-align:right; font-weight:normal; font-family:Arial, Helvetica, sans-serif;margin:30px; "
      class="navbar-nav ms-auto">
        <li class="nav-item ">
        <a style="color:blue; font-size:24px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;"class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
        <a style="color:blue; font-size:24px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;"class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
        <a style="color:blue; font-size:24px; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;"class="nav-link" href="#">Contact Us</a>
        </li>
        
        <li class="nav-item dropdown">
          <a style="margin-right:1px; "class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img
            src="user-286-512.png"
            alt="user photo"
            height="30px"
            width="40px"
            >
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Change Password</a></li>
            <li><a class="dropdown-item" href="#">Change Username</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Log Out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div> 
</nav> 

<?php
if($showsuccess)
{
  echo '<div style "height=50px; "class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Done!</strong> Your record has been inserted successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if($showalert)
{
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Warning!</strong> Record could not be inserted.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
} 
?>

<h1 style="margin-top:50px; text-align:center;">Please fill out the form<br> of the student to be enrolled</h1>
<form action="insert.php" method="post"style="margin-top:30px;width:600px;margin-left:420px;"class="row g-3">
  <div class="col-md-6">
    <label for="std_id" class="form-label">Student Id</label>
    <input type="number" class="form-control" id="std_id" name="std_id">
  </div>
  <div class="col-md-6">
    <label for="std_name" class="form-label">Student Name</label>
    <input type="text" class="form-control" id="std_name" name="std_name" placeholder="E.g Hassaan Waheed">
  </div>
  <div class="col-12">
    <label for="std_cntct_no" class="form-label">Student Conatct Number</label>
    <input type="number" class="form-control" id="std_cntct_no" name="std_cntct_no" placeholder="+92xxxxxxxxxx">
  </div>
  <div class="col-md-6">
    <label for="std_dept" class="form-label">Student Department</label>
    <select id="std_dept" name="std_dept" class="form-select">
      <option selected>CS</option>
      <option>SE</option>
    </select>
  </div>
  <div class="col-md-4">
    <label for="room_no" class="form-label">Room no</label>
    <select id="room_no" name="room_no" class="form-select">
      <option selected>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
    </select>
  </div>
  <div class="col-12">
    <button style="width:580px; font-size:20px;"type="submit" class="btn btn-primary">Enroll</button>
  </div>
</form>
  </body>
</html>
