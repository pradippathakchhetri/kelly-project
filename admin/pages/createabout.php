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
            <a href="manageabout.php" type="button" class="btn  text-white btn-primary h-75 mt-2 text-center">Manage About Section</a>
        </div>
        <?php


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST['title'];
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

            //  print_r( $_FILES);  // For testing purposes only!
            // $file = $_POST['file'];
            $tempname = $_FILES["image"]["tmp_name"];
            $filesize = $_FILES['image']['size'];
            $filename = $_FILES["image"]["name"];
            $explode_value = explode('.', $filename);
            $firstname = strtolower($explode_value[0]);
            $ext = strtolower($explode_value[1]);
            $finalname = str_replace(' ', '', substr($firstname, 0, 9) . "-" . time() . '.' . $ext);

            $folder = "../assets/uploads/" . $finalname;

            // if ($name != "" && $email != "" && $message != "") {
            if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {
                if (move_uploaded_file($tempname, $folder)) {
                    $query = "INSERT INTO about(title,slug,image, subtitle, subslug, birthday,website, phone, city, degree, email, freelance, content) VALUES('$title','$slug','$image', '$subtitle', '$subslug', '$birthday','$website', '$phone', '$city', '$degree', '$email', '$freelance', '$content')";
                    $result = mysqli_query($conn, $query);

                    if ($result) {

                        header("Refresh:0; url=index.php?msg=sent");
                    } else {
                        echo ('<div>Error sending your message! Please try again later.</div>');
                        header("Refresh:2; url=create.php");
                    }
                }
            } else {
                echo ('<div class="bg-warning text-white ">Please insert .jpg , .png , .jpeg format image.</div>');
                header("Refresh:2; url=create.php");
            }


            //     } else {
            //         echo ('<div class="d-flex justify-content-center"><div class="bg-warning fs-5 text-center w-50 "> Please fill all data.</div></div>');
            //         header("Refresh:1; url=create.php");
            //     }

        }
        ?>


        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlInput1" class="form-label text-white">Title</label>
            <input type="text" class="form-control mb-2" id="exampleFormControlInput1" placeholder="About" name="title">
        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlTextarea1" class="form-label text-white">Title Detail</label>
            <textarea class="form-control  mb-4" id="" name="slug" rows="3"></textarea>

        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlInput1" class="form-label text-white">Upload Images</label>
            <input type="file" class="form-control mb-2" id="exampleFormControlInput1" name="image">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label text-white">Subtitle</label>
            <input type="email" class="form-control mb-2" id="exampleFormControlInput1" name="subtitle" placeholder="Illustrator & UI/UX Designer">
        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlTextarea1" class="form-label text-white">Sub-Title Detail</label>
            <textarea class="form-control  mb-4" id="" name="subslug" rows="3"></textarea>
        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlInput1" class="form-label text-white">Birthday</label>
            <input type="text" class="form-control mb-2" id="exampleFormControlInput1" placeholder="About" name="birthday">
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
            <input type="text" class="form-control mb-2" id="exampleFormControlInput1" name="freelance">
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
<?php
require('../inc/footer.php')
?>