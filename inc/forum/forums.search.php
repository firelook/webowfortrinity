<?php
/*
 *  Copyright (C) 2010  TrinityScripts <http://www.trinityscripts.xe.cx/>
 *
 *  This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */


if (INCLUDED!==true) { include('index.htm'); exit; }

?>
<style type="text/css">
	.breakWord { width:100%; overflow: hidden; word-wrap:break-word; }
</style>
<script type="text/javascript" src="new-hp/js/forum.js"></script>
<div style="height: 21px; left: -1000px; top: 420px; visibility: hidden;" id="contents">

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
	<td><img src="new-hp/images/pixel.gif" alt="" height="1" width="1"></td>
	<td bgcolor="#000000"></td>
	<td><img src="new-hp/images/pixel.gif" alt="" height="1" width="1"></td>
</tr>
<tr>
	<td bgcolor="#000000"></td>
	<td>
	
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
			  <tbody><tr>
				<td bgcolor="#000000" height="1" width="1"></td>
				<td bgcolor="#d5d5d7" height="1"><img src="new-hp/images/pixel.gif" alt="" height="1" width="1"></td>
				<td bgcolor="#000000" height="1" width="1"></td>
			  </tr>
			  <tr>
				<td bgcolor="#a5a5a5" width="1"><img src="new-hp/images/pixel.gif" alt="" height="1" width="1"></td>
				<td class="trans_div" valign="top"><div style="color: rgb(255, 255, 255); visibility: visible;" id="tooltipText"><b>Gnome</b></div></td> 
				<td bgcolor="#a5a5a5" width="1"><img src="new-hp/images/pixel.gif" alt="" height="1" width="1"></td>
			  </tr>
			  <tr>
				<td bgcolor="#000000" height="1" width="1"></td>
				<td bgcolor="#4f4f4f"><img src="new-hp/images/pixel.gif" alt="" height="2" width="1"></td>
				<td bgcolor="#000000" height="1" width="1"></td>
			  </tr>
			</tbody></table>
	
	</td>
	<td bgcolor="#000000"></td>
</tr>
<tr>
	<td><img src="new-hp/images/pixel.gif" alt="" height="1" width="1"></td>
	<td bgcolor="#000000"></td>
	<td><img src="new-hp/images/pixel.gif" alt="" height="1" width="1"></td>
</tr>
</tbody></table>
			

</div>
<script type="text/javascript">

//<![CDATA[
var objGlobal;
var startContainerHeight=0;
var topPadding=365;
if(is_safari)
	topPadding=240;
var topScrollLocation=0;

function floater(){
	
	try{
	var scrollTopValue=document.documentElement.scrollTop;
	if(is_safari)
		scrollTopValue=document.body.scrollTop;
	var divHeight=document.getElementById("floatingContainer"+previousPost).offsetHeight;
	var browserHeight=document.documentElement.clientHeight;

		if(scrollTopValue>topPadding && divHeight<browserHeight){
				if((scrollTopValue+divHeight)<(document.body.offsetHeight-260))
					objGlobal.style.top=scrollTopValue-topPadding+"px";
					


		}else{

				objGlobal.style.top="0px";

		}
	}catch(err){}

}
function init(){

	objGlobal = document.getElementById("floatingContainer2");
	window.onscroll=floater;
	switchPost(postIdArray[0])
	
}
function testFunc(){

	alert(objGlobal.style.top)
	objGlobal.style.top=200+"px";

}

var previousPost=0;
var previousBg=1;

function hilightPost(postId) {
	var obj;

	if(postId != previousPost && postId != 0){
		obj = document.getElementById("colorMod" + postId);
		obj.style.backgroundColor="#0D242D";
	}
	
}

function restorePost(postId) {
	var obj;

	if(postId != previousPost && postId != 0){
		obj = document.getElementById("colorMod" + postId);
		obj.style.backgroundColor="transparent";
	}


}

function switchPost(postId, linkId) {
	var obj;
	
	
	if (postId == previousPost) {
		document.location.href=linkId;
	
	}else{
	
		if(previousPost) {
		
			obj = document.getElementById("colorMod" + previousPost);
			// added to avoid javascript error for no search results
			if (obj == null) {
				return;
			}
			obj.style.backgroundColor="transparent";
			
			obj = document.getElementById("floatingContainer" + previousPost);
			obj.style.display="none";		
			
			obj = document.getElementById("searchArrow" + previousPost);
			obj.style.visibility="hidden";
			
			obj = document.getElementById("miniText" + previousPost);
			obj.innerHTML='<img src="new-hp/images/<?php echo $_LANG['LANG']['SHORT_TAG']; ?>/forum/button-preview-post.gif" border="0" alt="" />';

		}


		obj = document.getElementById("searchArrow" + postId);
		// added to avoid javascript error for no search results
		if (obj == null) {
			return;
		}
		obj.style.visibility="visible";

		obj = document.getElementById("floatingContainer" + postId);
		obj.style.display="block";

		obj = document.getElementById("colorMod" + postId);
		obj.style.backgroundColor="#063449";

		obj = document.getElementById("miniText" + postId);

		obj.innerHTML='<img src="new-hp/images/<?php echo $_LANG['LANG']['SHORT_TAG']; ?>/forum/button-jumpto-post.gif" border="0" alt="" />';



		var divHeight=document.getElementById("floatingContainer"+postId).offsetHeight;

		if(startContainerHeight==0)
			startContainerHeight = document.getElementById("searchbackground").offsetHeight;
		
		
		obj = document.getElementById("floatingContainer");

		if(!is_opera)
		if (divHeight > startContainerHeight){
			obj.style.height=divHeight+"px";
			obj = document.getElementById("searchbackground");
			obj.style.height=divHeight+"px";
		}else{
			obj.style.height=startContainerHeight+"px";
			obj = document.getElementById("searchbackground");
			obj.style.height=startContainerHeight+"px";			
		}
		

		//alert(obj.style.height)

		previousPost = postId;

		floater();

		//testFunc();

	}

}

function checkSearchField(){
	textSearch = document.searchForm.searchText.value;
	characterName = document.searchForm.characterName.value;
	return true;
}

init();
//]]>
</script>
<!-- Thread search options -->
<div class="clear"></div>
<div id="searchshell">
<form method="get" action="?n=forums&f=search" onsubmit="javascript: return checkSearchField()" name="searchForm" accept-charset="UTF-8">
<input name="n" value="forums" type="hidden" />
<input name="f" value="search" type="hidden" />
<input name="stationId" value="1" type="hidden" />
<div id="searchborder">
	<div>
		<div>
			<div>
				<div>
					<div class="padding">
	<div class="searchbox">
		<div class="listbox">
			<ul>
				<li class="icon"><img src="new-hp/images/forum/icons/search-text.gif" alt="Search" border="0"></li>
				<li class="text"><span><b>Forum Search:</b></span></li>
				<li>
					<select name="forumId">
					<optgroup label="Non-Categorized">
					<option value="0" SELECTED>All	
					<?php 
					$getallforums = mysql_query("SELECT id_forum, title, `group` FROM forums WHERE viewlevel<='".$userlvl."' ORDER BY `group`, title ASC", $MySQL_CON);
					while ($rowforum = mysql_fetch_array($getallforums)) {
						if ($fgroup!=$rowforum['group']) {
							$fgroup=$rowforum['group'];
							echo '<optgroup label="'.$FORUM_GROUP[$rowforum['group']].'">';
						}
						echo'<option value="'.$rowforum['id_forum'] .'">'.$rowforum['title'];
					}			
					?>
					</select>
				</li>
			</ul>
			<ul>
				<li class="icon"><img src="new-hp/images/forum/icons/search-text.gif" alt="Search" border="0"></li>
				<li class="text"><span><b>Topic Type:</b></span></li>
				<li>
					<select name="forumType">
					<option value="0" SELECTED>Any	
					<option value="news">News
					<option value="community">Community
					<option value="contest">Contest
					</select>
				</li>
				<li class="icon" style="padding-left: 5px;"><img src="new-hp/images/forum/icons/search-text.gif" alt="Blizzard Entertainment" border="0"></li>
				<li class="text"><span><b>Posts Search:</b></span></li>
				<li>
					<select name="searchType">
					<option value="post">Entire Post
					<option value="title">Titles Only
					</select>
				</li>
			</ul>
			<ul>
				<li class="icon"><img src="new-hp/images/pixel.gif" style="background: url('new-hp/images/forum/icons/flag.gif') no-repeat 0 50%;" border="0" height=21></li>
				<li class="text"><span><b>Topic Flag:</b></span></li>
				
				<li class="icon" style="padding-left: 0px;"><img src="new-hp/images/forum/square-grey.gif" alt="Blizzard Entertainment" border="0"></li>
				<li style="padding-top: 3px; margin-left: -8px"><span><b><label for="blizzardPoster2">Viewed:</label></b></span></li>
				<li><span><input class="checkbox" name="viewed" id="blizzardPoster2" value="true" type="checkbox" CHECKED></span></li>
				
				<li class="icon" style="padding-left: 10px;"><img src="new-hp/images/forum/square.gif" alt="Blizzard Entertainment" border="0"></li>
				<li style="padding-top: 3px; margin-left: -8px"><span><b><label for="blizzardPoster3">Unviewed:</label></b></span></li>
				<li><span><input class="checkbox" name="unviewed" id="blizzardPoster3" value="true" type="checkbox" CHECKED></span></li>	
				
				<li class="icon" style="padding-left: 10px;"><img src="new-hp/images/forum/square-new.gif" alt="Blizzard Entertainment" border="0"></li>
				<li style="padding-top: 3px; margin-left: -8px"><span><b><label for="blizzardPoster4">New:</label></b></span></li>
				<li><span><input class="checkbox" name="new" id="blizzardPoster4" value="true" type="checkbox" CHECKED></span></li>	
				
				<li class="icon" style="padding-left: 10px;"><img src="new-hp/images/forum/square-update.gif" alt="Blizzard Entertainment" border="0"></li>
				<li style="padding-top: 3px; margin-left: -8px"><span><b><label for="blizzardPoster5">Updated:</label></b></span></li>
				<li><span><input class="checkbox" name="updated" id="blizzardPoster5" value="true" type="checkbox" CHECKED></span></li>	
			</ul>
			<ul>
				<li class="icon"><img src="new-hp/images/forum/icons/search-text.gif" alt="Search" border="0"></li>
				<li class="text"><span><b>Text Search:</b></span>
				</li>
				
				<li><span><input name="searchText" size="40"></span>				
				</li>
			</ul>
			<ul>
				<li class="icon"><img src="new-hp/images/forum/icons/search.gif" alt="Search" border="0"></li>
				<li class="text"><span><b>Player Search:</b></span></li>
				
				<li><span><input name="characterName" value="" style="width: 100px;"></span>				
				</li>
				
				<li class="icon" style="padding-left: 5px;"><img src="new-hp/images/forum/icons/search-blizz.gif" alt="Blizzard Entertainment" border="0"></li>
				<li style="padding-top: 3px;"><span><b><label for="blizzardPoster1">Blizzard Poster Only:</label></b></span></li>
				<li><span><input class="checkbox" name="blizzardPoster" id="blizzardPoster1" value="true" type="checkbox"></span></li>		
			</ul>
			<ul>	
				<li class="icon"><img src="new-hp/images/forum/icons/search-recent.gif" alt="Blizzard Entertainment" border="0"></li>
				<li class="text"><span><b>Recent posts:</b></span></li>
				<li>					
					<select name="recentPosts" style="display: inline;">
						<option value="0" selected="selected">All Time</option>					
						<option value="1">Last Hour</option>
						<option value="24">Last Day</option>
						<option value="72">Last 3 Days</option>
						<option value="168">Last 7 Days</option>
					</select>
				</li>
			</ul>
			<div style="position: relative; clear: both; width: 1px;"><input src="new-hp/images/<?php echo $_LANG['LANG']['SHORT_TAG']; ?>/forum/search-button.gif" style="position: absolute; top: -48px; left: 403px;" class="button" type="image"></div>
			</div>
		</div>
	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
</div>



<script type="text/javascript">
//<![CDATA[
	var postIdArray = new Array;
//]]>
</script>

<?php
$userlvl = verifylevel($_SESSION['userid']);
$postsPerPage = 10;
if(isset($_GET['searchText']))
{
	if(!isset($_GET['pageNo'])) $_GET['pageNo'] = 1;
	$current = (int)$_GET['pageNo'];
	$offset = ($current - 1) * $postsPerPage;
	
	$ar = array('forumId','forumType','viewed','unviewed','new','updated','recentPosts','blizzardPoster','searchType','searchText');
	foreach($_GET as $k=>$v)
		if(in_array($k,$ar))
			$$k = $v;
			
	$sql = "SELECT a.username, topic.title, posts.date, posts.hour, posts.id_post, posts.text as post, topic.id_topic,
				TIME_FORMAT( NOW() - UTC_TIMESTAMP(), '%H:%i' ) AS tz_offset,
				DATE_FORMAT(DATE_ADD(posts.date,INTERVAL (TIME_TO_SEC(posts.hour) - TIME_TO_SEC(NOW() - UTC_TIMESTAMP())) SECOND),'%d/%m/%Y %H:%i:%s') as postDateUTC,
				DATE_FORMAT(DATE_ADD(posts.date,INTERVAL TIME_TO_SEC(posts.hour) SECOND), '%d/%m/%Y %H:%i:%s') as postDate
			FROM forum_topics topic
			LEFT JOIN forum_posts posts ON (topic.id_topic = posts.id_topic)
			LEFT JOIN account a ON (posts.id_account = a.id)
			LEFT JOIN forums f ON (topic.id_forum = f.id_forum OR topic.id_forum_moved = f.id_forum)
			LEFT JOIN account_access c ON (a.id = c.id)
			LEFT JOIN forum_views w ON (w.id_topic = topic.id_topic)
			WHERE topic.viewlevel <= '".$userlvl."'
			AND f.viewlevel <= '".$userlvl."'";
	if($searchType == 'title') $sql .= " AND topic.title LIKE '%".$searchText."%'";
	if($searchType == 'post') $sql .= " AND posts.text LIKE '%".$searchText."%'";
	if($forumId != 0) $sql .= " AND f.id_forum = '".$forumId."'";
	if($forumType != 0) {}
	if($viewed && $unviewed)
	{
		$sql .= " AND (w.id_account = '".$_SESSION['userid']."'";
		$sql .= " OR w.id_account != '".$_SESSION['userid']."' OR w.id_account IS NULL)";
	}
	else
	{
		if($viewed) $sql .= " AND w.id_account = '".$_SESSION['userid']."'";
		if($unviewed) $sql .= " AND w.id_account != '".$_SESSION['userid']."' OR w.id_account IS NULL";
	}
	if($new) {}
	if($updated) {}
	if($characterName) $sql = " AND a.username = '".$_GET['characerName']."'";
	if($recentPosts != 0) 
		$sql .= " AND TIMESTAMPDIFF(HOUR,DATE_ADD(posts.date,INTERVAL TIME_TO_SEC(posts.hour) SECOND),NOW()) <= ".$recentPosts;
	if($blizzardPoster)
		$sql .= " AND c.gmlevel >= 3";
	
	$sql .= " ORDER BY date DESC, hour DESC";
	$count = mysql_num_rows(mysql_query($sql,$MySQL_CON));
	$sql .= " LIMIT $offset,$postsPerPage";
	// This could be more effecient using for loop instead of foreach later, but I'm lazy and this is easy :P
	$res = mysql_query($sql, $MySQL_CON);
	$searched = true;
}

?>
<!-- have search results -->
<?php if($searched): ?>
	<div id="cover" style="position: absolute; z-index: 999999; top: 0px; right: 10px; width: 300px; height: 3000px; display: none; background-color: red;"></div>

<div id="topicheader">

	<div style="float: right;">
	<a href="?n=forum"><img src="new-hp/images/<?php echo $_LANG['LANG']['SHORT_TAG']; ?>/forum/forum-index.gif" alt="" border="0" height="41" width="104"></a>
	</div>
	
	<div id="topicview" style="margin-top: 14px;">
		<ul>
			<li><span title="Current time"><small><font color="white"><b>&nbsp;Forum Search Results</b> | <?php echo gmdate('d/m/Y H:i:s',time()).' UTC'; ?>&nbsp;</font></small></span></li>
		</ul>
	</div>
</div>

<!-- Paging -->
<div id="paging">
	<div class="rpage">
	<span>
	
	<table border="0" cellpadding="0" cellspacing="0">
<tbody><tr>
<?php
$query = '?'.$_SERVER['QUERY_STRING'];
$results = array();

while($r = mysql_fetch_assoc($res))
	if(!empty($r)) $results[] = $r;

$pages = ceil($count / $postsPerPage);
if($current > 1):
?>
<td><a href="<?php echo $query.'&amp;pageNo='.($current - 1); ?>"><img src="new-hp/images/forum/arrow-left.gif" border="0"></a></td>
<?php endif; ?>
<td><small>
<?php for($i = 1; $i <= $pages; ++$i): ?>
<a href="<?php echo $query.'&amp;pageNo='.($i+1); ?>"<?php if($i == $current) echo ' class="current"'; ?>><?php echo $i; ?></a>
<?php if($pages > $i) echo '&nbsp;.&nbsp;'; 
endfor; ?>
</small></td>

<td><?php if($pages >= ($current + 1)): ?>
<a href="<?php echo $query.'&amp;pageNo='.($current + 1); ?>"><img src="new-hp/images/forum/arrow-right.gif" border="0"></a>
<?php endif; ?>
</td></tr></tbody></table> 
	</span>	
	</div>
</div>



 <!-- search submitted -->

<!-- // begin search results disply -->
<!-- // start search content -->
<div id="searchcontainer"><!-- search container -->
	<table style="min-width: 920px;" border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td valign="top" width="50%">
<!--[if IE]>
<div style="width: 450px;"><img src="/images/pixel.gif" /></div>
<![endif]-->
	<div style="position: relative; display: block; width: 100%;">
		<div style="margin: 0pt auto; position: relative; width: 420px;">
			<div class="searchbanner"><img src="new-hp/images/<?php echo $_LANG['LANG']['SHORT_TAG']; ?>/forum/title-search-results.gif" style="position: absolute; top: 7px; left: 120px;" title="Search Results" alt="search-results" border="0">
			</div>
		</div>
	</div>

	<div style="height: auto;" id="searchbackground">
		<div class="right">
<!--[if IE]>
<img src="images/pixel.gif" alt="" width="1" height="240" align="left" />
<![endif]-->

<?php 
$i = 0;

foreach($results as $row):
?>

		<script type="text/javascript">
		//<![CDATA[
		<?php echo 'postIdArray['.$i.']="'.$row['id_post'].'"'; ?>
		//]]>
		</script>

		
		<a name="<?php echo $row['id_post'] ?>"></a>
		<!-- Main Post Body -->

		<!-- //including includes/insert-search-result.jsp -->

		
		
		

		

<div id="postshell<?php echo ($i % 2) + 1; ?>1" style="cursor: pointer;" onclick="javascript:switchPost('<?php echo $row['id_post']; ?>','?n=forums&amp;t=<?php echo $row['id_topic']; ?>&amp;postId=<?php echo $row['id_post'] ?>&sid=1#<?php echo $row['id_post']; ?>')" onmouseover="javascript:hilightPost('<?php echo $row['id_post'] ?>')" onmouseout="javascript:restorePost('<?php echo $row['id_post'] ?>')">
	
	<div class="resultbox">
		<div class="postdisplay">
			<div class="border">
				<div class="postingcontainer<?php echo ($i % 2) + 1; ?>1">
					<div class="insert">
<div id="resultsContainer">
	<div class="resultbox"><!-- search results container -->
		<div class="post<?php echo ($i % 2) + 1; ?>">
			<div class="postf<?php echo ($i % 2) + 1; ?>">
				<div class="floatRight">
					<div id="miniText<?php echo $row['id_post'] ?>" class="miniText"><img src="new-hp/images/<?php echo $_LANG['LANG']['SHORT_TAG']; ?>/forum/button-preview-post.gif" alt="" border="0"></div>
				<div style="visibility: hidden;" class="searchArrow" id="searchArrow<?php echo $row['id_post'] ?>"></div>
				<img src="new-hp/images/forum/icons/arrow.gif" alt="" style="position: relative; top: 7px;" border="0">
				</div>
		<div style="background-color: transparent;" id="colorMod<?php echo $row['id_post'] ?>" class="excerptPadd">
			<div class="breakWord">
			<ul>
				<li><span><a href="javascript:switchPost('<?php echo $row['id_post'] ?>','?n=forums&amp;t=<?php echo $row['id_topic']; ?>&amp;postId=<?php echo $row['id_post'] ?>&sid=1#<?php echo $row['id_post']; ?>')"><?php echo $row['title']; ?></a></span><br>
				<span class="blue" style="font-size: 11px;">Posted By <b><?php echo $row['username']; ?></b> on <?php echo $row['postDateUTC'];?> UTC</span>			
				</li>
				<li class="summary"><span><i>
                <?php
				$target = isset($_GET['searchType'])?$_GET['searchType']:'';
				if($target == 'post' && $target != "")
				{
					$pos = strpos($row['post'],$searchText);
					if($pos < 100)
						$start = 0;
					else
						$start = $pos - 100;
						
					if(($len = strlen($row['post'])) < ($pos + 100))
						$end = $len;
					else
						$end = ($start == 0) ? 200 : $pos + 100;
					
					$post = substr($row['post'],$start,$end);
					if($start > 0)
						$post = '...'.$post;
					if($len > $end)
						$post .= '...';
						
					$post = str_replace($searchText,'<span class="highlight">'.$searchText.'</span>',$post);
				}
				else
				{
					$post = substr($row['post'],0,200);
					if(($len = strlen($row['post'])) > 200)
						$post .= '...';
				}
                
				echo $post;
				?></i></span>
				</li>
			</ul>
			</div><!-- end break -->
		</div>
	</div>
</div>

	</div><!-- end search results container -->
</div>
					</div><!-- end insert -->
				</div><!-- end innercontainer -->
			</div><!-- end border -->
		</div><!-- end postdisplay -->
	</div><!-- end resultbox -->
</div><!-- End div postshell -->


		<!-- include of includes/insert-search-result.jsp finished -->



<?php 
$i++;
endforeach;
?>
 <!-- search submitted -->

		</div>
	</div>
		</td>
		<td class="displaybox" valign="top" width="50%">
<!--[if IE]>
<div style="width: 450px;"><img src="/images/pixel.gif" /></div>
<![endif]-->
	<div style="position: relative; z-index: 999999999; width: 100%;">
		<div style="margin: 0pt auto; position: relative; width: 420px;">
			<div class="postpreview"><img src="new-hp/images/<?php echo $_LANG['LANG']['SHORT_TAG']; ?>/forum/title-post-preview.gif" style="position: absolute; top: 7px; left: 128px;" title="Post Preview" alt="post-preview" border="0">
			</div>
		</div>
	</div>
	<div style="height: auto;" id="floatingContainer">
		<div style="top: 0px;" id="floatingContainer2">

	

<?php 
$i = 0;

foreach($results as $row):

?>
		

		<a name="<?php echo $row['id_post'] ?>"></a>

		<!-- Main Post Body -->

		<!-- //including includes/insert-search-result.jsp -->

<div id="floatingContainer<?php echo $row['id_post'] ?>" style="display: none;">
	<div class="resultbox">
		<div class="postdisplay">
			<div class="border">
				<div class="innercontainer">
					<div class="secondcontainer">
			<div class="breakWord">
<div style="float: right;"><div style="position: relative;"><a href="?n=forums&amp;t=<?php echo $row['id_topic']; ?>&amp;postId=<?php echo $row['id_post'] ?>&amp;sid=1#<?php echo $row['id_post']; ?>"><img src="new-hp/images/<?php echo $_LANG['LANG']['SHORT_TAG']; ?>/forum/button-jumptopost.gif" title="Jump To This Post" style="position: absolute; top: 2px; right: 4px;" alt="jumptopost" border="0"></a></div></div>
					<ul>
						<li class="postavatar">
				<div id="avatar" style="width: 85px;">
					<div class="shell">
<table border="0" cellpadding="0" cellspacing="0">
	<tbody><tr>
		<td style="background: transparent url(new-hp/images/forum/portraits/wow/0-7-1.gif) repeat scroll 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;" height="64" width="64">
		</td>
	</tr>
</tbody></table>
			<div class="frame">
				<img src="new-hp/images/forum/pixel.gif" alt="" border="0" height="83" width="82">
			</div>
		</div>
		<div style="position: relative;">
			<div class="iconPosition" style="right: 4px;">
			
				
				<b><small><?php echo $row['charLevel']; ?></small></b>
			
			</div>
		
<!-- //Begin Character ID Panel// -->		
			
				<div id="iconpanelhide<?php echo ($i % 2) + 1; ?>1">
					<div id="search-iconpanel"></div>
						<div id="search-icon-panel">
						<div class="player-icons-race" style="background: transparent url(/images/icon/race/7-0.gif) no-repeat scroll 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;" onmouseover="ddrivetip('<b><?php echo $row['charRace']; ?></b>','#ffffff')" ;="" onmouseout="hideddrivetip()">
						<img src="new-hp/images/forum/pixel.gif" alt="" height="18" width="18">
						</div>						
						<div class="player-icons-class" style="background: transparent url(/images/icon/class/1.gif) no-repeat scroll 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;" onmouseover="ddrivetip('<b><?php echo $row['charClass']; ?></b><br><i>Click to View Talent Build</i>','#ffffff')" ;="" onmouseout="hideddrivetip()">						
						
						<a href="character-talents.xml?r=<?php echo $row['charRealm']; ?>&amp;n=<?php echo $row['charName'];?>" target="_blank"><img src="new-hp/images/forum/icon-active.png" alt="" class="png" border="0" height="18" width="18"></a>
						</div>						
							
																					
						<div class="player-icons-pvprank" style="background: transparent url(/images/icon/pvpranks/rank<?php echo $row['charPvprank'];?>.gif) no-repeat scroll 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;" onmouseover="ddrivetip('<b>Rank: <?php echo $pvprank[$row['charPvprank']];?></b><br><i>Lifetime Highest PvP Rank</i>','#ffffff')" ;="" onmouseout="hideddrivetip()"></div>
						
						
						
						</div>
					</div>
			
<!-- //End Avatar Panel// -->
		</div>		
	</div>				
	
						</li>
						<li class="userdata"><span> <a href="?n=forums&amp;t=<?php echo $row['id_topic']; ?>&amp;postId=<?php echo $row['id_post'] ?>&amp;sid=1#<?php echo $row['id_post']; ?>"><?php echo $row['title']; ?></a><br><?php echo $row['postDateUTC'];?> UTC</span><br>
						<span><b>by <span style="color: rgb(255, 172, 4);"><?php echo $row['charName'];?></span> <a href="?n=forums&amp;=search&amp;characterName=<?php echo $row['charName'];?>&amp;sid=1"><img src="new-hp/images/forum/search.gif" style="vertical-align: middle;" onmouseover="ddrivetip('View All Posts by This User','#ffffff')" onmouseout="hideddrivetip()" alt="search" border="0" height="21" width="17"></a></b><br>
									
					<small>Guild:&nbsp;</small>
					<small><b><?php echo $row['charGuild'];?></b></small>			
				
			<br>
				
					<small>Realm:&nbsp;</small>
					<small><b><?php echo $row['charRealm'];?></b></small>
				
						</span></li>
						</ul>
						<ul>
						<li class="summary">	
							<div id="messagepanel">
								<div class="message-body">
							<img src="new-hp/images/forum/search-text-bubble.gif" alt="" style="position: absolute; top: -15px; left: 120px;" border="0">
									<div class="message-format"><span>
<?php
$post = $row['post'];
if(($len = strlen($post)) < 100) {
	// Pad spaces so we get nice looking search results
	$post .= str_repeat("&nbsp; ",(100 - $len));
}

if($target == 'post') $post = str_replace($searchText,'<span class="highlight">'.$searchText.'</span>',$post);
echo $post;
?>
</span></div>
								</div>
							</div>
						</li>
					</ul>
			</div><!-- end break -->
					</div><!-- end secondcontainer -->
				</div><!-- end innercontainer -->
			</div><!-- end border -->
		</div><!-- end postdisplay -->
	</div><!-- end resultbox -->
</div>	

		<!-- include of includes/insert-search-result.jsp finished -->

<?php 
$i++;
endforeach;
?>



 <!-- have search results -->
 
 		</div>
	</div>
		</td>
	</tr>
</tbody></table>
</div>
<!-- // end search results -->



<div id="paging">
	<div class="rpage">
	<span>
	
	<table border="0" cellpadding="0" cellspacing="0">
<tbody><tr>
<?php if($current > 1):
?>
<td><a href="<?php echo $query.'&amp;pageNo='.($current - 1); ?>"><img src="new-hp/images/forum/arrow-left.gif" border="0"></a></td>
<?php endif; ?>
<td><small>
<?php for($i = 1; $i <= $pages; ++$i): ?>
<a href="<?php echo $query.'&amp;pageNo='.($i+1); ?>"<?php if($i == $current) echo ' class="current"'; ?>><?php echo $i; ?></a>
<?php if($pages > $i) echo '&nbsp;.&nbsp;'; 
endfor; ?>
</small></td>

<td>
<?php if($pages >= ($current + 1)): ?>
<a href="<?php echo $query.'&amp;pageNo='.($current + 1); ?>"><img src="new-hp/images/forum/arrow-right.gif" border="0"></a>
<?php endif; ?>
</td></tr></tbody></table>
	</span>
	</div>
</div>

<?php endif; ?>
