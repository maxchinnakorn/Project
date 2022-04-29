        <!-- About -->
		<div>
            <div class="container content-lg">
                <div class="row">
                    <div class="col-sm-7" id="about">
                        <div class="section-seperator margin-b-50">
                            <div class="margin-b-50">
                                <div class="margin-b-30">
                                    <p style="margin-bottom:25px;"><h2 style="font-family: 'Itim', cursive; padding-bottom:20px;">ข้อมูลการศึกษาต่อ</h2></p>
                                    <table width="100%" border="0" style="font-family: 'Itim', cursive; font-size:18px">
                                      <tbody>
										<tr>
                                          <td colspan="5" style="padding:5px 20px 5px 0px;">ข้อมูลนักเรียน</td>
 											<?
												$id = @$_REQUEST['id'];
												mysql_select_db($database_alumni, $alumni);
												$sql_show = "SELECT * FROM user WHERE user_student_id = '".$id."';";
												$query_show = mysql_query($sql_show);
												$result_show = mysql_fetch_array($query_show);
												mysql_select_db($database_main, $main);
												$sql_level = "SELECT * FROM tbl_department_class_level WHERE level_name_eng = '".$result_show['user_student_level']."';";
												$query_level = mysql_query($sql_level);
												$result_level = mysql_fetch_array($query_level);
											?>
										<tr>
                                          <td colspan="5" style="padding:5px 20px 5px 0px; text-align:center;"><img src="<? include('../inc/url_photo_student.php'); ?><?=$result_show['user_student_id'];?>.jpg" width="20%"></td>
										</tr>                                        
                                        <tr>
                                          <td width="20%" style="padding:5px 20px 5px 0px;"><?=$result_show['user_student_id'];?></td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;"><?=$result_show['user_titlename'].$result_show['user_name'];?></td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;"><?=$result_show['user_surname'];?></td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;"><?=$result_level['level_full_name'].'/'.$result_show['user_student_room'];?></td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;"></td>
                                        </tr>
										<form nane="form1" method="post" action="?page=vichakarn&work=guide_university_insertform&id=<?=$result_show['user_student_id'];?>&do=insert">
										<tr>
                                          <td colspan="5" style="padding:25px 20px 5px 0px;">เพื่มรายชื่อสถาบันอุดมศึกษาที่สอบได้</td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;">ลำดับ</td>
                                          <td style="padding:0px 20px 5px 0px;">คณะ / สาขา</td>
                                          <td style="padding:0px 20px 5px 0px;">มหาวิทยาลัย</td>
                                          <td style="padding:0px 20px 5px 0px; text-align:center;">เลือกเรียน</td>
                                          <td style="padding:0px 20px 5px 0px; text-align:center;">สถานะ</td>
										</tr>
 											<?
										mysql_select_db($database_alumni, $alumni);
										$sql_university = "SELECT * FROM user_university WHERE user_student_id = '".$id."';";
										$query_university = mysql_query($sql_university);
										$result_university = mysql_fetch_array($query_university);
										$total_university = mysql_num_rows($query_university);
										$i = 0;
										do {
											$i = $i+1;
										} while($result_university = mysql_fetch_array($query_university));
											if($total_university >= 1)
											{
												$i = $i+1;
											}
											else
											{
												$i = 1;												
											}
											if(@$_REQUEST['do'] == 'insert')
											{
												mysql_select_db($database_alumni, $alumni);
												$sql_sum = "SELECT * FROM user_university";
												$query_sum = mysql_query($sql_sum);
												$total_sum = mysql_num_rows($query_sum);
												$sum = $total_sum+1;
												mysql_select_db($database_alumni, $alumni);
												$sql_insert = "INSERT INTO user_university SET 
													`university_id` = '".$sum."',
													`user_gen` = '".$result_show['user_gen']."', 
													`user_student_id` = '".$id."',
													`user_student_level` = '".$result_show['user_student_level']."',
													`user_student_room` = '".$result_show['user_student_room']."',
													`user_detail` = '".@$_POST['sec']."',
													`user_university` = '".@$_POST['university']."'";
												$query_insert = mysql_query($sql_insert);
												//echo $sql_insert;
												mysql_select_db($database_alumni, $alumni);
												$sql_confirm = "UPDATE user SET 
													user_status = 1
												WHERE (user_student_id = '".$id."')";
												$query_confirm = mysql_query($sql_confirm);
												//echo $sql_confirm;
												echo "<meta http-equiv='Refresh' content='0;URL=?page=vichakarn&work=guide_university_form&id=$id&do=confirminsert'>";
											}
											elseif(@$_REQUEST['do'] == 'confirminsert')
											{
												echo "<meta http-equiv='Refresh' content='0;URL=?page=vichakarn&work=guide_university_form&id=$id'>";
											}
											else
											{}
											?>
										<tr>
                                          <td style="padding:0px 20px 5px 0px; text-align:center;"><?=$i;?></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="sec" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="university" size="20" /></td>
										  <td style="padding:0px 20px 5px 0px;"></td>
                                          <td style="padding:0px 20px 5px 0px; text-align:center;"><img src="../infosystem_file/image/insert.png" title="กรอกข้อมูลที่ต้องการเพิ่ม" width="100%"></td>
										</tr>
										<tr>
                                          <td style="padding:0px 20px 5px 0px; text-align:right; color:white;">วันนี้</td>
                                          <td style="padding:0px 20px 5px 0px; color:white;"><input type="text" name="date" value="<?=date('/d/');?>" size="20" readonly style="text-align:center; border-style:hidden; text-align:center;"></td>
                                          <td style="padding:0px 20px 5px 0px; color:white;"><input type="text" name="date" value="<?=date('/m/');?>" size="20" readonly style="text-align:center; border-style:hidden; text-align:center;"></td>
                                          <td style="padding:0px 20px 5px 0px; color:white;"><input type="text" name="date" value="<?=date('/Y/');?>" size="20" readonly style="text-align:center; border-style:hidden; text-align:center;"></td>
                                          <td style="padding:0px 20px 5px 0px; color:white;"></td>
                                        </tr>
										<tr>
                                          <td colspan="5" style="padding:0px 20px 5px 0px; text-align:center; color:red;">:: หมายเหตุ ::<br>1. กรณีเพิ่มรายชื่อสถาบันอุดมศึกษาแล้ว ไม่สามารถลบข้อมูลได้<br>2. กรณียังไม่ได้ยืนยันข้อมูล สามารถแก้ไขข้อมูลในภายหลังได้<br>3. กรณียืนยันข้อมูลแล้ว ไม่สามารถแก้ไขข้อมูลได้</td>
                                        </tr>
										<tr>
										  <td colspan="5" style="padding:0px 20px 5px 0px; text-align:center;">
											<button type="submit" class="btn custom-btn" data-loading-text="Loading..." onClick="return confirm('ต้องการเพิ่มรายชื่อหรือไม่')">เพิ่ม</button>
											<a href="?page=vichakarn&work=guide_university_form&id=<?=$result_show['user_student_id'];?>"><button type="button" class="btn custom-btn" data-loading-text="Loading..." style="background-color:red;">ยกเลิก</button></a>
										  </td>
										</tr>
										</form>
                                      </tbody>
                                    </table><hr />
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