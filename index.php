<?php include_once('functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<link type="text/css"  rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"></link>
	<link type="text/css"  rel="stylesheet" href="styles.css"></link>
	<meta name="viewport" content="width=device-width, user-scalable=no">

</head>
<body>
<div id="message"><span class="close">X</span></div>
<div id="current_amount"><?php echo getCurrentBalance(); ?></div>
<form class="form" action="enter.php" method="post">	 
	enter amount: <input type="number" name="add_amount"/>
	<button id="add_amount">add amount <img src="1.gif" id="loader"></span></button>
</form>

<form class="form1" action="enter.php" method="post">	 
	enter amount: <input type="number" name="subtract_amount"/>
	<button id="subtract_amount">subtract amount</button>
</form>


<div id="all_values"><?php getAllValues(); ?></div>


<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/fastclick/1.0.2/fastclick.js"></script>
<script type="text/javascript" src="functions.js"></script>

</body>
</html>