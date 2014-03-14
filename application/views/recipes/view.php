<div id="recipe-contents">
	<div class="panel panel-default" id="main-panel">
<?php
$sessionData = $this->session->all_userdata ();
$GLOBALS['user_type'] = getUserType ( $sessionData );

function isSelected($type) {
	if ($type === $GLOBALS['user_type']) {
		return "active"; 
	}
	return ""; 
}
?>
		<h3><?php echo  $recipe_item->getTitle()?> <small>In: <?php
		foreach ( $recipe_item->getCategory () as $cat ) {
			echo $cat . "; ";
		}
		?></small>
		</h3>
		<form class="btn-group" action='#' method="post">
		
			<button class="btn btn-primary <?php echo isSelected(STEP)?>" name="viewType"
				value='<?php echo STEP ?>'>Step-by-Step</button>
			<button class="btn btn-primary <?php echo isSelected(SEGMENTED)?>" name="viewType"
				value='<?php echo SEGMENTED ?>'>Segmented</button>
			<button class="btn btn-primary <?php echo isSelected(NARRATIVE)?>" name="viewType"
				value='<?php echo NARRATIVE ?>'>Narrative</button>
		</form>
		<?php
		require_once 'ingredients_panel.php';
		require_once 'preparation_panel.php';
		?>
</div>
</div>