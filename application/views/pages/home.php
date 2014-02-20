<?php 
/**
* If the session variable has not been set then show the default welcome screen
* otherwise show the normal home screen
*/
	//if ($_COOKIE['viewType'] == 'null'){
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
		echo '<p> Button Pressed: '.$_COOKIE['viewType'].' </p>';
		?>

		<p>
			<form class="btn-group" action = '#' method="post">
				<button class="btn btn-primary" name = "viewType" value = 'Step-by-Step'>Step-by-Step</button>
				<button class="btn btn-primary" name = "viewType" value = 'Segmented'>Segmented</button>
				<button class="btn btn-primary" name = "viewType" value = 'Narrative'>Narrative</button>
			</form>
		</p>
	</div>



<?php
/*}
else{
	echo '<p>'.$_COOKIE['viewType'].'</p>';
?>


<?php 
}*/
?>
