<?php

include("GameEngine/Village.php");

if(isset($_GET['o'])) {
	$o = preg_replace("/[^a-zA-Z0-9_-]/","",$_GET['o']);
	$oid = preg_replace("/[^a-zA-Z0-9_-]/","",$_GET['z']);
	$too = $database->getOasisField($oid,"conqured");
	if($too == 0){$disabledr ="disabled=disabled"; $disabled ="disabled=disabled";}else{
	$disabledr ="";
	if($session->sit == 0){
	$disabled ="";
	}else{
	$disabled ="disabled=disabled";
	}
	}
	$checked  ="checked=checked";
}else{
	if($session->sit == 0){
	$disabled ="";
	}else{
	$disabled ="disabled=disabled";
	}
}
		if(!empty($id)) {
			include ("Templates/a2b/newdorf.tpl");
		} elseif(isset($w)) {
			$enforce = $database->getEnforceArray($w, 0);
			if($enforce['vref'] == $village->wid) {
				$to = $database->getVillage($enforce['from']);
				$ckey = $w;
				include ("Templates/a2b/sendback_" . $database->getUserField($to['owner'], 'tribe', 0) . ".tpl");
			} else {
				include ("Templates/a2b/units_" . $session->tribe . ".tpl");
				include ("Templates/a2b/search.tpl");
			}
		} elseif(isset($r)) {
			$enforce = $database->getEnforceArray($r, 0);
			$enforceoasis=$database->getOasisEnforceArray($r, 0);
			if($enforce['from'] == $village->wid || $enforceoasis['conqured']==$village->wid) {
				$to = $database->getVillage($enforce['from']);
				$ckey = $r;
				include ("Templates/a2b/sendback_" . $database->getUserField($to['owner'], 'tribe', 0) . ".tpl");
			} else {
				include ("Templates/a2b/units_" . $session->tribe . ".tpl");
				include ("Templates/a2b/search.tpl");
			}
		} elseif(isset($delprisoners)){
			$prisoner = $database->getPrisonersByID($delprisoners);
			if($prisoner['wref'] == $village->wid){
			$p_owner = $database->getVillageField($prisoner['from'],"owner");
            $p_eigen = $database->getCoor($prisoner['wref']);
            $p_from = array('x'=>$p_eigen['x'], 'y'=>$p_eigen['y']);
            $p_ander = $database->getCoor($prisoner['from']);
            $p_to = array('x'=>$p_ander['x'], 'y'=>$p_ander['y']);
			$p_tribe = $database->getUserField($p_owner,"tribe",0);
            
            $p_speeds = array();
    
            //find slowest unit.            
            for($i=1;$i<=10;$i++){
                if ($prisoner['t'.$i]){
                    if($prisoner['t'.$i] != '' && $prisoner['t'.$i] > 0){
                        if($p_unitarray) { reset($p_unitarray); }
                        $p_unitarray = $GLOBALS["u".(($p_tribe-1)*10+$i)];
                        $p_speeds[] = $p_unitarray['speed'];
                    }
                }
            }
			
			if ($prisoner['t11']>0){
				$p_qh = "SELECT * FROM ".TB_PREFIX."hero WHERE uid = ".$p_owner."";
				$p_resulth = mysql_query($p_qh);
				$p_hero_f=mysql_fetch_array($p_resulth);
				$p_hero_unit=$p_hero_f['unit'];
				$p_speeds[] = $GLOBALS['u'.$p_hero_unit]['speed'];
			}
            
            $p_artefact = count($database->getOwnUniqueArtefactInfo2($p_owner,2,3,0));
			$p_artefact1 = count($database->getOwnUniqueArtefactInfo2($prisoner['from'],2,1,1));
			$p_artefact2 = count($database->getOwnUniqueArtefactInfo2($p_owner,2,2,0));
			if($p_artefact > 0){
			$p_fastertroops = 3;
			}else if($p_artefact1 > 0){
			$p_fastertroops = 2;
			}else if($p_artefact2 > 0){
			$p_fastertroops = 1.5;
			}else{
			$p_fastertroops = 1;
			}
			$p_time = round($automation->procDistanceTime($p_to,$p_from,min($p_speeds),1)/$p_fastertroops);
			$p_reference = $database->addAttack($prisoner['from'],$prisoner['t1'],$prisoner['t2'],$prisoner['t3'],$prisoner['t4'],$prisoner['t5'],$prisoner['t6'],$prisoner['t7'],$prisoner['t8'],$prisoner['t9'],$prisoner['t10'],$prisoner['t11'],3,0,0,0,0,0,0,0,0,0,0,0);
			$database->addMovement(4,$prisoner['wref'],$prisoner['from'],$p_reference,time(),($p_time+time()));
			$troops = $prisoner['t1']+$prisoner['t2']+$prisoner['t3']+$prisoner['t4']+$prisoner['t5']+$prisoner['t6']+$prisoner['t7']+$prisoner['t8']+$prisoner['t9']+$prisoner['t10']+$prisoner['t11'];
			$database->modifyUnit($prisoner['wref'],array("99o"),array($troops),array(0));
			$database->deletePrisoners($prisoner['id']);
				}else if($prisoner['from'] == $village->wid){
			$troops = $prisoner['t1']+$prisoner['t2']+$prisoner['t3']+$prisoner['t4']+$prisoner['t5']+$prisoner['t6']+$prisoner['t7']+$prisoner['t8']+$prisoner['t9']+$prisoner['t10']+$prisoner['t11'];
			if($prisoner['t11'] > 0){
			$p_owner = $database->getVillageField($prisoner['from'],"owner");
			mysql_query("UPDATE ".TB_PREFIX."hero SET `dead` = '1', `health` = '0' WHERE `uid` = '".$p_owner."'");
			}
			$database->modifyUnit($prisoner['wref'],array("99o"),array($troops),array(0));
			$database->deletePrisoners($prisoner['id']);
				}
				header("Location: build.php?id=39");
	} else {
			if(isset($process['0'])) {
				$coor = $database->getCoor($process['0']);
				include ("Templates/a2b/attack.tpl");
			} else {
				include ("Templates/a2b/units_" . $session->tribe . ".tpl");
				include ("Templates/a2b/search.tpl");
			}
		}
