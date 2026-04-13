<?php
include("adminheader.php");
?>

<div class="container-fluid page-header py-5 mb-5">
    <div class="container text-center py-5">
        <h1 class="display-3 text-white mb-4">Add Product</h1>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">

        <div class="text-center mx-auto" style="max-width: 500px;">

            <?php if (isset($_REQUEST['msg'])) { ?>
                <p class="alert alert-success"><?php echo $_REQUEST['msg'] ?></p>
            <?php } ?>

            <?php if (isset($_REQUEST['err'])) { ?>
                <p class="alert alert-danger"><?php echo $_REQUEST['err'] ?></p>
            <?php } ?>

            <p class="section-title bg-white text-center text-primary px-3">Add Product</p>
        </div>

        <div class="row g-5 justify-content-center">
            <div class="col-lg-6">

                <form method="POST" enctype="multipart/form-data">
                    <div class="row g-3">

                        <!-- Category Dropdown -->
                        <div class="col-md-12">
                            <div class="form-floating">



                           
                                <!-- <input type="text" name="category_id" class="form-control"> -->

                                <select class="form-control" name="category_id" id="">
                                    <option value="">Choose one</option>

                                    <?php
                                        include("../config.php");
                                        $query = "SELECT * FROM `category` ";
                                        $result = mysqli_query($db, $query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <option value=<?php echo $row['id'] ?>><?php echo $row['name'] ?></option>

                                    <?php
                                        }
                                    ?>

                                </select>
                                
                                <label>Category</label>
                            </div>
                        </div>

                        <!-- Product Name -->
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="product_name" class="form-control">
                                <label>Product Name</label>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="description" class="form-control">
                                <label>Description</label>
                            </div>
                        </div>

                        <!-- Price -->
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="number" name="price" class="form-control">
                                <label>Price</label>
                            </div>
                        </div>

                        <!-- Image -->
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="file" name="image" class="form-control">
                                <label>Image</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <button name="btn" class="btn btn-secondary rounded-pill py-3 px-5" type="submit">
                                Submit
                            </button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<?php include("adminfooter.php"); ?>


<?php
if (isset($_POST['btn'])) {

    $category_id = $_POST['category_id'];
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $image = $_FILES['image'];
    $image_name = $image['name'];
    $tmp_name = $image['tmp_name'];

    $new_name = rand() . $image_name;

    include("../config.php");

    $query = "INSERT INTO products (category_id, product_name, description, price, image) 
              VALUES ('$category_id','$product_name','$description','$price','$new_name')";

    $result = mysqli_query($db, $query);

    move_uploaded_file($tmp_name, "../upload/" . $new_name);

    if ($result) {
        echo "<script>window.location.assign('AddProducts.php?msg=Product Added Successfully')</script>";
    } else {
        echo "<script>window.location.assign('AddProducts.php?err=Product Not Added')</script>";
    }
}
?>