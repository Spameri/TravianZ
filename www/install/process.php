<?php

if(file_exists("include/constant.php")) {
	include ("include/database.php");
}
class Process {

	function Process() {
		if(isset($_POST['subconst'])) {

		} else
			if(isset($_POST['substruc'])) {

			} else
				if(isset($_POST['subwdata'])) {

				} else
					if(isset($_POST['subacc'])) {
						$this->createAcc();
						} else {
							header("Location: index.php");
						}
	}

}
;

$process = new Process;

?>
