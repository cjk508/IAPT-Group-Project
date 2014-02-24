

<script type="text/javascript">
	
</script>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Categories</h3>
	</div>
	<div class="panel-body category-box">

		<ul class="media-list">

			<?php foreach($category_items as $category_item) {?>
			<li class="media">
				<a class="pull-left" href="#"> <img class="media-object"
					src="<?php echo $category_item->getImage();?> " alt="" style = "max-width:150px; height:auto;">
				</a>
				<span class="media-body">
					<h4 class="media-heading"> <?php echo $category_item->getTitle(); ?></h4>
					<span class="button-box pull-right">
						<button class="btn btn-primary">Cook</button>
						<button class="btn btn-primary">Take a Peek</button>
					</span>
					<?php
					$sessionData = $this->session->all_userdata ();
					echo $sessionData['viewType'];
					foreach ( $category_item->getIngredientPools () as $pool ) {
						if ($pool-> getDifficulty() == $sessionData['viewType']) { ?>
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
				</span>
				
			</li>
			<?php } ?>
		</ul>

	</div>
</div>
