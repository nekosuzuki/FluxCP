<?php if (!defined('FLUX_ROOT')) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<?php if (isset($metaRefresh)): ?>
		<meta http-equiv="refresh" content="<?php echo $metaRefresh['seconds'] ?>; URL=<?php echo $metaRefresh['location'] ?>" />
		<?php endif ?>
		<title><?php echo Flux::config('SiteTitle'); if (isset($title)) echo ": $title" ?></title>
		<link rel="stylesheet" href="<?php echo $this->themePath('css/flux.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />
		<link rel="stylesheet" href="<?php echo $this->themePath('css/style.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />
		<link href="<?php echo $this->themePath('css/flux/unitip.css') ?>" rel="stylesheet" type="text/css" media="screen" title="" charset="utf-8" />
		<?php if (Flux::config('EnableReCaptcha')): ?>
		<link href="<?php echo $this->themePath('css/flux/recaptcha.css') ?>" rel="stylesheet" type="text/css" media="screen" title="" charset="utf-8" />
		<?php endif ?>
		<!--[if IE]>
		<link rel="stylesheet" href="<?php echo $this->themePath('css/flux/ie.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />
		<![endif]-->	
		<!--[if lt IE 7]>
		<script src="<?php echo $this->themePath('js/ie7.js') ?>" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo $this->themePath('js/flux.unitpngfix.js') ?>"></script>
		<![endif]-->
		<script type="text/javascript" src="<?php echo $this->themePath('js/jquery-1.7.1.min.js') ?>"></script>
		<script type="text/javascript" src="<?php echo $this->themePath('js/flux.datefields.js') ?>"></script>
		<script type="text/javascript" src="<?php echo $this->themePath('js/flux.unitip.js') ?>"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.money-input').keyup(function() {
					var creditValue = parseInt($(this).val() / <?php echo Flux::config('CreditExchangeRate') ?>, 10);
					if (isNaN(creditValue))
						$('.credit-input').val('?');
					else
						$('.credit-input').val(creditValue);
				}).keyup();
				$('.credit-input').keyup(function() {
					var moneyValue = parseFloat($(this).val() * <?php echo Flux::config('CreditExchangeRate') ?>);
					if (isNaN(moneyValue))
						$('.money-input').val('?');
					else
						$('.money-input').val(moneyValue.toFixed(2));
				}).keyup();
				processDateFields();
			});
			function reload(){
				window.location.href = '<?php echo $this->url ?>';
			}
			$(document).ready(function(){
				$('#tabs div').hide();
				$('#tabs div:first').show();
				$('#tabs ul li:first').addClass('active');
				$('#tabs ul li a').click(function(){ 
				$('#tabs ul li').removeClass('active');
				$(this).parent().addClass('active'); 
				var currentTab = $(this).attr('href'); 
				$('#tabs div').hide();
				$(currentTab).show();
				return false;
				});
			});
			$(document).ready(function(){
				$('#tabs1 div').hide();
				$('#tabs1 div:first').show();
				$('#tabs1 ul li:first').addClass('active');
				$('#tabs1 ul li a').click(function(){ 
				$('#tabs1 ul li').removeClass('active');
				$(this).parent().addClass('active'); 
				var currentTab = $(this).attr('href'); 
				$('#tabs1 div').hide();
				$(currentTab).show();
				return false;
				});
			});
		</script>
		<script type="text/javascript">
			function updatePreferredServer(sel){
				var preferred = sel.options[sel.selectedIndex].value;
				document.preferred_server_form.preferred_server.value = preferred;
				document.preferred_server_form.submit();
			}
			var spinner = new Image();
			spinner.src = '<?php echo $this->themePath('img/spinner.gif') ?>';
			function refreshSecurityCode(imgSelector){
				$(imgSelector).attr('src', spinner.src);
				var clean = <?php echo Flux::config('UseCleanUrls') ? 'true' : 'false' ?>;
				var image = new Image();
				image.src = "<?php echo $this->url('captcha') ?>"+(clean ? '?nocache=' : '&nocache=')+Math.random();
				
				$(imgSelector).attr('src', image.src);
			}
			function toggleSearchForm()
			{
				$('.search-form').slideToggle('fast');
			}
		</script>
		
		<?php if (Flux::config('EnableReCaptcha') && Flux::config('ReCaptchaTheme')): ?>
		<script type="text/javascript">
			 var RecaptchaOptions = {
			    theme : '<?php echo Flux::config('ReCaptchaTheme') ?>'
			 };
		</script>
		<?php endif ?>
		
	</head>
	<body>
		<div id="wrapper">
			<div id="main">
				<div class="spacer"></div>
				<div id="menu">
					<ul>
						<li><a href="<?php echo $this->url('main'); ?>"><img src="<?php echo $this->themePath('img/home.png'); ?>" /></a></li>
						<li><a href="<?php echo $this->url('main','info'); ?>"><img src="<?php echo $this->themePath('img/info.png'); ?>" /></a></li>
						<li><a href="<?php echo $this->url('main','downloads'); ?>"><img src="<?php echo $this->themePath('img/downloads.png'); ?>" /></a></li>
						<li><a href="https://discord.gg/m6MggZZ" target="_blank"><img src="<?php echo $this->themePath('img/forums.png'); ?>" /></a></li>
						<li><a href="http://eternalro.ddns.net/donation/" target="_blank"><img src="<?php echo $this->themePath('img/donate.png'); ?>" /></a></li>
						<li><a href="<?php echo $this->url('account'); ?>"><img src="<?php echo $this->themePath('img/account.png'); ?>" /></a></li>
						<li class="clear"></li>
					</ul>
				</div>
				<div class="containerbg">
					<div class="containerbgtop"></div>
					<div class="containerbginner">
					<div class="centeradjust">
						<div class="sidebarleft">
							<div class="serverstatus"><?php include('main/status.php'); ?></div>
							<div class="quicklinks">
								<ul>
									<li><a href="<?php echo $this->url('vote'); ?>"><img src="<?php echo $this->themePath('img/v4p.png'); ?>" onmouseover='this.src="<?php echo $this->themePath('img/v4p_hover.png'); ?>"' onmouseout='this.src="<?php echo $this->themePath('img/v4p.png'); ?>"' /></a></li>
									<li><a href="http://ratemyserver.net/index.php?page=detailedlistserver&serid=14956&url_sname=ElvaanRO" target="_blank"><img src="<?php echo $this->themePath('img/rms.png'); ?>" onmouseover='this.src="<?php echo $this->themePath('img/rms_hover.png'); ?>"' onmouseout='this.src="<?php echo $this->themePath('img/rms.png'); ?>"'  /></a></li>
								</ul>
							</div>
							<div class="facebook"><iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FElvaanRO&amp;width=180&amp;height=180&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false&amp;appId=370452872984532" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:180px; height:180px;" allowTransparency="true"></iframe></div>
						</div>
							<div class="centercont">
								<?php if ($message=$session->getMessage()): ?>
									<p class="message"><?php echo htmlspecialchars($message) ?></p>
								<?php endif ?>
								<?php include 'main/submenu.php' ?>
								<?php include 'main/pagemenu.php' ?>
								<?php if (in_array($params->get('module'), array('donate', 'purchase'))) include 'main/balance.php' ?>
		