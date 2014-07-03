<?php

global $nbunread;
	
echo '	<div id="panel">
				<div class="content clearfix">';
   if (!$user) {
  $blok['content'] = '
					<div class="left">
						<h1>Bienvenue chez les ~H.R.F~</h1>
						<img class= "img-responsive" src="themes/themehrf_main/images/logo.png" />
					</div>
					<div class="left">
						<form class="clearfix" method="post" name="login" action="index.php?file=User&amp;nuked_nude=index&amp;op=login">
							<h1>Membre Connexion</h1>
							<label class="grey" for="log">Nom d\'utilisateur:</label>
							<input class="field" type="text" name="pseudo" id="log" value="" size="23" />
							<label class="grey" for="pwd">Mot de passe:</label>
							<input class="field" type="password" name="pass" id="pwd" size="23" />
							<label><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> &nbsp;Connexion automatique</label>
							<div class="clear"></div>
							<input type="submit" name="submit" value="Connexion" class="btn btn-default btn-sm" />
							<a class="lost-pwd" href="#">Mot de passe Perdu ?</a>
						</form>
					</div>
					<div class="left right">
						<form action="#" method="post">
							<h1>Visiteur ? Enregistrez vous !!</h1>				
							<label class="grey" for="signup">Nom d\'utilisateur:</label>
							<input class="field" type="text" name="signup" id="signup" value="" size="23" />
							<label class="grey" for="email">Email:</label>
							<input class="field" type="text" name="email" id="email" size="23" />
							<label>Votre mot de passe sera envoyé par email.</label>
							<input type="submit" name="submit" value="Inscription" class="btn btn-primary btn-sm" />
						</form>
				</div>';
	echo $blok['content'];
}

else {
	$reqhf = mysql_query("SELECT date FROM $nuked[prefix]"._hautfait_membre." WHERE uid = '" . $user[0] . "' AND tampon = 0 ORDER BY date DESC LIMIT 0,1");
		list($date_hf) = mysql_fetch_array($reqhf);
   
	$sqlalert = mysql_query("SELECT alert FROM " . $nuked['prefix'] . "_presence WHERE id = '" . $user[0] . "'");
        list($nb_alert) = mysql_fetch_array($sqlalert);
		
	$sql17 = mysql_query("SELECT team, rang, group1, redacteur, avatar, count FROM " . USER_TABLE . " WHERE id = '".$user[0]."' ");
		list($team1, $rang1, $group1, $redacteur, $avatar, $count) = mysql_fetch_array($sql17);
	
	if($user[1] >= 4) {
		$sqlcolor = mysql_query("SELECT titre, colorhtml FROM " . TEAM_RANK_TABLE . " WHERE id = '".$rang1."' ");
			list($titre_g, $htmlcolor) = mysql_fetch_array($sqlcolor);
			$grade = '<span style="color: '.$htmlcolor.';">'.$titre_g.'</span>';
	}
	elseif($user[1] <= 3 && $group1 != '') {
		$sqlcolor = mysql_query("SELECT titre, colorhtml FROM " . GROUP_TABLE . " WHERE cid = '".$group1."' ");
			list($titre_g, $htmlcolor) = mysql_fetch_array($sqlcolor);
			$grade = '<span style="color: '.$htmlcolor.';">'.$titre_g.'</span>';
	}
	elseif($user[1] <= 3 && $user[1] > 1 && $group1 == '') {
		$sqlcolor = mysql_query("SELECT titre, colorhtml FROM " . TEAM_RANK_TABLE . " WHERE id = '".$rang1."' ");
			list($titre_g, $htmlcolor) = mysql_fetch_array($sqlcolor);
			$grade = '<span style="color: '.$htmlcolor.';">'.$titre_g.'</span>';
	}
	else $grade = '<span style="font-style: italic;">Aucun</span>';
		
	$date_pile = strtotime("".date("Y-m-d")."");
	
	if($date_hf > $date_pile && $date_hf <= $date_pile+86400)
		$hautfait  = "&#8226; <a title=\"Vous avez des HautFaits débloqués\" href=\"index.php?file=HF\"><blink><b>". _HAUTFAITS ."</b></blink></a>";
	else
		$hautfait  = "&#8226; <a href=\"index.php?file=HF\">". _HAUTFAITS ."</a>";

	if($user[1] >= 3) { 
		$on = mysql_query("SELECT id FROM " . $nuked['prefix'] . "_dispo WHERE id = '".$user[0]."'");
		$dispo_yes = mysql_num_rows($on);
		if($dispo_yes == 0) { $dispo = '<label><a href=\"index.php?file=Dispo\"><blink><span class="glyphicon glyphicon-calendar"></span>'. _MYDISPO .'</blink></a></label>'; }
	else { $dispo = '<label><a href=\"index.php?file=Dispo\"><span class="glyphicon glyphicon-calendar"></span>'. _MYDISPO .'</a></label>'; }
	$myalertes = '<label>Alertes : '.$nb_alert.'</label>';
   }
   
	if($user[1] >= 5)
	{
		if($user[1] >= 8) $sql16 = mysql_query("SELECT id FROM " . $nuked['prefix'] . "_notification WHERE type != 3");
		if($user[1] == 7){$sql16 = mysql_query("SELECT id FROM " . $nuked['prefix'] . "_notification WHERE type = 6 OR (type = 5 AND section LIKE '%|" . $team1 . "|%')");}
		if($user[1] == 6 || $user[1] == 5) {$sql16 = mysql_query("SELECT id FROM " . $nuked['prefix'] . "_notification WHERE type = 6");}
        $nb_noti = mysql_num_rows($sql16);
		if($nb_noti > 0) {$nb_noti = '<font color = orange>'.$nb_noti.'</font>';}
		else {$nb_noti = '<font color = #D5D5D5>'.$nb_noti.'</font>';}
		$info_admin = '<label><a class="link_admin"  href="index.php?file=Admin">Administration ['.$nb_noti.']</a></label>';
	}
	elseif($redacteur == 1)
	{
		$info_admin = '<label><a class="link_admin"  href="index.php?file=Sections&page=admin">R&eacute;daction</a></label>';
	}
	
	if($user[1] > 0 && $user[1] < 8 && $redacteur == 0)
	{
		$info_user1 = '<label><a class="link_admin"  href="index.php?file=Suggest">' . _PROPOSE . '</a></label> ';
	}
	
  $blok['content'] = '
					<div class="left">
						<h1>Mon avatar</h1>
						<img src="'.$avatar.'" height="150"><br><a href="index.php?file=User&amp;nuked_nude=index&amp;op=logout">Déconnexion</a>
					</div>
					<div class="left">
							<h1>Infos compte</h1>
							<label>Grade : '.$grade.'</label>
							<label>MPs non lus : '.$user[5].'</label>
							<label>Messages postés : '.$count.'</label>
							'.$myalertes.'
							<label>News non lues : '.$nbunread.'</label>
							<label>Vidéos postées : '.$count.'</label>
					</div>
					<div class="left right">
							<h1>Gestion compte</h1>				
							<label><a href="index.php?file=User"><span class="glyphicon glyphicon-cog"></span> Configurer mon compte</a></label>
							<label><a href="index.php?file=HF"><span class="glyphicon glyphicon-tower"></span> Mes Haut-Faits</a></label>
							<label><a href="index.php?file=User&op=edit_video"><span class="glyphicon glyphicon-facetime-video"></span> Mes vidéos</a></label>
							'.$dispo.'
							<label><a href="index.php?file=Espace_membre"><span class="glyphicon glyphicon-hdd"></span> Mon espace stockage</a></label>
							'.$info_admin.'
				</div>';
	echo $blok['content'];
}
echo'</div>';
?>