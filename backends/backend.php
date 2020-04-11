<?php
	require 'form-validations.php';
	$col_head_1 = "S/N";
	$col_head_2 = "Investment";
	$col_head_3 = "Yield";
	$col_head_4 = "Profit";
	$col_head_5 = "C./Investment";
	$col_head_6 = "C./Yield";
	$col_head_7 = "C./Profit";
	function get_yield($amount)	{
		return $yield = $amount * 1.5;
	}
	$amount = 30000;
	//Incremental Simulation Model Functions
	
?>