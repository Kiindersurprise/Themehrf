<?php
$html = file_get_contents('http://steamcommunity.com/groups/TeamHRF');

preg_match_all('#class="count(.*?)">(.*?)</#is',$html, $display);


$members = $display[2][0];
$ingame = $display[2][1];
$online = $display[2][2];

echo '<h3 style="text-align:center;color:#9A9A9A;">'.$members.'</h3>
							<h4 style="text-align:center;color:#9A9A9A;\">MEMBRES</h4>
							<h3 style="text-align:center;color:rgb(139, 197, 63);">'.$ingame.'</h3>
							<h4 style="text-align:center;color:rgb(139, 197, 63);">EN JEU</h4>
							<h3 style="text-align:center;color:rgb(98, 167, 227);">'.$online.'</h3>
							<h4 style="text-align:center;color:rgb(98, 167, 227);">EN LIGNE</h4>';
?>