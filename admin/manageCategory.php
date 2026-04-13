<?php
include("adminheader.php");
?>


<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">Manage Cateogry</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Cateogry</li>
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
            <!-- <p class="section-title bg-white text-center text-primary px-3">Add Cateogry</p> -->
            <!-- <h1 class="mb-5">If You Have Any Query, Please Contact Us</h1> -->
        </div>
        <div class="row g-5 justify-content-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <!-- <h3 class="mb-4">Need a functional contact form?</h3>
                    <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p> -->

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="table-primary ">
                            <th>Sno</th>
                            <th>CateName</th>
                            <th>CateDescription</th>
                            <th>Image</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $i=0;

                        include("../config.php");
                        $query = "SELECT * FROM `category` ";
                        $result = mysqli_query($db, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            // print_r($row);
                            $i++;
                            echo "<tr>
                            <td>$i</td>
                            <td>$row[name]</td>
                            <td>$row[description]</td>
                            <td><img width='100px' src='../upload/$row[image]' alt='no image' ></td>
                            <td><a href='deleteCategory.php?id=$row[id]' class='btn btn-danger'>Delete </a></td>
                            <td><a href='updatecategory.php?id=$row[id]' class='btn btn-success'>Update</a></td>
                        </tr>";
                        }

                        ?>


                    </tbody>
                </table>



            </div>

        </div>
    </div>
</div>
<!-- Contact End -->


<?php

include("adminfooter.php");
?>