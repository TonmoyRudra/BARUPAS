

<!-- header -->
<?php include('../config.php'); ?>
<?php include('./include/check_user.php') ?>  <!-- Check User login or not-->
<?php include('./header.php') ?>

<div id="wrapper">
  <!-- Sidebar -->
  <?php
  include('./leftmenu.php')
  ?>


  <div id="content-wrapper">
    <div class="container-fluid">
      <!-- Main Data -->
      <h1>Welcome to the Dashboard</h1>
        <hr>
        <p>Please choose your desire menu from the left side item.</p>


    </div>

    <!-- footer here -->
    <?php
      include('./footer.php')
    ?>
  </div>
</div>