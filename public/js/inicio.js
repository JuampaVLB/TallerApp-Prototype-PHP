'use strict';

const form = document.querySelector('#formulario-option');
const qrOption = document.querySelector('#qr-option');

form.addEventListener('click', () => {
	window.location = "./formulario.php";
})

qrOption.addEventListener('click', () => {
	alert("Disponible en la proxima actualizacion");
})