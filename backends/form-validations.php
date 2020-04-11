<?php

	function sanitizeInputs($value) {
		$value = trim($value);
		$value = filter_var($value, FILTER_SANITIZE_STRING);
		return $value;
	}
	function sanitizePasswords($value) {
		$value = htmlspecialchars($value);
		return $value;
	}
	function check_if_selected ($post_variable) {
		if (isset($_POST[$post_variable])) {
			return sanitizeInputs($_POST[$post_variable]);
		}else {
			return '';
		}
	}
	function check_if_empty ($variable,$label) {
		if(empty($variable)) {
			$error_status = true;
			return ['status'=>$error_status,'error'=>$label. " is required"];
		}
	}
	function check_string_length ($variable,$label) {
		if (strlen($variable) < 4) {
			$error_status = true;
			return ['status'=>$error_status,'error'=>$label. " is too short"];
		}
	}
	function check_comments_length ($variable) {
		if (strlen($variable) > 250) {
			$error_status = true;
			return ['status'=>$error_status,'error'=>'Too many characters'];
		}
	}
	function check_if_string_contains_number ($variable,$label) {
		$var_as_array = str_split($variable);
		for ($i = 0;$i<count($var_as_array);++$i) {
			if (is_numeric($var_as_array[$i])) {
				$error_status = true;
				return ['status'=>$error_status,'error'=>"Numbers are not allowed"];
				break;
			}
		}
	}
	function check_string_errors ($variable,$label) {
		if(check_if_empty($variable,$label)['status']) {
			return check_if_empty($variable,$label)['error'];
		}
		else if(check_string_length ($variable,$label)['status']) {
			return check_string_length ($variable,$label)['error'];
		}
	}
	function check_comments ($variable,$label) {
		if(check_if_empty($variable,$label)['status']) {
			return check_if_empty($variable,$label)['error'];
		}
		else if(check_comments_length($variable)['status']) {
			return check_comments_length($variable)['error'];
		}
	}
	function check_word_count ($variable,$label) {
		if (str_word_count($variable)>1) {
			$result = ['status'=>true, 'error'=>'Only one word allowed'];
			return $result;
		}
	}
	function check_number_length ($variable,$label) {
		if (strlen((string) $variable) < 11) {
			$result = ['status'=>true, 'error'=>$label. " is too short"];
			return $result;
		}else if (strlen((string) $variable) > 11) {
			$result = ['status'=>true, 'error'=>$label. " is too long"];
			return  $result;
		}
	}
	function check_number($variable,$label) {
		if(check_if_empty($variable,$label)['status']) {
			return check_if_empty($variable,$label)['error'];
		}
		else {
			return check_number_length($variable,$label)['error'];
		}
	};
	function check_email ($variable,$label) {
		if (check_if_empty($variable,$label)['status']) {
			return check_if_empty($variable,$label)['error'];
		}else if(!filter_var($variable, FILTER_VALIDATE_EMAIL)) {
			return $result = ('Invalid '.$label.' address');
		}
	}
	function check_upload_status ($variable,$label) {
		if (check_if_empty($variable,$label)['status']) {
			$error_status = true;
			return ['status'=>$error_status,'error'=>"Please Upload a ".$label]['error'];
		}
	}
	function check_all_errors ($array_of_errors) {
		$any_errors;
		foreach ($array_of_errors as $key => $value) {
			if (!empty($value)) {
				$any_errors = true;
				break;
			}else if(empty($value)) {
				$any_errors = false;
			}
		}
		return $any_errors;
	}
	function check_passwords ($pass_1,$pass_2,$label) {
		if(empty($pass_1) or empty($pass_2)) {
			$result = ['status'=>true, 'error'=>('Please Fill in both passwords')];
			return $result['error'];
		}else if ($pass_1 !== $pass_2) {
			return 'Passwords do not match!';
		}else if (check_string_length($pass_2, $label)['status']) {
			return 'Password is too short'; 
		}
		else if (!check_if_string_contains_number($pass_2,$label)['status']) {
			return $result =  $label. " must have at least one number!";
		}
	}
	function hashPassword ($password) {
		return password_hash($password, PASSWORD_DEFAULT);
	}
	function convertStringToDBname ($string) {
		$var_as_array = str_split($string);
		$string = '';
		for ($i = 0;$i<count($var_as_array);++$i) {
			if ($var_as_array[$i] === ' ') {
				$var_as_array[$i] = '_';
			}
			$string .= $var_as_array[$i];
		}
		return strtolower($string);
	}

?>