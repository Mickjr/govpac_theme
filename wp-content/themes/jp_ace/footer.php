		<?php global $jpbs_options; ?>

		<div class="footer">
			<div class="footer-inner">
				<div class="footer-content">
					<span class="bigger-120">
						<?php echo $jpbs_options['footer-copy']; ?>
					</span>
	
					&nbsp; &nbsp;
					<span class="action-buttons">
						<?php if ($jpbs_options['facebook-link']) { ?>
						<a id="facebook" href="<?php echo $jpbs_options['facebook-link']; ?>">
							<i class="<?php echo $jpbs_options['facebook-icon']; ?>"></i>
						</a>
						<?php } ?>

						<?php if ($jpbs_options['twitter-link']) { ?>	
						<a id="twitter" href="<?php echo $jpbs_options['twitter-link']; ?>">
							<i class="<?php echo $jpbs_options['twitter-icon']; ?>"></i>
						</a>
						<?php } ?>
	
						<?php if ($jpbs_options['linkedin-link']) { ?>	
						<a id="linkedin" href="<?php echo $jpbs_options['linkedin-link']; ?>">
							<i class="<?php echo $jpbs_options['linkedin-icon']; ?>"></i>
						</a>
						<?php } ?>

						<?php if ($jpbs_options['instagram-link']) { ?>	
						<a id="instagram" href="<?php echo $jpbs_options['instagram-link']; ?>">
							<i class="<?php echo $jpbs_options['instagram-icon']; ?>"></i>
						</a>
						<?php } ?>

						<?php if ($jpbs_options['pinterest-link']) { ?>	
						<a id="pinterest" href="<?php echo $jpbs_options['pinterest-link']; ?>">
							<i class="<?php echo $jpbs_options['pinterest-icon']; ?>"></i>
						</a>
						<?php } ?>

						<?php if ($jpbs_options['vimeo-link']) { ?>	
						<a id="vimeo" href="<?php echo $jpbs_options['vimeo-link']; ?>">
							<i class="<?php echo $jpbs_options['vimeo-icon']; ?>"></i>
						</a>
						<?php } ?>

						<?php if ($jpbs_options['youtube-link']) { ?>	
						<a id="youtube" href="<?php echo $jpbs_options['youtube-link']; ?>">
							<i class="<?php echo $jpbs_options['youtube-icon']; ?>"></i>
						</a>
						<?php } ?>

						<?php if ($jpbs_options['rss-link']) { ?>
						<a id="rss" href="<?php echo $jpbs_options['rss-link']; ?>">
							<i class="<?php echo $jpbs_options['rss-icon']; ?>"></i>
						</a>
						<?php } ?>


					</span>
				</div>
			</div>
		</div>
	
		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
	</div><!-- /.main-container -->

	<!-- basic scripts -->

	<!--[if !IE]> -->
	<script src="<?php bloginfo('template_url'); ?>/assets/js/jquery.2.1.1.min.js"></script>
	<!-- <![endif]-->

	<!--[if IE]>
		<script src="<?php bloginfo('template_url'); ?>/assets/js/jquery.1.11.1.min.js"></script>
	<![endif]-->

	<!--[if !IE]> -->
	<script type="text/javascript">
		window.jQuery || document.write("<script src='<?php bloginfo('template_url'); ?>/assets/js/jquery.min.js'>"+"<"+"/script>");
	</script>
	<!-- <![endif]-->

	<!--[if IE]>
	<script type="text/javascript">
		window.jQuery || document.write("<script src='<?php bloginfo('template_url'); ?>/assets/js/jquery1x.min.js'>"+"<"+"/script>");
	</script>
	<![endif]-->

	<script type="text/javascript">
		if('ontouchstart' in document.documentElement) document.write("<script src='<?php bloginfo('template_url'); ?>/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
	</script>

	<script src="<?php bloginfo('template_url'); ?>/assets/js/bootstrap.min.js"></script>
	
	<!-- page specific plugin scripts -->
	<!--[if lte IE 8]>
	<script src="<?php bloginfo('template_url'); ?>/assets/js/excanvas.min.js"></script>
	<![endif]-->

	<script src="<?php bloginfo('template_url'); ?>/assets/js/jquery-ui.custom.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/assets/js/jquery.ui.touch-punch.min.js"></script>

	<script src="<?php bloginfo('template_url'); ?>/assets/js/jquery.ui.touch-punch.min.js"></script>
 	<script src="<?php bloginfo('template_url'); ?>/assets/js/chosen.jquery.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/assets/js/bootstrap-datepicker.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/vendors/alertify/alertify.js"></script>
	
	<!-- ace scripts -->
	<script src="<?php bloginfo('template_url'); ?>/assets/js/ace-elements.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/assets/js/ace.min.js"></script>

	<!-- inline scripts related to this page -->
	<script type="text/javascript">
		jQuery(function($) {

			$('.dialogs,.comments').ace_scroll({
				size: 300
		    });
				
				
			//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
			//so disable dragging when clicking on label
			var agent = navigator.userAgent.toLowerCase();
			if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
				$('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				});
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {
						//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
				});

				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
			
			
				//show the dropdowns on top or bottom depending on window height and menu position
				$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
					var offset = $(this).offset();
			
					var $w = $(window)
					if (offset.top > $w.scrollTop() + $w.innerHeight() - 100) 
						$(this).addClass('dropup');
					else $(this).removeClass('dropup');
				});
			
			})
		</script>

		<?php wp_footer(); ?>

	</body>
</html>
