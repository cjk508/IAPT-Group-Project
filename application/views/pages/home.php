<?php ?>
<style>
/**

	This styling is only relevant to the homepage
	@todo if there is a more efficient way of implementing this style then use that

	*/
html {
	/*background: <?php //echo "url('" . base_url('assets/images/backgroundImage.jpg') . "')" ?> no-repeat center center fixed;*/
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
$sessionData = $this->session->all_userdata();
if (!typeIsSelected($sessionData) /*or $sessionData['viewType'] != 'null'*/){
?>

<!-- This is the large welcome box in the middle of the homepage -->
<div class="jumbotron jumbotron-homepage">
	<h1>Welcome to the Cook Book!</h1>
	<p>	
		Recipes your way! <br> You can cook anything with our site! It is
		really easy. <br>
			<?php echo $db_works?>
		</p>
		
		<?php
		echo '<p> Button Pressed: '.$sessionData['viewType'].' </p>';
		?>
		<!-- A form that allows the user to select the type of interface they wish to use
			This is based on how skilled they believe they are at cooking
		 -->
	<p>
	
	
	<form class="btn-group" action='#' method="post">
		<button class="btn btn-primary" name="viewType" value='<?php echo STEP ?>'>Step-by-Step</button>
		<button class="btn btn-primary" name="viewType" value='<?php echo SEGMENTED ?>'>Segmented</button>
		<button class="btn btn-primary" name="viewType" value='<?php echo NARRATIVE ?>'>Narrative</button>
	</form>
	</p>
</div>



<?php
}

/*
If there is already a session variable stored for the user attempting to access the site then a different page will be shown to the user.
Instead of seeing the welcome page, they will see a list of the most recent and most popular recipes

@todo link these to the database and loop

*/
else{

?>
<?php /*
*******************************
******** List Home page *******
********************************
 <div class="panel panel-default mostRecent">
	<div class="panel-heading">
		<h3 class="panel-title">Most Recent Recipes</h3>
	</div>
	<div class="panel-body">	
		<!-- @todo load most recent recipes -->
		<?php 	foreach($mostRecents as $mostRecent){ ?>
		<div class="media">
			<a class="pull-left" href="<?php echo site_url('recipe/'.$mostRecent->getID()); ?>"> <img class="media-object"
				src="<?php echo $mostRecent->getImage();?>" alt="">
			</a>
			<div class="media-body">
				<a href ="<?php echo site_url('recipe/'.$mostRecent->getID()); ?>"> <h4 class="media-heading"><?php echo $mostRecent->getTitle();?></h4></a>
				<?php
				foreach ( $mostRecent->getIngredientPools () as $pool ) {
					?>
					<?php 
					if ( $pool-> getDifficulty() == $sessionData['viewType']){ ?>
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
			</div>
		</div>
	<?php } ?>
	</div>
</div>

<div class="panel panel-default mostPopular pull-right">
	<div class="panel-heading">
		<h3 class="panel-title">Most Popular Recipes</h3>
	</div>
	<div class="panel-body">
		<!-- @todo load most popular recipes -->
		<div class="media">
			<a class="pull-left" href="#"> <img class="media-object"
				src="assets/images/64test.svg" alt="">
			</a>
			<div class="media-body">
				<h4 class="media-heading">Recipe 1</h4>
				Lorem Ipsum Ingredients
			</div>
		</div>

		<div class="media">
			<a class="pull-left" href="#"> <img class="media-object"
				src="assets/images/64test.svg" alt="">
			</a>
			<div class="media-body">
				<h4 class="media-heading">Recipe 2</h4>
				Lorem Ipsum Ingredients
			</div>
		</div>

		<div class="media">
			<a class="pull-left" href="#"> <img class="media-object"
				src="assets/images/64test.svg" alt="">
			</a>
			<div class="media-body">
				<h4 class="media-heading">Recipe 3</h4>
				Lorem Ipsum Ingredients
			</div>
		</div>
	</div>
</div> */ ?>

<?php /*******************************
***** thumbnail Home page *****
******************************
 <div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Most Recent Recipes</h3>
	</div>
	<div class="panel-body">	
		<div class="row">
		  <?php foreach($mostRecents as $mostRecent){ ?>
		  <div class="col-sm-3 col-md-4">
		    <div class="thumbnail">
		      <img class = "media-object" src="<?php echo $mostRecent->getImage();?>" alt="...">
		      <div class="caption">
		        <h3><?php echo $mostRecent->getTitle();?></h3>
		      </div>
		    </div>
		  </div>
		  <?php } ?>
		</div>
	</div>
</div> 

*/
?>
<div class = "largeImageRecipes panel panel-default">
	<div class="panel-heading"><h3 class="panel-title">Most Recent Recipes</h3></div>
	<div class = "panel-body">
		<div class = "featuredRecipe pull-left">
			<a class="pull-left" href="<?php echo site_url('recipe/'.$mostRecents[0]->getID()); ?>"> 
				<img  src="<?php echo base_url('assets/images/')."/".$mostRecents[0]->getImage();?>" alt="...">
				<h4>
					<?php echo $mostRecents[0]->getTitle(); ?>
				</h4>
				<p>
					<?php foreach ( $mostRecents[0]->getIngredientPools () as $pool ) {
						?>
						<?php 
						if ( $pool-> getDifficulty() == $sessionData['viewType']){ ?>
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
		<div class = "otherFour pull-right">
			<div class = "topLeft pull-left">
				<a class="pull-left" href="<?php echo site_url('recipe/'.$mostRecents[1]->getID()); ?>"> 
					<img style="height:auto; width:100%" src="<?php echo base_url('assets/images/')."/".$mostRecents[1]->getImage();?>" alt="...">
					<h4>
						<?php echo $mostRecents[1]->getTitle(); ?>
					</h4>
				</a>	
			</div>
			<div class = "topRight pull-right">
				<a class="pull-left" href="<?php echo site_url('recipe/'.$mostRecents[2]->getID()); ?>"> 
					<img style="height:auto; width:100%" src="<?php echo base_url('assets/images/')."/".$mostRecents[2]->getImage();?>" alt="...">
					<h4>
						<?php echo $mostRecents[2]->getTitle(); ?>
					</h4>
				</a>	
			</div>
			<div class = "bottomLeft pull-left">
				<a class="pull-left" href="<?php echo site_url('recipe/'.$mostRecents[3]->getID()); ?>"> 
					<img style="height:auto; width:100%" src="<?php echo base_url('assets/images/')."/".$mostRecents[3]->getImage();?>" alt="...">
					<h4>
						<?php echo $mostRecents[3]->getTitle(); ?>
					</h4>
				</a>
			</div>
			<div class = "bottomRight pull-right">
				<a class="pull-left" href="<?php echo site_url('recipe/'.$mostRecents[4]->getID()); ?>"> 
					<img style="height:auto; width:100%" src="<?php echo base_url('assets/images/')."/".$mostRecents[4]->getImage();?>" alt="...">
					<h4>
						<?php echo $mostRecents[4]->getTitle(); ?>
					</h4>
				</a>
			</div>
		</div>
	</div>	
</div>

*/?>

<?php 
}
?>
