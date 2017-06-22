<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Bootstrap Login Form</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="<?echo site_url();?>assets/css/bootstrap.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="assets/css/styles.css" rel="stylesheet">
    <style type="text/css">
    .modal-content{
      background-color: transparent;
      border: none;
      outline: none;
      -webkit-box-shadow: none;
      box-shadow: none;
    }
    .modal-header{
      border-bottom: none;
    }
    .modal-footer{
      border-top: none;
    }
    .btn-primary{
      background-color: #03112A;
    }
    .btn-primary:hover{
      background-color: #ed4e22;
    }
    .form-control{
      width: 70%;
      margin: 0px auto;
    }
    .btn-block{
      width: 30%;
      min-width: 150px;
      margin: 0px auto;
          border-radius: 0px;
          border: none;
    }
    @media (min-width: 768px){
      .modal-dialog {
          width: 600px;
          margin: 15% auto;
      }
    }
    </style>
	</head>
	<body>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <img class="big_logo col-md-6 col-md-offset-3" src="<?=site_url()?>images/logo.png" style="margin-bottom:20px;">
      </div>
      <?
      if (isset($error_msg2)) {
        echo $error_msg2;
      }
      ?>
      <div class="modal-body">
          <form class="form col-md-12 center-block" method="post" action="<?echo site_url();?>admin/login">
            <input type="hidden" name="login" value="yes">
            <div class="form-group">
              <input type="text" name="username" class="form-control input-lg" placeholder="Username">
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control input-lg" placeholder="Password">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block">Sign In</button>
              <!--<span class="pull-right"><a href="#">Register</a></span><span><a href="#">Need help?</a></span>-->
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <!--<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>-->
		  </div>	
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="<?echo site_url();?>assets/js/bootstrap.min.js"></script>
	</body>
</html>