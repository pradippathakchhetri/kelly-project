<?php
require('../config/config.php');
require('../middleware/secure.php');
require('../inc/header.php');
require('../inc/aside.php');
require('../inc/nav.php');
?>
<div class="container py-5">
    <?php
    if(isset($_GET['msg'])){
        $msg =$_GET['msg'];
        if($msg == "failed"){
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          Error Deleting Data!Try again..
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        if($msg == "success"){
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
               Data Deleted sucessfully.
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>';
        }
    }
    ?>
    <div class="d-flex  justify-content-between ">
        <h1 class="text-align-center ps-5"> Data</h1>
    <a type="button" class="btn btn-primary h-75 " href="createhome.php">Create Siteconfig section</a>
</div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Sitekey</th>
          <th scope="col">Sitevalue</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $query = "SELECT * FROM siteconfig ORDER BY id DESC";
        $result = mysqli_query($conn, $query);
        $i = 0;
        while ($data =mysqli_fetch_array($result)){
           ?>
          <tr>
            <th scope="row"><?php echo ++$i; ?></th>
            <td><?php echo $data['sitekey']; ?></td>
            <td><?php echo $data['sitevalue']; ?></td>
           <td>
              <a href="updatesiteconfig.php?id=<?php echo $data['id'] ?>" type="button" class="btn btn-info   text-center">Edit</a>
              <a href="deletesiteconfig.php?id=<?php echo $data['id']; ?>" type="button" class="btn btn-danger   text-center">Delete</a>
              
          </td>
           
            </tr>
          <?php
        }
        ?>
       
      
      </tbody>
    </table>
</div>
<?php
require('../inc/footer.php')
?>