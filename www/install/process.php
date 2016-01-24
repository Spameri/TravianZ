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
					$this->createWdata();
				} else
					if(isset($_POST['subacc'])) {
						$this->createAcc();
						} else {
							header("Location: index.php");
						}
	}


	function createWdata() {
		header("Location: include/wdata.php");
	}

}
;

$process = new Process;

?>
