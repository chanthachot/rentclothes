<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<?php
$doc = new DOMDocument();
$doc->load('db/rents.xml');
$types = $doc->getElementsByTagName('Type');
?>

<div class="container">
  <div class="row">

  </div>
  <div class="row">
    <div class="col-md-5">

    </div>
    <div class="col-md-8">
      <h3 align="center">เพิ่มประเภทสินค้า</h3>

      <form name="type" action="type_form_add_db.php" method="POST" id="type_name" class="form-horizontal">
        <?php foreach ($types as $type) {
          $typeid = $type->getAttribute("id");
          $int = (int)$typeid;
          $cal = $int + 1;
        ?>
        <?php
        } ?>
        <input type="hidden" name="id" class="form-control" value="<?php echo $cal ?>" />
        <div class="form-group">
          <div class="col-sm-4" align="right">ประเภทสินค้า</div>
          <div class="col-sm-4" align="left">
            <input name="type_name" type="text" required class="form-control" id="type_name" />
          </div>
        </div>



        <div class="form-group">
          <div class="col-sm-4"> </div>
          <div class="col-sm-6">
            <button type="submit" class="btn btn-danger" id="btn"></span>บันทึก</button>

          </div>

        </div>
      </form>
    </div>
  </div>

</div>