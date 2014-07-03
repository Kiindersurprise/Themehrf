<?php
global $nuked;

$sql_m = mysql_query("SELECT " . TEAM_TABLE . ".cid, " . TEAM_TABLE . ".lientheme, " . TEAM_TABLE . ".titre, " . GAMES_TABLE . ".icon FROM " . TEAM_TABLE . " INNER JOIN " . GAMES_TABLE . " ON " . TEAM_TABLE . ".game = " . GAMES_TABLE . ".id");

if($id_section == '' || $id_section == 0) $class = 'class="active"';

echo'<ul class="nav nav-justified">
					<li '.$class.'><a href="?user_theme=themehrf_main" class="thispage"><img src="favicon.ico" alt="HRF" title="HRF"></a>
					</li>';
	while (list($cid, $lientheme, $titre_r, $icon) = mysql_fetch_array($sql_m))
		{
		if($lientheme == '') $href = '"#" class="absent"';
		else $href = '"?user_theme='.$lientheme.'"';
		if($id_section == $cid) { $class = 'class="active"'; $href = '"#"'; }
		else $class = '';
		
		echo '<li '.$class.'><a href='.$href.'><img src="' . $icon . '" alt="' . $titre_r . '" title="' . $titre_r . '"></a></li>';
		}
echo '</ul>';
?>