<?php
require('../config/config.php');
require('../middleware/secure.php');
require('../inc/header.php');
require('../inc/aside.php');
require('../inc/nav.php');
?>
<div style="width:80%" class="container bg-dark p-5 m-5  shadow ">
    <form action="#" method="POST" enctype="multipart/form-data">
        <div class="d-flex justify-content-between p-3 mb-5 border-bottom">
            <h1 class="text-white">Resume Section <span style="font-size:5rem; font-weight:100; margin-right:-13px;  position:relative; top:20px;">/</span><span style="font-size:5rem;font-weight:100; position:relative; color:aqua; top:20px;">/</span> <span style="color:aqua; "> ADMIN</span></h1>
            <a href="manageresume.php" type="button" class="btn  text-white btn-primary h-75 mt-2 text-center">Manage
                Resume </a>
        </div>
        <?php


        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $title = $_POST['title'];
           
            $topic = $_POST['topic'];
            $detail = $_POST['detail'];
           
            if (
               $title != "" && $topic != "" && $detail != "" ) {
                        $query = "INSERT INTO 
                        resume(  title,topic,detail)
                        VALUES( '$title','$topic','$detail')";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            echo '<div class="alert alert-warning" role="alert">
                        Successfully added..
                    </div>';
                        } else {
                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Error Adding Data! Please try again later.
                          <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                        </div>';
                        }
                    }
               
             else {
                echo '<div
                class="alert alert-primary alert-dismissible fade show"
                role="alert"
            >
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>
            
                Please fill all data.
            </div>';
               
                
            }
        }
        ?>


        
        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlInput1" class="form-label text-white"><strong>Title :</strong></label>
            <input type="text" class="form-control mb-2" id="exampleFormControlInput1" name="title">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label text-white"><strong>Topic</strong></label>
            <input type="text" class="form-control mb-2" id="exampleFormControlInput1" name="topic" >
        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlTextarea1" class="form-label text-white"><strong>detail :</strong></label>
            <!-- <input type="text" class="form-control mb-2"  name="detail" > -->
         <textarea name="detail" class="form-control mb-2" id="exampleFormControlInput1"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary " value="upload file">
            Submit
        </button>
    </form>
</div>
<?php
require('../inc/footer.php')
?>