<?php
if(isset($_GET['d']) && isset($_GET['c'])) {
	if($generator->getMapCheck($_GET['d']) == $_GET['c']) {
		include("Templates/Map/vilview.tpl");
	}
}