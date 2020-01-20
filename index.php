<!--============================= HEADER =============================-->
<?php
        include('config.php');
        include('header.php');
        include('./include/public_fuction.php');
        // fetch all published notices
        $noitces = getPublishedNotices();
?>
<!--============================= HEADER =============================-->
<div>
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <a href="images/potter5.jpg" class="grid image-link">
                    <img src="images/potter5.jpg" class="img-fluid" alt="#">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="images/potter1.jpg" class="grid image-link">
                    <img src="images/potter1.jpg" style="width:450px; height:300px;" class="img-fluid" alt="#">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="images/potter2.jpg" class="grid image-link">
                    <img src="images/potter2.jpg" style="width:450px; height:300px;" class="img-fluid" alt="#">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="images/potter3.jpg" class="grid image-link">
                    <img src="images/potter3.jpg" style="width:450px; height:300px;" class="img-fluid" alt="#">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="images/potter4.jpg" class="grid image-link">
                    <img src="images/potter4.jpg" style="width:450px; height:300px;" class="img-fluid" alt="#">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="images/potter5.jpg" class="grid image-link">
                    <img src="images/potter5.jpg" style="width:450px; height:300px;" class="img-fluid" alt="#">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="images/potter5.jpg" class="grid image-link">
                    <img src="images/potter5.jpg" style="width:450px; height:300px;" class="img-fluid" alt="#">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="images/potter5.jpg" class="grid image-link">
                    <img src="images/potter5.jpg" style="width:450px; height:300px;" class="img-fluid" alt="#">
                </a>
            </div>
            <div class="swiper-slide">
                <a href="images/potter5.jpg" class="grid image-link">
                    <img src="images/potter5.jpg" style="width:450px; height:300px;" class="img-fluid" alt="#">
                </a>
            </div>

        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination swiper-pagination-white"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>
</div>
<!--============================= FIND PLACES =============================-->
<section class="main-block">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="styled-heading" style="color:black;">
                    <h1>বাংলাদেশ রুদ্রপাল সমিতি (বারুপাস)</h1>
                    <h5>বাংলাদেশের রুদ্রপাল সম্প্রদায়ের আর্থসামাজিক শিক্ষা ধর্ম সেবামূলক একটি অরাজনৈতিক প্রতিষ্ঠান</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!--//END FIND PLACES -->
<!--============================= FEATURED PLACES =============================-->
<!-- <section class="main-block light-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="styled-heading">
                        <h3>Featured Places</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 featured-responsive">
                    <div class="featured-place-wrap">
                        <a href="detail.html">
                            <img src="images/featured1.jpg" class="img-fluid" alt="#">
                            <span class="featured-rating-orange">6.5</span>
                            <div class="featured-title-box">
                                <h6>Burger & Lobster</h6>
                                <p>Restaurant </p> <span>• </span>
                                <p>3 Reviews</p> <span> • </span>
                                <p><span>$$$</span>$$</p>
                                <ul>
                                    <li><span class="icon-location-pin"></span>
                                        <p>1301 Avenue, Brooklyn, NY 11230</p>
                                    </li>
                                    <li><span class="icon-screen-smartphone"></span>
                                        <p>+44 20 7336 8898</p>
                                    </li>
                                    <li><span class="icon-link"></span>
                                        <p>https://burgerandlobster.com</p>
                                    </li>

                                </ul>
                                <div class="bottom-icons">
                                    <div class="closed-now">CLOSED NOW</div>
                                    <span class="ti-heart"></span>
                                    <span class="ti-bookmark"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 featured-responsive">
                    <div class="featured-place-wrap">
                        <a href="detail.html">
                            <img src="images/featured2.jpg" class="img-fluid" alt="#">
                            <span class="featured-rating-green">9.5</span>
                            <div class="featured-title-box">
                                <h6>Joe’s Shanghai</h6>
                                <p>Restaurant </p> <span>• </span>
                                <p>3 Reviews</p> <span> • </span>
                                <p><span>$$$</span>$$</p>
                                <ul>
                                    <li><span class="icon-location-pin"></span>
                                        <p>1301 Avenue, Brooklyn, NY 11230</p>
                                    </li>
                                    <li><span class="icon-screen-smartphone"></span>
                                        <p>+44 20 7336 8898</p>
                                    </li>
                                    <li><span class="icon-link"></span>
                                        <p>https://burgerandlobster.com</p>
                                    </li>

                                </ul>
                                <div class="bottom-icons">
                                    <div class="closed-now">CLOSED NOW</div>
                                    <span class="ti-heart"></span>
                                    <span class="ti-bookmark"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4 featured-responsive">
                    <div class="featured-place-wrap">
                        <a href="detail.html">
                            <img src="images/featured3.jpg" class="img-fluid" alt="#">
                            <span class="featured-rating">3.2</span>
                            <div class="featured-title-box">
                                <h6>Tasty Hand-Pulled Noodles</h6>
                                <p>Restaurant </p> <span>• </span>
                                <p>3 Reviews</p> <span> • </span>
                                <p><span>$$$</span>$$</p>
                                <ul>
                                    <li><span class="icon-location-pin"></span>
                                        <p>1301 Avenue, Brooklyn, NY 11230</p>
                                    </li>
                                    <li><span class="icon-screen-smartphone"></span>
                                        <p>+44 20 7336 8898</p>
                                    </li>
                                    <li><span class="icon-link"></span>
                                        <p>https://burgerandlobster.com</p>
                                    </li>

                                </ul>
                                <div class="bottom-icons">
                                    <div class="open-now">OPEN NOW</div>
                                    <span class="ti-heart"></span>
                                    <span class="ti-bookmark"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
<!--//END FEATURED PLACES -->
<section class="light-bg booking-details_wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-8 responsive-wrap">
                <div class="booking-checkbox_wrap">
                    <div class="booking-checkbox" style="text-align: justify;color: black;">
                        <p>বাংলাদেশ রুদ্রপাল সমিতি (বারুপাস) বাংলাদেশের রুদ্রপাল সম্প্রদায়ের আর্থসামাজিক শিক্ষা ধর্ম সেবামূলক একটি অরাজনৈতিক প্রতিষ্ঠান। পুরুষানুক্রমে মৃৎশিল্পী রুদ্রপাল সম্প্রদায়ের সার্বিক উন্নয়নের জন্য এই সমিতি স্থাপিত।</p>
                        <p>রুদ্রপাল সম্প্রদায়ের সার্বিক উন্নয়নের জন্যে স্থাপিত হয়েছে বাংলাদেশ রুদ্রপাল সমিতি। সমগ্র বাংলাদেশের রুদ্রপাল সম্প্রদায়ভুক্ত সবাইকে এই সমিতির আওতায় সমবেত করে সকলের সামাজিক উন্নয়ন সাধন করাই সমিতির মূল লক্ষ্য। </p>
                        <p>বাংলাদেশ রুদ্রপাল সমিতি (বারুপাস), বাংলাদেশের রুদ্রপাল সম্প্রদায় অধ্যুষিত সকল গ্রামের রুদ্রপাল সম্প্রদায়ের জনগণের সর্বোচ্চ কেন্দ্রীয় কমিটি সাবেক মহকুমা এলাকা অনুযায়ী, সাবেক চট্টগ্রাম সদর উত্তর মহকুমার গ্রাম সমূহকে নিয়ে চট্টগ্রাম উত্তর জেলা, সাবেক সদর দক্ষিণ মহকুমা তথা পটিয়া মহকুমার গ্রাম সমূহকে নিয়ে চট্টগ্রাম দক্ষিণ জেলা এবং সাবেক কক্সবাজার মহকুমার গ্রাম সমূহকে নিয়ে কক্সবাজার জেলা রুদ্রপাল সমিতি নামে অবিহিত করা হয়। পরবর্তীতে বাংলাদেশের অন্যান্য প্রশাসনিক জেলায় বসবাসরত রুদ্রপাল সম্প্রদায়ের জন্য উক্ত জেলার নামানুসারে জেলা সমিতি গঠন করা হয় – যেমন কুমিল্লা জেলা রুদ্রপাল সমিতি, ফেনী জেলা রুদ্রপাল সমিতি ইত্যাদি ।</p>
                        <hr>
                    </div>
                </div>

                <!-- Notice Board Global -->
                <div class="booking-checkbox_wrap mt-4">
                    <h5>নোটিশ বোর্ড</h5>
                    <hr>
                    <div class="customer-review_wrap" style="height: 500px;overflow-y: auto;overflow-x: hidden;">
                        <!-- <div class="customer-img">
                            <img src="images/dummy_profilePhoto.jpg" style="width: 250px;" class="img-fluid" alt="#">
                        </div> -->
                        <div class="" style="margin: 0;">

                        <?php foreach($noitces as $notice): ?>
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
												<a href="<?php echo BASE_URL.'noticeDetails.php?slug='.$notice["slug"] ?>" style="color:brown;font-weight:bold;"><?php echo $notice['title'] ?></a>
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
                <!-- <div class="booking-checkbox_wrap mt-4">
                    <h5>34 Reviews</h5>
                    <hr>
                    <div class="customer-review_wrap">
                        <div class="customer-img">
                            <img src="images/customer-img1.jpg" class="img-fluid" alt="#">
                            <p>Amanda G</p>
                            <span>35 Reviews</span>
                        </div>
                        <div class="customer-content-wrap">
                            <div class="customer-content">
                                <div class="customer-review">
                                    <h6>Best noodles in the Newyork city</h6>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span class="round-icon-blank"></span>
                                    <p>Reviewed 2 days ago</p>
                                </div>
                                <div class="customer-rating">8.0</div>
                            </div>
                            <p class="customer-text">I love the noodles here but it is so rare that I get to come here. Tasty Hand-Pulled Noodles is the best type of whole in the wall restaurant. The staff are really nice, and you should be seated quickly. I usually get the
                                hand pulled noodles in a soup. House Special #1 is amazing and the lamb noodles are also great. If you want your noodles a little chewier, get the knife cut noodles, which are also amazing. Their dumplings are great
                                dipped in their chili sauce.
                            </p>
                            <p class="customer-text">I love how you can see into the kitchen and watch them make the noodles and you can definitely tell that this is a family run establishment. The prices are are great with one dish maybe being $9. You just have to remember
                                to bring cash.
                            </p>
                            <ul>
                                <li><img src="images/review-img1.jpg" class="img-fluid" alt="#"></li>
                                <li><img src="images/review-img2.jpg" class="img-fluid" alt="#"></li>
                                <li><img src="images/review-img3.jpg" class="img-fluid" alt="#"></li>
                            </ul>
                            <span>28 people marked this review as helpful</span>
                            <a href="#"><span class="icon-like"></span>Helpful</a>
                        </div>
                    </div>
                    <hr>
                    <div class="customer-review_wrap">
                        <div class="customer-img">
                            <img src="images/customer-img2.jpg" class="img-fluid" alt="#">
                            <p>Kevin W</p>
                            <span>17 Reviews</span>
                        </div>
                        <div class="customer-content-wrap">
                            <div class="customer-content">
                                <div class="customer-review">
                                    <h6>A hole-in-the-wall old school shop.</h6>
                                    <span class="customer-rating-red"></span>
                                    <span class="round-icon-blank"></span>
                                    <span class="round-icon-blank"></span>
                                    <span class="round-icon-blank"></span>
                                    <span class="round-icon-blank"></span>
                                    <p>Reviewed 3 months ago</p>
                                </div>
                                <div class="customer-rating customer-rating-red">2.0</div>
                            </div>
                            <p class="customer-text">The dumplings were so greasy...the pan-fried shrimp noodles were the same. So much oil and grease it was difficult to eat. The shrimp noodles only come with 3 shrimp (luckily the dish itself is cheap) </p>
                            <p class="customer-text">The beef noodle soup was okay. I added black vinegar into the broth to give it some extra flavor. The soup has bok choy which I liked - it's a nice textural element. The shop itself is really unclean (which is the case
                                in many restaurants in Chinatown) They don't wipe down the tables after customers have eaten. If you peak into the kitchen many of their supplies are on the ground which is unsettling... </p>
                            <span>10 people marked this review as helpful</span>
                            <a href="#"><span class="icon-like"></span>Helpful</a>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="col-md-4 responsive-wrap">
                <div class="follow">
                    <div class="follow-img">
                        <img src="images/dummy_profilePhoto.jpg" style="    width: 60%;" class="img-fluid" alt="#">
                        <h6 style="font-size: 16px;color: black;font-weight: 600;">অধ্যক্ষ প্রফেসর শ্রী অর্ধেন্দু বিকাশ রুদ্র</h6>
                        <span style="font-size: 13px;color: black;">চেয়ারম্যান, বারুপাস</span>
                    </div>
                    <div class="booking-checkbox" style="text-align: justify;color: black;padding-left: 10px; padding-right: 10px;">
                        <p style=" font-size: 13px;">অর্থহীন লেখা যার মাঝে আছে অনেক কিছু। 
                        হ্যাঁ, এই লেখার মাঝেই আছে অনেক কিছু। যদি তুমি মনে করো, এটা তোমার 
                        কাজে লাগবে, তাহলে তা লাগবে কাজে। নিজের ভাষায় লেখা দেখতে অভ্যস্ত হও। 
                        মনে রাখবে লেখা অর্থহীন হয়, যখন তুমি তাকে অর্থহীন মনে করো; আর লেখা 
                        অর্থবোধকতা তৈরি করে, যখন তুমি তাতে ..... </p>
                        <a href="./chairmanMessage.php">Read more</a>
                    </div>
                </div>
                <div class="contact-info">
                    <!-- <img src="images/map.jpg" class="img-fluid" alt="#"> -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8769.041567267064!2d91.79942864334218!3d22.469346963332903!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd64d0154eeb5%3A0x142b58a55273a923!2sFatehpur%20Rudrapolli!5e0!3m2!1sen!2sbd!4v1574698393928!5m2!1sen!2sbd" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    <div class="address">
                        <span class="icon-clock"></span>
                        <p> স্থাপিতঃ ১৩৯০ বাংলা </p>
                    </div>
                    <div class="address">
                        <span class="icon-location-pin"></span>
                        <p>
                            <span style="color:black; font-weight:600">কেন্দ্রীয় কার্যালয় </span><br>
                            গ্রাম – ফতেহপুর (রুদ্রপল্লী),<br>
                            ডাকঘর – মদনহাট, <br>
                            উপজেলা – হাটহাজারী,<br>
                            জেলা – চট্টগ্রাম।
                        </p>
                    </div>
                    <div class="address">
                        <span class="icon-screen-smartphone"></span>
                        <p> +৮৮ ০১৭৭৭ ৭৭৭ ৭৭৭</p>
                    </div>
                    <div class="address">
                        <span class="icon-link"></span>
                        <p>http://www.barupas.org</p>
                    </div>
                    <div class="follow" style=" margin-top: 10px;">
                    <ul class="social-counts">
                            <li>
                                <h6>৯৯+</h6>
                                <span>গ্রাম</span>
                            </li>
                            <li>
                                <h6>২৫০+</h6>
                                <span>কমিটি</span>
                            </li>
                            <li>
                                <h6>১৮০০+</h6>
                                <span>সদস্য</span>
                            </li>
                        </ul>
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


<!-- Swipper Slider JS -->
<script src="js/swiper.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 3,
        slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>
<script>
    if ($('.image-link').length) {
        $('.image-link').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    }
    if ($('.image-link2').length) {
        $('.image-link2').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    }
</script>