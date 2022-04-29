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
										</tr>                                        
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
                                          <td colspan="5" style="padding:5px 20px 5px 0px; text-align:center;"><img src="/np/photos/student/<?=$result_show['user_gen'].'/'.$result_show['user_student_id'];?>.jpg" width="20%"></td>
										</tr>                                        
                                        <tr>
                                          <td width="20%" style="padding:5px 20px 5px 0px;"><?=$result_show['user_student_id'];?></td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;"><?=$result_show['user_titlename'].$result_show['user_name'];?></td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;"><?=$result_show['user_surname'];?></td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;"><?=$result_level['level_full_name'].'/'.$result_show['user_student_room'];?></td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;"></td>
                                        </tr></td>
										</tr>
										<?
								if($result_show['user_status'] == 0)
								{
								?>
										<tr>
                                          <td colspan="5" style="padding:25px 20px 25px 0px; text-align:center;">
											<font color="red"><b>ไม่พยรายชื่อสถาบันอุดมศึกษาที่สอบได้</b></font>
										  </td>
										</tr>
										<tr>
										  <td colspan="5" style="padding:0px 20px 5px 0px; text-align:center;">
											<a href="?page=vichakarn&work=guide_university_insertform&id=<?=$result_show['user_student_id'];?>"><button type="button" class="btn custom-btn" data-loading-text="Loading..." style="background-color:blue;">เพิ่มรายชื่อ</button></a>
										  </td>
										</tr>
										<tr>
                                          <td style="padding:0px 20px 5px 0px; text-align:right; color:white;">วันนี้</td>
                                          <td style="padding:0px 20px 5px 0px; color:white;"><input type="text" name="date" value="<?=date('/d/');?>" size="20" readonly style="text-align:center; border-style:hidden; text-align:center;"></td>
                                          <td style="padding:0px 20px 5px 0px; color:white;"><input type="text" name="date" value="<?=date('/m/');?>" size="20" readonly style="text-align:center; border-style:hidden; text-align:center;"></td>
                                          <td style="padding:0px 20px 5px 0px; color:white;"><input type="text" name="date" value="<?=date('/Y/');?>" size="20" readonly style="text-align:center; border-style:hidden; text-align:center;"></td>
                                          <td style="padding:0px 20px 5px 0px; color:white;"></td>
                                        </tr>
								<?
								}
								else
								{
										?>
										<form nane="form1" method="post" action="?page=vichakarn&work=guide_university_form&id=<?=$result_show['user_student_id'];?>&edit=1&do=update">
										<?
										mysql_select_db($database_alumni, $alumni);
										$sql_university = "SELECT * FROM user_university WHERE user_student_id = '".$id."';";
										$query_university = mysql_query($sql_university);
										$result_university = mysql_fetch_array($query_university);
										mysql_select_db($database_alumni, $alumni);
										$sql_sum = "SELECT * FROM user_university WHERE user_student_id = '".$result_university['user_student_id']."' AND user_student_level = '".$result_university['user_student_level']."' AND user_student_room = '".$result_university['user_student_room']."'";
										$query_sum = mysql_query($sql_sum);
										$total_sum = mysql_num_rows($query_sum);
										$sum = $total_sum+1;
										$check = 0;
										$i = 0;
									if($total_sum >= 1)
									{
										?>
										<tr>
                                          <td colspan="5" style="padding:25px 20px 5px 0px;">รายชื่อสถาบันอุดมศึกษาที่สอบได้</td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;">ลำดับ</td>
                                          <td style="padding:0px 20px 5px 0px;">คณะ / สาขา</td>
                                          <td style="padding:0px 20px 5px 0px;">มหาวิทยาลัย</td>
                                          <td style="padding:0px 20px 5px 0px; text-align:center;">เลือกเรียน</td>
                                          <td style="padding:0px 20px 5px 0px;">สถานะ</td>
										</tr>
										<?
										do {
										$i = $i+1;
										?>
										<tr>
                                          <td style="padding:0px 20px 5px 0px; text-align:center;"><?=$i;?><input type="text" name="university_id<?=$i;?>" value="<?=$result_university['university_id'];?>" hidden></td>
										  <?
											if(@$_REQUEST['edit'] == 1)
											{
												if(@$_REQUEST['do'] == 'update')
												{
													for($z=0;$z<=@$_POST['rank'];$z++)
													{
														$check = $check + @$_POST['choose_'.$z];
													}
													//echo $check;
													if($check == 1)
													{
														for($x=1;$x<=@$_POST['rank'];$x++)
														{
															mysql_select_db($database_alumni, $alumni);
															$sql_update = "UPDATE user_university SET 
																user_gen = '".$result_show['user_gen']."', 
																user_detail = '".@$_POST['sec_'.$x]."',
																user_university = '".@$_POST['university_'.$x]."',
																user_choose = '".@$_POST['choose_'.$x]."'
															WHERE (university_id = '".@$_POST['university_id'.$x]."')";
															$query_update = mysql_query($sql_update);
															echo $sql_update.'<br>';
														}
														echo "<meta http-equiv='Refresh' content='0;URL=?page=vichakarn&work=guide_university_form&id=$id'>";
													}
													else
													{
														echo "<meta http-equiv='Refresh' content='0;URL=?page=vichakarn&work=guide_university_form&id=$id'>";
													}
												}
												else
												{}
										?>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="sec_<?=$i;?>" size="20" value="<?=$result_university['user_detail'];?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="university_<?=$i;?>" size="20" value="<?=$result_university['user_university'];?>" /></td>
												<?
												if($result_university['user_choose'] == 1)
												{
													$selected = "checked='checked'";
												}
												else
												{
													$selected = "";
												}
												?>
										  <td style="padding:0px 20px 5px 0px; text-align:center;"><input type="checkbox" name="choose_<?=$i;?>" value="1" id="choose_<?=$i;?>" <?=$selected;?> /></td>
                                          <td rowspan="<?=$total_sum;?>" style="padding:0px 20px 5px 0px; text-align:center;"><img src="../infosystem_file/image/edit.png" title="กรอกข้อมูลที่ต้องการแก้ไข" width="100%"></td>
                                          <td style="padding:0px 20px 5px 0px; text-align:center;"></td>									  
											<?
											}
											else
											{
											?>
                                          <td style="padding:0px 20px 5px 0px;"><?=$result_university['user_detail'];?></td>
                                          <td style="padding:0px 20px 5px 0px;"><?=$result_university['user_university'];?></td>
												<?
												if($result_university['user_choose'] == 1)
												{
													$selected = '<img src="../infosystem_file/image/open.jpg" title="เลือกเรียนที่นี่" width="25%">';
												}
												else
												{
													$selected = '<img src="../infosystem_file/image/close.png" title="ไม่ได้เลือกสถานที่เรียนนี้" width="25%">';
												}
												?>
										  <td style="padding:0px 20px 5px 0px; text-align:center;"><?=$selected;?></td>
												<?
												if($result_show['user_status'] == 1)
												{
												?>
										  <td rowspan="<?=$total_sum;?>" style="padding:0px 20px 5px 0px; text-align:center;"><img src="../infosystem_file/image/warn.png" title="ยังไม่ได้ยินยันข้อมูล" width="100%"></td>
												<?
												}
												elseif($result_show['user_status'] == 2)
												{
												?>
										  <td rowspan="<?=$total_sum;?>" style="padding:0px 20px 5px 0px; text-align:center;"><img src="../infosystem_file/image/open.jpg" title="ยินยันข้อมูลแล้ว" width="100%"></td>
												<?
												}
												else
												{
												?>
										  <td rowspan="<?=$total_sum;?>" style="padding:0px 20px 5px 0px; text-align:center;"><img src="../infosystem_file/image/close.png" title="ไม่มีข้อมูล" width="100%"></td>
												<?
												}
												?>
										  <td style="padding:0px 20px 5px 0px; text-align:center;"></td>
										</tr>
										<?
											}
										} while($result_university = mysql_fetch_array($query_university));
										?>
										<tr>
                                          <td style="padding:0px 20px 5px 0px; text-align:right; color:white;">วันนี้</td>
                                          <td style="padding:0px 20px 5px 0px; color:white;"><input type="text" name="date" value="<?=date('/d/');?>" size="20" readonly style="text-align:center; border-style:hidden; text-align:center;"></td>
                                          <td style="padding:0px 20px 5px 0px; color:white;"><input type="text" name="date" value="<?=date('/m/');?>" size="20" readonly style="text-align:center; border-style:hidden; text-align:center;"></td>
                                          <td style="padding:0px 20px 5px 0px; color:white;"><input type="text" name="date" value="<?=date('/Y/');?>" size="20" readonly style="text-align:center; border-style:hidden; text-align:center;"></td>
                                          <td style="padding:0px 20px 5px 0px; color:white;"></td>
                                        </tr>
										<?
										if(@$_REQUEST['edit'] == 1)
										{
										?>
										<tr>
                                          <td colspan="5" style="padding:0px 20px 5px 0px; text-align:center;"><input type="text" name="rank" value="<?=$i;?>" size="20" hidden></td>
										</tr>
										<tr>
                                          <td colspan="5" style="padding:20px 20px 5px 0px; text-align:center;"><font color="red">โปรดตรวจสอบข้อมูลให้ถูกต้องครบถ้วน ก่อนบันทึกข้อมูลทุกครั้ง</font></td>
										</tr>
										<tr>
                                          <td colspan="5" style="padding:25px 20px 5px 0px; text-align:center;">
											<a href="?page=vichakarn&work=guide_university_form&id=<?=$result_show['user_student_id'];?>&edit=1&do=update"><button type="submit" class="btn custom-btn" data-loading-text="Loading..." style="background-color:green;" onClick="return confirm('ต้องการบันทึก้อมูลหรือไม่')">บันทึก</button></a>
											<a href="?page=vichakarn&work=guide_university_form&id=<?=$result_show['user_student_id'];?>"><button type="button" class="btn custom-btn" data-loading-text="Loading..." style="background-color:red;">ยกเลิก</button></a>
 										  </td>
										</tr>
										</form>										
                                      </tbody>
                                    </table>
										<?
										}
										else
										{
											if($result_show['user_status'] == 2)
											{}
											else
											{
										?>
								    <table width="100%" border="0" style="font-family: 'Itim', cursive; font-size:18px">
                                      <tbody>
										<tr>
										  <td colspan="5" style="padding:0px 20px 5px 0px; text-align:center;">
											<a href="?page=vichakarn&work=guide_university_insertform&id=<?=$result_show['user_student_id'];?>"><button type="button" class="btn custom-btn" data-loading-text="Loading..." style="background-color:blue;">เพิ่มรายชื่อ</button></a>
										    <a href="?page=vichakarn&work=guide_university_form&id=<?=$result_show['user_student_id'];?>&edit=1"><button type="button" class="btn custom-btn" data-loading-text="Loading..." style="background-color:green;">แก้ไขรายชื่อ</button></a>
										  </td>
										</tr>
                                      </tbody>
                                    </table>
											<?
											}
											if($result_show['user_status'] == 2)
											{
											?>
								    <table width="100%" border="0" style="font-family: 'Itim', cursive; font-size:18px">
                                      <tbody>
										<tr>
										  <td colspan="5" style="padding:25px 20px 5px 0px; text-align:center;">
											<font color="green"><b>ยินยันข้อมูลแล้ว</b></font>
										  </td>
										</tr>
                                      </tbody>
                                    </table>
											<?
											}
											else
											{
											?>
								    <table width="100%" border="0" style="font-family: 'Itim', cursive; font-size:18px">
                                      <tbody>
										<tr>
                                          <td colspan="5" style="padding:10px 20px 5px 0px; color:red;">:: หมายเหตุ ::<br>1. กรณีเพิ่มรายชื่อสถาบันอุดมศึกษาแล้ว ไม่สามารถลบข้อมูลได้ แต่สามารถแก้ไขข้อมูลได้<br>2. กรณียังไม่ได้ยืนยันข้อมูล สามารถแก้ไขข้อมูลในภายหลังได้<br>3. กรณียืนยันข้อมูลแล้ว ไม่สามารถแก้ไขข้อมูลได้อีก</td>
                                        </tr>
										<tr>
                                          <td colspan="5" style="padding:10px 20px 5px 0px; text-align:center;"><font color="red">โปรดตรวจสอบข้อมูลให้ถูกต้องครบถ้วน ก่อนยืนยันข้อมูลทุกครั้ง</font></td>
										</tr>
										<tr>
												<?
												if(@$_REQUEST['do'] == 'confirm')
												{
													mysql_select_db($database_alumni, $alumni);
													$sql_confirm = "UPDATE user SET 
														user_status = 2
													WHERE (user_student_id = '".$id."')";
													$query_confirm = mysql_query($sql_confirm);
													//echo $sql_confirm;
													echo "<meta http-equiv='Refresh' content='0;URL=?page=vichakarn&work=guide_university_form&id=$id'>";
												}
												else
												{}
												?>
                                          <td colspan="5" style="padding:10px 20px 5px 0px; text-align:center;">
											<a href="?page=vichakarn&work=guide_university_form&id=<?=$result_show['user_student_id'];?>&do=confirm"><button type="button" class="btn custom-btn" data-loading-text="Loading..." onClick="return confirm('ยืนยันข้อมูลหรือไม่')">ยืนยันข้อมูล</button></a>
										  </td>
                                        </tr>
										</form>
										<?
											}
										}
									}
								}
										?>
										</tr>                                        
                                      </tbody>
                                    </table>
									<?
									if(@$_REQUEST['edit'] == 1)
									{}
									else
									{
									?>
								    <table width="100%" border="0" style="font-family: 'Itim', cursive; font-size:18px">
                                      <tbody>
										<tr>
                                          <td colspan="5" style="padding:10px 20px 25px 0px; text-align:center;">
											<a href="?page=vichakarn&work=guide_university"><button type="button" class="btn custom-btn" data-loading-text="Loading..." style="background-color:red;">&nbsp;&nbsp;&nbsp;ยกเลิก&nbsp;&nbsp;&nbsp;</button></a>
										  </td>
										</tr>
                                      </tbody>
                                    </table>
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