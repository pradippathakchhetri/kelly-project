<?php
require('../config/config.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query= "DELETE FROM services WHERE id = '$id'";
    $result = mysqli_query($conn,$query);
    if(!$result){
        header('refresh:0; url=manageservices.php?msg=failed');
    }else{
       
        header('refresh:0; url=manageservices.php?msg=success');

    }
    
   
 }

?>
