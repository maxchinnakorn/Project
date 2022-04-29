<?
$cr=0;
$GPA=0;

############### ภาคเรียนที่ 1 #################

//$listsubj="SELECT * FROM `stu_score` WHERE `stuid`='".$stu_id."' AND `year` = '".$showyear[0]."';";
$listsubj="SELECT
stu_score.id,
stu_score.stuid,
stu_score.subject_id,
stu_score.score,
stu_score.`year`,
stu_score.tr_id,
tbl_subject_59.subject_id,
tbl_subject_59.subject_name,
tbl_subject_59.subject_cr,
tbl_subject_59.`level`,
tbl_subject_59.term
FROM
stu_score
INNER JOIN tbl_subject_59 ON tbl_subject_59.subject_id = stu_score.subject_id
WHERE
tbl_subject_59.term = 2 AND
stu_score.stuid = ".$_SESSION['stu_id']." AND
stu_score.`year` = ".$showyear[0];
@$objlist=mysql_query($listsubj);
@$numlist=mysql_num_rows($objlist);
if(empty($numlist))
{
	echo "ยังไม่มีผลการเรียนภาคเรียน ที่ 2 ปีการศึกษา ".$showyear[0];
}
else
{
	?>
    <table width="100%" border="0">
  <tbody>
    <tr bgcolor='#CCCCFF'>
      <td colspan="5" align="center">ภาคเรียนที่ 2 ปีการศึกษา <?=$showyear[0]?></td>
    </tr>
    <tr bgcolor='#9FFFFF'>
      <td width="13%" align="center">รหัสวิชา</td>
      <td width="40%" align="center">ชื่อวิชา</td>
      <td width="17%" align="center">หน่วยกิต</td>
      <td width="16%" align="center">คะแนน</td>
      <td width="14%" align="center">เกรด</td>
    </tr>
    <?
	for($i=1;$i<=$numlist;$i++)
	{
		$list=mysql_fetch_array($objlist);
		if($list['score']>100)
		{ $grade="<b><font color='red'> ERROR!! </font></b>"; }
		else if($list['score']>=80)
		{ $grade=4; }
		else if($list['score']>=75)
		{ $grade=3.5; }
		else if($list['score']>=70)
		{ $grade=3; }
		else if($list['score']>=65)
		{ $grade=2.5; }
		else if($list['score']>=60)
		{ $grade=2; }
		else if($list['score']>=55)
		{ $grade=1.5; }
		else if($list['score']>=50)
		{ $grade=1; }
		else
		{ $grade=0; }
		
		$c=$i%2;
		if($c==0)
		{
			$color="bgcolor='#E0E0E0'";
		}
		else
		{
			$color="";
		}
	?>
    <tr>
      <td align="center" <?=$color?>><?=$list['subject_id']?></td>
      <td <?=$color?>><?=$list['subject_name']?></td>
      <td align="center" <?=$color?>><?=$list['subject_cr']?></td>
      <td align="center" <?=$color?>><?=$list['score']?></td>
      <td align="center" <?=$color?>><?=$grade?></td>
    </tr>
    <?
	$cr=$cr+$list['subject_cr'];
	$GPA=$GPA+($grade*$list['subject_cr']);
	}
	?>
    <tr>
      <td colspan="2" align="center" bgcolor="#FFFE99">&nbsp;</td>
      <td align="center" bgcolor="#FFFE99">รวม <b><?=@$cr?></b> หน่วยกิต</td>
      <td align="right" bgcolor="#FFFE99">เกรดเฉลี่ย</td>
      <td align="center" bgcolor="#FFFE99"><b><?=number_format($GPA/$cr, 2, '.', '');?></b></td>
    </tr>
  </tbody>
</table>
    <?
}
?>