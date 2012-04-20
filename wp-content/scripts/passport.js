var passport;

;(function() {

	function Passport() {
		this.bindHandlers();
	}
	
	Passport.prototype.bindHandlers = function() {
		$('.content-editable').live('blur', this.onContentEditableEdited);
		$('a[href="#"]').bind('click', this.preventDefault);
		$('#whats-new').bind('focus', this.onActivityFocus);
		$('#aw-whats-new-submit').hide();
		$('.trigger-close-modal').bind('click', this.closeModal);
		$('.acomment-reply').bind('click', this.activateComment);
		$('.trigger-edit-mode').live('click', this.toggleEditMode);
		
	};
	
	Passport.prototype.toggleEditMode = function(e){
		var a = $(this);
		$('body').toggleClass('edit-mode');
		if ($('body').hasClass('edit-mode')){
			var safeText = a.text();
			a.data('safe-text', safeText);
			a.text('Done Editing');
		} else {
			a.text(a.data('safe-text'));
		}
	}
	
	Passport.prototype.activateComment = function(e){
		e.preventDefault();
		var li = $(this).closest('li');
		li.find('.ac-form').slideDown();
	
	}
	
	Passport.prototype.closeModal = function(e){
		e.preventDefault();
		if ($.modal){
			$.modal.close();
		}
	}
	
	Passport.prototype.preventDefault = function(e){
		e.preventDefault();
	}	
	
	Passport.prototype.onActivityFocus = function(e){
		$('#aw-whats-new-submit').fadeIn();
	}
	
	Passport.prototype.onContentEditableEdited = function(e){
		var field = $(this).data('field');
		var table = $(this).data('table');
		var data = $(this).html();
		trace('Save data');
		$.post('/wp-content/scripts/ajax.php', {action:'update_user_info', data:data, field:field}, trace);
	};
	
	passport = new Passport();
	
	function trace(msg){
		console.log(msg);
	}
	
	

})();

;(function() {
	function PassportUploader() {
		this.bindHandlers();
	}
	
	PassportUploader.prototype.bindHandlers = function() {
		$('.trigger-drag-upload').fileupload({
			dataType: 'json',
			done: function (e, data) {
				$.each(data.result, function (index, file) {
					$('<p/>').text(file.name).appendTo(document.body);
				});
			}
		});
	}
})();

