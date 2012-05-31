var passport;

;(function() {

	var THIS;

	function Passport() {
		THIS = this;
		this.bindHandlers();
		this.moveSomeDivs();
		this.initDragUpload();
	}
	
	Passport.prototype.moveSomeDivs = function(){
		$('.school-my-member-info').after($('.group-subscription-div'));
	}
	
	Passport.prototype.initDragUpload = function(){
		$('input[type="file"]').dropUpload({
			'uploadUrl'		 : '/wp-content/scripts/ajax-upload.php',
			'uploaded'		 : THIS.onDragUpload,
			'hoverText'		 : 'Let go to upload!',
			'dropTarget'	: '.trigger-drag-upload',
			'params':{'gid':$('#gid').val()},
		});
	}
	
	Passport.prototype.onDragUpload = function(data){
		console.log(data);
		data = JSON.parse(data);
		console.log(data);
		var img = $('.trigger-drag-upload');
		if (!img.attr('src')){
			img = img.find('img');
		}
		var filename = data.url.substring(data.url.lastIndexOf('/')+1);
		///wp-content/image.php/school-avatar.jpg?image=/wp-content/themes/ub_futurositymag/images/school-avatar.jpg&amp;width=234" class="trigger-drag-upload file-drop"></img>
		var path = data.url.replace(document.domain, '');
		path = path.replace('http://', '');
		var width = img.width();
		var newSrc = '/wp-content/image.php/'+filename+'?image='+path+'&width='+width;
		img.attr('src', newSrc);
		
	}
	
	Passport.prototype.bindHandlers = function() {
		$('.content-editable').live('blur', this.onContentEditableEdited);
		$('a[href="#"]').bind('click', this.preventDefault);
		$('#whats-new').bind('focus', this.onActivityFocus);
		$('#aw-whats-new-submit').hide();
		$('.trigger-close-modal').bind('click', this.closeModal);
		$('.acomment-reply').bind('click', this.activateComment);
		$('.trigger-edit-mode').live('click', this.toggleEditMode);
		$('.trigger-join-group').bind('click', this.joinGroup);
		$('.trigger-leave-group').bind('click', this.leaveGroup);
		
	};
	
	Passport.prototype.joinGroup = function(e){
		var button = $(this);
		var gid = $('#gid').val();
		$.post('/wp-content/scripts/ajax.php', {gid:gid, action:'member_join_group'}, function(resp){
			button.text('Joined');
		});
		
	};
	
	Passport.prototype.leaveGroup = function(e){
		var button = $(this);
		var gid = $('#gid').val();
		$.post('/wp-content/scripts/ajax.php', {gid:gid, action:'member_leave_group'}, function(){
			button.fadeOut();
		});
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
		var oid = $(this).data('oid');
		var data = $(this).html();
		trace('Save data');
		if (table == 'groupmeta' || table == 'groups'){
			$.post('/wp-content/scripts/ajax.php', {action:'update_group_info', data:data, field:field, gid:oid, table:table}, trace);
		} else {
			$.post('/wp-content/scripts/ajax.php', {action:'update_user_info', data:data, field:field}, trace);
		}
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

