<script type="text/javascript">
$(document).ready(function(){
	
	function toggleDecoration(id) {
		step = $(id); 
		if(step.is(':checkbox')) {
			text = step.parent().next(); 
			decoration = text.css("text-decoration");
			if(decoration.indexOf("undefined") != -1 || decoration.indexOf("none") != -1) {
				step.prop('checked', true);
				text.css("text-decoration", "line-through"); 
			} else {
				step.prop('checked', false);
				text.css("text-decoration", "none"); 
			}
		} else {
			if(decoration.indexOf("undefined") != -1 || decoration.indexOf("none") != -1) {
				step.prev().first().prop('checked', true);
				step.css("text-decoration", "line-through"); 
			} else {
				step.prev().first().prop('checked', false);
				step.css("text-decoration", "none"); 
			}
		}
	}
	
	$('.input-group input,p').click(function(event) {
		step = $("#" + event.target.id); 
		decoration = step.css("text-decoration"); 
		toggleDecoration(step); 
	});
});
</script>

<div class="panel-group" id="accordion">
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

						<a href="#" class="thumbnail"> <img class="img-rounded" alt="test"
							src="<?php echo base_url('assets/images/')."/".$recipe_item->getImage()?>">

						</a>
					</div>
					<div class="col-md-8 ingr-list">
						<div class="panel panel-default">
							<div class="panel-body">
								<h3>Ingredients:</h3>					
				<?php
				$pool = $recipe_item->getIngredientPool ( $GLOBALS ['user_type'] );
				foreach ( $pool->getIngredients () as $id => $ingredient ) {
					?><div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon"> <input
											id="check-<?php echo $id ?>" type="checkbox"
											class="ingr-checkbox">
										</span> <a href="#"><p class="form-control"
												id="Ingr-<?php echo $id ?>"><?php echo $ingredient?></p></a>
									</div>
								</div>
		<?php
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