<?php
	
	// connect to the oop file
	include 'back_end/oop.php';

	$quest = new general_class();

	// connection to the database
	$quest->db_connect();

	// get the code from the url
	$questione_single_code = mysqli_real_escape_string($quest->con,htmlentities($_GET['id']));


?>

<!DOCTYPE html>
<html>
<head>
	<title>Questione</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
	// Add the top bar
	include 'components/top_bar.php';
	 ?>

	
	 <a href="index.php" id='back_button'>Home</a>

	<div id='submit_answer_general_container'>
		<form method="post" action="back_end/insert_answer.php">
			<input type='hidden' name="id" value='<?php echo $questione_single_code; ?>'>
			<textarea id='answer_textarea' name='text_answer' spellcheck='false' placeholder="Your Answer..."></textarea>
			<input type="submit" name="answer_submit" value='Answer' id='answer_submit_input'>
		</form>
	</div><!--submit_answer_general_container-->
<div id="questione_all_container">

	<div id='questione_content'>
	<?php
		// Display the questione
	$quest->get_single_questione($questione_single_code);
	?>
	</div><!--questione_content-->

	<div id='all_answers_container'>
	<?php
	
	// Display here all the answers (oop.php)
	$quest->single_questione_get_answers($questione_single_code);
	?>
	</div><!--all_answers_container-->

</div><!--questione_all_container-->

<script type="text/javascript" src='js/jquery.js'></script>
<script type="text/javascript" src='js/general_js.js'></script>

</body>
</html>