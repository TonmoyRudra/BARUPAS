<!--============================= HEADER =============================-->
<?php
include('config.php');
include('header.php');
include('./include/public_fuction.php');
// fetch single published notices by slug
$noitces = getPublishedNotices();

if (isset($_SESSION["user"])) {
    $user = $_SESSION['user'];
} else {
    $_SESSION['user']['user_role'] = 'user';
    $user = $_SESSION['user'];
}

?>
<!--============================= HEADER =============================-->

<section class="light-bg booking-details_wrap">
    <div class="styled-heading">
        <h3> নোটিশ বোর্ড </h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 responsive-wrap" style="text-align: justify;">
                <div class="booking-checkbox_wrap mt-4">
                    <div class="customer-review_wrap" style="height: 600px;overflow-y: auto;overflow-x: hidden;">
                        <!-- <div class="customer-img">
                            <img src="images/dummy_profilePhoto.jpg" style="width: 250px;" class="img-fluid" alt="#">
                        </div> -->
                        <div class="" style="margin: 0;">

                            <?php foreach ($noitces as $notice) : ?>
                                <div class="row">
                                    <div class="container-fluid">
                                        <div style="background:white;padding-top:1px;padding-bottom:1px;padding-left:2px;border-bottom:1px solid #d5d5d5;">
                                            <div style="padding:0px;" class="col-sm-3 col-md-3 col-lg-3 col-xs-3 float-left">
                                                <div style="background:linear-gradient(to bottom, #005C25 0%,#3B5998 100%);" class="tuyin_n">
                                                    <div class="date_name"><?php echo date("j F", strtotime($notice["created_time"])); ?></div>
                                                    <div class='year_name'><?php echo date("Y ", strtotime($notice["created_time"])); ?></div>
                                                </div>
                                            </div>
                                            <div style="padding-left:2px;padding-right:0px;" class="col-sm-9 col-md-9 col-lg-9 col-xs-9 float-left">
                                                <div style="margin-top: 6px;font-size: 18px;">
                                                    <a href="<?php echo BASE_URL . 'noticeDetails.php?slug=' . $notice["slug"] ?>" style="color:brown;font-weight:bold;"><?php echo $notice['title'] ?></a>
                                                </div>
                                            </div>
                                            <div style="clear:both;"></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--============================= FOOTER =============================-->
<?php
include('footer.php')
?>
<!--//END FOOTER -->