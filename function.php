<?php
  
  function showdetails($stand,$rollno) {
      include('dbcon.php');
      $sql = "SELECT * FROM `students` WHERE `roll_num` = $rollno AND `Grades` = $stand " ;
      $run = mysqli_query($con,$sql);

     if(mysqli_num_rows($run) > 0) {
        $data = mysqli_fetch_assoc($run);
        /*  ?>
          <table>
             <tr>
                 <th colspan='3'>Student Details</th>
             </tr>
             <tr>
                 <td rowspan='5'><img src='dataimg/<?php echo $data['image'] ; ?>' /></td>
                 <th>Roll No</th>
                 <td><?php echo data['roll_no'] ; ?></td>
             </tr>
             <tr>
                 <th>Name</th>
                 <td><?php echo data['Name'] ; ?></td>
             </tr>
             <tr>
                 <th>Standerd</th>
                 <td><?php echo data['Grades'] ; ?></td>
             </tr>
             <tr>
                 <th>Parent contact Number</th>
                 <td><?php echo data['parent_contact'] ; ?></td>
             </tr>
             <tr>
                 <th>City</th>
                 <td><?php echo data['city'] ; ?></td>
             </tr>
          </table>
          <?php  */
      }
      else {
            echo "<script>alert('Student not found')</script>";
      } 
  } 

?>