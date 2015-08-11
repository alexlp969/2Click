<html>
<head>
<?php
include "../classes/functions.php";
include "../classes/FormLogic.php";

$display_logic = new functions();
$display_logic -> head_links('Add a new customer');
$display_logic -> nav_bar();
?>

  <script>
$(function() {
$( "#tabs" ).tabs();
});
</script>
 
<script>
function cancel()
{
	window.location="index.php";
}
</script>
</head>
<body>
<form  action="uploadScript.php "method="post" enctype="multipart/form-data"> 
				  <div class="panel panel-primary">
				  	
					 <div class="panel-heading"><h3>2Click booking form</h3></div>
					 <div class="panel panel-info">
					 <div class="panel-heading">Please make sure you convert the <b>Excel</b> file to <b>XML data</b> before attempting to upload</div>
					 </div>
					  <div class="panel-body">
					  	<div class="row">
						    <div class="col-sm-5">
						   	 <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
  						    </div>
						    <button class="btn btn-primary" type="submit">Upload</button>
						 </div>
					</div>
				</div>	
			</form>	
		</div>
</body>
</html>
