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
if ($sessionData['viewType'] == 'null' /*or $sessionData['viewType'] != 'null'*/){
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
		<button class="btn btn-primary" name="viewType" value='step'>Step-by-Step</button>
		<button class="btn btn-primary" name="viewType" value='segmented'>Segmented</button>
		<button class="btn btn-primary" name="viewType" value='narrative'>Narrative</button>
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

 <div class="panel panel-default mostRecent">
	<div class="panel-heading">
		<h3 class="panel-title">Most Recent Recipes</h3>
	</div>
	<div class="panel-body">	
		<!-- @todo load most recent recipes -->
		<?php 	foreach($mostRecents as $mostRecent){ ?>
		<div class="media">
			<a class="pull-left" href="#"> <img class="media-object"
				src="<?php echo $mostRecent->getImage();?>" alt="" style = "max-width:150px; height:auto;">
			</a>
			<div class="media-body">
				<h4 class="media-heading"><?php echo $mostRecent->getTitle();?></h4>
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
</div>

<div class="panel panel-default allRecipes">
	<div class="panel-heading">
		<h3 class="panel-title">All Recipes</h3>
	</div>
	<div class="panel-body">	
		<!-- @todo load most recent recipes -->
		<?php 	foreach($AllItems as $mostRecent){ ?>
		<div class="media">
			<a class="pull-left" href="#"> <img class="media-object"
				src="<?php echo $mostRecent->getImage();?>" alt="" style = "max-width:150px; height:auto;">
			</a>
			<div class="media-body">
				<h4 class="media-heading"><?php echo $mostRecent->getTitle();?></h4>
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
<?php 
}
?>
