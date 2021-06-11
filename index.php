<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student management system</title>
</head>
<body style='background-color:#c9c9e3;color:#000'>
   <div> 
      <h3 align='right' style="magin_right:20px"><a style="text-decoration:none" href="login.php" >Admin Login </a></h3>
      <h1 align="center" >Welcome to the student management system</h1>

      <form method="post" action="index.php" >
     <table style="width:20%" align="center" border="1">
       <tr>
          <td colspan="2" align="center" style="width:100%">Student Information</td>
       </tr>
       <tr>
           <td align="left" style="width:100%"> Standerd</td>
           <td>
           <input type="number" name="standerd" required />
           </td>
       </tr>
       <tr>
          <td align="left"> Enter Rollno</td>
          <td style="100%"><input type="number" name="rollno" required /></td>
       </tr>
       <tr>
         <td colspan="2" align="center"><input type="submit" name="submit" value="show info" /></td>
       </tr>
     <table>
    </form>
   </div>
</body>
</html>
<?php
   if(isset($_POST['submit'])) {
      $stand = $_POST['standerd'];
      $rollno = $_POST['rollno'];
      include("dbcon.php");
      $qry = "SELECT * FROM `students` WHERE `roll_no` =  $rollno AND `Grades` = $stand ";
      $run = mysqli_query($con,$qry);
      if(mysqli_num_rows($run) > 0 ) {
         $data = mysqli_fetch_assoc($run);
           ?>
               <table border='1' style="width:400px;margin: 20px auto;height:400px">
                  <tr>
                      <th colspan='6'>Show student details</th>
                  </tr>
                  <tr>
                      <td><img src="dataimg/<?php echo $data['image'] ?> " alt='image'  style="width:200px;height:200px; " /></td>
                      <th>Roll NO</th>
                      <td><?php echo $data['roll_no'] ?></td>
                  </tr>
                  <tr>
                      <th>Name</th>
                      <td colspan='5'><?php echo $data['Name'] ?></td>
                  </tr>
                  <tr>
                      <th>Standerd</th>
                      <td colspan='5' ><?php echo $data['Grades'] ?></td>
                  </tr>
                  <tr>
                      <th>Parent contact Number</th>
                      <td colspan='5' ><?php echo $data['parent_contact'] ?></td>
                  </tr>
                  <tr>
                      <th>City</th>
                      <td colspan='5' ><?php echo $data['city'] ?></td>
                  </tr>
               </table>
           <?php
      }
      else {
         echo "failed";
      }

   }
?>