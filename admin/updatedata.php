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
        $rollno = $_POST['Rollno'];
        $name = $_POST['name'];
        $city =$_POST['city'];
        $contact = $_POST['contact'];
        $standerd = $_POST['standerd'];
        $imgname = $_FILES['simg']['name']; 
        $tempname = $_FILES['simg']['tmp_name']; 
        $id = $_POST['sid'];
        $simg = $_POST['simg'];
        
        move_uploaded_file($tempname,"../dataimg/$imgname");
        $qury = "UPDATE   `students` SET `roll_no`='$rollno',`Name`='$name',`parent_contact`='$contact',`Grades`='$standerd',
        `image`='$imgname',`city`='$city' WHERE `Id` = $id "   ;
        
        $run = mysqli_query($con,$qury);
        if ( $run == true) {
           ?>
               <script>
                     alert('data updated is successfull');
                     window.open('updateform.php?sid=<?php echo $id ; ?>','_self');
               </script>
               <?php
        }
?>