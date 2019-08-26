<?php 
    if(!$_SESSION['logged_in']){
        header("Location: /?logged_in=false");
    }
?>

<!DOCTYPE html>
<html class="op"><head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700&amp;subset=latin-ext" rel="stylesheet" type="text/css">
    <title></title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="content-language" content="lt">
    <meta charset="ISO 8859-10">
    <link rel="shortcut icon" href="../static/images/favicon.ico">

    <link href="../static/styles/jquery.ui.css" rel="stylesheet">

    <link href="../static/styles/bootstrap.css" rel="stylesheet">

    <link href="../static/styles/notifications.css" rel="stylesheet">

    <link href="../static/styles/core.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="/Content/css/main/old/ie-style.css"/>
    <![endif]-->
    
    <link href="../static/styles/TamoSession.css" media="all" rel="stylesheet" type="text/css">

    <script src="../static/scripts/jquery.js"></script>
    <script src="../static/scripts/jquery.ui.js"></script>
    <script src="../static/scripts/tamo.js"></script>
</head>

<body class="container">
    
<div class="loader " id="loader">
    <img src="../static/images/owl_gif.gif">
</div>

<style>
    .loader{
        position: fixed;
        z-index: 1000;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .loader > img{
        width: 80px;
        height: 80px;
    }
    .loader.hidden{
        animation: load 1s;
        animation-fill-mode: forwards;
    }
    .op{
        opacity: 0.6;
    }

    @keyframes load{
        100%{
            opacity: 0;
            visibility: hidden;
        }
    }
</style>

<script>
    window.addEventListener('load', function(){
        let loader = document.querySelector('.loader');
        let op = document.querySelector('.op');
        loader.classList.add('hidden');
        op.classList.remove('op');
    });
</script>

<div id="top_section" class="row">
    <div class="col-md-14">
        <div class="row top_section_back">
            <div class="col-md-10">

                <span style="vertical-align:middle;display:table-cell;height:40px;font-size:16px;font-weight:600;padding-left:15px;"><?= $school ?></span>
                <div style="vertical-align:middle;display:table-cell;height:40px;padding:0 5px 0 5px;">
                    
<div class="academic_year_section">
   
            <div class="academic_year"><span><?=$sy?> m.m.</span></div>
</div>
                </div>

            </div>
            <div class="col-md-4">

                <div class="" style="display:inline-block;height:40px;vertical-align:middle;width:100%;padding-right:15px;font-weight:600">
                    
                    <span style="float:right;line-height:40px;"> Apkrovimas:<a id="sysInfo" href="javascript:void(0);"><span class="sysinfo-text">NORMALUS</span><span id="sysinfo-icon" class="fa fa-circle" style="color: #61d462;"></span><span id="sysinfo-loading" class="hidden"><i class="fa fa-spinner fa-pulse fa-lg fa-fw"></i></span></a></span>
                </div>

            </div>
        </div>
    </div>
</div>
<div id="header_section" class="row">
    <div class="col-md-14">
        <div style="height:88px;background:white;">
            <a href="#"><img src="../static/images/logo.png" style="margin:20px 15px; display:inline-block;float:left"></a>
            <div style="height:100%;display:block;float:right;margin-right:5px;">

                
                <div class="header-box" style="display:inline-table;height:100%;">
                    <div style="display:table-cell;vertical-align:middle;">
                        <div style="display:table;height:51px;border-left:1px solid #e8e8e8;">
                            <div style="display:table-cell;vertical-align:middle;padding:0 30px;position:relative">
                                <a href="javascript:void(0);"><img style="vertical-align:middle;" src="../static/images/head.png"></a>
                                <div style="display:inline-block;vertical-align:middle;">
                                    <div style="font-size:14px;font-weight:600;"><?= $firstname.' '.$lastname ?></div>
                                    <div class="c_select_box auto_hide_button inactive">
                                        <a class="c_select_box_link" onclick="Dropdown();">
                                        <?= $role?>                                             <!--<div class="drop_icon"></div>-->
                                            <i id="arrowContainer" class="fa fa-caret-down drop_down_icon fa-lg" aria-hidden="true" style="color:#86b3cb"></i>
                                        </a>
                                        <div style="position:absolute;height:0;left:0">
                                            <div class="c_select_options hidden auto_hide dropdown-content" id="myDropdown" style="width:300px;">                                                                                                                                                    <a href="javascript:void(0);">
                                                        <div class="c_select_options_item active">

                                                           
                                                                <i class="fa fa-check fa-2x fa-fw" aria-hidden="true"></i>
                                                                <span class="role_title">

<?= $role?>                                                                    <span class="role_name">
                                                                         
                                                                    </span>
                                                                    <span class="role_details"><?= $school ?></span>
                                                                </span>
                                                        </div>
                                                    </a>

                                                <a href="../Prisijungimas/logout.php" onclick="">
                                                    <div class="c_select_options_item">
                                                            <i class="fa fa-lock fa-2x fa-fw icon_red" aria-hidden="true"></i>
                                                            <span class="role_title">Atsijungti</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="header-box" style="display:inline-table;height:100%;">
                    <div style="display:table-cell;vertical-align:middle;">
                        <div style="display:table;height:51px;border-left:1px solid #e8e8e8;">
                            <div style="display:table-cell;vertical-align:middle;padding:0 30px;position:relative">
                                <a href="javascript:void(0);">
                                    <img style="" src="../static/images/msg.png">
                                        <!--<span style="color:white;display:inline-block;font-size:11px;position:absolute;right:18px;top:0;background-color:#D63643;padding:1px 5px;border:solid 2px white;border-radius:12px;-moz-border-radius:12px;-webkit-border-radius:12px;">
                                            17
                                        </span>-->
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="session_section" class="row">
<div class="col-md-14">
            <div id="infobar" class="session_background" style="height:31px;">
                <span id="infobar_message" style="color:white;font-weight:bold;padding-left:15px;line-height:31px"></span>
                <div style="display:inline-block;float:right;">
                    <div style="border-left:solid 1px #e8e8e8;padding:0 0px 0 15px;margin-top:8px;height:15px;display:inline-block;">
                        <img src="../static/images/clock.png" style="vertical-align:top;">
                    </div>
                    <div class="tamo-session" id="timer"></div>
                </div>

            </div>
        </div>
</div>
