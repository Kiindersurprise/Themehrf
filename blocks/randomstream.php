<?php
$lesliens = $_REQUEST['lesliens'];
$chainetodisplay = "hrftv";
$clientId = '8vtyjlrbn7pvjz0ip5suvk439wi82vl';
$check = 0;
$json_array_hrftv = json_decode(file_get_contents('http://api.justin.tv/api/stream/list.json?channel=hrftv'), true);
if ($json_array_hrftv[0]['stream_type'] != 'live') {
		$leschaines = explode('|', $lesliens);
		$thecount = count($leschaines)-1;
		for($i = 0; $i < $thecount; $i++)
		{
$channelName = htmlspecialchars($leschaines[$i], ENT_QUOTES);
$json_array = json_decode(file_get_contents('http://api.justin.tv/api/stream/list.json?channel='.strtolower($channelName).''), true);
if ($json_array[0]['stream_type'] == 'live') {
    $chainetodisplay = $channelName;
	break;
}
else $check++;
}
if ($check == $thecount)
{
$aleatoire = mt_rand(0, 1);
if ($aleatoire == 0)
{
?>

<object type="application/x-shockwave-flash" height="189" width="336" id="live_embed_player_flash" data="http://fr.twitch.tv/widgets/live_embed_player.swf?channel=<?php echo $chainetodisplay; ?>" bgcolor="#000000"><param name="allowFullScreen" value="true" /><param name="allowScriptAccess" value="always" /><param name="allowNetworking" value="all" /><param name="movie" value="http://fr.twitch.tv/widgets/live_embed_player.swf" /><param name="flashvars" value="hostname=fr.twitch.tv&channel=<?php echo $chainetodisplay; ?>&auto_play=false&start_volume=25" /></object>

<?php
}
else
{
?>
<object width="336" height="189"><param name="movie" value="//www.youtube.com/v/VuYb4Hx90_g?version=3&amp;hl=fr_FR"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="//www.youtube.com/v/VuYb4Hx90_g?version=3&amp;hl=fr_FR" type="application/x-shockwave-flash" width="336" height="189" allowscriptaccess="always" allowfullscreen="true"></embed></object>
<?php
}
}
else {
?>
<object type="application/x-shockwave-flash" height="189" width="336" id="live_embed_player_flash" data="http://fr.twitch.tv/widgets/live_embed_player.swf?channel=<?php echo $chainetodisplay; ?>" bgcolor="#000000"><param name="allowFullScreen" value="true" /><param name="allowScriptAccess" value="always" /><param name="allowNetworking" value="all" /><param name="movie" value="http://fr.twitch.tv/widgets/live_embed_player.swf" /><param name="flashvars" value="hostname=fr.twitch.tv&channel=<?php echo $chainetodisplay; ?>&auto_play=false&start_volume=25" /></object>
<?php
}
}
else {
?>
<object type="application/x-shockwave-flash" height="189" width="336" id="live_embed_player_flash" data="http://fr.twitch.tv/widgets/live_embed_player.swf?channel=<?php echo $chainetodisplay; ?>" bgcolor="#000000"><param name="allowFullScreen" value="true" /><param name="allowScriptAccess" value="always" /><param name="allowNetworking" value="all" /><param name="movie" value="http://fr.twitch.tv/widgets/live_embed_player.swf" /><param name="flashvars" value="hostname=fr.twitch.tv&channel=<?php echo $chainetodisplay; ?>&auto_play=false&start_volume=25" /></object>
<?php
}
?>


