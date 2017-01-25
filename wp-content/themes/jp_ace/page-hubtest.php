<?php
/*
Template Name: Hub Tester
*/

get_header(); 

get_sidebar(); ?>

<div class="main-content">
	<div class="main-content-inner">

		<?php get_template_part( 'template-parts/content', 'breadcrumbs' ); ?>

		<div class="page-content" role="main">

			<div class="row">
				
				<div class="col-xs-12">

					<?php
					while ( have_posts() ) : the_post(); ?>
	
						<div class="page-header">
							<h1>
								<?php the_title(); ?>
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
								</small>
							</h1>
						</div><!-- /.page-header -->
	
						<form id="testPost" class="form-horizontal" method="post" action="#">

							<div class="row">
							
								<div class="tabbable">
									<ul id="formTabs" class="nav nav-tabs">
										<li class="active">
											<a href="#general" data-toggle="tab" aria-expanded="true">
												<i class="green ace-icon fa fa-file-text bigger-60"> </i> General Fields
											</a>
										</li>
										<li>
											<a href="#approvals" data-toggle="tab" aria-expanded="false">
												<i class="red ace-icon fa fa-calendar bigger-60"> </i> Approvals
											</a>
										</li>
									</ul>
								
									<div class="tab-content">
										<div id="general" class="tab-pane fade in active">
										
											<div class="col-sm-12 col-md-6">
												<div class="form-group required">
											    	<label 	class="col-sm-3 control-label" 
											    			for="username">Username (email):
													</label>
													<div class="col-sm-7">
											    		<input 	type="text" data-validation="required" 
											    				class="form-control" name="username" 
																placeholder="email">
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-3 control-label" 
															for="firstname">First Name:
													</label>
													<div class="col-sm-7">
														<input 	type="text" class="form-control" 
																name="firstname" placeholder="First Name">
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-3 control-label" 
															for="lastname">Last Name:
													</label>
													<div class="col-sm-7">
														<input 	type="text" class="form-control" 
																name="lastname" placeholder="Last Name">
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-3 control-label" 
															for="newemail">New Email:
													</label>
													<div class="col-sm-7">
														<input 	type="text" class="form-control" 
																name="newemail" placeholder="New Email">
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-3 control-label" 
															for="vmpid">VMP ID:
													</label>
													<div class="col-sm-7">
														<input 	type="text" class="form-control" 
																name="vmpid" placeholder="vmpid">
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-3 control-label" 
															for="gender">Gender:
													</label>
													<div class="col-sm-7">
														<select name="gender" 
																class="chosen-select form-control">
															<option value=""></option>
															<option value="Male">Male</option>
															<option value="Female">Female</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-3 control-label" 
															for="links">Links:
													</label>
													<div class="col-sm-7">
														<input 	type="text" class="form-control" 
																name="links" placeholder="Comma Separated list of Links">
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-3 control-label" 
															for="capabilities">Capability:
													</label>
													<div class="col-sm-7">
														<select name="capabilities" 
																class="chosen-select form-control">
															<option value=""></option>
															<option value="7">Trainee</option>
															<option value="8">MRT</option>
															<option value="9">Volunteer</option>
															<option value="10">Prayer Coordinator</option>
															<option value="14">Frontend Admin</option>
															<option value="16">Area Coordinator</option>
															<option value="18">Liaison</option>
															<option value="20">Liaison-Volunteer</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-3 control-label" 
															for="counselortype">Counselor Type:
													</label>
													<div class="col-sm-7">
														<select name="counselortype" 
																class="chosen-select form-control">
															<option value=""></option>
															<option value="1">Chat Coach</option>
															<option value="2">Discipleship Coach</option>
															<option value="3">Email Coach</option>
															<option value="4">Liaison</option>
															<option value="5">Church</option>
															<option value="6">Prayer</option>
															<option value="NONE">None</option>
														</select>
													</div>
												</div>
											</div><!-- END OF LEFT COLUMN -->
											
											<div class="col-sm-12 col-md-6">
												<div class="form-group">
													<label 	class="col-sm-3 control-label" 
															for="street">Street:
													</label>
													<div class="col-sm-7">
														<input 	type="text" class="form-control" 
																name="street" placeholder="Street">
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-3 control-label" 
															for="city">City:
													</label>
													<div class="col-sm-7">
														<input 	type="text" class="form-control" 
																name="city" placeholder="City">
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-3 control-label" 
															for="state">State:
													</label>
													<div class="col-sm-7">
														<input 	type="text" class="form-control" 
																name="state" placeholder="State">
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-3 control-label" 
															for="zipcode">Zipcode:
													</label>
													<div class="col-sm-7">
														<input 	type="text" class="form-control" 
																name="zipcode" placeholder="Zipcode">
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-3 control-label" 
															for="country">Country:
													</label>
													<div class="col-sm-7">
														<input 	type="text" class="form-control" 
																name="country" placeholder="Country">
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-3 control-label" 
															for="phone">Phone:
													</label>
													<div class="col-sm-7">
														<input 	type="text" class="form-control" 
																name="phone" placeholder="Phone">
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-3 control-label" 
															for="coordinator">AC's Email:
													</label>
													<div class="col-sm-7">
														<input 	type="text" class="form-control" 
																name="coordinator" placeholder="AC's Email">
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-3 control-label" 
															for="language">Language:
													</label>
													<div class="col-sm-7">
														<select class="chosen-select form-control" 
																name="language">
															<option value=""></option>
															<option value="English">English</option>
															<option value="Spanish">Spanish</option>
														</select>
													</div>
												</div>	
												<div class="form-group">
													<label 	class="col-sm-3 control-label" 
															for="test_record">Test Record:
													</label>
													<div class="col-sm-7">
														<select class="chosen-select form-control" 
																name="language">
															<option value=""></option>
															<option value="1">Yes</option>
															<option value="0">No</option>
														</select>
													</div>
												</div>
											</div><!-- END OF RIGHT COLUMN -->
											
											<div class="clearfix"></div>
										</div>
										
										<div id="approvals" class="tab-pane fade">
											
											<div class="col-sm-12 col-md-6">

												<div class="form-group">
													<label 	class="col-sm-3 control-label" 
															for="accessgiven">Access Given:
													</label>
													<div class="col-sm-7">
														<input 	type="text" 
																data-date-format="mm/dd/yyyy"
																class="date-picker form-control" 
																name="accessgiven">
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-3 control-label" 
															for="clwc">CLWC:
													</label>
													<div class="col-sm-7">
														<input 	type="text" 
																data-date-format="mm/dd/yyyy"
																class="date-picker form-control" 
																name="clwc">
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-3 control-label" 
															for="generaltraining">General Training:
													</label>
													<div class="col-sm-7">
														<input 	type="text" 
																data-date-format="mm/dd/yyyy"
																class="date-picker form-control" 
																name="generaltraining">
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-3 control-label" 
															for="cctraining">CC Training:
													</label>
													<div class="col-sm-7">
														<input 	type="text" 
																data-date-format="mm/dd/yyyy"
																class="date-picker form-control" 
																name="cctraining">
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-3 control-label" 
															for="ccmockchat">CC Mock Chat:
													</label>
													<div class="col-sm-7">
														<input 	type="text"
																data-date-format="mm/dd/yyyy" 
																class="date-picker form-control" 
																name="ccmockchat">
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-3 control-label" 
															for="dctraining">DC Training:
													</label>
													<div class="col-sm-7">
														<input 	type="text" 
																data-date-format="mm/dd/yyyy"
																class="date-picker form-control" 
																name="dctraining">
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-3 control-label" 
															for="dcknowjesus">DC KnowJesus:
													</label>
													<div class="col-sm-7">
														<input 	type="text" 
																data-date-format="mm/dd/yyyy"
																class="date-picker form-control" 
																name="dcknowjesus">
													</div>
												</div>

											</div><!-- END OF LEFT COLUMN -->
											
											<div class="col-sm-12 col-md-6">
												<div class="form-group">
													<label 	class="col-sm-4 control-label" 
															for="ectrainingvideo">EC Training Video:
													</label>
													<div class="col-sm-6">
														<input 	type="text" 
																data-date-format="mm/dd/yyyy"
																class="date-picker form-control" 
																name="ectrainingvideo">
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-4 control-label" 
															for="ectrainingdemo">EC Training Demo:
													</label>
													<div class="col-sm-6">
														<input 	type="text" 
																data-date-format="mm/dd/yyyy"
																class="date-picker form-control" 
																name="ectrainingdemo">
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-4 control-label" 
															for="ccapproval">CC Approval:
													</label>
													<div class="col-sm-6">
														<input 	type="text" 
																data-date-format="mm/dd/yyyy"
																class="date-picker form-control" 
																name="ccapproval">
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-4 control-label" 
															for="dcapproval">DC Approval:
													</label>
													<div class="col-sm-6">
														<input 	type="text" 
																data-date-format="mm/dd/yyyy"
																class="date-picker form-control" 
																name="dcapproval">
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-4 control-label" 
															for="ecapproval">EC Approval:
													</label>
													<div class="col-sm-6">
														<input 	type="text" 
																data-date-format="mm/dd/yyyy"
																class="date-picker form-control" 
																name="ecapproval">
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-4 control-label" 
															for="prayerapproval">Prayer Approval:
													</label>
													<div class="col-sm-6">
														<input 	type="text" 
																data-date-format="mm/dd/yyyy"
																class="date-picker form-control" 
																name="prayerapproval">
													</div>
												</div>
												<div class="form-group">
													<label 	class="col-sm-4 control-label" 
															for="chvolapproval">Church Volunteer Approval:
													</label>
													<div class="col-sm-6">
														<input 	type="text" 
																data-date-format="mm/dd/yyyy"
																class="date-picker form-control" 
																name="chvolapproval">
													</div>
												</div>
											
											</div><!-- END OF RIGHT COLUMN -->
											
											<div class="clearfix"></div>
										</div>
	
									</div><!-- END OF TAB CONTENT -->
									
								</div>

							</div><!-- End of Fields Row -->

							<div class="row">
								<!-- Action Buttons -->
								<div class="clearfix form-actions">
									<div class="col-sm-offset-3 col-sm-2">
										<button type="button" name="submit" id="submit"
												class="btn btn-primary btn-block">
											<i class="ace-icon fa fa-check bigger-110"></i>
											Submit
										</button>
									</div>
									<div class="col-sm-offset-3 col-sm-2">
										<button type="reset" name="reset" id="reset" 
												class="btn btn-warning btn-block">
											<i class="ace-icon fa fa-check bigger-110"></i>
											Reset
										</button>
									</div>
								</div>
							</div>

						</form>

					<?	endwhile; ?>

				</div><!-- end Column -->
						
			</div><!-- end of Row -->

		</div><!-- Page Content -->

	</div><!-- main-content-inner -->

</div><!-- #primary -->


<script type="text/javascript">
	
	var $ = jQuery;
	
	$(document).ready(function() {
		
		if(!ace.vars['touch']) {
			$('.chosen-select').chosen({
				allow_single_deselect: true,
				width: '100%'
			}); 
			//resize the chosen on window resize
			
			$(window)
				.off('resize.chosen')
				.on('resize.chosen', function() {
					$('.chosen-select').each(function() {
						var $this = $(this);
						$this.next().css({'width': $this.parent().width()});
					})
				})
				.trigger('resize.chosen');
				//resize chosen on sidebar collapse/expand
				
			$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
				if(event_name != 'sidebar_collapsed') return;
				$('.chosen-select').each(function() {
					var $this = $(this);
					$this.next().css({'width': $this.parent().width()});
				})
			});

			$('.date-picker').datepicker({
				autoclose: true,
				todayHighlight: true
			});
			
		}
		
	});
	
	$(document).on('click', '#reset', function() {
		
		$('.chosen-select').val('').trigger("chosen:updated");

    });	
    
    $(document).on('click', '#submit', function(e) {
	    
		e.preventDefault();
		
		alertify.confirm("Are you sure?", function(result) {

			if (result) {
				
				$.ajax({
					
					type: "POST",
					url: "https://devhub.local/users/proc_update.php",
					data: $('form#testPost').serialize(),
					success: function(data) {
						
						$('#reset').click();
						
					}
					
				});
				
			}


		}); 
	    
    });
	
</script>



<?php get_footer(); ?>
