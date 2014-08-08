/*!
 * Functions, interactions, etc.
 * 
 * @author @questchile, @sbarnachea, @juanpablob
 * @since 2014-08-08
 * @return object
 */
var kiosko = function() {
	var self = this;

	var json = {
		persons: {},
		products: {},
		trasactions: []
	}

	this.init = function() {
		this.__loadJsonPersons();
		this.home();
	}


	this.home = function() {
		$('input#document_number')
			.focus()
			.on('keypress', function(e) {
				var code = e.keyCode || e.which;
				if (code == 13) {
					alert('enter');
					var document_number = $('input#document_number');
					if (!document_number.val()) {
						alert('Incluya algo');
						document_number.val('').focus();
						return false;
					}

					if (!self.__isValidDocument(document_number.val())) {
						alert('Documento inválido');
						document_number.val('').focus();
						return false;
					}

					self.voucher();
				}
			});
	}
	this.__isValidDocument = function(document_number) {
		document_number = document_number.replace(/[^0-9kK]+/g,'').toUpperCase();

		if (document_number.length < 7) {
			return false;
		}

		if (typeof json.persons[document_number] === 'undefined') {
			return false;
		}
		
		return true;
	}



	this.voucher = function() {

	}



	this.__loadJsonPersons = function() {
		$.getJSON('json/personas.json', function(data) {
			json.persons = data;
			setTimeout(function() {
				self.__loadJsonPersons();
			}, ((1000 * 60) * 10));
		});
	}

	this.init();
};

$(document).ready(kiosko);