<!DOCTYPE html>
<html lang="en">
<?php
session_start();
error_reporting( error_reporting() & ~E_NOTICE );
$session_userid = $_SESSION["User"];
$p_id = $_GET["ID"];
?>

<head>
    <?php include('header.php'); ?>
</head>

<body>
    <?php include('navbar.php'); ?>


    <?php
    $doc = new DOMDocument();
    $doc->load('backend/db/rents.xml');
    $clothes = $doc->getElementsByTagName("Clothe");
    $types = $doc->getElementsByTagName("Type");

    foreach ($clothes as $clothe) {
        $clothesid = $clothe->getAttribute("clothesid");
        if ($clothesid == $p_id) {

            $names = $clothe->getElementsByTagName("Name");
            $name = $names->item(0)->nodeValue;

            $prices = $clothe->getElementsByTagName("Pricee");
            $price = $prices->item(0)->nodeValue;

            $images = $clothe->getElementsByTagName("Image");
            $image = $images->item(0)->nodeValue;

            $descriptions = $clothe->getElementsByTagName("description");
            $description = $descriptions->item(0)->nodeValue;


            $sizes = $clothe->getElementsByTagName("size");
            $size = $sizes->item(0)->nodeValue;


            $colors = $clothe->getElementsByTagName("color");
            $color = $colors->item(0)->nodeValue;

            $typeidref = $clothe->getAttribute("typeid");
        }
    }

    ?>


    <!-- Product Detail Start -->
    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product-detail-top">
                        <div class="row align-items-center">
                            <div class="col-md-5">
                                <?php

                                if ($image != "") {
                                    if (strpos($image, 'http') !== false) {
                                        echo "<img src='" . $image . "' width='100%'>";
                                    } else {
                                        echo "<img src='backend/img/" . $image . "' width='100%'> ";
                                    }
                                } else {
                                    echo  "<td>" . "ไม่มีรูป" . "</td> ";
                                }
                                ?>
                            </div>
                            <div class="col-md-7">
                                <div class="product-content">
                                    <div class="title">
                                        <h2><?php echo $name ?></h2>
                                    </div>

                                    <div class="price">
                                        <h4>ราคา :</h4>
                                        <p><?php echo $price ?> บาท</p>
                                    </div>
                                    <div class="p-size">
                                        <h4>ไซส์ :</h4><?php echo $size ?>
                                    </div>
                                    <div class="p-color">
                                        <h4>สี :</h4><?php echo $color ?>

                                    </div>
                                    <div class="action">
                                        <a class="btn" href="product_rent.php?ID=<?php echo $p_id ?>&userid=<?php echo $session_userid ?>"><i class="fa fa-shopping-cart"></i>เช่า</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row product-detail-bottom">
                        <div class="col-lg-12">
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill">คำอธิบาย</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="description" class="container tab-pane active">
                                    <h4>คำอธิบายสินค้า</h4>
                                    <p>
                                        <?php echo $description ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>

                <?php include('sidebar.php'); ?>
            </div>
        </div>
    </div>
    <!-- Product Detail End -->
    <?php include('footer.php'); ?>
</body>

</html>