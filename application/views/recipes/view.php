

<script type="text/javascript">
	
</script>

<div id="recipe-contents">
	<div class="panel panel-default" id="main-panel">
		<h1><?php echo  $recipe_item->getTitle()?></h1>
		<form class="btn-group" action='#' method="post">
			<button class="btn btn-primary" name="viewType" value='Step-by-Step'>Step-by-Step</button>
			<button class="btn btn-primary" name="viewType" value='Segmented'>Segmented</button>
			<button class="btn btn-primary" name="viewType" value='Narrative'>Narrative</button>
		</form>

		<div class="panel-group" id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading ">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion"
						href="#collapseOne">Ingredients</a>
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

								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								<h3><?php echo $pool-> getDifficulty()?></h3>
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
							?>

						</div>
					</div>
				</div>
				<p>
					<?php echo $recipe_item->getNarrativeMethod()?>
					
				</p>
			</div>



		</div>
	</div>