<?php include('header.php'); ?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <?php error_reporting(error_reporting() & ~E_NOTICE); ?>
      <?php include('navbar.php'); ?>
    </header>
    <?php include('menu_left.php'); ?>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          จัดการรายการเช่าสินค้า
        </h1>

      </section>
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">

              <div class="box-body">
                <div class="col-sm-8">

                  <?php

                    include('rentlist.php');

                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


    </div>
    <?php include('footer.php'); ?>