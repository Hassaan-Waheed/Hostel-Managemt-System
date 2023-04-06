
<!doctype html>       
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Delete</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" >
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

<h2 style=" margin-right:50px;margin-top:30px;text-align:center;font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">Student Records</h2>
<div>
<form method="POST" style="margin-top:20px;width:400px;margin-left:520px;"class="d-flex" role="search" action="delete.php" method="post">
        <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-primary" type="submit" id="button">Search</button>
      </form>
</div>
<?php
$showalert=false;
$showsuccess=false;

  include 'conn.php';
  if(isset($_POST['search']));
  {
    $button=$_POST['search'];
    $sql="select * from students where Std_Id='$button' ";  
    $result=mysqli_query($conn,$sql);  
     if(mysqli_num_rows($result)>0)
    {
      $showsuccess=true;
      foreach($result as $value)
      {

        ?>
          <table class="table table-hover">
            <tr >
              <th style="width:10%;">Student ID</th>
              <th style="width:20%;">Student Name</th>
              <th style="width:20%;">Student Department</th>
              <th style="width:20%;">Student Contact Number</th>
              <th style="width:20%;">Room Number</th>
            </tr>
            <tbody>
                <tr>
                  <td><?=  $value['Std_Id']; ?></td>
                  <td><?=  $value['Std_Name']; ?></td>
                  <td><?=  $value['Std_Dept']; ?></td>
                  <td><?=  $value['Std_CntctNo']; ?></td>
                  <td><?=  $value['Room_no']; ?></td>
                  <td><a href='delete1.php?<?= 'Id=$value["Std_Id"];'?>></a><i class='fa-solid fa-trash-can'></i></a></td>
                </tr>
              
              </tbody>
            
              </table>
             
              <?php   
              
          }
      }
    }
      ?>



<style>
table {
  border-radius: 10px;
  margin-top: 30px;
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1.5px solid blue;
  width: 5px;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: whitesmoke;
}
</style>
</head>
<body>
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
</body>
</html>