<?php
	// Retrieve the session data at the start of loading the page
	$sessionData = $this->session->all_userdata();
 	
 	// if there is no session data then set the value to null 
 	if (!isset($sessionData['viewType'])){
 		$sessionData = array('viewType'  => 'null' );

 		$this->session->set_userdata($sessionData);
 	}

 	// if the viewtype has been changed then update the session variable
	if (isset($_POST['viewType'])){
		$sessionData = array('viewType'  => $_POST['viewType'] );
		$this->session->set_userdata($sessionData);
	}
?>
<html>
<head>
	<title><?php echo $title ?> - Cook Book</title>
	<?php
		echo link_tag('assets/css/bootstrap.css');
		echo link_tag('assets/css/style.css');
	?>
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/js/bootstrap.js'); ?>"></script>
</head>

<body>
<header> 
	<h2 class="brand">Cooking Website</h2>
	<nav>
		<ul class="nav nav-pills">
			<li class="active"><a href="">Home</a></li>
			<!-- @todo need to get the drop downs working. Seems to meet the same logic as is on the bootstrap page but it doesn't currently work-->
			<li class="dropdown">
				<a data-toggle="dropdown" href="#">Categories<span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					Meat
				</ul>
			</li>
			<li>
			<a href="#">
				Surprise Me!
			</a></li>
		</ul>
	</nav>
	<!-- @todo need to add the ability to change viewType through a dropdown, but as dropdown's are not currently working I didn't see the point -->
	<form class="navbar-search pull-right">
	    <input type="text" class="search-query" placeholder="Search">
	    <span class="glyphicon glyphicon-search"></span>
	</form>
</header>


<script type="text/javascript">
	$(document).ready( function() {
		$('.dropdown').dropdown()
	});
</script>
<div class = "wrapper">