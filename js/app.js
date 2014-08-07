var kiosko = function() {
	var self = this;

	var session_products;

	this.init = function() {
		this.home();	
	}


	this.home = function() {
		$('input#documento')
			.focus()
			.on('keypress', function(e) {
				var code = e.keyCode || e.which;
				if (code == 13) {
					
				}
			});
	}

	this.voucher = function() {
		var empty_voucher = $('.empty-voucher');
			voucher = $('.voucher');

		

		if(session_products.length > 0) {

		}
	}

	this.init();
};

$(document).ready(kiosko);