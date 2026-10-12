<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(strlen($_SESSION['cpmsaid'] == 0)){
      header('location:logout.php');
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Manage Sub-admins</title>
</head>
<body>
      
</body>
</html>

<?php } ?>