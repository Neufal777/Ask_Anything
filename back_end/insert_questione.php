<?php
		
		include 'oop.php';

		$insert = new general_class();


		// connect to the database
		$insert->db_connect();

		// Get the questione has inputed the user
		 $user_questione = mysqli_real_escape_string($insert->con,htmlspecialchars(replace_bad_words(trim($_POST['questione_name']))));
		// $user_questione = htmlentities($_POST['questione_name']);
		// Inser the data in the database
		$insert->insert_questione($user_questione);

		header('location:../index.php');
	?>