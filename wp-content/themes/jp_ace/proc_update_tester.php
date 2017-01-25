<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>PROC UPDATE - Testing</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="style.css">

	<!-- Javascripts -->
    <script src="assets/js/jquery-1.11.1.js"></script>
	<script src="assets/js/jquery.form-validator.js"></script>
	<script src="assets/js/bootstrap.js"></script>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">PROC-UPDATE Tester</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
        <div id="form-container">
			<form name="testPost" action="proc_update.php" method="post" class="form-horizontal" role="form">
			  <div class="form-group required">
			    <label class="col-sm-4 control-label" for="username">Username (email):</label>
			    <div class="col-sm-8">
			    	<input type="text" data-validation="required" class="form-control" name="username" placeholder="email">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-4 control-label" for="firstname">First Name:</label>
			    <div class="col-sm-8">
				    <input type="text" class="form-control" name="firstname" placeholder="First Name">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-4 control-label" for="lastname">Last Name:</label>
			    <div class="col-sm-8">
				    <input type="text" class="form-control" name="lastname" placeholder="Last Name">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-4 control-label" for="newemail">New Email:</label>
			    <div class="col-sm-8">
				    <input type="text" class="form-control" name="newemail" placeholder="New Email">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-4 control-label" for="vmpid">VMP ID:</label>
			    <div class="col-sm-8">
				    <input type="text" class="form-control" name="vmpid" placeholder="vmpid">
			    </div>
			  </div>

			  <div class="form-group">
			    <label class="col-sm-4 control-label" for="street">Street:</label>
			    <div class="col-sm-8">
				    <input type="text" class="form-control" name="street" placeholder="Street">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-4 control-label" for="city">City:</label>
			    <div class="col-sm-8">
				    <input type="text" class="form-control" name="city" placeholder="City">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-4 control-label" for="state">State:</label>
			    <div class="col-sm-8">
				    <input type="text" class="form-control" name="state" placeholder="State">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-4 control-label" for="zipcode">Zipcode:</label>
			    <div class="col-sm-8">
				    <input type="text" class="form-control" name="zipcode" placeholder="Zipcode">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-4 control-label" for="country">Country:</label>
			    <div class="col-sm-8">
				    <input type="text" class="form-control" name="country" placeholder="Country">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-4 control-label" for="phone">Phone:</label>
			    <div class="col-sm-8">
				    <input type="text" class="form-control" name="phone" placeholder="Phone">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-4 control-label" for="coordinator">AC's Email:</label>
			    <div class="col-sm-8">
				    <input type="text" class="form-control" name="coordinator" placeholder="AC's Email">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-4 control-label" for="gender">Gender:</label>
			    <div class="col-sm-8">
			    	<select name="gender" class="form-control">
			    		<option value=""></option>
			    		<option value="Male">Male</option>
			    		<option value="Female">Female</option>
			    	</select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-4 control-label" for="links">Links:</label>
			    <div class="col-sm-8">
				    <input type="text" class="form-control" name="links" placeholder="Comma Separated list of Links">
			    </div>
			  </div>

			  <div class="form-group">
			    <label class="col-sm-4 control-label" for="capabilities">Capability:</label>
			    <div class="col-sm-8">
			    	<select name="capabilities" class="form-control">
						<option value=""></option>
						<option value="7">Trainee</option>
						<option value="9">Volunteer</option>
						<option value="16">Area Coordinator</option>
						<option value="18">Liaison</option>
						<option value="20">Liaison-Volunteer</option>
			    	</select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-4 control-label" for="language">Language:</label>
			    <div class="col-sm-8">
			    	<select class="form-control" name="language">
			    		<option value=""></option>
			    		<option value="English">English</option>
			    		<option value="Spanish">Spanish</option>
			    	</select>
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="col-sm-4 control-label" for="counselortype">Counselor Type:</label>
			    <div class="col-sm-8">
				    <input type="text" class="form-control" name="counselortype" placeholder="Ministry Role">
			    </div>
			  </div>




			  <!-- Submit Button -->
			  <div class="form-group">
			  	<div class="col-sm-offset-4 col-sm-2">
				  	<input type="submit" name="btnsub" class="btn btn-primary btn-block" value="Submit" />
			  	</div>
			  	<div class="col-sm-2 pull-right">
				  	<input type="reset" name="btnreset" class="btn btn-warning btn-block" value="Reset" />
			  	</div>
			  </div>
			</form>
        </div>   
      </div>

    </div><!-- /.container -->

	<script>
		$.validate();

	</script>



  </body>
</html>
