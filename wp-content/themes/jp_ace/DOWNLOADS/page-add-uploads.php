<?php
/*
Template Name: MOD-Uploads-Add 
*/
?>

<?php get_header(); ?>


<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/styles/jqx.base.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/vendors/jqwidgets/styles/jqx.energyblue.css" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/vendors/chosen/chosen.css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/MOD-Uploads/style.css" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/vendors/jquery-ui-1.11.4/jquery-ui.min.css" />

<!-- SCRIPTS -->
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/jquery-ui-1.11.4/jquery-ui.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/vendors/chosen/chosen.jquery.min.js" ></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.43/jquery.form-validator.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/sheetjs/vendor/alertify.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/vendors/tinymce/js/tinymce/tinymce.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/vendors/ajaxfileupload/ajaxfileupload.js" ></script>


<?php get_sidebar(); ?>

<?php 
    global $current_user;
    get_currentuserinfo(); 
    $userID    = $current_user->ID;
    $userRole = ($current_user->roles[0]);
    $today = date('Y-m-d');
    $msgdate = date('m/d/Y');

	if (isset($_POST['submit']))
	{
		
		$fileID = '';
		
		// Uploading File First 
		if ( !empty( $_FILES ) ) {
			foreach( $_FILES as $file ) {
				if ( is_array( $file )) {
					$fileID = upload_user_file( $file );
				}
			}
		}


		// Saving information to Uploads Table
		$mdate = date('Y-m-d', strtotime($_POST['message_date']));
		
		$message = array(
			'title'			=> $_POST['title'],
			'message_date'	=> $mdate,
			'description'	=> $_POST['description'],
			'attachment_id'	=> $fileID,
			'notes'			=> $_POST['notes'],
			'created_by'	=> $userID,
			'created_date'	=> $today
		);
		
		$wpdb->insert('jp_uploads', $message);
		
		$retURL = get_bloginfo('url').'/uploads-manager/';
		echo "<script type='text/javascript'>window.location.href = '".$retURL."';</script>";

	}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<?php get_template_part('templates/pre-page'); ?>

	<section class="content">

		<div class="block-content">
			
			<div class="row">
				
				<form id="review-form" method="post" action="" enctype="multipart/form-data">
	
					<div class="form-group settingsGroup clearfix">
						<h4>File Upload Details</h4>
						<div class="clearfix" style="margin: 10px 0;">
							<div class="col-sm-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label for="title">Title:</label>
									<input 	id="title" name="title" 
											type="text" class="form-control"
											data-validation="required" 
											data-validation-error-msg="*required" />
								</div>
							</div>						
							<div class="col-sm-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label for="message_date">Message Date</label>
									<input 	type="text" id="message_date" name="message_date" 
											class="form-control input-datepicker" value="<?php echo $msgdate; ?>"
											data-validation="birthdate" data-validation-format="mm/dd/yyyy" 
											data-validation-error-msg="Date format: mm/dd/yyyy and Date not after today" />
								</div>
							</div>	
							<div class="col-sm-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label for="description">Description:</label>
									<input 	id="description" name="description" 
											type="text" class="form-control" />
								</div>
							</div>	
							<div class="col-sm-12 col-md-6 col-lg-6">
								<div class="form-group">
									<label for="filepath">File path:</label>
									<input 	id="filepath" name="filepath" 
											type="file" class="form-control" />
								</div>
							</div>	
						</div>
						<div class="clearfix" style="margin: 10px 0;">
							<div class="col-sm-12 col-md-12 col-lg-12">
								<div class="form-group">
									<label for="notes">Notes:</label>
									<textarea 	type="editor" class="editor form-control" 
												id="notes" name="notes" rows="7">
									</textarea>
								</div>
							</div>					
						</div>

						<div style="margin: 10px 0 10px 15px; display: block">
							<input 	id="submit" name="submit" type="submit" 
									onsubmit="" class="btn btn-success" value="Save Changes" />
						</div>

					</div>
	
				</form>
						
			</div>
			
		</div>
				
	</section>
			

</div><!-- #content -->

<?php get_footer(); ?>



<script>
    // Tiny MCE
    tinymce.init({
	    selector: ".editor",
	    menubar: false,
	    statusbar: false,
	    forced_root_block: false,
	    plugins: [
	        "advlist autolink lists link anchor",
	        "searchreplace visualblocks code fullscreen",
	        "contextmenu paste code textcolor preview"
	    ],
	    paste_webkit_styles: "color font-size",
	    style_formats: [
		    {title: "Headers", items: [
		        {title: "Header 1", format: "h1"},
		        {title: "Header 2", format: "h2"},
		        {title: "Header 3", format: "h3"},
		        {title: "Header 4", format: "h4"},
		        {title: "Header 5", format: "h5"},
		        {title: "Header 6", format: "h6"}
		    ]},
		    {title: "Inline", items: [
		        {title: "Bold", icon: "bold", format: "bold"},
		        {title: "Italic", icon: "italic", format: "italic"},
		        {title: "Underline", icon: "underline", format: "underline"},
		        {title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
		        {title: "Superscript", icon: "superscript", format: "superscript"},
		        {title: "Subscript", icon: "subscript", format: "subscript"},
		        {title: "Code", icon: "code", format: "code"}
		    ]},
		    {title: "Blocks", items: [
		        {title: "Paragraph", format: "p"},
		        {title: "Blockquote", format: "blockquote"},
		        {title: "Div", format: "div"},
		        {title: "Pre", format: "pre"}
		    ]},
		    {title: "Alignment", items: [
		        {title: "Left", icon: "alignleft", format: "alignleft"},
		        {title: "Center", icon: "aligncenter", format: "aligncenter"},
		        {title: "Right", icon: "alignright", format: "alignright"},
		        {title: "Justify", icon: "alignjustify", format: "alignjustify"}
		    ]}
		],
	    toolbar: "undo redo |  bold italic underline forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent "
	});
</script>

<script>
	// Setup Datepicker Fields
	$('.input-datepicker').datepicker({
		format: 'mm-dd-yyyy',
		maxDate: new Date()
   	}).on("change", function(e) {
		var curDate = $(this).datepicker("getDate");
		var maxDate = new Date();
		//maxDate.setDate(maxDate.getDate() + 1); // add one day
		maxDate.setHours(0, 0, 0, 0);           // clear time portion for correct results
		if (curDate > maxDate) {
			alertify.alert("Invalid date - Date cannot be greater than today");
			$(this).datepicker("setDate", maxDate);
   		}
	});	
		
	// Activating Validation
	$.validate({
		ignore: "",
		modules : 'date'
	});			
</script>
