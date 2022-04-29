<?php include ('checkuser.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>NP Management System</title>
	<link href="assets/images/nplogoicon.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <!--    Google Fonts-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Pridi" rel="stylesheet">
    <!--Fontawesom-->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!--Animated CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!--Bootstrap Carousel-->
    <link type="text/css" rel="stylesheet" href="assets/css/carousel.css" />
    <link rel="stylesheet" href="assets/css/isotope/style.css">
    <!--Main Stylesheet-->
    <link href="assets/css/style.css" rel="stylesheet">
    <!--Responsive Framework-->
    <link href="assets/css/responsive.css" rel="stylesheet">
    <!--Progress Bar-->
    <link href="assets/css/progressbar.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">
	<script language="JavaScript1.2">
	function disableselect(e){
	return false
	}

	function reEnable(){
	return true
	}

	//if IE4+
	document.onselectstart=new Function ("return false")

	//if NS6
	if (window.sidebar){
	document.onmousedown=disableselect
	document.onclick=reEnable
	}

	<!--
	var message="Function Disabled!";
	///////////////////////////////////
	function clickIE() {if (document.all) {alert(message);return false;}}
	function clickNS(e) {if 
	(document.layers||(document.getElementById&&!document.all)) {
	if (e.which==2||e.which==3) {alert(message);return false;}}}
	if (document.layers) 
	{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
	else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}

	document.oncontextmenu=new Function("return false")
	// --> 
	document.ondragstart = function () { return false; };

	</script>
</head>
<body data-spy="scroll" data-target="#header">
<style>
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
    z-index: 1;
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
        <!--Start Hedaer Section-->
        <section id="header">
            <div class="header-area">
                <div class="top_header">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 zero_mp">
                                <!--<div class="address"><a href="/" target="_blank">
                                    <i class="fa fa-home floatleft"></i>
                                    <p>เข้าสู่เว็บไซต์หลัก</p></a>
                                </div>-->
                            </div>
                            <!--End of col-md-4-->
                            <!--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 zero_mp">
                                <div class="phone">
                                    <i class="fa fa-phone floatleft"></i>
                                    <p>+ 8801532-987039</p>
                                </div>
                            </div>-->
                            <!--End of col-md-4-->
                            <!--<div class="col-md-4">
                                <div class="social_icon text-right">
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                    <a href=""><i class="fa fa-google-plus"></i></a>
                                    <a href=""><i class="fa fa-youtube"></i></a>
                                </div>
                            </div>-->
                            <!--End of col-md-4-->
                        <span style="float:right;">บัญชีผู้ใช้งาน <a href="?profile=<?=$row['username'];?>"><b style="color:#f68cfa; margin-right:35px;"><?=$row['firstname'].' '.$row['surname'];?></b></a></span></div>
                        <!--End of row-->
                    </div>
                    <!--End of container-->
				</div>
<?php
$page =  @$_REQUEST['page'];
$work =  @$_REQUEST['work'];
if($page == 'vichakarn' && $work == 'guide' || 
	$work == 'guide_university' || 
	$work == 'guide_university_form' || 
	$work == 'guide_university_insertform')
{
	include 'page/vichakarn/guide_navigator.php';
}
elseif($page == 'vichakarn' && $work == 'register' || 
	$work == 'register_application_personal' || 
	$work == 'register_application_personal_edit' || 
	$work == 'register_application_personal_delete' || 
	$work == 'register_application_student' || 
	$work == 'register_application_student_edit' || 
	$work == 'register_application_student_delete')
{
	include 'page/vichakarn/register_navigator.php';
}
elseif($page == 'vichakarn')
{
	include 'page/vichakarn/index.php';
}
elseif($page == 'kitjakarn')
{
	include '';
}
elseif($page == 'borihan')
{
	include '';
}
else
{
?>
				<!--End of top header-->
                <div class="header_menu text-center" data-spy="affix" data-offset-top="50" id="nav">
                    <div class="container">
                        <nav class="navbar navbar-default zero_mp ">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand custom_navbar-brand" href="#"><img src="../images/your_logo_bk200.png" alt=""></a>
                            </div>
                            <!--End of navbar-header-->
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse zero_mp" id="bs-example-navbar-collapse-1" style="margin-right:20px;">
                                <ul class="nav navbar-nav navbar-right main_menu">
                                    <li class="active"><a href="home.php">หน้าหลัก <span class="sr-only">(current)</span></a></li>
                                    <li class="dropdown">
										<a href="?page=vichakarn">ฝ่ายวิชาการ</a>
									</li>
                                    <li class="dropdown">
										<a href="#">ฝ่ายกิจการนักเรียน</a>
										<div class="dropdown-content">
											<p><a href="#"><button style="width:100%; height:40px; background:transparent; border:0;">สถิตินักเรียน</button></a></p>
											<p><a href="#"><button style="width:100%; height:40px; background:#E9E9E9; border:0;">SDQ</button></a></p>
											<p><a href="#"><button style="width:100%; height:40px; background:transparent; border:0;">งานปกครอง</button></a></p>
											<p><a href="#"><button style="width:100%; height:40px; background:#E9E9E9; border:0;">งานกิจกรรมพิเศษ</button></a></p>
											<p><a href="#"><button style="width:100%; height:40px; background:transparent; border:0;">งานระดับชั้น</button></a></p>
											<p><a href="#"><button style="width:100%; height:40px; background:#E9E9E9; border:0;">งานรักษาความปลอดภัย</button></a></p>
										</div>
									</li>
                                    <li class="dropdown">
										<a href="#">ฝ่ายบริหารทั่วไป</a>
									  	<div class="dropdown-content">
									   		<p><a href="#"><button style="width:100%; height:40px; background:transparent; border:0;">งานบัญชี-การเงิน</button></a></p>
									   		<p><a href="#"><button style="width:100%; height:40px; background:#E9E9E9; border:0;">งานธุรการ</button></a></p>
									   		<p><a href="#"><button style="width:100%; height:40px; background:transparent; border:0;">งานบุคคลากร</button></a></p>
									   		<p><a href="#"><button style="width:100%; height:40px; background:#E9E9E9; border:0;">งานสมาคมฯ, มูลนิธิ</button></a></p>
									   		<p><a href="#"><button style="width:100%; height:40px; background:transparent; border:0;">งานประชาสัมพันธ์</button></a></p>
									   		<p><a href="#"><button style="width:100%; height:40px; background:#E9E9E9; border:0;">งานเทคโนโลยีสารสนเทศ</button></a></p>
										</div>
									</li>
                                    <li class="dropdown">
									  	<a href="#">ฝ่ายบริการ</a>
									  	<div class="dropdown-content">
									   		<p><a href="#"><button style="width:100%; height:40px; background:transparent; border:0;">งานโภชนาการ</button></a></p>
									   		<p><a href="#"><button style="width:100%; height:40px; background:#E9E9E9; border:0;">งานสุชภาพอนามัย</button></a></p>
									   		<p><a href="#"><button style="width:100%; height:40px; background:transparent; border:0;">งานอาคารสถานที่</button></a></p>
									   		<p><a href="#"><button style="width:100%; height:40px; background:#E9E9E9; border:0;">งานชุมชน</button></a></p>
										</div>
									</li>
                                    <li><a href="#">ฝ่ายธุรการ - การเงิน</a></li>
                                    <li><a href="index.php?warning=6">ออกจากระบบ</a></li>
                                </ul>
                            </div>
                            <!-- /.navbar-collapse -->
                        </nav>
                        <!--End of nav-->
                    </div>
                    <!--End of container-->
                </div>
                <!--End of header menu-->
            </div>
            <!--end of header area-->
        </section>
        <!--End of Hedaer Section-->
<?php
    $profile =  @$_REQUEST['profile'];
    if(empty($profile))
    {
?>
        <!--Start of slider section-->
        <section id="slider">
            <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <div class="slider_overlay">
                            <img src="assets/images/img2.jpg" alt="...">
                            <div class="carousel-caption">
                                <div class="slider_text">
                                    <h2 style="font-family: 'Pridi', serif;">ระบบการบริหารจัดการ</h2>
                                    <h3 style="font-family: 'Pridi', serif;">โรงเรียน</h3>
                                    <p style="font-family: 'Pridi', serif;">School Management System</p>
                                    <!--<a href="" class="custom_btn">Read  More</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of item With Active-->
                    <div class="item">
                        <div class="slider_overlay">
                            <img src="assets/images/img2.jpg" alt="...">
                            <div class="carousel-caption">
                                <div class="slider_text">
                                    <h2 style="font-family: 'Pridi', serif;">ระบบการบริหารจัดการ</h2>
                                    <h3 style="font-family: 'Pridi', serif;">โรงเรียน</h3>
                                    <p style="font-family: 'Pridi', serif;">School Management System</p>
                                    <!--<a href="" class="custom_btn">Read  More</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of Item-->
                </div>
                <!--End of Carousel Inner-->
            </div>
        </section>
        <!--end of slider section-->
<?php
    }
    else
    {}
}
if($profile != '')
{
	include 'page/profile/index.php';
}
?>
        <!--Start of welcome section-->
        <section id="welcome">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wel_header">
                            <h2>บริการของระบบ</h2>
                        </div>
                    </div>
                </div>
                <!--End of row-->
                <div class="row">
                    <div class="col-md-3">
                        <div class="item">
                            <div class="single_item">
                                <div class="item_list">
                                    <div class="welcome_icon">
                                        <i class="fa fa-calendar-check-o"></i>
                                    </div>
                                    <h4 style="font-family: 'Pridi', serif;">แจ้งจากฝ่ายวิชาการ</h4>
                                    <p style="font-family: 'Pridi', serif;">แจ้งข่าว กำหนดการ หรือระเบียบต่างๆ<br>จากฝ่ายวิชาการ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of col-md-3-->
                    <div class="col-md-3">
                        <div class="item">
                            <div class="single_item">
                                <div class="item_list">
                                    <div class="welcome_icon">
                                        <i class="fa fa-bar-chart"></i>
                                    </div>
                                    <h4 style="font-family: 'Pridi', serif;">สถิตินักเรียน</h4>
                                    <p style="font-family: 'Pridi', serif;">สถิตินักเรียน ฝ่ายกิจการนักเรียน<br>ตรวจสอบและแก้ไขสถิติการมาเรียน<br>ขาด ลา มาสาย</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of col-md-3-->
                    <div class="col-md-3">
                        <div class="item">
                            <div class="single_item">
                                <div class="item_list">
                                    <div class="welcome_icon">
                                        <i class="fa fa-file-text-o"></i>
                                    </div>
                                    <h4 style="font-family: 'Pridi', serif;">คำสั่งโรงเรียน</h4>
                                    <p style="font-family: 'Pridi', serif;">คำสั่งแต่งตั้งคณะกรรมการดำเนินงาน<br>หรือกิจกรรมต่างๆ ของโรงเรียน</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of col-md-3-->
                    <div class="col-md-3">
                        <div class="item">
                            <div class="single_item">
                                <div class="item_list">
                                    <div class="welcome_icon">
                                        <i class="fa fa-gear"></i>
                                    </div>
                                    <h4 style="font-family: 'Pridi', serif;">แจ้งปัญหาระบบ</h4>
                                    <p style="font-family: 'Pridi', serif;">ประชาสัมพันธ์จากระบบ<br>หรือแจ้งปัญหาการใช้งาน</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of col-md-3-->
                </div>
                <!--End of row-->
            </div>
            <!--End of container-->
        </section>
        <!--end of welcome section-->
        <!--Start of volunteer-->
        <section id="volunteer">
            <div class="container">
                <div class="row vol_area">
                    <div class="col-md-8">
                        <div class="volunteer_content">
                            <h3>School <span>Management System</span></h3>
                            <p style="font-family: 'Pridi', serif;">ระบบการบริหารจัดการโรงเรียน</p>
                        </div>
                    </div>
                    <!--End of col-md-8
                    <div class="col-md-3 col-md-offset-1">
                        <div class="join_us">
                            <a href="" class="vol_cust_btn">join us</a>
                        </div>
                    </div>
                    End of col-md-3-->
                </div>
                <!--End of row and vol_area-->
            </div>
            <!--End of container-->
        </section>
        <!--end of volunteer-->



<!--
        <section id="portfolio" class="text-center">
            <div class="col-md-12">
                <div class="portfolio_title">
                    <h2>our latest work</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet consectetur adipiscing elit.</p>
                </div>
            </div>

            <div class="colum">
                <div class="container">
                    <div class="row">
                        <form action="/">
                            <ul id="portfolio_menu" class="menu portfolio_custom_menu">
                                <li>
                                    <button data-filter="*" class="my_btn btn_active">Show All</button>
                                </li>
                                <li>
                                    <button data-filter=".blue, .black, .green" class="my_btn">environment</button>
                                </li>
                                <li>
                                    <button data-filter=".red, .green" class="my_btn">climate</button>
                                </li>
                                <li>
                                    <button data-filter=".blue, .yellow, .black" class="my_btn">photography</button>
                                </li>
                                <li>
                                    <button data-filter=".black" class="my_btn">species</button>
                                    
                                </li>
                                <li>
                                    <button data-filter=".black" class="my_btn">Black</button>
                                </li>
                                   
                            </ul>
                        </form>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="notes">
                                <div class="note blue">
                                    <div class="img_overlay">
                                        <p>Sun Homes, Dhaka</p>
                                    </div>
                                    <img src="img/environment.jpg" alt="">
                                </div>
                                <div class="note red">
                                    <div class="img_overlay">
                                        <p>Sun Homes, Dhaka</p>
                                    </div>
                                    <img src="img/portfolio_1.jpg" alt="">
                                </div>
                                <div class="note green">
                                    <div class="img_overlay">
                                        <p>Sun Homes, Dhaka</p>
                                    </div>
                                    <img src="img/cliemate.jpg" alt="">
                                </div>
                                <div class="note yellow">
                                    <div class="img_overlay">
                                        <p>Sun Homes, Dhaka</p>
                                    </div>
                                    <img src="img/photography.jpg" alt="">
                                </div>
                                <div class="note black">
                                    <div class="img_overlay">
                                        <p>Sun Homes, Dhaka</p>
                                    </div>
                                    <img src="img/species.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

-->

<!--
        <section id="counter">
            <div class="counter_img_overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="counter_header">
                                <h2>OUR achivement</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="counter_item text-center">
                                <div class="sigle_counter_item">
                                    <img src="img/tree.png" alt="">
                                    <div class="counter_text">
                                        <span class="counter">1542</span>
                                        <p>tree cut</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="counter_item text-center">
                                <div class="sigle_counter_item">
                                    <img src="img/hand.png" alt="">
                                    <div class="counter_text">
                                        <span class="counter">1458</span>
                                        <p>animal lost</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="counter_item text-center">
                                <div class="sigle_counter_item">
                                    <img src="img/tuhnder.png" alt="">
                                    <div class="counter_text">
                                        <span class="counter">9854</span>
                                        <p>blubs collected</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="counter_item text-center">
                                <div class="sigle_counter_item">
                                    <img src="img/cloud.png" alt="">
                                    <div class="counter_text">
                                        <span class="counter">5412</span>
                                        <p>water level</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
-->


<!--
        <section id="event">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="event_header text-center">
                            <h2>latest event</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 zero_mp">
                                <div class="event_item">
                                    <div class="event_img">
                                        <img src="img/tree_cut_1.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 zero_mp">
                                <div class="event_item">
                                    <div class="event_text text-center">
                                        <a href=""><h4>One Tree Thousand Hope</h4></a>
                                        <h6>15-16 May in Dhaka</h6>
                                        <p>Lorem ipsum dolor sit amet, consectetur adip scing elit. Lorem ipsum dolor sit amet,consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        <a href="" class="event_btn">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 zero_mp">
                                <div class="event_item">
                                    <div class="event_text text-center">
                                        <a href=""><h4>One Tree Thousand Hope</h4></a>
                                        <h6>15-16 May in Dhaka</h6>
                                        <p>Lorem ipsum dolor sit amet, consectetur adip scing elit. Lorem ipsum dolor sit amet,consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        <a href="" class="event_btn">read more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 zero_mp">
                                <div class="event_item">
                                    <div class="event_img">
                                        <img src="img/tree_cut_2.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="event_news">
                            <div class="event_single_item fix">
                                <div class="event_news_img floatleft">
                                    <img src="img/tree_cut_3.jpg" alt="">
                                </div>
                                <div class="event_news_text">
                                    <a href="#"><h4>Let’s plant 200 tree each...</h4></a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, veniam.</p>
                                </div>
                            </div>
                        </div>
                        <div class="event_news">
                            <div class="event_single_item fix">
                                <div class="event_news_img floatleft">
                                    <img src="img/tree_cut_4.jpg" alt="">
                                </div>
                                <div class="event_news_text">
                                    <a href="#"><h4>Keep your house envirome..</h4></a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, veniam.</p>
                                </div>
                            </div>
                        </div>
                        <div class="event_news">
                            <div class="event_single_item fix">
                                <div class="event_news_img floatleft">
                                    <img src="img/tree_cut_3.jpg" alt="">
                                </div>
                                <div class="event_news_text">
                                    <a href="#"><h4>Urgent Clothe Needed Needed</h4></a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, veniam.</p>
                                </div>
                            </div>
                        </div>
                        <div class="event_news">
                            <div class="event_single_item fix">
                                <div class="event_news_img floatleft">
                                    <img src="img/tree_cut_4.jpg" alt="">
                                </div>
                                <div class="event_news_text">
                                    <a href="#"><h4>One Tree Thousand Hope</h4></a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, veniam.</p>
                                </div>
                            </div>
                        </div>
                        <div class="event_news">
                            <div class="event_single_item fix">
                                <div class="event_news_img floatleft">
                                    <img src="img/tree_cut_3.jpg" alt="">
                                </div>
                                <div class="event_news_text">
                                    <a href="#"><h4>One Tree Thousand Hope</h4></a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, veniam.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section id="testimonial">
            <div class="testimonial_overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="testimonial_header text-center">
                                <h2>testimonials</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                    <section id="carousel">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="3000">
                                        <ol class="carousel-indicators">
                                            <li data-target="#fade-quote-carousel" data-slide-to="0" class="active"></li>
                                            <li data-target="#fade-quote-carousel" data-slide-to="1"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="active item">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="profile-circle">
                                                            <img src="img/tree_cut_3.jpg" alt="">
                                                        </div>
                                                        <div class="testimonial_content">
                                                            <i class="fa fa-quote-left"></i>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
                                                        </div>
                                                        <div class="testimonial_author">
                                                            <h5>Sadequr Rahman Sojib</h5>
                                                            <p>CEO, Fourder</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="profile-circle">
                                                            <img src="img/tree_cut_3.jpg" alt="">
                                                        </div>
                                                        <div class="testimonial_content">
                                                            <i class="fa fa-quote-left"></i>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
                                                        </div>
                                                        <div class="testimonial_author">
                                                            <h5>Sadequr Rahman Sojib</h5>
                                                            <p>CEO, Fourder</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="profile-circle">
                                                            <img src="img/tree_cut_3.jpg" alt="">
                                                        </div>
                                                        <div class="testimonial_content">
                                                            <i class="fa fa-quote-left"></i>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
                                                        </div>
                                                        <div class="testimonial_author">
                                                            <h5>Sadequr Rahman Sojib</h5>
                                                            <p>CEO, Fourder</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="profile-circle">
                                                            <img src="img/tree_cut_3.jpg" alt="">
                                                        </div>
                                                        <div class="testimonial_content">
                                                            <i class="fa fa-quote-left"></i>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem, veritatis nulla eum laudantium totam tempore optio doloremque laboriosam quas, quos eaque molestias odio aut eius animi. Impedit temporibus nisi accusamus.</p>
                                                        </div>
                                                        <div class="testimonial_author">
                                                            <h5>Sadequr Rahman Sojib</h5>
                                                            <p>CEO, Fourder</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>



        <section id="blog">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="latest_blog text-center">
                            <h2>latest blog</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo cum libero vitae quos eaque commodi.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="blog_news">
                            <div class="single_blog_item">
                                <div class="blog_img">
                                    <img src="img/climate_effect.jpg" alt="">
                                </div>
                                <div class="blog_content">
                                    <a href=""><h3>Climate change is affecting bird migration</h3></a>
                                    <div class="expert">
                                        <div class="left-side text-left">
                                            <p class="left_side">
                                                <span class="clock"><i class="fa fa-clock-o"></i></span>
                                                <span class="time">Aug 19, 2016</span>
                                                <a href=""><span class="admin"><i class="fa fa-user"></i> Admin</span></a>
                                            </p>
                                            <p class="right_side text-right">
                                                <a href=""><span class="right_msg text-right"><i class="fa fa-comments-o"></i></span>
                                                    <span class="count">0</span></a>
                                            </p>
                                        </div>
                                    </div>

                                    <p class="blog_news_content">Lorem ipsum dolor sit amet, consectetur adipscing elit. Lorem ipsum dolor sit amet, conse ctetur adipiscing elit. consectetur Lorem ipsum dolor sitamet, conse ctetur adipiscing elit. </p>
                                    <a href="" class="blog_link">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="blog_news">
                            <div class="single_blog_item">
                                <div class="blog_img">
                                    <img src="img/air_pollutuon.jpg" alt="">
                                </div>
                                <div class="blog_content">
                                    <a href=""><h3>How to avoid indoor air pollution?</h3></a>
                                    <div class="expert">
                                        <div class="left-side text-left">
                                            <p class="left_side">
                                                <span class="clock"><i class="fa fa-clock-o"></i></span>
                                                <span class="time">Aug 19, 2016</span>
                                                <a href=""><span class="admin"><i class="fa fa-user"></i> Admin</span></a>
                                            </p>
                                            <p class="right_side text-right">
                                                <a href=""><span class="right_msg text-right"><i class="fa fa-comments-o"></i></span>
                                                    <span class="count">0</span></a>
                                            </p>
                                        </div>
                                    </div>

                                    <p class="blog_news_content">Lorem ipsum dolor sit amet, consectetur adipscing elit. Lorem ipsum dolor sit amet, conse ctetur adipiscing elit. consectetur Lorem ipsum dolor sitamet, conse ctetur adipiscing elit. </p>
                                    <a href="" class="blog_link">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="blog_news">
                            <div class="single_blog_item">
                                <div class="blog_img">
                                    <img src="img/threat_bear.jpg" alt="">
                                </div>
                                <div class="blog_content">
                                    <a href=""><h3>Threat to Yellowstone’s grizzly bears.</h3></a>
                                    <div class="expert">
                                        <div class="left-side text-left">
                                            <p class="left_side">
                                                <span class="clock"><i class="fa fa-clock-o"></i></span>
                                                <span class="time">Aug 19, 2016</span>
                                                <a href=""><span class="admin"><i class="fa fa-user"></i> Admin</span></a>
                                            </p>
                                            <p class="right_side text-right">
                                                <a href=""><span class="right_msg text-right"><i class="fa fa-comments-o"></i></span>
                                                    <span class="count">0</span></a>
                                            </p>
                                        </div>
                                    </div>

                                    <p class="blog_news_content">Lorem ipsum dolor sit amet, consectetur adipscing elit. Lorem ipsum dolor sit amet, conse ctetur adipiscing elit. consectetur Lorem ipsum dolor sitamet, conse ctetur adipiscing elit. </p>
                                    <a href="" class="blog_link">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section id="purches">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="purches_title">Buy our wordpress theme</h2>
                    </div>
                    <div class="col-md-2 col-md-offset-4">
                        <a href="" class="purches_btn">purches</a>
                    </div>
                </div>
            </div>
        </section>



        <section id="market">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="market_area text-center">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="market_logo">
                                        <a href=""><img src="img/audiojungle.png" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="market_logo">
                                        <a href=""><img src="img/codecanyon.png" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="market_logo">
                                        <a href=""><img src="img/graphicriver.png" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="market_logo">
                                        <a href=""><img src="img/audiojungle.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="colmd-12">
                        <div class="contact_area text-center">
                            <h3>get in touch</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="office">
                            <div class="title">
                                <h5>our office info</h5>
                            </div>
                            <div class="office_location">
                                <div class="address">
                                    <i class="fa fa-map-marker"><span>Elephant Road, Dhaka 1205, Bangladesh</span></i>
                                </div>
                                <div class="phone">
                                    <i class="fa fa-phone"><span>+ 8801532-987039</span></i>
                                </div>
                                <div class="email">
                                    <i class="fa fa-envelope"><span>youremail@mail.com</span></i>
                                </div>
                                <div id="map"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="msg">
                            <div class="msg_title">
                                <h5>Drop A Message</h5>
                            </div>
                            <div class="form_area">
                                <div class="contact-form wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">
                                    <div id="message"></div>
                                    <form action="scripts/contact.php" class="form-horizontal contact-1" role="form" name="contactform" id="contactform">
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="subject" class="form-control" id="subject" placeholder="Subject *">
                                                <div class="text_area">
                                                    <textarea name="contact-message" id="msg" class="form-control" cols="30" rows="8" placeholder="Message"></textarea>
                                                </div>
                                                <button type="submit" class="btn custom-btn" data-loading-text="Loading...">Send</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section id="footer">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-6">
                        <div class="copyright">
                            <p>@ 2016 - Design By <span><a href="">&#9798;</a></span></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="designer">
                            <p>A Design By <a href="#">XpeedStudio</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


-->
        <a href="#" id="back-to-top" title="Back to top">&uarr;</a>


        <script src="js/jquery-1.12.3.min.js"></script>

        <script src="js/waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>

        <script>
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        </script>

        <script src="js/gmaps.min.js"></script>
        <script type="text/javascript">
            var map;
            $(document).ready(function () {
                map = new GMaps({
                    el: '#map',
                    lat: 23.6911078,
                    lng: 90.5112799,
                    zoomControl: true,
                    zoomControlOpt: {
                        style: 'SMALL',
                        position: 'LEFT_BOTTOM'
                    },
                    panControl: false,
                    streetViewControl: false,
                    mapTypeControl: false,
                    overviewMapControl: false,
                    scrollwheel: false,
                });


                map.addMarker({
                    lat: 23.6911078,
                    lng: 90.5112799,
                    title: 'Office',
                    details: {
                        database_id: 42,
                        author: 'Foysal'
                    },
                    click: function (e) {
                        if (console.log)
                            console.log(e);
                        alert('You clicked in this marker');
                    },
                    mouseover: function (e) {
                        if (console.log)
                            console.log(e);
                    }
                });
            });
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjxvF9oTfcziZWw--3phPVx1ztAsyhXL4"></script>

        <script src="js/isotope/min/scripts-min.js"></script>
        <script src="js/isotope/cells-by-row.js"></script>
        <script src="js/isotope/isotope.pkgd.min.js"></script>
        <script src="js/isotope/packery-mode.pkgd.min.js"></script>
        <script src="js/isotope/scripts.js"></script>

        <script src="js/backtotop.js"></script>

        <script src="js/jquery.localScroll.min.js"></script>
        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script>
            new WOW().init();
        </script>


        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <!-- JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- CORE PLUGINS -->
        <script src="vendor/jquery.min.js" type="text/javascript"></script>
        <script src="vendor/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- PAGE LEVEL PLUGINS -->
        <script src="vendor/jquery.easing.js" type="text/javascript"></script>
        <script src="vendor/jquery.back-to-top.js" type="text/javascript"></script>
        <script src="vendor/jquery.smooth-scroll.js" type="text/javascript"></script>
        <script src="vendor/jquery.wow.min.js" type="text/javascript"></script>
        <script src="vendor/jquery.parallax.min.js" type="text/javascript"></script>
        <script src="vendor/jquery.appear.js" type="text/javascript"></script>
        <script src="vendor/swiper/js/swiper.jquery.min.js" type="text/javascript"></script>

        <!-- PAGE LEVEL SCRIPTS -->
        <script src="js/layout.min.js" type="text/javascript"></script>
        <script src="js/components/progress-bar.min.js" type="text/javascript"></script>
        <script src="js/components/swiper.min.js" type="text/javascript"></script>
        <script src="js/components/wow.min.js" type="text/javascript"></script>
<?php $connect_management->close(); ?>
    </body>
</html>