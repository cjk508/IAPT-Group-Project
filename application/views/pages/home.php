<?php ?>
<style>
/**

	This styling is only relevant to the homepage
	@todo if there is a more efficient way of implementing this style then use that

	*/
html {
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
}

body {
	background: transparent;
}
</style>
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
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Most Recent Recipes</h3>
	</div>
	<div class="panel-body">
	<div class="row"> 
	<div class="featuredRecipe col-md-6">
			<a class=""
				href="<?php echo site_url('recipe/'.$mostRecents[0]->getID()); ?>">
				<img class="thumbnail"
				src="<?php echo base_url('assets/images/')."/".$mostRecents[0]->getImage();?>"
				alt="...">
				<h4>
					<?php echo $mostRecents[0]->getTitle(); ?>
				</h4>
				<p>
					<?php
	
	foreach ( $mostRecents [0]->getIngredientPools () as $pool ) {
		if ($pool->getDifficulty () == $sessionData ['viewType']) {
			?>				
				<ul>
					<?php
			foreach ( $pool->getIngredients () as $ingredient ) {
				?>		
				<li><?php echo $ingredient?></li>
									<?php
			}
			?>
							</ul>
						<?php
		}
	}
	?>
				</p>
			</a>
		</div>
		<div class="otherFour col-md-6">
			<div class="row">
				<div class="col-md-6">
					<a
						href="<?php echo site_url('recipe/'.$mostRecents[1]->getID()); ?>">
						<img class="thumbnail"
						src="<?php echo base_url('assets/images/')."/".$mostRecents[1]->getImage();?>"
						alt="...">
					</a>
				</div>
				<div class="col-md-6">
					<a
						href="<?php echo site_url('recipe/'.$mostRecents[2]->getID()); ?>">
						<img class="thumbnail"
						src="<?php echo base_url('assets/images/')."/".$mostRecents[2]->getImage();?>"
						alt="...">
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<a
						href="<?php echo site_url('recipe/'.$mostRecents[1]->getID()); ?>">
						<h4>
						<?php echo $mostRecents[1]->getTitle(); ?>
					</h4>
					</a>
				</div>
				<div class="col-md-6">
					<a
						href="<?php echo site_url('recipe/'.$mostRecents[2]->getID()); ?>">
						<h4>
						<?php echo $mostRecents[2]->getTitle(); ?>
					</h4>
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<a
						href="<?php echo site_url('recipe/'.$mostRecents[3]->getID()); ?>">
						<img class="thumbnail"
						src="<?php echo base_url('assets/images/')."/".$mostRecents[3]->getImage();?>"
						alt="...">
					</a>
				</div>
				<div class="col-md-6">
					<a
						href="<?php echo site_url('recipe/'.$mostRecents[4]->getID()); ?>">
						<img class="thumbnail"
						src="<?php echo base_url('assets/images/')."/".$mostRecents[4]->getImage();?>"
						alt="...">
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					
					<a
						href="<?php echo site_url('recipe/'.$mostRecents[3]->getID()); ?>">
					<h4>
						<?php echo $mostRecents[3]->getTitle(); ?>
					</h4>
					
					</a>
				</div>
				<div class="col-md-6">
				<a
						href="<?php echo site_url('recipe/'.$mostRecents[4]->getID()); ?>">
					<h4>
						<?php echo $mostRecents[4]->getTitle(); ?>
					</h4>
					
					</a>

				</div>
			</div>
		</div></div>
	</div>
</div>

<?php 
}
?>
