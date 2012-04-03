var passport;

;(function() {

	function Passport() {
		this.bindHandlers();
	}
	
	Passport.prototype.bindHandlers = function() {
		$('.content-editable').bind('blur', this.onContentEditableEdited);
		$('a[href="#"]').bind('click', this.preventDefault);
	};
	
	Passport.prototype.preventDefault = function(e){
		e.preventDefault();
	}	
	
	Passport.prototype.onContentEditableEdited = function(e){
		var field = $(this).data('field');
		var table = $(this).data('table');
		var data = $(this).html();
		$.post('/wp-content/scripts/ajax.php', {action:'update_user_info', data:data, field:field}, trace);
	};
	
	passport = new Passport();
	
	function trace(msg){
		console.log(msg);
	}

})();