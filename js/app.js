var kiosko = function() {
	var self = this,
		state = 0,
		cart = 0;

	var json = {
		persons: {},
		products: {},
		transactions: [
			{
				products: ['00005543', '94273498'],
				person_id: 56,
				created: 054945394
			}
		]
	}

	this.init = function() {
		$.getJSON('json/personas.json', function(data) {
			json.persons = data;
			//console.log(json);
		});

		$.getJSON('json/productos.json', function(data) {
			json.products = data;
		});

		console.log(json.transactions[0]);

		self.home();	
	}


	this.home = function() {
		$('#credencial').fadeIn();

		$('input#rut')
			.focus()
			.on('keypress', function(e) {
				var code = e.keyCode || e.which;
				if (code == 13) {
					var documento = $('input#rut');
					if (!documento.val()) {
						alert('Incluya algo');
						return false;
					}

					if (!self.__isValidDocument(documento.val())) {
						alert('Documento inválido');
					}

					self.voucher();
				}
			});
	}

	this.__isValidDocument = function(documento) {
		documento = documento.replace(/[^0-9kK]+/g,'').toUpperCase();

		if (documento.length < 7) {
			return false;
		}
		if (typeof json.persons[documento] === 'undefined') {
			return false;
		}

		return true;
	}


	this.voucher = function() {
		$('#credencial').fadeOut(function() {
			$('#carro').fadeIn();
		});

		$('#codigo_producto')
			.focus()
			.on('keypress', function(e) {
				var code = e.keyCode || e.which;
				if (code == 13) {
					var codigo_producto = $('#codigo_producto');
					if (!codigo_producto.val()) {
						alert('Acerca un producto');
						return false;
					}

					if (!self.__isValidProduct(codigo_producto.val())) {
						alert('El producto no existe');
					}

					alert('wena choro');
				}
			});
	}

	this.__isValidProduct = function(product_code) {
		if (typeof json.products[product_code] === 'undefined') {
			return false;
		}

		return true;
	}

	self.init();
};

$(document).ready(kiosko);