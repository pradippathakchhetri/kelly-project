<?php
require('inc/toppart.php');
require('admin/config/config.php');

$query = " SELECT * FROM home";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_array($result);
 ?>
  <!-- ======= Hero Section ======= -->
  <section style="background-image: url(./uploads/<?=$data['image'];?>); " id="hero" class="d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center" data-aos="zoom-in" data-aos-delay="100">
      <h1><?=$data['title'];?></h1>
      <h2><?=$data['detail'];?></h2>
      <a href="about.php" class="btn-about">About Me</a>
    </div>
  </section><!-- End Hero -->

  <?php
  require('inc/footer.php')
  ?>