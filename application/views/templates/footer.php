</div>
<!-- Wrapper class end -->
</body>
<footer>
	<strong>&copy; IAPT Module, Group 6, 2014. </strong> <a
		style="font-size: 15px;" href="<?php echo base_url()?>help">Help Section</a>
</footer>

<script>
function keyUp_Search(keyValue){
	if (keyValue.keyCode == 83){
		document.getElementById("search").focus();
	}


}
document.addEventListener('keyup', keyUp_Search, false);
</script>
</html>
