<?php if (!defined('FLUX_ROOT')) exit; ?>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					</div>
					</div>
					<div class="sidebarright">
						<div class="controlpanel"><?php include('main/loginpanel.php') ?></div>
						<div class="quicklinks2">
							<a href="<?php echo $this->url('account','create'); ?>"><img src="<?php echo $this->themePath('img/register_btn.png'); ?>" onmouseover='this.src="<?php echo $this->themePath('img/register_btn_hover.png'); ?>"' onmouseout='this.src="<?php echo $this->themePath('img/register_btn.png'); ?>"' /></a>
						</div>
						<div class="halloffame"><?php include('main/halloffame.php') ?></div>
					</div>
					</div>
				<div class="containerbgbottom"></div>
				<div class="clear"></div>
				<div class="footer">
					<div class="footerspacer"></div>
					<div class="footercreditsdiv">
						<div class="credits">
							<img style="margin-top: 30px;" src="<?php echo $this->themePath('img/designer.png') ?>" />
							<div class="clear"></div>
						</div>
						<div class="copyright">
							COPYRIGHT 2012 <b>ELVAANRO</b> ALL RIGHTS RESERVERED<br/>
							ALL OTHER COPYRIGHTS AND TRADEMARKS ARE PROPERTY OF GRAVITY, AND THEIR RESPECTIVE OWNERS. 
						</div>
						<div class="clear"></div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</body>
</html>
