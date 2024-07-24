<?php
require('inc/toppart.php');
require('admin/config/config.php');
?>
<main id="main">

  <!-- ======= Resume Section ======= -->
  <section id="resume" class="resume">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Resume</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row">
        <?php
        $query = "SELECT * FROM resume";
        $result = mysqli_query($conn, $query);
        while ($data = mysqli_fetch_array($result)) {
        ?>
          <div class="col-lg-6">
            <h3 class="resume-title"><?= $data['title']; ?></h3>
            <div class="resume-item pb-0">
              <h4><?= $data['topic']; ?></h4>
              <p><em><?= $data['detail']; ?>.</em></p>

            </div>
            </div>
          <?php
        }
          ?>
          
      </div>

    </div>
  </section><!-- End Resume Section -->

</main><!-- End #main -->

<?php
require('inc/footer.php')
?>