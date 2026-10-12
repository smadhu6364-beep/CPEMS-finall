<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
{
      $username = $_POST['username'];
      $password=md5($_POST['password']);
      $sql = "SELECT ID, UserRole FROM tbladmin WHERE UserName=:username and Password=:password";
      $query =$dbh->prepare($sql);
      $query -> bindparam(':username', $username, PDO::PARAM_STR);
      $query-> bindparam(':password', $password,PDO::PARAM_STR);
      $query-> execute();
      $result= $query-> fetchall(PDO:: FETCH_OBJ);
      if($query -> rowcount() > 0 )
      {
      foreach($results as $result){
      $aid= $results-> ID;
      $SESSION['urole']=$result -> UserRole;
      }
      if(!empty($_POST["remember"])){
      setcookie ("user_name", $_POST["username"],time()+(10*365*24*60*60));
      setcookie ("user_password", $_POST["password"],time()+(10*365*24*60*60));
      }else{
      if(isset($_COOKIE["user_name"])){
      setcookie ("user_name","");
      if(isset($_COOKIE["user_password"])){
      setcookie ("user_password","");
                              
                        }
                  }
            }
$_SESSION['login']=$_POST['username'];
if($_SESSION['urole']=='1'):
    $_SESSION['cpmsaid']=$aid;
echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
else:
    $_SESSION['cpmsaid']=$aid;
    echo "<script type='text/javascript'> document.location ='sub/dashboard.php'; </script>";
endif;
} else{
echo "<script>alert('Invalid Details');</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login-Page</title>
</head>
<body class="body-Login-back" >
      <div class= "container" >
            <h3 style="color: white;">Curfew e-Pass Management System</h3>
      </div>
      <div class = "panel-heading" >
            <h3 class="panel-title">Please Sign In</h3>
      </div>
      <form role= "form" method="post" name="login">
            <fieldset><div class= "form-group">
                  <label for="login User name">UserName</label>
                  <input type="text" class="form-control" required = "true" name="UserName" value="
                  <?php 
                  if(isset($_COOKIE["user_name"])){
                        echo $_COOKIE["user_name"];
                  }?>">
            </div></fieldset>
      </form>

    
      
           <div class= "form-group">
                  <label for="Login-Password">Password</label>
                  <input type="password" class="form-control" name="password" value="
                  <?php 
                  if(isset($_COOKIE["user_password"])){
                        echo $_COOKIE["user_password"];
                  }?>">>
            </div>

            <div class = "check-box">
                  <input type="checkbox" name="remember" id="remember"
                   <?php
                   if(isset($_COOKIE["user_name"])){?> checked <?php } ?>/>
           <label for="keep_me_logged_in">Keep me signed in</label>

            <label style="padding-left:40px">
      <a href="forgot-password.php">Lost Password?</a>
      </label>
            </div>
            <input type="submit" value="login" class="btn btn-lg btn-success btn-block" name="login">
            

</body>
</html>
