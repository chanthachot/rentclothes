  <!-- Side Bar Start -->
  <?php

    $session_userid = $_SESSION["User"];
    $doc = new DOMDocument();
    $doc->load('backend/db/rents.xml');
    $clothes = $doc->getElementsByTagName("Clothe");
    $types = $doc->getElementsByTagName("Type");





    ?>

  <div class="col-lg-4 sidebar">
      <div class="sidebar-widget category">
          <nav class="navbar bg-light">
              <ul class="navbar-nav">
                  <li class="nav-item">ประเภท</a>
                  </li>
                  <?php foreach ($types as $type) {
                        $typeid = $type->getAttribute("id");
                        $type_names = $type->getElementsByTagName("type_name");
                        $type_name = $type_names->item(0)->nodeValue;
                    ?>
                      <li class="nav-item" id="type_id">
                          <a class="nav-link" href="product_category.php?ID=<?php echo $typeid ?>"><i class="fa fa-tshirt"></i><?php echo $type_name ?></a>

                      </li>
                  <?php } ?>
              </ul>
          </nav>
      </div>

      <div class="sidebar-widget widget-slider">
          <div class="sidebar-slider normal-slider">

              <?php foreach ($clothes as $clothe) {

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
                ?>
                  <div class="product-item">
                      <div class="product-title">
                          <a href="product_detail.php?ID=<?php echo $clothesid ?>"><?php echo $name ?></a>
                      </div>
                      <div class="product-image">
                          <a href="product_detail.php?ID=<?php echo $clothesid ?>">
                              <?php

                                if ($image != "") {
                                    if (strpos($image, 'http') !== false) {
                                        echo "<img src='" . $image . "' width='50px'>";
                                    } else {
                                        echo "<img src='backend/img/" . $image . "' width='50px'> ";
                                    }
                                } else {
                                    echo  "<td>" . "ไม่มีรูป" . "</td> ";
                                }
                                ?>
                          </a>
                      </div>
                      <div class="product-price">
                          <h3><?php echo $price ?> บาท</h3>
                          <a class="btn" href="product_rent.php?ID=<?php echo $clothesid ?>&userid=<?php echo $session_userid ?>"><i class="fa fa-shopping-cart"></i>เช่า</a>
                      </div>
                  </div>
              <?php } ?>


          </div>
      </div>
  </div>
  <!-- Side Bar End -->

  <script>
      var remove_typeid = document.getElementById("type_id");
      remove_typeid.remove(1);
  </script>