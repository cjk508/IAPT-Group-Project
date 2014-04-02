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
				Serves <?php echo $recipe_item->getServings();?>
				<span class="glyphicon glyphicon-tags"> </span>   <?php
				foreach ( $recipe_item->getCategory () as $cat ) { ?>
					<a href='<?php echo base_url()?>category/<?php echo $cat; ?>'> 
					
					<?php 
						echo $cat;
						if ( sizeof($recipe_item->getCategory())!= 1  and $forCount < sizeof($recipe_item->getCategory()) ){
							echo '; ';
						}
					?>

					</a>
				<?php 
				}
				?>
				</small>
		</h3>
		<?php
		// Load the ingredients panel
		require_once 'ingredients_panel.php';
		// Load the preparation panel
		require_once 'preparation_panel.php';
		?>
</div>
</div>