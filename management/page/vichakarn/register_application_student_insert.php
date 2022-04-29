<?
session_start();
include "../../../connections/_main.php";
include "../../../connections/infosystem.php";
$birthday = $_POST['birthday'];
$inbirth_y = substr($birthday,-4,4)-543;
$inbirth_m = substr($birthday,3,2);
$inbirth_d = substr($birthday,0,2);				
$inbirth = $inbirth_y."-".$inbirth_m."-".$inbirth_d;

$father_birthday = $_POST['father_birthday'];
$father_inbirth_y = substr($father_birthday,-4,4)-543;
$father_inbirth_m = substr($father_birthday,3,2);
$father_inbirth_d = substr($father_birthday,0,2);				
$father_inbirth = $father_inbirth_y."-".$father_inbirth_m."-".$father_inbirth_d;

$mother_birthday = $_POST['mother_birthday'];
$mother_inbirth_y = substr($mother_birthday,-4,4)-543;
$mother_inbirth_m = substr($mother_birthday,3,2);
$mother_inbirth_d = substr($mother_birthday,0,2);				
$mother_inbirth = $mother_inbirth_y."-".$mother_inbirth_m."-".$mother_inbirth_d;

$instudystart = $_POST['study_start_date'];
$studystart_y = substr($instudystart,-4,4)-543;
$studystart_m = substr($instudystart,3,2);
$studystart_d = substr($instudystart,0,2);				
$studystart = $studystart_y."-".$studystart_m."-".$studystart_d;

include "../../../connections/_main.php";
mysql_select_db($database_main, $main);
$sqlinsertdata = "INSERT INTO `data_student` SET 
	`student_id` = '".$_POST['id']."', 
	`titlename_id` = '".$_POST['titlename']."', 
	`student_firstname` = '".$_POST['name']."', 
	`student_surname` = '".$_POST['surname']."', 
	`student_firstname_eng` = '".$_POST['name_eng']."', 
	`student_surname_eng` = '".$_POST['surname_eng']."', 
	`card_id` = '".$_POST['card_id']."', 
	`student_nickname` = '".$_POST['nickname']."', 
	`student_birthday` = '".$inbirth."', 
	`student_sex` = '".$_POST['sex']."', 
	`student_religion` = '".$_POST['religion']."', 
	`student_nationality` = '".$_POST['nationality']."', 
	`student_race` = '".$_POST['race']."', 
	`student_address` = '".$_POST['address']."', 
	`student_address_moo` = '".$_POST['moo']."', 
	`student_address_soi` = '".$_POST['soi']."', 
	`student_address_road` = '".$_POST['road']."', 
	`student_address_tumbol` = '".$_POST['tumbol']."', 
	`student_address_amphur` = '".$_POST['amphur']."', 
	`student_address_province` = '".$_POST['province']."', 
	`student_address_zip` = '".$_POST['zipcode']."', 
	`student_tel` = '".$_POST['tel']."', 
	`student_email` = '".$_POST['email']."', 
	`father_status` = '".$_POST['father_status']."', 
	`father_firstname` = '".$_POST['father_name']."', 
	`father_surname` = '".$_POST['father_surname']."', 
	`father_birthday` = '".$father_inbirth."', 
	`father_occ` = '".$_POST['father_occ']."', 
	`father_off_add` = '".$_POST['father_off_add']."', 
	`father_off_tel` = '".$_POST['father_off_tel']."', 
	`father_address` = '".$_POST['father_address']."', 
	`father_address_moo` = '".$_POST['father_moo']."', 
	`father_address_soi` = '".$_POST['father_soi']."', 
	`father_address_road` = '".$_POST['father_road']."', 
	`father_address_tumbol` = '".$_POST['father_tumbol']."', 
	`father_address_amphur` = '".$_POST['father_amphur']."', 
	`father_address_province` = '".$_POST['father_province']."', 
	`father_address_zip` = '".$_POST['father_zipcode']."', 
	`father_tel` = '".$_POST['father_tel']."', 
	`mother_status` = '".$_POST['mother_status']."', 
	`mother_firstname` = '".$_POST['mother_name']."', 
	`mother_surname` = '".$_POST['mother_surname']."', 
	`mother_birthday` = '".$mother_inbirth."', 
	`mother_occ` = '".$_POST['mother_occ']."', 
	`mother_off_add` = '".$_POST['mother_off_add']."', 
	`mother_off_tel` = '".$_POST['mother_off_tel']."', 
	`mother_address` = '".$_POST['mother_address']."', 
	`mother_address_moo` = '".$_POST['mother_moo']."', 
	`mother_address_soi` = '".$_POST['mother_soi']."', 
	`mother_address_road` = '".$_POST['mother_road']."', 
	`mother_address_tumbol` = '".$_POST['mother_tumbol']."', 
	`mother_address_amphur` = '".$_POST['mother_amphur']."', 
	`mother_address_province` = '".$_POST['mother_province']."', 
	`mother_address_zip` = '".$_POST['mother_zipcode']."', 
	`mother_tel` = '".$_POST['mother_tel']."', 
	`parents_relation` = '".$_POST['parents_relation']."', 
	`person_livenow` = '".$_POST['livenow']."', 
	`marital_status` = '".$_POST['marital_status']."', 
	`person_firstname` = '".$_POST['person_name']."', 
	`person_surname` = '".$_POST['person_surname']."', 
	`person_relation` = '".$_POST['person_relation']."', 
	`person_address` = '".$_POST['person_address']."', 
	`person_tel` = '".$_POST['person_tel']."', 
	`study_start_date` = '".$_POST['study_start_date']."', 
	`father_card_id` = '".$_POST['father_card_id']."', 
	`mother_card_id` = '".$_POST['mother_card_id']."', 
	`father_religion` = '".$_POST['father_religion']."', 
	`mother_religion` = '".$_POST['mother_religion']."', 
	`father_nationality` = '".$_POST['father_nationality']."', 
	`mother_nationality` = '".$_POST['mother_nationality']."', 
	`father_race` = '".$_POST['father_race']."', 
	`mother_race` = '".$_POST['mother_race']."', 
	`father_position` = '".$_POST['father_position']."', 
	`mother_position` = '".$_POST['mother_position']."', 
	`study_status` = '".$studystart."', 
	`student_weight` = '".$_POST['weight']."', 
	`student_hight` = '".$_POST['hight']."', 
	`student_blood` = '".$_POST['blood']."', 
	`student_disease` = '".$_POST['disease']."', 
	`student_hobby` = '".$_POST['hobby']."', 
	`student_skill` = '".$_POST['skill']."', 
	`congenital_disease` = '".$_POST['congenital_disease']."', 
	`save_username` = '".$_SESSION['np_id']."', 
	`save_date` = '".date('Y-m-d H:i:s')."'";
$queryinsertdata = mysql_query($sqlinsertdata);
//echo $sqlinsertdata;
echo "<center><font size='8' color='green'>ลงทะเบียนเรียบร้อย</font></center>";
echo "<meta http-equiv='Refresh' content='3;URL=../../home.php?page=vichakarn&work=register_student'>";
?>