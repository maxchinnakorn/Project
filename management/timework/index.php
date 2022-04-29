<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<?php
$text = array();
//$strSQL = "SELECT * FROM test_grid order by id Limit 5";
//$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
//while ($objResult = mysql_fetch_array($objQuery)) {
//	$text[] = $objResult["text"];
$text[] = "1"."2"."3"."4"."5";
//}
?>
<body>
<div id="console"></div>
<script>
var con = document.getElementById("console");
var text = <?php echo json_encode($text); ?>;
function showLine() {
	if (!text.length) {
		return;
	}
	con.innerHTML += '<div>' + text.shift() + '</div>';
	setTimeout(showLine, 5000);
}
showLine();
</script>
</body>
</html>