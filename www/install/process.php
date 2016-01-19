<?php

if(file_exists("include/constant.php")) {
	include ("include/database.php");
}
class Process {

	function Process() {
		if(isset($_POST['subconst'])) {

		} else
			if(isset($_POST['substruc'])) {
				$this->createStruc();
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


	function createStruc() {
		global $database;
		$str = file_get_contents("data/sql.sql");
		$str = preg_replace("'%PREFIX%'", TB_PREFIX, $str);
		if(DB_TYPE) {
			$result = $database->connection->multi_query($str);
		} else {
			$result = $database->mysql_exec_batch($str);
		}
		if($result) {
			header("Location: index.php?s=3");
		} else {
			header("Location: index.php?s=2&c=1");
		}
	}

	function createWdata() {
		header("Location: include/wdata.php");
	}

}
;

$process = new Process;

?>
