<?php

#################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 ##
## --------------------------------------------------------------------------- ##
##  Project:       TravianZ                                                    ##
##  Version:       22.06.2015                    			       ## 
##  Filename       Account.php                                                 ##
##  Developed by:  Mr.php , Advocaite , brainiacX , yi12345 , Shadow , ronix   ## 
##  Fixed by:      Shadow - STARVATION , HERO FIXED COMPL.  		       ##
##  Fixed by:      InCube - double troops				       ##
##  License:       TravianZ Project                                            ##
##  Copyright:     TravianZ (c) 2010-2015. All rights reserved.                ##
##  URLs:          http://travian.shadowss.ro                		       ##
##  Source code:   https://github.com/Shadowss/TravianZ		               ## 
##                                                                             ##
#################################################################################

include("Session.php");

class Account {

	function Account() {
		global $session;
		if(isset($_POST['ft'])) {
			switch($_POST['ft']) {
				case "a1":

				break;
				case "a2":
				$this->Activate();
				break;
				case "a3":
				$this->Unreg();
				break;
				case "a4":

				break;
			}
		} if(isset($_GET['code'])) {
		$_POST['id'] = $_GET['code']; $this->Activate();
		}
		else {
			if($session->logged_in && in_array("logout.php",explode("/",$_SERVER['PHP_SELF']))) {
				$this->Logout();
			}
		}
	}

	private function Activate() {
		if(START_DATE < date('m/d/Y') or START_DATE == date('m/d/Y') && START_TIME <= date('H:i'))
	   {
			global $database;
			$q = "SELECT * FROM ".TB_PREFIX."activate where act = '".$_POST['id']."'";
			$result = mysql_query($q, $database->connection);
			$dbarray = mysql_fetch_array($result);
			if($dbarray['act'] == $_POST['id']) {
				$uid = $database->register($dbarray['username'],$dbarray['password'],$dbarray['email'],$dbarray['tribe'],"");
				if($uid) {
				$database->unreg($dbarray['username']);
				$this->generateBase($dbarray['kid'],$uid,$dbarray['username']);
				header("Location: activate.php?e=2");
				}
			}
			else
			{
				header("Location: activate.php?e=3");
			}
	   }
	   else
	   {
			header("Location: activate.php");
	   }

	}

	private function Unreg() {
		global $database;
		$q = "SELECT * FROM ".TB_PREFIX."activate where id = '".$_POST['id']."'";
		$result = mysql_query($q, $database->connection);
		$dbarray = mysql_fetch_array($result);
		if(md5($_POST['pw']) == $dbarray['password']) {
			$database->unreg($dbarray['username']);
			header("Location: anmelden.php");
		}
		else {
			header("Location: activate.php?e=3");
		}
	}

	private function Logout() {
		global $session,$database;
		unset($_SESSION['wid']);
		$database->activeModify(addslashes($session->username),1);
		$database->UpdateOnline("logout") or die(mysql_error());
		$session->Logout();
	}

	private function validEmail($email) {
	  $regexp="/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i";
	  if ( !preg_match($regexp, $email) ) {
		   return false;
	  }
	  return true;
	}

	function generateBase($kid,$uid,$username) {
		global $database,$message;

		$message->sendWelcome($uid,$username);
	}

};
$account = new Account;
?>
