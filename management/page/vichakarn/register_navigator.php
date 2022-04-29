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
                                <a class="navbar-brand custom_navbar-brand" href="#"><img src="images/your_logo_bk200.png" alt=""></a>
                            </div>
                            <!--End of navbar-header-->
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse zero_mp" id="bs-example-navbar-collapse-1" style="margin-right:20px;">
                                <ul class="nav navbar-nav navbar-right main_menu">
                                    <li class="dropdown">
										<a href="?page=vichakarn&work=register_application">ทะเบียนบุคคลากร</a>
										<div class="dropdown-content">
											<p><a href="?page=vichakarn&work=register_application_personal"><button style="width:100%; height:40px; background:transparent; border:0;">ลงทะเบียน</button></a></p>
											<p><a href="?page=vichakarn&work=register_application_personal_edit"><button style="width:100%; height:40px; background:#E9E9E9; border:0;">แก้ไขทะเบียน</button></a></p>
											<p><a href="?page=vichakarn&work=register_application_personal_delete"><button style="width:100%; height:40px; background:#E9E9E9; border:0;">ลบทะเบียน</button></a></p>
										</div>
									</li>
                                    <li class="dropdown">
										<a href="?page=vichakarn&work=register_application">ทะเบียนนักเรียน</a>
										<div class="dropdown-content">
											<p><a href="?page=vichakarn&work=register_application_student"><button style="width:100%; height:40px; background:transparent; border:0;">ลงทะเบียน</button></a></p>
											<p><a href="?page=vichakarn&work=register_application_student_edit"><button style="width:100%; height:40px; background:#E9E9E9; border:0;">แก้ไขทะเบียน</button></a></p>
											<p><a href="?page=vichakarn&work=register_application_student_delete"><button style="width:100%; height:40px; background:#E9E9E9; border:0;">ลบทะเบียน</button></a></p>
										</div>
									</li>
                                    <li class="active"><a href="home.php?page=vichakarn">ย้อนกลับ <span class="sr-only">(current)</span></a></li>
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
                            <img src="img/img2.jpg" alt="...">
                            <div class="carousel-caption">
                                <div class="slider_text">
                                    <h2 style="font-family: 'Pridi', serif;">ระบบการบริหารจัดการ</h2>
                                    <h3 style="font-family: 'Pridi', serif;">โรงเรียนนาคประสิทธิ์ มูลนิธิวัดบางช้างเหนือ</h3>
                                    <h3 style="font-family: 'Pridi', serif;">[ ฝ่ายวิชาการ - งานทะเบียน ]</h3>
                                    <!--<a href="" class="custom_btn">Read  More</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End of item With Active-->
                </div>
                <!--End of Carousel Inner-->
            </div>
        </section>
        <!--end of slider section-->
        <!--========== PAGE LAYOUT ==========-->
		<?
		$work = @$_REQUEST['work'];
		if($work == 'register_application_personal')
		{
			include 'page/vichakarn/register_application_personal.php';
		}
		elseif($work == 'register_application_personal_edit')
		{
			include 'page/vichakarn/register_application_personal_edit.php';
		}
		elseif($work == 'register_application_personal_delete')
		{
			include 'page/vichakarn/register_application_personal_delete.php';
		}
		elseif($work == 'register_application_student')
		{
			include 'page/vichakarn/register_application_student.php';
		}
		elseif($work == 'register_application_student_edit')
		{
			include 'page/vichakarn/register_application_student_edit.php';
		}
		elseif($work == 'register_application_student_delete')
		{
			include 'page/vichakarn/register_application_student_delete.php';
		}
		?>