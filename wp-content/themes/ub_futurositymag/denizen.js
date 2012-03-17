;(function($){
	$(window).load(trimFeaturedColumns);
	$(document).ready(function(){
		trace('hi');
		if (!$('body').hasClass('home')){
			$('#get_recent_comments_wrap li:gt(2)').remove();
		} else {
			//home page
			$('#jtw_widget div').first().hide();
		}
		$('a[href="#"]').click(function(e){
			e.preventDefault();
		});
		
	});
	
	function trace(s) {
		try { console.log(s) } catch (e) {  }
	}
	
	
	function trimFeaturedColumns() {
	
	$('body.home ul.latest span.group').each(function(){
		var li = $(this);
		var bottom = 1060;
		if(li.offset().top+li.height() > bottom) {
			li.hide();
			}
		});
	
	
	}
	
})(jQuery);