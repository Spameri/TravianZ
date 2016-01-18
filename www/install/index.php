				<?php
					switch($_GET['s']){
						case 1:
						include("templates/config.tpl");
						break;
						case 2:
						include("templates/dataform.tpl");
						break;
						case 3:
						include("templates/field.tpl");
						break;
						case 4:
						include("templates/multihunter.tpl");
						break;
						case 5:
						include("templates/oasis.tpl");
						break;
						case 6:
						include("templates/end.tpl");
						break;
					}
