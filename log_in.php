<html>
<head>
<?php 

include "functions.php";

$display_logic = new functions();
$display_logic -> head_links('Log in');
//$display_logic -> nav_bar();


$msg='0';
//$msg = $_GET['msg'];
?>

    <link href="custom.css" rel="stylesheet">

</head>
<body>	 
    <div class="container">
  <!--   <div class="test_container">
    	<p>Welcome to the 2Click ordering system. This system is designed to store order information. Please enter your username and password to log in to the system.</p>
    </div>    -->
<div class="container">
<?php if($msg == '1')
{
echo'<div class="alert alert-danger" role="alert">Your username or password is not correct</div>';
}?>
<!-- <h2 class="form-signin-heading">Welcome to the 2Click customer management system</h2> -->
      <form class="form-signin" action="loginFunctions.php" method="post">        
        <label for="Username" class="sr-only">Username</label>
        <input type="text" id="Username" name="Username" class="form-control" placeholder="Username" required autofocus>
        <label for="Password" class="sr-only">Password</label>
        <div class="row"><br></div>
        <input type="password" id="Password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    
  </body>
</html>
