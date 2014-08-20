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
		self.getPersons();
		self.getProducts();

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
						documento.val('');
						return false;
					}

					person = json.persons[documento.val()];
					self.voucher();
				}
			});
	}

	this.__isValidDocument = function(documento) {
		documento = documento.replace(/[^RUT0-9kK]+/g,'').toUpperCase();

		if (documento.length < 10) {
			return false;
		}
		if (typeof json.persons[documento] === 'undefined') {
			return false;
		}

		return true;
	}


	this.voucher = function() {
		state = 2;
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
						codigo_producto.val('');
						return false;
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
		var total = $('tfoot span').html();

		json.transactions[cart].products.push(product_code);

		$('#codigo_producto').val('');
		
		$('tbody').append('<tr><td>' + json.products[product_code].nombre + '</td><td>1</td><td>' + json.products[product_code].precio + '</td></tr>');

		total = total + json.products[product_code].precio;
	}

	this.deleteProduct = function(product_code) {
		var total = $('tfoot span').html();

		$('tbody tr:last-child').remove();

		total = total - json.products[product_code].precio;
	}

	this.createCart = function() {
		json.transactions.push({
			person_id: person.id,
			products: []
		});

		cart = json.transactions.length -1;
	}



/*!
 * Método para cancelar la compra
 * 
 * Este método es llamado cuando se presiona la tecla ENTER
 * 
 * @author vsanmartin
 * @since 2014-08-19
 * @return boolead 
 */
	this.cancel = function() {
		if (state != 2) return false;

		if (confirm('¿Estás seguro de cancelar tu compra?')) {
			json.transactions.splice(cart, 1);
			cart--;
			self.home();
		}

		return true;
	}

/*!
 * Cuando se confirma la compra se llama este método
 *
 * Método accesible vía 
 * 	Tecla SPACE
 * 	15s de iddle
 * 	Cuando escaneen otro RUT
 * 
 * @author vsanmartin
 * @since 2014-08-19
 * @return void
 */
	this.confirm = function() {
		if (state != 2) return false;

		self.home();
	}

/*!
 * Envía todas las transacciones generadas al servidor para su registro
 * 
 * @author vsanmartin
 * @since 2014-08-19
 * @return void
 */
	this.sendCarts = function() {
		if (json.transactions.length > 0 && state == 1) {
			$.ajax({
				url: 'algo.php',
				cache: false,
				method: 'POST',
				data: { transactions: json.transactions },
				complete: function() {
					json.transactions = [];
					cart = 0;

					setTimeout(function() {
						self.sendCarts();
					}, 5000);
				}
			});

			return;
		}

		setTimeout(function() {
			self.sendCarts();
		}, 5000);
	}
	this.sendCarts();

/*!
 * Actualiza el json de personas
 *
 * Se actualiza cada 1d
 * 
 * @author vsanmartin
 * @since 2014-08-19
 * @return void
 */
	this.getPersons = function() {
		$.getJSON('json/personas.json', function(data) {
			json.persons = data;

			setTimeout(function() {
				self.getPersons();
			}, (1000 * 60 * 60 * 24));
		});
	}

/*!
 * Actualiza el json de productos
 *
 * Se actualiza cada 1m
 * 
 * @author vsanmartin
 * @since 2014-08-19
 * @return void
 */
	this.getProducts = function() {
		$.getJSON('json/productos.json', function(data) {
			json.products = data;

			setTimeout(function() {
				self.getProducts();
			}, (1000 * 60));
		});
	}


	self.init();
};

$(document).ready(kiosko);