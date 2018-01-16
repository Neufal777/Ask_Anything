<?php

	class general_class{

		// Declare variables to connect to the database
		public $host = "localhost";
		public $user = "root";
		public $pass = "";
		public $db_name = "database_name";
		public $con;

		//More variables
		public $get_data_sql;

		// More variables
		public $questione;
		public $questione_random;
		public $sql_check_rand_number;

		function db_connect(){

			// Create connection

			$this->con = new mysqli($this->host,$this->user,$this->pass,$this->db_name);


		}//function db_connect

		function get_data(){


			$this->get_data_sql = mysqli_query($this->con,"SELECT * from questiones order by 1 desc");

			// Display the results

			// ´Check if there is questiones in the database
			if(mysqli_num_rows($this->get_data_sql)>0){

				while($row = $this->get_data_sql->fetch_assoc()){

				$q = nl2br($row['questione']);
				$q_code = $row['code'];

				echo 	"<a href='questione.php?id=$q_code'><div id='single_questione_container'>
						<span id='single_questione_questione'>$q</span>
						</div></a>";

					}//while loop

			}else{

				// If there is nothing in the database
				echo "<span style='color:green; font-size:14px; font-style:italic;'>There's no questiones yet</span>";
			}


		}// function get_data



		function insert_questione($q_input){

			// get the questione
			$this->questione = $q_input;
			$this->questione_random = rand(0,999999);

			// Insert in the databse


			// Check if the random number exists
			$this->sql_check_rand_number = mysqli_query($this->con,"SELECT * FROM questiones where questione='$q_input'");

			if(!empty($q_input)){

				// Proceed with the registration of the questione
				if(mysqli_num_rows($this->sql_check_rand_number)>0){

				//generate a random number
				echo "This questione alredy exists";


				}else{

				// Continue with the questione post

				mysqli_query($this->con, "INSERT INTO questiones(questione,code) values('$q_input','$this->questione_random')");
				echo "Your questione has been uploaded";

				}//else


		}else{

			//if the input is empty
			echo "The questione can't be empty";

		}// finish else if(!empty)

	}//insert_questione



	// Function to get the questione and the answers

	function get_single_questione($single_questione_id){

		//sql to get the questione with the id number

		$get_q_sql = mysqli_query($this->con, "SELECT * FROM questiones WHERE code='$single_questione_id'");

		// get the questione from the database
		while($qu = $get_q_sql->fetch_assoc()){

			// Display the questione
			echo nl2br($qu['questione']);
		}

	}//function get_single_questionea



	function single_questione_get_answers($get_answers_code){

		// get * the answers from the database and display them in the site
		$get_answers_sql = mysqli_query($this->con,"SELECT * FROM answers WHERE q_code='$get_answers_code' order by 1 desc");


		// Check if there is answers avaiable

		if(mysqli_num_rows($get_answers_sql)>0){

			// if there is answers available
			// get them all and display them
			while($answers = $get_answers_sql->fetch_assoc()){

				// Display the answers
				$ans = $answers['answer'];

				// Echo the answers we got
				echo "<div id='single_answer_container'>$ans</div>";

			}

		}else{

			// If there is no answers
			echo "<span style='color:red; font-size:14px; font-style:italic;'>There's no answers yet !</span>";
		}

	}//function single_questione_get_answer()


	function submit_answer($q_to_answer,$answer_text){

		//check if the answer is empty
		if(!empty($answer_text)){

			// Insert the answer into the database
			// insert in the database

			mysqli_query($this->con,"INSERT INTO answers(answer,q_code) values('$answer_text','$q_to_answer')");

		}else{

			// Say that the answer can't be empty
			echo "The Answer Can't be empty";

		}

	}//function submit_answer()

}//general_class


	// Function to replace bad words
	function replace_bad_words($o_word){


		// Bad words array
		$bad_words_array = array('slut','bitch','fuck','prostitute','dick','ass','shit','nigga');

		// Replace the bad word
		$n_word = str_replace($bad_words_array, '***', $o_word);

		return $n_word;

	}//function replace_bad_words()

	?>
