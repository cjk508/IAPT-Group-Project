<?php 
/**
* If the session variable has not been set then show the default welcome screen
* otherwise show the normal home screen
*/
$sessionData = $this->session->all_userdata();
if ($sessionData['viewType'] == 'null' /*or $sessionData['viewType'] != 'null'*/){
?>
	<style>
	/**

	This styling is only relevant to the homepage
	@todo if there is a more efficient way of implementing this style then use that

	*/
		html {
			background: url(assets/images/backgroundImage.jpg) no-repeat center center fixed; 
			-webkit-background-size: cover;
			-moz-background-size: cover;
            -o-background-size: cover;
			background-size: cover;
	    }
	    body{
	    	background: transparent;
	    }
	</style>

	<!-- This is the large welcome box in the middle of the homepage -->
	<div class="jumbotron jumbotron-homepage">
		<h1>Welcome to the Cook Book!</h1>
		<p> 
			Recipes your way!
			<br>
			You can cook anything with our site! It is really easy.
			<br>
			<?php echo $db_works?>
		</p>
		
		<?php
		echo '<p> Button Pressed: '.$sessionData['viewType'].' </p>';
		?>
		<!-- A form that allows the user to select the type of interface they wish to use
			This is based on how skilled they believe they are at cooking
		 -->
		<p>
			<form class="btn-group" action = '#' method="post">
				<button class="btn btn-primary" name = "viewType" value = 'Step-by-Step'>Step-by-Step</button>
				<button class="btn btn-primary" name = "viewType" value = 'Segmented'>Segmented</button>
				<button class="btn btn-primary" name = "viewType" value = 'Narrative'>Narrative</button>
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
	echo '<p>'.$sessionData['viewType'].'</p>';
?>
<div class="panel panel-default mostRecent">
  <div class="panel-heading">
    <h3 class="panel-title">Most Recent Recipes</h3>
  </div>
  <div class="panel-body">
 	 <!-- @todo load most recent recipes -->
	  <div class="media">
	    <a class="pull-left" href="#">
	      <img class="media-object" src="assets/images/64test.svg" alt="">
	    </a>
	    <div class="media-body">
	      <h4 class="media-heading">Recipe 1</h4>
	      Lorem Ipsum Ingredients
	    </div>
	  </div>

	  <div class="media">
	    <a class="pull-left" href="#">
	      <img class="media-object" src="assets/images/64test.svg" alt="">
	    </a>
	    <div class="media-body">
	      <h4 class="media-heading">Recipe 2</h4>
	      Lorem Ipsum Ingredients
	    </div>
	  </div>

	  <div class="media">
	    <a class="pull-left" href="#">
	      <img class="media-object" src="assets/images/64test.svg" alt="">
	    </a>
	    <div class="media-body">
	      <h4 class="media-heading">Recipe 3</h4>
	      Lorem Ipsum Ingredients
	    </div>
	  </div>


  </div>
</div>

<div class="panel panel-default mostPopular pull-right">
  <div class="panel-heading">
    <h3 class="panel-title">Most Popular Recipes</h3>
  </div>
  <div class="panel-body">
  <!-- @todo load most popular recipes -->
  	<div class="media">
	    <a class="pull-left" href="#">
	      <img class="media-object" src="assets/images/64test.svg" alt="">
	    </a>
	    <div class="media-body">
	      <h4 class="media-heading">Recipe 1</h4>
	      Lorem Ipsum Ingredients
	    </div>
	  </div>

	  <div class="media">
	    <a class="pull-left" href="#">
	      <img class="media-object" src="assets/images/64test.svg" alt="">
	    </a>
	    <div class="media-body">
	      <h4 class="media-heading">Recipe 2</h4>
	      Lorem Ipsum Ingredients
	    </div>
	  </div>

	  <div class="media">
	    <a class="pull-left" href="#">
	      <img class="media-object" src="assets/images/64test.svg" alt="">
	    </a>
	    <div class="media-body">
	      <h4 class="media-heading">Recipe 3</h4>
	      Lorem Ipsum Ingredients
	    </div>
	  </div>	
  </div>
</div>

<?php 
}
?>
