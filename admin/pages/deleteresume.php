<?php
require('../config/config.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query= "DELETE FROM resume WHERE id = '$id'";
    $result = mysqli_query($conn,$query);
    if(!$result){
        header('refresh:0; url=manageresume.php?msg=failed');
    }else{
       
        header('refresh:0; url=manageresume.php?msg=success');

    }
    
   
 }

?>
