<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo $searchCategory; ?></h3>
	</div>
	<div class="panel-body category-box">

		<ul class="media-list">

			<?php foreach($category_items as $category_item) {?>
			<li class="media recipe_list"><a class="pull-left"
				href="<?php echo site_url('recipe/'.$category_item->getID()); ?>"> <img
					class="thumbnail category-media-object"
					alt="<?php echo $category_item->getImageAlt()?>"
					src="<?php echo base_url('assets/images/')."/".$category_item->getImage();?>">
			</a> <span class="media-body"> <a
					href="<?php echo site_url('recipe/'.$category_item->getID()); ?>">
						<h4 class="media-heading"><?php echo $category_item->getTitle();?></h4>
				</a>
					<p><?php echo $category_item->getDescription(); ?></p>
					<div class="servings">Serves <?php echo $category_item->getServings();?></div>
					<span class="button-box pull-right">
						<button class="btn btn-primary" name='Cook'
							value='Cook <?php echo $category_item->getTitle(); ?>'
							onclick="window.location='<?php echo site_url('recipe/'.$category_item->getID()) ?>';">Cook</button>
				</span>
						<?php
				$sessionData = $this->session->all_userdata ();
				?>
						 <?php
				foreach ( $category_item->getIngredientPools () as $pool ) {
					if ($pool->getDifficulty () == $sessionData ['viewType']) {
						$ingredList = "<ul>";
						foreach ( $pool->getIngredients () as $ingredient ) {
							$ingredList = $ingredList . " </li><li>" . $ingredient;
						}
						?>
									<a href="#" data-html="true" data-toggle="tooltip"
					data-placement="bottom" title="<?php echo $ingredList ?></li>
		
		</ul>
		">Ingredients... <span class="glyphicon glyphicon-info-sign"> </span></a>
								<?php
					}
				}
				?>
						</span>

		</li>
		</li>
			<?php } ?>
		</ul>

	</div>
</div>
