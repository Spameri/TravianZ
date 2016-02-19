
<?php 
$basearray = $database->getMInfo($_GET['d']);
$uinfo = $database->getVillage($basearray['id']);
$oasis1 = mysql_query('SELECT * FROM `' . TB_PREFIX . 'odata` WHERE `wref` = ' . mysql_real_escape_string($_GET['d']));
$oasis = mysql_fetch_assoc($oasis1);
$access=$session->access;
?>
	
<table cellpadding="1" cellspacing="1" id="troop_info" class="tableNone rep">
		<thead><tr>
			<th><?php echo REPORT;?>:</th>
		</tr></thead>
		<tbody>
		<?php
if($session->uid == $database->getVillage($_GET['d'])){
	$limit = "ntype=0 and ntype=4 and ntype=5 and ntype=6 and ntype=7";
}else{
	$limit = "ntype!=8 and ntype!=9 and ntype!=10 and ntype!=11 and ntype!=12 and ntype!=13 and ntype!=14 AND ntype!=15 AND ntype!=16 AND ntype!=17";
    }
$toWref = $_GET['d'];
if($session->alliance!=0){
$result = mysql_query("SELECT * FROM ".TB_PREFIX."ndata WHERE $limit AND ally = ".$session->alliance." AND toWref = ".$toWref." ORDER BY time DESC Limit 5");
$query = mysql_num_rows($result);
if($query != 0){
while($row = mysql_fetch_array($result)){
	$dataarray = explode(",",$row['data']);
	$type = $row['ntype'];
	$topic=$row['topic'];
	echo "<tr><td>";
if($type==18 or $type==19 or $type==20 or $type==21){
    echo "<img src=\"gpack/travian_default/img/scouts/$type.gif\" alt=\"".$topic."\" title=\"".$topic."\" />";
	}else{
    echo "<img src=\"img/x.gif\" class=\"iReport iReport".$row['ntype']."\" title=\"".$topic."\"> ";
	}
    $date = $generator->procMtime($row['time']);
    echo "<a href=\"berichte.php?id=".$row['id']."&vill=".$row['id']."\">".$date[0]." ".date('H:i',$row['time'])."</a> ";
    echo "</td></tr>";
}
}else{ ?>
							<tr>
					<td><?php echo THERENOINFO;?></td>
				</tr>

<?php }
}else{
$result = mysql_query("SELECT * FROM ".TB_PREFIX."ndata WHERE uid = ".$session->uid." AND toWref = ".$toWref." ORDER BY time DESC Limit 5");
$query = mysql_num_rows($result);
if($query != 0){
while($row = mysql_fetch_array($result)){
	$dataarray = explode(",",$row['data']);
	$type = $row['ntype'];
	$topic=$row['topic'];
	echo "<tr><td>";
if($type==18 or $type==19 or $type==20 or $type==21){
    echo "<img src=\"gpack/travian_default/img/scouts/$type.gif\" alt=\"".$topic."\" title=\"".$topic."\" />";
	}else{
    echo "<img src=\"img/x.gif\" class=\"iReport iReport".$row['ntype']."\" title=\"".$topic."\"> ";
	}
    $date = $generator->procMtime($row['time']);
    echo "<a href=\"berichte.php?id=".$row['id']."&vill=".$row['id']."\">".$date[0]." ".date('H:i',$row['time'])."</a> ";
    echo "</td></tr>";
}
}else{ ?>
							<tr>
					<td><?php echo THERENOINFO;?></td>
				</tr>
<?php }} ?>
</tbody>
</table>
<?php
}else{
?>
    <table cellpadding="1" cellspacing="1" id="village_info" class="tableNone">
        <?php
        $uinfo = $database->getUserArray($oasis['owner'],1); ?>
		<tbody><tr>
			<th>Tribe</th>
			<td><?php switch($uinfo['tribe']) { case 1: echo TRIBE1; break; case 2: echo TRIBE2; break; case 3: echo TRIBE3; break; case 4: echo TRIBE4; break; case 5: echo TRIBE5; break;} ?></td>
		</tr>
		<tr>
			<th>Alliance</th>
			<?php if($uinfo['alliance'] == 0){
			echo '<td>-</td>';
			} else echo '
			<td><a href="allianz.php?aid='.$uinfo['alliance'].' ">'.$database->getUserAlliance($oasis['owner']).'</a></td>'; ?>
		</tr>
		<tr>
			<th>Owner</th>
			<td><a href="spieler.php?uid=<?php echo $oasis['owner']; ?>"><?php echo $database->getUserField($oasis['owner'],'username',0); ?></a></td>
		</tr>
		<tr>
			<th>Village</th>
			<td><a href="karte.php?d=<?php echo $oasis['conqured'];?>&c=<?php echo $generator->getMapCheck($oasis['conqured']);?>"><?php echo $database->getVillageField($oasis['conqured'], "name");?> </a></td>
		</tr></tbody>
	</table>
	
<table cellpadding="1" cellspacing="1" id="troop_info" class="tableNone rep">
		<thead><tr>
			<th>Reports:</th>
		</tr></thead>
		<tbody>
		<?php
if($session->uid == $database->getVillage($_GET['d'])){
	$limit = "ntype=0 and ntype=4 and ntype=5 and ntype=6 and ntype=7 and ntype=20 and ntype=21";
}else{
	$limit = "ntype!=8 and ntype!=9 and ntype!=10 and ntype!=11 and ntype!=12 and ntype!=13 and ntype!=14 and ntype!=15 and ntype!=16 and ntype!=17";
    }
$toWref = $_GET['d'];
if($session->alliance!=0){
$result = mysql_query("SELECT * FROM ".TB_PREFIX."ndata WHERE $limit AND ally = ".$session->alliance." AND toWref = ".$toWref." ORDER BY time DESC Limit 5");
$query = mysql_num_rows($result);
if($query != 0){
while($row = mysql_fetch_array($result)){
	$dataarray = explode(",",$row['data']);
	$type = $row['ntype'];
	$topic=$row['topic'];
	echo "<tr><td>";
if($type==18 or $type==19 or $type==20 or $type==21){
    echo "<img src=\"gpack/travian_default/img/scouts/$type.gif\" alt=\"".$topic."\" title=\"".$topic."\" />";
	}else{
    echo "<img src=\"img/x.gif\" class=\"iReport iReport".$row['ntype']."\" title=\"".$topic."\"> ";
	}
    $date = $generator->procMtime($row['time']);
    echo "<a href=\"berichte.php?id=".$row['id']."&vill=".$row['id']."\">".$date[0]." ".date('H:i',$row['time'])."</a> ";
    echo "</td></tr>";
}
}else{ ?>
							<tr>
					<td><?php echo THERENOINFO;?></td>
				</tr>

<?php }
}else{
$result = mysql_query("SELECT * FROM ".TB_PREFIX."ndata WHERE uid = ".$session->uid." AND toWref = ".$toWref." ORDER BY time DESC Limit 5");
$query = mysql_num_rows($result);
if($query != 0){
while($row = mysql_fetch_array($result)){
	$dataarray = explode(",",$row['data']);
	$type = $row['ntype'];
	$topic=$row['topic'];
	echo "<tr><td>";
if($type==18 or $type==19 or $type==20 or $type==21){
    echo "<img src=\"gpack/travian_default/img/scouts/$type.gif\" alt=\"".$topic."\" title=\"".$topic."\" />";
	}else{
    echo "<img src=\"img/x.gif\" class=\"iReport iReport".$row['ntype']."\" title=\"".$topic."\"> ";
	}
    $date = $generator->procMtime($row['time']);
    echo "<a href=\"berichte.php?id=".$row['id']."&vill=".$row['id']."\">".$date[0]." ".date('H:i',$row['time'])."</a> ";
    echo "</td></tr>";
}
}else{ ?>
							<tr>
					<td><?php echo THERENOINFO;?></td>
				</tr>
<?php }} ?>
</tbody>
</table>
<?php
}}else if (!$basearray['occupied']) {
?>

    <?php
    }
    else {
    ?>

 
<table cellpadding="1" cellspacing="1" id="troop_info" class="tableNone rep">
		<thead><tr>
			<th><?php echo REPORT;?>:</th>
		</tr></thead>
		<tbody>
		<?php
if($session->uid == $database->getVillage($_GET['d'])){
	$limit = "ntype=0 and ntype=4 and ntype=5 and ntype=6 and ntype=7";
}else{
	$limit = "ntype!=8 and ntype!=9 and ntype!=10 and ntype!=11 and ntype!=12 and ntype!=13 and ntype!=14 AND ntype!=15 AND ntype!=16 AND ntype!=17";
    }
$toWref = $_GET['d'];
if($session->alliance!=0){
$result = mysql_query("SELECT * FROM ".TB_PREFIX."ndata WHERE $limit AND ally = ".$session->alliance." AND toWref = ".$toWref." ORDER BY time DESC Limit 5");
$query = mysql_num_rows($result);
if($query != 0){
while($row = mysql_fetch_array($result)){
	$dataarray = explode(",",$row['data']);
	$type = $row['ntype'];
	$topic=$row['topic'];
	echo "<tr><td>";
if($type==18 or $type==19 or $type==20 or $type==21 or $type==22){
    echo "<img src=\"gpack/travian_default/img/scouts/$type.gif\" alt=\"".$topic."\" title=\"".$topic."\" />";
	}else{
    echo "<img src=\"img/x.gif\" class=\"iReport iReport".$row['ntype']."\" title=\"".$topic."\"> ";
	}
    $date = $generator->procMtime($row['time']);
    echo "<a href=\"berichte.php?id=".$row['id']."&vill=".$row['id']."\" title=\"".$topic."\">".$date[0]." ".date('H:i',$row['time'])."</a> ";
    echo "</td></tr>";
}
}else{ ?>
							<tr>
					<td><?php echo THERENOINFO;?></td>
				</tr>

<?php }
}else{
$result = mysql_query("SELECT * FROM ".TB_PREFIX."ndata WHERE $limit AND uid = ".$session->uid." AND toWref = ".$toWref." ORDER BY time DESC Limit 5");
$query = mysql_num_rows($result);
if($query != 0){
while($row = mysql_fetch_array($result)){
	$dataarray = explode(",",$row['data']);
	$type = $row['ntype'];
	$topic=$row['topic'];
	echo "<tr><td>";
if($type==18 or $type==19 or $type==20 or $type==21){
    echo "<img src=\"gpack/travian_default/img/scouts/$type.gif\" alt=\"".$topic."\" title=\"".$topic."\" />";
	}else{
    echo "<img src=\"img/x.gif\" class=\"iReport iReport".$row['ntype']."\" title=\"".$topic."\"> ";
	}
    $date = $generator->procMtime($row['time']);
    echo "<a href=\"berichte.php?id=".$row['id']."&vill=".$row['id']."\">".$date[0]." ".date('H:i',$row['time'])."</a> ";
    echo "</td></tr>";
}
}else{ ?>
							<tr>
					<td><?php echo THERENOINFO;?></td>
				</tr>

<?php }} ?>
					</tbody>
	</table>
    <?php } ?>

