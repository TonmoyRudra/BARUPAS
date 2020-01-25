<!--============================= HEADER =============================-->
<?php
include('config.php');
include('header.php');
include('./include/public_fuction.php');

?>
<!--============================= HEADER =============================-->
<?php if(!$committee_name && !$committees): ?>
    <?php include('./404.php') ?>
<?php else : ?>
<section class="light-bg booking-details_wrap" style="height: 500px;">
    <div class="styled-heading">
        <h3> <?php echo $committee_name['type_name_bangla'] ?> </h3>
    </div>
    <div class="container">
        <div class="row">
        <?php if(!$committees): ?>
            <div style="font-size: 23px;color: #2196F3;"> কোন <?php echo $committee_name['type_name_bangla'] ?> পাওয়া যায় নি।  </div>
        <?php else : ?>
            <?php $i = 1 ?>
            <?php foreach ($committees as $committee) : ?>
                <div class="col-md-4 featured-responsive">
                    <div class="featured-place-wrap">
                        <a href="#">
                            <!-- <img src="images/featured1.jpg" class="img-fluid" alt="#"> -->
                            <span class="featured-rating-left"><?php echo $i ?></span>
                            <div class="featured-title-box">
                                <div style="font-size: 17px;font-weight: 600;color: #3F51B5;">
                                    <?php echo $committee['name']?>
                                </div>
                                <div class="bottom-icons">
                                    <div class="closed-now" style="text-align: right;">বিস্তারিত</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php $i++ ?>
                <?php endforeach ?>
        <?php endif ?>
        </div>
    </div>
</section>
<?php endif ?>
<!--============================= FOOTER =============================-->
<?php
include('footer.php')
?>
<!--//END FOOTER -->