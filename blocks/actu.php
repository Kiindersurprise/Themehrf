<?php 
if($id_section == '') $id_section = 0;

$sql_n = mysql_query("SELECT ".NEWS_TABLE.".id, ".NEWS_TABLE.".auteur, ".NEWS_TABLE.".auteur_id, ".NEWS_TABLE.".date, ".NEWS_TABLE.".titre, ".NEWS_TABLE.".texte, ".NEWS_TABLE.".cat, ".NEWS_CAT_TABLE.".image FROM ".NEWS_TABLE." INNER JOIN ".NEWS_CAT_TABLE." ON ".NEWS_TABLE.".cat = ".NEWS_CAT_TABLE.".nid WHERE ".NEWS_CAT_TABLE.".sec = '".$id_section."' ORDER BY ".NEWS_TABLE.".date desc LIMIT 0,3");
$lettre = 'One';

	echo'<div class="tab-pane fade in active" id="news">
			<div class="panel-group" id="accordion">'; // Début Collapse News

while ($row = mysql_fetch_assoc($sql_n)) {

$sql_c = mysql_query("SELECT im_id FROM ".COMMENT_TABLE." WHERE im_id = '{$row['id']}' AND module = 'news'");
$nb_comment = mysql_num_rows($sql_c);

if(!empty($row['suite'])) $suite = '<div style="text-align:right;"><a title="'._READMORE.'" href="index.php?file=News&amp;op=suite&amp;news_id='.$row['id'].'">Suite...</a></div>';
if($lettre == 'One') $in = ' in'; else $in ='';

		echo '<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse'.$lettre.'">
						 '.$row["titre"].'
						</a>
					</h4>
				</div>
				<div id="collapse'.$lettre.'" class="panel-collapse collapse'.$in.'">
				<span style="text-align: left; font-size: 10px; font-style: italic;">Posté par '.$row["auteur"].' le '.nkDate($row["date"]).'</span>
				<span style="float: right; text-align: right; font-size: 10px; font-style: italic;"><a title="'._SEECOMS.'" href="index.php?file=News&amp;op=index_comment&amp;news_id='.$row['id'].'">Commentaires ('.$nb_comment.')</a>&nbsp;</span>
					<div class="panel-body">
					<br>'.$row["texte"].'
					</div>
				'.$suite.'
				</div>
			</div>';
if($lettre == 'One') $lettre = 'Two';
elseif ($lettre == 'Two') $lettre = 'Three';
}
	echo'</div>
			</div>';
?>