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
    include('../dbcon.php');
    $sid = $_GET['sid'];
    $sql = " SELECT * FROM `students` WHERE `Id` = '$sid' ";
    $run = mysqli_query($con,$sql);
    $data = mysqli_fetch_assoc($run);
?>
<body>
    <div>
        <div class='admin'>
            <div id='back'><a href='updatestudent.php'>Back</a></div>
            <div id='admin_dash'><h1>ADMINDASHBOARD</h1></div>
            <div id='logout'><a href='logout.php' >LOgOut</a></div>
        </div>
        <div class='student_form'>

            <table>
                    <form method='post' action='updatedata.php' enctype='multipart/form-data'>
                    
                        <tr>
                            <td>Roll_NO</td><td><input type='text' name='Rollno'  value="<?php echo $data['roll_no'] ?>" required /></td>
                        </tr>
                        <tr>
                            <td>NAME</td><td><input type='text'name='name'  value="<?php echo $data['Name'] ?>" required /></td>
                        </tr>
                        <tr>
                            <td>City</td><td><input type='text'name='city'  value="<?php echo $data['city'] ?>"  required /></td>
                        </tr>
                        <tr>
                            <td>Parent Contact</td><td><input type='text' name='contact'   value="<?php echo $data['parent_contact'] ?>"  required /></td>
                        </tr>
                        <tr>
                            <td>Standerd</td><td><input type='number' name='standerd'  value="<?php echo $data['Grades'] ?>"   required /></td>
                        </tr>
                        <tr>
                            <td>Profile Image</td><td><input type='file'  name='simg' value="<?php echo $data['image'] ?>"  required /></td>
                        </tr>
                        <tr><td  colspan='2' align='center'>
                            <input type='hidden' name="sid" value="<?php echo $data['Id']; ?>" />
                            <input type='submit' value='submt' name='submit' required />
                        </td></tr>

                    </form>   
                </table>

        </div>
      
         
          
  </div>
</body>
</html>