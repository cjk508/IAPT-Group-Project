<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $searchCategory; ?></h3>
	</div>
	<div class="panel-body category-box">

		<ul class="media-list">

			<?php foreach($category_items as $category_item) {?>
			<li class="media recipe_list">
				<a class="pull-left" href="<?php echo site_url('recipe/'.$category_item->getID()); ?>"> <img class="thumbnail category-media-object"
					src="<?php echo base_url('assets/images/')."/".$category_item->getImage();?> " alt="">
				</a>
				<span class="media-body">
					<a href ="<?php echo site_url('recipe/'.$category_item->getID()); ?>"> <h4 class="media-heading"><?php echo $category_item->getTitle();?></h4></a>
					<span class="button-box pull-right">
						<button class="btn btn-primary" name = 'Cook' value = 'Cook <?php echo $category_item->getTitle(); ?>' onclick="window.location='<?php echo site_url('recipe/'.$category_item->getID()) ?>';">Cook</button>
					</span>
					<?php
					$sessionData = $this->session->all_userdata ();
					foreach ( $category_item->getIngredientPools () as $pool ) {
						if ($pool-> getDifficulty() == $sessionData['viewType']) { ?>
						<ul>

							<?php
							$ingredientCount = 0;
							$ingredList = "";
							foreach ( $pool->getIngredients () as $ingredient ) {
								if ($ingredientCount < 4){
								?>

								<li><?php echo $ingredient?></li>
								<?php
									$ingredientCount++;
								}
								else{
									$ingredList = $ingredList ."\n". $ingredient;
									$ingredientCount++;
								}
							}
							if ($ingredientCount >= 4){ ?>
							<li><a class="glyphicon glyphicon-info-sign" href="#" data-toggle="tooltip"
									data-placement="bottom" title="<?php echo $ingredList ?>"></a></li>
							<?php } ?>
						</ul>
						<?php
						}
					}
					?>
				</span>
				
			</li>
			<?php } ?>
		</ul>

	</div>
</div>
