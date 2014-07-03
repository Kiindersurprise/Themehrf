<table width="100%" id="lastTopic" border="0" cellspacing="0" cellpadding="0">
<?php 

$sql_forum = mysql_query("SELECT team, team2, team3, team4, rang, rang2, rang3, rang4, group1, group2, group3, selectif, selectif_choix FROM " . USER_TABLE . " WHERE id = '" . $user[0] . "'");
 list($team, $team2, $team3, $team4, $rang, $rang2, $rang3, $rang4, $grp, $grp2, $grp3, $selectif, $selectif_choix) = mysql_fetch_row($sql_forum);
if($grp == '') $grp = "-1";
if($grp2 == '') $grp2 = "-1";
if($grp3 == '') $grp3 = "-1";
if($team == '') $team = "-1";
if($team2 == '') $team2 = "-1";
if($team3 == '') $team3 = "-1";
if($team4 == '') $team4 = "-1";
if($rang == '') $rang = "-1";
if($rang2 == '') $rang2 = "-1";
if($rang3 == '') $rang3 = "-1";
if($rang4 == '') $rang4 = "-1";

if($user[1] >= 4) $staff = " OR c.cat = '1'"; else $staff = "";


                                                $i = 1;
                                                $forum_thread[] = array();
												
												if ($selectif == 1)
												{
												$sql = mysql_query("SELECT t.thread_id, t.auteur, t.forum_id, t.date, y.titre, y.last_post, y.annonce FROM ". FORUM_MESSAGES_TABLE ." AS t INNER JOIN ".FORUM_TABLE." AS c ON c.id = t.forum_id INNER JOIN ". FORUM_THREADS_TABLE ." AS y ON t.thread_id = y.id WHERE ('" . $user[1] . "' >= c.niveau OR c.groups LIKE '%".$grp."%' OR c.groups LIKE '%".$grp2."%' OR c.groups LIKE '%".$grp3."%') AND (c.groups LIKE '%".$grp."%' OR c.groups LIKE '%".$grp2."%' OR c.groups LIKE '%".$grp3."%' OR c.sections LIKE '%".$team."%' OR c.sections LIKE '%".$team2."%' OR c.sections LIKE '%".$team3."%' OR c.sections LIKE '%".$team4."%' OR c.rangs LIKE '%".$rang."%' OR c.rangs LIKE '%".$rang2."%' OR c.rangs LIKE '%".$rang3."%' OR c.rangs LIKE '%".$rang4."%' OR y.auteur_id = '" . $user[0] . "' OR (c.cat = '7' AND y.date >= t.date) OR t.forum_id = '18' OR t.forum_id = '1') ORDER BY t.date DESC");
												}
												elseif ($selectif == 2)
												{
												$sql = mysql_query("SELECT t.thread_id, t.auteur, t.forum_id, t.date, y.titre, y.last_post, y.annonce FROM ". FORUM_MESSAGES_TABLE ." AS t INNER JOIN ".FORUM_TABLE." AS c ON c.id = t.forum_id INNER JOIN ". FORUM_THREADS_TABLE ." AS y ON t.thread_id = y.id WHERE ('" . $user[1] . "' >= c.niveau OR c.groups LIKE '%".$grp."%' OR c.groups LIKE '%".$grp2."%' OR c.groups LIKE '%".$grp3."%') AND ('%".$selectif_choix."%' LIKE CONCAT('%|', c.id, '|%') OR (c.cat = '7' AND y.date >= t.date) ".$staff.") ORDER BY t.date DESC");
												}
												else
												{
                                                $sql = mysql_query("SELECT t.thread_id, t.auteur, t.forum_id, t.date, y.titre, y.last_post, y.annonce FROM ". FORUM_MESSAGES_TABLE ." AS t INNER JOIN ".FORUM_TABLE." AS c ON c.id = t.forum_id INNER JOIN ". FORUM_THREADS_TABLE ." AS y ON t.thread_id = y.id WHERE '" . $user[1] . "' >= c.niveau OR c.groups LIKE '%".$grp."%' OR c.groups LIKE '%".$grp2."%' OR c.groups LIKE '%".$grp3."%' ORDER BY t.date DESC");
												}
												
                                                while($res = mysql_fetch_assoc($sql)){
                                                    if($i <= 5){ // Si le nombre de poste n'a pas atteind 5
                                                        if(in_array($res['thread_id'], $forum_thread) === false){ // Si on a jamais parlé du forum
                                                            $gras = ((time() - $res['date']) <= (3600*24) ? ' style="font-weight:bold;"' : ''); // On mets en gras si c'est récent (moins d'un jour)
                                                            $count = mysql_num_rows(mysql_query("SELECT * FROM ". FORUM_MESSAGES_TABLE." WHERE forum_id = '".$res['forum_id']."' "));
                                                            $page ='&amp;p='. ceil($count/$nuked['mess_forum_page']);

			   


			  $day = date('d', $res['date']);
			  $month = date('M', $res['date']);

			  $sql4 = mysql_query("SELECT file FROM " . FORUM_MESSAGES_TABLE . " WHERE thread_id = '" . $res['thread_id'] . "'");
              $nb_rep = mysql_num_rows($sql4);

            $titre = printSecuTags($res['titre']);
			$titre = nk_CSS($titre);
			$titre = strlen($titre) <= 60 ? $titre : substr($titre, 0, 60) . '...';
			  ?>
<tr>
<td class="date">
		<span class="month"><?php echo $month ?></span><br/>
		<span class="jour"><?php echo $day ?></span>
</td>
	<td class="message"><?php if($res['annonce'] == 1) echo"<img src=\"modules/Forum/Skin/" . $nuked['forum_skin'] . "/images/announce.png\" alt=\"\" title=\"" . _ANNOUNCE . "\" />&nbsp;" ?><a href="index.php?file=Forum&amp;page=viewtopic&amp;forum_id=<?php echo $res['forum_id']; ?>&amp;thread_id=<?php echo $res['thread_id']; ?>" class="link_news" title="<?php echo ""._LASTMSGBY.$res['auteur'].""; ?>"><?php echo $titre; ?></a></td>
	<td class="comment"><img src="themes/EvilGame_black/images/comment.png" alt="" style="vertical-align:middle" /> <?php echo $nb_rep; ?></td>
</tr>
			  <?php 
                                                            $forum_thread[] = $res['thread_id']; // On rajoute l'id dans l'array, pour indiquer qu'on l'a déjà mise
                                                            $i += 1; // On rajoute +1 dans le nombre de post
                                                        }
                                                    }
                                                }
			  ?>
				</table>
				
				