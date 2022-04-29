        <!-- About -->
		<div>
            <div class="container content-lg">
                <div class="row">
                    <div class="col-sm-7" id="about">
                        <div class="section-seperator margin-b-50">
                            <div class="margin-b-50">
                                <div class="margin-b-30">
                                    <p style="margin-bottom:25px;"><h2 style="font-family: 'Itim', cursive; padding-bottom:20px;">แก้ไขทะเบียนบุคลากร</h2></p>
 									<form method="post" action="#">
										<table width="100%" border="0" style="font-family: 'Itim', cursive; font-size:18px">
										  <tbody>
											<tr>
											  <td style="padding:5px 20px 5px 0px;">
												  <input type="text" name="search" placeholder="ค้นหาจากเลขประจำตัว, ชิ่อ, นามสกุล" size="35" /> 
												  <button type="submit" class="btn custom-btn">ค้นหา</button>
											  </td>
											</tr>
										  </tbody>
										</table>
									</form>
									<?
									$search = @$_POST['search'];
									mysql_select_db($database_main, $main);
									$sql = "SELECT * FROM `data_personal` WHERE `personal_id` = '$search' OR `personal_firstname` = '$search' OR `personal_surname` = '$search'"; 
									$query = mysql_query($sql);
									$objresult = mysql_fetch_array($query);
									$num_rows = mysql_num_rows($query);
									if(empty($search))
									{
									?>
									<table width="1200px" border="0" style="font-family: 'Itim', cursive; font-size:18px">
									 <tbody>
										<tr>
										  <td width="100%" style="padding:45px 20px 5px 0px;"><center><font color="red" size="5px"><strong>กรุณากรอกข้อมูลในข่องค้นหา</strong></font></center></td>
										</tr>
									 </tbody>
									</table>
									<?										
									}
									elseif($num_rows == 1)
									{
									?>
									<form method="post" action="page/vichakarn/register_personal_update.php">
                                    <table width="100%" border="0" style="font-family: 'Itim', cursive; font-size:18px">
									  <h3 style="padding:5px 20px 5px 0px;">ข้อมูลพื้นฐาน</h3>
                                      <tbody>
                                        <tr>
                                          <td width="15%" style="padding:5px 20px 5px 0px;">คำนำหน้าชื่อ</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">ชื่อ</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">นามสกุล</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">ชื่อเล่่น</td>
                                          <td width="25%" style="padding:5px 20px 5px 0px;">วันเกิด</td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_titlename = "SELECT * FROM tbl_titlename WHERE titlename_id >= '3'";
												$query_titlename = mysql_query($sql_titlename);
												$result_titlename = mysql_fetch_array($query_titlename);
												$total_titlename = mysql_num_rows($query_titlename);													
												mysql_select_db($database_main, $main);
												$sql_titlename2 = "SELECT * FROM tbl_titlename WHERE titlename_id = '".$objresult['titlename_id']."'";
												$query_titlename2 = mysql_query($sql_titlename2);
												$result_titlename2 = mysql_fetch_array($query_titlename2);
												$total_titlename2 = mysql_num_rows($query_titlename2);													
											?>
											<select name="titlename" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_titlename2['titlename_id']?>"><?=$result_titlename2['titlename_name'].' ('.$result_titlename2['titlename_name_eng'].')'?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$titlename_id = $result_titlename['titlename_id'];
												$titlename_name = $result_titlename['titlename_name'];
												$titlename_name_eng = $result_titlename['titlename_name_eng'];
											?>
												<option value="<?=$titlename_id?>"><?=$titlename_name.' ('.$titlename_name_eng.')'?></option>
											<? } while ($result_titlename = mysql_fetch_array($query_titlename)); ?>
												</optgroup>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="name" size="20" value="<?=$objresult['personal_firstname']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="surname" size="20" value="<?=$objresult['personal_surname']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="nickname" size="20" value="<?=$objresult['personal_nickname']?>" /></td>
										  <?
											$birthday = $objresult['personal_birthday'];
											$inbirth_y = substr($birthday,0,4)+543;
											$inbirth_m = substr($birthday,5,2);
											$inbirth_d = substr($birthday,-2,2);				
											$inbirth = $inbirth_d."/".$inbirth_m."/".$inbirth_y;	//แปลงวันเดือนปีเกิดจาก input text form
										  ?>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="birthday" size="20" value="<?=$inbirth?>" placeholder="รูปแบบ 01/01/2561" /></td>
                                        </tr>
                                        <tr>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">Name</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">Surname</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">ศาสนา</td>
                                          <td width="25%" style="padding:5px 20px 5px 0px;">สัญชาติ</td>
                                          <td width="15%" style="padding:5px 20px 5px 0px;">เชื้อชาติ</td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="name_eng" size="20" value="<?=$objresult['personal_firstname_eng']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="surname_eng" size="20" value="<?=$objresult['personal_surname_eng']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_religion = "SELECT * FROM tbl_religion";
												$query_religion = mysql_query($sql_religion);
												$result_religion = mysql_fetch_array($query_religion);
												$total_religion = mysql_num_rows($query_religion);													
												mysql_select_db($database_main, $main);
												$sql_religion2 = "SELECT * FROM tbl_religion WHERE religion_id = '".$objresult['religion_id']."'";
												$query_religion2 = mysql_query($sql_religion2);
												$result_religion2 = mysql_fetch_array($query_religion2);
												$total_religion2 = mysql_num_rows($query_religion2);													
											?>
											<select name="religion" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_religion2['religion_id']?>"><?=$result_religion2['religion_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$religion_id = $result_religion['religion_id'];
												$religion_name = $result_religion['religion_name'];
											?>
												<option value="<?=$religion_id?>"><?=$religion_name?></option>
											<? } while ($result_religion = mysql_fetch_array($query_religion)); ?>
												</optgroup>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_nationality = "SELECT * FROM tbl_nationality";
												$query_nationality = mysql_query($sql_nationality);
												$result_nationality = mysql_fetch_array($query_nationality);
												$total_nationality = mysql_num_rows($query_nationality);													
												mysql_select_db($database_main, $main);
												$sql_nationality2 = "SELECT * FROM tbl_nationality WHERE nationality_id = '".$objresult['nationality_id']."'";
												$query_nationality2 = mysql_query($sql_nationality2);
												$result_nationality2 = mysql_fetch_array($query_nationality2);
												$total_nationality2 = mysql_num_rows($query_nationality2);													
											?>
											<select name="nationality" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_nationality2['nationality_id']?>"><?=$result_nationality2['nationality_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$nationality_id = $result_nationality['nationality_id'];
												$nationality_name = $result_nationality['nationality_name'];
											?>
												<option value="<?=$nationality_id?>"><?=$nationality_name?></option>
											<? } while ($result_nationality = mysql_fetch_array($query_nationality)); ?>
												</optgroup>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_race = "SELECT * FROM tbl_race";
												$query_race = mysql_query($sql_race);
												$result_race = mysql_fetch_array($query_race);
												$total_race = mysql_num_rows($query_race);													
												mysql_select_db($database_main, $main);
												$sql_race2 = "SELECT * FROM tbl_race WHERE race_id = '".$objresult['race_id']."'";
												$query_race2 = mysql_query($sql_race2);
												$result_race2 = mysql_fetch_array($query_race2);
												$total_race2 = mysql_num_rows($query_race2);													
											?>
											<select name="race" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_race2['race_id']?>"><?=$result_race2['race_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$race_id = $result_race['race_id'];
												$race_name = $result_race['race_name'];
											?>
												<option value="<?=$race_id?>"><?=$race_name?></option>
											<? } while ($result_race = mysql_fetch_array($query_race)); ?>
												</optgroup>
											</select>
										  </td>
                                        </tr>
                                        <tr>
                                          <td width="15%" style="padding:5px 20px 5px 0px;">แผนก</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">เลขประจำตัวประชาชน</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">เพศ</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">วันเริ่มทำงาน</td>
                                          <td width="25%" style="padding:5px 20px 5px 0px;">เบอร์โทรศัพท์</td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_department = "SELECT * FROM tbl_department";
												$query_department = mysql_query($sql_department);
												$result_department = mysql_fetch_array($query_department);
												$total_department = mysql_num_rows($query_department);													
												mysql_select_db($database_main, $main);
												$sql_department2 = "SELECT * FROM tbl_department WHERE department_id = '".$objresult['pdep_id']."'";
												$query_department2 = mysql_query($sql_department2);
												$result_department2 = mysql_fetch_array($query_department2);
												$total_department2 = mysql_num_rows($query_department2);													
											?>
											<select name="department" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_department2['department_id']?>"><?=$result_department2['department_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$department_id = $result_department['department_id'];
												$department_name = $result_department['department_name'];
											?>
												<option value="<?=$department_id?>"><?=$department_name?></option>
											<? } while ($result_department = mysql_fetch_array($query_department)); ?>
												</optgroup>
											</select>
											</td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="card_id" size="20" value="<?=$objresult['card_id']?>" placeholder="รูปแบบ 1234567891234" /></td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_sex = "SELECT * FROM tbl_sex";
												$query_sex = mysql_query($sql_sex);
												$result_sex = mysql_fetch_array($query_sex);
												$total_sex = mysql_num_rows($query_sex);													
												mysql_select_db($database_main, $main);
												$sql_sex2 = "SELECT * FROM tbl_sex WHERE sex_id = '".$objresult['sex_id']."'";
												$query_sex2 = mysql_query($sql_sex2);
												$result_sex2 = mysql_fetch_array($query_sex2);
												$total_sex2 = mysql_num_rows($query_sex2);													
											?>
											<select name="sex" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_sex2['sex_id']?>"><?=$result_sex2['sex_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$sex_id = $result_sex['sex_id'];
												$sex_name = $result_sex['sex_name'];
											?>
												<option value="<?=$sex_id?>"><?=$sex_name?></option>
											<? } while ($result_sex = mysql_fetch_array($query_sex)); ?>
												</optgroup>
											</select>
										  </td>
										  <?
											$inworkstart = $objresult['personal_work'];
											$workstart_y = substr($inworkstart,0,4)+543;
											$workstart_m = substr($inworkstart,5,2);
											$workstart_d = substr($inworkstart,-2,2);				
											$workstart = $workstart_d."/".$workstart_m."/".$workstart_y;
										  ?>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="startwork" size="20" value="<?=$workstart?>" placeholder="รูปแบบ 01/01/2561" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="tel" size="20" value="<?=$objresult['personal_tel']?>" placeholder="รูปแบบ 0812345678" /></td>
                                        </tr>
                                        <tr>
                                          <td width="15%" style="padding:5px 20px 5px 0px;">E-Mail</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">น้ำหนัก</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">ส่วนสูง</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">กรุ๊ปเลือด</td>
                                          <td width="25%" style="padding:5px 20px 5px 0px;">แพ้ยา (ถ้ามี)</td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="email" value="<?=$objresult['personal_email']?>" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="weight" size="20" value="<?=$objresult['weight']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="hight" size="20" value="<?=$objresult['hight']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_blood = "SELECT * FROM tbl_blood";
												$query_blood = mysql_query($sql_blood);
												$result_blood = mysql_fetch_array($query_blood);
												$total_blood = mysql_num_rows($query_blood);													
												mysql_select_db($database_main, $main);
												$sql_blood2 = "SELECT * FROM tbl_blood WHERE blood_id = '".$objresult['blood']."'";
												$query_blood2 = mysql_query($sql_blood2);
												$result_blood2 = mysql_fetch_array($query_blood2);
												$total_blood2 = mysql_num_rows($query_blood2);													
											?>
											<select name="blood" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_blood2['blood_id']?>"><?=$result_blood2['blood_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$blood_id = $result_blood['blood_id'];
												$blood_name = $result_blood['blood_name'];
											?>
												<option value="<?=$blood_id?>"><?=$blood_name?></option>
											<? } while ($result_blood = mysql_fetch_array($query_blood)); ?>
												</optgroup>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="disease" value="<?=$objresult['disease']?>" size="20" /></td>
                                        </tr>
                                        <tr>
                                          <td width="15%" colspan="2" style="padding:5px 20px 5px 0px;">ที่อยู่</td>
                                          <td width="25%" style="padding:5px 20px 5px 0px;">งานอดิเรก</td>
                                          <td width="15%" style="padding:5px 20px 5px 0px;">ความสามารถพิเศษ</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">โรคประจำตัว (ถ้ามี)</td>
										</tr>                                        
										<tr>
                                          <td colspan="2" style="padding:0px 20px 5px 0px;"><input type="text" name="address" size="45" value="<?=$objresult['address']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="hobby" size="20" value="<?=$objresult['hobby']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="skill" size="20" value="<?=$objresult['skill']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="congenital_disease" size="20" value="<?=$objresult['congenital_disease']?>" /></td>
                                        </tr>
                                        <tr>
                                          <td width="15%" style="padding:5px 20px 5px 0px;">ปัจจุบันอาศัยอยู่กับ</td>
                                          <td width="20%" colspan="3" style="padding:5px 20px 5px 0px;">สถานภาพ</td>
										</tr>
 										<tr>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_livenow = "SELECT * FROM tbl_livenow";
												$query_livenow = mysql_query($sql_livenow);
												$result_livenow = mysql_fetch_array($query_livenow);
												$total_livenow = mysql_num_rows($query_livenow);													
												mysql_select_db($database_main, $main);
												$sql_livenow2 = "SELECT * FROM tbl_livenow WHERE livenow_id = '".$objresult['personal_livenow']."'";
												$query_livenow2 = mysql_query($sql_livenow2);
												$result_livenow2 = mysql_fetch_array($query_livenow2);
												$total_livenow2 = mysql_num_rows($query_livenow2);													
											?>
											<select name="livenow" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_livenow2['livenow_id']?>"><?=$result_livenow2['livenow_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$livenow_id = $result_livenow['livenow_id'];
												$livenow_name = $result_livenow['livenow_name'];
											?>
												<option value="<?=$livenow_id?>"><?=$livenow_name?></option>
											<? } while ($result_livenow = mysql_fetch_array($query_livenow)); ?>
												</optgroup>
											</select>
										  </td>
                                          <td colspan="3" style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_marital = "SELECT * FROM tbl_marital";
												$query_marital = mysql_query($sql_marital);
												$result_marital = mysql_fetch_array($query_marital);
												$total_marital = mysql_num_rows($query_marital);													
												mysql_select_db($database_main, $main);
												$sql_marital2 = "SELECT * FROM tbl_marital WHERE marital_id = '".$objresult['marital_status']."'";
												$query_marital2 = mysql_query($sql_marital2);
												$result_marital2 = mysql_fetch_array($query_marital2);
												$total_marital2 = mysql_num_rows($query_marital2);													
											?>
											<select name="marital_status" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_marital2['marital_id']?>"><?=$result_marital2['marital_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$marital_id = $result_marital['marital_id'];
												$marital_name = $result_marital['marital_name'];
											?>
												<option value="<?=$marital_id?>"><?=$marital_name?></option>
											<? } while ($result_marital = mysql_fetch_array($query_marital)); ?>
												</optgroup>
											</select>
										  </td>
                                        </tr>
                                        <tr>
                                          <td width="15%" colspan="5" style="padding:5px 20px 5px 0px;">กรณีแต่งงานแล้ว กรอกข้อมูลต่อไปนี้</td>
										</tr>
										<tr>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">ชื่อคู่สมรส</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">นามสกุลคู่สมรส</td>
                                          <td width="25%" style="padding:5px 20px 5px 0px;">วันเกิดคู่สมรส</td>
										</tr>                                        
 										<tr>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="marital_name" size="20" value="<?=$objresult['marital_firstname']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="marital_surname" size="20" value="<?=$objresult['marital_surname']?>" /></td>
										  <?
											$inmarital = $objresult['marital_birthday'];
											$marital_y = substr($inmarital,0,4)+543;
											$marital_m = substr($inmarital,5,2);
											$marital_d = substr($inmarital,-2,2);				
											$marital = $marital_d."/".$marital_m."/".$marital_y;
										  ?>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="marital_birthday" size="20" value="<?=$marital?>" placeholder="รูปแบบ 01/01/2561" /></td>
                                        </tr>
                                      </tbody>
                                    </table><hr />
                                    <table width="100%" border="0" style="font-family: 'Itim', cursive; font-size:18px">
									  <h3 style="padding:5px 20px 5px 0px;">ข้อมูลครอบครัว</h3>
                                      <tbody>
										<tr>
                                          <td width="15%" style="padding:5px 20px 5px 0px;">ชื่อบิดา</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">นามสกุลบิดา</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">วัน/เดือน/ปี เกิดบิดา</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">สถานะบิดา</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">อาชีพบิดา</td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_name" size="20" value="<?=$objresult['father_name']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_surname" size="20" value="<?=$objresult['father_surname']?>" /></td>
										  <?
											$father_birthday = $objresult['father_birthday'];
											$father_inbirth_y = substr($father_birthday,0,4)+543;
											$father_inbirth_m = substr($father_birthday,5,2);
											$father_inbirth_d = substr($father_birthday,-2,2);				
											$father_inbirth = $father_inbirth_d."/".$father_inbirth_m."/".$father_inbirth_y;	//แปลงวันเดือนปีเกิดจาก input text form
										  ?>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_birthday" size="20" value="<?=$father_inbirth?>" placeholder="รูปแบบ 01/01/2561" /></td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_status = "SELECT * FROM tbl_status";
												$query_status = mysql_query($sql_status);
												$result_status = mysql_fetch_array($query_status);
												$total_status = mysql_num_rows($query_status);													
												mysql_select_db($database_main, $main);
												$sql_status2 = "SELECT * FROM tbl_status WHERE status_id = '".$objresult['father_status']."'";
												$query_status2 = mysql_query($sql_status2);
												$result_status2 = mysql_fetch_array($query_status2);
												$total_status2 = mysql_num_rows($query_status2);													
											?>
											<select name="father_status" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_status2['status_id']?>"><?=$result_status2['status_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$status_id = $result_status['status_id'];
												$status_name = $result_status['status_name'];
											?>
												<option value="<?=$status_id?>"><?=$status_name?></option>
											<? } while ($result_status = mysql_fetch_array($query_status)); ?>
												</optgroup>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_occupation = "SELECT * FROM tbl_occupation";
												$query_occupation = mysql_query($sql_occupation);
												$result_occupation = mysql_fetch_array($query_occupation);
												$total_occupation = mysql_num_rows($query_occupation);													
												mysql_select_db($database_main, $main);
												$sql_occupation2 = "SELECT * FROM tbl_occupation WHERE occ_id = '".$objresult['father_job']."'";
												$query_occupation2 = mysql_query($sql_occupation2);
												$result_occupation2 = mysql_fetch_array($query_occupation2);
												$total_occupation2 = mysql_num_rows($query_occupation2);													
											?>
											<select name="father_job" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_occupation['occ_id']?>"><?=$result_occupation['occ_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$occupation_id = $result_occupation['occ_id'];
												$occupation_name = $result_occupation['occ_name'];
											?>
												<option value="<?=$occupation_id?>"><?=$occupation_name?></option>
											<? } while ($result_occupation = mysql_fetch_array($query_occupation)); ?>
												</optgroup>
											</select>
										  </td>
                                        </tr>
										<tr>
                                          <td width="15%" style="padding:5px 20px 5px 0px;">ชื่อมารดา</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">นามสกุลมารดา</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">วัน/เดือน/ปี เกิดมารดา</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">สถานะมารดา</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">อาชีพมารดา</td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_name" size="20" value="<?=$objresult['mother_name']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_surname" size="20" value="<?=$objresult['mother_surname']?>" /></td>
										  <?
											$mother_birthday = $objresult['mother_birthday'];
											$mother_inbirth_y = substr($mother_birthday,0,4)+543;
											$mother_inbirth_m = substr($mother_birthday,5,2);
											$mother_inbirth_d = substr($mother_birthday,-2,2);				
											$mother_inbirth = $mother_inbirth_d."/".$mother_inbirth_m."/".$mother_inbirth_y;	//แปลงวันเดือนปีเกิดจาก input text form
										  ?>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_birthday" size="20" value="<?=$mother_inbirth?>" placeholder="รูปแบบ 01/01/2561" /></td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_status = "SELECT * FROM tbl_status";
												$query_status = mysql_query($sql_status);
												$result_status = mysql_fetch_array($query_status);
												$total_status = mysql_num_rows($query_status);													
												mysql_select_db($database_main, $main);
												$sql_status2 = "SELECT * FROM tbl_status WHERE status_id = '".$objresult['mother_status']."'";
												$query_status2 = mysql_query($sql_status2);
												$result_status2 = mysql_fetch_array($query_status2);
												$total_status2 = mysql_num_rows($query_status2);													
											?>
											<select name="mother_status" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_status2['status_id']?>"><?=$result_status2['status_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$status_id = $result_status['status_id'];
												$status_name = $result_status['status_name'];
											?>
												<option value="<?=$status_id?>"><?=$status_name?></option>
											<? } while ($result_status = mysql_fetch_array($query_status)); ?>
												</optgroup>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_occupation = "SELECT * FROM tbl_occupation";
												$query_occupation = mysql_query($sql_occupation);
												$result_occupation = mysql_fetch_array($query_occupation);
												$total_occupation = mysql_num_rows($query_occupation);													
												mysql_select_db($database_main, $main);
												$sql_occupation2 = "SELECT * FROM tbl_occupation WHERE occ_id = '".$objresult['mother_job']."'";
												$query_occupation2 = mysql_query($sql_occupation2);
												$result_occupation2 = mysql_fetch_array($query_occupation2);
												$total_occupation2 = mysql_num_rows($query_occupation2);													
											?>
											<select name="mother_job" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_occupation['occ_id']?>"><?=$result_occupation['occ_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$occupation_id = $result_occupation['occ_id'];
												$occupation_name = $result_occupation['occ_name'];
											?>
												<option value="<?=$occupation_id?>"><?=$occupation_name?></option>
											<? } while ($result_occupation = mysql_fetch_array($query_occupation)); ?>
												</optgroup>
											</select>
										  </td>
                                        </tr>
                                        <tr>
                                          <td width="15%" colspan="5" style="padding:5px 20px 5px 0px;">บุคคลที่สามารถติดต่อได้</td>
										</tr>
										<tr>
                                          <td width="15%" style="padding:5px 20px 5px 0px;">ชื่อ</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">นามสกุล</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">เกี่ยวข้องเป็น</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">เบอร์โทรศัพท์</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;"></td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="person_name" size="20" value="<?=$objresult['person_name']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="person_surname" size="20" value="<?=$objresult['person_surname']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_relation = "SELECT * FROM tbl_relation";
												$query_relation = mysql_query($sql_relation);
												$result_relation = mysql_fetch_array($query_relation);
												$total_relation = mysql_num_rows($query_relation);													
												mysql_select_db($database_main, $main);
												$sql_relation2 = "SELECT * FROM tbl_relation WHERE relation_id = '".$objresult['person_relation']."'";
												$query_relation2 = mysql_query($sql_relation2);
												$result_relation2 = mysql_fetch_array($query_relation2);
												$total_relation2 = mysql_num_rows($query_relation2);													
											?>
											<select name="person_relation" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_relation2['relation_id']?>"><?=$result_relation2['relation_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$relation_id = $result_relation['relation_id'];
												$relation_name = $result_relation['relation_name'];
											?>
												<option value="<?=$relation_id?>"><?=$relation_name?></option>
											<? } while ($result_relation = mysql_fetch_array($query_relation)); ?>
												</optgroup>
											</select>
										  </td>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="person_tel" size="20" value="<?=$objresult['person_tel']?>" placeholder="รูปแบบ 0812345678" /></td>
										  <td style="padding:0px 20px 5px 0px;"></td>
									    </tr>
										<tr>
										  <td colspan="2" style="padding:0px 20px 5px 0px;">ที่อยู่</td>
										  <td style="padding:0px 20px 5px 0px;"></td>
										  <td style="padding:0px 20px 5px 0px;"></td>
										  <td style="padding:0px 20px 5px 0px;"></td>
                                        </tr>
										<tr>
										  <td colspan="2" style="padding:0px 20px 5px 0px;"><input type="text" name="person_address" size="45" value="<?=$objresult['person_address']?>" /></td>
										  <td style="padding:0px 20px 5px 0px;"></td>
										  <td style="padding:0px 20px 5px 0px;"></td>
										  <td style="padding:0px 20px 5px 0px;"></td>
                                        </tr>
                                      </tbody>
                                    </table><hr />
                                    <table width="100%" border="0" style="font-family: 'Itim', cursive; font-size:18px">
									  <h3 style="padding:5px 20px 5px 0px;">ข้อมูลการศึกษา</h3>
                                      <tbody>
										<tr>
                                          <td width="15%" style="padding:5px 20px 5px 0px;">วุฒิการศึกษา</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">จบจากมหาวิทยาลัย</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">สาขา / เอก</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">หลักสูตร</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">ปี พ.ศ. ที่จบการศึกษา</td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_edulevel = "SELECT * FROM tbl_edulevel";
												$query_edulevel = mysql_query($sql_edulevel);
												$result_edulevel = mysql_fetch_array($query_edulevel);
												$total_edulevel = mysql_num_rows($query_edulevel);													
												mysql_select_db($database_main, $main);
												$sql_edulevel2 = "SELECT * FROM tbl_edulevel WHERE edulevel_id = '".$objresult['edu_level_id']."'";
												$query_edulevel2 = mysql_query($sql_edulevel2);
												$result_edulevel2 = mysql_fetch_array($query_edulevel2);
												$total_edulevel2 = mysql_num_rows($query_edulevel2);													
											?>
											<select name="edu_level" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_edulevel2['edulevel_id']?>"><?=$result_edulevel2['edulevel_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$edulevel_id = $result_edulevel['edulevel_id'];
												$edulevel_name = $result_edulevel['edulevel_name'];
											?>
												<option value="<?=$edulevel_id?>"><?=$edulevel_name?></option>
											<? } while ($result_edulevel = mysql_fetch_array($query_edulevel)); ?>
												</optgroup>
											</select>
										  </td>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="edu_university" size="20" value="<?=$objresult['edu_university']?>" /></td>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="edu_sec" size="20" value="<?=$objresult['edu_sec']?>" /></td>
										  <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_course = "SELECT * FROM tbl_course";
												$query_course = mysql_query($sql_course);
												$result_course = mysql_fetch_array($query_course);
												$total_course = mysql_num_rows($query_course);													
												mysql_select_db($database_main, $main);
												$sql_course2 = "SELECT * FROM tbl_course WHERE course_id = '".$objresult['edu_course']."'";
												$query_course2 = mysql_query($sql_course2);
												$result_course2 = mysql_fetch_array($query_course2);
												$total_course2 = mysql_num_rows($query_course2);													
											?>
											<select name="edu_course" style="width:200px;">
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_course2['course_id']?>"><?=$result_course2['course_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$course_id = $result_course['course_id'];
												$course_name = $result_course['course_name'];
											?>
												<option value="<?=$course_id?>"><?=$course_name?></option>
											<? } while ($result_course = mysql_fetch_array($query_course)); ?>
												</optgroup>
											</select>
										  </td>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="edu_endstudy" size="20" value="<?=$objresult['edu_endstudy']?>" /></td>
                                        </tr>
                                      </tbody>
                                    </table><hr />
								    <table width="100%" border="0" style="font-family: 'Itim', cursive; font-size:18px">
									  <h3 style="padding:5px 20px 5px 0px;">ข้อมูลการทำงาน</h3>
                                      <tbody>
										<tr>
                                          <td width="15%" style="padding:5px 20px 5px 0px;">ตำแหน่ง</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">ตำแหน่งงาน</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">วิชา / กลุ่มสาระ</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;"></td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;"></td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_position = "SELECT * FROM tbl_position";
												$query_position = mysql_query($sql_position);
												$result_position = mysql_fetch_array($query_position);
												$total_position = mysql_num_rows($query_position);													
												mysql_select_db($database_main, $main);
												$sql_position2 = "SELECT * FROM tbl_position WHERE position_id = '".$objresult['position_id']."'";
												$query_position2 = mysql_query($sql_position2);
												$result_position2 = mysql_fetch_array($query_position2);
												$total_position2 = mysql_num_rows($query_position2);													
											?>
											<select name="position" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_position2['position_id']?>"><?=$result_position2['position_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$position_id = $result_position['position_id'];
												$position_name = $result_position['position_name'];
											?>
												<option value="<?=$position_id?>"><?=$position_name?></option>
											<? } while ($result_position = mysql_fetch_array($query_position)); ?>
												</optgroup>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_position_party = "SELECT * FROM tbl_position_party";
												$query_position_party = mysql_query($sql_position_party);
												$result_position_party = mysql_fetch_array($query_position_party);
												$total_position_party = mysql_num_rows($query_position_party);													
												mysql_select_db($database_main, $main);
												$sql_position_party2 = "SELECT * FROM tbl_position_party WHERE party_id = '".$objresult['position_party_id']."'";
												$query_position_party2 = mysql_query($sql_position_party2);
												$result_position_party2 = mysql_fetch_array($query_position_party2);
												$total_position_party2 = mysql_num_rows($query_position_party2);													
											?>
											<select name="position_party" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_position_party2['party_id']?>"><?=$result_position_party2['party_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$position_party_id = $result_position_party['party_id'];
												$position_party_name = $result_position_party['party_name'];
											?>
												<option value="<?=$position_party_id?>"><?=$position_party_name?></option>
											<? } while ($result_position_party = mysql_fetch_array($query_position_party)); ?>
												</optgroup>
											</select>
										  </td>
										  <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_subjectgroup = "SELECT * FROM tbl_subjectgroup";
												$query_subjectgroup = mysql_query($sql_subjectgroup);
												$result_subjectgroup = mysql_fetch_array($query_subjectgroup);
												$total_subjectgroup = mysql_num_rows($query_subjectgroup);													
												mysql_select_db($database_main, $main);
												$sql_subjectgroup2 = "SELECT * FROM tbl_subjectgroup WHERE subjectgroup_id = '".$objresult['subject_group']."'";
												$query_subjectgroup2 = mysql_query($sql_subjectgroup2);
												$result_subjectgroup2 = mysql_fetch_array($query_subjectgroup2);
												$total_subjectgroup2 = mysql_num_rows($query_subjectgroup2);													
											?>
											<select name="subjectgroup" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_subjectgroup2['subjectgroup_id']?>"><?=$result_subjectgroup2['subjectgroup_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$subjectgroup_id = $result_subjectgroup['subjectgroup_id'];
												$subjectgroup_name = $result_subjectgroup['subjectgroup_name'];
											?>
												<option value="<?=$subjectgroup_id?>"><?=$subjectgroup_name?></option>
											<? } while ($result_subjectgroup = mysql_fetch_array($query_subjectgroup)); ?>
												</optgroup>
											</select>
										  </td>
										  <td style="padding:0px 20px 5px 0px;"></td>
										  <td style="padding:0px 20px 5px 0px;"></td>
                                        </tr>
                                      </tbody>
                                    </table><hr />
								    <table width="100%" border="0" style="font-family: 'Itim', cursive; font-size:18px">
                                      <tbody>
										<tr>
                                          <td width="100%" style="padding:0px 20px 5px 0px;">
											<input type="hidden" name="id" value="<?=$objresult['personal_id']?>" />
											<button type="submit" class="btn custom-btn" data-loading-text="Loading...">แก้ไขทะเบียน</button>
											<button type="reset" class="btn custom-btn" style="background-color:red;" data-loading-text="Loading...">รีเซ็ต</button>
										  </td>
                                        </tr>
                                      </tbody>
                                    </table>
									</form>
									<?
									}
									elseif($num_rows > 1)
									{
									?>
									<h4 style="padding:5px 20px 5px 0px; color:red;">กรณีมีรายชื่อมากกว่า 1 รายการ ให้นำเลขประจำตัวที่ทราบกรอกลงในข่องค้นหาอีกครั้ง</h4>
									<table width="1300px" border="0" style="font-family: 'Itim', cursive; font-size:18px">
									 <tbody>
										<tr>
										  <td width="20%" style="padding:5px 20px 5px 0px;"><b>เลขประจำตัว</b></td>
										  <td width="20%" style="padding:5px 20px 5px 0px;"><b>ชิ่อ</b></td>
										  <td width="20%" style="padding:5px 20px 5px 0px;"><b>นามสกุล</b></td>
										  <td width="20%" style="padding:5px 20px 5px 0px;"><b></b></td>
										  <td width="20%" style="padding:5px 20px 5px 0px;"><b></b></td>
										</tr>
										<? do { ?>
										<tr>
										  <td width="20%" style="padding:5px 20px 5px 0px;"><?=$objresult['personal_id']?></td>
										  <td width="20%" style="padding:5px 20px 5px 0px;"><?=$objresult['personal_firstname']?></td>
										  <td width="20%" style="padding:5px 20px 5px 0px;"><?=$objresult['personal_surname']?></td>
										  <td width="20%" style="padding:5px 20px 5px 0px;"></td>
										  <td width="20%" style="padding:5px 20px 5px 0px;"></td>
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