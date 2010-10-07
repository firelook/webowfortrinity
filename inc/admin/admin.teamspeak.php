<?php

if (INCLUDED!==true) { include('index.htm'); exit; }

$forceshow=true;
	
	if ($_POST['step']=='update') {

		if ($haserrors=='') {
		
			$query=mysql_query("UPDATE web_settings SET value='".$_POST['webts3ip']."' WHERE setting='ts3ip'", $MySQL_CON);
			$query=mysql_query("UPDATE web_settings SET value='".$_POST['webts3user']."' WHERE setting='ts3user'", $MySQL_CON);
			$query=mysql_query("UPDATE web_settings SET value='".$_POST['webts3pass']."' WHERE setting='ts3pass'", $MySQL_CON);
			$query=mysql_query("UPDATE web_settings SET value='".$_POST['webts3qport']."' WHERE setting='ts3qport'", $MySQL_CON);
			$query=mysql_query("UPDATE web_settings SET value='".$_POST['webts3sid']."' WHERE setting='ts3sid'", $MySQL_CON);
			$query=mysql_query("UPDATE web_settings SET value='".$_POST['webts3showac']."' WHERE setting='ts3showac'", $MySQL_CON);
			$query=mysql_query("UPDATE web_settings SET value='".$_POST['webts3showpw']."' WHERE setting='ts3showpw'", $MySQL_CON);
			
			if ($query) {
							
				goodborder($_LANG['SUCCESS']['ADMIN_SET']);
				$forceshow=false;
				
			} else {		
				$haserrors .= mysql_error();
			}
		}
	} else 	if ($_POST['step']=='send') {
	
		if (sendemail($_POST['wto'], $_POST['wto'], $SETTING['WEB_SITE_NAME'].': '.$_POST['wsubject'], $_POST['wmsg'], bbcode($_POST['wmsg']))) {
			goodborder('E-Mail Successfully Sent!');
		} else {
			errborder('Couldn\'t Send E-Mail!');
		}	

	}

if ($forceshow==true) {
	remslashall();
	switch($_REQUEST['t']) {
		case "send":
		
		if ($SETTING['EMAIL_ENABLED']=='1' AND $SETTING['USER_ENABLE_MASS_EMAIL']<=verifylevel($_SESSION['userid'])) {
?>
<form method=post action="index.php?n=admin.email&t=send" name="siteadmin" onsubmit="db_valid()">
<script language="javascript">
function db_valid() {
	void(document.siteadmin.step.value="send");
	return true;
}
</script>
	<input type=hidden name="step">
<?php if ($haserrors!="") { errborder($haserrors) .'<br>';} ?>
<table cellspacing = "0" cellpadding = "0" border = "0" width = "95%">
	<tr>
		<td width = "24"><img src = "shared/wow-com/images/headers/subheader/subheader-left-sword.gif" width = "24" height = "20"></td>
		<td width = "100%" bgcolor = "#05374A"><b class = "white">Send E-mail:</b></td>
		<td width = "10"><img src = "shared/wow-com/images/headers/subheader/subheader-right.gif" width = "10" height = "20"></td>
	</tr>
	</table>
	<table width = 95% style = "border-width: 1px; border-style: dotted; border-color: #928058;"><tr><td>
	<table width = 100% style = "border-width: 1px; border-style: solid; border-color: black; background-image: url('new-hp/images/layout/parch-light2.jpg');"><tr><td>
	<table border=0 cellspacing=0 cellpadding=4>
	<tr>
		  <td width=160 align=right>
		  <font face="arial,helvetica" size=-1><span><b>
		To:
		  </span></b></font>
		  </td>
		  <td align=left><table border=0 cellspacing=0 cellpadding=0><tr><td><input name="wto" value="<?php echo $_POST['wto']; ?>" style = "Width:250" taborder=1 /></td><td valign = "top">

		   </td></tr></table></td>
	</tr>
	<tr>
		  <td width=160 align=right>
		  <font face="arial,helvetica" size=-1><span><b>
		Subject:
		  </span></b></font>
		  </td>
		  <td align=left><table border=0 cellspacing=0 cellpadding=0><tr><td><input name="wsubject" value="<?php echo $_POST['wsubject']; ?>" style = "Width:250" taborder=1 /></td><td valign = "top">

		   </td></tr></table></td>
	</tr>
	<tr>
		  <td width=40% align=right>
		  <font face="arial,helvetica" size=-1><span><b>
		  </span></b></font> </td>
		  <td align=left><table border=0 cellspacing=0 cellpadding=0><tr><td>
		  <?php bbcode_toolbar('siteadmin.wmsg'); ?>
		  </td><td valign = "top">
		   </td></tr></table></td>
	</tr>
	<tr>
		  <td width=40% align=right valign=top>
		  <font face="arial,helvetica" size=-1><span><b>
		  Message:  </span></b></font> </td>
		  <td align=left><table border=0 cellspacing=0 cellpadding=0><tr><td>
		  <textarea name="wmsg"  rows=30 cols=45><?php echo $_POST['wmsg']; ?></textarea>
		  </td><td valign = "top">
		   </td></tr></table></td>
	</tr>
	</table>

	</td></tr></table>
	</td></tr></table><br>
		
		<div align=center><input type=image SRC="shared/wow-com/images/buttons/button-continue.gif" name="Submit" alt="Update" Width="174" Height="46" Border=0 class="button"  taborder=7 ></div>

</form>

<?php
		} else {
			errborder($_LANG['ERROR']['ACCESS']);
		}

		break;
		case "settings":
		default:

			?>
<form method=post action="index.php?n=admin.teamspeak&t=settings" name="siteadmin" onsubmit="db_valid()">
<script language="javascript">
function db_valid() {
	void(document.siteadmin.step.value="update");
	return true;
}
</script>
	<input type=hidden name="step">
<?php if ($haserrors!="") { errborder($haserrors) .'<br>';} ?>
<table cellspacing = "0" cellpadding = "0" border = "0" width = "95%">
	<tr>
		<td width = "24"><img src = "shared/wow-com/images/headers/subheader/subheader-left-sword.gif" width = "24" height = "20"></td>
		<td width = "100%" bgcolor = "#05374A"><b class = "white">TS3 Settings:</b></td>
		<td width = "10"><img src = "shared/wow-com/images/headers/subheader/subheader-right.gif" width = "10" height = "20"></td>
	</tr>
	</table>
	<table width = 95% style = "border-width: 1px; border-style: dotted; border-color: #928058;"><tr><td>
	<table width = 100% style = "border-width: 1px; border-style: solid; border-color: black; background-image: url('new-hp/images/layout/parch-light2.jpg');"><tr><td>
	<table border=0 cellspacing=0 cellpadding=4>
	<tr>
		  <td width=160 align=right>
		  <font face="arial,helvetica" size=-1><span><b>
		TS3 IP:
		  </span></b></font>
		  </td>
		  <td align=left><table border=0 cellspacing=0 cellpadding=0><tr><td><input name="webts3ip" style = "Width:150" taborder=1 value="<? echo $SETTING['TS3IP']; ?>"/></td><td valign = "top">

		   </td></tr></table></td>
	</tr>
	<tr>
		  <td width=160 align=right>
		  <font face="arial,helvetica" size=-1><span><b>
		TS3 Querry User:
		  </span></b></font>
		  </td>
		  <td align=left><table border=0 cellspacing=0 cellpadding=0><tr><td><input name="webts3user" style = "Width:150" taborder=1 value="<? echo $SETTING['TS3USER']; ?>"/></td><td valign = "top">

		   </td></tr></table></td>
	</tr>
	<tr>
		  <td width=160 align=right>
		  <font face="arial,helvetica" size=-1><span><b>
		TS3 Querry User Pass:
		  </span></b></font>
		  </td>
		  <td align=left><table border=0 cellspacing=0 cellpadding=0><tr><td><input name="webts3pass" style = "Width:150" taborder=1 value="<? echo $SETTING['TS3PASS']; ?>"/></td><td valign = "top">

		   </td></tr></table></td>
	</tr>
	<tr>
		  <td width=160 align=right>
		  <font face="arial,helvetica" size=-1><span><b>
		TS3 Querry Port:
		  </span></b></font>
		  </td>
		  <td align=left><table border=0 cellspacing=0 cellpadding=0><tr><td><input name="webts3qport" style = "Width:150" taborder=1 value="<? echo $SETTING['TS3QPORT']; ?>"/></td><td valign = "top">

		   </td></tr></table></td>
	</tr>
	<tr>
		  <td width=160 align=right>
		  <font face="arial,helvetica" size=-1><span><b>
		TS3 Server ID:
		  </span></b></font>
		  </td>
		  <td align=left><table border=0 cellspacing=0 cellpadding=0><tr><td><input name="webts3sid" style = "Width:150" taborder=1 value="<? echo $SETTING['TS3SID']; ?>"/></td><td valign = "top">

		   </td></tr></table></td>
	</tr>
	<tr>
		  <td width=160 align=right>
		  <font face="arial,helvetica" size=-1><span><b>
		Show Nickname Field?
		  </span></b></font>
		  </td>
		  <td align=left colspan = "2"><table border=0 cellspacing=0 cellpadding=0><tr><td>
		  <select name='webts3showac'>
		  <option value='true' SELECTED>Yes
		  <option value='false'>No
		  </select>
<script>
	document.siteadmin.wenablemail.value='<?php echo $SETTING['TS3SHOWAC']; ?>';
</script>
		  </td><td valign = "top">

		   </td></tr></table></td>
	</tr>
	<tr>
		  <td width=160 align=right>
		  <font face="arial,helvetica" size=-1><span><b>
		Show Password Field?
		  </span></b></font>
		  </td>
		  <td align=left colspan = "2"><table border=0 cellspacing=0 cellpadding=0><tr><td>
		  <select name='webts3showpw'>
		  <option value='true'>Yes
		  <option value='false' SELECTED>No
		  </select>
<script>
	document.siteadmin.wemailauth.value='<?php echo $SETTING['TS3SHOWPW']; ?>';
</script>
		  </td><td valign = "top">
		   </td></tr></table></td>
	</tr>
	</table>

	</td></tr></table>
	</td></tr></table><br>
		
		<div align=center><input type=image SRC="shared/wow-com/images/buttons/update-button.gif" name="Submit" alt="Update" Width="174" Height="46" Border=0 class="button"  taborder=7 ></div>

</form>

<?php
		break;
	}

}

?>