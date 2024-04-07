<?php
require('../config/config.php');
require('../middleware/secure.php');
require('../inc/header.php');
require('../inc/aside.php');
require('../inc/nav.php');
?>
<div style="width:40%" class="container bg-dark p-5 shadow my-5">
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="d-flex justify-content-between p-3 mb-5 border-bottom">
            <h1 class="text-white">Add Messages</h1>
            <a href="index.php" type="button" class="btn  text-white btn-primary h-75 mt-2 text-center">Show Messages</a>
        </div>
        <?php


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            //  print_r( $_FILES);  // For testing purposes only!
            // $file = $_POST['file'];
            $tempname = $_FILES["file"]["tmp_name"];
            $filesize = $_FILES['file']['size'];
            $filename = $_FILES["file"]["name"];
            $explode_value = explode('.', $filename);
            $firstname = strtolower($explode_value[0]);
            $ext = strtolower($explode_value[1]);
            $finalname = str_replace(' ', '', substr($firstname, 0, 9) . "-" . time() . '.' . $ext);

            $folder = "../assets/uploads/" . $finalname;

            if ($name != "" && $email != "" && $message != "") {
                if ($filesize < 20971520) {
                    if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {
                        if (move_uploaded_file($tempname, $folder)) {
                            $query = "INSERT INTO tasks(name, email, message,image,fname) VALUES('$name','$email','$message','$folder','$finalname')";
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
                } else {
                    echo ('<div class="bg-warnibg >Please insert image smaller then 2MB size.</div>');
                    header("Refresh:2; url=create.php");
                }
            } else {
                echo ('<div class="d-flex justify-content-center"><div class="bg-warning fs-5 text-center w-50 "> Please fill all data.</div></div>');
                header("Refresh:1; url=create.php");
            }
        }
        ?>


        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlInput1" class="form-label text-white">Service logo</label>
            <input type="file" class="form-control mb-2" id="exampleFormControlInput1" name="image">
            <img src="../assets/uploads/" alt="">

        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlInput1" class="form-label text-white">service Title</label>
            <input type="text" class="form-control mb-2" id="exampleFormControlInput1" name="title">
        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlInput1" class="form-label text-white">Content</label>
            <input type="text" class="form-control mb-2" id="exampleFormControlInput1" name="slug">
        </div>
        <button type="submit" class="btn btn-primary " value="upload file">
            Send
        </button>
    </form>
</div>
<?php
require('../inc/footer.php')
?>