<?php
require('../config/config.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query= "DELETE FROM webs WHERE id = '$id'";
    $result = mysqli_query($conn,$query);
    if(!$result){
        header('refresh:0; url=manageweb.php?msg=failed');
    }else{
       
        header('refresh:0; url=manageweb.php?msg=success');

    }
    
   
 }

?>
