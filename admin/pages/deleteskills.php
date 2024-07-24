<?php
require('../config/config.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query= "DELETE FROM skills WHERE id = '$id'";
    $result = mysqli_query($conn,$query);
    if(!$result){
        header('refresh:0; url=manageskills.php?msg=failed');
    }else{
       
        header('refresh:0; url=manageskills.php?msg=success');

    }
    
   
 }

?>
