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
            <h1 class="text-white">Home Section <span style="font-size:5rem; font-weight:100; margin-right:-13px;  position:relative; top:20px;">/</span><span style="font-size:5rem;font-weight:100; position:relative; color:aqua; top:20px;">/</span> <span style="color:aqua; "> ADMIN</span></h1>
            <a href="managesiteconfig.php" type="button" class="btn  text-white btn-primary h-75 mt-2 text-center">Manage
                Siteconfig Section</a>
        </div>
        <?php

        $query = " SELECT * FROM siteconfig";
        $result = mysqli_query($conn, $query);
        $data = mysqli_fetch_assoc($result);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $sitekey = $_POST['sitekey'];
            $sitevalue = $_POST['sitevalue'];


            if (
                $sitekey != "" && $image != ""
            ) {


                $query = "INSERT INTO 
                        siteconfig( sitekey, sitevalue)
                        VALUES('$sitekey', '$sitevalue')";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    echo '<div class="alert alert-warning" role="alert">
                        Successfully Data Added..
                    </div>';
                } else {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Error Adding Data! Please try again later.
                          <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
            } else {
                echo ('<div class="d-flex justify-content-center"><div class="bg-warning fs-5 text-center w-50 "> Please fill all data.</div></div>');
                header("Refresh:0");
            }
        }
        ?>


        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlInput1" value="<?=$data['sitekey'];?>"  class="form-label text-white">Side key :</label>
            <input type="text" class="form-control mb-2" id="exampleFormControlInput1" name="sitekey">

        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlInput1" value="<?=$data['sitevalue'];?>" class="form-label text-white">Site Value :</label>
            <input type="text" class="form-control mb-2" id="exampleFormControlInput1" name="sitevalue">

        </div>

        <button type="submit" class="btn btn-primary " value="upload file">
            Submit
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