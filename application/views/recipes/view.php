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
		<h3><?php echo  $recipe_item->getTitle()?> <small><span class = "glyphicon glyphicon-tags"> </span>   <?php
		foreach ( $recipe_item->getCategory () as $cat ) {
			echo $cat . "; ";
		}
		?></small>
		</h3>
		<?php
		require_once 'ingredients_panel.php';
		require_once 'preparation_panel.php';
		?>
</div>
</div>