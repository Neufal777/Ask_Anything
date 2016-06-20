<?php include 'back_end/oop.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Ask Anything </title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta charset="utf-8">
</head>
<body>

<?php include 'components/top_bar.php'; ?>

<div id='questione_container'>
	<form id='form_make_questione' method='post' >
		<textarea id='questione_textarea' spellcheck="false" placeholder="I want to ask something...." name='questione_name'></textarea>
		<input type="submit" onclick="return false;" name="questione_submit" id='questione_submit_button' value="Ask Questione ">
		<span id='questione_result'></span>
	</form>
</div>


<div id='all_questiones_container'>

	<?php

		// Here we are going to display the 10 latest questions
		$get = new general_class();

		// Connect to the database
		$get->db_connect();
		// Get the data
		$get->get_data();



	?>
</div><!--all_questiones_container-->


<script type="text/javascript" src='js/jquery.js'></script>
<script type="text/javascript" src='js/general_js.js'></script>
</body>
</html>