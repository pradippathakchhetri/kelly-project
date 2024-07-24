<?php
require('../config/config.php');
require('../middleware/secure.php');
require('../inc/header.php');
require('../inc/aside.php');
require('../inc/nav.php');

?>
<div style="width:80%" class="container bg-dark p-5 m-5  shadow ">
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="d-flex justify-content-between p-3 mb-5 border-bottom">
            <h1 class="text-white">About Section <span style="font-size:5rem; font-weight:100; margin-right:-13px;  position:relative; top:20px;">/</span><span style="font-size:5rem;font-weight:100; position:relative; color:aqua; top:20px;">/</span> <span style="color:aqua; "> ADMIN</span></h1>
            <a href="manageabout.php" type="button" class="btn  text-white btn-primary h-75 mt-2 text-center">Manage
                About Section</a>
        </div>
        <?php


        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $slug = $_POST['slug'];
            $image = $_POST['image'];
            $subtitle = $_POST['subtitle'];
            $subslug = $_POST['subslug'];
            $birthday = $_POST['birthday'];
            $website = $_POST['website'];
            $phone = $_POST['phone'];
            $city = $_POST['city'];
            $degree = $_POST['degree'];
            $email = $_POST['email'];
            $freelance = $_POST['freelance'];
            $content = $_POST['content'];

          
           

            if (
                $slug != "" && $image != "" && $subtitle != "" && $subslug != "" && $birthday != "" && $website != "" && $phone != ""
                && $city != "" && $degree != "" && $email != "" && $freelance != "" && $content != ""
            ) {
               
                    
                        $query = "INSERT INTO 
                        about( slug, image,subtitle,subslug,birthday,website,phone,city,degree,email,freelance,content)
                        VALUES('$slug', '$image','$subtitle','$subslug','$birthday','$website','$phone','$city','$degree','$email','$freelance','$content')";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            echo '<div class="alert alert-warning" role="alert">
                        Successfully added..
                    </div>';
                        } else {
                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Error sending your message! Please try again later.
                          <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        }
                    }
               
            else {
                echo ('<div class="d-flex justify-content-center"><div class="bg-warning fs-5 text-center w-50 "> Please fill all data.</div></div>');
                header("Refresh:0");
            }
        }
        ?>


        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlInput1" class="form-label text-white">Description</label>
            <input type="text" class="form-control mb-2" id="exampleFormControlInput1" name="slug">

        </div>
        <div class="mb-3 d-flex flex-column">
                    <label for="exampleFormControlInput1" class="form-label text-white">Upload Images</label>
                    <div>
                        <input type="text" id="imginput" name="image" readonly >
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          Select Image
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <style>
                                  [type=radio]:checked+img {
                                    outline: 2px solid blue;
                                  }
                                </style>
                                <?php 
                                $query="SELECT * FROM files";
                                $result=mysqli_query($conn,$query);
                                while ($data=mysqli_fetch_array($result)){
                                    ?>
                                <label>
                                    <input  style="opacity: 0;" value="<?= $data['image']; ?>" name="fileimg"  type="radio" >
                                    <img  style="width:80px;height:80px; cursor: pointer;" name="fileimg" src="../../uploads/<?= $data['image']; ?>">
                                </label>
                                <?php
                                }
                                ?>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" onclick="firstfunction()" data-bs-dismiss="modal" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <script type="text/javascript">
                        //modal auto load
                          $(window).on('load', function() {
                            // $('#exampleModal').modal('show');
                          });
                        </script>
                    </div>
                </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label text-white">Subtitle</label>
            <input type="text" class="form-control mb-2" id="exampleFormControlInput1" name="subtitle" placeholder="Illustrator & UI/UX Designer">
        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlTextarea1" class="form-label text-white">Sub-Title Detail</label>
            <textarea class="form-control  mb-4" id="" name="subslug" rows="3"></textarea>
        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlInput1" class="form-label text-white">Birthday</label>
            <input type="text" class="form-control mb-2" id="exampleFormControlInput1" name="birthday">
        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlInput1" class="form-label text-white">Website</label>
            <input type="text" class="form-control mb-2" id="exampleFormControlInput1" name="website">
        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlInput1" class="form-label text-white">Phone Number</label>
            <input type="number" class="form-control mb-2" id="exampleFormControlInput1" name="phone">
        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlInput1" class="form-label text-white">City</label>
            <input type="text" class="form-control mb-2" id="exampleFormControlInput1" name="city">
        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlInput1" class="form-label text-white">Degree</label>
            <input type="text" class="form-control mb-2" id="exampleFormControlInput1" name="degree">
        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlInput1" class="form-label text-white">Email</label>
            <input type="email" class="form-control mb-2" id="exampleFormControlInput1" name="email">
        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlInput1" class="form-label text-white">Freelance Available</label>
            <select type="select" class="form-control mb-2" id="exampleFormControlInput1" name="freelance">
                <option value=""></option>
                <option value="Available">Available</option>
                <option value="Not-Available">Not-Available</option>
            </select>
        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlInput1" class="form-label text-white">Person Detail</label>
            <input type="text" class="form-control mb-2" id="exampleFormControlInput1" name="content">
        </div>
        <button type="submit" class="btn btn-primary " value="upload file">
            Change
        </button>
    </form>
</div>
<script>
    function firstfunction() {
        var x = document.querySelector('input[name=fileimg]:checked').value;
        document.getElementById('imginput').value = x;
    }
    
</script>
<?php
require('../inc/footer.php')
?>