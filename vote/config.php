<?php
require_once ('../inc/conf/conf.database.php');
require_once ('../inc/conf/conf.main.php');


$realms = array(
// "Realm name" => array(realmd_DB, characters_DB, remote_access, tabs)
$SETTING['WEB_SITE_NAME'] => array(1, 1, 1, 1),
//"Your Realm Name 2" => array(2, 2, 2, 2),
//"Your Realm Name 3" => array(3, 3, 3, 3),
);
$realmd_DB = array(
// Connection to realmd DBs
1 => array($SETTING['DB_HOST'].':'.$SETTING['DB_PORT'], $SETTING['DB_USERNAME'], $SETTING['DB_PASSWORD'], $SETTING['DB_AUTH']),
//1 => array("84.19.190.67:3306", "root" , "B8618PKlOr0yYUp6", "trinity_realmd"),
//3 => array("127.0.0.3:3306", "root", "root_pass", "realmd3"),
);
$characters_DB = array(
// Connection to characters DBs
1 => array($SETTING['DB_HOST'].':'.$SETTING['DB_PORT'], $SETTING['DB_USERNAME'], $SETTING['DB_PASSWORD'], $SETTING['DB_CHARS']),
//1 => array("84.19.190.67:3306", "root", "B8618PKlOr0yYUp6", "trinity_characters"),
//3 => array("127.0.0.3:3306", "root", "root_pass", "characters3"),
);
// 1 - remote access, 0 - SOAP
$connection_type = 1;
$remote_access = array(
// Connection to remote access/SOAP
// array(server_remote_ip, remote_port, USERNAME, password)
// USERNAME and PASSWORD must be upper case.
1 => array($SETTING['DB_HOST'].':'.$SETTING['DB_PORT'], $SETTING['DB_USERNAME'], $SETTING['DB_PASSWORD'], $SETTING['DB_WORLD']),
//1 => array("84.19.190.67:3306", "root", "B8618PKlOr0yYUp6", "world"),
//3 => array("localhost", "3445", "USERNAME", "PASSWORD"),
);
$tabs = array(
// Files containing sites and rewards for every realm (all must be placed in folder \tabs)
1 => array("sites.php", "rewards.php"),
//2 => array("sites2.php", "rewards2.php"),
//3 => array("sites3.php", "rewards3.php"),
);

// Back button
$site_link = "../index.php";

// Server Name
$server_name = $SETTING['WEB_SITE_NAME'];

// The way selected vote site will open
// 1 - same window, 0 - pop-up in new window
$open_vote_site = 0;

// Max number of points that every account can get per day
// Default: -1 - number of vote sites
$max_acc_points_per_day = -1;

// IP voting period (in seconds)
$ip_voting_period = 60*60*12;

// Voting sites online check
$use_online_check = True;

// If you are using MaNGOS revision below 8886 change this to 1
$mangos_rev = 1;

// Language Settings
// filename => array(language_form, tooltip, reward_text_language)
// tooltip - choices are "fr", "de", "es", "ru" (for "en" use www)
$langs = array(
"english" => array("English", "www", 0),
"bulgarian" => array("Български", "www", 1),
"deutch" => array("Deutsch", "de", 2),
"spanish" => array("Español", "es", 3),
"portuguese" => array("Português", "www", 4),
"swedish" => array("Svenska", "www", 5),
"french" => array("Français", "fr", 6),
"russian" => array("Русский", "ru", 7),
);

// Default language (english, bulgarian, german, spanish, portuguese)
$default_language = $_COOKIE['SITE_LANG'];

// Language cookie
$cookie_expire = time()+60*60*24;
?>