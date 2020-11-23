<!DOCTYPE html>
<html lang="en">
<?php

$id = $_GET["ID"];
?>

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


                        $doc = new DOMDocument();
                        $doc->load('backend/db/rents.xml');
                        $clothes = $doc->getElementsByTagName("Clothe");
                        $types = $doc->getElementsByTagName("Type");

                        foreach ($clothes as $clothe) {



                            $clothesid = $clothe->getAttribute("clothesid");

                            $names = $clothe->getElementsByTagName("Name");
                            $name = $names->item(0)->nodeValue;

                            $prices = $clothe->getElementsByTagName("Pricee");
                            $price = $prices->item(0)->nodeValue;

                            $images = $clothe->getElementsByTagName("Image");
                            $image = $images->item(0)->nodeValue;


                            $sizes = $clothe->getElementsByTagName("size");
                            $size = $sizes->item(0)->nodeValue;


                            $descriptions = $clothe->getElementsByTagName("description");
                            $description = $descriptions->item(0)->nodeValue;

                            $colors = $clothe->getElementsByTagName("color");
                            $color = $colors->item(0)->nodeValue;

                            $typeidref = $clothe->getAttribute("typeid");

                            foreach ($types as $type) {
                                $typeid = $type->getAttribute("id");
                                if ($typeidref == $typeid) {
                                    if ($typeid == $id) {

                                        $type_names = $type->getElementsByTagName("type_name");
                                        $type_name = $type_names->item(0)->nodeValue;



                        ?>

                                        <div class="col-md-4">
                                            <div class="product-item" id="product-item">
                                                <div class="product-title">
                                                    <a href="product_detail.php?ID=<?php echo $clothesid ?>"><?php echo $name ?></a>
                                                </div>
                                                <div class="product-image">
                                                    <a href="product_detail.php?ID=<?php echo $clothesid ?>">
                                                        <?php

                                                        if ($image != "") {
                                                            if (strpos($image, 'http') !== false) {
                                                                echo "<img src='" . $image . "' alt='Product Image'>";
                                                            } else {
                                                                echo "<img src='backend/img/" . $image . "' width='100%'> ";
                                                            }
                                                        } else {
                                                            echo  "<td>" . "ไม่มีรูป" . "</td> ";
                                                        }
                                                        ?>
                                                    </a>
                                                </div>
                                                <div class="product-price">
                                                    <h3><?php echo $price ?> บาท</h3>
                                                    <a class="btn" href="product_rent.php?ID=<?php echo $clothesid ?>"><i class="fa fa-shopping-cart"></i>เช่า</a>
                                                </div>
                                            </div>
                                        </div>
                        <?php
                                    }
                                }
                            }
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

<script>

</script>