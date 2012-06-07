var denizenSignup;
var denizenUpdate;

;(function() {

	var THIS;
	var lastInput;
	
	function DenizenSignup() {
		THIS = this;
		this.bindHandlers();
		this.init();
	}
   
   	DenizenSignup.prototype.init = function(){
   		THIS.scrollable = $('#modal-signup-scrollable').scrollable({api:true});
   	}
   
	DenizenSignup.prototype.bindHandlers = function() {
		if ($('#modal-signup').length){
			if ($.totalStorage('no-nag')){
			} else {
				$('#modal-signup').modal();
			}
		}
		$('.trigger-add-school-row').bind('click', THIS.addSchoolRow);
		$('.trigger-signup-complete').bind('click', function(e){
			e.preventDefault();
			THIS.sendSignupData();
			THIS.scrollable.next();
		});
		$('.trigger-signup-cancel').bind('click', THIS.closeSignup);
		$('.signup-school-name').live('click', function(){
			lastInput = $(this);
		});
		$('.signup-no-thanks').live('click', function(e){
			$.modal.close();
			$.totalStorage('no-nag', true);
		});
		THIS.initAutoComplete();
	}
	
	DenizenSignup.prototype.closeSignup = function(){
		$.modal.close();
		$.post('/nomads/add_meta', {key:'no_nag', value:true}, trace);
	}	
	
	DenizenSignup.prototype.initAutoComplete = function(){
		$('.signup-school-name').each(function(){
			/*
			$(this).autocomplete({
				serviceUrl:'/wp-content/scripts/ajax.php/',
				params:{action:'get_groups_by_name'},
				onSelect:onSchoolSelect,
			});
			*/
			var input = $(this);
			console.log(input);
			console.log(input.width());
			input.autoComplete({
				ajax:'/wp-content/scripts/ajax-search.php/',
				minChars:3,
				postVar:'query',
				width:530,
				onListFormat:onSchoolResult,
				onSelect:onSchoolSelect,
				striped:'search-result-striped',
				rollover:'search-result-hover'
			});
		});
		
		var userSearch;
		
		function onSchoolResult(event, ui){
			var ul = ui.ul;
			ul.empty();
			ul.removeClass('hasSearch');
			console.log(ui);
			$(event.currentTarget).after(ul);
			userSearch = $(event.currentTarget).val();
			$.each(ui.list, function(i, row){
				var li = $('<li class="search-result-li"></li>');
				var name = $('<span>'+row.name+'</span>');
				li.data('id', row.id);
				li.append(name);
				ul.append(li);
				
			});
		}
		
		function onSchoolFocus(data){
			console.log(data);
		}
		
		function onSchoolSelect(event, ui){
			console.log(ui);
			var input = $('.signup-school-name:focus');
			input.data('id', ui.data.id);
			//input.val(
		}
	};
	
	DenizenSignup.prototype.sendSignupData = function(callback){	
		if (!callback){
			callback = null;
		}
		var schools = new Array();
		
		jQuery('.signup-school-row:visible').each(function(){
			console.log($(this));
			var row = jQuery(this);
			var obj = {};
			var schoolName = $(row.find('.signup-school-name')[0]);
			obj.name = $(schoolName)[0].value;
			//obj.id = row.find('.signup-school-name').data('id');
			var ys = $($(this).find('.signup-school-year-start')[0]);
			obj.year_start = ys.val();
			var ye = $($(this).find('.signup-school-year-end')[0]);
			obj.year_end = ye.val();
			
			if (obj.name || obj.id){
				schools.push(obj);
			}
		});
		
		console.log('sending to ajax');
		$.post('/wp-content/scripts/ajax.php', {groups:schools, action:'save_member_groups'}, callback);
		
	}
	
	DenizenSignup.prototype.onSignup = function(data){
		
	}
	
	DenizenSignup.prototype.addSchoolRow = function(){
		var row = $('.signup-school-row.blank-row').first().clone();
		row.removeClass('blank-row hidden');
		$('.signup-school-row:visible').last().after(row);
		row.hide();
		row.slideDown();
		THIS.initAutoComplete();
		//#modal-signup-scrollable
		//#modal-screen-signup-schools
		var slideHeight = $('#modal-screen-signup-schools').outerHeight() + 40;
		var containerHeight = $('#modal-signup-scrollable').height();
		if (slideHeight > containerHeight){
			console.log('resize!');
			$('#modal-signup-scrollable').css('min-height', slideHeight);
			$(window).trigger('resize');
			$('#simplemodal-container').css('top', '40px');
		}
		
	}
	
	
	
	$(document).ready(function(){
		window.$ = jQuery;
		denizenSignup = new DenizenSignup();
	});

})();

;(function() {

	var THIS;

	function DenizenUpdate() {
		THIS = this;
		this.bindHandlers();
	}
	
	DenizenUpdate.prototype.bindHandlers = function(){
		$('.trigger-add-school-modal').bind('click', THIS.launchAddSchoolModal);
		$('.profile-add-school-submit').bind('click', THIS.saveSchool);
	}
	
	DenizenUpdate.prototype.saveSchool = function(e){
		e.preventDefault();
		$(this).hide();
		var pleaseWait = $('<div class="please-wait">Now Saving</div>');
		$(this).after(pleaseWait);
		denizenSignup.sendSignupData(function(){
			setTimeout(function(){
				console.log('reload!');
				location.reload();
			}, 300);
		});
		
	}
	
	DenizenUpdate.prototype.launchAddSchoolModal = function(){
		$('#add-school-modal').modal();
	}
	
	$(document).ready(function(){
		denizenUpdate = new DenizenUpdate();
	});
	
})();

function trace(msg){
	console.log(msg);
}
