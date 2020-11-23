<!DOCTYPE html>
<html lang="en">

<?php
session_start();
error_reporting(error_reporting() & ~E_NOTICE);

$p_id = $_GET["ID"];

if (!$_SESSION["UserID"]) {

    echo "<script>";
    echo "alert(\"กรุณาเข้าสู่ระบบก่อน\");";
    echo "window.location = 'login.php'; ";
    echo "</script>";
}

$doc = new DOMDocument();
$doc->load('backend/db/rents.xml');
$RentLists = $doc->getElementsByTagName('RentList');


?>

<head>
    <?php include('header.php'); ?>


    <style>
        label {
            float: left;
            padding-top: 5px;
            text-align: right;
        }
    </style>
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

            $cartclothesid = $clothe->getAttribute("clothesid");

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


    <div class="container" style="padding-top:50px">
        <div class="row">

            <div class="col-sm-12" style="background-color:#FFFFFF">
                </br>
                <h4>ที่อยู่จัดสั่งและตรวจสอบรายการสั่งซื้อ</h4>
                <hr>
                <div class="col-sm-12" align="center">
                    <form action="save_order.php" method="POST" name="cartform" id="cartform" role="form" class="form-horizontal">
                        <?php foreach ($RentLists as $RentList) {
                            $RentListid = $RentList->getAttribute("rentid");
                            $int = (int)$RentListid;
                            $cal = $int + 1;
                        }
                        ?>
                        <input type="hidden" name="rentlistid" value="<?php echo $cal ?>">
                        <input type="hidden" name="cartclothesid" value="<?php echo $cartclothesid ?>">
                        <input type="hidden" name="userid" value="<?php echo $_GET['userid'] ?>">

            

                        <div class="form-group">
                            <label class="col-sm-3 control-label">วันที่ยืม</label>
                            <div class="col-sm-6">
                                <input type="date" id="today" name="dateGive" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">วันที่คืน</label>
                            <div class="col-sm-6">
                                <input type="date" id="today2" name="dateReturn" class="form-control" required>
                            </div>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>รูปสินค้า</th>
                                    <th>ชื่อสินค้า</th>
                                    <th>ราคา</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php
                                        if ($image != "") {
                                            if (strpos($image, 'http') !== false) {
                                                echo "<a href='$image'>";
                                                echo " <img src='" . $image . "' width='100px' >";
                                                echo "</a>";
                                            } else {
                                                echo "<a href='backend/img/" . $image . "'>";
                                                echo "<img src='backend/img/" . $image . "' width='100px'> ";
                                                echo "</a>";
                                            }
                                        } else {
                                            echo  "<td>" . "ไม่มีรูป" . "</td> ";
                                        }
                                        ?>
                                        <!-- <img src="" > -->
                                    </td>
                                    <td>



                                        <a href="product_detail.php?ID=<?php echo $cartclothesid ?>">
                                            <?php echo $name ?>

                                        </a>
                                    </td>
                                    <td>
                                        <?php echo $price ?> บาท
                                    </td>
                                </tr>
                                <!-- Modal -->

                                <tr>
                                    <td colspan="6" style="text-align: right;">
                                        <h4>จำนวนเงินรวมทั้งหมด <?php echo $price ?> บาท</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6" style="text-align: right;">
                                        <button type="button" class="btn btn-danger">
                                            <span class="glyphicon glyphicon-circle-arrow-left"></span>
                                            ย้อนกลับ
                                        </button>
                                        <button type="submit" class="btn btn-success">
                                            <span class="glyphicon glyphicon-floppy-save"></span>
                                            บันทึกการสั่งเช่าสินค้า
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <?php include('footer.php'); ?>
</body>

</html>