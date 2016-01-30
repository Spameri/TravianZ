<?php

include("GameEngine/Village.php");

$building->procBuild($_GET);

?>

<?php include("Templates/menu.tpl"); ?>


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

