let number_format = (value) => {
	return value.toLocaleString();
} 
let investments = [20000,30000,40000,50000,60000,70000,80000];
let cap = 100000;
//This test is for incremental capital with no collect on profit.
function testDuration (initial_capital,investment_array,current_index) {
	let multi_investment = 0;
	let i = current_index;
	// for (let i = current_index+1;i<investment_array.length;++i) {
		while(multi_investment<=initial_capital) {
			multi_investment+=investment_array[i];
			console.log(investment_array[i])
			++i;
		}
		let usable_capital = multi_investment - investment_array[i-1];
		let unused_balance = initial_capital - usable_capital;
		console.log(`Usable Capital: ${usable_capital}\nRemaining Balance: ${unused_balance}`)
	// }
}
testDuration(cap,investments,0)
let get_time = (capital,base_investment,increment,number) => {
	let compounded_investment = compounded_yield = compounded_profit = 0;
	let time = 0;
	for (let i = 0; i<number;++i) {
		let investment = base_investment + (increment * i);
		compounded_investment += investment;
		if (i === 0) {
			current_yield = 0;
		}else {
			current_yield = (investment - increment) * 1.5;
		}
		let profit = current_yield - investment;
		// console.log(investment);
		// console.log(compounded_investment);
		// if (compounded_investment > capital) {
		// 	++time;
		// 	// console.log(time);
		// }else if (compounded_investment <= capital) {
		// 	// console.log(time)
		// }
		let multi_investment = 0;
		for (let j = i+1;j<number;++j) {
			if (multi_investment <= capital) {
				let next_investment = base_investment + (increment * j);
				multi_investment += next_investment;
				console.log(`${capital} is greater than or equal to ${multi_investment}`);
			}else {
				multi_investment = 0;
			}
			// while (multi_investment <= capital) {
			// }
		}
		capital+=profit;
	}
	console.log(capital)
	// console.log(compounded_investment);
}
// get_time(100000,10000,10000,20)
let investment_simulation_data = (input_array) => {
	let data_array = [];
	let base_investment = Number(input_array[0].value),number = Number(input_array[1].value),
		increment = Number(input_array[2].value),start_capital = Number(input_array[3].value);
	if (start_capital < base_investment) {
		return {data:'Investment cannot be less than capital',error_code:1}
	}else {
		let compounded_investment = compounded_yield = compounded_profit = 0;
		for (let i=0;i<number;++i) {
			let investment = base_investment + (increment*i);
			if (i === 0) {
				current_yield = 0;
			}else {
				current_yield = (investment - increment) * 1.5;
			}
			let block_data = {
				index: i+1,investment: number_format(investment),
				yield: number_format(current_yield),profit: number_format(current_yield - investment),
				profit: number_format(current_yield - investment),
				compounded_investment: number_format(compounded_investment += investment),
				compounded_yield: number_format(compounded_yield += current_yield),
				compounded_profit: number_format(compounded_profit += (current_yield - investment)),
				compounded_time: '1'
			};
			data_array.push(block_data);
		}
		return {data:data_array,error_code:0};
	}
}