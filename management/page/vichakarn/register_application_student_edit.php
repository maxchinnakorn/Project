        <!-- About -->
		<div>
            <div class="container content-lg">
                <div class="row">
                    <div class="col-sm-7" id="about">
                        <div class="section-seperator margin-b-50">
                            <div class="margin-b-50">
                                <div class="margin-b-30">
                                    <p style="margin-bottom:25px;"><h2 style="font-family: 'Itim', cursive; padding-bottom:20px;">แก้ไขทะเบียนนักเรียน</h2></p>
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
									$sql = "SELECT * FROM `data_student` WHERE `student_id` = '$search' OR `student_firstname` = '$search' OR `student_surname` = '$search'"; 
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
									<form method="post" action="page/vichakarn/register_student_update.php">
                                    <table width="100%" border="0" style="font-family: 'Itim', cursive; font-size:18px">
									  <h3 style="padding:5px 20px 5px 0px;">ข้อมูลพื้นฐาน</h3>
                                      <tbody>
                                        <tr>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">เลขประจำตัว</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">คำนำหน้าชื่อ</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">ชื่อ</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">นามสกุล</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">ชื่อเล่่น</td>
										</tr>                                        
										<tr>
                                          <td width="15%" style="padding:5px 20px 5px 0px;"><input type="text" name="id" size="20" value="<?=$objresult['student_id']?>" readonly /></td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_titlename = "SELECT * FROM tbl_titlename WHERE titlename_id <= '4'";
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
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="name" size="20" value="<?=$objresult['student_firstname']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="surname" value="<?=$objresult['student_surname']?>" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="nickname" size="20" value="<?=$objresult['student_nickname']?>" /></td>
                                        </tr>
                                        <tr>
                                          <td width="25%" style="padding:5px 20px 5px 0px;">วันเกิด</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">Name</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">Surname</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">ศาสนา</td>
                                          <td width="25%" style="padding:5px 20px 5px 0px;">สัญชาติ</td>
										</tr>                                        
										<tr>
										  <?
											$birthday = $objresult['student_birthday'];
											$inbirth_y = substr($birthday,0,4)+543;
											$inbirth_m = substr($birthday,5,2);
											$inbirth_d = substr($birthday,-2,2);				
											$inbirth = $inbirth_d."/".$inbirth_m."/".$inbirth_y;	//แปลงวันเดือนปีเกิดจาก input text form
										  ?>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="birthday" size="20" value="<?=$inbirth?>" placeholder="รูปแบบ 01/01/2561" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="name_eng" size="20" value="<?=$objresult['student_firstname_eng']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="surname_eng" size="20" value="<?=$objresult['student_surname_eng']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_religion = "SELECT * FROM tbl_religion";
												$query_religion = mysql_query($sql_religion);
												$result_religion = mysql_fetch_array($query_religion);
												$total_religion = mysql_num_rows($query_religion);													
												mysql_select_db($database_main, $main);
												$sql_religion2 = "SELECT * FROM tbl_religion WHERE religion_id = '".$objresult['student_religion']."'";
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
												$sql_nationality2 = "SELECT * FROM tbl_nationality WHERE nationality_id = '".$objresult['student_nationality']."'";
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
                                        </tr>
                                        <tr>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">เชื้อชาติ</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">เลขประจำตัวประชาชน</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">เพศ</td>
                                          <td width="25%" style="padding:5px 20px 5px 0px;">เบอร์โทรศัพท์</td>
	                                      <td width="15%" style="padding:5px 20px 5px 0px;">E-Mail</td>
									    </tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_race = "SELECT * FROM tbl_race";
												$query_race = mysql_query($sql_race);
												$result_race = mysql_fetch_array($query_race);
												$total_race = mysql_num_rows($query_race);													
												mysql_select_db($database_main, $main);
												$sql_race2 = "SELECT * FROM tbl_race WHERE race_id = '".$objresult['student_race']."'";
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
                                     	  <td style="padding:0px 20px 5px 0px;"><input type="text" name="card_id" size="20" value="<?=$objresult['card_id']?>" placeholder="รูปแบบ 1234567891234" /></td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_sex = "SELECT * FROM tbl_sex";
												$query_sex = mysql_query($sql_sex);
												$result_sex = mysql_fetch_array($query_sex);
												$total_sex = mysql_num_rows($query_sex);													
												mysql_select_db($database_main, $main);
												$sql_sex2 = "SELECT * FROM tbl_sex WHERE sex_id = '".$objresult['student_sex']."'";
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
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="tel" size="20" value="<?=$objresult['student_tel']?>" placeholder="รูปแบบ 0812345678" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="email" size="20" value="<?=$objresult['student_email']?>" /></td>
                                        </tr>
                                        <tr>
                                          <td style="padding:5px 20px 5px 0px;">บ้านเลขที่</td>
                                          <td style="padding:5px 20px 5px 0px;">หมู่</td>
                                          <td style="padding:5px 20px 5px 0px;">ซอย / เขต</td>
                                          <td style="padding:5px 20px 5px 0px;">ถนน</td>
                                          <td style="padding:5px 20px 5px 0px;">ตำบล</td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="address" size="20" value="<?=$objresult['student_address']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="moo" size="20" value="<?=$objresult['student_address_moo']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="soi" size="20" value="<?=$objresult['student_address_soi']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="road" size="20" value="<?=$objresult['student_address_road']?>" /></td>
										  <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_tumbol = "SELECT * FROM tbl_loc_1tumbol ORDER BY tumbol_name ASC";
												$query_tumbol = mysql_query($sql_tumbol);
												$result_tumbol = mysql_fetch_array($query_tumbol);
												$total_tumbol = mysql_num_rows($query_tumbol);													
												mysql_select_db($database_main, $main);
												$sql_tumbol2 = "SELECT * FROM tbl_loc_1tumbol WHERE tumbol_id = '".$objresult['student_address_tumbol']."' AND amphur_id = '".$objresult['student_address_amphur']."' AND province_id = '".$objresult['student_address_province']."'";
												$query_tumbol2 = mysql_query($sql_tumbol2);
												$result_tumbol2 = mysql_fetch_array($query_tumbol2);
												$total_tumbol2 = mysql_num_rows($query_tumbol2);													
											?>
											<select name="tumbol" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_tumbol2['tumbol_id']?>"><?=$result_tumbol2['tumbol_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$tumbol_id = $result_tumbol['tumbol_id'];
												$tumbol_name = $result_tumbol['tumbol_name'];
											?>
												<option value="<?=$tumbol_id?>"><?=$tumbol_name?></option>
											<? } while ($result_tumbol = mysql_fetch_array($query_tumbol)); ?>
												</optgroup>
											</select>
										  </td>
                                        </tr>
                                        <tr>
                                          <td style="padding:5px 20px 5px 0px;">อำเภอ</td>
                                          <td style="padding:5px 20px 5px 0px;">จังหวัด</td>
                                          <td style="padding:5px 20px 5px 0px;">รหัสไปรษณีย์</td>
                                          <td style="padding:5px 20px 5px 0px;">งานอดิเรก</td>
                                          <td style="padding:5px 20px 5px 0px;">ความสามารถพิเศษ</td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_amphur = "SELECT * FROM tbl_loc_2amphur ORDER BY amphur_name ASC";
												$query_amphur = mysql_query($sql_amphur);
												$result_amphur = mysql_fetch_array($query_amphur);
												$total_amphur = mysql_num_rows($query_amphur);													
												mysql_select_db($database_main, $main);
												$sql_amphur2 = "SELECT * FROM tbl_loc_2amphur WHERE amphur_id = '".$objresult['student_address_amphur']."' AND province_id = '".$objresult['student_address_province']."'";
												$query_amphur2 = mysql_query($sql_amphur2);
												$result_amphur2 = mysql_fetch_array($query_amphur2);
												$total_amphur2 = mysql_num_rows($query_amphur2);													
											?>
											<select name="amphur" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_amphur2['amphur_id']?>"><?=$result_amphur2['amphur_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$amphur_id = $result_amphur['amphur_id'];
												$amphur_name = $result_amphur['amphur_name'];
											?>
												<option value="<?=$amphur_id?>"><?=$amphur_name?></option>
											<? } while ($result_amphur = mysql_fetch_array($query_amphur)); ?>
												</optgroup>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_province = "SELECT * FROM tbl_loc_3province ORDER BY province_name ASC";
												$query_province = mysql_query($sql_province);
												$result_province = mysql_fetch_array($query_province);
												$total_province = mysql_num_rows($query_province);													
												mysql_select_db($database_main, $main);
												$sql_province2 = "SELECT * FROM tbl_loc_3province WHERE province_id = '".$objresult['student_address_province']."'";
												$query_province2 = mysql_query($sql_province2);
												$result_province2 = mysql_fetch_array($query_province2);
												$total_province2 = mysql_num_rows($query_province2);													
											?>
											<select name="province" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_province2['province_id']?>"><?=$result_province2['province_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$province_id = $result_province['province_id'];
												$province_name = $result_province['province_name'];
											?>
												<option value="<?=$province_id?>"><?=$province_name?></option>
											<? } while ($result_province = mysql_fetch_array($query_province)); ?>
												</optgroup>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="zipcode" size="20" value="<?=$objresult['student_address_zip']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="hobby" size="20" value="<?=$objresult['student_hobby']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="skill" size="20" value="<?=$objresult['student_skill']?>" /></td>
                                        </tr>
                                        <tr>
                                          <td style="padding:5px 20px 5px 0px;">น้ำหนัก</td>
                                          <td style="padding:5px 20px 5px 0px;">ส่วนสูง</td>
                                          <td style="padding:5px 20px 5px 0px;">กรุ๊ปเลือด</td>
                                          <td style="padding:5px 20px 5px 0px;">แพ้ยา (ถ้ามี)</td>
                                          <td style="padding:5px 20px 5px 0px;">โรคประจำตัว (ถ้ามี)</td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="weight" size="20" value="<?=$objresult['student_weight']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="hight" size="20" value="<?=$objresult['student_hight']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_blood = "SELECT * FROM tbl_blood";
												$query_blood = mysql_query($sql_blood);
												$result_blood = mysql_fetch_array($query_blood);
												$total_blood = mysql_num_rows($query_blood);													
												mysql_select_db($database_main, $main);
												$sql_blood2 = "SELECT * FROM tbl_blood WHERE blood_id = '".$objresult['student_blood']."'";
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
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="disease" size="20" value="<?=$objresult['student_disease']?>" /></td>
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
												$sql_livenow2 = "SELECT * FROM tbl_livenow WHERE livenow_id = '".$objresult['person_livenow']."'";
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
                                      </tbody>
                                    </table><hr />
                                    <table width="100%" border="0" style="font-family: 'Itim', cursive; font-size:18px">
									  <h3 style="padding:5px 20px 5px 0px;">ข้อมูลครอบครัว</h3>
                                      <tbody>
										<tr>
                                          <td style="padding:5px 20px 5px 0px;"><h4>ข้อมูลบิดา</h4></td>
										</tr>                                        
										<tr>
                                          <td style="padding:5px 20px 5px 0px;">ความสัมพันธ์บิดามารดา</td>
										</tr>                                        
										<tr>
                                          <td style="padding:5px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_parentsrelation = "SELECT * FROM tbl_parentsrelation";
												$query_parentsrelation = mysql_query($sql_parentsrelation);
												$result_parentsrelation = mysql_fetch_array($query_parentsrelation);
												$total_parentsrelation = mysql_num_rows($query_parentsrelation);													
												mysql_select_db($database_main, $main);
												$sql_parentsrelation2 = "SELECT * FROM tbl_parentsrelation WHERE parents_id = '".$objresult['parents_relation']."'";
												$query_parentsrelation2 = mysql_query($sql_parentsrelation2);
												$result_parentsrelation2 = mysql_fetch_array($query_parentsrelation2);
												$total_parentsrelation2 = mysql_num_rows($query_parentsrelation2);													
											?>
											<select name="parents_relation" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_parentsrelation2['parents_id']?>"><?=$result_parentsrelation2['parents_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$parents_id = $result_parentsrelation['parents_id'];
												$parents_name = $result_parentsrelation['parents_name'];
											?>
												<option value="<?=$parents_id?>"><?=$parents_name?></option>
											<? } while ($result_parentsrelation = mysql_fetch_array($query_parentsrelation)); ?>
												</optgroup>
											</select>
										  </td>
										</tr>                                        
										<tr>
                                          <td width="15%" style="padding:5px 20px 5px 0px;">ชื่อบิดา</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">นามสกุลบิดา</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">วัน/เดือน/ปี เกิดบิดา</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">สถานะบิดา</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">อาชีพบิดา</td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_name" size="20" value="<?=$objresult['father_firstname']?>" /></td>
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
												$sql_occupation2 = "SELECT * FROM tbl_occupation WHERE occ_id = '".$objresult['father_occ']."'";
												$query_occupation2 = mysql_query($sql_occupation2);
												$result_occupation2 = mysql_fetch_array($query_occupation2);
												$total_occupation2 = mysql_num_rows($query_occupation2);													
											?>
											<select name="father_occ" style="width:200px;" required>
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
                                          <td style="padding:5px 20px 5px 0px;">บ้านเลขที่</td>
                                          <td style="padding:5px 20px 5px 0px;">หมู่</td>
                                          <td style="padding:5px 20px 5px 0px;">ซอย / เขต</td>
                                          <td style="padding:5px 20px 5px 0px;">ถนน</td>
                                          <td style="padding:5px 20px 5px 0px;">ตำบล</td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_address" size="20" value="<?=$objresult['father_address']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_moo" size="20" value="<?=$objresult['father_address_moo']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_soi" size="20" value="<?=$objresult['father_address_soi']?>" /></td>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_road" size="20" value="<?=$objresult['father_address_road']?>" /></td>
										  <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_tumbol = "SELECT * FROM tbl_loc_1tumbol ORDER BY tumbol_name ASC";
												$query_tumbol = mysql_query($sql_tumbol);
												$result_tumbol = mysql_fetch_array($query_tumbol);
												$total_tumbol = mysql_num_rows($query_tumbol);													
												mysql_select_db($database_main, $main);
												$sql_tumbol2 = "SELECT * FROM tbl_loc_1tumbol WHERE tumbol_id = '".$objresult['father_address_tumbol']."' AND amphur_id = '".$objresult['father_address_amphur']."' AND province_id = '".$objresult['father_address_province']."'";
												$query_tumbol2 = mysql_query($sql_tumbol2);
												$result_tumbol2 = mysql_fetch_array($query_tumbol2);
												$total_tumbol2 = mysql_num_rows($query_tumbol2);													
											?>
											<select name="father_tumbol" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_tumbol2['tumbol_id']?>"><?=$result_tumbol2['tumbol_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$tumbol_id = $result_tumbol['tumbol_id'];
												$tumbol_name = $result_tumbol['tumbol_name'];
											?>
												<option value="<?=$tumbol_id?>"><?=$tumbol_name?></option>
											<? } while ($result_tumbol = mysql_fetch_array($query_tumbol)); ?>
												</optgroup>
											</select>
										  </td>
                                        </tr>
										<tr>
                                          <td style="padding:5px 20px 5px 0px;">อำเภอ</td>
                                          <td style="padding:5px 20px 5px 0px;">จังหวัด</td>
                                          <td style="padding:5px 20px 5px 0px;">รหัสไปรษณีย์</td>
                                          <td style="padding:5px 20px 5px 0px;">เบอร์โทรศัพท์บิดา</td>
                                          <td style="padding:5px 20px 5px 0px;">ที่อยู่ที่ทำงาน</td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_amphur = "SELECT * FROM tbl_loc_2amphur ORDER BY amphur_name ASC";
												$query_amphur = mysql_query($sql_amphur);
												$result_amphur = mysql_fetch_array($query_amphur);
												$total_amphur = mysql_num_rows($query_amphur);													
												mysql_select_db($database_main, $main);
												$sql_amphur2 = "SELECT * FROM tbl_loc_2amphur WHERE amphur_id = '".$objresult['father_address_amphur']."' AND province_id = '".$objresult['father_address_province']."'";
												$query_amphur2 = mysql_query($sql_amphur2);
												$result_amphur2 = mysql_fetch_array($query_amphur2);
												$total_amphur2 = mysql_num_rows($query_amphur2);													
											?>
											<select name="father_amphur" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_amphur2['amphur_id']?>"><?=$result_amphur2['amphur_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$amphur_id = $result_amphur['amphur_id'];
												$amphur_name = $result_amphur['amphur_name'];
											?>
												<option value="<?=$amphur_id?>"><?=$amphur_name?></option>
											<? } while ($result_amphur = mysql_fetch_array($query_amphur)); ?>
												</optgroup>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_province = "SELECT * FROM tbl_loc_3province ORDER BY province_name ASC";
												$query_province = mysql_query($sql_province);
												$result_province = mysql_fetch_array($query_province);
												$total_province = mysql_num_rows($query_province);													
												mysql_select_db($database_main, $main);
												$sql_province2 = "SELECT * FROM tbl_loc_3province WHERE province_id = '".$objresult['father_address_province']."'";
												$query_province2 = mysql_query($sql_province2);
												$result_province2 = mysql_fetch_array($query_province2);
												$total_province2 = mysql_num_rows($query_province2);													
											?>
											<select name="father_province" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_province2['province_id']?>"><?=$result_province2['province_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$province_id = $result_province['province_id'];
												$province_name = $result_province['province_name'];
											?>
												<option value="<?=$province_id?>"><?=$province_name?></option>
											<? } while ($result_province = mysql_fetch_array($query_province)); ?>
												</optgroup>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_zipcode" size="20" value="<?=$objresult['father_address_zip']?>" /></td>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_tel" size="20" value="<?=$objresult['father_tel']?>" /></td>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_off_add" size="20" value="<?=$objresult['father_off_add']?>" /></td>
                                        </tr>
										<tr>
                                          <td style="padding:5px 20px 5px 0px;">เบอร์โทรศัพท์ที่ทำงาน</td>
                                          <td style="padding:5px 20px 5px 0px;">เลขประจำตัวประชาชน</td>
                                          <td style="padding:5px 20px 5px 0px;">ศาสนา</td>
                                          <td style="padding:5px 20px 5px 0px;">สัญชาติ</td>
                                          <td style="padding:5px 20px 5px 0px;">เชื้อชาติ</td>
										</tr>                                        
										<tr>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_off_tel" size="20" value="<?=$objresult['father_off_tel']?>" /></td>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_card_id" size="20" value="<?=$objresult['father_card_id']?>" placeholder="รูปแบบ 1234567891234" /></td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_religion = "SELECT * FROM tbl_religion";
												$query_religion = mysql_query($sql_religion);
												$result_religion = mysql_fetch_array($query_religion);
												$total_religion = mysql_num_rows($query_religion);													
												mysql_select_db($database_main, $main);
												$sql_religion2 = "SELECT * FROM tbl_religion WHERE religion_id = '".$objresult['father_religion']."'";
												$query_religion2 = mysql_query($sql_religion2);
												$result_religion2 = mysql_fetch_array($query_religion2);
												$total_religion2 = mysql_num_rows($query_religion2);													
											?>
											<select name="father_religion" style="width:200px;" required>
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
												$sql_nationality2 = "SELECT * FROM tbl_nationality WHERE nationality_id = '".$objresult['father_nationality']."'";
												$query_nationality2 = mysql_query($sql_nationality2);
												$result_nationality2 = mysql_fetch_array($query_nationality2);
												$total_nationality2 = mysql_num_rows($query_nationality2);													
											?>
											<select name="father_nationality" style="width:200px;" required>
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
												$sql_race2 = "SELECT * FROM tbl_race WHERE race_id = '".$objresult['father_race']."'";
												$query_race2 = mysql_query($sql_race2);
												$result_race2 = mysql_fetch_array($query_race2);
												$total_race2 = mysql_num_rows($query_race2);													
											?>
											<select name="father_race" style="width:200px;" required>
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
                                          <td style="padding:5px 20px 5px 0px;">ตำแหน่ง</td>
										  <td style="padding:0px 20px 5px 0px;"></td>
										  <td style="padding:0px 20px 5px 0px;"></td>
										  <td style="padding:0px 20px 5px 0px;"></td>
										  <td style="padding:0px 20px 5px 0px;"></td>
										</tr>
										<tr>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_position" size="20" value="<?=$objresult['father_position']?>" /></td>
										  <td style="padding:0px 20px 5px 0px;"></td>
										  <td style="padding:0px 20px 5px 0px;"></td>
										  <td style="padding:0px 20px 5px 0px;"></td>
										  <td style="padding:0px 20px 5px 0px;"></td>
                                        </tr>
										<tr>
                                          <td style="padding:5px 20px 5px 0px;"><h4>ข้อมูลมารดา</h4></td>
										</tr>                                        
										<tr>
                                          <td style="padding:5px 20px 5px 0px;">ชื่อมารดา</td>
                                          <td style="padding:5px 20px 5px 0px;">นามสกุลมารดา</td>
                                          <td style="padding:5px 20px 5px 0px;">วัน/เดือน/ปี เกิดมารดา</td>
                                          <td style="padding:5px 20px 5px 0px;">สถานะมารดา</td>
                                          <td style="padding:5px 20px 5px 0px;">อาชีพมารดา</td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_name" size="20" value="<?=$objresult['mother_firstname']?>" /></td>
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
												$sql_occupation2 = "SELECT * FROM tbl_occupation WHERE occ_id = '".$objresult['mother_occ']."'";
												$query_occupation2 = mysql_query($sql_occupation2);
												$result_occupation2 = mysql_fetch_array($query_occupation2);
												$total_occupation2 = mysql_num_rows($query_occupation2);													
											?>
											<select name="mother_occ" style="width:200px;" required>
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
                                          <td style="padding:5px 20px 5px 0px;">บ้านเลขที่</td>
                                          <td style="padding:5px 20px 5px 0px;">หมู่</td>
                                          <td style="padding:5px 20px 5px 0px;">ซอย / เขต</td>
                                          <td style="padding:5px 20px 5px 0px;">ถนน</td>
                                          <td style="padding:5px 20px 5px 0px;">ตำบล</td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_address" size="20" value="<?=$objresult['mother_address']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_moo" size="20" value="<?=$objresult['mother_address_moo']?>" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_soi" size="20" value="<?=$objresult['mother_address_soi']?>" /></td>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_road" size="20" value="<?=$objresult['mother_address_road']?>" /></td>
										  <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_tumbol = "SELECT * FROM tbl_loc_1tumbol ORDER BY tumbol_name ASC";
												$query_tumbol = mysql_query($sql_tumbol);
												$result_tumbol = mysql_fetch_array($query_tumbol);
												$total_tumbol = mysql_num_rows($query_tumbol);													
												mysql_select_db($database_main, $main);
												$sql_tumbol2 = "SELECT * FROM tbl_loc_1tumbol WHERE tumbol_id = '".$objresult['mother_address_tumbol']."' AND amphur_id = '".$objresult['mother_address_amphur']."' AND province_id = '".$objresult['mother_address_province']."'";
												$query_tumbol2 = mysql_query($sql_tumbol2);
												$result_tumbol2 = mysql_fetch_array($query_tumbol2);
												$total_tumbol2 = mysql_num_rows($query_tumbol2);													
											?>
											<select name="mother_tumbol" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_tumbol2['tumbol_id']?>"><?=$result_tumbol2['tumbol_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$tumbol_id = $result_tumbol['tumbol_id'];
												$tumbol_name = $result_tumbol['tumbol_name'];
											?>
												<option value="<?=$tumbol_id?>"><?=$tumbol_name?></option>
											<? } while ($result_tumbol = mysql_fetch_array($query_tumbol)); ?>
												</optgroup>
											</select>
										  </td>
                                        </tr>
										<tr>
                                          <td style="padding:5px 20px 5px 0px;">อำเภอ</td>
                                          <td style="padding:5px 20px 5px 0px;">จังหวัด</td>
                                          <td style="padding:5px 20px 5px 0px;">รหัสไปรษณีย์</td>
                                          <td style="padding:5px 20px 5px 0px;">เบอร์โทรศัพท์มารดา</td>
                                          <td style="padding:5px 20px 5px 0px;">ที่อยู่ที่ทำงาน</td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_amphur = "SELECT * FROM tbl_loc_2amphur ORDER BY amphur_name ASC";
												$query_amphur = mysql_query($sql_amphur);
												$result_amphur = mysql_fetch_array($query_amphur);
												$total_amphur = mysql_num_rows($query_amphur);													
												mysql_select_db($database_main, $main);
												$sql_amphur2 = "SELECT * FROM tbl_loc_2amphur WHERE amphur_id = '".$objresult['mother_address_amphur']."' AND province_id = '".$objresult['mother_address_province']."'";
												$query_amphur2 = mysql_query($sql_amphur2);
												$result_amphur2 = mysql_fetch_array($query_amphur2);
												$total_amphur2 = mysql_num_rows($query_amphur2);													
											?>
											<select name="mother_amphur" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_amphur2['amphur_id']?>"><?=$result_amphur2['amphur_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$amphur_id = $result_amphur['amphur_id'];
												$amphur_name = $result_amphur['amphur_name'];
											?>
												<option value="<?=$amphur_id?>"><?=$amphur_name?></option>
											<? } while ($result_amphur = mysql_fetch_array($query_amphur)); ?>
												</optgroup>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_province = "SELECT * FROM tbl_loc_3province ORDER BY province_name ASC";
												$query_province = mysql_query($sql_province);
												$result_province = mysql_fetch_array($query_province);
												$total_province = mysql_num_rows($query_province);													
												mysql_select_db($database_main, $main);
												$sql_province2 = "SELECT * FROM tbl_loc_3province WHERE province_id = '".$objresult['mother_address_province']."'";
												$query_province2 = mysql_query($sql_province2);
												$result_province2 = mysql_fetch_array($query_province2);
												$total_province2 = mysql_num_rows($query_province2);													
											?>
											<select name="mother_province" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_province2['province_id']?>"><?=$result_province2['province_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$province_id = $result_province['province_id'];
												$province_name = $result_province['province_name'];
											?>
												<option value="<?=$province_id?>"><?=$province_name?></option>
											<? } while ($result_province = mysql_fetch_array($query_province)); ?>
												</optgroup>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_zipcode" size="20" value="<?=$objresult['mother_address_zip']?>" /></td>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_tel" size="20" value="<?=$objresult['mother_tel']?>" /></td>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_off_add" size="20" value="<?=$objresult['mother_off_add']?>" /></td>
                                        </tr>
										<tr>
                                          <td style="padding:5px 20px 5px 0px;">เบอร์โทรศัพท์ที่ทำงาน</td>
                                          <td style="padding:5px 20px 5px 0px;">เลขประจำตัวประชาชน</td>
                                          <td style="padding:5px 20px 5px 0px;">ศาสนา</td>
                                          <td style="padding:5px 20px 5px 0px;">สัญชาติ</td>
                                          <td style="padding:5px 20px 5px 0px;">เชื้อชาติ</td>
										</tr>                                        
										<tr>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_off_tel" size="20" value="<?=$objresult['mother_off_tel']?>" /></td>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_card_id" size="20" value="<?=$objresult['mother_card_id']?>" placeholder="รูปแบบ 1234567891234" /></td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_religion = "SELECT * FROM tbl_religion";
												$query_religion = mysql_query($sql_religion);
												$result_religion = mysql_fetch_array($query_religion);
												$total_religion = mysql_num_rows($query_religion);													
												mysql_select_db($database_main, $main);
												$sql_religion2 = "SELECT * FROM tbl_religion WHERE religion_id = '".$objresult['mother_religion']."'";
												$query_religion2 = mysql_query($sql_religion2);
												$result_religion2 = mysql_fetch_array($query_religion2);
												$total_religion2 = mysql_num_rows($query_religion2);													
											?>
											<select name="mother_religion" style="width:200px;" required>
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
												$sql_nationality2 = "SELECT * FROM tbl_nationality WHERE nationality_id = '".$objresult['mother_nationality']."'";
												$query_nationality2 = mysql_query($sql_nationality2);
												$result_nationality2 = mysql_fetch_array($query_nationality2);
												$total_nationality2 = mysql_num_rows($query_nationality2);													
											?>
											<select name="mother_nationality" style="width:200px;" required>
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
												$sql_race2 = "SELECT * FROM tbl_race WHERE race_id = '".$objresult['mother_race']."'";
												$query_race2 = mysql_query($sql_race2);
												$result_race2 = mysql_fetch_array($query_race2);
												$total_race2 = mysql_num_rows($query_race2);													
											?>
											<select name="mother_race" style="width:200px;" required>
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
                                          <td style="padding:5px 20px 5px 0px;">ตำแหน่ง</td>
										  <td style="padding:0px 20px 5px 0px;"></td>
										  <td style="padding:0px 20px 5px 0px;"></td>
										  <td style="padding:0px 20px 5px 0px;"></td>
										  <td style="padding:0px 20px 5px 0px;"></td>
										</tr>
										<tr>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_position" size="20" value="<?=$objresult['mother_position']?>" /></td>
										  <td style="padding:0px 20px 5px 0px;"></td>
										  <td style="padding:0px 20px 5px 0px;"></td>
										  <td style="padding:0px 20px 5px 0px;"></td>
										  <td style="padding:0px 20px 5px 0px;"></td>
                                        </tr>
										<tr>
                                          <td width="15%" colspan="5" style="padding:5px 20px 5px 0px;">บุคคลที่สามารถติดต่อได้</td>
										</tr>
										<tr>
                                          <td style="padding:5px 20px 5px 0px;">ชื่อ</td>
                                          <td style="padding:5px 20px 5px 0px;">นามสกุล</td>
                                          <td style="padding:5px 20px 5px 0px;">เกี่ยวข้องเป็น</td>
                                          <td style="padding:5px 20px 5px 0px;">เบอร์โทรศัพท์</td>
                                          <td style="padding:5px 20px 5px 0px;"></td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="person_name" size="20" value="<?=$objresult['person_firstname']?>" /></td>
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
										  <td style="padding:0px 20px 5px 0px;"></td>
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
                                          <td width="15%" style="padding:5px 20px 5px 0px;">สถานภาพนักเรียน</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">วันที่เริ่มเข้าเรียน</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;"></td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;"></td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;"></td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_studystatus = "SELECT * FROM tbl_studystatus";
												$query_studystatus = mysql_query($sql_studystatus);
												$result_studystatus = mysql_fetch_array($query_studystatus);
												$total_studystatus = mysql_num_rows($query_studystatus);													
												mysql_select_db($database_main, $main);
												$sql_studystatus2 = "SELECT * FROM tbl_studystatus  WHERE studystatus_id = '".$objresult['study_status']."'";
												$query_studystatus2 = mysql_query($sql_studystatus2);
												$result_studystatus2 = mysql_fetch_array($query_studystatus2);
												$total_studystatus2 = mysql_num_rows($query_studystatus2);											
											?>
											<select name="study_status" style="width:200px;" required>
												<optgroup label="ข้อมูลในระบบ">
												<option value="<?=$result_studystatus2['studystatus_id']?>"><?=$result_studystatus2['studystatus_name']?></option>
												</optgroup>
												<optgroup label="ตัวเลือกสำหรับกรอกข้อมูลใหม่">
											<? do {
												$studystatus_id = $result_studystatus['studystatus_id'];
												$studystatus_name = $result_studystatus['studystatus_name'];
											?>
												<option value="<?=$studystatus_id?>"><?=$studystatus_name?></option>
											<? } while ($result_studystatus = mysql_fetch_array($query_studystatus)); ?>
												</optgroup>
											</select>
										  </td>
										  <?
											$instudystart = $objresult['study_start_date'];
											$studystart_y = substr($instudystart,0,4)+543;
											$studystart_m = substr($instudystart,5,2);
											$studystart_d = substr($instudystart,-2,2);				
											$studystart = $studystart_d."/".$studystart_m."/".$studystart_y;
										  ?>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="study_start_date" value="<?=$studystart?>" size="20" /></td>
										  <td style="padding:0px 20px 5px 0px;"></td>
										  <td style="padding:0px 20px 5px 0px;"></td>
										  <td style="padding:0px 20px 5px 0px;"></td>
                                        </tr>
                                      </tbody>
                                    </table><hr />
								    <table width="100%" border="0" style="font-family: 'Itim', cursive; font-size:18px">
                                      <tbody>
										<tr>
                                          <td width="100%" style="padding:0px 20px 5px 0px;">
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
										  <td width="20%" style="padding:5px 20px 5px 0px;"><?=$objresult['student_id']?></td>
										  <td width="20%" style="padding:5px 20px 5px 0px;"><?=$objresult['student_firstname']?></td>
										  <td width="20%" style="padding:5px 20px 5px 0px;"><?=$objresult['student_surname']?></td>
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
                                </div>
                            </div>
                        </div>
                	</div>
                	<!--// end row -->
            	</div>
        	</div>
		</div>
        <!-- End About -->