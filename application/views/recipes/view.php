
<script type="text/javascript"
	src="<?php echo base_url('assets/js/jquery.totemticker.js'); ?>"></script>

<script type="text/javascript">
$(document).ready(function(){

	$('#collapseOne').on('hidden.bs.collapse', function () {
		  $("#preparation").css({"max-height": "60%"});
	}); 
	$('#collapseOne').on('shown.bs.collapse', function () {
		  $("#preparation").css({"max-height": "30%"});
	}); 
});
</script>


<div id="recipe-contents">
	<div class="panel panel-default" id="main-panel">
		<h3><?php echo  $recipe_item->getTitle()?> <small><?php foreach ($recipe_item->getCategory() as $cat) {
			echo $cat . " "; 
		}?></small></h3>
		<form class="btn-group" action='#' method="post">
			<button class="btn btn-primary" name="viewType" value='Step-by-Step'>Step-by-Step</button>
			<button class="btn btn-primary" name="viewType" value='Segmented'>Segmented</button>
			<button class="btn btn-primary" name="viewType" value='Narrative'>Narrative</button>
		</form>
		<?php
		$sessionData = $this->session->all_userdata ();
		if ($sessionData ['viewType'] == 'null') {
			?>
			<p>No user type</p>
		<?php
		} else {
			?>
			<p><?php echo $sessionData['viewType'] ?></p>
		<?php
		}
		?>
		<div class="panel-group" id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading ">
					<h4 class="panel-title">
<<<<<<< HEAD
						<a data-toggle="collapse" data-parent="#accordion"
						href="#collapseOne">Ingredients</a>
=======
						<span class="glyphicon glyphicon-arrow-up"></span> <a
							data-toggle="collapse" data-parent="#accordion"
							href="#collapseOne">Ingredients</a>
>>>>>>> 0f8886da2fde7f5f7e9344876a3ee0bcd4730361
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in">
					<div class="panel-body">
						<img alt="test"
						src="<?php echo base_url('assets/images/')."/".$recipe_item->getImage()?>">
						<p>
							<?php
							foreach ( $recipe_item->getIngredientPools () as $pool ) {
								?>
<<<<<<< HEAD

								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								<h3><?php echo $pool-> getDifficulty()?></h3>
								<ul>

									<?php
									
									foreach ( $pool->getIngredients () as $ingredient ) {
										?>
										<li><?php echo $ingredient?></li>
										<?php
									}
=======
						<h3><?php echo $pool-> getDifficulty()?></h3>
						<ul>
<?php
								foreach ( $pool->getIngredients () as $ingredient ) {
>>>>>>> 0f8886da2fde7f5f7e9344876a3ee0bcd4730361
									?>
								</ul>
								<?php
							}
							?>

						</div>
					</div>
				</div>
				<p>
					<?php echo $recipe_item->getNarrativeMethod()?>
					
				</p>
			</div>
<<<<<<< HEAD



		</div>
	</div>
=======

			
			<?php
			if ($sessionData ['viewType'] == 'null' or $sessionData ['viewType'] == 'Narrative') {
				?>
			<div class="panel panel-default" id="preparation" data-spy="scroll"
				data-target=".navbar-example">
				<div class="panel-heading navbar-example">
					<h3 class="panel-title">Preparation</h3>
					<p><?php echo $recipe_item-> getNarrativeMethod()?>
					<p><?php echo $recipe_item-> getNarrativeMethod()?>
					<p><?php echo $recipe_item-> getNarrativeMethod()?>
					<p><?php echo $recipe_item-> getNarrativeMethod()?>
					<p><?php echo $recipe_item-> getNarrativeMethod()?>
				</div>
			</div>
					
				<?php } else { ?>
					<div class="panel panel-default" id="preparation" data-spy="scroll"
				data-target=".navbar-example">
				<div class="panel-heading navbar-example">
					<h3 class="panel-title">Preparation</h3>
					<ol id="ticker">
				
					<?php foreach ($recipe_item->getSegmentedMethod() as $step) {?>
					
						<li><?php echo $step ?></li>
					<?php
				}
				?>
					<?php foreach ($recipe_item->getSegmentedMethod() as $step) {?>
					
						<li><?php echo $step ?></li>
					<?php
				}
				?>
					<?php foreach ($recipe_item->getSegmentedMethod() as $step) {?>
					
						<li><?php echo $step ?></li>
					<?php
					}
					?>
					</ol>
				</div>
			</div>
				<?php }
			?>
		</div>
	</div>
</div>
>>>>>>> 0f8886da2fde7f5f7e9344876a3ee0bcd4730361
