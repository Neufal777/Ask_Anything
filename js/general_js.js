
function post_questione(){

	// Variables 
	var q = document.getElementById('questione_textarea');
	var submit_questione = document.getElementById('questione_submit_button');
	var q_general_container = document.getElementById('questione_container');
	var q_result = document.getElementById('questione_result');

	// check if the textarea is not empty
	
}


$(document).ready(function(){

	// Make the request
$('#questione_submit_button').click(function(){

		var questione_data = $('#form_make_questione').serialize();

		$.ajax({

			type : 'post',
			url : 'back_end/insert_questione.php',
			data : questione_data,
			success : function(){

				$('#questione_result').html("Completed, reload the page and you will see your questione");

				// Let the textarea empty
				$('#questione_textarea').val(" ");
			}
		})

})

})