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
<body>
    <div class='container'>
       <?php
         include('title.php');
       ?>
        <div class='student_form'>
            <form method='post' action='addstudent.php' enctype='multipart/form-data'>
                <table>
                   
                    <tr>
                        <td>Roll_NO</td><td><input type='text' name='Rollno' placeholder='Enter Roll No' required /></td>
                    </tr>
                    <tr>
                        <td>NAME</td><td><input type='text'name='name' placeholder='Enter  name' required /></td>
                    </tr>
                    <tr>
                        <td>City</td><td><input type='text'name='city' placeholder='Enter  City' required /></td>
                    </tr>
                    <tr>
                        <td>Parent Contact</td><td><input type='text' name='contact' placeholder='Enter parent contact ' required /></td>
                    </tr>
                    <tr>
                        <td>Standerd</td><td><input type='number'name='standerd' placeholder='Enter standerd' required /></td>
                    </tr>
                    <tr>
                        <td>Profile Image</td><td><input type='file'  name='simg'  required /></td>
                    </tr>
                    <tr><td  colspan='2' align='center'><input type='submit' value='submt' name='submit' required /></td></tr>
                </table>
            </form>
       </div>
    </div>
</body>
</html>
<?php
     if(isset($_POST['submit'])) {
         include('../dbcon.php');
        $rollno = $_POST['Rollno'];
        $name = $_POST['name'];
        $city =$_POST['city'];
        $contact = $_POST['contact'];
        $standerd = $_POST['standerd'];
        $imgname = $_FILES['simg']['name']; 
        $tempname = $_FILES['simg']['tmp_name']; 

        move_uploaded_file($tempname,"../dataimg/$imgname");
        $qury = "INSERT INTO `students`(`Id`, `roll_no`, `Name`, `parent_contact`, `Grades`,`image`, `city`) 
        VALUES (NULL,'$rollno','$name','$contact','$standerd','$imgname','$city') "   ;
        
        $run = mysqli_query($con,$qury);
        if ( $run == true) {
           ?>
               <script>
                     alert('data insert is successfull');
               </script>
               <?php
        }

     }
?>