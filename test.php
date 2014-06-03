<?php  
$html = file_get_contents('http://steamcommunity.com/groups/TeamHRF');

preg_match_all('/class="count ">(.*?)</',$html, $display);


$members = $display[1][0];
$ingame = $display[1][1];
$online = $display[1][2];

preg_match('/">
			(.*?)			<s/',$html, $display2);

$groupname =  $display2[1];

preg_match('/class="grouppage_logo">
			<img src="(.*?)">/',$html, $display3);
$image = '<img src="'.$display3[1].'">';


echo $image;
echo "<br>";
echo "Nom du groupe : $groupname <br>";
echo "Nombres de membres : $members <br>";
echo "En jeu : $ingame <br>";
echo "En ligne : $online <br>";
?>