<?php
// Retrieve the session data at the start of loading the page
$sessionData = $this->session->all_userdata ();

// if there is no session data then set the value to null
if (! isset ( $sessionData ['viewType'] )) {
	$sessionData = array (
			'viewType' => 'null' 
	);
	
	$this->session->set_userdata ( $sessionData );
}

// if the viewtype has been changed then update the session variable
if (isset ( $_POST ['viewType'] )) {
	$sessionData = array (
			'viewType' => $_POST ['viewType'] 
	);
	$this->session->set_userdata ( $sessionData );
}

?>
<html>
<head>
<title>Cook Book</title>
	<?php
	echo link_tag ( 'assets/css/bootstrap.css' );
	echo link_tag ( 'assets/css/style.css' );
	?>
	<script src="http://code.jquery.com/jquery-latest.min.js"
	type="text/javascript"></script>
<script type="text/javascript"
	src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
<script type="text/javascript"
	src="<?php echo base_url('assets/js/jquery.collagePlus.min.js'); ?>"></script>
<script type="text/javascript">
	var images = ['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg'];
	 $('html').css({'background': 'url(<?php echo base_url()?>assets/images/' + images[Math.floor(Math.random() * images.length)] + ') no-repeat center center fixed'});
	 $('html').css({'background-size': '100%'});
	</script>
</head>

<body>

	<header>
		<a href="<?php echo site_url(); ?>"><h2 class="brand">The Cook Book</h2>
		</a>
		<nav>
			<ul class="nav nav-pills">
				<li class="active"><a href="<?php echo site_url();?>">Home</a></li>
				<!-- @todo need to get the drop downs working. Seems to meet the same logic as is on the bootstrap page but it doesn't currently work-->
				<li class="dropdown"><a id="dLabel" role="button"
					data-toggle="dropdown" href="#"> Categories <span class="caret"></span>
				</a>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
				  <?php						
						foreach ( $categories as $category ) {
							?> 					
				    <li><a
							href="<?php echo base_url()."category/".$category-> getCategoryName() ?>"> <?php echo $category-> getCategoryDisplayName()?> </a></li>
				<?php }?>
				  </ul></li>

				  <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
				    <?php foreach($headerCategories as $headerCategory){ ?>
					    <li>
					    	<?php /**
					    	* @todo need to change the category view
					    	*/?>

					    	<a href="<?php echo site_url('category/'.$headerCategory) ?>"> MEAT </a>
					    </li>
				    <?php }?>
				  </ul>
				</li>
				<li><a href="<?php echo site_url('recipe/'.$headerSurprise->getID()); ?>"> Surprise Me! </a></li>
			</ul>
		</nav>
<<<<<<< HEAD
<<<<<<< HEAD
		<!-- @todo need to add the ability to change viewType through a dropdown, but as dropdown's are not currently working I didn't see the point -->
		<?php 
			$attributes = array('class' => 'navbar-search pull-right', );
			echo form_open('search/view', $attributes);
			$data = array(
              'name'        => 'search',
              'value'       => '',
              'class'		=> "search-query",
              'role'		=>'search',
              'placeholder'	=>'Search',
            );
			echo form_input($data);
			echo form_close();
		?>
		<!-- <form class="navbar-search pull-right">
			<input type="text" class="search-query" role='search'
				placeholder="Search"> <span class="glyphicon glyphicon-search"></span>
		</form> -->
=======

		<form class="navbar-search pull-right" style="margin-left: 10px;">
=======
		<!-- @todo need to add the ability to change viewType through a dropdown, but as dropdown's are not currently working I didn't see the point -->
		<form class="navbar-search pull-right">
>>>>>>> parent of 831166b... Fixed presentation drop down. Added tooltips. Other stuff.
			<input type="text" class="search-query" role='search'
				placeholder="Search"> <span class="glyphicon glyphicon-search"></span>
		</form>
<<<<<<< HEAD

		<?php
		// If we're not on the home page.
		if (! endsWith ( $_SERVER ['PHP_SELF'], "index.php" ) || $sessionData ['viewType'] !== 'null') {
			?>
		<div class="btn-group pull-right" style="margin-top: 2px;">
			<button type="button" class="btn btn-default dropdown-toggle"
				data-toggle="dropdown">
				Viewing preference <span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu">
				<li><a id="<?php echo STEP ?>" href="#" data-toggle="tooltip"
					data-placement="right" title="Step by step view is very cool">Step-by-Step</a></li>
				<li><a id="<?php echo SEGMENTED ?>" href="#" data-toggle="tooltip"
					data-placement="right" title="Segmented view is very cool">Segmented</a></li>
				<li><a id="<?php echo NARRATIVE ?>" href="#" data-toggle="tooltip"
					data-placement="right" title="Narrative view is very cool">Narrative</a></li>
			</ul>
		</div>
			<?php
		}
		?>
>>>>>>> FETCH_HEAD
=======
>>>>>>> parent of 831166b... Fixed presentation drop down. Added tooltips. Other stuff.
	</header>


	<script type="text/javascript">
	$(document).ready( function() {
		$('.dropdown-toggle').dropdown()
	});
</script>
<<<<<<< HEAD
	<div id="alert-area"></div>
=======
>>>>>>> parent of 831166b... Fixed presentation drop down. Added tooltips. Other stuff.
	<div class="wrapper">
