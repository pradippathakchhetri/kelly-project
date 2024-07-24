<?php
require('../config/config.php');
require('../middleware/secure.php');
require('../inc/header.php');
require('../inc/aside.php');
require('../inc/nav.php');
?>
<div class="card mx-4">
<div class="d-flex  justify-content-between">
    <h5 class="card-header">Table Basic</h5>
    <a type="button" class="btn btn-primary h-50 d-flex justify-content-center align-items-center me-4 mt-2 " href="createcard.php">Create Cards</a>
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>

          <th>SN</th>
          <th>TITLE</th>
          <th>IMAGE</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <?php
      $query = "SELECT * FROM cards ORDER BY id DESC";
$result= mysqli_query($conn, $query);
$i = 0;
while ($data=mysqli_fetch_array($result)){
  ?>

<tr>
  <td><?= ++$i; ?></td>
  <td><?= $data['name']; ?></td>
  <td><img style="width:100px; height:100px;" src="../../uploads/<?= $data['image']; ?>" alt="No Image"></td>
    <td>
    <a href="updatecard.php?id=<?php echo $data['id'] ?>" type="button" class="btn btn-info   text-center">Edit</a>
    <a href="deletecard.php?id=<?php echo $data['id']; ?>" type="button" class="btn btn-danger   text-center">Delete</a>
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