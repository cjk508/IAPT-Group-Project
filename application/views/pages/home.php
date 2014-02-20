<?php 
/**
* If the session variable has not been set then show the default welcome screen
* otherwise show the normal home screen
*/
$sessionData = $this->session->all_userdata();
if ($sessionData['viewType'] == 'null' /*or $sessionData['viewType'] != 'null'*/){
?>
	<style>
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
	    header,footer{
	    	background-color: #FFF;
	    }
	    footer{
	    	position:absolute;
	    	bottom:0;
	    	width:100%;
	    }
	</style>
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

		<p>
			<form class="btn-group" action = '#' method="post">
				<button class="btn btn-primary" name = "viewType" value = 'Step-by-Step'>Step-by-Step</button>
				<button class="btn btn-primary" name = "viewType" value = 'Segmented'>Segmented</button>
				<button class="btn btn-primary" name = "viewType" value = 'Narrative'>Narrative</button>
			</>
		</p>
	</div>



<?php
}
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
