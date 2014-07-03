<?php
	if ($user[1] >= 3) {
	
		$sql1797 = mysql_query("SELECT team, team2, team3, team4 FROM " . USER_TABLE . " WHERE id = '".$user[0]."' ");
			list($team11, $team22, $team33, $team44) = mysql_fetch_array($sql1797);

		$sql298 = mysql_query("SELECT ".$nuked['prefix']."_news.id, ".$nuked['prefix']."_news.cat, ".$nuked['prefix']."_news.imp, ".$nuked['prefix']."_news.titre, ".$nuked['prefix']."_news.auteur, ".$nuked['prefix']."_news.auteur_id FROM ".$nuked['prefix']."_news INNER JOIN ".$nuked['prefix']."_news_cat ON ".$nuked['prefix']."_news.cat = ".$nuked['prefix']."_news_cat.nid WHERE ".$nuked['prefix']."_news.whoread NOT LIKE '%".$user[0]."%' AND ".$nuked['prefix']."_news.imp = '1' AND ((".$nuked['prefix']."_news_cat.sec = '".$team11."' OR ".$nuked['prefix']."_news_cat.sec = '".$team22."' OR ".$nuked['prefix']."_news_cat.sec = '".$team33."' OR ".$nuked['prefix']."_news_cat.sec = '".$team44."') OR ".$nuked['prefix']."_news.cat = '2') ORDER by date DESC");
		$nbunread=mysql_num_rows($sql298);
	}
	else $nbunread = 0;
	
	$requete = mysql_query("SELECT date FROM ".$nuked['prefix']."_news ORDER BY date DESC LIMIT 0,1");
		list($datenews) = mysql_fetch_array($requete);

	$compare = time() - $datenews;
		
		if ($compare <= 172800)
			{ $news = '<blink><span style="color: rgb(51, 255, 51);">News</span></blink>'; }
		elseif ($nbunread > 0)
			{ $news = '<span style="color: rgb(223, 1, 1);">News('.$nbunread.')</span>'; }
		else
			{ $news = 'News';}
				
	$day = date("d");
	$month= date("m");
	$year = date("Y");
		
	$sql13 = mysql_query("SELECT warid FROM " . WARS_TABLE . " WHERE date_jour = '" . $day . "' AND date_an = '" . $year . "' AND date_mois = '" . $month . "' AND (team = '".$team11."' OR team = '".$team22."' OR team = '".$team33."' OR team = '".$team44."')");
        $result = mysql_num_rows($sql13);
		
		if ($result != 0)
		{ $event = 1; }
		else
		{ $event = 0; }
		
	$sql133 = mysql_query("SELECT trid FROM " . TRAINING_TABLE . " WHERE date_jour = '" . $day . "' AND date_an = '" . $year . "' AND date_mois = '" . $month . "' AND (team = '".$team11."' OR team = '".$team22."' OR team = '".$team33."' OR team = '".$team44."')");
        $result0 = mysql_num_rows($sql133);
		
		if ($result0 != 0)
		{ $event0 = 1; }
		else
		{ $event0 = 0; }
		
	$sql14 = mysql_query("SELECT id FROM " . CALENDAR_TABLE . " WHERE date_jour = '" . $day . "' AND date_an = '" . $year . "' AND date_mois = '" . $month . "' AND (only = '".$team11."' OR only = '".$team22."' OR only = '".$team33."' OR only = '".$team44."')");
        $result1 = mysql_num_rows($sql14);
			
		if ($result1 != 0)
		{ $event1 = 1; }
		else
		{ $event1 = 0; }	

	$sql15 = mysql_query("SELECT age FROM " . USER_DETAIL_TABLE . " INNER JOIN " . USER_TABLE . " ON " . USER_DETAIL_TABLE . ".user_id = " . USER_TABLE . ".id WHERE " . USER_TABLE . ".niveau >= 2");
        while (list($age) = mysql_fetch_array($sql15))
		{
			$age2 = explode("/", $age);
			$jour = date("j");
			$mois = date("n");

			if (($age2[0] == $jour) && ($age2[1] == $mois) && $user[1] >= 2) 
			{	$event2 = 1;
				break;
			}
		}
				
		if($event == 1 || $event0 == 1 || $event1 == 1 || $event2 == 1)
			$calendar  = "<a href=\"index.php?file=Calendar\"><blink>". _NAVCALENDAR ."</blink></a>";
		else
			$calendar  = "<a href=\"index.php?file=Calendar\">". _NAVCALENDAR ."</a>";
?>

				<ul class="nav nav-justified ">
					<li><a href="index.php" style="border-left: 1px solid white;"><?php echo "". _HOME ."" ?></a>
					</li>
					<li><a href="index.php?file=Forum">Forum</a>
					</li>
					<li class="dropdown"><a  class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><?php echo "". _COMMUNITY ."" ?></a>
						
						
						<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
							  <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?file=Forum&page=viewtopic&forum_id=39&thread_id=11"><?php echo "". _HIERARCHY ."" ?></a></li>
							  <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?file=Team&op=view_staff">Staff</a></li>
							  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Sections</a></li>
							  <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?file=HF&op=pantheon"><?php echo "". _PANTHEON ."" ?></a></li>
							  <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?file=Sections&op=article&artid=6">Charte</a></li>
							  <li role="presentation" class="divider"></li>
							  <li role="presentation" class="disabled"><a role="menuitem" tabindex="-1" href="#">Surprise</a></li>
							  <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?file=News"><?php echo $news; ?></a></li>
							  <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?file=Wars"><?php echo"". _MATCHES ."" ?></a></li>
							  <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?file=Wars&op=training"><?php echo"". _TRAININGS ."" ?></a></li>
							  <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?file=Defy"><?php echo"". _DEFYUS ."" ?></a></li>			  
						</ul>
						
					</li>
					<li><?php echo $calendar; ?>
					</li>
					<li class="dropdown"><a  class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><?php echo"". _RECRUITMENT ."" ?>&middot;<span style="color: rgb(0, 255, 0);">ON</span></a>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
							  <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?file=Forum&page=viewtopic&forum_id=11&thread_id=680">PC</li></a>
							  <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?file=Forum&page=viewtopic&forum_id=36&thread_id=1408">Consoles/Appli</a></li>		  
						</ul>
					</li>
					<li class="dropdown"><a  class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><?php echo"". _MEDIAS ."" ?></a>
						
						
						<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu3">
							  <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?file=Video"><?php echo"". _VIDEOS ."" ?></a></li>
							  <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?file=Video&op=streamer">Streamers</a></li>
							  <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?file=Video&op=youtuber">Youtubers</a></li>
							  <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $multitwitch ?>">Multitwitch</a></li>
						</ul>
						
					</li>
					<li><a href="http://99782537.linkbucks.com/"><?php echo"". _DONATE ."" ?></a>
					</li>
				</ul>