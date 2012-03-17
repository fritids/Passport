  <script type="text/javascript">
	jQuery(function(){ 
					
		jQuery(".loadIcons").click(function(){ 
			jQuery("#icons").load('<?php bloginfo('url');?>/wp-content/plugins/wp-admin-icons/includes/showfiles.php .iconList', function(response, status) {
				  if (status == "success") {
					  alert('success2');	
					var msg = "Sorry but there was an error: ";
					
				  }else {
					alert('fail');			  
				  }
		
			});
		});
		});
     </script>