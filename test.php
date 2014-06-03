<?php  
$html = file_get_contents('http://steamcommunity.com/groups/TeamHRF');

preg_match_all('/class="count ">(.*?)</',$html, $display);

$members = $display[1][0];
$ingame = $display[1][1];
$online = $display[1][2];

echo "Nombres de membres : $members <br>";
echo "En jeu : $ingame <br>";
echo "En ligne : $online <br>";
?>