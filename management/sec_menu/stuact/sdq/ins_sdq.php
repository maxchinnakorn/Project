<?php
			$sqladd="UPDATE `sdq` SET `skill`='".@$_POST['skill'.$row[1]]."', `study`='".@$_POST['study'.$row[1]]."', `economy`='".@$_POST['eco'.$row[1]]."', `guard`='".@$_POST['guard'.$row[1]]."', `healthy`='".@$_POST['healthy'.$row[1]]."', `drugs`='".@$_POST['drugs'.$row[1]]."', `safe`='".@$_POST['safe'.$row[1]]."', `sexual`='".@$_POST['sexual'.$row[1]]."', `eq`='".@$_POST['eq'.$row[1]]."', `conduct`='".@$_POST['conduct'.$row[1]]."', `adhd`='".@$_POST['adhd'.$row[1]]."', `friendly`='".@$_POST['friendly'.$row[1]]."', `social`='".@$_POST['social'.$row[1]]."', `group`='1' WHERE (`student_id`='".$row[1]."');";	
			//$sqladd="INSERT INTO `sdq` (`student_id`, `skill`, `study`, `economy`, `guard`, `healthy`, `drugs`, `safe`, `sexual`, `eq`, `conduct`, `adhd`, `friendly`, `social`, `group`) VALUES ('99999', 'ggg', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1')";	   
		  mysql_query($sqladd);
		  mysql_query("SET NAMES TIS-620");
          ?>