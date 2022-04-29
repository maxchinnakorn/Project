        <!-- About -->
		<div>
            <div class="container content-lg">
                <div class="row">
                    <div class="col-sm-7" id="about">
                        <div class="section-seperator margin-b-50">
                            <div class="margin-b-50">
                                <div class="margin-b-30">
                                    <p style="margin-bottom:25px;"><h2 style="font-family: 'Itim', cursive; padding-bottom:20px;">ข้อมูลการศึกษาต่อ</h2></p>
									<?
									$level_id_secondary = '16';
									$level_id_vocational = '19';
									mysql_select_db($database_main, $main);
									$sql_year = "SELECT * FROM `term`";
									$query_year = mysql_query($sql_year);
									$result_year = mysql_fetch_array($query_year);
									mysql_select_db($database_alumni, $alumni);
									$sql_plan = "SELECT * FROM `plan`";
									$query_plan = mysql_query($sql_plan);
									$result_plan = mysql_fetch_array($query_plan);
									if($level_id_secondary == 16)
									{
										$level_secondary = 'M6';
									}
									if($level_id_vocational == 19)
									{
										$level_vocational = 'V3';
									}
									mysql_select_db($database_alumni, $alumni);
									$sql_check = "SELECT * FROM `user` WHERE 
										`user_gen` = '".$result_plan['genout']."' AND 
										`user_yout` = '".$result_year['year']."' AND 
										`user_student_level` = '".$level_secondary."' OR 
										`user_gen` = '".$result_plan['genout']."' AND 
										`user_yout` = '".$result_year['year']."' AND 
										`user_student_level` = '".$level_vocational."'";
									$query_check = mysql_query($sql_check);
									$result_check = mysql_fetch_array($query_check);
									$sum_check = mysql_num_rows($query_check);
									if($sum_check > 1)
									{
									?>
 									<form method="post" action="#">
										<table width="100%" border="0" style="font-family: 'Itim', cursive; font-size:18px">
											<tbody>
												<tr>
													<td style="padding:5px 20px 5px 0px;">
														<input type="text" name="search" placeholder="ค้นหาจากเลขประจำตัว, ชิ่อ, นามสกุล" size="35" onchange="#.submit();" /> 
														<button type="submit" class="btn custom-btn">ค้นหา</button>
													</td>
												</tr>
												<tr>
													<td style="padding:5px 20px 5px 0px;">
														<h3><input name="all" type="checkbox" value="1"> รายชื่อทั้งหมด</h3>
													</td>
												</tr>
											</tbody>
										</table>
									</form>
										<?
										$id = @$_REQUEST['id'];
										$status = @$_REQUEST['status'];
										if($id != '' && $status != '')
										{
											$sql_update = "UPDATE `data_student` SET `user_status` = '$status' WHERE (`student_id`='$id')";
											$query_update = mysql_query($sql_update);
											$objresult_update = mysql_fetch_array($query_update);
											echo "<script>alert('ทำรายการเรียบร้อย'); document.location.href='?page=vichakarn&work=register_student_delete';</script>\n";
										}
										$search = @$_POST['search'];
										$chk = @$_POST['all'];
										mysql_select_db($database_alumni, $alumni);
										if($chk == 1)
										{
											$sql2 = "SELECT * FROM `user` WHERE `user_gen` = '".$result_plan['genout']."'";
										}
										else
										{
											$sql2 = "SELECT * FROM `user` WHERE `user_gen` = '".$result_plan['genout']."' AND `user_student_id` LIKE '%$search%' OR `user_name` LIKE '%$search%' OR `user_surname` LIKE '%$search%'";
										}
										$sql = "$sql2";
										$query = mysql_query($sql);
										$objresult = mysql_fetch_array($query);
										$num_rows = mysql_num_rows($query);
										$sql_university = "SELECT * FROM `user_university` WHERE `user_student_id` = '".$objresult['user_student_id']."' AND `user_student_level` = '".$objresult['user_student_level']."' AND `user_student_room` = '".$objresult['user_student_room']."'";
										$query_university = mysql_query($sql_university);
										$result_university = mysql_fetch_array($query_university);
										if(empty($search) && empty($chk))
										{
										?>
									<table width="1200px" border="0" style="font-family: 'Itim', cursive; font-size:18px">
									 <tbody>
										<tr>
										  <td width="100%" style="padding:45px 20px 5px 0px;"><center><font color="red" size="5px"><strong>กรอกข้อมูลที่ต้องการค้นหา</strong></font></center></td>
										</tr>
									 </tbody>
									</table>
										<?										
										}
										elseif($num_rows >= 1)
										{
										?>
									<form method="post" action="#">
									<table width="950px" border="0" style="font-family: 'Itim', cursive; font-size:18px">
									 <tbody>
										<tr>
										  <td width="15%" style="padding:5px 20px 5px 0px;"><div align="center"><b>เลขประจำตัว</b></div></td>
										  <td width="25%" style="padding:5px 20px 5px 0px;"><div align="center"><b>ชิ่อ</b></div></td>
										  <td width="25%" style="padding:5px 20px 5px 0px;"><div align="center"><b>นามสกุล</b></div></td>
										  <td width="5%" style="padding:5px 20px 5px 0px;"><div align="center"><b>รุ่น</b></div></td>
										  <td width="15%" style="padding:5px 20px 5px 0px;"><div align="center"><b>สถานะ</b></div></td>
										  <td width="15%" style="padding:5px 20px 5px 0px;"><div align="center"><b>จัดการ</b></div></td>
										</tr>
										<? do { ?>
										<tr>
										  <td style="padding:5px 20px 5px 0px;"><?=$objresult['user_student_id']?></td>
										  <td style="padding:5px 20px 5px 0px;"><?=$objresult['user_name']?></td>
										  <td style="padding:5px 20px 5px 0px;"><?=$objresult['user_surname']?></td>
										  <td style="padding:5px 20px 5px 0px;"><?=$objresult['user_gen']?></td>
										  <td style="padding:5px 20px 5px 0px;">
											  <div align="center">
											  <?
											  	if($objresult['user_status'] == 1)
												{
													echo "<img src='../infosystem_file/image/warn.png' width='25%' title='ยังไม่ได้ยืนยันข้อมูล'>";
												}
											  	elseif($objresult['user_status'] == 2)
												{
													echo "<img src='../infosystem_file/image/open.jpg' width='25%' title='ยืนยันข้อมูลแล้ว'>";
												}
											    else
												{
													echo "<img src='../infosystem_file/image/close.png' width='25%' title='ยังไม่มีข้อมูล'>";
												}
											  ?>
											  </div>
										  </td>
										  <td style="padding:5px 20px 5px 0px;">
											  <div align="center">
											  <?
											    if($objresult['user_status'] == 1)
												{
													echo "<a href='?page=vichakarn&work=guide_university_form&id=".$objresult['user_student_id']."'><input type='button' value='  แก้ไข  ' style='background-color:orange; color:white;'></a>";
												}
											  	elseif($objresult['user_status'] == 2)
												{
													echo "<font style='color:green;'>เรียบร้อย</font>";
												}
											    else
												{
													echo "<a href='?page=vichakarn&work=guide_university_form&id=".$objresult['user_student_id']."'><input type='button' value='  เพิ่ม  ' style='background-color:blue; color:white;'></a>";
												}
											  ?>
										  	  </div>
										  </td>
										</tr>
										<? } while ($objresult = mysql_fetch_array($query)); ?>
									 </tbody>
									</table>
										<?
										}
										else
										{
										?>
									<table width="1200px" border="0" style="font-family: 'Itim', cursive; font-size:18px">
									 <tbody>
										<tr>
										  <td width="100%" style="padding:45px 20px 5px 0px;"><center><font color="red" size="5px"><strong>ไม่พบข้อมูล</strong></font></center></td>
										</tr>
									 </tbody>
									</table>
									<?
										}
									}
									elseif($result_plan['genout'] == $result_year['gen'])
									{
										if(@$_POST['addgen'] == 2)
										{
											mysql_select_db($database_main, $main);
											$sql_data = "SELECT * FROM `data_student` WHERE `level_id` = '".$level_id_secondary."' OR `level_id` = '".$level_id_vocational."' 
											ORDER BY student_sex, student_id ASC";
											$query_data = mysql_query($sql_data);
											$result_data = mysql_fetch_array($query_data);
											mysql_select_db($database_alumni, $alumni);
											$sql_search = "SELECT * FROM `user`";
											$query_search = mysql_query($sql_search);
											$result_search = mysql_fetch_array($query_search);
											$sum_search = mysql_num_rows($query_search);
											while($result_data = mysql_fetch_array($query_data))
											{
											$sum_search = $sum_search+1;
											mysql_select_db($database_main, $main);
											$sql_titlename = "SELECT * FROM `tbl_titlename` WHERE titlename_id = '".$result_data['titlename_id']."'";
											$query_titlename = mysql_query($sql_titlename);
											$result_titlename = mysql_fetch_array($query_titlename);
												// Year & Gen
												if($result_data['level_id'] == $level_id_secondary || $result_data['level_id'] == $level_id_vocational)
												{
													$user_yout = $result_year['year'];
													//$user_gen = $result_plan['genout'];
												}
												else
												{}
												// Moo & Soi & Road
												if(empty($result_data['student_address_soi']))
												{
													$user_moosoi = ' หมู่ '.$result_data['student_address_moo'];
													$user_road = '';
												}
												else
												{
													$user_moosoi = ' ซอย '.$result_data['student_address_soi'];
													$user_road = ' ถนน'.$result_data['student_address_road'];
												}
												// Tumbol
												if(empty($result_data['student_address_tumbol']))
												{
													$user_tumbolkwang = '';
												}
												else
												{
													mysql_select_db($database_main, $main);
													$sql_tumbol = "SELECT * FROM `tbl_loc_1tumbol` WHERE province_id = '".$result_data['student_address_province']."' AND amphur_id = '".$result_data['student_address_amphur']."'";
													$query_tumbol = mysql_query($sql_tumbol);
													$result_tumbol = mysql_fetch_array($query_tumbol);
													$user_tumbolkwang = ' '.$result_tumbol['tumbol_name'];
												}
												// Aumphur
												if(empty($result_data['student_address_aumphur']))
												{
													$user_aumphurkade = '';
												}
												else
												{
													mysql_select_db($database_main, $main);
													$sql_aumphur = "SELECT * FROM `tbl_loc_2aumphur` WHERE province_id = '".$result_data['student_address_province']."'";
													$query_aumphur = mysql_query($sql_aumphur);
													$result_aumphur = mysql_fetch_array($query_aumphur);
													$user_aumphurkade = ' '.$result_aumphur['aumphur_name'];
												}
												// Province
												if(empty($result_data['student_address_province']))
												{
													$user_province = '';
												}
												else
												{
													mysql_select_db($database_main, $main);
													$sql_province = "SELECT * FROM `tbl_loc_3province` WHERE province_id = '".$result_data['student_address_province']."'";
													$query_province = mysql_query($sql_province);
													$result_province = mysql_fetch_array($query_province);
													$user_province = ' '.$result_province['province_name'];
												}
												// Level
												if($result_data['level_id'] == 16)
												{
													$user_level = 'M6';
												}
												elseif($result_data['level_id'] == 19)
												{
													$user_level = 'V3';
												}
											mysql_select_db($database_alumni, $alumni);
											$sql_updatedata = "INSERT INTO `user` SET 
												`user_id` = '".$sum_search."', 
												`user_titlename` = '".$result_titlename['titlename_name']."', 
												`user_titleother` = '', 
												`user_name` = '".$result_data['student_firstname']."', 
												`user_surname` = '".$result_data['student_surname']."', 
												`user_birthday` = '".$result_data['student_birthday']."', 
												`user_gen` = '".$result_data['student_gen']."', 
												`user_yout` = '".$user_yout."', 
												`user_personal_id` = '".$result_data['card_id']."', 
												`user_job` = '', 
												`user_addjob` = '', 
												`user_address` = '".$result_data['student_address'].$user_moosoi.$user_road.$user_tumbolkwang.$user_aumphurkade.$user_province.' '.$result_data['student_address_zip']."', 
												`user_tel` = '".$result_data['student_tel']."', 
												`user_email` = '".$result_data['student_email']."', 
												`user_facebook` = '".$result_data['student_facebook']."', 
												`user_line` = '".$result_data['student_line']."', 
												`user_instagram` = '".$result_data['student_instagram']."', 
												`user_vision` = '', 
												`user_student_id` = '".$result_data['student_id']."', 
												`user_student_level` = '".$user_level."', 
												`user_student_room` = '".$result_data['room_id']."'";
											$query_updatedata = mysql_query($sql_updatedata);
											//echo $sql_updatedata.'<br>';
											echo "<meta http-equiv='Refresh' content='0;URL=#'>";
											}
										}
										else
										{}
									?>
 									<form method="post" action="#">
										<table width="100%" border="0" style="font-family: 'Itim', cursive; font-size:18px">
											<tbody>
												<tr>
													<td style="padding:5px 20px 5px 0px;">
														<font color="red">ยังไม่ได้เเพิ่มข้อมูลนักเรียน รุ่น  <?=$result_plan['genout'];?></font>
														<input name="addgen" type="text" value="2" hidden>
														<button type="submit" class="btn custom-btn">เพิ่มข้อมูล</button>
													</td>
												</tr>
											</tbody>
										</table>
									</form>
									<?	
									}
									elseif($result_plan['genout'] != $result_year['gen'])
									{
										if(@$_POST['addgen'] == 1)
										{
										mysql_select_db($database_alumni, $alumni);
										$sql_updateplan = "UPDATE `plan` SET 
											`genout` = '".$result_year['gen']."'
										WHERE (`plan_id` = 'np')";
										$query_updateplan = mysql_query($sql_updateplan);
										echo "<meta http-equiv='Refresh' content='0;URL=#'>";
										}
										else
										{}
									?>
									<form method="post" action="#">
										<table width="100%" border="0" style="font-family: 'Itim', cursive; font-size:18px">
											<tbody>
												<tr>
													<td style="padding:5px 20px 5px 0px;">
														<font color="red">เปลี่ยนข้อมูลรุ่นนักเรียนจาก <?=$result_plan['genout'];?> เป็น  <?=$result_year['gen'];?></font>
														<input name="addgen" type="text" value="1" hidden>
														<button type="submit" class="btn custom-btn">เปลี่ยน</button>
													</td>
												</tr>
											</tbody>
										</table>
									</form>
									<?
									}
									?>
                                    <br /><hr />
                                </div>
                            </div>
                        </div>
                	</div>
                	<!--// end row -->
            	</div>
        	</div>
		</div>
        <!-- End About -->