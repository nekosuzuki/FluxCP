<?php if (!defined('FLUX_ROOT')) exit; ?>
<?php if (!$session->isLoggedIn()): ?>      
	<form action="<?php echo $this->url('account', 'login', array('return_url' => $params->get('return_url'))) ?>" method="post">
	<input type="hidden" name="server" value="<?php echo htmlspecialchars($session->loginAthenaGroup->serverName) ?>">
	<div class="login_row_main">
		<div class="login_row">
			<table>
				<tr><td class="tag">USERNAME</td></tr>
				<tr><td><input type="text" name="username" class="textClass"/></td></tr>
				<tr><td class="tag">PASSWORD</td></tr>
				<tr><td><input type="password" name="password" class="textClass"/></td></tr>
			</table>
		</div>
		<div class="login_btn">
			<input type="submit" value=" " class="loginBtn" /> <br/>
		</div>
	</div>
	<div class="fgtpass">
		<a href="<?php echo $this->url('account','resetpass')?>"><img class="forgotpass" src="<?php echo $this->themePath('./img/forgetpass.png') ?>" onmouseover='this.src="<?php echo $this->themePath('img/forgetpass_hover.png'); ?>"' onmouseout='this.src="<?php echo $this->themePath('img/forgetpass.png'); ?>"' /></a>
	</div>
	</form>
<?php else:?>
	<div class="logged">
		<b>Welcome, <?php echo htmlspecialchars($session->account->userid) ?></b><br/><br/>
		<a href="<?php echo $this->url('account','view')?>">My Account</a> |
		<a href="<?php echo $this->url('account','logout')?>">Logout</a>
	</div>
<?php endif?>