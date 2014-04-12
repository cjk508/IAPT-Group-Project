<script type="text/javascript">
$(document).ready(function(){
	$(".category-box").css({"max-height": $(window).height()/1.5});
	 $(".ingr-tooltip").tooltip();
});
</script>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="" style="margin-bottom: 0px;">Category - <?php echo $searchCategory; ?></h3>
	</div>
	<div class="panel-body category-box">	
		<ul class="media-list">
			<?php foreach($category_items as $category_item) {?>
			<li class="recipe_list row blue-glow">
				<div class="col-md-2">
					<a class="pull-left"
						href="<?php echo site_url('recipe/'.$category_item->getID()); ?>">
						<img class="thumbnail category-media-object blue-glow"
						alt="<?php echo $category_item->getImageAlt()?>"
						src="<?php echo base_url('assets/images/')."/".$category_item->getImage();?>">
					</a>
				</div>
				<div class="col-md-8">
					<a
						href="<?php echo site_url('recipe/'.$category_item->getID()); ?>">
						<h4 class="media-heading"><?php echo $category_item->getTitle();?></h4>
					</a>
					<p><?php echo $category_item->getDescription(); ?></p>
					<p>
						<i>Serves <?php echo $category_item->getServings();?></i>
					</p>
					 <?php
				$sessionData = $this->session->all_userdata ();
				foreach ( $category_item->getIngredientPools () as $pool ) {
					if ($pool->getDifficulty () == $sessionData ['viewType']) {
						$ingredList = "<ul>";
						foreach ( $pool->getIngredients () as $ingredient ) {
							$ingredList = $ingredList . "<li>" . $ingredient . "</li>";
						}
						?>
									<a href="#" class="ingr-tooltip" data-html="true" data-toggle="tooltip"
						data-placement="auto bottom" data-container="body" title="<?php echo $ingredList."</ul>"?>">Ingredients...
						<span class="glyphicon glyphicon-info-sign"> </span>
					</a>
								<?php
					}
				}
				?>
				</div>
				<div class="col-md-2">
					<button class="btn btn-primary" name='Cook Recipe'
						value='Cook <?php echo $category_item->getTitle(); ?>'
						onclick="window.location='<?php echo site_url('recipe/'.$category_item->getID()) ?>';">Cook
						Recipe</button>
				</div>
			</li>
			<?php } ?>
		</ul>

	</div>
</div>
