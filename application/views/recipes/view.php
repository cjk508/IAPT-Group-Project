
<h2><?php echo  $recipe_item->getTitle()?></h2>
<p><?php echo $recipe_item->getCategory()?></p>



<?php
foreach ( $recipe_item->getIngredientPools () as $pool ) {
	?>
<h2><?php echo $pool-> getDifficulty()?></h2>
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

<p><?php echo $recipe_item->getNarrativeMethod() ?></p>
<p><?php var_dump($recipe_item->getSegmentedMethod()) ?></p>

