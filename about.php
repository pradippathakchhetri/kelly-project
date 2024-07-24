<?php
require('inc/toppart.php');
require('admin/config/config.php');
?>
<?php


?>
<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>About</h2>
        <?php
        $query = " SELECT * FROM about";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($result);



        ?>
        <p><?= $data['slug']; ?> </p>
      </div>

      <div class="row">
        <div class="col-lg-4">
          <img src="uploads/<?= $data['image']; ?>" class="img-fluid" alt="">
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content">
          <h3><?= $data['subtitle']; ?></h3>
          <p class="fst-italic">
            <?= $data['subslug']; ?>
          </p>
          <div class="row">
          
            <div class="col-lg-6">

              <ul>
                <li><i class="bi bi-rounded-right"></i> <strong>Birthday:</strong><?= $data['birthday']; ?></li>
                <li><i class="bi bi-rounded-right"></i> <strong>Website:</strong><?= $data['website']; ?></li>
                <li><i class="bi bi-rounded-right"></i> <strong>Phone:</strong><?= $data['phone']; ?></li>
                <li><i class="bi bi-rounded-right"></i> <strong>City:</strong><?= $data['city']; ?></li>
              </ul>
            </div>
            <div class="col-lg-6">
              <ul>
                <li><i class="bi bi-rounded-right"></i> <strong>Degree:</strong> <?= $data['degree']; ?></li>
                <li><i class="bi bi-rounded-right"></i> <strong>Email:</strong><?= $data['email']; ?></li>
                <li><i class="bi bi-rounded-right"></i> <strong>Freelance:</strong><?= $data['freelance']; ?></li>
              </ul>
            </div>
          </div>
          <p>
            <?= $data['content']; ?>
          </p>
        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Skills Section ======= -->
  <section id="skills" class="skills">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Skills</h2>
      </div>

      <div class="row skills-content">
        <?php
        $query1 = " SELECT * FROM skills";
        $result = mysqli_query($conn, $query1);
        while ($data1 = mysqli_fetch_assoc($result)) {
        ?>
          <div class="col-lg-6">

            <div class="progress">
              <span class="skill"><?= $data1['title'];?> <i class="val"><?= $data1['detail'];?>%</i></span>
              <div class="progress-bar-wrap">
                <div class="progress-bar" role="progressbar" aria-valuenow="<?= $data1['detail'];?>" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>

    </div>
  </section><!-- End Skills Section -->

  <!-- ======= Facts Section ======= -->
  <section id="facts" class="facts">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Facts</h2>
      </div>

      <div class="row counters">
      <?php
        $query2 = " SELECT * FROM facts";
        $result2 = mysqli_query($conn, $query2);
        while ($data2 = mysqli_fetch_array($result2)) {
        ?>
          <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="<?=$data2['detail']?>" data-purecounter-duration="1" class="purecounter"></span>
          <p><strong><?=$data2['title'];?></strong></p>
        </div>
        <?php
        }
        ?>
        
      </div>

    </div>
  </section><!-- End Facts Section -->

  <!-- ======= Testimonials Section ======= -->
  <section id="testimonials" class="testimonials">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Testimonials</h2>
      </div>

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">
        <?php
        $query3 = " SELECT * FROM testimonials";
        $result3 = mysqli_query($conn, $query3);
        while ($data3 = mysqli_fetch_array($result3)) {
        ?>
          <div class="swiper-slide">
            <div class="testimonial-item">
              <img src="uploads/<?=$data3['image'];?>" class="testimonial-img" alt="">
              <h3><?=$data3['name'];?></h3>
              <h4><?=$data3['profession'];?></h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                <?=$data3['detail'];?>
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div><
        <?php
        }
        ?>
         

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Testimonials Section -->

</main><!-- End #main -->

<?php
require('inc/footer.php')
?>