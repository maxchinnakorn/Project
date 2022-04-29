	<!--========== SLIDER ==========-->
        <div class="promo-block" style="padding-top:20px;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 sm-margin-b-60">
                        <div class="margin-b-30">
							<h1 class="promo-block-text" style="font-family: 'Itim', cursive; padding-top:20px;">สวัสดี</h1>
                            <h3 class="promo-block-title" style="font-family: 'Itim', cursive; padding-top:20px;">
								<?=$row['titlename'].$row['firstname'].' '.$row['surname'];?>
							</h3>
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
                            <img class="promo-block-img img-responsive" src="assets/images/photos/personel/<?=$row['username'];?>.jpg" align="Avatar" style="width:350px;">
                        </div>
                    </div>
                </div>
                <!--// end row -->
            </div>
        </div>
        <!--========== SLIDER ==========-->        <!--========== PAGE LAYOUT ==========-->
        <!-- About -->
		<div>
            <div class="container content-lg">
                <div class="row">
                    <div class="col-sm-5 sm-margin-b-60">
                        <img class="full-width img-responsive" src="img/nak.jpg" alt="Image">
                    </div>
                    <div class="col-sm-7" id="about">
                        <div class="section-seperator margin-b-50">
                            <div class="margin-b-50">
                                <div class="margin-b-30">
                                    <p style="margin-bottom:25px;"><h2 style="font-family: 'Itim', cursive; padding-bottom:20px;">ข้อมูลพื้นฐาน</h2></p>
                                    <table width="100%" border="0" style="font-family: 'Itim', cursive; font-size:18px">
                                      <tbody>
                                        <tr>
                                          <td width="40%">ชื่อ-สกุล</td>
                                          <td width="60%" colspan="2"><?=$row['firstname'].' '.$row['surname']?></td>
                                        </tr>
                                        <tr>
                                          <td>เลขประจำตัว</td>
                                          <td colspan="2"><?=$row['id'];?></td>
                                        </tr>
                                        <tr>
                                          <td>วันเกิด</td>
                                          <td>
<?php                                          
$inbirth = $row['birthday'];
$birth_y = substr("$inbirth",0,4)+543;
$birth_m = substr("$inbirth",5,2);
$birth_d = substr("$inbirth",-2,2);				
$age = date('Y')-substr($inbirth,0,4);		 //แปลงวันเดือนปีเกิดจาก database
$sql_month = "SELECT * FROM tbl_month WHERE id = '$birth_m'"; 
$query_month = $connect_management->query($sql_month);
$row_month = $query_month->fetch_array();
$query_month->close();
?>
                                              <?=$birth_d.' '.$row_month['name'].' '.$birth_y.' อายุ '.$age.' ปี'?></td>
                                        </tr>
                                        <tr>
                                          <td>เบอร์โทรศัพท์</td>
                                          <td colspan="2"><?=$row['telephone']?></td>
                                        </tr>
                                        <tr>
                                          <td>E-Mail</td>
                                          <td colspan="2"><?=$row['email']?></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <br /><hr />
                                </div>
                            </div>
                        </div>
                        <div class="rating-progress-bars p-3">
                            <div class="progress-1 align-items-center">
                                <h2 style="font-family: 'Itim', cursive;">สถิติการมาทำงาน</h2><h4 style="font-family: 'Itim', cursive;">จำนวนวันที่เปิดทำงาน 100<?$res_numday?> วัน</h4>
                                <h5>มาทำงานตรงเวลา <span class="color-heading pull-right">50.00<? number_format($per_goodday, 2, '.', '');?>%</span></h5>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width:50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">50.00%</div>
                                </div>
                                <h5>มาทำงานสาย <span class="color-heading pull-right">10.00 %</span></h5>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width:10%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">10.00%</div>
                                </div>
                                <h5>ลากิจ / ลาป่วย<span class="color-heading pull-right">20.00 %</span></h5>
                                <div class="progress">
                                    <div class="progress-bar bg-orange" role="progressbar" style="width:20%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">20.00%</div>
                                </div>
                                <h5>ขาดงาน <span class="color-heading pull-right">20.00 %</span></h5>
                                <div class="progress">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width:20%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">20.00%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--// end row -->
            </div>
        </div>
        <!-- End About -->