var kiosko = function() {
	var self = this;

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

	}

	this.init();
};

$(document).ready(kiosko);