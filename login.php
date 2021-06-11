<?php
  session_start();
    if($_SESSION["uid"])
     {
         header('location: admin/admindash.php');
     }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <title>admin login</title>
</head>
<body style='background-color:#9696be'>
     <div class="login_page">
         <a style="text-decoration:none" href='index.php'>Back</a>
         <h1 align="center">Admin Login </h1>
         <form method="post" action="login.php" >
             <table>
                 <tr>
                    <td>Username</td><td><input type="text" name="uname" required</td>
                 </tr>
                 <tr>
                    <td>Password</td><td><input type="password" name="pass" required</td>
                 </tr>
                 <tr>
                    <td colspan="2" align="center" ><input type="submit" name="login" value="Login"</td>
                 </tr>
             </table>
         </form>
        
     </div>
</body>
</html>
<?php
   include("dbcon.php");
        if(isset($_POST['login']))
        {
            $uname = $_POST['uname'];
            $pass = $_POST['pass'];

            $qry = "select * from admin where username = '$uname' && password = '$pass'  ";
            $run = mysqli_query($con,$qry);
            $row = mysqli_num_rows($run);
            if($row < 1) {
                 ?>
                 <script>
                    alert('Your username ot password not matched');
                    window.open('login.php','_self');
                 </script>
                 <?php 
            }
            else {
                $Id = mysqli_fetch_assoc($run)['Id'];

                    $_SESSION["uid"] = $Id;
                    header('location: admin/admindash.php');
            }
        }
?>