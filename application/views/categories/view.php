<script type="text/javascript">
$(document).ready(function(){
	$(".category-box").css({"height": $(window).height()*0.78});
	$(".filter-box").css({"min-height": $(".category-box").height()});
	$(".ingr-tooltip").tooltip();
});
</script>
<?php
// filtering arrays being setup
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
			<?php
			foreach($category_items as $category_item) {?>
			<!-- print out each recipe in a list -->
			<li
				class="recipe_list row blue-glow <?php
				$tempAllCategories = $category_item->getCategory ();
				foreach ( $tempAllCategories as $tempAllCategory ) {
					// print all of the categories that the recipe is in as class names (this allows them to be hidden during filtering)
					echo $tempAllCategory->getCategoryName () . ' ';
					array_push ( $AllCategories, $tempAllCategory );
				}
				//push the classes onto the arrays so a list of filtering options is created
				echo ' Serves' . $category_item->getServings () . ' Time' . $category_item->getRecipeCookTime ();
				array_push ( $CookingTimes, $category_item->getRecipeCookTime () );
				
				array_push ( $Servings, $category_item->getServings () );
				?>"><a class="pull-left"
				href="<?php echo site_url('recipe/'.$category_item->getID()); ?>"> <img
					class="category-media-object"
					src="<?php echo base_url('assets/images/')."/".$category_item->getImage();?> "
					alt="">
			</a> <span class="media-body"> <a
					href="<?php echo site_url('recipe/'.$category_item->getID()); ?>">
					<!-- display the recipe information including the recipe title, description, alt text,  -->
						<div class="recipe_info_box">
							<h4 class="media-heading"><?php echo $category_item->getTitle();?></h4>
				
				</a>
					<p><?php echo $category_item->getDescription(); ?></p>
					<p class="servings"><i>Serves <?php echo $category_item->getServings();?></i></p>
					<p>
					<!-- print out the categorie that the recipe is in and link to the respective category pages -->
						Categories: <span class="glyphicon glyphicon-tags"></span>
						<?php
				$forCount = 0;
				foreach ( $category_item->getCategory () as $cat ) {
					$url = $cat->getCategoryName ();
					$display_name = $cat->getCategoryDisplayName ();
					?>
								<a href='<?php echo base_url()?>category/<?php echo $url; ?>'>
								<?php
					echo $display_name;
					echo '; ';
					echo "</a>";
				}
				?>
						
					
					</p>
					<p>
					<!-- print out the cooking time of the recipe -->
						Cooking time: <span class="glyphicon glyphicon-time"></span>
						<?php
				echo $category_item->getRecipeCookTime ();
				?> mins.
						</p> </a>Ingredients: 
					<?php
				$sessionData = $this->session->all_userdata ();
				// create the html ingredient pools list and add this to a tooltip
				foreach ( $category_item->getIngredientPools () as $pool ) {
					if ($pool->getDifficulty () == $sessionData ['viewType']) {
						?>
							<?php
						$ingredList = "<ul>";
						foreach ( $pool->getIngredients () as $ingredient ) {
							$ingredList = $ingredList . " </li><li>" . $ingredient;
						}
						?>
								<a href="#" data-html="true" data-toggle="tooltip"
					data-placement="bottom" title="<?php echo $ingredList ?></li>
		
		</ul>"><?php echo $pool->getTitle();?> <span
			class="glyphicon glyphicon-info-sign"> </span></a>
							<?php
					}
				}
				?>
					</span>
	</div>
	<span class="button-box pull-right">
		<button class="btn btn-primary" name='Cook'
			value='Cook <?php echo $category_item->getTitle(); ?>'
			onclick="window.location='<?php echo site_url('recipe/'.$category_item->getID()) ?>';">Cook
			Recipe</button>
	</span>
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
	$AllCategories = array_unique ( $AllCategories, SORT_STRING );
	$Servings = array_unique ( $Servings );
	$CookingTimes = array_unique ( $CookingTimes );
	?>
	<div class="panel-body ">
		<?php
		
		if (sizeof ( $AllCategories ) > 1) {
			?>
		<h4>Category</h4>
		<ul class="list-group">
			<?php
			
foreach ( $AllCategories as $AllCategory ) {
				if ($AllCategory->getCategoryDisplayName () != $searchCategory) {
					?>
				<!-- Populate filter with all categories that are being used in the recipe list -->					
				<div class="input-group">
				<span class="input-group-addon"> <input type="checkbox"
					value="<?php echo $AllCategory->getCategoryName(); ?>"
					onclick="toggleFilter('<?php echo $AllCategory->getCategoryName(); ?>', this)"> <?php echo $AllCategory->getCategoryDisplayName(); ?>
				      </span>
			</div>
			<?php
				
}
			}
			?>
		</ul>
		<?php
		
}
		if (sizeof ( $Servings ) > 0) {
			?>
		<h4>Servings</h4>

		<ul class="list-group">
		<!-- Populate the filter list with all of the serving times -->
			<?php foreach ($Servings as $Serving) {?>
				<div class="input-group">
				<span class="input-group-addon"> <input type="checkbox"
					value="<?php echo 'Serves'.$Serving; ?>"
					onclick="toggleFilter('<?php echo 'Serves'.$Serving; ?>', this)"> <?php echo $Serving; ?>
				      </span>
			</div>
			<?php } ?>
		</ul>
		<?php
		
}
		if (sizeof ( $CookingTimes ) > 0) {
			?>
		<h4>Prep Time</h4>
		<ul class="list-group">
		<!-- Populate the filter list with all of the cooking times -->
			<?php foreach ($CookingTimes as $CookingTime) {?>
				<div class="input-group">
				<span class="input-group-addon"> <input type="checkbox"
					value="<?php echo 'Time'.$CookingTime; ?>"
					onclick="toggleFilter('<?php echo 'Time'.$CookingTime;?>', this)"> <?php echo $CookingTime. " minutes"; ?>
				      </span>
			</div>
			<?php } ?>
		</ul>
		<?php } ?>
	</div>
</div>

<script type="text/javascript">
var categoryLog = new Array(); // which category boxes are checked
var servesLog = new Array();// which serves boxes are checked
var timeLog = new Array();// which time boxes are checked
var checkedLog = new Array();// which category boxes are checked

function toggleFilter(className, checkBoxObject){
	//called every time that a checkbox has been checked
	if (checkBoxObject.checked){
		if (checkBoxObject.value.indexOf( "Serves") > -1){
			servesLog.push(checkBoxObject.value);	
			// If it contains the word "Serves" then add it to  the serves log 
		}
		else if (checkBoxObject.value.indexOf("Time") > -1){
			timeLog.push(checkBoxObject.value);	
			// If it contains the word "Time" then add it to  the serves log 
		}
		else{
			categoryLog.push(checkBoxObject.value);	
			//If it does not contain any of the above words then it is a category
		}
	}
	else{
		// If nothing has been checked then remove it from the log
		removeValueFromLog(checkBoxObject.value);	
	}
	// then hide filtered results
	var elements = document.getElementsByClassName("recipe_list");
	for (var i = 0; i < elements.length; i++) {
		filterItem(elements[i]);
	}	
}

function filterItem(recipe){
	var classList = recipe.className.split(/\s+/);
	var visible = [false,false,false]; // if any are false then the recipe is visible
	
	for (var i = classList.length - 1; i >= 0; i--) {
		if (categoryLog.length > 0) {	
			// if category log is larger than 0 then iterate
			for (var j = categoryLog.length - 1; j >= 0; j--) {	
				if (categoryLog[j] == classList[i]){
					//true if the class name is in the category log
					visible[0] = true;
				}
			}
		}
		else {
			visible[0] = true;
		}
		if (servesLog.length > 0) {	
			// if serveslog is larger than 0 then iterate
			for (var j = servesLog.length - 1; j >= 0; j--) {	
				//true if the class name is in the serves log
				if (servesLog[j] == classList[i]){
					visible[1] = true;
				}
			}
		}
		else {
			//if there are none them set it to true so that the filter can still be activated
			visible[1] = true;
		}
		if (timeLog.length > 0) {	
			for (var j = timeLog.length - 1; j >= 0; j--) {	
				//true if the class name is in the timelog
				if (timeLog[j] == classList[i]){
					visible[2] = true;
				}
			}
		}
		else {
			//if there are none them set it to true so that the filter can still be activated
			visible[2] = true;
		}
	}
	if (visible[0] == true && visible[1] == true && visible[2] == true){
		// if all filters have been activated then show the recipe
		$(recipe).removeClass("hidden");
	}
	else{
		if (categoryLog.length == 0 && servesLog.length == 0 && timeLog.length == 0 ){
			//show the recipe if there are no filters activated
			$(recipe).removeClass("hidden");
		}
		else{
			//otherwise hide the recipe
			$(recipe).addClass("hidden");	
		}
	}
}

function removeValueFromLog(cbValue){
	// iterates through each of the logs to find the class that should be removed from the list
	// Only one can be removed at once though so when deleetedOne becomes true then no more searching occurs
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
