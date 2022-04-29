<?
include "../../../connections/_main.php";
include "../../../connections/infosystem.php";
//$inputdep = 'k'; 
$inputdep = $_POST['department']; 
if($inputdep == 'k')
{
	$code = 'T';
	$dep = '1';
}
elseif($inputdep == 'p')
{
	$code = 'T';
	$dep = '2';
}
elseif($inputdep == 'h')
{
	$code = 'T';
	$dep = '3';
}
elseif($inputdep == 'v')
{
	$code = 'T';
	$dep = '4';
}
elseif($inputdep == 'general')
{
	$code = 'G';
	$dep = '0';
}
elseif($inputdep == 'cleaner')
{
	$code = 'C';
	$dep = '0';
}
elseif($inputdep == 'nurse')
{
	$code = 'N';
	$dep = '0';
}
elseif($inputdep == 'older')
{
	$code = 'O';
	$dep = '0';
}
elseif($inputdep == 'english')
{
	$code = 'T';
	$dep = 'E';
}
elseif($inputdep == 'china')
{
	$code = 'T';
	$dep = 'C';
}
elseif($inputdep == 'garder')
{
	$code = 'G';
	$dep = '0';
}
include "../../../connections/_main.php";
mysql_select_db($database_main, $main);
$sql_id = "SELECT * FROM data_personal WHERE pdep_id = '$inputdep'";
$query_id = mysql_query($sql_id);
$result_id = mysql_fetch_array($query_id);
$total_id = mysql_num_rows($query_id);
$maxId = $total_id;
$maxId = ($maxId + 1);
$maxId = substr("00000".$maxId, -5);
$personal_id = $code.$dep.$maxId;
//echo $personal_id;

$birthday = $_POST['birthday'];
$inbirth_y = substr($birthday,-4,4)-543;
$inbirth_m = substr($birthday,3,2);
$inbirth_d = substr($birthday,0,2);				
$inbirth = $inbirth_y."-".$inbirth_m."-".$inbirth_d;	//แปลงวันเดือนปีเกิดจาก input text form

$marital_birthday = $_POST['marital_birthday'];
$marital_inbirth_y = substr($marital_birthday,-4,4)-543;
$marital_inbirth_m = substr($marital_birthday,3,2);
$marital_inbirth_d = substr($marital_birthday,0,2);				
$marital_inbirth = $marital_inbirth_y."-".$marital_inbirth_m."-".$marital_inbirth_d;	//แปลงวันเดือนปีเกิดจาก input text form

$father_birthday = $_POST['father_birthday'];
$father_inbirth_y = substr($father_birthday,-4,4)-543;
$father_inbirth_m = substr($father_birthday,3,2);
$father_inbirth_d = substr($father_birthday,0,2);				
$father_inbirth = $father_inbirth_y."-".$father_inbirth_m."-".$father_inbirth_d;	//แปลงวันเดือนปีเกิดจาก input text form

$mother_birthday = $_POST['mother_birthday'];
$mother_inbirth_y = substr($mother_birthday,-4,4)-543;
$mother_inbirth_m = substr($mother_birthday,3,2);
$mother_inbirth_d = substr($mother_birthday,0,2);				
$mother_inbirth = $mother_inbirth_y."-".$mother_inbirth_m."-".$mother_inbirth_d;	//แปลงวันเดือนปีเกิดจาก input text form

include "../../../connections/_main.php";
mysql_select_db($database_main, $main);
$sqlinsertdata = "INSERT INTO `data_personal` SET 
	`personal_id` = '".$personal_id."', 
	`titlename_id` = '".$_POST['titlename']."', 
	`personal_firstname` = '".$_POST['name']."', 
	`personal_surname` = '".$_POST['surname']."', 
	`personal_firstname_eng` = '".$_POST['name_eng']."', 
	`personal_surname_eng` = '".$_POST['surname_eng']."', 
	`personal_nickname` = '".$_POST['nickname']."', 
	`personal_birthday` = '".$inbirth."', 
	`card_id` = '".$_POST['card_id']."', 
	`pdep_id` = '".$_POST['department']."', 
	`sex_id` = '".$_POST['sex']."', 
	`personal_work` = '".$_POST['startwork']."', 
	`personal_tel` = '".$_POST['tel']."', 
	`personal_email` = '".$_POST['email']."', 
	`weight` = '".$_POST['weight']."', 
	`hight` = '".$_POST['hight']."', 
	`blood` = '".$_POST['blood']."', 
	`disease` = '".$_POST['disease']."', 
	`address` = '".$_POST['address']."', 
	`religion_id` = '".$_POST['religion']."', 
	`nationality_id` = '".$_POST['nationality']."', 
	`race_id` = '".$_POST['race']."', 
	`hobby` = '".$_POST['hobby']."', 
	`skill` = '".$_POST['skill']."', 
	`congenital_disease` = '".$_POST['congenital_disease']."', 
	`personal_livenow` = '".$_POST['livenow']."', 
	`marital_status` = '".$_POST['marital_status']."', 
	`marital_firstname` = '".$_POST['marital_name']."', 
	`marital_surname` = '".$_POST['marital_surname']."', 
	`marital_birthday` = '".$marital_inbirth."', 
	`father_name` = '".$_POST['father_name']."', 
	`father_surname` = '".$_POST['father_surname']."', 
	`father_birthday` = '".$father_inbirth."', 
	`father_status` = '".$_POST['father_status']."', 
	`father_job` = '".$_POST['father_job']."', 
	`mother_name` = '".$_POST['mother_name']."', 
	`mother_surname` = '".$_POST['mother_surname']."', 
	`mother_birthday` = '".$mother_inbirth."', 
	`mother_status` = '".$_POST['mother_status']."', 
	`mother_job` = '".$_POST['mother_job']."', 
	`person_name` = '".$_POST['person_name']."', 
	`person_surname` = '".$_POST['person_surname']."', 
	`person_relation` = '".$_POST['person_relation']."', 
	`person_tel` = '".$_POST['person_tel']."', 
	`person_address` = '".$_POST['person_address']."', 
	`edu_level_id` = '".$_POST['edu_level']."', 
	`edu_university` = '".$_POST['edu_university']."', 
	`edu_sec` = '".$_POST['edu_sec']."', 
	`edu_course` = '".$_POST['edu_course']."', 
	`edu_endstudy` = '".$_POST['edu_endstudy']."', 
	`position_id` = '".$_POST['position']."', 
	`position_party_id` = '".$_POST['position_party']."', 
	`subject_group` = '".$_POST['subjectgroup']."'";
$queryinsertdata = mysql_query($sqlinsertdata);
//echo $sqlinsertdata;
echo "<center><font size='8' color='green'>ลงทะเบียนเรียบร้อย</font></center>";
echo "<meta http-equiv='Refresh' content='3;URL=../../home.php?page=vichakarn&work=register_personal'>";
?>