<?php
	require '../backends/form-validations.php';

	$investment_simulation_data = function ($number,$first_investment,$increment) {
		$data_array = [];
		$compounded_investment = $compounded_yield = $compounded_profit = 0;
		$yield_increment = $first_investment * 1.5;
		for ($i=0;$i<$number;++$i) {
			$investment = $first_investment + ($increment*$i);
			if ($i === 0) {
				$yield = 0;
			}else {
				$yield = ($investment - $increment) * 1.5;
			}
			$profit = $yield - $investment;
			$compounded_investment += $investment;
			$compounded_yield += $yield;
			$compounded_profit += $profit;
			$block_data = 
				[
					'index'=>$i+1,'investment'=>number_format($investment),
					'yield'=>number_format($yield),'profit'=>number_format($profit),
					'compounded_investment'=>number_format($compounded_investment),
					'compounded_yield'=>number_format($compounded_yield),
					'compounded_profit'=>number_format($compounded_profit)
				];
			array_push($data_array, $block_data);
		}
		return $data_array;
	};
	if ($_SERVER["REQUEST_METHOD"] === 'POST') {
		if (isset($_POST['request'])) {
			$request = sanitizeInputs($_POST['request']);
			if ($request === 'simulate') {
				
				$investment = sanitizeInputs($_POST['investment']);
				$number = sanitizeInputs($_POST['number']);
				$increment = sanitizeInputs($_POST['increment']);
				$capital = sanitizeInputs($_POST['capital']);
				echo json_encode($investment_simulation_data($number,$investment,$increment));
				// print_r();
			}
		}
	}
?>