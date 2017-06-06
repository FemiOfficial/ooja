<?php


function check_min_length($fields_to_check_length){
	$form_errors = array();
	foreach($fields_to_check_length as $name_of_field => $minimum_length_required){
		if(strlen(trim($_POST[$name_of_field])) < $minimum_length_required){
			$form_errors[] = $name_of_field . "is too short, must be {$minimum_length_required} characters long"; 
		}
	
	}
return $form_errors;	
}




?>