<?php
define("Vote", 1);
session_start();
require "config.php";
require "language.php";
require "functions.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $language["title"]," ",$server_name ?></title>
<style type="text/css">
html, body {
height: 100%;
margin: 0;
padding: 0;
text-align: center;
}
img#bg {
position:absolute;
top:0;
left:0;
width:100%;
}
#content {
position:relative;
z-index:1;
}
body,td,th,h1,a{
color: #000000;
}
</style>
</head>
<body>
<div id="content">
<table width="100%" border="0">
	<tr>
		<td align="right">
<?php
if(isset($_POST["logout"]))
{
	session_destroy();
	$_SESSION = array();
}
if(isset($_SESSION["logged_voting"]))
{
?>
<form method="post" action="index.php">
	<input type="submit" name="logout" value="<?php echo $language["logout"] ?>" />
</form>
<?php
}
else
{
?>
<?php
}
?>
		</td>
	</tr>
</table>
<?php
if(!isset($_SESSION["logged_voting"]))
	require "login.php";
else
	require "main.php";
?>
</div>
</body>
</html>
