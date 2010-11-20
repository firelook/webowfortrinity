<?php
if(isset($_POST["setlang"]) && isset($langs[$_POST["setlang"]]))
	$set_lang = $_POST["setlang"];
else if(isset($_COOKIE["SITE_LANG"]) && isset($langs[$_COOKIE["SITE_LANG"]]))
	$set_lang = $_COOKIE["SITE_LANG"];
else
	$set_lang = $default_language;

setcookie("lang", $set_lang, $cookie_expire);
$langfile = "language_files/".$set_lang.".php";

if(file_exists($langfile))
	require $langfile;
?>