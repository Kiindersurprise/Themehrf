<?php

defined("INDEX_CHECK") or die ("<div style=\"text-align: center;\">Acc?s interdit</div>");

function top()
{
global $nuked, $op, $file, $user, $bgcolor4, $bgcolor5, $bgcolor6, $bgcolor7, $bgcolor8, $bgcolor9, $page, $language, $id_section;

echo"<html lang=\"fr\"><head>\n"
	. "<META CHARSET=\"utf-8\" />\n"
	. "<META NAME=\"viewport\" CONTENT=\"width=device-width, initial-scale=1\" />\n"
	. "<title>". $nuked['name'] ." - ". $nuked['slogan'] ."</title>\n"
	. "<META NAME=\"keywords\" CONTENT=\"". $nuked['keyword'] ."\" />\n"
	. "<META NAME=\"description\" CONTENT=\"". $nuked['description'] ."\" />\n"
	. "<link href=\"themes/themehrf_main/css/bootstrap.css\" rel=\"stylesheet\" type=\"text/css\">\n"
	. "<link href=\"themes/themehrf_main/css/style3.css\" rel=\"stylesheet\" type=\"text/css\">\n"
	. "<link rel=\"stylesheet\" href=\"themes/themehrf_main/css/smartnoti.style.css\" type=\"text/css\" media=\"screen\">\n"
  	. "<link rel=\"stylesheet\" href=\"themes/themehrf_main/css/slide2.css\" type=\"text/css\" media=\"screen\" />\n";
?>
	<!--[if lt IE 9]>
     <script src=\"http://html5shiv.googlecode.com/svn/trunk/html5.js\"></script>
        <![endif]-->
  <style type="text/css">
	body {
		background-color: #FEFEFE;
		background: url("themes/<?php echo $nuked['user_theme']; ?>/images/coteg.png") fixed left top 323px no-repeat,
		url("themes/<?php echo $nuked['user_theme']; ?>/images/coted.png") fixed right top 323px no-repeat ;
	}
	
	.navbar-inverse .nav-justified > .li > a:focus {
		background-color: <?php echo $bgcolor4; ?>;
	}
	
	.navbar-inverse {
		background-color: <?php echo $bgcolor6; ?>; /* Couleur de fond navbar d'en bas*/
	}
	
	.navbar-top {
		background-color: <?php echo $bgcolor8; ?>; /* Couleur de fond navbar d'en haut*/
	}
	
	#page {
		background-color: <?php echo $bgcolor9; ?>; /* Couleur de fond page principale*/
	}
	
	.panel-default  {
		border-color: <?php echo $bgcolor5; ?>; /* Couleur des bordures des blocks panel*/
	}
	
	.panel-default >.panel-heading {
		background-color: <?php echo $bgcolor7; ?>; /* Couleur des blocks panel*/
	}
  </style>
</head>
<?php include("modules/Presence/maj.php"); ?>
<?php include("modules/Presence/date_exe.php"); ?>
<?php include("themes/themehrf_main/streamers.php"); ?>
<body>
	<nav class="navbar navbar-inverse navbar-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- Debut Navbar 1-->
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="navbar1">
				<?php include("themes/themehrf_main/blocks/secmenu.php"); ?>
			</div>
			<!-- /.navbar-collapse -->
			<!-- Fin Navbar 1 -->
		</div>
		<!-- /.container-fluid -->
	</nav>
				
	
	<nav  id="nav-fixed" class="navbar navbar-inverse navbar-top container-fluid hidden-sm hidden-xs" role="navigation" style="position:fixed; top: 0px;" data-spy="affix" data-offset-top="141">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- Debut Navbar 1-->
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="navbar1">
				<?php include("themes/themehrf_main/blocks/secmenu.php"); ?>
			</div>
			<!-- /.navbar-collapse -->
			<!-- Fin Navbar 1 -->
		</div>
		<!-- /.container-fluid -->
	</nav>
<!-- Login Form -->	
	<div id="toppanel">
			<?php include("themes/themehrf_main/blocks/login.php"); ?>
		</div> <!-- /login -->	

			<!-- The tab on top -->	
			<div class="tab">
				<ul class="login">
					<li class="left">&nbsp;</li>
					<li><a href="?lang=fr"><img src="themes/EvilGame_black/images/lg/FrenchFlag.png" border="0" height="11"></a>&nbsp;<a href="?lang=en"><img src="themes/EvilGame_black/images/lg/AmerishFlag.png" border="0" title="It doesn't translate the entire website" height="12"></a></li>
					<li>Bienvenue <?php if(!$user) echo "visiteur"; else echo ''.$user[2].'&nbsp;<a href="index.php?file=User&amp;nuked_nude=index&amp;op=logout"><button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-off"></span></button></a>'; ?></li>
					<li class="sep">|</li>
					<?php if(!$user) echo ""; else echo '<li>'.$user[5].' MP</li><li class="sep">|</li>'; ?>
					<li id="toggle">
						<a id="open" class="open" href="#"><?php if(!$user) echo "Connexion"; else echo "Mon compte"; ?></a>
						<a id="close2" style="display: none;" class="close2" href="#">Fermeture</a>			
					</li>
					<li class="right">&nbsp;</li>
				</ul> 
			</div> <!-- / top -->
			
		</div> <!--panel -->	
	
	<header>
		<div class="container">
			<!-- Debut Carousel -->
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Wrapper for slides -->
				<div class="carousel-inner">	
					<?php include("themes/themehrf_main/blocks/servers.php"); ?>
				</div>

				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
				</a>
			</div>
			<!-- Fin Carousel -->
		</div>
	</header>

	<nav class="navbar navbar-inverse navbar-principale" role="navigation">

		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar2">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<!-- Debut Navbar2 -->
			<div class="collapse navbar-collapse" id="navbar2">
				<?php include("themes/themehrf_main/blocks/menu.php"); ?>
			</div>
			<!-- /.navbar-collapse -->
			<!-- Fin Navbar 2 -->
		</div>
		<!-- /.container-fluid -->
	</nav>

	<div class="container">
		<div id="page">

			<div class="row">

			<div class="col-md-3 block-gauche">	

					<div id="blason" class="visible-lg visible-md ">
						<img src="themes/themehrf_main/images/blason.png" class="img-responsive"  alt="...">
					</div>
					<div id="blockmobile">
				<?php get_blok('gauche'); ?>
					</div>
			</div>
				
				<div class="alert alert-danger">
				<?php include("themes/themehrf_main/blocks/quicknews.php"); ?>
				</div>
				<!-- Div Info -->

				<div class="col-md-9" id="blockfixe">

					<div class="row">
						<?php include("themes/themehrf_main/blocks/block3.php"); ?>
						
						<!-- Fin News -->
					<div class="col-md-12">
					<div class="well">
							<!-- News -->	

<?php

$file = mysql_real_escape_string(addslashes(htmlentities($_GET['file'])));
if(($file != '')) $type_affichage = '2';
	
	//Affichage pendant la navigation 
	 if($type_affichage === '2') {
		 //Navigation en plein écran sans blocks
		 if(($activeBlock === '0') or ($file === 'Forum')) 		
		  include_once('themes/themehrf_main/blocks/naviguation_full.php');
		  
		  //Navigation avec les blocks à gauche
		 else
		  include_once('themes/themehrf_main/blocks/naviguation_nk.php');
		 
	}
	 else
	 //Affichage page acceuil
	  include_once('themes/themehrf_main/blocks/naviguation_acceuil.php');

}
function block_gauche($block)
{
?>						
		<!-- Debut Block Gauche -->
			<div class="panel panel-default">
				<div class="panel-heading"><span style="color: #F9BD07;">~</span><?php echo $block[titre]; ?><span style="color:#F9BD07;">~</span>
				</div>
				<div class="panel-body" style="text-align: center;">
				<?php echo $block[content]; ?>
				</div>
			</div>
		<!-- Fin Block Gauche -->
<?php
}
function block_droite($block)
{
} 
function footer()
{
    global $nuked, $theme;
	
	echo "</div></div></div></div></div></div></div>";
	//include_once('themes/themehrf_main/blocks/naviguation_nk_end.php');
	
	include("themes/themehrf_main/blocks/footer.php");
}
function opentable() {
$file = mysql_real_escape_string(addslashes(htmlentities($_GET['file'])));
 if(($file == '')) 
	echo "<div id=\"opentableOff\">";
else
	echo "<div class=\"well\">";
} 

function closetable() 
{
echo'</div>';
}
/* NEWS */
$file = mysql_real_escape_string(addslashes(htmlentities($_GET['file'])));
 if(($file != '')) {
function news($data)
{ 
		$comment = $data['nb_comment'];
		$suite = '<div style="text-align:right;"><a title="'._READMORE.'" href="index.php?file=News&amp;op=suite&amp;news_id='.$row['id'].'">Suite...</a></div>';
		echo '<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						 '.$data["titre"].'
					</h4>
				</div>
				<span style="text-align: left; font-size: 10px; font-style: italic;">Posté par '.$data["auteur"].' le '.nkDate($data["date"]).'</span>
				<span style="float: right; text-align: right; font-size: 10px; font-style: italic;"><a title="'._SEECOMS.'" href="index.php?file=News&amp;op=index_comment&amp;news_id='.$data["id"].'">Commentaires ('.$comment.')</a>&nbsp;</span>
					<div class="panel-body">
					<br>'.$data["texte"].'
					</div>
				'.$suite.'
			</div>';
	}
}
else { function news() {} }
?>
<div class="visible-lg visible-md">
	<div id="fbfb" style="position:fixed;top:75px;margin-left:-292px;z-index:250;">
	<div id="divfb" style="background-color: white;float:left"><iframe title="Facebook" src="https://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com/pages/CommunautÃ©-HRF/692236394173213&amp;width=292&amp;height=400&amp;colorscheme=light&amp;show_faces=true&amp;stream=true&amp;header=true" style="border:none;width:292px; height:400px;background-color:;">iframes not supported by your browser.</iframe></div>
	<img id="fb" src="http://image.noelshack.com/fichiers/2014/22/1401581917-bouton-fb.png" alt="">
	</div>
	<div id="stst" style="position:fixed;top:200px;margin-left:-132px;z-index:250;">
	<div id="divst" style="background-color: white;float:left">
	<div class="panel panel-default" style="margin-bottom: inherit;">
						<div class="panel-heading">Groupe Steam</span>
						</div>
						<div class="panel-body" style="text-align: center;">
							<?php include_once('themes/themehrf_main/blocks/sg_steam.php'); ?>
						</div>
	</div>
	</div>
	
	<img id="st" src="themes/themehrf_main/images/steam.png" alt="">
	</div>
	<div id="tsts" style="position:fixed;top:130px;right:-330px;z-index:999;">
	<div id="ts3viewer" style="background-color: white;width:330px;height:500px;overflow:scroll;">
		<button type="button" class="btn btn-info" style="margin-left: 25%;">
		  <a href="ts3server://ts3.communaute-hrf.fr/?port=12467" style="color:white;"><span class="glyphicon glyphicon-globe"></span> Connexion direct TS</a>
		</button>
		<div id="ts3viewer_962546"> </div>
	</div>
	<img id="ts" style="position:fixed;top:130px;right:0px;float:left" src="http://image.noelshack.com/fichiers/2014/22/1401580622-bouton-ts2.png" alt="">
	</div>
	

<script type="text/javascript" src="http://static.tsviewer.com/short_expire/js/ts3viewer_loader.js"></script>
<script src="themes/themehrf_main/js/tsviewer.js" type="text/javascript"></script><!-- Fin Ts Viewer -->

</div><!-- Début notification + Bouton fixed -->
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="themes/themehrf_main/js/jquery.zlab.smartnoti-0.1-min.js" type="text/javascript"></script>
<script src="themes/themehrf_main/js/boutons.js" type="text/javascript"></script><!-- Fin notification + Bouton fixed -->
	<!--Script src à la fin pour améliorer le chargement de la page -->
	<script src="themes/themehrf_main/js/jquery.js" type="text/javascript"></script>
	<script src="themes/themehrf_main/js/bootstrap.js" type="text/javascript"></script>
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script src="themes/themehrf_main/js/jquery.zlab.smartnoti-0.1-min.js" type="text/javascript"></script>
	<script src="themes/themehrf_main/js/bootstrap.hover.dropdown.min.js"></script>
	<script src="themes/themehrf_main/js/slide.js" type="text/javascript"></script>
	<script src="media/js/blink.js" type="text/javascript"></script>
</body>
</html>
<!-- Partie Nuked Debut -->