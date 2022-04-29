        <!-- About -->
		<div>
		<form method="post" action="page/vichakarn/register_application_personal_insert.php">
            <div class="container content-lg">
                <div class="row">
                    <div class="col-sm-7" id="about">
                        <div class="section-seperator margin-b-50">
                            <div class="margin-b-50">
                                <div class="margin-b-30">
                                    <p style="margin-bottom:25px;"><h2 style="font-family: 'Itim', cursive; padding-bottom:20px;">ลงทะเบียนบุคลากร</h2></p>
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
												$sql_titlename = "SELECT * FROM tbl_titlename WHERE titlename_id >= '3';";
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
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="birthday" size="20" placeholder="รูปแบบ 01/01/2561" /></td>
                                        </tr>
                                        <tr>

                                          <td width="20%" style="padding:5px 20px 5px 0px;">Name</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">Surname</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">ศาสนา</td>
                                          <td width="25%" style="padding:5px 20px 5px 0px;">สัญชาติ</td>
                                          <td width="15%" style="padding:5px 20px 5px 0px;">เชื้อชาติ</td>										</tr>                                        
										<tr>
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
											?>
											<select name="department" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$department_id = $result_department['department_id'];
												$department_name = $result_department['department_name'];
											?>
												<option value="<?=$department_id?>"><?=$department_name?></option>
											<? } while ($result_department = mysql_fetch_array($query_department)); ?>
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
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="startwork" size="20" placeholder="รูปแบบ 01/01/2561" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="tel" size="20" placeholder="รูปแบบ 0812345678" /></td>
                                        </tr>
                                        <tr>
                                          <td width="15%" style="padding:5px 20px 5px 0px;">E-Mail</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">น้ำหนัก</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">ส่วนสูง</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">กรุ๊ปเลือด</td>
                                          <td width="25%" style="padding:5px 20px 5px 0px;">แพ้ยา (ถ้ามี)</td>
										</tr>                                        
										<tr>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="email" size="20" /></td>
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
                                        </tr>
                                        <tr>
                                          <td width="15%" colspan="2" style="padding:5px 20px 5px 0px;">ที่อยู่</td>
                                          <td width="25%" style="padding:5px 20px 5px 0px;">งานอดิเรก</td>
                                          <td width="15%" style="padding:5px 20px 5px 0px;">ความสามารถพิเศษ</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">โรคประจำตัว (ถ้ามี)</td>
										</tr>                                        
										<tr>
                                          <td colspan="2" style="padding:0px 20px 5px 0px;"><input type="text" name="address" size="45" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="hobby" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="skill" size="20" /></td>
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
                                        <tr>
                                          <td width="15%" colspan="5" style="padding:5px 20px 5px 0px;">กรณีแต่งงานแล้ว กรอกข้อมูลต่อไปนี้</td>
										</tr>
										<tr>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">ชื่อคู่สมรส</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">นามสกุลคู่สมรส</td>
                                          <td width="25%" style="padding:5px 20px 5px 0px;">วันเกิดคู่สมรส</td>
										</tr>                                        
 										<tr>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="marital_name" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="marital_surname" size="20" /></td>
                                          <td style="padding:0px 20px 5px 0px;"><input type="text" name="marital_birthday" size="20" placeholder="รูปแบบ 01/01/2561" /></td>
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
											<select name="father_job" style="width:200px;" required>
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
                                          <td width="15%" style="padding:5px 20px 5px 0px;">ชื่อมารดา</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">นามสกุลมารดา</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">วัน/เดือน/ปี เกิดมารดา</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">สถานะมารดา</td>
                                          <td width="20%" style="padding:5px 20px 5px 0px;">อาชีพมารดา</td>
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
											<select name="mother_job" style="width:200px;" required>
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
											?>
											<select name="edu_level" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$edulevel_id = $result_edulevel['edulevel_id'];
												$edulevel_name = $result_edulevel['edulevel_name'];
											?>
												<option value="<?=$edulevel_id?>"><?=$edulevel_name?></option>
											<? } while ($result_edulevel = mysql_fetch_array($query_edulevel)); ?>
											</select>
										  </td>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="edu_university" size="20" /></td>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="edu_sec" size="20" /></td>
										  <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_course = "SELECT * FROM tbl_course";
												$query_course = mysql_query($sql_course);
												$result_course = mysql_fetch_array($query_course);
												$total_course = mysql_num_rows($query_course);													
											?>
											<select name="edu_course" style="width:200px;">
												<option value="">โปรดระบุ</option>
											<? do {
												$course_id = $result_course['course_id'];
												$course_name = $result_course['course_name'];
											?>
												<option value="<?=$course_id?>"><?=$course_name?></option>
											<? } while ($result_course = mysql_fetch_array($query_course)); ?>
											</select>
										  </td>
										  <td style="padding:0px 20px 5px 0px;"><input type="text" name="edu_endstudy" size="20" /></td>
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
											?>
											<select name="position" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$position_id = $result_position['position_id'];
												$position_name = $result_position['position_name'];
											?>
												<option value="<?=$position_id?>"><?=$position_name?></option>
											<? } while ($result_position = mysql_fetch_array($query_position)); ?>
											</select>
										  </td>
                                          <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_position_party = "SELECT * FROM tbl_position_party";
												$query_position_party = mysql_query($sql_position_party);
												$result_position_party = mysql_fetch_array($query_position_party);
												$total_position_party = mysql_num_rows($query_position_party);													
											?>
											<select name="position_party" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$position_party_id = $result_position_party['party_id'];
												$position_party_name = $result_position_party['party_name'];
											?>
												<option value="<?=$position_party_id?>"><?=$position_party_name?></option>
											<? } while ($result_position_party = mysql_fetch_array($query_position_party)); ?>
											</select>
										  </td>
										  <td style="padding:0px 20px 5px 0px;">
											<?
												mysql_select_db($database_main, $main);
												$sql_subjectgroup = "SELECT * FROM tbl_subjectgroup";
												$query_subjectgroup = mysql_query($sql_subjectgroup);
												$result_subjectgroup = mysql_fetch_array($query_subjectgroup);
												$total_subjectgroup = mysql_num_rows($query_subjectgroup);													
											?>
											<select name="subjectgroup" style="width:200px;" required>
												<option value="">โปรดระบุ</option>
											<? do {
												$subjectgroup_id = $result_subjectgroup['subjectgroup_id'];
												$subjectgroup_name = $result_subjectgroup['subjectgroup_name'];
											?>
												<option value="<?=$subjectgroup_id?>"><?=$subjectgroup_name?></option>
											<? } while ($result_subjectgroup = mysql_fetch_array($query_subjectgroup)); ?>
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
											<button type="submit" class="btn custom-btn" data-loading-text="Loading...">ลงทะเบียน</button>
											<button type="reset" class="btn custom-btn" style="background-color:red;" data-loading-text="Loading...">รีเซ็ต</button>
										  </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <br /><hr />
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