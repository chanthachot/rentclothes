<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<?php
$doc = new DOMDocument();
$doc->load('db/rents.xml');
$clothes = $doc->getElementsByTagName('Clothe');
$types = $doc->getElementsByTagName("Type");

?>

<div class="container">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-7"> <br />
      <h4 align="center">เพิ่มสินค้า</h4>
      <hr />
      <form name="addproduct" action="product_form_add_db.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <?php foreach ($clothes as $clothe) {
          $clothesid = $clothe->getAttribute("clothesid");
          $int = (int)$clothesid;
          $cal = $int + 1;
        ?>
        <?php
        } ?>
        <input type="hidden" name="id" class="form-control" value="<?php echo $cal ?>" />
        <div class="form-group">
          <div class="col-sm-8">
            <p>ชื่อสินค้า</p>
            <input type="text" name="name" class="form-control" required placeholder="ชื่อสินค้า" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-8">
            <p>ราคา</p>
            <input type="number" name="price" class="form-control" required placeholder="ราคา" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-8">
            <p>ไซส์</p>
            <input type="text" name="size" class="form-control" required placeholder="ไซส์" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-8">
            <p>สี</p>
            <input type="text" name="color" class="form-control" required placeholder="สี" />
          </div>
        </div>


        <div class="form-group">
          <div class="col-sm-6">
            <p>ประเภทสินค้า</p>
            <select name="type_id" id="type_id" class="form-control" required>
              <option value="type_id" selected="true" disabled="disabled">ประเภทสินค้า</option>
              <?php foreach ($types as $type) {
                $typeid = $type->getAttribute("id");
                $type_names = $type->getElementsByTagName("type_name");
                $type_name = $type_names->item(0)->nodeValue;
              ?>
                <option value="<?php echo $typeid; ?>">
                  <?php echo $type_name ?>
                </option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <p>รายละเอียดสินค้า</p>
            <textarea class="form-control" id="description" name="description" rows="5" cols="50"></textarea>
          </div>
        </div>
        <div class="form-group">

          <div class="col-sm-12">
            <p>รูปสินค้า</p>
            <input type="file" name="p_img" id="p_img" class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-danger" name="btnadd">บันทึก</button>

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