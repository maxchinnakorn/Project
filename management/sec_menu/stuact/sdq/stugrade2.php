<?
############### ภาคเรียนที่ 2 #################
$listsubj2="SELECT
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
stu_score.stuid = ".$stu_id." AND
stu_score.`year` = ".$showyear[0];
$objlist2=mysql_query($listsubj2);
$numlist2=mysql_num_rows($objlist2);
if(empty($numlist2))
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
	for($i2=1;$i2<=$numlist2;$i2++)
	{
		$list2=mysql_fetch_array($objlist2);
		if($list2['score']>=80)
		{ $grade2=4; }
		else if($list2['score']>=75)
		{ $grade2=3.5; }
		else if($list2['score']>=70)
		{ $grade2=3; }
		else if($list2['score']>=65)
		{ $grade2=2.5; }
		else if($list2['score']>=60)
		{ $grade2=2; }
		else if($list2['score']>=55)
		{ $grade2=1.5; }
		else if($list2['score']>=50)
		{ $grade2=1; }
		else
		{ $grade2=0; }
		
		$c2=$i2%2;
		if($c2==0)
		{
			$color2="bgcolor='#E0E0E0'";
		}
		else
		{
			$color2="";
		}
	?>
    <tr>
      <td align="center" <?=$color2?>><?=$list2['subject_id']?></td>
      <td<?=$color2?>><?=$list2['subject_name']?></td>
      <td align="center" <?=$color2?>><?=$list2['subject_cr']?></td>
      <td align="center" <?=$color2?>><?=$list2['score']?></td>
      <td align="center" <?=$color2?>><?=$grade2?></td>
    </tr>
    <?
	$cr2=$cr2+$list2['subject_cr'];
	$GPA2=$GPA2+(($grade2*$list2['subject_cr'])/$numlist2);
	}
	?>
    <tr>
      <td colspan="2" align="center" bgcolor="#FFFE99">&nbsp;</td>
      <td align="center" bgcolor="#FFFE99">รวม <b><?=@$cr2?></b> หน่วยกิต</td>
      <td align="right" bgcolor="#FFFE99">เกรดเฉลี่ย</td>
      <td align="center" bgcolor="#FFFE99"><b><?=number_format($GPA2, 2, '.', '');?></b></td>
    </tr>
  </tbody>
</table>
    <?
}
?>