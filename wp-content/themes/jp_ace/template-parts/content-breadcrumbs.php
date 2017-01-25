<?php
/**
 * Template part for displaying breadcrumbs div on top of content.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package jpace
 */

?>

		<?php
			global $jpbs_options;

			if ($jpbs_options['breadcrumbs-fixed']) {
				$breadfix = " breadcrumbs-fixed ";
			} else {
				$breadfix = "";
			}
		?>

		<div class="breadcrumbs <?php echo $breadfix; ?>" id="breadcrumbs">

			<?php custom_breadcrumbs(); ?>

			<div class="nav-search" id="nav-search">
				<form class="form-search" method="get" id="searchform" action="<?php bloginfo("home"); ?>/">
					<span class="input-icon">
						<input 	type="text" placeholder="Search ..." 
								class="nav-search-input" id="s" autocomplete="off" name="s" />
						<button type="submit" id="searchsubmit" class="ace-icon nav-search-icon">
							<i class="fa fa-search"></i>
						</button>
					</span>
				</form>
			</div><!-- /.nav-search -->
		</div>
		
		
		