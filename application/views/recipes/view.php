<script type="text/javascript">
$(document).ready(function(){
	// Enable experimental voice recognition functionality. 
	$('#voice-toggle').click(function() {
		$(this).tooltip('toggle'); 
		$(this).popover('toggle'); 		
		if($(this).hasClass('active')) {
			annyang.abort();  
			$(this).popover('hide');
		} else {		
			if (annyang) {		
				  // Annyang Voice Commands
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
			setTimeout(function() {
				$('#voice-toggle').popover('hide'); 
			}, 3000);
		}
	});
	
	$('#voice-toggle').hover(function() {
		$('#voice-toggle').tooltip('toggle'); 
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
			<?php if (!isNarrative ( $sessionData )) {?>				
				<button id="voice-toggle" type="button"
					class="btn btn-default pull-right" data-toggle="button"
					data-animation="true" data-placement="right"
					data-content="Try saying 'next step'." data-trigger="manual"
					title="This experimental feature will allow you to change the current step through voice commands. ">
					<span class="glyphicon glyphicon-record"></span> Enable voice
					control
				</button>
			<?php }?>
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