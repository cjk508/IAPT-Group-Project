<script type="text/javascript">
$(document).ready(function(){
	$(".category-box").css({"max-height": $(window).height()*0.83});
	 $(".ingr-tooltip").tooltip();
});
</script>
<?php
$CookingTimes = array ();
$Servings = array ();
$AllCategories = array ();
?>
<div class="panel panel-default category-box pull-right">
	<div class="panel-heading">
		<h3 class="" style="margin-bottom: 0px;">Category - <?php echo $searchCategory; ?></h3>
	</div>
	<div class="panel-body category-body">
		<ul class="media-list">
			<?php foreach($category_items as $category_item) {?>
			<li
				class="recipe_list row blue-glow <?php
				$tempAllCategories = $category_item->getCategory ();
				foreach ( $tempAllCategories as $tempAllCategory ) {
					echo $tempAllCategory->getCategoryName () . ' ';
				}
				echo ' Serves' . $category_item->getServings () . ' Time' . $category_item->getRecipeCookTime ();
				
				array_push ( $CookingTimes, $category_item->getRecipeCookTime () );
				array_push ( $AllCategories, $tempAllCategory->getCategoryName () );
				array_push ( $Servings, $category_item->getServings () );
				?>">
				<div class="col-md-2">
					<a class="pull-left"
						href="<?php echo site_url('recipe/'.$category_item->getID()); ?>">
						<img class="thumbnail category-media-object blue-glow"
						alt="<?php echo $category_item->getImageAlt()?>"
						src="<?php echo base_url('assets/images/')."/".$category_item->getImage();?>">
					</a>
				</div>
				<div class="col-md-8">
					<a
						href="<?php echo site_url('recipe/'.$category_item->getID()); ?>">
						<h4 class="media-heading"><?php echo $category_item->getTitle();?></h4>
					</a>
					<p><?php echo $category_item->getDescription(); ?></p>
					<p>
						<i>Serves <?php echo $category_item->getServings();?></i>
					</p>
					 <?php
				$sessionData = $this->session->all_userdata ();
				foreach ( $category_item->getIngredientPools () as $pool ) {
					if ($pool->getDifficulty () == $sessionData ['viewType']) {
						$ingredList = "<ul>";
						foreach ( $pool->getIngredients () as $ingredient ) {
							$ingredList = $ingredList . "<li>" . $ingredient . "</li>";
						}
						?>
									<a href="#" class="ingr-tooltip" data-html="true"
						data-toggle="tooltip" data-placement="auto bottom"
						data-container="body" title="<?php echo $ingredList."</ul>"?>">Ingredients...
						<span class="glyphicon glyphicon-info-sign"> </span>
					</a>
								<?php
					}
				}
				?>
				</div>
				<div class="col-md-2">
					<button class="btn btn-primary category-button" name='Go to individual recipe page'
						value='Cook <?php echo $category_item->getTitle(); ?>'
						onclick="window.location='<?php echo site_url('recipe/'.$category_item->getID()) ?>';">Cook</button>
				</div>
			</li>
			<?php } ?>
		</ul>

	</div>
</div>
<div class="panel panel-default filter-box">
	<div class="panel-heading">
		<h3 style="margin-bottom: 0px;">Filtering Options</h3>
	</div>
	<?php
	// Remove all duplicate values for the array, leaving just one instance of each filtering option
	$AllCategories = array_unique ( $AllCategories );
	$Servings = array_unique ( $Servings );
	$CookingTimes = array_unique ( $CookingTimes );
	?>
	<div class="panel-body ">
		<h4>Category</h4>
		<ul class="list-group">
			<?php
			
foreach ( $AllCategories as $AllCategory ) {
				if ($AllCategory != $comparisonCategory) {
					?>
				<div class="input-group">
				<span class="input-group-addon"> <input type="checkbox"
					value="<?php echo $AllCategory; ?>"
					onclick="toggleFilter('<?php echo $AllCategory; ?>', this)"> <?php echo $AllCategory; ?>
				      </span>
			</div>
			<?php
				
}
			}
			?>
		</ul>
		<h4>Servings</h4>
		<ul class="list-group">
			<?php foreach ($Servings as $Serving) {?>
				<div class="input-group">
				<span class="input-group-addon"> <input type="checkbox"
					value="<?php echo 'Serves'.$Serving; ?>"
					onclick="toggleFilter('<?php echo 'Serves'.$Serving; ?>', this)"> <?php echo $Serving; ?>
				      </span>
			</div>
			<?php } ?>
		</ul>
		<h4>Prep Time</h4>
		<ul class="list-group">
			<?php foreach ($CookingTimes as $CookingTime) {?>
				<div class="input-group">
				<span class="input-group-addon"> <input type="checkbox"
					value="<?php echo 'Time'.$CookingTime; ?>"
					onclick="toggleFilter('<?php echo 'Time'.$CookingTime;?>', this)"> <?php echo $CookingTime. " minutes"; ?>
				      </span>
			</div>
			<?php } ?>
		</ul>
	</div>
</div>

<script type="text/javascript">
var categoryLog = new Array();
var servesLog = new Array();
var timeLog = new Array();
var checkedLog = new Array();
function toggleFilter(className, checkBoxObject){
	if (checkBoxObject.checked){
		if (checkBoxObject.value.indexOf( "Serves") > -1){
			servesLog.push(checkBoxObject.value);	
		}
		else if (checkBoxObject.value.indexOf("Time") > -1){
			timeLog.push(checkBoxObject.value);	
		}
		else{
			categoryLog.push(checkBoxObject.value);	
		}
	}
	else{
		removeValueFromLog(checkBoxObject.value);	
	}

	var elements = document.getElementsByClassName("recipe_list");
	for (var i = 0; i < elements.length; i++) {
		filterItem(elements[i]);
	}	
}

function filterItem(recipe){
	var classList = recipe.className.split(/\s+/);
	var visible = [false,false,false];
	for (var i = classList.length - 1; i >= 0; i--) {
		if (categoryLog.length > 0) {	
			for (var j = categoryLog.length - 1; j >= 0; j--) {	
				if (categoryLog[j] == classList[i]){
					visible[0] = true;
				}
			}
		}
		else {
			visible[0] = true;
		}
		if (servesLog.length > 0) {	
			for (var j = servesLog.length - 1; j >= 0; j--) {	
				if (servesLog[j] == classList[i]){
					visible[1] = true;
				}
			}
		}
		else {
			visible[1] = true;
		}
		if (timeLog.length > 0) {	
			for (var j = timeLog.length - 1; j >= 0; j--) {	
				if (timeLog[j] == classList[i]){
					visible[2] = true;
				}
			}
		}
		else {
			visible[2] = true;
		}
	}
	if (visible[0] == true && visible[1] == true && visible[2] == true){
		$(recipe).removeClass("hidden");
	}
	else{
		if (categoryLog.length == 0 && servesLog.length == 0 && timeLog.length == 0 ){
			$(recipe).removeClass("hidden");
		}
		else{
			$(recipe).addClass("hidden");	
		}
	}
}

function removeValueFromLog(cbValue){
	var deletedOne = false;
	for (var i = categoryLog.length - 1; i >= 0; i--) {
		if (categoryLog[i] == cbValue && deletedOne == false){
			categoryLog.splice(i, 1);
			deletedOne = true;
		}
	};
	if (deletedOne == false){
		for (var i = servesLog.length - 1; i >= 0; i--) {
			if (servesLog[i] == cbValue && deletedOne == false){
				servesLog.splice(i, 1);
				deletedOne = true;
			}
		};
		if (deletedOne == false){
			for (var i = timeLog.length - 1; i >= 0; i--) {
				if (timeLog[i] == cbValue && deletedOne == false){
					timeLog.splice(i, 1);
					deletedOne = true;
				}
			};
		}
	}
}
</script>
