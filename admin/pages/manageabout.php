<?php
require('../config/config.php');
require('../middleware/secure.php');
require('../inc/header.php');
require('../inc/aside.php');
require('../inc/nav.php');
?>
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>

  <!-- Basic Bootstrap Table -->
  <div class="card ">
    <h5 class="card-header">Table Basic</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <?php
        if(isset($_GET['msg'])){
          $msg=$_GET['msg'];
          if($msg == 'success'){
            echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
             Successfully Delet ed
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
        <thead>
          <tr>

            <th>Detail</th>
            <th>Image Name</th>
            <th>Image </th>
            <th>Sub-title</th>
            <th>Detail</th>
            <th>Birthday</th>
            <th>Website</th>
            <th>Phone</th>
            <th>City</th>
            <th>Degree</th>
            <th>Email</th>
            <th>Frelance</th>
            <th>Content</th>
            <th>action</th>

          </tr>
        </thead>
        <tbody class="table-border-bottom-0 ">
          <?php
          $query = "SELECT  * FROM about ORDER BY id DESC";
          $result = mysqli_query($conn, $query);
          while ($data = mysqli_fetch_assoc($result)) { ?>



            <tr>

              <td><textarea style="border:transparent; width:300px; max-height:150px;  overflow-y:scroll" readonly><?= $data['slug']; ?></textarea></td>
              <td><?= $data['image']; ?></td>
              <td><img style="width: 80px; height: 80px;" src="../../uploads/<?= $data['image']; ?>"></td>
              <td><?= $data['subtitle']; ?></td>
              <td><div style="width:100px; "><?= $data['subslug']; ?></div></td>
              <td><?= $data['birthday']; ?></td>
              <td><?= $data['website']; ?></td>
              <td><?= $data['phone']; ?></td>
              <td><?= $data['city']; ?></td>
              <td><?= $data['degree']; ?></td>
              <td><?= $data['email']; ?></td>
              <td><?= $data['freelance']; ?></td>
              <td style="max-width:300px; max-height:300px; display:flex; overflow:hidden">
               <textarea style="border:transparent; width:300px; max-height:150px;  overflow-y:scroll" readonly><?= $data['content']; ?></textarea>
              </td>
              <td>
              <a href="updateabout.php?id=<?php echo $data['id'] ?>" type="button" class="btn btn-info   text-center">Edit</a>
              <a href="deleteabout.php?id=<?php echo $data['id']; ?>" type="button" class="btn btn-danger   text-center">Delete</a>
              </td>
            <?php
          }
            ?>

            </tr>

        </tbody>
      </table>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->
</div>
<?php
require('../inc/footer.php')
?>