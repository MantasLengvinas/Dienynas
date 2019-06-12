<?php 
ob_start();
/* Main page with two forms: sign up and log in */
require '../config/db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head><script src="//bbcdn-static.bbelements.com/scripts/ibb-async/stable/plugins/GdprCmpConsentDataProvider.js" async=""></script>
    <title>Prisijungimas</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="content-language" content="lt">
    <link rel="shortcut icon" href="../images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700" rel="stylesheet" type="text/css">
    <link href="../styles/jquery.ui.css" rel="stylesheet">

    <link href="../styles/bootstrap.css" rel="stylesheet">

    <link href="../styles/notifications.css" rel="stylesheet">

    <link href="../styles/core.css" rel="stylesheet">


    <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="/Content/css/main/old/ie-style.css"/>
    <![endif]-->
    <script type="text/javascript" async="" src="https://www.gstatic.com/recaptcha/api2/v1545073489967/recaptcha__lt.js"></script><script async="" src="https://www.google-analytics.com/analytics.js"></script><script src="https://www.google.com/recaptcha/api.js?hl=lt" async="" defer=""></script>
    
</head>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //user logging in

        require '../config/login.php';
        
    }
}
?>
<body>
    <input type="hidden" id="baseAddress" value="/">

    


<style type="text/css">
    .container_2 {
        display: block;
        position: absolute;
        height: auto;
        bottom: 0;
        top: 0;
        left: 0;
        right: 0;
    }

    .column_wrap {
        position: relative;
    }

    .col_left {
        overflow: hidden;
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        height: auto;
        display: block;
        box-sizing: border-box;
        width: 100%;
    }

    .col_right {
        position: absolute;
        right: 0;
        top: 0;
        bottom: 0;
        height: auto;
        display: block;
        box-sizing: border-box;
        width: 400px;
    }
    .login-title{
        margin:35px 0px;
        font-size:15px;
        color:#3F6877;
        font-weight:bold;
    }
    .logo-img {
        background-image:url('img/logo.png');
        background-size:cover;
        width:176px;
        height:48px;
        display:inline-block;
    }
</style>



<div class="container_2">
    
    <div id="TAMO_C1_Pixel"><script type="text/javascript">var TamoC1Ad = new Object();

TamoC1Ad.URL = 'https://dienynas.tamo.lt/Content/img/new/login_background2.jpg';
TamoC1Ad.Parameter = ''; // remove https://go.eu.bbelements.com/please/redirect/26624/1/1/2/!uwi=2732,uhe=1536,uce=1,ibbid=BBID-01-65383938986126948-15534,impressionId=d74c82c1-0e1c-46ec-919d-5a3b3f92338a,ibb_device_id=0,ip_co=35,ip_reg=11,b_w=0,b_h=0,param=913042/871420_1_? if need not clickable ad


TamoC1Ad.targetDivID = "AdnetBanner" + (Math.round(Math.random() * 100000000000));
document.write('<div id="'+ TamoC1Ad.targetDivID +'"></div>');
document.write('<script type="text/javascript" src="' + document.location.protocol + '//banners.adnetmedia.lt/js/creative/v4/Tamo/scripts/v1.0.js"><\/script>');</script><div id="AdnetBanner84819406693" style="overflow: hidden; position: absolute; left: 0px; top: 0px; bottom: 0px; height: auto; width: 100%; display: block; box-sizing: border-box;"><a><div style="background-image: url(&quot;https://dienynas.tamo.lt/Content/img/new/login_background2.jpg&quot;); background-size: cover; width: 100%; height: 100%;"></div></a></div><script type="text/javascript" src="https://banners.adnetmedia.lt/js/creative/v4/Tamo/scripts/v1.0.js"></script><script type="text/javascript">
;(new Image(1,1)).src='https://go.eu.bbelements.com/please/track/beacon/?b=1647535735&dstats=26624|1|1|2|0|215549|871420|2018-12-25|21:17:27|913042|1|0|11|44|35|11|0|0|78.62.164.117|2732|1536|1|0|1312728181||||14476028336743444|0&bsh=154404232&bts=1545769047';</script></div>
    <!--<a target="_blank" href="#"><div class="col_left" style="background:url('/Content/img/new/black_friday_logo_2.png');background-size:cover"></div></a>-->

    <div class="col_right" style="background-color:white;">

<form action="Login.php" class="full_width" id="main_form" method="post" novalidate="novalidate">            <div class="login_div" style="margin-left:10%;margin-right:10%;margin-top:100px;width:80%;text-align:center">
                <div style="text-align:center"><div class="logo-img"><img src="../images/logo.png"></div></div>
                <div style="" class="login-title">Naudotojo prisijungimas</div>

                <div class="error" style="margin:10px 0px;visibility:hidden;color:red;font-weight:bold;"></div>

                <input class="main_form_input" data-val="true" data-val-length="Naudotojo vardas negali būti ilgesnis nei 50 simbolių." data-val-length-max="50" data-val-required="Įveskite naudotojo vardą" id="UserName" name="email" placeholder="Naudotojo vardas" type="text" value="">
                <input class="main_form_input pwd_field" data-val="true" data-val-required="Įveskite slaptažodį" id="Password" name="password" placeholder="Slaptаžodis" type="password">
                <input data-val="true" data-val-required="The IsMobileUser field is required." id="isMobileUser" name="IsMobileUser" type="hidden" value="False">
                <input id="ReturnUrl" name="ReturnUrl" type="hidden" value="">


                <div style="margin-top:5px;">
                    <!--<a class="" style="width:210px;" href="/Registracija"><span>Registracija</span></a>-->
                    <button class="c_btn submit" style="width:100%;" name="login"><span>PRISIJUNGTI</span></button>
                </div>
                    <div style="margin-top:10px;padding-bottom:15px;border-bottom:solid 1px #e8e8e8;text-align:left;">
                        <span>Neturi TAMO paskyros? </span><a href="javascript:void(0);">Registruokis</a>
                    </div>
                <div style="text-align:left;"><a href="javascript:void(0);" id="unableToLogin">Nepavyksta prisijungti?</a></div>
                <div id="unableToLoginContent" class="hidden" style="text-align:left;">
                    <ul class="fa-ul">
                        <li><i class="fa fa-li fa-check"></i>Patikrinkite ar teisingai užpildėte naudotojo vardą ir slaptažodį.</li>
                        <li><i class="fa fa-li fa-check"></i>Įsitinkite, kad klaviatūroje nėra įjungtas didžiųjų raidžių režimas("CAPS LOCK").</li>
                    </ul>
                </div>
                <div style="text-align:left;"><a href="javascript:void(0);">Pamiršote prisijungimo duomenis?</a></div>

                    <div style="margin:20px 0px;font-size:13px;color:#3F6877;font-weight:bold;border-top:solid 1px #e8e8e8;padding-top:15px;">Prisijungti su</div>
                    <div style="margin-top:10px;padding-bottom:15px;border-bottom:solid 1px #e8e8e8;text-align:center;">
                            <div class="ipasas" style="display:inline-block;">
                                <a href="javascript:void(0);"><img src="../images/ipasas.png"></a>
                            </div>
                    </div>

                <div style="margin-top:20px;font-size:11px;text-align:left;">
                    <div>©2019 JML.</div>
                    <div>Visos teisės saugomos. v4.2</div>
                </div>
            </div>
</form>    </div>

</div>

    <input name="__RequestVerificationToken" type="hidden" value="0CWtXfyvtitBUlcxImK2S3rGE8fA7-Bz6BOpOVDClub4M7HJYlKgE6z0MZFJdQfP39QBGj8GuY04YMJTJPmtmX81y8MAx14uEvDbeljw-Mg1">
    <div id="modal_dialog_window" class="hidden" style="z-index:9999">

    </div>

</body>
</html>
