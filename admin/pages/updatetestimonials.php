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
            <h1 class="text-white">Testimonials Section <span style="font-size:5rem; font-weight:100; margin-right:-13px;  position:relative; top:20px;">/</span><span style="font-size:5rem;font-weight:100; position:relative; color:aqua; top:20px;">/</span> <span style="color:aqua; "> ADMIN</span></h1>
            <a href="managetestimonials.php" type="button" class="btn  text-white btn-primary h-75 mt-2 text-center">Manage
                Testimonials </a>
        </div>
        <?php


        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $image = $_POST['image'];
            $name = $_POST['name'];
            $profession = $_POST['profession'];
            $detail = $_POST['detail'];
           $id = $_GET['id'];
            if (
                $image != "" && $name != "" && $profession != "" && $detail != "" ) {
                        $query = "UPDATE testimonials SET image='$image', name='$name',profession='$profession',detail='$detail' where id = '$id'";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Successfully added..
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        } else {
                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Error sending your message! Please try again later.
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
        if(isset($_GET['id'])){
            $id= $_GET['id'];
        
            $select_data="SELECT * FROM testimonials WHERE id=$id";
            $result1=mysqli_query($conn, $select_data);
            $data1=mysqli_fetch_assoc($result1);
        }
        ?>


        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlInput1" class="form-label text-white"><strong>Profile Image :</strong></label>
            <div class="d-flex">
                <input type="text" class="form-control h-50 w-75 me-1 mt-1" id="imginput" value="<?=$data1['image']; ?>" name="image" >

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary h-50" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                                $query = "SELECT * FROM files";
                                $result = mysqli_query($conn, $query);
                                while ($data = mysqli_fetch_array($result)) {
                                ?>
                                      <label>
                                        <input style="opacity: 0;" name="fileimg" value="<?= $data['image']; ?>" id="img" type="radio">
                                        <img style="width:80px;height:80px; cursor: pointer;" name="fileimg" src="../../uploads/<?= $data['image']; ?>">
                                        </label>
                                        <?php
                                }
                                ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" onclick="firstFunction()" data-bs-dismiss="modal" class="btn btn-primary">Save changes</button>
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
        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlInput1" class="form-label text-white"><strong>Name :</strong></label>
            <input type="text" class="form-control mb-2" id="exampleFormControlInput1" value="<?=$data1['name']; ?>"  name="name">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label text-white"><strong>Profession</strong></label>
            <input type="text" class="form-control mb-2" id="exampleFormControlInput1" value="<?=$data1['profession']; ?>"  name="profession" >
        </div>
        <div class="mb-3 d-flex flex-column">
            <label for="exampleFormControlTextarea1" class="form-label text-white"><strong>detail :</strong></label>
            <!-- <input type="text" class="form-control mb-2"  name="detail" > -->
         <textarea name="detail" class="form-control mb-2" id="exampleFormControlInput1"> <?=$data1['detail']; ?> </textarea>
        </div>
        
        <button type="submit" class="btn btn-primary " value="upload file">
            Submit
        </button>
    </form>
</div>
<script>
    function firstFunction() {
        var x = document.querySelector('input[name=fileimg]:checked').value;
        document.getElementById('imginput').value = x;
    }
</script>
<?php
require('../inc/footer.php')
?>