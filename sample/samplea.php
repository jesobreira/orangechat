<?php
session_start();
$_SESSION['userid'] = "1" // You may want to set it on login
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/loose.dtd" >

<html>
<head>
<title>Sample Chat Integration</title>
<style>
body {
	background-color: #eeeeee;
	padding:0;
	margin:0 auto;
	font-family:"Lucida Grande",Verdana,Arial,"Bitstream Vera Sans",sans-serif;
	font-size:11px;
}
</style>

<!-- start orangechat code -->
<link type="text/css" rel="stylesheet" media="all" href="../orangechat/orangecss.php" />
<script type="text/javascript" src="../orangechat/orangejs.php"></script>
<!-- end orangechat code -->

</head>
<body>
Hello, world. I am <b>admin</b>.
</body>
</html>
