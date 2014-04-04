<script type="text/javascript">
$(document).ready(function(){
	$('#voice-toggle').click(function() {
		$('#voice-toggle').tooltip('hide'); 
		$('#voice-toggle').popover('show'); 
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
	
	$('#voice-toggle').hover(function() {
		$('#voice-toggle').tooltip('show'); 
	}); 
});
</script>

<div id="recipe-contents">
	<div class="panel panel-default" id="main-panel">
<?php
$sessionData = $this->session->all_userdata ();
$GLOBALS ['user_type'] = getUserType ( $sessionData );
function isSelected($type) {
	if ($type === $GLOBALS ['user_type']) {
		return "active";
	}
	return "";
}
?>
		<h3><?php echo  $recipe_item->getTitle()?> <small>
				Serves <?php echo $recipe_item->getServings();?> ;
				<span class="glyphicon glyphicon-tags"> </span>   <?php
				foreach ( $recipe_item->getCategory () as $cat ) {
					?>
					<a href='<?php echo base_url()?>category/<?php echo $cat; ?>'> 
					
					<?php
					echo $cat;
					if (sizeof ( $recipe_item->getCategory () ) != 1 and $forCount < sizeof ( $recipe_item->getCategory () )) {
						echo '; ';
					}
					?>

					</a>
				<?php
				}
				?>
				</small>
			<button id="voice-toggle" type="button" class="btn btn-default pull-right"
				data-toggle="button" data-animation="true" data-placement="right" data-content="Try saying 'next step'." title="This experimental feature will allow you to change the current step through voice commands. ">Enable
				voice control</button>
		</h3>
		<?php
		// Load the ingredients panel
		require_once 'ingredients_panel.php';
		if (typeIsSelected ( $sessionData ) or ! isNarrative ( $sessionData )) {
			?>
		<?php
		}
		// Load the preparation panel
		require_once 'preparation_panel.php';
		?>
</div>
</div>