<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> বারুপাস || লগইন </title>

    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/loginStyle.css" rel='stylesheet' type='text/css' media="all">

    <script>
        addEventListener("load", function () { setTimeout(hideURLbar, 0); }, false); function hideURLbar() { window.scrollTo(0, 1); }
    </script>
</head>

<body>
    <?php  
    include('../config.php'); 
    extract($_POST);
    if(isset($submit))
    {
        $result = mysqli_query($conn,"select * from users where user_name='$user_name' and password='$password'");
        $row =  mysqli_fetch_array($result, MYSQLI_ASSOC);
        if(mysqli_num_rows($result)<1){
            $userNotFound = 'আপনি ভুল নাম অথবা ভুল পাসওয়ার্ড দিয়েছেন.';

        } else if( $row["user_role"] == 'admin'){
            // $_SESSION["user"]=$user_name;
            $_SESSION['user'] = $row;

        } else{
            $userNotFound = 'দুঃখিত, আপনার এই অ্যাডমিন প্যানেলটি অ্যাক্সেস করার অনুমতি নেই।';
        }
    }
    if (isset($_SESSION["user"]))
    {
    // echo "<h1 align=center>Hye you are sucessfully login!!!</h1>";
    // header('Refresh: 2; URL = index.php');
    header("Location:./index.php");
    // header("Location: http://www.yourwebsite.com/user.php"); 
    exit;
    }
    ?>

    <h1 class="error"> বারুপাস - অ্যাডমিন লগইন ফরম</h1>
    <div class="w3layouts-two-grids">
        <div class="mid-class">
            <div class="txt-left-side">
                <h2> এইখানে লগইন করুন </h2> 
                <p style='color: #E91E63;font-weight: bold;'><?php echo !empty($userNotFound)? $userNotFound:''; ?></p>
                <form action="#" method="post">
                    <div class="form-left-to-w3l">
                        <span class="fa fa-envelope-o" aria-hidden="true"></span>
                        <input type="text" name="user_name" placeholder="উজারনেম" value='admin' required="">

                        <div class="clear"></div>
                    </div>
                    <div class="form-left-to-w3l ">

                        <span class="fa fa-lock" aria-hidden="true"></span>
                        <input type="password" name="password" placeholder="পাসওয়ার্ড" value="admin" required="">
                        <div class="clear"></div>
                    </div>
                    <!-- <div class="main-two-w3ls">
                        <div class="left-side-forget">
                            <input type="checkbox" class="checked">
                            <span class="remenber-me">Remember me </span>
                        </div>
                        <div class="right-side-forget">
                            <a href="#" class="for">Forgot password...?</a>
                        </div>
                    </div> -->
                    <div class="btnn">
                        <button type="submit" id="submit" name="submit">লগইন </button>
                    </div>
                </form>
                <div class="w3layouts_more-buttn">
                    <h3>মূল সাইটে ফিরে যেতে চান ?
                        <a href="../index.php">এইখানে ক্লিক করুন </a>
                    </h3>
                </div>
                <!-- <div class="w3layouts_more-buttn">
                    <h3>Don't Have an account..?
                        <a href="#">Register Here
                        </a>
                    </h3>
                </div> -->

            </div>
            <div class="img-right-side">
                <h3>বাংলাদেশ রুদ্রপাল সমিতি (বারুপাস)</h3>
                <p>বাংলাদেশের রুদ্রপাল সম্প্রদায়ের আর্থসামাজিক শিক্ষা ধর্ম সেবামূলক একটি অরাজনৈতিক প্রতিষ্ঠান</p>
                <img src="../images/barupas-logo-300x300.png" class="img-fluid" alt="">
            </div>
        </div>
    </div>
    <footer class="copyrigh-wthree">
    <p>Copyright &copy; 2019 বারুপাস. All rights reserved | Developed by <a href="https://www.tonmoyrudra.tk" target="_blank">Tonmoy Rudra</a></p>
    </footer>
</body>

</html>