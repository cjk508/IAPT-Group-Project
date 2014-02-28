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

<?php 
}
?>
