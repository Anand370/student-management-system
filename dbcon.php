<?php
$con = mysqli_connect('localhost','root','','sms');
if($con == false) {
    echo "connection is not done";
}
$query1 = "SELECT Username, Password FROM sms";


?>