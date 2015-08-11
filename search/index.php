<html>
<head>
<?php
include "../classes/functions.php";
include "../classes/searchLogic.php";

$display_logic = new functions();
$display_logic -> head_links('Search for a customer');
$display_logic -> nav_bar();
$display_logic -> open_connection();
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



<?php require '../databaseConnect.php';?>
</head>
<body>

<?php 
$searchForCustomer = new searchLogic();
$searchForCustomer -> logic();
?>

</body>