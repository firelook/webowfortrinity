<?php
title($_LANG['COMMUNITY']['TEAMSPEAK']);
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/teamspeak/tsstatus.css" />
<script type="text/javascript" src="/teamspeak/tsstatus.js"></script>
</head>
<body>
<center><?php
require_once("teamspeak/tsstatus.php");
$tsstatus = new TSStatus($SETTING['TS3IP'], $SETTING['TS3QPORT'], $SETTING['TS3SID']);
$tsstatus->imagePath = "/teamspeak/img/";
$tsstatus->showNicknameBox = $SETTING['TS3SHOWAC'];
$tsstatus->showPasswordBox = $SETTING['TS3SHOWPW'];
$tsstatus->decodeUTF8 = true;
$tsstatus->timeout = 2;
$tsstatus->setLoginPassword($SETTING['TS3USER'], $SETTING['TS3PASS']);
echo $tsstatus->render();
?></center>
</body>
</html> 