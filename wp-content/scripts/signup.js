var denizenSignup;

;(function() {

	var THIS;
	var lastInput;
	var scrollable;
	
	function DenizenSignup() {
		THIS = this;
		this.bindHandlers();
	}
   
	DenizenSignup.prototype.bindHandlers = function() {
		if ($('#modal-signup').length){
			$('#modal-signup').modal();
		}
		$('.trigger-add-school-row').bind('click', THIS.addSchoolRow);
		$('.trigger-signup-complete').bind('click', THIS.sendSignupData);
		$('.trigger-signup-cancel').bind('click', THIS.closeSignup);
		$('.signup-school-name').live('click', function(){
			lastInput = $(this);
		});
		THIS.initAutoComplete();
	}
	
	DenizenSignup.prototype.closeSignup = function(){
		$.modal.close();
		$.post('/nomads/add_meta', {key:'no_nag', value:true}, trace);
	}	
	
	DenizenSignup.prototype.initAutoComplete = function(){
		$('.signup-school-name').each(function(){
			$(this).autocomplete({
				serviceUrl:'/schools/auto_complete_search/',
				onSelect:onSchoolSelect,
			});
		});
		
		
		function onSchoolSelect(value, data){
			var input = $('.signup-school-name:focus');
			input.data('id', data);
		}
	};
	
	DenizenSignup.prototype.sendSignupData = function(e){	
		e.preventDefault();
		var schools = new Array();
		$('.signup-school-row:visible').each(function(){
			var row = $(this);
			var obj = {};
			obj.school_name = row.find('.signup-school-name').val();
			obj.school_id = row.find('.signup-school-name').data('id');
			obj.year_start = row.find('.signup-school-year-start').val();
			obj.year_end = row.find('.signup-school-year-end').val();
			if (obj.school_name || obj.school_id){
				schools.push(obj);
			}
		});
		trace(schools);
		$.post('/nomads/schools/add/', {schools:schools}, trace);
		$.modal.close();
	}
	
	DenizenSignup.prototype.onSignup = function(data){
		
	}
	
	DenizenSignup.prototype.addSchoolRow = function(){
		var row = $('.signup-school-row.blank-row').clone();
		row.removeClass('blank-row hidden');
		trace($().jQuery);
		trace($('.signup-school-row:visible'));
		$('.signup-school-row:visible').last().after(row);
		row.hide();
		row.slideDown();
		THIS.initAutoComplete();
	}
	
	$(document).ready(function(){
		denizenSignup = new DenizenSignup();
	});

})();

function trace(msg){
	console.log(msg);
}
