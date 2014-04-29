<!-- Invalid search terms iew only occurs when the form validation fails -->
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Search Results</h3>
	</div>
	<div class="panel-body category-box">

		<ul class="media-list">
			<?php echo 'Sorry "'. $searchTerm .'" is not valid as an input, it must be longer than 2 characters and fewer than 50.';?>
		</ul>
	</div>
</div>
