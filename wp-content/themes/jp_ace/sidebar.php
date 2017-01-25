<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jpace
 */

?>

			<?php
				global $jpbs_options;

				if ($jpbs_options['compact-sidebar']) {
					$csidebar = " compact ";
				} else {
					$cside = "";
				}

			?>

			<div id="sidebar" class="sidebar responsive <?php echo $csidebar; ?>">
<!--
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>
-->

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<?php if ($jpbs_options['btn1-link']) { ?>
						<a class="btn btn-success" href="<?php echo $jpbs_options['btn1-link']; ?>">
							<i class="ace-icon <?php echo $jpbs_options['btn1-icon']; ?>"></i>
						</a>
						<?php } ?>

						<?php if ($jpbs_options['btn2-link']) { ?>
						<a class="btn btn-info" href="<?php echo $jpbs_options['btn2-link']; ?>">
							<i class="ace-icon <?php echo $jpbs_options['btn2-icon']; ?>"></i>
						</a>
						<?php } ?>

						<?php if ($jpbs_options['btn3-link']) { ?>
						<a class="btn btn-warning" href="<?php echo $jpbs_options['btn3-link']; ?>">
							<i class="ace-icon <?php echo $jpbs_options['btn3-icon']; ?>"></i>
						</a>
						<?php } ?>

						<?php if ($jpbs_options['btn4-link']) { ?>
						<a class="btn btn-danger" href="<?php echo $jpbs_options['btn4-link']; ?>">
							<i class="ace-icon <?php echo $jpbs_options['btn4-icon']; ?>"></i>
						</a>
						<?php } ?>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<?php if ($jpbs_options['btn1-link']) { ?>
						<span class="btn btn-success"></span>
						<?php } ?>

						<?php if ($jpbs_options['btn2-link']) { ?>
						<span class="btn btn-info"></span>
						<?php } ?>

						<?php if ($jpbs_options['btn3-link']) { ?>
						<span class="btn btn-warning"></span>
						<?php } ?>

						<?php if ($jpbs_options['btn4-link']) { ?>
						<span class="btn btn-danger"></span>
						<?php } ?>
					</div>

					<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
						<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
					</div>
	
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>

				</div><!-- /.sidebar-shortcuts -->


				<?php
				wp_nav_menu( array(
					'menu'              => 'primary',
					'theme_location'    => 'primary',
					'depth'             => 2,
					'container'         => '',
					'container_class'   => '',
					'container_id'      => '',
					'menu_id'			=> 'main-menu',
					'menu_class'        => 'nav nav-list',
					'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					'walker'            => new wp_bootstrap_navwalker()
				));
				?>



			</div>
