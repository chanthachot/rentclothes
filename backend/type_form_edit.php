<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<meta charset="UTF-8">
<?php
$get_typeid = $_GET["ID"];


$doc = new DOMDocument();
$doc->load('db/rents.xml');
$types = $doc->getElementsByTagName("Type");

foreach ($types as $type) {
  $typeid = $type->getAttribute("id");
  if ($typeid == $get_typeid) {
    $names = $type->getElementsByTagName("type_name");
    $name = $names->item(0)->nodeValue;

    break;
  }
}
?>

<div class="container">
  <div class="row">

  </div>
  <div class="row">
    <div class="col-md-5">

    </div>
    <div class="col-md-8">
      

      <form name="type" action="type_form_edit_db.php" method="POST" id="type" class="form-horizontal">
        <h3 align="center">แก้ไขประเภทสินค้า</h3></br>
        <input type="hidden" name="type_id" value="<?php echo $get_typeid; ?>" />
        <div class="form-group">
          <div class="col-sm-4" align="right">ประเภทสินค้า</div>
          <div class="col-sm-4" align="left">
            <input name="type_name" type="text" required class="form-control" id="type_name" value="<?php echo $name; ?>" placeholder="ภาษาอังกฤษหรือภาษาไทย" />
          </div>
        </div>



        <div class="form-group">
          <div class="col-sm-4"> </div>
          <div class="col-sm-6">

            <button type="submit" class="btn btn-warning" id="btn">แก้ไข</button>

          </div>

        </div>
      </form>
    </div>
  </div>
</div>