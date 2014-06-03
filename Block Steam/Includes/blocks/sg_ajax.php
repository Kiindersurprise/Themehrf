<?php
if($_SERVER['HTTP_X_REQUESTED_WITH']!='XMLHttpRequest')
{
	header('Location: index.php');
	exit;	
}
else
{
	header('Content-Type: application/json');
}



if(isset($_POST['gid']) && !empty($_POST['gid']))
{
	if(stristr($_POST['gid'], 'http://steamcommunity.com'))
	{
		$new_user_id = explode("/", $_POST['gid']);
		if(isset($new_user_id[4]))
		{
			$gid = $new_user_id[4];
		}
	}
	elseif(stristr($_POST['gid'], 'steamcommunity.com') && !stristr($_POST['gid'], 'http://'))
	{
		$new_user_id = explode("/", $_POST['gid']);
		if(isset($new_user_id[2]))
		{
			$gid = $new_user_id[2];
		}
	}
	else
	{
		$gid = $_POST['gid'];
	}

	if(isset($gid))
	{
		$interdit = array("/", "<", ">", "\"", "|", "\\", "*", ":", "?", "!", "&", "'", "`", "~", ";", ",", "[", "]", "(", ")");	 
		$gid = str_replace($interdit ,'',$gid);

		if (is_numeric($gid) && preg_match('/1035827914/', $gid,$out))
		{
			$url = 'http://steamcommunity.com/gid/TeamHRF';
		}
		else
		{
			$url = 'http://steamcommunity.com/groups/TeamHRF';
		}
		
		if(function_exists('curl_init'))
		{
			$header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
			$header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";
			$header[] = "Cache-Control: max-age=0";
			$header[] = "Connection: keep-alive";
			$header[] = "Keep-Alive: 300";
			$header[] = "Accept-Encoding: gzip,deflate";
			$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
			$header[] = "Accept-Language: en-us,en;q=0.5";
			$header[] = "Pragma: ";

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
			curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_FAILONERROR, 1);
			curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
			curl_setopt($ch, CURLOPT_TIMEOUT_MS, 3000);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, 1500);
			curl_setopt($ch, CURLOPT_HEADER, 0);

			$content = @curl_exec($ch);
			$code = @curl_getinfo($ch, CURLINFO_HTTP_CODE);
			
			if(curl_errno($ch)){
				if($code >= 400){
					echo json_encode(array("x" => "X", "y" => "Y", "z" => "Z"));
				}else {
					echo json_encode(array("x" => "X", "y" => "Y", "z" => "Z"));
				}
			}
			elseif(preg_match('/No group could be retrieved for the given URL./', $content, $out)){
				echo json_encode(array("x" => "X", "y" => "Y", "z" => "Z"));
			}
			elseif(preg_match('/Steam Community Hubs/', $content, $out)){
				echo json_encode(array("x" => "X", "y" => "Y", "z" => "Z"));
			}
			else {
				$content = @utf8_encode($content);
				
				if(isset($gid) && !empty($gid)) {
					preg_match_all('#class="count(.*?)">(.*?)</#is',$content,$member);
					
					echo json_encode(array("x" => $member[2][0], "y" => $member[2][1], "z" => $member[2][2]));
				}
				else 
				{
					echo json_encode(array("x" => "X", "y" => "Y", "z" => "Z"));
				}
			}
			curl_close($ch);
		}
		else 
		{
			$content = @file_get_contents($url);
			
			if($content == false){
				echo json_encode(array("x" => "X", "y" => "Y", "z" => "Z"));
			}
			elseif(preg_match('/No group could be retrieved for the given URL./', $content, $out)){
				echo json_encode(array("x" => "X", "y" => "Y", "z" => "Z"));
			}
			elseif(preg_match('/Steam Community Hubs/', $content, $out)){
				echo json_encode(array("x" => "X", "y" => "Y", "z" => "Z"));
			}
			else {
				$content = @utf8_encode($content);
				
				if(isset($gid) && !empty($gid)) {
					preg_match_all('#class="count(.*?)">(.*?)</#is',$content,$member);
					
					echo json_encode(array("x" => $member[2][0], "y" => $member[2][1], "z" => $member[2][2]));
				}
				else 
				{
					echo json_encode(array("x" => "X", "y" => "Y", "z" => "Z"));
				}
			}
		}
	}
	else
	{
		echo json_encode(array("x" => "X", "y" => "Y", "z" => "Z"));
	}
}
else 
{
	echo json_encode(array("x" => "X", "y" => "Y", "z" => "Z"));
}
?>