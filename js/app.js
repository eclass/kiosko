var kiosko = function() {

	var init = function() {
		home();	
	}
	init();


	var home = function() {
		$('documento').on('keyup', function(e) {
			if (e.keyCode == 32) {
				alert('enter');
			}
		});
	}

	var voucher = function() {

	}

};

$(document).ready(kiosko);