window.onload = () => {
	backwardsAlphabet();
	randomAlphabet();
}

const backwardsAlphabet = () => {
	const aLowercaseAscii = 97;
	let result = '';
	for (i = 25; i >= 0; i--) {
		result += ' - ' + String.fromCharCode(aLowercaseAscii + i);
	}
	showResult('results__1', result.replace('-', ''));
}

const randomAlphabet = () => {
	const aUppercaseAscii = 65;
	const zUppercaseAscii = 90;
	let result = '';

	for (i = 0; i < 100; i++) {
		result +=
			' - ' +
			String.fromCharCode(
				Math.round(
					Math.random() * (zUppercaseAscii - aUppercaseAscii) + aUppercaseAscii
				)
			);
	}
	showResult('results__2', result.replace('-', ''));
}

const showResult = (resultsElement, result) => {
	const results = document.getElementById(resultsElement);
	let resultElement = document.createElement('p');
	resultElement.textContent = result;
	results.appendChild(resultElement);
	console.log(result);
}