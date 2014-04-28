<?php
// Retrieve the session data at the start of loading the page
$sessionData = $this->session->all_userdata ();

// if there is no session data then set the value to null
if (! isset ( $sessionData ['viewType'] )) {
	$sessionData = array (
			'viewType' => SEGMENTED 
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
<!DOCTYPE html>
<head>
<title>The Cook Book -- Cooking made easy</title>
	<?php
	// Bootstrap CSS
	echo link_tag ( 'assets/css/bootstrap.css' );
	// Main CSS file
	echo link_tag ( 'assets/css/style.css' );
	?>
	<!-- jQuery -->
<script src="http://code.jquery.com/jquery-latest.min.js"
	type="text/javascript"></script>
<script type="text/javascript"
	src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
<script type="text/javascript"
	src="<?php echo base_url('assets/js/annyang.min.js'); ?>"></script>
<script type="text/javascript"
	src="<?php echo base_url('assets/js/jquery.collagePlus.min.js'); ?>"></script>
<script type="text/javascript">
	// Background images for the application. Random image is picked on every website load.  
	var images = ['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg'];
	 $('html').css({'background': 'url(<?php echo base_url()?>assets/images/' + images[Math.floor(Math.random() * images.length)] + ') no-repeat center center fixed'});
	 $('html').css({'background-size': '100%'});

	 $(document).ready(function() {		
		<?php
		// Code to display alert on type change.
		// This isn't working as well as it should, because a page refresh clears out
		// the notification too soon.
		foreach ( unserialize ( DIFFICULTIES ) as $item ) {
			switch ($item) {
				case NARRATIVE :
					$display = "Advanced";
					break;
				
				case SEGMENTED :
					$display = "Intermediate";
					break;
				
				case STEP :
					$display = "Novice";
					break;
			}
			?> // Push some javascript to create the alert. 
		    $("#<?php echo $item ?>").click(function() {
			    var current = <?php echo $sessionData ['viewType'] ?>; 
		    	$.post(window.location.object, {viewType: "<?php echo $item ?>"}, function() {
				    window.location.reload(true);		    								
		    	    if (<?php echo $item ?> !== current) {
		    	    	newAlert('alert-info', 'Your new view type is <?php echo $display ?>');
					}
				}); 
			});
		<?php } ?>		
		$('a').tooltip();	 
		$('input[type=search]').tooltip({ 
		    placement: "bottom",
		    trigger: "focus"
		});
	});
	// Push a new alert to screen. 
	 function newAlert (type, message) {
	    $("#alert-area").append($("<div class='alert " + type + " fade in' data-alert><p> " + message + " </p></div>"));
	    $(".alert").delay(2000).fadeOut("slow", function () { $(this).remove(); });
	}
	</script>
</head>
<body>
	<header role="banner">
		<!-- Header navigation start -->
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
					<a class="navbar-brand" accesskey="0"
						href="<?php echo site_url(); ?>"><h2>The Cook Book</h2></a>
				</div>
				<!-- Categories dropdown -->
				<div class="collapse navbar-collapse"
					id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="dropdown"><a id="dLabel" role="button"
							data-toggle="dropdown" href="#" accesskey="1"> Categories <span
								class="caret"></span>
						</a>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
				  <?php
						foreach ( $categories as $category ) {
							?> 					
				    <li><a
									href="<?php echo base_url()."category/".$category-> getCategoryName() ?>"> <?php echo $category-> getCategoryDisplayName()?> </a></li>
				<?php }?>
				  </ul></li>

						<li><a id="surprise" data-toggle="tooltip" data-placement="bottom"
							title="Pick a recipe completely at random."
							href="<?php echo site_url('recipe/'.$headerSurprise->getID()); ?>"
							accesskey="2"> Surprise Me! </a></li>
					</ul>
					<?php
					$attributes = array (
							'class' => 'navbar-form navbar-right navbar-search' 
					);
					echo form_open ( 'search/view', $attributes );
					$data = array (
							'type' => 'search',
							'name' => 'search',
							'value' => set_value ( 'search' ),
							'class' => "form-control",
							'role' => 'search',
							'label' => 'Search website for a meal or ingredient, e.g. lime.',
							'rules' => 'required',
							'id' => 'search',
							'placeholder' => 'Search meal/ingredient',
							'data-toggle' => 'tooltip',
							'data-placement' => 'bottom',
							'title' => 'you can search for ingredients or recipes.' 
					);
					echo form_input ( $data );
					
					?>
					<button type="submit" class="btn btn-default">
						<span class="glyphicon glyphicon-search"></span>
					</button>
					
			<?php
			echo form_close ();
			// If we're not on the home page.
			/*
			 * if (! endsWith ( $_SERVER ['PHP_SELF'], "index.php" ) || $sessionData ['viewType'] !== 'null') { ?> <ul class="nav navbar-nav navbar-right"> <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> Viewing preference <b class="caret"></b> </a> <ul class="dropdown-menu" role="menu"> <li><a id="<?php echo NARRATIVE ?>" href="#" data-toggle="tooltip" data-html="true" data-placement="right" title="<style>.tooltip-inner{min-width:150px});</style>Instructions are displayed as a whole block of text. Particularly good for those with good memory!"><?php echo_type_depend("<span class=\"glyphicon glyphicon-ok\"></span> ", $sessionData, NARRATIVE)?>Advanced</a></li> <li><a id="<?php echo SEGMENTED ?>" href="#" data-toggle="tooltip" data-html="true" data-placement="right" title="<style>.tooltip-inner{min-width:150px});</style>Instructions are portioned out like slices of pizza - split into several steps making it easier to follow."><?php echo_type_depend("<span class=\"glyphicon glyphicon-ok\"></span> ", $sessionData, SEGMENTED)?>Intermediate</a></li> <li><a id="<?php echo STEP ?>" href="#" data-toggle="tooltip" data-placement="right" data-html="true" title="<style>.tooltip-inner{min-width:150px});</style>Instructions are finely cut and easy to follow, so you can take one step at a time."><?php echo_type_depend("<span class=\"glyphicon glyphicon-ok\"></span> ", $sessionData, STEP)?>Novice</a></li> </ul></li> </ul> <a class="navbar-brand navbar-right" style="margin-left: 5px;"><small><b>Current style: </b> <?php echo_type_depend ( "Advanced", $sessionData, NARRATIVE ); echo_type_depend ( "Intermediate", $sessionData, SEGMENTED ); echo_type_depend ( "Novice", $sessionData, STEP ); ?> </small> </a> <?php }
			 */
			if (! endsWith ( $_SERVER ['PHP_SELF'], "index.php" ) || $sessionData ['viewType'] !== 'null') {
				?>
				<!-- Presentation styles dropdown -->
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown"> <b>Current style: </b>
								<?php
				
				echo_type_depend ( "Advanced", $sessionData, NARRATIVE );
				echo_type_depend ( "Intermediate", $sessionData, SEGMENTED );
				echo_type_depend ( "Novice", $sessionData, STEP );
				?>
							<b class="caret"></b>
						</a>
							<ul class="dropdown-menu" role="menu">
								<li><a id="<?php echo NARRATIVE ?>" href="#"
									data-toggle="tooltip" data-html="true" data-placement="right"
									title="<style>.tooltip-inner{min-width:150px});</style>Instructions are displayed as a whole block of text. Particularly good for those with good memory!"><?php echo_type_depend("<span class=\"glyphicon glyphicon-ok\"></span> ", $sessionData, NARRATIVE)?>Advanced</a></li>
								<li><a id="<?php echo SEGMENTED ?>" href="#"
									data-toggle="tooltip" data-html="true" data-placement="right"
									title="<style>.tooltip-inner{min-width:150px});</style>Instructions are portioned out like slices of pizza - split into several steps making it easier to follow."><?php echo_type_depend("<span class=\"glyphicon glyphicon-ok\"></span> ", $sessionData, SEGMENTED)?>Intermediate</a></li>
								<li><a id="<?php echo STEP ?>" href="#" data-toggle="tooltip"
									data-placement="right" data-html="true" title="<style>.tooltip-inner{min-width:150px});</style>Instructions are finely cut and easy to follow, so you can take one step at a time."><?php echo_type_depend("<span class=\"glyphicon glyphicon-ok\"></span> ", $sessionData, STEP)?>Novice</a></li>
							</ul></li>
					</ul>
					
			<?php
			}
			?>
				</div>
			</div>
		</nav>
		<!-- End navigation -->
	</header>
	<!-- Empty div used to push the alerts to.  -->
	<div id="alert-area"></div>
	<main role="main" class="wrapper">