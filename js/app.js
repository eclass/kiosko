var kiosko = function() {
	var self = this,
		state = 0,
		cart = 0,
		person = {};

	var json = {
		persons: {},
		products: {},
		transactions: []
	}

	this.init = function() {
		$.getJSON('json/personas.json', function(data) {
			json.persons = data;
		});

		$.getJSON('json/productos.json', function(data) {
			json.products = data;
		});

		//console.log(json.transactions[0]);

		self.home();
	}


	this.home = function() {
		state = 1;

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

					person = json.persons[documento.val()];
					//console.log(person);
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
		self.createCart();

		$('#credencial').fadeOut(function() {
			$('#carro').fadeIn();
			$('#codigo_producto').focus();
		});

		$('#codigo_producto').on('keypress', function(e) {
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

					self.addProduct(codigo_producto.val());
				}
			});
	}

	this.__isValidProduct = function(product_code) {
		if (typeof json.products[product_code] === 'undefined') {
			return false;
		}

		return true;
	}

	this.addProduct = function(product_code) {
		json.transactions[cart -1].products.push(product_code);

		$('#codigo_producto').val('');
		
		$('tbody').append('<tr><td>' + json.products[product_code].nombre + '</td><td>1</td><td>' + json.products[product_code].precio + '</td></tr>');
	}

	this.createCart = function() {
		json.transactions.push({
			person_id: person.id,
			products: []
		});

		cart = json.transactions.length;
	}

	self.init();
};

$(document).ready(kiosko);