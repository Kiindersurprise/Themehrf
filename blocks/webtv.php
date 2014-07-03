<script>
$(document).ready(function(){
    $("#preview").load('themes/themehrf_main/blocks/randomstream.php', {'lesliens': '<?php echo $lesliens; ?>'});
});
</script>

<div id="preview">
<img src="images/loading.gif" alt=\"Loading\" /><br>En cours de recherche d'un stream live ~H.R.F~<br>(Si le chargement dure trop longtemps rafra&icirc;chissez la page.<br>Temps max approximatif : <?php echo ($count_s*2) + 4; ?>s)
</div>
