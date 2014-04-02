<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Search Results</h3>
	</div>
	<div class="panel-body category-box">

		<ul class="media-list">
<?php if(is_null($searchValues) == TRUE){
			echo "Sorry there are no results for '". $searchTerm."'";
		}
		else{
			foreach($searchValues as $searchValue) {?>
			<li class="media recipe_list"><a class="pull-left"
				href="<?php echo site_url('recipe/'.$searchValue->getID()); ?>"> <img
					class="category-media-object"
					src="<?php echo base_url('assets/images/')."/".$searchValue->getImage();?> "
					alt="">
			</a> <span class="media-body"> <a
					href="<?php echo site_url('recipe/'.$searchValue->getID()); ?>">
						<h4 class="media-heading"><?php echo $searchValue->getTitle();?></h4>
				</a> <span class="button-box pull-right">
						<button class="btn btn-primary" name='Cook'
							value='Cook <?php echo $searchValue->getTitle(); ?>'
							onclick="window.location='<?php echo site_url('recipe/'.$searchValue->getID()) ?>';">Cook</button>
				</span>
					<?php
				$sessionData = $this->session->all_userdata ();

					foreach ( $searchValue->getIngredientPools () as $pool ) {
						if ($pool->getDifficulty () == $sessionData ['viewType']) {
							?>
							<?php
							$ingredList = "<ul>";
							foreach ( $pool->getIngredients () as $ingredient ) {
									$ingredList = $ingredList . " </li><li>" . $ingredient;
							}?>
								<a href="#"
								data-html="true" data-toggle="tooltip" data-placement="bottom"
								title="<?php echo $ingredList ?></li>
						
						</ul>">Ingredients... <span class="glyphicon glyphicon-info-sign"> </span></a>
							<?php
						}
					}
					?>
					</span>

			</li>
				<?php } ?>
			</ul>
			<?php } ?>
	</div>
</div>
