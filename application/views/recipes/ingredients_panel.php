<script type="text/javascript">
$(document).ready(function(){	
	function toggleDecoration(id) {
		step = $("#" + id); 
		checkbox = step.find("input"); 
		text = step.find("p"); 
		decoration = text.css("text-decoration");
		if(decoration.indexOf("undefined") != -1 || decoration.indexOf("none") != -1) {
			checkbox.prop('checked', true);
			text.css("text-decoration", "line-through"); 
		} else {
			checkbox.prop('checked', false);
			text.css("text-decoration", "none"); 
		}
	}	
	$('.ingr').click(function(event) {
		var ingr_id = $(this).attr('id');
		toggleDecoration(ingr_id); 
	});
	$("#collapseOne").css({"max-height": $(window).height()/3.25});
	$(".ingr-list .panel, .thumbnail").css({"max-height": $(window).height()/3.5});
	$(".thumbnail img").css({"max-height": $(window).height()/3.65});
	//$(".ingr-list").css({"height": $(window).height()/4});
});
</script>

<div class="panel-group ingr-panel" id="accordion">
	<div class="panel panel-default">
		<div class="panel-heading ">
			<h4 class="panel-title">
				<span class="glyphicon glyphicon-arrow-up"></span> <a
					data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Ingredients</a>
			</h4>
		</div>
		<div id="collapseOne" class="panel-collapse collapse in">
			<div class="panel-body">
				<div id="ingredients" class="row">
					<div class="col-md-4">
						<div class="thumbnail">
							<img class="img-rounded"
								alt="<?php echo $recipe_item->getImageAlt()?>"
								src="<?php echo base_url('assets/images/')."/".$recipe_item->getImage()?>">

						</div>
					</div>
					<div class="col-md-8 ingr-list">
						<div class="panel panel-default">
							<div class="panel-body">
				<?php
				$pools = $recipe_item->getIngredientPool ( $GLOBALS ['user_type'] );
				$count = - 1;
				foreach ( $pools as $pool ) {
					?>
					<h3>Ingredients for <?php echo $pool-> getTitle(); $count++; ?></h3>					
					<?php
					foreach ( $pool->getIngredients () as $id => $ingredient ) {
						?><div class="ingr" id="Ingr-<?php echo $id + $count ?>">
									<div class="input-group blue-glow">
										<span class="input-group-addon"> <input
											id="check-<?php echo $id + $count ?>" type="checkbox"
											class="ingr-checkbox">
										</span> <a href="#"><p class="form-control"><?php echo $ingredient?></p></a>
									</div>
								</div>
		<?php
					}
				}
				?>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>