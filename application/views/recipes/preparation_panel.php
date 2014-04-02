<script type="text/javascript">
$(document).ready(function(){
	function animatePreparationTo(element) {
		$('#preparation').animate({
	        scrollTop: 
	        	element.offset().top - $('#preparation').offset().top + $('#preparation').scrollTop() - $('#preparation').height()/2 
	    }, 300);
	}	 
	var current = $("#steps_ticker").children(":first"); 
	var color = current.css("color"); 
	var highlight = "blue"; 
	current.find("a").css( "color", highlight );
	$("#next_step").click(function() {
		if (!current.next().is('li')) {
			return; 
		}
		next = current.next(); 
		next.find("a").css( "color", highlight );
		current.find("a").css( "color", color );
		animatePreparationTo(next); 
		current = next; 
	}); 
	$("#previous_step").click(function() {
		if (!current.prev().is('li')) {
			return; 
		}
		prev = current.prev(); 
		prev.find("a").css( "color", highlight );
		current.find("a").css( "color", color );
		animatePreparationTo(prev); 
		current = prev; 
	});
	$('#reset_steps').click(function() {
		current.find("a").css( "color", color );
		$('#preparation').animate({
	        scrollTop: 
	        	0
	    }, 500);
		current = $("#steps_ticker").children(":first"); 
		current.find("a").css( "color", highlight );
	}); 
	$("#steps_ticker a").click(function(event) {
		step = $("#" + event.target.id); 
		decoration = step.css("text-decoration"); 
		if (decoration.indexOf("undefined") != -1 || decoration.indexOf("none") != -1) {			
			$("#" + event.target.id).css("text-decoration", "line-through"); 
			step.find("span").removeClass("glyphicon-ok-circle"); 
			step.find("span").addClass("glyphicon-ok-sign"); 
		} else {
			$("#" + event.target.id).css("text-decoration", "none"); 
			step.find("span").addClass("glyphicon-ok-circle"); 
			step.find("span").removeClass("glyphicon-ok-sign"); 
		}
	}); 

	$('#collapseOne').on('hidden.bs.collapse', function () {
		  $("#preparation").css({"max-height": "60%"});
		  animatePreparationTo(current); 
	}); 
	$('#collapseOne').on('shown.bs.collapse', function () {
		  $("#preparation").css({"max-height": $(window).height()/5});
		  animatePreparationTo(current); 
	});

	$("#preparation").css({"max-height": $(window).height()/5});

	$(document).keydown(function(e){
	    if (e.keyCode == 40 || e.keyCode == 39) { 
	       $("#next_step").trigger("click");
	    } else if (e.keyCode == 37 || e.keyCode == 38) {
	    	$("#previous_step").trigger("click");
		}
	});
	
	if (annyang) {
	  var commands = {
	    'next step': function() {
	    	$("#next_step").trigger("click");
	    }, 'previous step': function() {
	    	$("#previous_step").trigger("click");
	    }, 'go to top': function() {
	    	$("#reset_steps").trigger("click");
	    }
	  };
	  annyang.addCommands(commands);
	  annyang.start();
	}
});
</script>

<div class="panel panel-default" id="preparation">
	<div class="panel-heading navbar-example">
		<h3 class="panel-title">Preparation: <span class ="steps"> Number of Steps - <?php
			if (isSegmented($sessionData)){
				echo sizeof($recipe_item->getSegmentedMethod());
			}
			else{
				echo sizeof($recipe_item->getStepMethod());	
			}
			?>
		</span></h3>
	</div> 
<?php
if (! typeIsSelected ( $sessionData ) or isNarrative ( $sessionData )) {
	?>
				<script type="text/javascript">$(document).ready(function(){
						$("#preparation").css({"overflow-y": "auto"}); 
					});</script>
	<div class="panel-body">
		<p><?php echo $recipe_item-> getNarrativeMethod()?></p>
	</div>
</div>
<?php
} 

elseif (isSegmented ( $sessionData )) {
	?>	
<script type="text/javascript">$(document).ready(function(){
						$("#preparation").css({"overflow-y": "hidden"}); 
					});</script>

<ol class="text-center ticker" id="steps_ticker">
					<?php
	foreach ( $recipe_item->getSegmentedMethod () as $id => $step ) {
		?>
						<li><a id="Step-<?php echo $id ?>" href="#"><?php echo $step ?><span
			class="glyphicon glyphicon-ok-circle"></span></a></li>
					<?php
	}
	
	?>
	
					</ol>
</div>
<div class="text-center">
	<button type="button" class="btn btn-default" id="previous_step"><span class = "glyphicon glyphicon-chevron-left"></span>Previous</button>
	<button type="button" class="btn btn-default" id="reset_steps"><span class = "glyphicon glyphicon-arrow-up"></span>Go to
		top</button>
	<button type="button" class="btn btn-default" id="next_step">Next<span class = "glyphicon glyphicon-chevron-right"></span></button>
</div>
<?php
} else {
	?>
<script type="text/javascript">$(document).ready(function(){
						$("#preparation").css({"overflow-y": "hidden"}); 
					});</script>

<ol class="text-center ticker" id="steps_ticker">
					<?php
	try {

	foreach ( $recipe_item->getStepMethod () as $id => $step ) {
		?>
						<li><a id="Step-<?php echo $id ?>" href="#"><?php echo $step ?>
							<span class="glyphicon glyphicon-ok-circle"></span></a>
						</li>
					<?php
	}
	}
	catch (Exception $e) {
		echo "No step method available currently.";
	}
	?>
	
					</ol>
</div>
<div class="text-center">
	<button type="button" class="btn btn-default" id="previous_step">Previous</button>
	<button type="button" class="btn btn-default" id="reset_steps">Go to
		top</button>
	<button type="button" class="btn btn-default" id="next_step">Next</button>
</div>
<?php
}
?>