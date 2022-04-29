        <!-- About -->
		<div>
            <div class="container content-lg">
                <div class="row">
                    <div class="col-sm-7" id="about">
                        <div class="section-seperator margin-b-50">
                            <div class="margin-b-50">
                                <div class="margin-b-30">
                                    <p style="margin-bottom:25px;"><h2 style="font-family: 'Itim', cursive; padding-bottom:20px;">ลบทะเบียนบุคลากร</h2></p>
 									<form method="post" action="#">
										<table width="100%" border="0" style="font-family: 'Itim', cursive; font-size:18px">
										  <tbody>
											<tr>
											  <td style="padding:5px 20px 5px 0px;">
												  <input type="text" name="search" placeholder="ค้นหาจากเลขประจำตัว, ชิ่อ, นามสกุล" size="35" /> 
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
									$sql_update = "UPDATE `data_personal` SET `user_status` = '$status' WHERE (`personal_id`='$id')";
									$query_update = mysql_query($sql_update);
									$objresult_update = mysql_fetch_array($query_update);
									echo "<script>alert('ทำรายการเรียบร้อย'); document.location.href='?page=vichakarn&work=register_application_personal_delete';</script>\n";
									//echo "<meta http-equiv='Refresh' content='1;URL=?page=vichakarn&work=register_personal_delete'>";
									}
									$search = @$_POST['search'];
									$chk =@$_POST['all'];
									mysql_select_db($database_main, $main);
									if($chk == 1)
									{
									$sql2 = "SELECT * FROM `data_personal`";
									}
									else
									{
									$sql2 = "SELECT * FROM `data_personal` WHERE `personal_id` LIKE '%$search%' OR `personal_firstname` = '%$search%' OR `personal_surname` = '%$search%'";
									}
									$sql = "$sql2";
									$query = mysql_query($sql);
									$objresult = mysql_fetch_array($query);
									$num_rows = mysql_num_rows($query);
									if(empty($search) && empty($chk))
									{
									?>
									<table width="1200px" border="0" style="font-family: 'Itim', cursive; font-size:18px">
									 <tbody>
										<tr>
										  <td width="100%" style="padding:45px 20px 5px 0px;"><center><font color="red" size="5px"><strong>กรุณากรอกข้อมูล</strong></font></center></td>
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
										  <td width="15%" style="padding:5px 20px 5px 0px;"><div align="center"><b>สถานะ</b></div></td>
										  <td width="15%" style="padding:5px 20px 5px 0px;"><div align="center"><b>การจัดการ</b></div></td>
										</tr>
										<? do { ?>
										<tr>
										  <td style="padding:5px 20px 5px 0px;"><?=$objresult['personal_id']?></td>
										  <td style="padding:5px 20px 5px 0px;"><?=$objresult['personal_firstname']?></td>
										  <td style="padding:5px 20px 5px 0px;"><?=$objresult['personal_surname']?></td>
										  <td style="padding:5px 20px 5px 0px;">
											  <div align="center">
											  <?
											  	if($objresult['user_status'] == 0)
												{
													echo "<img src='../infosystem_file/image/open.jpg' width='25%' title='สามารถใช้งานได้'>";
												}
											    else
												{
													echo "<img src='../infosystem_file/image/close.png' width='25%' title='ไม่สามารถใช้งานได้'>";
												}
											  ?>
											  </div>
										  </td>
										  <td style="padding:5px 20px 5px 0px;">
											  <div align="center">
											  <?
											  	if($objresult['user_status'] == 0)
												{
													echo "<a href='?page=vichakarn&work=register_personal_delete&id=".$objresult['personal_id']."&status=1'><input type='button' value='   ปิดบัญชี   ' style='background-color:#FF0033; color:white;'></a>";
												}
											    else
												{
													echo "<a href='?page=vichakarn&work=register_personal_delete&id=".$objresult['personal_id']."&status=0'><input type='button' value='  เปิดบัญชี  ' style='background-color:#33FF00; color:green;'></a>";
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