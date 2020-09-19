<?php if (!defined('FLUX_ROOT')) exit; ?>
<?php
	$enablerss = true;
	$news = "http://www.elvaan-ro.com/update/index.php?app=core&module=global&section=rss&type=forums&id=1";
	$updates = "http://www.elvaan-ro.com/update/index.php?app=core&module=global&section=rss&type=forums&id=2";
	$events = "http://www.elvaan-ro.com/update/index.php?app=core&module=global&section=rss&type=forums&id=3";
?>
<div class="welcome">
	<img class="welcomeimg" src="<?php echo $this->themePath('img/welcome.png'); ?>" />
	<p>
	
	</p>
	<img class="decorate" src="<?php echo $this->themePath('img/decorate.png'); ?>" />
	<div class="noticeboard_bg">
		<div id="tabs">
			<ul>
			  <li><a href="#news" class="news"><img src="<?php echo $this->themePath('img/news.png'); ?>" /></a></li>
			  <li><a href="#updates" class="updates"><img src="<?php echo $this->themePath('img/update.png'); ?>" /></a></li>
			  <li><a href="#events" class="events"><img src="<?php echo $this->themePath('img/events.png'); ?>" /></a></li>
			</ul>
			<div id="news">
				<?php
					if ( $enablerss ):
						require_once("rsslib.php");
						echo RSS_Display($news, 10);
					endif;
				?>
			</div>
			<div id="updates">
				<?php
					if ( $enablerss ):
						require_once("rsslib.php");
						echo RSS_Display($updates, 10);
					endif;
				?>
			</div>
			<div id="events">
				<?php
					if ( $enablerss ):
						require_once("rsslib.php");
						echo RSS_Display($events, 10);
					endif;
				?>
			</div>
		</div>
	</div>
</div>