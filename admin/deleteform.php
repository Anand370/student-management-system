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
include('../dbcon.php');
        $id = $_REQUEST['sid'];
        $qury = " DELETE FROM `students` WHERE `Id` = '$id' "   ;
        
        $run = mysqli_query($con,$qury);
        if ( $run == true) {
           ?>
               <script>
                     alert('data deleted is successfull');
                     window.open('updatestudent.php','_self');
               </script>
               <?php
        }
?>