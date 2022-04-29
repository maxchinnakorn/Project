  <?
  include "../inc/connect_nbac.php";
  		  $sql="INSERT INTO `nbac`.`sdq` (`student_id`, `skill`, `study`, `economy`, `guard`, `healthy`, `drugs`, `safe`, `sexual`, `eq`, `conduct`, `adhd`, `friendly`, `social`, `group`) VALUES ('$stuid', '$skill', '$study', '$eco', '$guard', '$healthy', '$drugs', '$safe', '$sexual', '$eq', '$conduct', '$adhd', '$friendly', '$social', '$ans');";
		   
		  mysql_query($sql);
		  mysql_query("SET NAMES TIS-620");
		  
		  //SQL บันทึกข้อมูล
		  echo $_POST['skill'];
		  echo $_POST['study'];
  ?>