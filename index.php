<?php
  session_start();
  $connection = mysqli_connect("localhost","root","");
  $db = mysqli_select_db($connection,"enoticeboard");

  if(isset($_POST['login'])){
    $query = "select * from users where email = '$_POST[email]' AND password = '$_POST[password]'";
    $query_run = mysqli_query($connection,$query);
    if(mysqli_num_rows($query_run)){
      $_SESSION['email'] = $_POST['email'];
      while($row = mysqli_fetch_assoc($query_run)){
        $_SESSION['class'] = $row['class'];
        echo "<script>
        window.location.href = 'user_dashboard.php';
        </script>";
      }
    }
    else{
      echo "<script>alert('Please Enter correct email id and password');

      </script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>E-NOTICE BOARD</title>
    <!-- Bootstrap files -->
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script src="bootstrap-4.4.1/js/bootstrap.min.js" charset="utf-8"></script>
    <!-- CSS File -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <!-- Header section code start here  -->
    <div class="row" id="header">
    <div class="col-md-4">
      <img src="images/logo.png" class="img-rounded" width="100px" height="100px">
      </div>
      <div class="col-md-4">
        <h3>E-NOTICE BOARD</h3>
      </div>
      <div class="col-md-4">
      <h4>JSPM'S RAJARSHI SHAHU COLLEGE OF ENGINEERING,PUNE</h4> 
      </div>
    </div>

    <!-- Login from code starts here -->
    <section id="login_form">
      <div class="row">
        <div class="col-md-4 m-auto block">
          <center><h4>Login form</h4></center>
          <form action="index.php" method="post">
            <div class="form-group">
              <lable>Email ID:</label>
                <input class="form-control" type="text" name="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
              <lable>Passowrd:</label>
                <input class="form-control" type="password" name="password" placeholder="Enter your Password">
            </div>
            <button class="btn btn-primary" type="submit" name="login">Login</button>
          </form>
          <a href="register.php">Click here to register</a>
        </div>
      </div>
    </section>
  </body>
</html>

