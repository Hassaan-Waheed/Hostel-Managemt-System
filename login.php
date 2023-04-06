<?php
$showalert=false;
$showsuccess=false;

$var=$_SERVER['REQUEST_METHOD'];
if($var=='POST')
{
  include 'conn.php'; 
  $username=$_POST["email"];
  $password=$_POST["pass"];
  $sql="select * from employees where email='$username' and password='$password' ";
  $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);
  if($num==1)
  {
    $showsuccess=true;
    session_start();
    $_SESSION['loggedin']=true;
    $_SESSION['username']=$username;
    header("location:homepage.php");
  }
  else
  {
    $showalert=true;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
</head>
<body style="background-color:lightblue">
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
        <li class="nav-item">
          <a style="color:blue; font-size:25px;"class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a style="color:blue; font-size:25px;"class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a style="color:blue; font-size:25px;"class="nav-link" href="#">Contact Us</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav> 

<?php
if($showsuccess)
{
  echo '<div style "height=50px; "class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Sucess!</strong> You are logged in.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if($showalert)
{
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Warning!</strong> Invalid credentials.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>

<h1 style="text-align:center;font-family:Arial, Helvetica, sans-serif; padding-right:60px;padding-top:50px;padding-bottom:15px;">
    Welcome!
</h1>
<form action="login.php" method='post' style="margin: 10px; margin-left:42%; width: 20%; font-size:25px; font-family:Arial, Helvetica, sans-serif" >
  <div class="mb-2">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Please only use your offical email.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="pass" name="pass">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="check">
    <label class="form-check-label" for="exampleCheck1">Keep me signed in</label>
  </div>
  <button style="width:280px; font-size:20px;" class="btn btn-primary">Login</button>
</form>
</body>
</html>