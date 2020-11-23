<?php include('header.php');?>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <?php error_reporting( error_reporting() & ~E_NOTICE ); ?>
      <?php include('navbar.php');?>
    </header>
    <?php include('menu_left.php');?>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
        จัดการประเภทสินค้า
        </h1>
      
      </section>
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                  <a href="type.php?act=add" class="btn btn-success"><span class="fa fa-plus-circle"> เพิ่มประเภทสินค้า</a> </h3>
              </div>
              <div class="box-body">
                <div class="col-sm-6">
                  
               
               
                <?php
                $act = $_GET['act'];
                if($act == 'add'){
                  include('type_form_add.php');
                }elseif ($act == 'edit') {
                  include('type_form_edit.php');  
                }
                else {
                  include('type_list.php');  
                }
              ?>

                 </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php include('footer.php');?>
    