
<!-- header -->
<?php include('../config.php'); ?>
<?php include('./include/check_user.php') ?>  <!-- Check User login or not-->
<?php include('./header.php'); ?>
<?php include('./include/database_query.php'); ?>


<div id="wrapper">
  <!-- Sidebar -->
  <?php
  include('./leftmenu.php')
  ?>


  <div id="content-wrapper">
    <div class="container-fluid">
      <!-- Main Data -->


    </div>

    <!-- footer here -->
    <?php
      include('./footer.php')
    ?>
  </div>
</div>