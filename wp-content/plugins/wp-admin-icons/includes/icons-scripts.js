jQuery(document).ready(function() {
	
	
	jQuery("#iconDropDown").change(function() {
		
		var setIconDropDownValue = jQuery(this).val();
		
		var iconToReplace = jQuery("#newIconHiddenField").text();
		
		var iconToReplaceValue = jQuery("#new-"+setIconDropDownValue+"-icon").val();
		
		
		if(iconToReplaceValue == '') {
			
			jQuery("#new-"+setIconDropDownValue+"-icon").val(iconToReplace);
			
		} else {
			var anwser = confirm("Are you sure you want to replace the icon already in place?")
				if(anwser) {
						jQuery("#new-"+setIconDropDownValue+"-icon").val(iconToReplace)
				} else {
					
				};
		};
	});
	
	jQuery(".clearIconWrap").click(function() {
		jQuery(this).append("<p>Working...</p>");
		
	});
	
	jQuery("#uploadShow").click(function() {
		jQuery(".uploadIconTable").slideDown();
	});
	
});