</main>
<!-- Wrapper class end -->
</body>
<footer>
	<strong>&copy; IAPT Module, Group 6, 2014. </strong> <a
		style="font-size: 18px;margin-top: 0px;margin-left: 10px;" href="<?php echo base_url()?>help">Help Section</a>
		<span class = "pull-right"> <a href = "<?php echo  base_url().'documentation/LogBook-Group6.pdf';?>"> Log Book  </a> <a href = "<?php echo  base_url(). 'documentation/Interactive-System-Quality-Reporting-Group6.pdf';?>">Documentation</a>   </span>
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
