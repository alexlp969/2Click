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

<?php 
$addNewCustomer = new FormLogic();
$addNewCustomer -> logic();
?>

</body>