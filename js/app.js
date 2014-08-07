var kiosko = function() {
	var self = this;

	var json = {
		persons: {},
		products: {},
		trasactions: []
	}

	this.init = function() {
		$.getJSON('json/personas.json', function(data) {
			json.persons = data;
			console.log(json);
		});

		this.home();	
	}


	this.home = function() {
		$('input#documento')
			.focus()
			.on('keypress', function(e) {
				var code = e.keyCode || e.which;
				if (code == 13) {
					var documento = $('input#documento');
					if (!documento.val()) {
						alert('Incluya algo');
					}

					if (!this.__isValidDocument(documento.val())) {
						alert('Documento inválido')
					}
				}
			});
	}
	this.__isValidDocument = function(documento) {
		documento = documento.replace(/[^0-9kK]+/g,'').toUpperCase();

		if (documento.length < 7) {
			return false;
		}

		if (!json.persons.hasOwnerProperty(documento)) {
			return false;
		}
	}


	this.voucher = function() {

	}

	this.init();
};

$(document).ready(kiosko);