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
    <a type="button" class="btn btn-primary h-50 d-flex justify-content-center align-items-center me-4 mt-2 " href="createresume.php">Create Resume</a>
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>

          <th>SN</th>
          <th>TITLE</th>
          <th>Topic</th>
          <th>DETAIL</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <?php
      $query = "SELECT * FROM resume ORDER BY id DESC";
$result= mysqli_query($conn, $query);
$i = 0;
while ($data=mysqli_fetch_assoc($result)){
  ?>

<tr>
  <td><?= ++$i; ?></td>

  <td><?= $data['title']; ?></td>
  <td><?= $data['topic']; ?></td>
  <td><textarea readonly style="border: none; width:250px; height:100px;" ><?= $data['detail']; ?></textarea></td>
    <td>
    <a href="updateresume.php?id=<?php echo $data['id'] ?>" type="button" class="btn btn-info   text-center">Edit</a>
    <a href="deleteresume.php?id=<?php echo $data['id']; ?>" type="button" class="btn btn-danger   text-center">Delete</a>
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