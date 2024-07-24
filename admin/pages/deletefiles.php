<?php
require('../config/config.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query1= "SELECT * FROM files WHERE id = '$id'";
    $result1 = mysqli_query($conn,$query1);
    $data = mysqli_fetch_assoc($result1);
    $query= "DELETE FROM files WHERE id = '$id'";
    $result = mysqli_query($conn,$query);
    if(!$result){
        header('refresh:0; url=managefiles.php?msg=failed');
    }else{
        unlink('../../uploads/'.$data['image']);
        header('refresh:0; url=managefiles.php?msg=success');

    }
    
   
 }

?>
