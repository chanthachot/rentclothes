<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('header.php'); ?>
<body>
    <?php include('navbar.php'); ?>
    
    <?php include('bottombar.php'); ?>

    <!-- Product List Start -->
    <div class="product-view">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">

                        <?php
                        $q = $_GET['q'];
                        if ($q != '') {
                            include("show_product_q.php");
                        } else {
                            include('show_product.php');
                        }
                        ?>
                    </div>
                </div>

                <?php include('sidebar.php'); ?>
            </div>
        </div>
    </div>

    <!-- Product List End -->

    <?php include('footer.php'); ?>
</body>

</html>