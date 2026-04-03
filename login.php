<?php
include("header.php");
?>


<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4 animated slideInDown">Login</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Login</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->


<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="section-title bg-white text-center text-primary px-3">Login</p>
            <!-- <h1 class="mb-5">If You Have Any Query, Please Contact Us</h1> -->
        </div>
        <div class="row g-5 justify-content-center">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <!-- <h3 class="mb-4">Need a functional contact form?</h3>
                    <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p> -->
                <form method="POST">
                    <div class="row g-3  ">

                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control" id="name" placeholder="Your Name">
                                <label for="name">Your Email</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control" id="name" placeholder="Your Name">
                                <label for="name">Your Password</label>
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

include("footer.php");
?>


<?php

echo "before";

if (isset($_POST["btn"])) {

echo "After";

    $email = $_POST['email'];
    $password = $_POST['password'];

    echo $email;
    echo $password;
}


?>