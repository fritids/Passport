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
			$('#modal-signup').modal();
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
		THIS.initAutoComplete();
	}
	
	DenizenSignup.prototype.closeSignup = function(){
		$.modal.close();
		$.post('/nomads/add_meta', {key:'no_nag', value:true}, trace);
	}	
	
	DenizenSignup.prototype.initAutoComplete = function(){
		$('.signup-school-name').each(function(){
			$(this).autocomplete({
				serviceUrl:'/wp-content/scripts/ajax.php/',
				params:{action:'get_groups_by_name'},
				onSelect:onSchoolSelect,
			});
		});
		
		
		function onSchoolSelect(value, data){
			var input = $('.signup-school-name:focus');
			input.data('id', data);
		}
	};
	
	DenizenSignup.prototype.sendSignupData = function(e){	
		var schools = new Array();
		$('.signup-school-row:visible').each(function(){
			var row = $(this);
			var obj = {};
			obj.name = row.find('.signup-school-name').val();
			obj.id = row.find('.signup-school-name').data('id');
			obj.year_start = row.find('.signup-school-year-start').val();
			obj.year_end = row.find('.signup-school-year-end').val();
			if (obj.name || obj.id){
				schools.push(obj);
			}
		});
		trace(schools);
		$.post('/wp-content/scripts/ajax.php', {groups:schools, action:'save_member_groups'}, trace);
		
	}
	
	DenizenSignup.prototype.onSignup = function(data){
		
	}
	
	DenizenSignup.prototype.addSchoolRow = function(){
		var row = $('.signup-school-row.blank-row').clone();
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
		denizenSignup.sendSignupData(e);
		location.reload();
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
