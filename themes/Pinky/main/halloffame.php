<?php if (!defined('FLUX_ROOT')) exit; 

	if($params->get('action') == 'login')
    {
        $chars = array();
        $guilds = array();
        $sex = array();
        $bsex = array();
		$bclass = array();
    }  else {
		$sex = "<img src='".$this->themePath('img/potm/M/0.gif')."' alt=\"Sex\"/>";
		$sqlpvp  = "SELECT pvpladder.name AS char_name, pvpladder.kills AS kills, pvpladder.deaths AS deaths, char.char_id, char.class AS bclass, login.sex, guild.name as gname 
					FROM pvpladder
					LEFT JOIN  `char` ON pvpladder.char_id = char.char_id
					LEFT JOIN  `login` ON char.account_id = login.account_id
					LEFT JOIN  `guild` ON char.guild_id = guild.guild_id
					ORDER BY kills DESC 
					LIMIT 1";
		$sthpvp  = $server->connection->getStatement($sqlpvp);
		$sthpvp->execute();
		$chars = $sthpvp->fetchAll();
		
		if (empty($chars[0]->sex)) {
			$bsex = $chars[0]->sex;
			$bclass = $chars[0]->bclass;
			$sex = "<img src='".$this->themePath('./img/potm/'.$bsex.'/'.$bclass.'.gif')."' alt=\"Sex\"/>";
		} else {
			$bsex = array();
			$bclass = array();
		}

		$sqlgvg  = "SELECT g.guild_id, g.name AS gname, g.emblem_len, (
					SELECT COUNT( c.castle_id ) 
					FROM guild_castle c
					WHERE c.guild_id = g.guild_id
					) AS castles, g.master, ( 
					SELECT COUNT( char_id ) 
					FROM  `char` 
					WHERE  `char`.guild_id = g.guild_id
					) AS members 
					FROM guild AS g 
					LEFT JOIN  `char` AS ch ON ch.char_id = g.char_id 
					LEFT JOIN login ON login.account_id = ch.account_id 
					ORDER BY castles DESC, members DESC , g.max_member DESC , g.next_exp ASC 
					LIMIT 1";
		$sthgvg  = $server->connection->getstatement($sqlgvg);
		$sthgvg->execute();
		$guilds = $sthgvg->fetchall();
	}
?>
<?php if ( $params->get('action') != 'login' ): ?>
	<div id="tabs1">
		<ul>
		  <li><a href="#pvpking"><img src="<?php echo $this->themePath('img/pvpking.png'); ?>" /></a></li>
		  <li><a href="#gotm"><img src="<?php echo $this->themePath('img/gotm.png'); ?>" /></a></li>
		</ul>
		<div id="pvpking">
			<?php if ( empty($chars[0]->char_name) ): ?>
				<table cellspacing="0" cellpadding="0" class="ranking">
					<tr><td class="sex"><?php echo $sex; ?></td></tr>
					<tr><td><b>NAME: </b><?php echo htmlspecialchars(substr($chars[0]->char_name,0, 12)) ?></td></tr>
					<tr><td><b>KILLS/DEATHS: </b> <?php echo number_format($chars[0]->kills) ." / ". number_format($chars[0]->deaths) ?></td></tr>
				</table>
			<?php endif; ?>
		</div>
		<div id="gotm">
			<?php if(empty($guilds[0]->gname)): ?>
				<table cellspacing="0" cellpadding="0" class="ranking">
					<tr><td class="guild_logo">
						<?php if ($guilds[0]->emblem_len): ?>
							<img width="24" src="<?php echo $this->emblem($guilds[0]->guild_id) ?>" />
						<?php else: ?>
							<b>No Emblem</b>
						<?php endif ?>
					</td></tr>
					<tr><td><b>NAME: </b><?php echo htmlspecialchars(substr($guilds[0]->gname,0 ,15)) ?></td></tr>
					<tr><td><b>MASTER: </b><?php echo htmlspecialchars(substr($guilds[0]->master,0 ,15)) ?></td></tr>
				</table>
			<?php endif ?>
		</div>
	</div>
<?php endif; ?>
