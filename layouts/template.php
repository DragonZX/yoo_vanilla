<?php
/**
* @package   yoo_vanilla
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// get template configuration
include(dirname(__FILE__).'/template.config.php');
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this['config']->get('language'); ?>" lang="<?php echo $this['config']->get('language'); ?>" dir="<?php echo $this['config']->get('direction'); ?>" >
<head>
<?php echo $this['template']->render('head'); ?>
<link rel="apple-touch-icon" href="<?php echo $this['path']->url('template:apple_touch_icon.png'); ?>" />
</head>

<body id="page" class="yoopage <?php echo $this['config']->get('columns'); ?> <?php echo $this['config']->get('itemcolor'); ?> <?php echo $this['config']->get('toolscolor'); ?> <?php echo 'style-'.$this['config']->get('style'); ?> <?php echo 'font-'.$this['config']->get('font'); ?> <?php echo $this['config']->get('webfonts'); ?> <?php echo $this['config']->get('contentwrapper-class'); ?> <?php echo !$this['modules']->count('top + topblock') ? "no-top": ""; ?> <?php echo !$this['modules']->count('bottom + bottomblock') ? "no-bottom": ""; ?>">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div style="display:none"><a href="http://kantrium.com/" target="_blank" title="Country Review">kantrium.com</a> | <a href="http://mysuomi.com/" target="_blank" title="Finland">MySuomi.com</a> | <a href="http://vivaspb.com/" target="_blank" title="Saint Petersburg">vivaspb.com</a> | <a href="http://finntalk.com/" target="_blank" title="Helsinki">finntalk.com</a></div>

	<?php if ($this['modules']->count('absolute')) : ?>
	<div id="absolute">
		<?php echo $this['modules']->render('absolute'); ?>
	</div>
	<?php endif; ?>
	
	<div id="page-header">
		<div class="page-header-1">
			
			<div class="wrapper">
				
				<div id="header">
	
					<div id="toolbar">
						
						<?php if ($this['modules']->count('toolbarleft')) : ?>
						<div class="left">
							<?php echo $this['modules']->render('toolbarleft'); ?>
						</div>
						<?php endif; ?>
						
						<?php if ($this['modules']->count('toolbarright')) : ?>
						<div class="right">
							<?php echo $this['modules']->render('toolbarright'); ?>
						</div>
						<?php endif; ?>
						
						<?php if($this['config']->get('date')) : ?>
						<div id="date">
							<?php echo $this['config']->get('actual_date'); ?>
						</div>
						<?php endif; ?>
						
					</div>
					
					<?php  if ($this['modules']->count('menu')) : ?>
					<div id="menu">
						
						<?php echo $this['modules']->render('menu'); ?>
						
						<?php if ($this['modules']->count('search')) : ?>
						<div id="search">
							<?php echo $this['modules']->render('search'); ?>
						</div>
						<?php endif; ?>
						
					</div>
					<?php endif; ?>
					
					<?php if ($this['modules']->count('logo')) : ?>		
					<div id="logo">
						<?php echo $this['modules']->render('logo'); ?>
					</div>
					<?php endif; ?>
					
					<?php if ($this['modules']->count('banner')) : ?>
					<div id="banner">
						<?php echo $this['modules']->render('banner'); ?>
					</div>
					<?php endif;  ?>

				</div>
				<!-- header end -->				
				
			</div>
			
		</div>
	</div>
	
	<?php if ($this['modules']->count('top + topblock')) : ?>
	<div id="page-top">
		<div class="page-top-1">
			<div class="page-top-2">
			
				<div class="wrapper">
	
					
					<div id="top">
						<?php if($this['modules']->count('topblock')) : ?>
						<div class="vertical width100">
							<?php echo $this['modules']->render('topblock'); ?>
						</div>
						<?php endif; ?>
		
						<?php if ($this['modules']->count('top')) : ?>
							<?php echo $this['modules']->render('top', array('wrapper'=>"horizontal float-left", 'layout'=>$this['config']->get('top'))); ?>
						<?php endif; ?>
					</div>
					<!-- top end -->
	
				</div>
		
			</div>	
		</div>
	</div>
	<?php endif; ?>
	
	<div id="page-body">
		<div class="page-body-1">
			<div class="page-body-2">

				<div class="wrapper">

					<div class="middle-wrapper">
						<div id="middle">
							<div id="middle-expand">
			
								<div id="main">
									<div id="main-shift">
			
										<?php if ($this['modules']->count('maintop')) : ?>
										<div id="maintop">
											<?php echo $this['modules']->render('maintop', array('wrapper'=>"horizontal float-left", 'layout'=>$this['config']->get('maintop'))); ?>
										</div>
										<!-- maintop end -->
										<?php endif; ?>
			
										<div id="mainmiddle">
											<div id="mainmiddle-expand">
											
												<div id="content">
													<div id="content-shift">
			
														<?php if ($this['modules']->count('contenttop')) : ?>
														<div id="contenttop">
															<?php echo $this['modules']->render('contenttop', array('wrapper'=>"horizontal float-left", 'layout'=>$this['config']->get('contenttop'))); ?>
														</div>
														<!-- contenttop end -->
														<?php endif; ?>
														
														<div id="component" class="floatbox">
															
															<?php if ($this['modules']->count('breadcrumbs')) : ?>
																<?php echo $this['modules']->render('breadcrumbs'); ?>
															<?php endif; ?>
															
															<?php echo $this['template']->render('content'); ?>
															
														</div>
							
														<?php if ($this['modules']->count('contentbottom')) : ?>
														<div id="contentbottom">
															<?php echo $this['modules']->render('contentbottom', array('wrapper'=>"horizontal float-left", 'layout'=>$this['config']->get('contentbottom'))); ?>
														</div>
														<!-- mainbottom end -->
														<?php endif; ?>
													
													</div>
												</div>
												<!-- content end -->
												
												<?php if($this['modules']->count('contentleft')) : ?>
												<div id="contentleft" class="vertical">
													<div class="contentleft-1"></div>
													<?php echo $this['modules']->render('contentleft'); ?>
												</div>
												<?php endif; ?>
												
												<?php if($this['modules']->count('contentright')) : ?>
												<div id="contentright" class="vertical">
													<div class="contentright-1"></div>
													<?php echo $this['modules']->render('contentright'); ?>
												</div>
												<?php endif; ?>
												
											</div>
										</div>
										<!-- mainmiddle end -->
			
										<?php if ($this['modules']->count('mainbottom')) : ?>
										<div id="mainbottom">
											<?php echo $this['modules']->render('mainbottom', array('wrapper'=>"horizontal float-left", 'layout'=>$this['config']->get('mainbottom'))); ?>
										</div>
										<!-- mainbottom end -->
										<?php endif; ?>
									
									</div>
								</div>
			
								<?php if($this['modules']->count('left')) : ?>
								<div id="left" class="vertical">
									<?php echo $this['modules']->render('left'); ?>
								</div>
								<?php endif; ?>
								
								<?php if($this['modules']->count('right')) : ?>
								<div id="right" class="vertical">
									<?php echo $this['modules']->render('right'); ?>
								</div>
								<?php endif; ?>
			
							</div>
						</div>
					</div>
	
				</div>
				
			</div>
		</div>
	</div>
	
	<?php if ($this['modules']->count('bottom + bottomblock')) : ?>
	<div id="page-bottom">
		<div class="page-bottom-1">
			<div class="page-bottom-2">
			
				<div class="wrapper">

					
					<div id="bottom">
						<?php if ($this['modules']->count('bottom')) : ?>
							<?php echo $this['modules']->render('bottom', array('wrapper'=>"horizontal float-left", 'layout'=>$this['config']->get('bottom'))); ?>
						<?php endif; ?>
	
						<?php if($this['modules']->count('bottomblock')) : ?>
						<div class="vertical width100">
							<?php echo $this['modules']->render('bottomblock'); ?>
						</div>
						<?php endif; ?>
					</div>
					<!-- bottom end -->

				</div>
			
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	<div id="page-footer">
		<div class="wrapper">
			
			<div id="footer">
			
				<?php if ($this['modules']->count('footer + debug')) : ?>
				<a class="anchor" href="#page"></a>
				<?php echo $this['modules']->render('footer'); ?>
				<?php echo $this['modules']->render('debug'); ?>
				<?php endif; ?>
				
			</div>
			<!-- footer end -->

		</div>
	</div>
	
	<?php echo $this->render('footer'); ?>
	
</body>
</html>