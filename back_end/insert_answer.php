<?php
		
		include 'oop.php';
		
		$insert_a = new general_class();


		// connect to the database
		$insert_a->db_connect();

		// Get the answer has inputed the user
		 $user_answer = mysqli_real_escape_string($insert_a->con,htmlspecialchars(replace_bad_words(trim($_POST['text_answer']))));
		 $to_answer = $_POST['id'];
		// Inser the answer in the database
		$insert_a->submit_answer($to_answer,$user_answer);

		header('location:../questione.php?id='.$to_answer);

	?>