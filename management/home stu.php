<?
include "chkuser.php";

$sql="SELECT * FROM `mst_student` WHERE `emp_id`='$stuid';";
$obj=mysql_query($sql);
$stuinfo=mysql_fetch_array($obj);
$title=$stuinfo['ptitle'];
//ptitle
$sqltitle="SELECT * FROM `tbl_ptitle` WHERE `ptitle`='$title';";
$objtitle=mysql_query($sqltitle);
$stutitle=mysql_fetch_array($objtitle);

$stuname=$stutitle['n_title'].$stuinfo['student_fname']."<br>".$stuinfo['student_lname'];
$stuname2=$stutitle['n_title'].$stuinfo['student_fname']." ".$stuinfo['student_lname'];
//$stubd=$stuinfo['brith_day'];
$stubd = new DateTime($stuinfo['brith_day']); // $date_order
//เดือน
$a_mthai['01']    =    'มกราคม';
$a_mthai['02']    =    'กุมภาพันธ์';
$a_mthai['03']    =    'มีนาคม';
$a_mthai['04']    =    'เมษายน';
$a_mthai['05']    =    'พฤษภาคม';
$a_mthai['06']    =    'มิถุนายน';
$a_mthai['07']    =    'กรกฎาคม';
$a_mthai['08']    =    'สิงหาคม';
$a_mthai['09']    =    'กันยายน ';
$a_mthai['10']    =    'ตุลาคม';
$a_mthai['11']    =    'พฤศจิกายน';
$a_mthai['12']    =    'ธันวาคม';

$dbd=$stubd->format('d');
$mbd=$a_mthai[$stubd->format('m')];
$ybd=$stubd->format('Y')+543;
$birth=$dbd." ".$mbd." ".$ybd;

//คำนวณอายุ
	$birthday = $stuinfo['brith_day'];      //รูปแบบการเก็บค่าข้อมูลวันเกิด
	$today = date("Y-m-d");   //จุดต้องเปลี่ยน
		

	list($byear, $bmonth, $bday)= explode("-",$birthday);       //จุดต้องเปลี่ยน
	list($tyear, $tmonth, $tday)= explode("-",$today);                //จุดต้องเปลี่ยน
		
	$mbirthday = mktime(0, 0, 0, $bmonth, $bday, $byear); 
	$mnow = mktime(0, 0, 0, $tmonth, $tday, $tyear );
	$mage = ($mnow - $mbirthday);
	

$u_y=date("Y", $mage)-1970;
$u_m=date("m",$mage)-1;
$u_d=date("d",$mage)-1;

//ชั้นปี
if($stuinfo['level1']=='16')
{
	$stulevel1=1;
}
if($stuinfo['level1']=='17')
{
	$stulevel1=2;
}
if($stuinfo['level1']=='18')
{
	$stulevel1=3;
}

//สาขา
if($stulevel=1 && $stuinfo['room_id']=='4')
{$stusec1="อาหารและโภชนาการ";}
if($stulevel1>=2 && $stuinfo['room_id']=='4')
{$stusec1="อาหารและโภชนาการ";}
if($stulevel1>=2 && $stuinfo['room_id']=='3')
{$stusec1="คอมพิวเตอร์ธุรกิจ";}
if($stulevel1>=2 && $stuinfo['room_id']=='2')
{$stusec1="การบัญชี";}
if($stulevel1>=2 && $stuinfo['room_id']=='1')
{$stusec1="การตลาด";}
if($stulevel1<2 && $stuinfo['room_id']!='4')
{$stusec1="-";}

?>
<!DOCTYPE html>
<!-- ==============================
    Project:        Metronic "Acecv" Frontend Freebie - Responsive HTML Template Based On Twitter Bootstrap 3.3.4
    Version:        1.0
    Author:         KeenThemes
    Primary use:    Corporate, Business Themes.
    Email:          support@keenthemes.com
    Follow:         http://www.twitter.com/keenthemes
    Like:           http://www.facebook.com/keenthemes
    Website:        http://www.keenthemes.com
    Premium:        Premium Metronic Admin Theme: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
================================== -->
<html lang="en" class="no-js">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>NBAC Student System</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>

        <!-- GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
        <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <!-- PAGE LEVEL PLUGIN STYLES -->
        <link href="css/animate.css" rel="stylesheet">
        <link href="vendor/swiper/css/swiper.min.css" rel="stylesheet" type="text/css"/>

        <!-- THEME STYLES -->
        <link href="css/layout.min.css" rel="stylesheet" type="text/css"/>

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico"/>
		<link href="https://fonts.googleapis.com/css?family=Itim" rel="stylesheet">

    </head>
    <!-- END HEAD -->


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


    <!-- BODY -->
    <body id="body" data-spy="scroll" data-target=".header">
        <!--========== HEADER ==========-->
        <header class="header navbar-fixed-top">
            <!-- Navbar -->
            <nav class="navbar" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="menu-container js_nav-item">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="toggle-icon"></span>
                        </button>

                        <!-- Logo -->
                        <div class="logo">
                            <a class="logo-wrap" href="#body">
                                <img src="../images/your_logo_bk200.png" alt="Asentus Logo" style="width:200px;">
                            </a>
                        </div>
                        <!-- End Logo -->
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-collapse">
                        <div class="menu-container">
                            <ul class="nav navbar-nav navbar-nav-right">
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#body">หน้าหลัก</a></li>
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#about">ข้อมูลพื้นฐาน</a></li>
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#stat">สถิติการมาเรียน</a></li>
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="#grade">ผลการเรียน</a></li>
                                <li class="js_nav-item nav-item"><a href="edit" target="_blank" class="nav-item-child nav-item-hover">แก้ไขข้อมูล</a></li>
                                <li class="js_nav-item nav-item"><a class="nav-item-child nav-item-hover" href="logout.php">ออกจากระบบ</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Navbar Collapse -->
                </div>
            </nav>
            <!-- Navbar -->
        </header>
        <!--========== END HEADER ==========-->

        <!--========== SLIDER ==========-->
        <div class="promo-block">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 sm-margin-b-60">
                        <div class="margin-b-30">
						<p class="promo-block-text" style="font-family: 'Itim', cursive;
">ยินดีต้อนรับ</p>
                            <h1 class="promo-block-title" style="font-family: 'Itim', cursive; "
><?=$stuname?></h1>
                        </div>
                       <!-- <ul class="list-inline">
                            <li><a href="#" class="social-icons"><i class="icon-social-facebook"></i></a></li>
                            <li><a href="#" class="social-icons"><i class="icon-social-twitter"></i></a></li>
                            <li><a href="#" class="social-icons"><i class="icon-social-dribbble"></i></a></li>
                            <li><a href="#" class="social-icons"><i class="icon-social-behance"></i></a></li>
                            <li><a href="#" class="social-icons"><i class="icon-social-linkedin"></i></a></li>
                        </ul> -->
                    </div>
                    <div class="col-sm-6">
                        <div class="promo-block-img-wrap">
                            <img class="promo-block-img img-responsive" src="img\stuimg\<?=$stuinfo['emp_id']?>.jpg" align="Avatar" style="width:350px;">
                        </div>
                    </div>
                </div>
                <!--// end row -->
            </div>
        </div>
        <!--========== SLIDER ==========-->

        <!--========== PAGE LAYOUT ==========-->
        <!-- About -->
        <div>
            <div class="container content-lg">
                <div class="row">
                    <div class="col-sm-5 sm-margin-b-60">
                        <img class="full-width img-responsive" src="img/500x700/nak.jpg" alt="Image">
                    </div>
                    <div class="col-sm-7" id="about">
                        <div class="section-seperator margin-b-50">
                            <div class="margin-b-50">
                                <div class="margin-b-30">
                                    <p style="margin-bottom:25px;"><h2 style="font-family: 'Itim', cursive;">ข้อมูลพื้นฐาน</h2></p>
                                    <table width="100%" border="0" style="font-family: 'Itim', cursive; font-size:18px">
                                      <tbody>
                                        <tr>
                                          <td>ชื่อ-สกุล</td>
                                          <td colspan="2"><?=$stuname2?></td>
                                        </tr>
                                        <tr>
                                          <td>เลขประจำตัวนักเรียน</td>
                                          <td colspan="2"><?=$stuinfo['emp_id']?></td>
                                        </tr>
                                        <tr>
                                          <td width="40%">วันเกิด</td>
                                          <td width="22%"> <?=$birth?></td>
                                          <td>อายุ&nbsp;
                                            <?=$u_y?>&nbsp; 
                                          ปี</td>
                                        </tr>
                                        <tr>
                                          <td>ระดับชั้นประกาศนียบัตรวิชาชีพปีที่</td>
                                          <td colspan="2"><?=$stulevel1?>&nbsp;&nbsp;สาขา&nbsp;<?=$stusec1?></td>
                                        </tr>
                                       <!-- <tr>
                                          <td>ที่อยู่ปัจจุบัน</td>
                                          <td colspan="3">แทรกที่อยู่</td>
                                        </tr>
                                        -->
                                        <tr>
                                          <td>ชื่อ-สกุล บิดา</td>
                                          <td colspan="2"><?=$stuinfo['father_fname']." ".$stuinfo['father_lname']?></td>
                                        </tr>
                                        <tr>
                                          <td>ชื่อ-สกุล มารดา</td>
                                          <td colspan="2"><?=$stuinfo['mother_fname']." ".$stuinfo['mother_lname']?></td>
                                        </tr>
                                        <tr>
                                          <td>เบอร์โทรศัพท์ที่สามารถติดต่อได้</td>
                                          <td colspan="2">แทรกเบอร์โทรศัพท์</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <br><hr>
                                   <!-- 
                                </div>
                                <a href="#" class="btn-theme btn-theme-md btn-default-bg text-uppercase">Download my CV</a>
                            </div>
                            -->
                        </div>
                        <div class="progress-box" id="stat">
<?
include "module/stustat.php";
?>
                        <h2 style="font-family: 'Itim', cursive;">สถิติการมาเรียน</h2><h4 style="font-family: 'Itim', cursive;">จำนวนวันที่เปิดเรียน <?=$res_numday?> วัน</h4>
                        <!-- Progress Box -->
                            <h5>มาเรียนตรงเวลา <span class="color-heading pull-right"><?=number_format($per_goodday, 2, '.', '');?>%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-base" role="progressbar" data-width="<?=number_format($per_goodday, 2, '.', '');?>"></div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>มาเรียนสาย <span class="color-heading pull-right"><?=number_format($per_lateday, 2, '.', '');?>%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-yellow" role="progressbar" data-width="<?=number_format($per_lateday, 2, '.', '');?>"></div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>ลากิจ / ลาป่วย<span class="color-heading pull-right"><?=number_format($per_leaveday, 2, '.', '');?>%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-orange" role="progressbar" data-width="<?=number_format($per_leaveday, 2, '.', '');?>"></div>
                            </div>
                        </div>
                        <div class="progress-box">
                            <h5>ขาดเรียน <span class="color-heading pull-right"><?=number_format($per_missday, 2, '.', '');?>%</span></h5>
                            <div class="progress">
                                <div class="progress-bar bg-color-red" role="progressbar" data-width="<?=number_format($per_missday, 2, '.', '');?>"></div>
                            </div>
                        </div>
                        <!-- End Progress Box -->
                    </div>
                </div>
                <!--// end row -->
            </div>
        </div>
        <!-- End About -->

         <!--
        <div id="experience">
            <div class="bg-color-sky-light" data-auto-height="true">
                <div class="container content-lg">
                    <div class="row row-space-2 margin-b-4">
                        <div class="col-md-3 col-sm-6 md-margin-b-4">
                            <div class="service" data-height="height">
                                <div class="service-element">
                                    <i class="service-icon icon-mustache"></i>
                                </div>
                                <div class="service-info">
                                    <h3>Illustrator</h3>
                                    <p class="margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>
                                </div>
                                <a href="#" class="content-wrapper-link"></a>    
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 md-margin-b-4">
                            <div class="service bg-color-base wow zoomIn" data-height="height" data-wow-duration=".3" data-wow-delay=".1s">
                                <div class="service-element">
                                    <i class="service-icon color-white icon-screen-tablet"></i>
                                </div>
                                <div class="service-info">
                                    <h3 class="color-white">Graphic Design</h3>
                                    <p class="color-white margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>
                                </div>
                                <a href="#" class="content-wrapper-link"></a>    
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 sm-margin-b-4">
                            <div class="service" data-height="height">
                                <div class="service-element">
                                    <i class="service-icon icon-chemistry"></i>
                                </div>
                                <div class="service-info">
                                    <h3>Photoshop</h3>
                                    <p class="margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>
                                </div>
                                <a href="#" class="content-wrapper-link"></a>    
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="service" data-height="height">
                                <div class="service-element">
                                    <i class="service-icon icon-badge"></i>
                                </div>
                                <div class="service-info">
                                    <h3>Sketch</h3>
                                    <p class="margin-b-5">Lorem ipsum dolor amet consectetur ut consequat siad esqudiat dolor</p>
                                </div>
                                <a href="#" class="content-wrapper-link"></a>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div id="work">
            <div class="container content-lg">
                <div class="row margin-b-40">
                    <div class="col-sm-6">
                        <h2>Latest Products</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incididunt ut laboret dolore magna aliqua enim minim veniam exercitation</p>
                    </div>
                </div>


                <div class="row">

                    <div class="col-sm-4 sm-margin-b-50">
                        <div class="margin-b-20">
                            <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                                <img class="img-responsive" src="img/970x647/01.jpg" alt="Latest Products Image">
                            </div>
                        </div>
                        <h4><a href="#">Triangle Roof</a> <span class="text-uppercase margin-l-20">Management</span></h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor</p>
                        <a class="link" href="#">Read More</a>
                    </div>

                    <div class="col-sm-4 sm-margin-b-50">
                        <div class="margin-b-20">
                            <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                                <img class="img-responsive" src="img/970x647/02.jpg" alt="Latest Products Image">
                            </div>
                        </div>
                        <h4><a href="#">Curved Corners</a> <span class="text-uppercase margin-l-20">Developmeny</span></h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor</p>
                        <a class="link" href="#">Read More</a>
                    </div>


                    <div class="col-sm-4 sm-margin-b-50">
                        <div class="margin-b-20">
                            <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                                <img class="img-responsive" src="img/970x647/03.jpg" alt="Latest Products Image">
                            </div>
                        </div>
                        <h4><a href="#">Bird On Green</a> <span class="text-uppercase margin-l-20">Design</span></h4>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit sed tempor incdidunt ut laboret dolor magna ut consequat siad esqudiat dolor</p>
                        <a class="link" href="#">Read More</a>
                    </div>

                </div>

            </div>
        </div>
        -->

        <!-- 
        <div class="bg-color-sky-light">
            <div class="content-lg container">

                <div class="swiper-slider swiper-clients">

                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img class="swiper-clients-img" src="img/clients/01.png" alt="Clients Logo">
                        </div>
                        <div class="swiper-slide">
                            <img class="swiper-clients-img" src="img/clients/02.png" alt="Clients Logo">
                        </div>
                        <div class="swiper-slide">
                            <img class="swiper-clients-img" src="img/clients/03.png" alt="Clients Logo">
                        </div>
                        <div class="swiper-slide">
                            <img class="swiper-clients-img" src="img/clients/04.png" alt="Clients Logo">
                        </div>
                        <div class="swiper-slide">
                            <img class="swiper-clients-img" src="img/clients/05.png" alt="Clients Logo">
                        </div>
                        <div class="swiper-slide">
                            <img class="swiper-clients-img" src="img/clients/06.png" alt="Clients Logo">
                        </div>
                    </div>

                </div>

            </div>
        </div>
         -->

        
        <div class="promo-banner parallax-window" data-parallax="scroll" data-image-src="../images/wide.jpg" id="grade">
            <div class="container-sm content-lg"  style="height:200px;">
                <h2 class="promo-banner-title" style="font-family: 'Itim', cursive; margin-top:-45px;">ผลการเรียน</h2>
            </div>
        </div>

            

        <div id="contact">
            <div class="bg-color-sky-light">
                <div class="container content-lg">
                    <div class="row margin-b-40">
                        <div class="col-sm-6">
                           <h2 style="font-family: 'Itim', cursive; margin-top:-60px;">ภาคเรียนที่ x ปีการศึกษา xxxx</h2>
                            <p><?
                            include "module/stugrade.php";
							?></p>
                        </div>
                    </div>
<!--
                    <div class="row">
                        <div class="col-md-3 col-xs-6 md-margin-b-30">
                            <h4>Location</h4>
                            <a href="#">Brookyln, New York</a>
                        </div>
                        <div class="col-md-3 col-xs-6 md-margin-b-30">
                            <h4>Phone</h4>
                            <a href="#">+77 234 548 00 00</a>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <h4>Email</h4>
                            <a href="mailto:#">alex.teseira@gmail.com</a>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <h4>Web</h4>
                            <a href="#">alex.teseira.com</a>
                        </div>
                    </div>
-->
                </div>
            </div>
        </div>
 
        <!--========== END PAGE LAYOUT ==========-->

        <!--========== FOOTER ==========-->
        <footer class="footer">
            <div class="content container">
                <div class="row">
                    <div class="col-xs-6">
                        NAKPRASITH BUSINESS ADMINISTRATION TECHNOLOGICAL COLLEGE
                    </div>
                    <div class="col-xs-6 text-right sm-text-left">
                        <p class="margin-b-0">เข้าสู่เว็บไซต์: <a class="fweight-700" href="../">NBAC</a></p>
                    </div>
                </div>
                <!--// end row -->
            </div>
        </footer>
        <!--========== END FOOTER ==========-->

        <!-- Back To Top -->
        <a href="javascript:void(0);" class="js-back-to-top back-to-top">Top</a>

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

    </body>
    <!-- END BODY -->
</html>