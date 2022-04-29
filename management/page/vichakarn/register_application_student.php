        <!-- About -->
		<div>
		<form method="post" action="page/vichakarn/register_student_insert.php">
            <div class="container content-lg">
                <div class="row">
                    <div class="col-sm-7" id="about">
                        <div class="section-seperator margin-b-50">
                            <div class="margin-b-50">
                                <div class="margin-b-30">
                                    <p style="margin-bottom:25px;"><h2 style="font-family: 'Itim', cursive; padding-bottom:20px;">ลงทะเบียนนักเรียน</h2></p>
                                    <table width="100%" border="0" style="font-family: 'Itim', cursive; font-size:18px">
									  <h3 style="padding:5px 20px 5px 0px;">ข้อมูลพื้นฐาน</h3>
                                      <tbody>
                                        <tr>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">รหัสนักเรียน</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">คำนำหน้าชื่อ</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">ชื่อ</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">นามสกุล</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">ชื่อเล่่น</td>
										</tr>                                        
										<tr>
                                          <td width="15%" style="padding:5px 20px 5px 0px;"><input type="text" name="id" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_titlename = "SELECT * FROM tbl_titlename WHERE titlename_id <= '4';";
												$query_titlename = mysql_query($sql_titlename);
												$result_titlename = mysql_fetch_array($query_titlename);
												$total_titlename = mysql_num_rows($query_titlename);													
											?>
											<select name="titlename" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$titlename_id = $result_titlename['titlename_id'];
												$titlename_name = $result_titlename['titlename_name'];
												$titlename_name_eng = $result_titlename['titlename_name_eng'];
											?>
												<option value="<?=$titlename_id?>"><?=$titlename_name.' ('.$titlename_name_eng.')'?></option>
											<? } while ($result_titlename = mysql_fetch_array($query_titlename)); ?>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="name" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="surname" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="nickname" size="20" /></td>
                                        </tr>
                                        <tr>
                                          <td width="25%" style="padding:5px 20px 5px 0px;">วันเกิด</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">Name</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">Surname</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">ศาสนา</td>
                                          <td width="25%" style="padding:5px 20px 5px 0px;">สัญชาติ</td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="birthday" size="20" placeholder="รูปแบบ 01/01/2561" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="name_eng" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="surname_eng" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_religion = "SELECT * FROM tbl_religion";
												$query_religion = mysql_query($sql_religion);
												$result_religion = mysql_fetch_array($query_religion);
												$total_religion = mysql_num_rows($query_religion);													
											?>
											<select name="religion" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$religion_id = $result_religion['religion_id'];
												$religion_name = $result_religion['religion_name'];
											?>
												<option value="<?=$religion_id?>"><?=$religion_name?></option>
											<? } while ($result_religion = mysql_fetch_array($query_religion)); ?>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_nationality = "SELECT * FROM tbl_nationality";
												$query_nationality = mysql_query($sql_nationality);
												$result_nationality = mysql_fetch_array($query_nationality);
												$total_nationality = mysql_num_rows($query_nationality);													
											?>
											<select name="nationality" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$nationality_id = $result_nationality['nationality_id'];
												$nationality_name = $result_nationality['nationality_name'];
											?>
												<option value="<?=$nationality_id?>"><?=$nationality_name?></option>
											<? } while ($result_nationality = mysql_fetch_array($query_nationality)); ?>
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
											?>
											<select name="race" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$race_id = $result_race['race_id'];
												$race_name = $result_race['race_name'];
											?>
												<option value="<?=$race_id?>"><?=$race_name?></option>
											<? } while ($result_race = mysql_fetch_array($query_race)); ?>
											</select>
										  </td>
                                     	  <td style="padding:0px 20px 5px 0px;"><input type="text" name="card_id" size="20" placeholder="รูปแบบ 1234567891234" /></td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_sex = "SELECT * FROM tbl_sex";
												$query_sex = mysql_query($sql_sex);
												$result_sex = mysql_fetch_array($query_sex);
												$total_sex = mysql_num_rows($query_sex);													
											?>
											<select name="sex" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$sex_id = $result_sex['sex_id'];
												$sex_name = $result_sex['sex_name'];
											?>
												<option value="<?=$sex_id?>"><?=$sex_name?></option>
											<? } while ($result_sex = mysql_fetch_array($query_sex)); ?>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="tel" size="20" placeholder="รูปแบบ 0812345678" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="email" size="20" /></td>
                                        </tr>
                                        <tr>
                                          <td style="padding:5px 20px 5px 0px;">บ้านเลขที่</td>
                                          <td style="padding:5px 20px 5px 0px;">หมู่</td>
                                          <td style="padding:5px 20px 5px 0px;">ซอย</td>
                                          <td style="padding:5px 20px 5px 0px;">ถนน</td>
                                          <td style="padding:5px 20px 5px 0px;">ตำบล / แขวง</td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="address" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="moo" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="soi" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="road" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_tumbol = "SELECT * FROM tbl_loc_1tumbol ORDER BY tumbol_name ASC";
												$query_tumbol = mysql_query($sql_tumbol);
												$result_tumbol = mysql_fetch_array($query_tumbol);
												$total_tumbol = mysql_num_rows($query_tumbol);													
											?>
											<select name="tumbol" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$tumbol_id = $result_tumbol['tumbol_id'];
												$tumbol_name = $result_tumbol['tumbol_name'];
											?>
												<option value="<?=$tumbol_id?>"><?=$tumbol_name?></option>
											<? } while ($result_tumbol = mysql_fetch_array($query_tumbol)); ?>
											</select>
										  </td>
                                        </tr>
                                        <tr>
                                          <td style="padding:5px 20px 5px 0px;">อำเภอ / เขต</td>
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
											?>
											<select name="amphur" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$amphur_id = $result_amphur['amphur_id'];
												$amphur_name = $result_amphur['amphur_name'];
											?>
												<option value="<?=$amphur_id?>"><?=$amphur_name?></option>
											<? } while ($result_amphur = mysql_fetch_array($query_amphur)); ?>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_province = "SELECT * FROM tbl_loc_3province ORDER BY province_name ASC";
												$query_province = mysql_query($sql_province);
												$result_province = mysql_fetch_array($query_province);
												$total_province = mysql_num_rows($query_province);													
											?>
											<select name="province" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$province_id = $result_province['province_id'];
												$province_name = $result_province['province_name'];
											?>
												<option value="<?=$province_id?>"><?=$province_name?></option>
											<? } while ($result_province = mysql_fetch_array($query_province)); ?>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="zipcode" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="hobby" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="skill" size="20" /></td>
                                        </tr>
                                        <tr>
                                          <td style="padding:5px 20px 5px 0px;">น้ำหนัก</td>
                                          <td style="padding:5px 20px 5px 0px;">ส่วนสูง</td>
                                          <td style="padding:5px 20px 5px 0px;">กรุ๊ปเลือด</td>
                                          <td style="padding:5px 20px 5px 0px;">แพ้ยา (ถ้ามี)</td>
                                          <td style="padding:5px 20px 5px 0px;">โรคประจำตัว (ถ้ามี)</td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="weight" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="hight" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_blood = "SELECT * FROM tbl_blood";
												$query_blood = mysql_query($sql_blood);
												$result_blood = mysql_fetch_array($query_blood);
												$total_blood = mysql_num_rows($query_blood);													
											?>
											<select name="blood" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$blood_id = $result_blood['blood_id'];
												$blood_name = $result_blood['blood_name'];
											?>
												<option value="<?=$blood_id?>"><?=$blood_name?></option>
											<? } while ($result_blood = mysql_fetch_array($query_blood)); ?>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="disease" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="congenital_disease" size="20" /></td>
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
											?>
											<select name="livenow" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$livenow_id = $result_livenow['livenow_id'];
												$livenow_name = $result_livenow['livenow_name'];
											?>
												<option value="<?=$livenow_id?>"><?=$livenow_name?></option>
											<? } while ($result_livenow = mysql_fetch_array($query_livenow)); ?>
											</select>
										  </td>
                                          <td colspan="3" style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_marital = "SELECT * FROM tbl_marital";
												$query_marital = mysql_query($sql_marital);
												$result_marital = mysql_fetch_array($query_marital);
												$total_marital = mysql_num_rows($query_marital);													
											?>
											<select name="marital_status" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$marital_id = $result_marital['marital_id'];
												$marital_name = $result_marital['marital_name'];
											?>
												<option value="<?=$marital_id?>"><?=$marital_name?></option>
											<? } while ($result_marital = mysql_fetch_array($query_marital)); ?>
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
											?>
											<select name="parents_relation" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$parents_id = $result_parentrelation['parents_id'];
												$parents_name = $result_parentsrelation['parents_name'];
											?>
												<option value="<?=$parents_id?>"><?=$parents_name?></option>
											<? } while ($result_parentsrelation = mysql_fetch_array($query_parentsrelation)); ?>
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
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_name" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_surname" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_birthday" size="20" placeholder="รูปแบบ 01/01/2561" /></td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_status = "SELECT * FROM tbl_status";
												$query_status = mysql_query($sql_status);
												$result_status = mysql_fetch_array($query_status);
												$total_status = mysql_num_rows($query_status);													
											?>
											<select name="father_status" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$status_id = $result_status['status_id'];
												$status_name = $result_status['status_name'];
											?>
												<option value="<?=$status_id?>"><?=$status_name?></option>
											<? } while ($result_status = mysql_fetch_array($query_status)); ?>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_occupation = "SELECT * FROM tbl_occupation";
												$query_occupation = mysql_query($sql_occupation);
												$result_occupation = mysql_fetch_array($query_occupation);
												$total_occupation = mysql_num_rows($query_occupation);													
											?>
											<select name="father_occ" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$occupation_id = $result_occupation['occ_id'];
												$occupation_name = $result_occupation['occ_name'];
											?>
												<option value="<?=$occupation_id?>"><?=$occupation_name?></option>
											<? } while ($result_occupation = mysql_fetch_array($query_occupation)); ?>
											</select>
										  </td>
                                        </tr>
										<tr>
                                          <td style="padding:5px 20px 5px 0px;">บ้านเลขที่</td>
                                          <td style="padding:5px 20px 5px 0px;">หมู่</td>
                                          <td style="padding:5px 20px 5px 0px;">ซอย</td>
                                          <td style="padding:5px 20px 5px 0px;">ถนน</td>
                                          <td style="padding:5px 20px 5px 0px;">ตำบล / แขวง</td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_address" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_moo" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_soi" size="20" /></td>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_road" size="20" /></td>
										  <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_tumbol = "SELECT * FROM tbl_loc_1tumbol ORDER BY tumbol_name ASC";
												$query_tumbol = mysql_query($sql_tumbol);
												$result_tumbol = mysql_fetch_array($query_tumbol);
												$total_tumbol = mysql_num_rows($query_tumbol);													
											?>
											<select name="father_tumbol" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$tumbol_id = $result_tumbol['tumbol_id'];
												$tumbol_name = $result_tumbol['tumbol_name'];
											?>
												<option value="<?=$tumbol_id?>"><?=$tumbol_name?></option>
											<? } while ($result_tumbol = mysql_fetch_array($query_tumbol)); ?>
											</select>
										  </td>
                                        </tr>
										<tr>
                                          <td style="padding:5px 20px 5px 0px;">อำเภอ / เขต</td>
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
											?>
											<select name="father_amphur" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$amphur_id = $result_amphur['amphur_id'];
												$amphur_name = $result_amphur['amphur_name'];
											?>
												<option value="<?=$amphur_id?>"><?=$amphur_name?></option>
											<? } while ($result_amphur = mysql_fetch_array($query_amphur)); ?>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_province = "SELECT * FROM tbl_loc_3province ORDER BY province_name ASC";
												$query_province = mysql_query($sql_province);
												$result_province = mysql_fetch_array($query_province);
												$total_province = mysql_num_rows($query_province);													
											?>
											<select name="father_province" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$province_id = $result_province['province_id'];
												$province_name = $result_province['province_name'];
											?>
												<option value="<?=$province_id?>"><?=$province_name?></option>
											<? } while ($result_province = mysql_fetch_array($query_province)); ?>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_zipcode" size="20" /></td>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_tel" size="20" /></td>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_off_add" size="20" /></td>
                                        </tr>
										<tr>
                                          <td style="padding:5px 20px 5px 0px;">เบอร์โทรศัพท์ที่ทำงาน</td>
                                          <td style="padding:5px 20px 5px 0px;">เลขประจำตัวประชาชน</td>
                                          <td style="padding:5px 20px 5px 0px;">ศาสนา</td>
                                          <td style="padding:5px 20px 5px 0px;">สัญชาติ</td>
                                          <td style="padding:5px 20px 5px 0px;">เชื้อชาติ</td>
										</tr>                                        
										<tr>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_off_tel" size="20" /></td>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_card_id" size="20" placeholder="รูปแบบ 1234567891234" /></td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_religion = "SELECT * FROM tbl_religion";
												$query_religion = mysql_query($sql_religion);
												$result_religion = mysql_fetch_array($query_religion);
												$total_religion = mysql_num_rows($query_religion);													
											?>
											<select name="father_religion" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$religion_id = $result_religion['religion_id'];
												$religion_name = $result_religion['religion_name'];
											?>
												<option value="<?=$religion_id?>"><?=$religion_name?></option>
											<? } while ($result_religion = mysql_fetch_array($query_religion)); ?>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_nationality = "SELECT * FROM tbl_nationality";
												$query_nationality = mysql_query($sql_nationality);
												$result_nationality = mysql_fetch_array($query_nationality);
												$total_nationality = mysql_num_rows($query_nationality);													
											?>
											<select name="father_nationality" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$nationality_id = $result_nationality['nationality_id'];
												$nationality_name = $result_nationality['nationality_name'];
											?>
												<option value="<?=$nationality_id?>"><?=$nationality_name?></option>
											<? } while ($result_nationality = mysql_fetch_array($query_nationality)); ?>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_race = "SELECT * FROM tbl_race";
												$query_race = mysql_query($sql_race);
												$result_race = mysql_fetch_array($query_race);
												$total_race = mysql_num_rows($query_race);													
											?>
											<select name="father_race" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$race_id = $result_race['race_id'];
												$race_name = $result_race['race_name'];
											?>
												<option value="<?=$race_id?>"><?=$race_name?></option>
											<? } while ($result_race = mysql_fetch_array($query_race)); ?>
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
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="father_position" size="20" /></td>
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
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_name" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_surname" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_birthday" size="20" placeholder="รูปแบบ 01/01/2561" /></td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_status = "SELECT * FROM tbl_status";
												$query_status = mysql_query($sql_status);
												$result_status = mysql_fetch_array($query_status);
												$total_status = mysql_num_rows($query_status);													
											?>
											<select name="mother_status" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$status_id = $result_status['status_id'];
												$status_name = $result_status['status_name'];
											?>
												<option value="<?=$status_id?>"><?=$status_name?></option>
											<? } while ($result_status = mysql_fetch_array($query_status)); ?>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_occupation = "SELECT * FROM tbl_occupation";
												$query_occupation = mysql_query($sql_occupation);
												$result_occupation = mysql_fetch_array($query_occupation);
												$total_occupation = mysql_num_rows($query_occupation);													
											?>
											<select name="mother_occ" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$occupation_id = $result_occupation['occ_id'];
												$occupation_name = $result_occupation['occ_name'];
											?>
												<option value="<?=$occupation_id?>"><?=$occupation_name?></option>
											<? } while ($result_occupation = mysql_fetch_array($query_occupation)); ?>
											</select>
										  </td>
                                        </tr>
										<tr>
                                          <td style="padding:5px 20px 5px 0px;">บ้านเลขที่</td>
                                          <td style="padding:5px 20px 5px 0px;">หมู่</td>
                                          <td style="padding:5px 20px 5px 0px;">ซอย</td>
                                          <td style="padding:5px 20px 5px 0px;">ถนน</td>
                                          <td style="padding:5px 20px 5px 0px;">ตำบล / แขวง</td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_address" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_moo" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_soi" size="20" /></td>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_road" size="20" /></td>
										  <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_tumbol = "SELECT * FROM tbl_loc_1tumbol ORDER BY tumbol_name ASC";
												$query_tumbol = mysql_query($sql_tumbol);
												$result_tumbol = mysql_fetch_array($query_tumbol);
												$total_tumbol = mysql_num_rows($query_tumbol);													
											?>
											<select name="mother_tumbol" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$tumbol_id = $result_tumbol['tumbol_id'];
												$tumbol_name = $result_tumbol['tumbol_name'];
											?>
												<option value="<?=$tumbol_id?>"><?=$tumbol_name?></option>
											<? } while ($result_tumbol = mysql_fetch_array($query_tumbol)); ?>
											</select>
										  </td>
                                        </tr>
										<tr>
                                          <td style="padding:5px 20px 5px 0px;">อำเภอ / เขต</td>
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
											?>
											<select name="mother_amphur" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$amphur_id = $result_amphur['amphur_id'];
												$amphur_name = $result_amphur['amphur_name'];
											?>
												<option value="<?=$amphur_id?>"><?=$amphur_name?></option>
											<? } while ($result_amphur = mysql_fetch_array($query_amphur)); ?>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_province = "SELECT * FROM tbl_loc_3province ORDER BY province_name ASC";
												$query_province = mysql_query($sql_province);
												$result_province = mysql_fetch_array($query_province);
												$total_province = mysql_num_rows($query_province);													
											?>
											<select name="mother_province" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$province_id = $result_province['province_id'];
												$province_name = $result_province['province_name'];
											?>
												<option value="<?=$province_id?>"><?=$province_name?></option>
											<? } while ($result_province = mysql_fetch_array($query_province)); ?>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_province" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_zipcode" size="20" /></td>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_tel" size="20" /></td>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_off_add" size="20" /></td>
                                        </tr>
										<tr>
                                          <td style="padding:5px 20px 5px 0px;">เบอร์โทรศัพท์ที่ทำงาน</td>
                                          <td style="padding:5px 20px 5px 0px;">เลขประจำตัวประชาชน</td>
                                          <td style="padding:5px 20px 5px 0px;">ศาสนา</td>
                                          <td style="padding:5px 20px 5px 0px;">สัญชาติ</td>
                                          <td style="padding:5px 20px 5px 0px;">เชื้อชาติ</td>
										</tr>                                        
										<tr>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_off_tel" size="20" /></td>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_card_id" size="20" placeholder="รูปแบบ 1234567891234" /></td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_religion = "SELECT * FROM tbl_religion";
												$query_religion = mysql_query($sql_religion);
												$result_religion = mysql_fetch_array($query_religion);
												$total_religion = mysql_num_rows($query_religion);													
											?>
											<select name="mother_religion" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$religion_id = $result_religion['religion_id'];
												$religion_name = $result_religion['religion_name'];
											?>
												<option value="<?=$religion_id?>"><?=$religion_name?></option>
											<? } while ($result_religion = mysql_fetch_array($query_religion)); ?>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_nationality = "SELECT * FROM tbl_nationality";
												$query_nationality = mysql_query($sql_nationality);
												$result_nationality = mysql_fetch_array($query_nationality);
												$total_nationality = mysql_num_rows($query_nationality);													
											?>
											<select name="mother_nationality" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$nationality_id = $result_nationality['nationality_id'];
												$nationality_name = $result_nationality['nationality_name'];
											?>
												<option value="<?=$nationality_id?>"><?=$nationality_name?></option>
											<? } while ($result_nationality = mysql_fetch_array($query_nationality)); ?>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_race = "SELECT * FROM tbl_race";
												$query_race = mysql_query($sql_race);
												$result_race = mysql_fetch_array($query_race);
												$total_race = mysql_num_rows($query_race);													
											?>
											<select name="mother_race" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$race_id = $result_race['race_id'];
												$race_name = $result_race['race_name'];
											?>
												<option value="<?=$race_id?>"><?=$race_name?></option>
											<? } while ($result_race = mysql_fetch_array($query_race)); ?>
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
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="mother_position" size="20" /></td>
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
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="person_name" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="person_surname" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_relation = "SELECT * FROM tbl_relation";
												$query_relation = mysql_query($sql_relation);
												$result_relation = mysql_fetch_array($query_relation);
												$total_relation = mysql_num_rows($query_relation);													
											?>
											<select name="person_relation" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$relation_id = $result_relation['relation_id'];
												$relation_name = $result_relation['relation_name'];
											?>
												<option value="<?=$relation_id?>"><?=$relation_name?></option>
											<? } while ($result_relation = mysql_fetch_array($query_relation)); ?>
											</select>
										  </td>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="person_tel" size="20" placeholder="รูปแบบ 0812345678" /></td>
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
										  <td colspan="2" style="padding:0px 20px 5px 0px;"><input type="text" name="person_address" size="45" /></td>
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
											?>
											<select name="study_status" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$studystatus_id = $result_studystatus['studystatus_id'];
												$studystatus_name = $result_studystatus['studystatus_name'];
											?>
												<option value="<?=$studystatus_id?>"><?=$studystatus_name?></option>
											<? } while ($result_studystatus = mysql_fetch_array($query_studystatus)); ?>
											</select>
										  </td>
										  <?
											$instudystart = date('Y-m-d');
											$studystart_y = substr($instudystart,0,4)+543;
											$studystart_m = substr($instudystart,5,2);
											$studystart_d = substr($instudystart,-2,2);				
											$studystart = $studystart_d."/".$studystart_m."/".$studystart_y;
										  ?>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="study_start_date" value="<?=$studystart?>" size="20" readonly /></td>
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
											<button type="submit" class="btn custom-btn" data-loading-text="Loading...">ลงทะเบียน</button>
											<button type="reset" class="btn custom-btn" style="background-color:red;" data-loading-text="Loading...">รีเซ็ต</button>
										  </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                	</div>
                	<!--// end row -->
            	</div>
        	</div>
		</form>
		</div>
        <!-- End About -->