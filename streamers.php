<?php
$lesliens = "";
$multitwitch = "http://www.multitwitch.tv/hrftv/";
$sql_streamers = mysql_query("SELECT Stream FROM " . USER_TABLE . " WHERE  niveau >= 3 AND Stream != '' ORDER BY RAND()");
$count_s = mysql_num_rows($sql_streamers);
while(list($lien) = mysql_fetch_array($sql_streamers))
		{
		preg_match('/.tv\/([a-zA-Z0-9,-_]+)/',$lien,$chaine);
		$lesliens .= "".$chaine[1]."|";
		$multitwitch .= "".$chaine[1]."/";
		}
?>