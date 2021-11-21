// Pedimos al usuario introducir los datos requeridos
const showPrompt = () => {
	var sentence = prompt("Introduce la frase a encriptar. Ten en cuenta que tiene que tener más de 4 palabras.");
	sentence.trim();
	checkPrompt(sentence);
}

// Comprobamos los datos introducidos
const checkPrompt = (sentence) => {
	if (countWords(sentence) <= 4) {
		alert("Error: La frase tiene que tener más de 4 palabras.");
		/* Mostramos la ventana hasta que el usuario
		introduzca una respuesta válida o cierre el prompt */
		showPrompt();
	} else {
		// Entrada válida. La encriptamos.
		showEncryptedSentences(sentence);
	}
}

const countWords = (sentence) => sentence.split(/\s+/).length;

// Clase que contiene toda la lógica relacionada con la encriptación
class Encryptor {
	constructor(sentence) {
		this.sentence = sentence;
		this.random = Math.round(Math.random() * 150);;
	}

	getNormalEncryption() {
		let sentenceInAscii = [];
		// Iteramos por cada caracter contenido en la entrada del usuario
		for (let char of this.sentence) {
			sentenceInAscii.push(char.charCodeAt(0));
		}
		// Devolvemos los caracteres encriptados unidos
		return sentenceInAscii.join('');
	}

	getRandomEncryption() {
		const maxAscii = 255;
		let sentenceInAscii = [];
		let result;
		for (let char of this.sentence) {
			result = char.charCodeAt(0) + this.random;
			/* Comprobamos que el valor encriptado no sea 
			superior al valor máximo en ASCII */
			if (result > maxAscii) {
				/* Si se pasa de 255, restamos el valor ASCII base y 
				realizamos la operación indicada en el ejercicio */ 
				result = char.charCodeAt(0) - (maxAscii / 2);
			}
			sentenceInAscii.push(result);
		}
		return sentenceInAscii.join('');
	}
}

// Mostramos por pantalla la entrada del usuario
const showEncryptedSentences = (sentence) => {
	const encryptor = new Encryptor(sentence);
	let results = document.getElementById("results");
	// Creamos y llenamos un array de capacidad 3 con párrafos 
	let encryptions = Array.from({ length: 3 }, () => (document.createElement("p")));
	encryptions[0].innerHTML = `<strong>El mensaje a encriptar</strong>: ${sentence}`;
	encryptions[1].innerHTML = `<strong>El mensaje en ASCII</strong>: ${encryptor.getNormalEncryption()}`;
	encryptions[2].innerHTML = `<strong>El mensaje en ASCII sumando el número aleatorio ${encryptor.random}</strong>: ${encryptor.getRandomEncryption()}`;
	// Adjuntamos los elementos creados al elemento que contiene los resultados
	results.append(...encryptions);
	/* Hacemos que aparezca el elemento que contiene los
	resultados quitando la clase con el atributo display: none; */
	results.classList.remove("no-display");
}