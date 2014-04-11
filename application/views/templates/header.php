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
	if ($sessionData ['viewType'] !== $_POST ['viewType']) {
		?>
<script type="text/javascript">
$(document).ready(function() {	
		newAlert('alert-info', 'Your new view type is <?php echo $_POST ['viewType'] ?>');
});
		 </script>
<?php
	}
	$sessionData = array (
			'viewType' => $_POST ['viewType'] 
	);
	$this->session->set_userdata ( $sessionData );
}
?>
<html>
<head>
<title>The Cook Book -- Cooking made easy</title>
	<?php
	echo link_tag ( 'assets/css/bootstrap.css' );
	echo link_tag ( 'assets/css/style.css' );
	?>
	<script src="http://code.jquery.com/jquery-latest.min.js"
	type="text/javascript"></script>
<script type="text/javascript"
	src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
<script type="text/javascript"
	src="<?php echo base_url('assets/js/annyang.min.js'); ?>"></script>
<script type="text/javascript"
	src="<?php echo base_url('assets/js/jquery.collagePlus.min.js'); ?>"></script>
<script type="text/javascript">
	var images = ['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg'];
	 $('html').css({'background': 'url(<?php echo base_url()?>assets/images/' + images[Math.floor(Math.random() * images.length)] + ') no-repeat center center fixed'});
	 $('html').css({'background-size': '100%'});

	 $(document).ready(function() {		
		<?php
		
		foreach ( unserialize ( DIFFICULTIES ) as $item ) {
			?>		
			
		    $("#<?php echo $item ?>").click(function() {
			    var current = <?php echo $sessionData ['viewType'] ?>; 
		    	$.post(window.location.object, {viewType: "<?php echo $item ?>"}, function() {
				    window.location.reload(true);		    								
		    	    if (<?php echo $item ?> !== current) {
		    	    	newAlert('alert-info', 'Your new view type is <?php echo $item ?>');
					}
				}); 
			});
		<?php } ?>		
		$('a').tooltip();	 
	});

	 function newAlert (type, message) {
	    $("#alert-area").append($("<div class='alert " + type + " fade in' data-alert><p> " + message + " </p></div>"));
	    $(".alert").delay(2000).fadeOut("slow", function () { $(this).remove(); });
	}
	</script>
</head>
<body>
	<header>
		<nav class="navbar navbar-default" role="navigation"
			style="width: 100%;">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse"
						data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span> <span
							class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo site_url(); ?>"><h2>The
							Cook Book</h2></a>
				</div>

				<div class="collapse navbar-collapse"
					id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
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

						<li><a data-toggle="tooltip" data-placement="bottom"
							title="Pick a recipe completely at random."
							href="<?php echo site_url('recipe/'.$headerSurprise->getID()); ?>">
								Surprise Me! </a></li>
					</ul>
					<?php
					$attributes = array (
							'class' => 'navbar-form navbar-right navbar-search' 
					);
					echo "<a href='#' data-toggle='tooltip' data-placement='bottom'
									title='you can search for ingredients or recipes.'>";
					echo form_open ( 'search/view', $attributes );
					$data = array (
							'name' => 'search',
							'value' => set_value ( 'search' ),
							'class' => "form-control",
							'role' => 'search',
							'label' => 'search',
							'rules' => 'required',
							'placeholder' => 'Search recipe/ingredient e.g. lime' 
					);
					echo form_input ( $data );
					
					?>
					<button type="submit" class="btn btn-default">
						<span class="glyphicon glyphicon-search"></span>
					</button>
					</a>
			<?php
			echo form_close ();
			// If we're not on the home page.
			if (! endsWith ( $_SERVER ['PHP_SELF'], "index.php" ) || $sessionData ['viewType'] !== 'null') {
				?>
					<a class="navbar-brand navbar-right" style="margin-left: 5px;"><small><b>Current style: </b>
						<?php
				
				echo_type_depend ( "Whole", $sessionData, NARRATIVE );
				echo_type_depend ( "Segmented", $sessionData, SEGMENTED );
				echo_type_depend ( "Finely cut", $sessionData, STEP );
				?></small>
					</a>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown"> Viewing preference <b class="caret"></b>
						</a>
							<ul class="dropdown-menu" role="menu">
								<li><a id="<?php echo NARRATIVE ?>" href="#"
									data-toggle="tooltip" data-placement="right"
									title="Instructions are displayed as a whole block of text. Particularly good for those with good memory!"><?php echo_type_depend("<span class=\"glyphicon glyphicon-ok\"></span> ", $sessionData, NARRATIVE)?>Whole</a></li>
								<li><a id="<?php echo SEGMENTED ?>" href="#"
									data-toggle="tooltip" data-placement="right"
									title="Instructions are portioned out like slices of pizza - split into several steps making it easier to follow."><?php echo_type_depend("<span class=\"glyphicon glyphicon-ok\"></span> ", $sessionData, SEGMENTED)?>Segmented</a></li>
								<li><a id="<?php echo STEP ?>" href="#" data-toggle="tooltip"
									data-placement="right"
									title="Instructions are finely cut and easy to follow, so you can take one step at a time."><?php echo_type_depend("<span class=\"glyphicon glyphicon-ok\"></span> ", $sessionData, STEP)?>Finely cut</a></li>
							</ul></li>
					</ul>
			<?php
			}
			?>
				</div>
			</div>
		</nav>
	</header>
	<div id="alert-area"></div>
	<div class="wrapper">