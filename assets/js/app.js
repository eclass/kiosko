var kiosko = function() {
	var self = this,
		state = 0,
		cart = 0,
		total = 0,
		person = {},
		idle = 10,
		json = {
			persons: {},
			products: {},
			transactions: []
		};

/*!
 * Inicio de la magia
 * 
 * @author vsanmartin
 * @since 2014-08-19
 * @return void
 */
	this.init = function() {
		self.getPersons();
		self.getProducts();

		/*!
		 * Atachamos el método confirm cuando presione la tecla SPACE(32)
		 */
		$(document).keypress(function(e) {
			idle = 10;
			var code = e.keyCode || e.which;
			if (code == 32 && state == 2) {
				self.confirm();
			}
		});
		/*!
		 * Atachamos el método cancel cuando precione la tecla ESC(27)
		 */
		$(document).keyup(function(e) {
			idle = 10;
			var code = e.keyCode || e.which;
			if (code == 27 && state == 2) {
				self.cancel();
			}
		});
		/*!
		 * Atachamos el método deleteProduct cuando precione la tecla BACKSPACE(8)
		 */
		$(document).keydown(function(e){
			var code = e.keyCode || e.which;
			if (code == 8 && state == 2) {
				e.preventDefault();
				self.deleteProduct();
			}
		});


		self.initEvents();
		self.home();
	}

/*!
 * Se atachan los eventos a los inputs
 * 
 * @author vsanmartin
 * @since 2014-08-20
 * @return void
 */
	this.initEvents = function() {
		$('input#passport').on('keypress', function(e) {
			var code = e.keyCode || e.which;
			if (code == 13) {
				var passport = $('input#passport');
				self.login(passport);
			}
		});

		$('#product_code').on('keypress', function(e) {
			var code = e.keyCode || e.which;
			if (code == 13) {
				var codigo_producto = $('#product_code');
				if (!codigo_producto.val()) {
					alert('Acerca un producto');
					return false;
				}

				if (self.__isValidDocument(codigo_producto.val())) {
					self.resetCart();
					self.login(codigo_producto);
					return;
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

/*!
 * Muestra la primera pantalla donde la persona ingresa su rut
 * 
 * @author vsanmartin
 * @since 2014-08-19
 * @return void
 */
	this.home = function() {
		state = 1;
		self.resetCart();

		if ($('#cart').is(':visible')) {
			$('#cart').fadeOut(function() {
				$('#home').fadeIn(function() {
					$('input#passport').focus().val('');
				});
			});
		}
		else {
			$('#home').fadeIn();
		}

		$('input#passport').val('');
	}

/*!
 * Método que valida el documento y activa el carro de compras
 * 
 * @author vsanmartin
 * @since 2014-08-20
 * @param Object input
 * @return boolean
 */
	this.login = function(passport) {
		if (!passport.val()) {
			alert('Incluya algo');
			return false;
		}

		if (!self.__isValidDocument(passport.val())) {
			alert('Documento inválido');
			passport.val('');
			return false;
		}

		person = json.persons[passport.val()];
		self.cart();
		return true;
	}

/*!
 * Valida si el numero passport es correcto
 * 
 * @author vsanmartin
 * @since 2014-08-19
 * @param string passport Número de passport (RUT)
 * @return boolean
 */
	this.__isValidDocument = function(passport) {
		passport = passport.replace(/[^RUT0-9kK]+/g,'').toUpperCase();

		if (passport.length < 10) {
			return false;
		}
		if (typeof json.persons[passport] === 'undefined') {
			return false;
		}

		return true;
	}

/*!
 * Limpia el carro de compras
 * 
 * @author vsanmartin
 * @since 2014-08-20
 * @return void
 */
	this.resetCart = function() {
		$('.products .product').remove();
		$('div[data-kiosko="total"]').html('0');
		$('.to-show').hide();
	}

/*!
 * Muestra la segunda pantalla donde se registran los productos
 * 
 * @author juanpablob
 * @since 2014-08-19
 * @return void
 */
	this.cart = function() {
		state = 2;
		self.createCart();

		$('#home').fadeOut(function() {
			$('#cart').fadeIn();
			$('#product_code').focus();
		});
	}

/*!
 * Valida si el producto ingresado existe en el stock
 * 
 * @author vsanmartin
 * @since 2014-08-19
 * @param string código de producto
 * @return boolean
 */
	this.__isValidProduct = function(product_code) {
		if (typeof json.products[product_code] === 'undefined') {
			return false;
		}

		return true;
	}

/*!
 * Registra el producto en la transacción, actualiza el total de la compra y agrega el producto en la vista
 * 
 * @author juanpablob
 * @since 2014-08-19
 * @param string código de producto
 * @return void
 */
	this.addProduct = function(product_code) {
		if ($.isEmptyObject(json.transactions[cart].products)) {
			$('.to-show').fadeIn();
		}

		json.transactions[cart].products.push(product_code);

		total += parseInt(json.products[product_code].price);

		$('.products').append('<div class="row product"><div class="col-sm-8 text-left">' + json.products[product_code].name + '</div><div class="col-sm-1">1</div><div class="col-sm-2">$ ' + json.products[product_code].price + '</div><div class="col-sm-1"><a href="#"><i class="fa fa-minus-square"></i></a></div></div>');
		
		$('div[data-kiosko="total"]').html(total);

		$('#product_code').val('');
	}

/*!
 * Elimina el producto en la transacción, actualiza el total de la compra y quita el producto en la vista
 * 
 * @author juanpablob
 * @since 2014-08-19
 * @return void
 */
	this.deleteProduct = function() {
		var last_product = json.transactions[cart].products.length -1;
		last_product = json.transactions[cart].products[last_product];

		total -= parseInt(json.products[last_product].price);

		json.transactions[cart].products.pop();

		$('.products .row:last-child').remove();

		$('div[data-kiosko="total"]').html(total);
	}

/*!
 * Instancia una transacción vacía con los datos del usuario
 * 
 * @author juanpablob
 * @since 2014-08-19
 * @return void
 */
	this.createCart = function() {
		json.transactions.push({
			person_id: person.id,
			products: []
		});

		cart = json.transactions.length -1;
	}

/*!
 * Cancelar la compra
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
 * 	10s de iddle
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
				url: 'assets/gtw/pushTransactions.php',
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
	self.sendCarts();

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
		$.getJSON('assets/gtw/persons.json', function(data) {
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
		$.getJSON('assets/gtw/products.json', function(data) {
			json.products = data;

			setTimeout(function() {
				self.getProducts();
			}, (1000 * 60));
		});
	}

/*!
 * Control de inactividad
 *
 * Si el usuario tiene mas de 10s de inactividad se toma como confirmada la compra
 * @author vsanmartin
 * @since 2014-08-19
 * @return void
 */
	this.idleTime = function() {
		if (state == 2) {
			idle--;

			if (idle <= 0) {
				self.confirm();
				idle = 10;
			}
		}
		else {
			idle = 10;
		}

		setTimeout(function() {
			self.idleTime();
		}, 1000);
	}
	self.idleTime();

/*!
 * Mantiene el foco siempre en el input correcto de acuerdo al estado
 * 
 * @author vsanmartin
 * @since 2014-08-19
 * @return void
 */
	this.autoFocus = function() {
		if (state == 1) {
			$('input#passport').focus();
		}
		else if (state == 2) {
			$('#product_code').focus();
		}

		setTimeout(function() {
			self.autoFocus();
		}, 500);
	}
	self.autoFocus();

	self.init();
};

$(document).ready(kiosko);