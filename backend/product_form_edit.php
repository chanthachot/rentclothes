<meta charset="UTF-8">
<?php

$get_clothesid = $_GET["ID"];

$doc = new DOMDocument();
$doc->load('db/rents.xml');
$clothes = $doc->getElementsByTagName("Clothe");
$types = $doc->getElementsByTagName("Type");

foreach ($clothes as $clothe) {
  $clothesid = $clothe->getAttribute("clothesid");
  if ($clothesid == $get_clothesid) {
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

        $type_names = $type->getElementsByTagName("type_name");
        $type_name = $type_names->item(0)->nodeValue;
      }
    }

    break;
  }
}


?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<div class="container">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-7"> <br />
      <h4 align="center">แก้ไขสินค้า</h4>
      <hr />
      <form name="addproduct" action="product_form_edit_db.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <input type="hidden" name="get_clothesid" value="<?php echo $get_clothesid; ?>" />
        <input type="hidden" name="image" value="<?php echo $image; ?>" />
        <div class="form-group">
          <div class="col-sm-8">
            <p>ชื่อสินค้า</p>
            <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" required placeholder="ชื่อสินค้า" />
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-8">
            <p>ราคา</p>
            <input type="text" name="price" value="<?php echo $price; ?>" class="form-control" required placeholder="ชื่อสินค้า" />
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-8">
            <p>ไซส์</p>
            <input type="text" name="size" value="<?php echo $size; ?>" class="form-control" required placeholder="ชื่อสินค้า" />
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-8">
            <p>สี</p>
            <input type="text" name="color" value="<?php echo $color; ?>" class="form-control" required placeholder="ชื่อสินค้า" />
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-6">
            <p>ประเภทสินค้า</p>
            <select name="type_id" id="type_id" class="form-control" required>
              <option value="<?php echo $typeidref; ?>" selected="true" disabled="disabled">
                <?php echo $type_name; ?>
              </option>
              <?php foreach ($types as $type) {
                $typeid = $type->getAttribute("id");
                $type_names = $type->getElementsByTagName("type_name");
                $type_name = $type_names->item(0)->nodeValue;

              ?>
                <option value="<?php echo $typeid; ?>">
                  <?php echo $type_name; ?>
                </option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-12">
            <p>รายละเอียดสินค้า</p>
            <textarea class="form-control" id="description" name="description" rows="5" cols="0"><?php echo $description; ?></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <p>รูปสินค้า</p>
            <img src="img/<?php echo $image; ?>" width="100px">
            <br>
            <br>
            <input type="file" name="p_img" id="p_img" class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">

            <button type="submit" class="btn btn-success" name="btnadd">แก้ไข</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
<script>
  var remove_typeid = document.getElementById("type_id");
  remove_typeid.remove(1);
</script>