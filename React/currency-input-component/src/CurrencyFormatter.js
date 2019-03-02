import React, { Component } from 'react';
export default class CurrencyInput extends Component {
	constructor(props) {
		super(props);
		 this.state = {
			input: ''
		}
	}

handleOnChange = (e) => {
	let input = e.target.value;

	const reverseString = (inputString) => {
		let reversed = "";
		for (let i = inputString.length - 1; i >= 0; i--){
			reversed += inputString[i];
		}
		return reversed;
	}

	const removeComma = (str) =>  {

		let stringWithNoComma = '';
		for(let i = 0; i < str.length; i++) {
			if(str[i] !== ',') stringWithNoComma += str[i];
		}
		return stringWithNoComma;
	}

		if(input.charAt(0) === '$') {
			 if(input.length > 4) {
				input = removeComma(input);
				let inputArray = input.split("");
				let reverseArray = inputArray.reverse();
				let reverseNumberWithComma = '';

				 for(let i = 0; i < reverseArray.length; i++) {
					 if(i !== 0 && i % 3 === 0 && reverseArray.length -1  !== i) {
							reverseNumberWithComma += ',';
							reverseNumberWithComma += reverseArray[i];
					 } else reverseNumberWithComma += reverseArray[i];
				 }
				 input = reverseString(reverseNumberWithComma);
			 }
		} else {
			input = input === '' ? '' :  '$' + input;
		}

			this.setState({
			input: input
		});
}
	render() {

		const { input } = this.state;

		return (
			<div className="App">
				<input value={input} onChange={this.handleOnChange} />
			</div>
		)
	}
}
