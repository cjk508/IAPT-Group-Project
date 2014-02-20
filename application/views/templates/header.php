<?php
if (!isset($_COOKIE['viewType'])){
	//$_SESSION['ViewType'] = $_POST['viewType'];
	setcookie('viewType', 'null', time()+3600); 
}
if (isset($_POST['viewType'])){
	//$_SESSION['ViewType'] = $_POST['viewType'];
	setcookie('viewType', $_POST['viewType'], time()+3600); 
}
?>
<html>
<head>
	<title><?php echo $title ?> - Cook book</title>
	<?php echo link_tag('assets/css/bootstrap.css');
		  echo link_tag('assets/css/style.css'); ?>

	<script type="text/javascript" src="js/jquery-1.8.0.js"></script>
	<script type="text/javascript" src="<?php echo site_url('assets/js/bootstrap.js'); ?>"></script>
</head>

<body>
<header> 
	<h2 class="brand">Cooking Website</h2>
	<nav>
		<ul class="nav nav-pills">
			<li class="active"><a href="#">Home</a></li>
			<!-- @todo need to get the drop downs working. Seems to meet the same logic as is on the bootstrap page but it doesn't currently work-->
			<li class="dropdown">
				<a data-toggle="dropdown" href="#">Categories<span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					Meat
				</ul>
			</li>
		</ul>
	</nav>
	
	<form class="navbar-search pull-right">
	    <input type="text" class="search-query" placeholder="Search">
	</form>
</header>
<script type="text/javascript">
	$(document).ready( function() {
		$('.dropdown-toggle').dropdown()
	});
</script>
<div class = "wrapper">