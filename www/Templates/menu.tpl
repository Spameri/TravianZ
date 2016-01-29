    <div id="side_navi">
        <a id="logo" href="<?php echo HOMEPAGE; ?>" name="logo"><img src="img/x.gif" <?php if($session->plus) { echo "class=\"logo_plus\""; } ?> alt="Travian"></a>


        <p><a href="<?php echo HOMEPAGE; ?>"><?php echo HOME; ?></a> <a href="spieler.php?uid=<?php echo $session->uid; ?>"><?php echo PROFILE; ?></a> <a href="#" onclick="return Popup(0,0,1);"><?php echo INSTRUCT; ?></a> <?php if($session->access == MULTIHUNTER) {

                    echo "<a href=\"Admin/admin.php\"><font color=\"Blue\">Multihunter Panel</font></a>";
                    } ?> <?php if($session->access == ADMIN) {
                    echo "<a href=\"Admin/admin.php\"><font color=\"Red\">".ADMIN_PANEL."</font></a>";
                    echo "<a href=\"massmessage.php\">".MASS_MESSAGE."</a>";
                    echo "<a href=\"sysmsg.php\">".SYSTEM_MESSAGE."</a>";
					echo "<a href=\"create_account.php\">Create Natars</a>";
                    } ?> <a href="logout.php"><?php echo LOGOUT;?></a></p>
        <p>
            <a href="plus.php?id=3"><?php echo SERVER_NAME; ?> <b><span class="plus_g">P</span><span class="plus_o">l</span><span class="plus_g">u</span><span class="plus_o">s</span></b></a>
        </p>
        <p>
            <a href="rules.php"><b><?php echo GAME_RULES;?></b></a> 
            <a href="support.php"><b><?php echo SUPPORT;?></b></a> 
        <br></p>
		<?php
		$timestamp = $database->isDeleting($session->uid);
		if($timestamp) {
		echo "<td colspan=\"2\" class=\"count\">";
		if($timestamp > time()+48*3600) {
		echo "<a href=\"spieler.php?s=3&id=".$session->uid."&a=1&e=4\"><img
		class=\"del\" src=\"img/x.gif\" alt=\"Cancel process\"
		title=\"Cancel process\" /> </a>";
		}
		$time=$generator->getTimeFormat(($timestamp-time()));
        echo "<a href=\"spieler.php?s=3\"> The account will be deleted in <span
		id=\"timer1\">".$time."</span> .</a></td>";
		}
		?>
    </div>
