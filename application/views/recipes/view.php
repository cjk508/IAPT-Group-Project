<!-- Beginning the body of a recipe. -->
<script type="text/javascript">
$(document).ready(function(){
	// Enable experimental voice recognition functionality. 
	// It uses the Annyang library. 
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
				    'next': function() {
				    	$("#next_step").trigger("click");
				    }, 'previous': function() {
				    	$("#previous_step").trigger("click");
				    }, 'go to start': function() {
				    	$("#reset_steps").trigger("click");
				    }, 'go to top': function() {
				    	$("#reset_steps").trigger("click");
				    }
				  };
				  annyang.addCommands(commands);
				  annyang.setLanguage('en');
				  annyang.debug();
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


<!-- Start recipe panel -->
<div id="recipe-contents">
	<div class="panel panel-default" id="main-panel">
<?php
$sessionData = $this->session->all_userdata ();
$GLOBALS ['user_type'] = getUserType ( $sessionData );
/**
 * A helper method to determine whether a user type is selected. Useful for rendering
 * HTML. 
 * 
 * @param string $type the target type
 * @return string "active" if selected, empty string otherwise
 */
function isSelected($type) {
	if ($type === $GLOBALS ['user_type']) {
		return "active";
	}
	return "";
}
?>
<!-- Header of recipe, containing title, categories, preparation time, voice control button -->
		<h3><?php echo  $recipe_item->getTitle()?> <small> <span
				class="glyphicon glyphicon-tags"> </span>   <?php
				// Recipe category. 
				foreach ( $recipe_item->getCategory () as $cat ) {
					$display_name = $cat->getCategoryDisplayName ();
					$url = $cat->getCategoryName ();
					?>
					<a href='<?php echo base_url()?>category/<?php echo $url; ?>'> 
					
					<?php
					echo $display_name . ";";
					if (sizeof ( $display_name ) != 1 and $forCount < sizeof ( $display_name )) {
						echo '; ';
					}
					?>
					</a> Serves <?php echo $recipe_item->getServings();?>;
					
				<?php
				}
				?>
				 <span class="glyphicon glyphicon-time"></span> <?php echo $recipe_item->getRecipeCookTime()?> minutes to prepare.</small>
			<?php if (!isNarrative ( $sessionData )) {?>				
				<!-- Enable voice control button -->
				<button id="voice-toggle" type="button"
				class="btn btn-default pull-right" data-toggle="button"
				data-animation="true" data-placement="right"
				data-content="Try saying 'next' or 'previous'."
				data-trigger="manual"
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
<!-- End recipe panel.  -->