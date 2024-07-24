<?php
require('../config/config.php');
require('../middleware/secure.php');
require('../inc/header.php');
require('../inc/aside.php');
require('../inc/nav.php');
?>
<div style="width:80%" class="container bg-dark px-5 pb-5 m-5  shadow ">
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="d-flex justify-content-between pb-3 mb-5 border-bottom">
            <h2 class="text-white">File Section <span style="font-size:5rem; font-weight:100; margin-right:-13px;  position:relative; top:20px;">/</span><span style="font-size:5rem;font-weight:100; position:relative; color:aqua; top:20px;">/</span> <span style="color:aqua; "> ADMIN</span></h2>
            <a href="managefiles.php" type="button" class="btn  text-white btn-primary h-75 mt-5 text-center">Manage
               file Section</a>
        </div>
        <?php


        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $title = $_POST['title'];
            $image = $_FILES['image'];



            //  print_r( $_FILES);  // For testing purposes only!
            // $file = $_POST['file'];
            $tempname = $_FILES["image"]["tmp_name"];
            $filesize = $_FILES['image']['size'];
            $filename = $_FILES["image"]["name"];
            $explode_value = explode('.', $filename);
            $firstname = strtolower($explode_value[0]);
            $ext = strtolower($explode_value[1]);
            $finalname = str_replace(' ', '', substr($firstname, 0, 9) . "-" . time() . '.' . $ext);

            // $folder = "uploads/" . $finalname;

            if (
                $title != "" && $image != "" ) {
                if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {
                    if (move_uploaded_file($tempname, "../../uploads/".$finalname)) {
                        $query = "INSERT INTO 
                        files( title, image)
                        VALUES('$title', '$finalname')";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                           echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                           Successfully Added.
                           <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                         </div>';
                        } else {
                            echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                            Error Adding! Please try again later.
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                         </div>';
                        }
                    }
                } else {
                    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Please insert .jpg , .png , .jpeg format image.                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                         </div>';
                   
                }
            } else {
                echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
                Please fill all data.
                                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
             </div>';
            }
        }
        ?>


        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlInput1" class="form-label text-white">Title</label>
            <input type="text" class="form-control mb-2" id="exampleFormControlInput1" name="title">
        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlInput1" class="form-label text-white">Upload Images</label>
            <input type="file" class="form-control mb-2" id="exampleFormControlInput1" name="image">
        </div>
        <button type="submit" class="btn btn-primary " value="upload file">
            Upload here
        </button>
    </form>
</div>
<?php
require('../inc/footer.php')
?>