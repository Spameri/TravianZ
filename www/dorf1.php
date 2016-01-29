<?php

include("GameEngine/Village.php");

$building->procBuild($_GET);

?>

<?php include("Templates/menu.tpl"); ?>
<div id="content" class="village1">
	<h1><?php echo $village->vname; if($village->loyalty!='100'){ if($village->loyalty>'33'){ $color="gr"; }else{ $color="re"; } ?><div id="loyality" class="<?php echo $color; ?>"><?php echo LOYALTY; ?> <?php echo floor($village->loyalty); ?>%</div><?php } ?></h1>
	<div id="cap" align="left"><?php if($village->capital!='0') { echo "<font color=gray>(Capital)</font>"; }else{ halt; } ?></div>
	<?php include("Templates/field.tpl");
	$timer = 1;
	?>
	<div id="map_details">
		</br></br>
		<?php
		include("Templates/movement.tpl");
		include("Templates/production.tpl");
		include("Templates/troops.tpl");

		if($building->NewBuilding) {
			include("Templates/Building.tpl");
		}
		?>
	</div>
	</br></br></br></br>
	<div id="side_info">
		<?php
		include("Templates/multivillage.tpl");
		include("Templates/quest.tpl");
		include("Templates/news.tpl");
		include("Templates/links.tpl");
		?>
	</div>
	<div class="clear"></div>
</div>

