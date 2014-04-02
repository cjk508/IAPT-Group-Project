<?php
/**
 * If the session variable has not been set then show the default welcome screen
 * otherwise show the normal home screen
 */
$sessionData = $this->session->all_userdata ();
if (! typeIsSelected ( $sessionData ) /*or $sessionData['viewType'] != 'null'*/){
	?>

<!-- This is the large welcome box in the middle of the homepage -->
<div class="jumbotron jumbotron-homepage">
	<h1>Welcome to the Cook Book!</h1>
	<p>
		Recipes your way! <br> You can cook anything with our site! It is
		really easy. <br>
	</p>
		
		<?php
	echo '<p> Button Pressed: ' . $sessionData ['viewType'] . ' </p>';
	?>
		<!-- A form that allows the user to select the type of interface they wish to use
			This is based on how skilled they believe they are at cooking
		 -->


	<form class="btn-group" action='#' method="post">
		<button class="btn btn-primary" name="viewType"
			value='<?php echo STEP ?>'>Step-by-Step</button>
		<button class="btn btn-primary" name="viewType"
			value='<?php echo SEGMENTED ?>'>Segmented</button>
		<button class="btn btn-primary" name="viewType"
			value='<?php echo NARRATIVE ?>'>Narrative</button>
	</form>

	<form class="btn-group pull-right" action='#' method="post">
		<button class="btn btn-primary" name="viewType"
			value='<?php echo DEFAULT_TYPE ?>'>Skip</button>
	</form>
</div>

<?php
} 

/*
 * If there is already a session variable stored for the user attempting to access the site then a different page will be shown to the user. Instead of seeing the welcome page, they will see a list of the most recent and most popular recipes @todo link these to the database and loop
 */
else {
	
	?>

<div class="panel panel-default recent-panel">
	<h3>Most Recent Recipes <small>Still warm.</small></h3>
	<div>
		<div class="row">
			<div class="featuredRecipe col-md-6">
				<a class=""
					href="<?php echo site_url('recipe/'.$mostRecents[0]->getID()); ?>">
					<div>
					<img class="thumbnail"
					src="<?php echo base_url('assets/images/')."/".$mostRecents[0]->getImage();?>"
					alt="..."></div>
					<h4>
					<?php echo $mostRecents[0]->getTitle(); ?>
						<small>Serves <?php echo $mostRecents[0]->getServings();?> ;<span class="glyphicon glyphicon-tags"> </span>   
							<?php foreach ( $mostRecents [0]->getCategory () as $cat ) {?>
								<a href='<?php echo base_url()?>category/<?php echo $cat; ?>'>
								<?php 
									echo $cat;
									if ( sizeof($mostRecents[0]->getCategory())!= 1  and $forCount < sizeof($mostRecents[0]->getCategory()) ){
										echo '; ';
									}
								?>
							<?php } ?>
						</small>
					</h4>
				</a>
			</div>
			<div class="otherFour col-md-6">
			<?php
	
	// Create rows with 2 recipes each.
	foreach ( array (
			1,
			3 
	) as $index ) {
		?> 
				<div class="row">
			<?php
		for($i = $index; $i < $index + 2; $i ++) {
			?>
						<a
						href="<?php echo site_url('recipe/'.$mostRecents[$i]->getID()); ?>">
						<div class="col-md-6">
						<div class="img-container thumbnail">
							<img class=""
								src="<?php echo base_url('assets/images/')."/".$mostRecents[$i]->getImage();?>"
								alt="...">
						</div>
							<div class="row">

							<h4>
							<?php echo $mostRecents[$i]->getTitle(); ?>
								<small>Serves <?php echo $mostRecents[$i]->getServings();?> ;<span class="glyphicon glyphicon-tags"> </span>   
									<?php
									$forCount = 0;
									foreach ( $mostRecents [$i]->getCategory () as $cat ) {?>
										<a href='<?php echo base_url()?>category/<?php echo $cat; ?>'> 
									
										<?php 
											echo $cat;
											if ( sizeof($mostRecents[$i]->getCategory())!= 1  and $forCount < sizeof($mostRecents[$i]->getCategory()) ){
												echo '; ';
											}
										?>

										</a>
									<?php } ?>
								</small>
							</h4>
							</div>
					
					</a>
				</div>
				<?php
		}
		?>
				</div>
				<?php if ($index ===1) { ?>
				<hr>
				<?php }?>
			<?php } ?>					
			</div>
	</div>
</div>
</div>

<?php
}
?>
