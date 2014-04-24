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
		Whether you're a professional chef or never cooked before, our recipes
		can be followed your preferred way. You can cook any meal using one of
		the three recipe presentation styles below, making those complex meals
		a piece of cake!<br> <small>(Hover over the buttons for more info.)</small>
	</p>
	<!-- A form that allows the user to select the type of interface they wish to use
			This is based on how skilled they believe they are at cooking
		 -->
	<form class="btn-group" action='#' method="post">
		<button class="btn btn-primary" name="viewType" data-toggle="tooltip"
			data-placement="top"
			title="Instructions are displayed as a whole block of text. Particularly good for those with good memory!"
			value='<?php echo NARRATIVE ?>'>Advanced</button>
		<button class="btn btn-primary" name="viewType" data-toggle="tooltip"
			data-placement="top"
			title="Instructions are portioned out like slices of pizza - split into several steps making it easier to follow."
			value='<?php echo SEGMENTED ?>'>Intermediate</button>
		<button class="btn btn-primary" name="viewType" data-toggle="tooltip"
			data-placement="top"
			title="Instructions are finely cut and easy to follow, so you can take one step at a time."
			value='<?php echo STEP ?>'>Novice</button>
	</form>
	<form class="btn-group pull-right" action='#' method="post">
		<button class="btn btn-primary" name="viewType"
			value='<?php echo DEFAULT_TYPE ?>'>Decide Later</button>
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
	<h3>
		Recent Recipes <small>Still warm.</small>
	</h3>
	<div>
		<div class="row">
			<div class="featuredRecipe col-md-6">
				<a data-toggle="tooltip"
					title="<?php echo $mostRecents[0]-> getDescription();?>" class=""
					href="<?php echo site_url('recipe/'.$mostRecents[0]->getID()); ?>">
					<div>
						<img class="thumbnail blue-glow"
							src="<?php echo base_url('assets/images/')."/".$mostRecents[0]->getImage();?>"
							alt="<?php echo $mostRecents[0]->getImageAlt()?>">
					</div>
					<h4>
					<?php echo $mostRecents[0]->getTitle(); ?>
						<small> ;<span
							class="glyphicon glyphicon-tags"> </span>   
							<?php
	
	foreach ( $mostRecents [0]->getCategory () as $cat ) {
		$url = $cat->getCategoryName ();
		$display_name = $cat->getCategoryDisplayName ();
		?>
								<a href='<?php echo base_url()?>category/<?php echo $url ?>'>
								<?php
		echo $display_name;
		if (sizeof ( $display_name ) != 1 and $forCount < sizeof ( $display_name )) {
			echo '; ';
		}
		?>
							<?php } ?>
				</a>; Serves <?php echo $mostRecents[0]->getServings();?>;
							<span class="glyphicon glyphicon-time"></span> <?php echo $mostRecents [0]->getRecipeCookTime()?> min.
						</small>
					</h4>
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
						<a data-toggle="tooltip"
						title="<?php echo $mostRecents[$i]-> getDescription();?>"
						href="<?php echo site_url('recipe/'.$mostRecents[$i]->getID()); ?>">
						<div class="col-md-6">
							<div class="img-container thumbnail blue-glow">
								<img class=""
									src="<?php echo base_url('assets/images/')."/".$mostRecents[$i]->getImage();?>"
									alt="<?php echo $mostRecents[$i]->getImageAlt()?>">
							</div>
							<div class="row">

								<h4>
							<?php echo $mostRecents[$i]->getTitle(); ?>
								<small><span
										class="glyphicon glyphicon-tags"> </span>   
									<?php
			$forCount = 0;
			foreach ( $mostRecents [$i]->getCategory () as $cat ) {
				$url = $cat->getCategoryName ();
				$display_name = $cat->getCategoryDisplayName ();
				?>
										<a href='<?php echo base_url()?>category/<?php echo $url; ?>'> 
									
										<?php
				echo $display_name;
				if (sizeof ( $display_name ) != 1 and $forCount < sizeof ( $display_name )) {
					echo '; ';
				}
				?>

										</a>; Serves <?php echo $mostRecents[$i]->getServings();?>;
									<?php } ?>
									<span class="glyphicon glyphicon-time"></span> <?php echo $mostRecents [$i]->getRecipeCookTime()?> min.
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
