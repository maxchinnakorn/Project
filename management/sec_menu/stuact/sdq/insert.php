<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SDQ</title>
<style>
table {
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid black;
}
</style>
</head>

<body>
<?
$sclass=@$_REQUEST[sclass];
$room=@$_REQUEST[room];
?>
<form id="form1" name="form1" method="post">
  <table width="100%" border="0" class="table">
    <tr>
      <td><table width="100%" border="1">
        <tr align="center">
          <td colspan="2">โรงเรียนนาคประสิทธิ์</td>
          <td colspan="13">การคัดกรอง</td>
          <td colspan="3">กลุ่มนักเรียนที่คัดกรอง</td>
          </tr>
        <tr align="center">
          <td width="31" rowspan="4">เลขที่</td>
          <td width="242" rowspan="4">ชื่อ-สกุล</td>
          <td colspan="13"><pre>(-) สำหรับกลุ่มปกติ &nbsp;&nbsp;&nbsp;(ส) สำหรับกลุ่มเสี่ยง &nbsp;&nbsp;&nbsp;(ป)สำหรับกลุ่มมีปัญหา</pre></td>
          <td width="21" rowspan="4">ปกติ</td>
          <td width="22" rowspan="4">เสี่ยง</td>
          <td width="62" rowspan="4">มีปัญหา</td>
        </tr>
        <tr align="center">
          <td colspan="8">ข้อมูลจากระเบียนสะสม/อื่นๆ</td>
          <td colspan="5">ข้อมูลจากแบบประเมิน (SDQ)</td>
          </tr>
        <tr align="center">
          <td colspan="2">ด้านความสามารถ</td>
          <td colspan="2">ด้านครอบครัว</td>
          <td width="62">สุขภาพกาย</td>
          <td width="48" rowspan="2">ด้าน<br />สารเสพติด</td>
          <td width="50" rowspan="2">ความ<br />ปลอดภัย</td>
          <td width="46" rowspan="2">พฤติกรรม<br />ทางเพศ</td>
          <td colspan="5"><p>สุขภาพจิต</p></td>
          </tr>
        <tr align="center">
          <td width="90" height="42">ความสามารถพิเศษ</td>
          <td width="63">การเรียน</td>
          <td width="69">เศรษฐกิจ</td>
          <td width="69">คุ้มครอง</td>
          <td width="62">ร่างกาย</td>
          <td width="43">อารมณ์</td>
          <td width="43">ความ<br />
            ประพฤติ</td>
          <td width="59">อยู่ไม่นิ่ง</td>
          <td width="61">สัมพันธภาพ<br />
            กับเพื่อน</td>
          <td width="78">สัมพันธภาพ<br />
            กับสังคม</td>
          </tr>
          <tr>
          <?PHP
		  include "../../inc/connect_nbac.php";
		  $sql="SELECT
stunum.stuid,
stunum.number,
mst_student.level1,
mst_student.emp_id,
sdq.student_id,
mst_student.room_id,
sdq.skill,
sdq.study,
sdq.economy,
sdq.guard,
sdq.healthy,
sdq.drugs,
sdq.safe,
sdq.sexual,
sdq.eq,
sdq.conduct,
sdq.adhd,
sdq.friendly,
sdq.social,
sdq.group
FROM
sdq
INNER JOIN stunum ON sdq.student_id = stunum.stuid
INNER JOIN mst_student ON stunum.stuid = mst_student.emp_id
WHERE
mst_student.level1 = 16 AND
mst_student.room_id = 1
ORDER BY
stunum.number ASC
";
	$objQuery = mysql_query($sql);
	$objResult = mysql_num_rows($objQuery);

//mysql_query("SET character_set_results=tis620");
//mysql_query("SET character_set_client=tis620");
//mysql_query("SET character_set_connection=tis620");
//mysql_query("SET NAMES UTF8");

	//mysql_query("SET NAMES TIS620");
		  while($row=mysql_fetch_array($objQuery))
		  {
			$sqldata="SELECT * FROM `sdq` WHERE `student_id`='$row[1]'";
		  	$qrdata=mysql_query($sqldata);
			$data=mysql_fetch_array($qrdata);
			$numdata=mysql_num_rows($qrdata);
			if($numdata==0)
		  {
			  $sqladd2="INSERT INTO `vocasmss`.`sdq` (`student_id`) VALUES ('$row[1]');";
			  $qradd2=mysql_query($sqladd2);
			  //echo $sqladd2."<br>";
		  }
			else
			{
				###START Clear###
				$showeq1="";
				$showeq2="";
				$showconduct1="";
				$showconduct2="";
				$showadhd1="";
				$showadhd2="";
				$showfriendly1="";
				$showfriendly2="";
				$showsocial1="";
				$showsocial2="";
				$status1="";
				$status2="";
				$status3="";
				###END###
				if($data['study']==1)
				{
				$showstudy="checked";
				}
				else
				{
				$showstudy="";
				}
				if($data['economy']==1)
				{
				$showeconomy="checked";
				}
				else
				{
				$showeconomy="";
				}
				if($data['guard']==1)
				{
				$showguard="checked";
				}
				else
				{
				$showguard="";
				}
				if($data['healthy']==1)
				{
				$showhealthy="checked";
				}
				else
				{
				$showhealthy="";
				}
				if($data['drugs']==1)
				{
				$showdrugs="checked";
				}
				else
				{
				$showdrugs="";
				}
				if($data['safe']==1)
				{
				$showsafe="checked";
				}
				else
				{
				$showsafe="";
				}
				if($data['sexual']==1)
				{
				$showsexual="checked";
				}
				else
				{
				$showsexual="";
				}
				
				if($data['eq']==1)
				{
				$showeq1="selected";
				}
				else if($data['eq']==2)
				{
				$showeq2="selected";
				}
				
				if($data['conduct']==1)
				{
				$showconduct1="selected";
				}
				else if($data['conduct']==2)
				{
				$showconduct2="selected";
				}
				if($data['adhd']==1)
				{
				$showadhd1="selected";
				}
				else if($data['adhd']==2)
				{
				$showadhd2="selected";
				}
				if($data['friendly']==1)
				{
				$showfriendly1="selected";
				}
				else if($data['friendly']==2)
				{
				$showfriendly2="selected";
				}
				if($data['social']==1)
				{
				$showsocial1="selected";
				}
				else if($data['social']==2)
				{
				$showsocial2="selected";
				}
				
				if($data['group']==1)
				{
				$status3="checked";
				}
				else if($data['group']==2)
				{
				$status2="checked";
				}
				else if($data['group']==3)
				{
				$status1="checked";
				}
				
				
			}
			  $counter=1;
		  ?>
          <td height="30"><?PHP echo $row[2]; ?></td>
          <td><?PHP echo $row[3].$row[4]."&nbsp;&nbsp;".$row[5]; ?></td>
          <td align="center" width="90"><label>
            <input name="skill<?=$row[1]?>" type="text" id="skill" value="<?=$data['skill']?>" size="8" />
          </label></td>
          <td><label>
              <input name="study<?=$row[1]?>" type="checkbox" id="study" value="1" <?=$showstudy?> />
            (ป)</label></td>
          <td><label>
            <input name="eco<?=$row[1]?>" type="checkbox" id="eco" value="1" <?=$showeconomy?> />
            (ป)</label></td>
          <td><label>
            <input type="checkbox" name="guard<?=$row[1]?>" id="guard" value="1" <?=$showguard?> />
            (ป)</label></td>
          <td><label>
            <input type="checkbox" name="healthy<?=$row[1]?>" id="healthy" value="1" <?=$showhealthy?> />
          </label>
            (ป)</td>
          <td><label>
            <input type="checkbox" name="drugs<?=$row[1]?>" id="drugs" value="1" <?=$showdrugs?> />
          </label>
            (ป)</td>
          <td><label>
            <input type="checkbox" name="safe<?=$row[1]?>" id="safe" value="1" <?=$showsafe?> />
          </label>
(ป)</td>
          <td><label>
            <input type="checkbox" name="sexual<?=$row[1]?>" id="sexual" value="1" <?=$showsexual?> />
          </label>
(ป)</td>
          <td><select name="eq<?=$row[1]?>" id="eq">
            <option value="0">-</option>
            <option value="1" <?=$showeq1?> />ส</option>
            <option value="2" <?=$showeq2?> />ป</option>
          </select></td>
          <td><select name="conduct<?=$row[1]?>" id="conduct">
            <option value="0">-</option>
            <option value="1" <?=$showconduct1?>>ส</option>
            <option value="2" <?=$showconduct2?>>ป</option>
          </select></td>
          <td><select name="adhd<?=$row[1]?>" id="adhd">
            <option value="0">-</option>
            <option value="1" <?=$showadhd1?>>ส</option>
            <option value="2" <?=$showadhd2?>>ป</option>
          </select></td>
          <td><select name="friendly<?=$row[1]?>" id="friendly">
            <option value="0">-</option>
            <option value="1" <?=$showfriendly1?>>ส</option>
            <option value="2" <?=$showfriendly2?>>ป</option>
          </select></td>
          <td><select name="social<?=$row[1]?>" id="social">
            <option value="0">-</option>
            <option value="1" <?=$showsocial1?>>ส</option>
            <option value="2" <?=$showsocial2?>>ป</option>
          </select></td>
          <td><input type="radio" name="ans<?=$row[1]?>" id="radio" value="3" <?=$status1?> /></td>
          <td><input type="radio" name="ans<?=$row[1]?>" id="radio2" value="2" <?=$status2?> /></td>
          <td><input type="radio" name="ans<?=$row[1]?>" id="radio3" value="1" <?=$status3?>/></td>
          </tr>
          <!--
		  //เปลี่ยนตัวแปร
		  $stuid=@$row[1];
		  $skill=@$_POST['skill'.$row[1]];
		  $study=@$_POST['study'.$row[1]];
		  $eco=@$_POST['eco'.$row[1]];
		  $guard=@$_POST['guard'.$row[1]];
		  $healthy=@$_POST['healthy'.$row[1]];
		  $drugs=@$_POST['drugs'.$row[1]];
		  $safe=@$_POST['safe'.$row[1]];
		  $sexual=@$_POST['sexual'.$row[1]];
		  $eq=@$_POST['eq'.$row[1]];
		  $conduct=@$_POST['conduct'.$row[1]];
		  $adhd=@$_POST['adhd'.$row[1]];
		  $friendly=@$_POST['friendly'.$row[1]];
		  $social=@$_POST['social'.$row[1]];
		  $ans=@$_POST['ans'.$row[1]];
		  -->
<?
			if(empty($_POST['ans'.$row[1]]))
			{
			}
			else
			{
			$sqladd="UPDATE `sdq` SET `skill`='".@$_POST['skill'.$row[1]]."', `study`='".@$_POST['study'.$row[1]]."', `economy`='".@$_POST['eco'.$row[1]]."', `guard`='".@$_POST['guard'.$row[1]]."', `healthy`='".@$_POST['healthy'.$row[1]]."', `drugs`='".@$_POST['drugs'.$row[1]]."', `safe`='".@$_POST['safe'.$row[1]]."', `sexual`='".@$_POST['sexual'.$row[1]]."', `eq`='".@$_POST['eq'.$row[1]]."', `conduct`='".@$_POST['conduct'.$row[1]]."', `adhd`='".@$_POST['adhd'.$row[1]]."', `friendly`='".@$_POST['friendly'.$row[1]]."', `social`='".@$_POST['social'.$row[1]]."', `group`='".@$_POST['ans'.$row[1]]."' WHERE (`student_id`='".$row[1]."');";	
			//$sqladd="INSERT INTO `sdq` (`student_id`, `skill`, `study`, `economy`, `guard`, `healthy`, `drugs`, `safe`, `sexual`, `eq`, `conduct`, `adhd`, `friendly`, `social`, `group`) VALUES ('99999', 'ggg', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1')";	   
		  mysql_query($sqladd);
		  mysql_query("SET NAMES TIS-620");
			}
		  }
		  ?>
      </table></td>
    </tr>
  </table>
  <input type="submit" name="submit" id="submit" value="Submit"/>
</form>
</body>
</html>