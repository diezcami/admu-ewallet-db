
<!DOCTYPE html>
<html <?php 
if($isWelcome==true){
		echo 'class="welcome"';
	}
?>>
<head>
	<meta charset="utf-8">
	<!-- Latest compiled and minified CSS -->
	<?php
		$this->load->helper('url')
	?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/bootstrap.css")?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/style.css")?>">
	<title>AdMU E-Wallet</title>
</head>
<!--<body style="background-image: url('<?php# echo base_url("assets/congruent_outline.png")?>');">-->
<body
<?php
	if($isWelcome==true){
		echo 'class="welcome"';
	}else{
		#echo base_url("assets/congruent_outline.png");
		#echo "style='background-image: url(\"".base_url("css/bootstrap.css")."')";
		#echo '<div style="background-image:url(\'../uploads/avi/' . $row['avi'] . "')></div>";
		echo "style=\"background-image:url('".base_url("assets/congruent_outline.png")."')\"";
	}
?>
>
		<div class="navbar-fixed-top navbar-inverse" role="navigation">
			<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			    <span class="sr-only">Toggle navigation</span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			    <span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="<?php echo site_url('site/welcome') ?>"> Home </a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav">
			  	<?php
			  		foreach($NavigationArray as $entry){
			  			if( strcasecmp($activeLink, $entry[2]) == 0){
			  				echo "<li class='active'><a href='".$entry[1]."'>".ucfirst($entry[0])."</a></li>";
			  			}else{
			  				echo "<li><a href='".$entry[1]."'>".ucfirst($entry[0])."</a></li>";
			  			}
			  		}
			  		#echo "<li class='active'><a href='#'>HAHA</a></li>";
			  	?>
			  </ul>
			  <ul class="nav navbar-nav navbar-right">
			    <li class="dropdown">
			      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sign in <b class="caret"></b></a>
			      <ul class="dropdown-menu" id="signin-dropdown" style="padding: 15px;`">
			      	<form method="post" action="login" accept-charset="UTF-8">
						<form method="post" action="login" accept-charset="UTF-8">
								<input style="margin-bottom: 15px;" type="text" placeholder="Username" id="username" name="username">
								<input style="margin-bottom: 15px;" type="password" placeholder="Password" id="password" name="password">
								<input style="margin-right: 10px;" type="checkbox" name="remember-me" id="remember-me" value="1">
								<label class="string optional" for="user_remember_me"> Remember me</label>
								<input class="btn btn-default btn-block" type="submit" id="sign-in" value="Sign In">
							</form>
					</form>
			      </ul>
			    </li>
			  </ul>
			</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</div>
	
	