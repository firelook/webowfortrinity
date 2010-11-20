<?php
if(!defined("Vote"))
{
	header("Location: index.php");
	exit();
}
?>
<script type="text/javascript">
function validate_required(field, alerttxt)
{
	if (field.value==null || field.value=="")
		{alert(alerttxt);return false;}
return true;
}
function validate_form(thisform)
{
	with (thisform)
	{
		if (validate_required(username, "<?php echo $language["not_entered_username"] ?>")==false)
			{username.focus();return false;}
		if (validate_required(password, "<?php echo $language["not_entered_password"] ?>")==false)
			{password.focus();return false;}
	}
}
</script>
<?php
if(isset($_POST["submit"]))
{
	$_SESSION["realm"] = urldecode($_POST["realm"]);
	$user_name = stripslashes($_COOKIE['ALOG_USER']);
	$user_pass = sha1(strtoupper($user_name.":".stripslashes($_POST["password"])));
	switchConnection("realmd", $_SESSION["realm"]);
	$results = execute_query("SELECT `id`, `username` FROM `account` WHERE `username` = '".mysql_real_escape_string($user_name)."' AND `sha_pass_hash` = '".$user_pass."' LIMIT 1");
	if($row = mysql_fetch_assoc($results))
	{
		$_SESSION["user_id"] = $row["id"];
		$_SESSION["user_name"] = $row["username"];
		$_SESSION["logged_voting"] = 1;
		$_SESSION["panel"] = "index";
		echo "<script type=\"text/javascript\">setTimeout(window.open('index.php', '_self'),0);</script>";
		exit();
	}
	else
		$wrong = 1;
}
if(isset($wrong))
{
?>
<font color="red"><?php echo $language["wrong"] ?></font>
<?php
}
else
	echo $language["enter_name_and_pass"];
?>
<br />
<br />
<form action="index.php" onsubmit="return validate_form(this)" method="post">
<table border="1" cellspacing="1" cellpadding="3" align="center">
	<tr>
		<td width="50%"><?php echo $language["username"] ?></td>
		<td width="50%"><input type="text" name="username" value="<?php echo $_COOKIE['ALOG_USER']; ?>" </td>
	</tr>
	<tr>
		<td><?php echo $language["password"] ?></td>
		<td><input type="password" name="password" value="<?php echo $_COOKIE['ALOG_PASS']; ?>" /></td>
	</tr>
		<tr>
		<td><?php echo $language["realm_name"] ?></td>
		<td>
			<select name="realm">
<?php
foreach($realms as $key => $data)
	echo "<option value=\"",urlencode($key),"\">",$key,"</option>";
?>
			</select>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" name="submit" value="<?php echo $language["submit"] ?>" />
			<input type="reset" value="<?php echo $language["reset"] ?>" />
		</td>
	</tr>
</table>
</form>
