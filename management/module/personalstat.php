<?
include "../connections/_main.php";
include "../connections/infosystem.php";
// ถาคเรียน / ปีการศึกษา
mysql_select_db($database_main, $main);
$sql_term = "SELECT * FROM `term`";
$query_term = mysql_query($sql_term);
$obj_term = mysql_fetch_array($query_term);
$res_term = mysql_num_rows($query_term);

//นับวันเปิดเรียน
mysql_select_db($database_main, $main);
$sql_numday = "SELECT * FROM `timework` WHERE `term` = '".$obj_term['term']."' AND `year` = '".$obj_term['year']."'";
$obj_numday = mysql_query($sql_numday);
$res_numday = mysql_num_rows($obj_numday);

if(empty($res_numday))
{
	$per_goodday = 0;
	$per_lateday = 0;
	$per_leaveday = 0;
	$per_missday = 0;
}
else
{
//นับวันมาเรียนตรงเวลา
$sql_goodday = "SELECT
personal_time.personal_id,
personal_time.date,
personal_time.time,
personal_time.`status`,
timework.date,
timework.term,
timework.`year`
FROM
personal_time
INNER JOIN timework ON personal_time.date = timework.date
WHERE
personal_time.personal_id = '$username2' AND
personal_time.date = timework.date AND
personal_time.time < '8:00:00' AND
personal_time.`status` = 1;";
$obj_goodday = mysql_query($sql_goodday);
$res_goodday = mysql_num_rows($obj_goodday);
$per_goodday = ($res_goodday*100)/$res_numday;

//นับวันมาสาบ
$sql_lateday = "SELECT
personal_time.personal_id,
personal_time.date,
personal_time.time,
personal_time.`status`,
timework.date,
timework.term,
timework.`year`
FROM
personal_time
INNER JOIN timework ON personal_time.date = timework.date
WHERE
personal_time.personal_id = '$username2' AND
personal_time.date = timework.date AND
personal_time.time >= '8:00:00' AND
personal_time.`status` = 1;";
$obj_lateday = mysql_query($sql_lateday);
$res_lateday = mysql_num_rows($obj_lateday);
$per_lateday = ($res_lateday*100)/$res_numday;

//นับวันลา
$sql_leaveday = "SELECT
personal_time.personal_id,
personal_time.date,
personal_time.time,
personal_time.`status`,
timework.date,
timework.term,
timework.`year`
FROM
personal_time
INNER JOIN timework ON personal_time.date = timework.date
WHERE
personal_time.personal_id = '$username2' AND
personal_time.date = timework.date AND
personal_time.`status` != 1";
$obj_leaveday = mysql_query($sql_leaveday);
$res_leaveday = mysql_num_rows($obj_leaveday);
$per_leaveday = ($res_leaveday*100)/$res_numday;

//นับวันขาดเรียน
$res_missday = $res_numday-($res_goodday+$res_lateday+$res_leaveday);
$per_missday = ($res_missday*100)/$res_numday;
}
?>