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
    </div>  
    <div class='container'>
      <div class="user_input">
       <table>
             <form method='post' action='updatestudent.php' >
              
                   <tr>
                      <th>Enter standerd</th><td><input type='number' placeholder='Enter Standerd' name='standerd' /></td>
                   
                      <th>Enter Student Name</th><td><input type='text' placeholder='Enter Name' name='name' /></td>
                  
                      <td  colspan='2'><input type='submit'  name='submit' value='submit' /></td>
                   </tr>
            
             </form>
         </table>
    </div>
        <br></br>
    <div class="edit">
            <table border='1'>
                <tr>
                <th>No</th>
                <th>Name</th>
                <th>Image</th>
                <th>Roll No</th>
                <th>Edit</th>
                <th>Delete</th>
                </tr>
                <?php
                    if(isset($_POST['submit'])) {
                        include("../dbcon.php");
                        $stand = $_POST['standerd'];
                        $uname = $_POST['name'];
                        $sql = " SELECT * FROM `students` WHERE `Grades`= '$stand' AND `Name` LIKE '%$uname%' ";
                        $run = mysqli_query($con,$sql);
                        if(mysqli_num_rows($run) < 1) {
                            echo "<tr><td colspan='6'>Not suppoerted</td></tr>";
                        }
                        else {
                        
                            $count = 0;
                            while($data = mysqli_fetch_assoc($run)){
                                    $count++;
                                ?>
                                    <tr>
                                        <td><?php echo $count;  ?></td>
                                        <td><?php echo $data['Name']; ?></td>
                                        <td><img src="../dataimg/<?php echo $data['image']; ?> " /></td>
                                        <td><?php echo $data['roll_no']; ?></td>
                                        <td><a href="updateform.php?sid=<?php echo $data['Id']; ?> " >Edit</a></td>
                                        <td><a href="deleteform.php?sid=<?php echo $data['Id']; ?> ">Delete</a></td>
                                    </tr>

                                <?php
                            }
                        }
                    }
                ?>
            </table>
       </div>
  
    </div>
</body>
</html>
