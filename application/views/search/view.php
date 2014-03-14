<script type="text/javascript">
	
</script>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Search Results</h3>
	</div>
	<div class="panel-body category-box">

		<ul class="media-list">

			<?php foreach($searchValues as $searchValue) {?>
			<li class="media">
				<a class="pull-left" href="<?php echo site_url('recipe/'.$searchValue->getID()); ?>"> <img class="category-media-object"
					src="<?php echo $searchValue->getImage();?> " alt="">
				</a>
				<span class="media-body">
					<a href ="<?php echo site_url('recipe/'.$searchValue->getID()); ?>"> <h4 class="media-heading"><?php echo $searchValue->getTitle();?></h4></a>
					<span class="button-box pull-right">
						<button class="btn btn-primary" name = 'Cook' value = 'Cook <?php echo $searchValue->getTitle(); ?>' onclick="window.location='<?php echo site_url('recipe/'.$searchValue->getID()) ?>';">Cook</button>
						<button class="btn btn-primary">Take a Peek</button>
					</span>
					<?php
					$sessionData = $this->session->all_userdata ();
					echo $sessionData['viewType'];
					foreach ( $searchValue->getIngredientPools () as $pool ) {
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
