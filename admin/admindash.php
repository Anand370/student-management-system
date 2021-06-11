<?php 
  session_start();
    if(isset($_SESSION['uid'])) 
    {
        echo '';

    }
    else {
        header('location: ../login.php');
    }
?>
<?php
   include('header.php');
?>
<body style='background-color:#7a4949'>
  <div>
        <div class='admin'>
          <div id='admin_dash'><h1>ADMINDASHBOARD</h1></div>
          <div id='logout'><a href='logout.php' >LOgOut</a></div>
        </div>
        <div class='admin_student'>
           <table border='1' style="width:90%;height:90%">
                <tr align="center">
                   <td>1.</td><td><a href='addstudent.php'>Add student </a></td>
                   <td>Here, you can add student details</td>
                </tr>
                <tr align="center">
                   <td>2.</td><td><a href='updatestudent.php'>UPdate student </a></td>
                   <td>Here, you can Update student details</td>
                </tr>
                <tr align="center"> 
                   <td>3.</td><td><a href='deletestudent.php'>Delete student  </a></td>
                   <td>Here, you can delete student details </td> 
                </tr>
           </table>
        </div>
  </div>
</body>
</html>