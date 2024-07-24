<?php
require('../config/config.php');
require('../middleware/secure.php');
require('../inc/header.php');
require('../inc/aside.php');
require('../inc/nav.php');
?>
<div class="p-4">
    <div style="width:80%" class="container bg-dark px-5 py-3 m-5   shadow ">
        <form action="#" method="POST" enctype="multipart/form-data">
            <div class="d-flex justify-content-between pb-1 mb-2 border-bottom">
                <h1 class="text-white">Skills Section <span style="font-size:5rem; font-weight:100; margin-right:-13px;  position:relative; top:20px;">/</span><span style="font-size:5rem;font-weight:100; position:relative; color:aqua; top:20px;">/</span> <span style="color:aqua; "> ADMIN</span></h1>
                <a href="manageskills.php" type="button" class="btn  text-white btn-primary h-75 mt-4 text-center">Manage
                    Skills Section</a>
            </div>
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $query1 = "SELECT * FROM skills WHERE id ='$id'";
                $result1 = mysqli_query($conn, $query1);
                $data1 = mysqli_fetch_assoc($result1);
            }
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $title = $_POST['title'];
                $detail = $_POST['detail'];
                $id = $_GET['id'];
                if ($detail != "") {
                    $query = "UPDATE skills SET title='$title',detail='$detail' WHERE id='$id'";
                    $result = mysqli_query($conn, $query);
                    if ($result) {
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Sucessfully Added.                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    } else {
                        echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    ERROR Adding, Please Try Again.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    }
                } else {
                    echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
                   Please fill all the fields.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            }

            

            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="d-flex my-4 ">
                    <label for="" class="text-white me-3 fs-5 pt-2">TITLE :</label>
                    <input type="text" value='<?= $data1['title']; ?>' name="title" readonly />
                </div>
                <div class="d-flex ">
                    <label for="" class="text-white fs-5 pt-2 me-3"><strong>Qualification Ratio</strong>(0% ~ 100%) <strong>: </strong></label>
                    <input type="number" min="0" max="100" class="form-control w-25  " value="<?= $data1['detail']; ?>" name="detail" id="" aria-describedby="helpId">
                </div>
                <button type="submit" class="btn btn-primary mt-4">Change</button>
            </form>
    </div>

</div>
<?php
require('../inc/footer.php')
?>