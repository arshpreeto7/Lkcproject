<?php
include("adminheader.php");
?>


<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">Add Cateogry</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Cateogry</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">

        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">

            <?php
            if (isset($_REQUEST['msg'])) {
            ?>
            <p class="alert alert-success"><?php echo $_REQUEST['msg'] ?></p>

            <?php
            }
            ?>

             <?php
            if (isset($_REQUEST['err'])) {
            ?>
            <p class="alert alert-danger"><?php echo $_REQUEST['err'] ?></p>

            <?php
            }
            ?>


            <br>
            <p class="section-title bg-white text-center text-primary px-3">Add Cateogry</p>
            <!-- <h1 class="mb-5">If You Have Any Query, Please Contact Us</h1> -->
        </div>
        <div class="row g-5 justify-content-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <!-- <h3 class="mb-4">Need a functional contact form?</h3>
                    <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p> -->
                <form method="POST" enctype="multipart/form-data">
                    <div class="row g-3  ">

                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="CateName" class="form-control" id="name" placeholder="Your Name">
                                <label for="name">Category Name</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="CateDescription" class="form-control" id="name" placeholder="Your Name">
                                <label for="name">Description</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="file" name="Image" class="form-control" id="name" placeholder="Your Name">
                                <label for="name">Image</label>
                            </div>
                        </div>



                        <div class="col-12">
                            <button name="btn" class="btn btn-secondary rounded-pill py-3 px-5" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- Contact End -->


<?php

include("adminfooter.php");
?>


<?php

if (isset($_POST['btn'])) {

    $cateName = $_POST['CateName'];
    $CateDescription = $_POST['CateDescription'];
    $Image = $_FILES['Image'];

    // print_r($Image);

    $Image_name=$Image['name'];
    $tmp_name=$Image['tmp_name'];

    // echo $Image_name;
    // echo $tmp_name;


    $new_name=rand().$Image_name;

    // echo $new_name;

    include("../config.php");

    $query = "INSERT INTO `category`( `name`, `description`, `image`) VALUES ('$cateName','$CateDescription','$new_name')";

    $result = mysqli_query($db, $query);

    //    print_r($result);
    move_uploaded_file($tmp_name,"../upload/".$new_name);
    if ($result) {


        echo "<script>window.location.assign('addCategory.php?msg=Category added Successfull')</script>";
    } else {
        echo "<script>window.location.assign('addCategory.php?err=Category Not added')</script>";
    }
}


?>