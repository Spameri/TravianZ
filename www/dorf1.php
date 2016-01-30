<?php

include("GameEngine/Village.php");

$building->procBuild($_GET);

?>

<?php include("Templates/menu.tpl"); ?>

		<?php
		include("Templates/movement.tpl");
		// --production--
		include("Templates/troops.tpl");

		?>

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

