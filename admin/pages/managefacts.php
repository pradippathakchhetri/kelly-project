<?php
require('../config/config.php');
require('../middleware/secure.php');
require('../inc/header.php');
require('../inc/aside.php');
require('../inc/nav.php');


        ?>
<div class="card my-3">
  <div class="d-flex  justify-content-between">
    <h5 class="card-header">Table Basic</h5>
    <a type="button" class="btn btn-primary h-50 d-flex justify-content-center align-items-center me-4 mt-2 " href="createfacts.php">Create Facts</a>
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <?php
        if(isset($_GET['msg'])){
          $msg=$_GET['msg'];
          if($msg == 'success'){
            echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
             Successfully Deleted
              <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>';
          }
          if($msg == 'failed'){
            echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
             Error Deleting file, Please try again
              <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>';
          }
        }
        ?>
        <tr>

          <th>SN</th>
          <th>TITLE</th>
          <th>DETAIL</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <?php
      $query = "SELECT * FROM facts ORDER BY id DESC";
$result= mysqli_query($conn, $query);
$i = 0;
while ($data=mysqli_fetch_assoc($result)){
  ?>

<tr>
  <td><?= ++$i; ?></td>
  <td><?= $data['title']; ?></td>
  <td><?= $data['detail']; ?></td>
    <td>
      <div class="dropdown">
      <a href="updatefacts.php?id=<?php echo $data['id'] ?>" type="button" class="btn btn-info   text-center">Edit</a>
              <a href="deletefacts.php?id=<?php echo $data['id']; ?>" type="button" class="btn btn-danger   text-center">Delete</a>
    </td>
  </tr>
<?php
}
?>
      </tbody>
    </table>
  </div>
</div>
<?php
require('../inc/footer.php')
?>