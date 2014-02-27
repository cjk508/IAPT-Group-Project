<script type="text/javascript"
	src="<?php echo base_url('assets/js/jquery.totemticker.js'); ?>"></script>

<script type="text/javascript">
$(document).ready(function(){

	$('#collapseOne').on('hidden.bs.collapse', function () {
		  $("#preparation").css({"max-height": "60%"});
	}); 
	$('#collapseOne').on('shown.bs.collapse', function () {
		  $("#preparation").css({"max-height": "20%"});
	}); 

	var current = $("#steps_ticker").children(":first"); 
	var color = current.css("color"); 
	var highlight = "blue"; 
	current.css( "color", highlight );

	$("#next_step").click(function() {
		if (!current.next().is('li')) {
			return; 
		}
		next = current.next(); 
		next.css( "color", highlight );
		current.css( "color", color );

		$('#preparation').animate({
	        scrollTop: 
	            next.offset().top - $('#preparation').offset().top + $('#preparation').scrollTop() - $('#preparation').height()/2 
	    }, 500);
		current = next; 
	}); 
	$("#previous_step").click(function() {
		if (!current.prev().is('li')) {
			return; 
		}
		prev = current.prev(); 
		prev.css( "color", highlight );
		current.css( "color", color );

		$('#preparation').animate({
	        scrollTop: 
	        	prev.offset().top - $('#preparation').offset().top + $('#preparation').scrollTop() - $('#preparation').height()/2 
	    }, 500);
		current = prev; 
	});

	$('#reset_steps').click(function() {
		current.css( "color", color );
		$('#preparation').animate({
	        scrollTop: 
	        	0
	    }, 500);
		current = $("#steps_ticker").children(":first"); 
		current.css( "color", highlight );
	}); 

	$("#steps_ticker li").click(function(event) {
		alert(event.target.id); 		
		$(event.target.id).css("color", "red"); 
	}); 

	
});
</script>


<div id="recipe-contents">
	<div class="panel panel-default" id="main-panel">
		<h3><?php echo  $recipe_item->getTitle()?> <small><?php
		
		foreach ( $recipe_item->getCategory () as $cat ) {
			echo $cat . " ";
		}
		?></small>
		</h3>
		<form class="btn-group" action='#' method="post">
			<button class="btn btn-primary" name="viewType" value='<?php echo STEP ?>'>Step-by-Step</button>
		<button class="btn btn-primary" name="viewType" value='<?php echo SEGMENTED ?>'>Segmented</button>
		<button class="btn btn-primary" name="viewType" value='<?php echo NARRATIVE ?>'>Narrative</button>
		</form>
		<?php
		$sessionData = $this->session->all_userdata ();
		if (typeIsSelected($sessionData)) {
			?>
			<p>No user type</p>
		<?php
		} else {
			?>
			<p><?php echo getUserType($sessionData) ?></p>
		<?php
		}
		?>
		<div class="panel-group" id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading ">
					<h4 class="panel-title">
						<span class="glyphicon glyphicon-arrow-up"></span> <a
							data-toggle="collapse" data-parent="#accordion"
							href="#collapseOne">Ingredients</a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in">
					<div class="panel-body">
						<img alt="test"
							src="<?php echo base_url('assets/images/')."/".$recipe_item->getImage()?>">
						
						<div id="ingredients" class="text-right">
						
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
			</div>

			
			<?php
			if (!typeIsSelected($sessionData) or isNarrative($sessionData)) {
				?>
			<div class="panel panel-default" id="preparation">
				<div class="panel-heading navbar-example">
					<h3 class="panel-title">Preparation</h3>
				</div>
				<div class="panel-body">
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
				</div>
				<ol class="text-center ticker" id="steps_ticker">
				
					<?php
					
				foreach ($recipe_item->getSegmentedMethod () as $id => $step) {
					?>
					
						<li id="Step-<?php echo $id ?>"><?php echo $step ?><span class="glyphicon glyphicon-ok-circle"></span></li>
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
				?><?php

				foreach ( $recipe_item->getSegmentedMethod () as $step ) {
					?>
					
						<li><?php echo $step ?></li>
					<?php
				}
				?><?php

				foreach ( $recipe_item->getSegmentedMethod () as $step ) {
					?>
					
						<li><?php echo $step ?></li>
					<?php
				}
				?>
					</ol>
			</div>
			<button type="button" class="btn btn-default" id="next_step">Next</button>
			<button type="button" class="btn btn-default" id="previous_step">Previous</button>
			<button type="button" class="btn btn-default" id="reset_steps">Go to
				top</button>
		</div>
				<?php }
			?>
		</div>
</div>
</div>