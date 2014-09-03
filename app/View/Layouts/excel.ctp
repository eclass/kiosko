<?php
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=" . $this->action . ".xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<html>
<head>
	<title><?php echo $title_for_layout; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
	echo $content_for_layout; 
?>
</body>
</html>