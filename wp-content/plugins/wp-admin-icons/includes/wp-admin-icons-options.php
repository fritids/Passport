<div class="wrap">
  <h2>WP-Admin Icons <span class="whoBy">By: <a href="http://www.wordimpress.com" target="_blank">Devin Walker</a></span></h2>
  <div class="adminFacebook">
    <iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FWordImpressed%2F130943526946924&amp;layout=standard&amp;show_faces=false&amp;width=450&amp;action=like&amp;colorscheme=light&amp;height=28" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:28px;" allowTransparency="true"></iframe>
  </div>
  <div class="moreOptions">
    <h4>More Useful Options</h4>
    <p>Hide all admin icons?</p>
    <form method="post" action="options.php">
      <?php settings_fields( 'icons-settings-group-more' ); ?>
      <?php $options = get_option('admin-icons-options-more'); ?>
      <input type="checkbox" value="true" name="admin-icons-options-more[removeIcons]" <?php $removeIcons = $options['removeIcons']; if($removeIcons == "true") { echo 'checked'; } ?> >
      <p>Hide the WordPress Logo?</p>
      <input type="checkbox" value="true" name="admin-icons-options-more[removeLogo]" <?php $removeLogo = $options['removeLogo']; if($removeLogo == "true") { echo 'checked'; } ?> >
      <p class="submit">
        <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
      </p>
    </form>
  </div>
  <div class="credits">
    <h3>Thanks for Using WP-Admin-Icons</h3>
    <p>A Plugin to easily set your WordPress Admin Icons by <strong><a href="http://www.devinwalker.net">Devin Walker</a></strong> from <a href="http://www.wordimpressed.com" target="_blank">WordImpressed</a>.</p>
    <h4>How to Use:</h4>
    <p>Using WP-Admin-Icons is easy, simply choose an icon from the list and then the icon you'd like to replace using the drop-down selection and click submit.  If you'd like to clear that icon simple click "Clear Icon".</p>
    <h4>What this Plugin Does:</h4>
    <p>This plugin allows you to replace nearly all default icons in the WordPress admin interface. <strong>This plugin supports custom post types</strong>.</p>
  </div>
  <table class="widefat wpAdminIconsTable">
    <thead>
      <tr>
        <th>Use an WP-Admin Icon</th>
      </tr>
    </thead>
    <tr valign="top">
      <th> <ul class="iconList">
        </ul>
      </th>
    </tr>
  </table>
  <table class="widefat myWpAdminIconsTable">
    <thead>
      <tr>
        <th>Use Your Own Icon</th>
      </tr>
    </thead>
    <tr valign="top">
      <th> <ul class="myIconList">
        </ul>
      </th>
    </tr>
  </table>
  <table class="widefat iconsTable" align="left">
    <thead>
      <tr>
        <th>Choose an Icon</th>
        <th class="explain">Explanation</th>
      </tr>
    </thead>
    <tr valign="top">
      <th> <script type="text/javascript">
	jQuery(function(){ 
	
		jQuery(".loadMyIcons").click(function() {
			
			jQuery(".myIconList").load('<?php bloginfo('url');?>/wp-content/plugins/wp-admin-icons/includes/showfiles-upload.php li', function(response, status) {
					  if (status == "success") {
						  
						
						jQuery(".myWpAdminIconsTable").slideDown('fast');
						
						
					  } else {
						alert('There was a problem loading the icons.');			  
					  };
						 
					jQuery(".myIconList li").click(function()  {
				
							var message = jQuery(this).html();
							
							var iconSrc = jQuery(message).attr("src");
							// if there's no icon already in the changer box then add one
							
							if(jQuery(".iconChangerBox, #newIconHiddenField").html('')) {
								
								jQuery(".iconsTable").slideUp("fast");
								
								jQuery(".myIconsTable").slideUp("fast");
								
								jQuery(this).remove('div.noIcon');
								
								jQuery(".iconChangerBox").append("<ul><li>"+message+"</li></ul>");
								
								jQuery("#newIconHiddenField").append("<p>"+iconSrc+"</p>");
								
								
											
						}
			
						jQuery(".clearIcon").click(function() {
							jQuery(".setIconTable .iconChangerBox ul").remove();
							jQuery(".iconsTable").slideDown("fast");
							
						});
					
					});
	  
				});
			});// end: .loadMyIcons  
					
		jQuery(".loadIcons").click(function(){ 
		
			
				
			
			jQuery(".iconList").load('<?php bloginfo('url');?>/wp-content/plugins/wp-admin-icons/includes/showfiles.php li', function(response, status) {
				  if (status == "success") {
					
					var msg = "Sorry but there was an error: ";
					
					jQuery(".wpAdminIconsTable").slideDown('fast');
					
					
						jQuery(".iconList").append("<a href='#' class='moreIcons'>More Icons</a>");
					
					
				  }else {
					alert('There was a problem loading the icons.');			  
				  }
				  
				jQuery(".iconList li").click(function()  {
			
			window.scrollTo(0,jQuery(".iconChangerBox").offset().top);
					
						var message = jQuery(this).html();
						
						var iconSrc = jQuery(message).attr("src");
						// if there's no icon already in the changer box then add one
						
						if(jQuery(".iconChangerBox, #newIconHiddenField").html('')) {
							
							jQuery(".iconsTable").slideUp("fast");
							
							jQuery(".myIconsTable").slideUp("fast");
							
							jQuery(this).remove('div.noIcon');
							
							jQuery(".iconChangerBox").append("<ul><li>"+message+"</li></ul>");
							
							jQuery("#newIconHiddenField").append("<p>"+iconSrc+"</p>");
										
					}
		
					jQuery(".clearIcon").click(function() {
						jQuery(".setIconTable .iconChangerBox ul").remove();
						jQuery(".iconsTable").slideDown("fast");
						
					});
				
				});// end: .loadIcons click 
				
		
				jQuery('.moreIcons').click(function(){ 
				
				
			jQuery(".iconList").html('<div><p>LOADING</p></div>');	
				
					jQuery(".iconList").load('<?php bloginfo('url');?>/wp-content/plugins/wp-admin-icons/includes/showMoreFiles.php li', function(response, status) {
				  if (status == "success") {
					
					var msg = "Sorry but there was an error: ";
					
					jQuery(".wpAdminIconsTable").slideDown('fast');
					
					
						jQuery(".iconList").append("<a href='#' class='moreIcons2'>More Icons</a>");
					
					
				  }else {
					alert('There was a problem loading the icons.');			  
				  }
				  
				  jQuery(".iconList li").click(function()  {
					  
						window.scrollTo(0,jQuery(".iconChangerBox").offset().top);
			
						var message = jQuery(this).html();
						
						var iconSrc = jQuery(message).attr("src");
						// if there's no icon already in the changer box then add one
						
						if(jQuery(".iconChangerBox, #newIconHiddenField").html('')) {
							
							jQuery(".iconsTable").slideUp("fast");
							
							jQuery(".myIconsTable").slideUp("fast");
							
							jQuery(this).remove('div.noIcon');
							
							jQuery(".iconChangerBox").append("<ul><li>"+message+"</li></ul>");
							
							jQuery("#newIconHiddenField").append("<p>"+iconSrc+"</p>");
										
					}
		
					jQuery(".clearIcon").click(function() {
						jQuery(".setIconTable .iconChangerBox ul").remove();
						jQuery(".iconsTable").slideDown("fast");
						
					});
				
				});// end: .moreIcons click 
				
				
				jQuery('.moreIcons2').click(function(){ 
				
					jQuery(".iconList").html('<div><p>LOADING</p></div>');	
				
					
				jQuery(".iconList").load('<?php bloginfo('url');?>/wp-content/plugins/wp-admin-icons/includes/showMoreFiles2.php li', function(response, status) {
				  if (status == "success") {
					
					var msg = "Sorry but there was an error: ";
					
					jQuery(".wpAdminIconsTable").slideDown('fast');
					
					
						jQuery(".iconList").append("<a href='#' class='moreIcons3'>More Icons</a>");
					
					
				  }else {
					alert('There was a problem loading the icons.');			  
				  }
				  
				    jQuery(".iconList li").click(function()  {
						
							
				
						
						window.scrollTo(0,jQuery(".iconChangerBox").offset().top);
			
						var message = jQuery(this).html();
						
						var iconSrc = jQuery(message).attr("src");
						// if there's no icon already in the changer box then add one
						
						if(jQuery(".iconChangerBox, #newIconHiddenField").html('')) {
							
							jQuery(".iconsTable").slideUp("fast");
							
							jQuery(".myIconsTable").slideUp("fast");
							
							jQuery(this).remove('div.noIcon');
							
							jQuery(".iconChangerBox").append("<ul><li>"+message+"</li></ul>");
							
							jQuery("#newIconHiddenField").append("<p>"+iconSrc+"</p>");
										
					}
		
					jQuery(".clearIcon").click(function() {
						jQuery(".setIconTable .iconChangerBox ul").remove();
						jQuery(".iconsTable").slideDown("fast");
						
						});
				 
				 
				 	 }); // end: moreIcons2
					 
					 jQuery('.moreIcons3').click(function(){ 
					 
					 	jQuery(".iconList").html('<div><p>LOADING</p></div>');	
				
					
						jQuery(".iconList").load('<?php bloginfo('url');?>/wp-content/plugins/wp-admin-icons/includes/showMoreFiles3.php li', function(response, status) {
						  if (status == "success") {
							
							var msg = "Sorry but there was an error: ";
							
							jQuery(".wpAdminIconsTable").slideDown('fast');
							
							
								jQuery(".iconList").append("<a href='#' class='moreIcons4'>More Icons</a>");
							
							
						  }else {
							alert('There was a problem loading the icons.');			  
						  }
						  
					 jQuery(".iconList li").click(function()  {						 
						 
						window.scrollTo(0,jQuery(".iconChangerBox").offset().top);
			
						var message = jQuery(this).html();
						
						var iconSrc = jQuery(message).attr("src");
						// if there's no icon already in the changer box then add one
						
						if(jQuery(".iconChangerBox, #newIconHiddenField").html('')) {
							
							jQuery(".iconsTable").slideUp("fast");
							
							jQuery(".myIconsTable").slideUp("fast");
							
							jQuery(this).remove('div.noIcon');
							
							jQuery(".iconChangerBox").append("<ul><li>"+message+"</li></ul>");
							
							jQuery("#newIconHiddenField").append("<p>"+iconSrc+"</p>");
										
					}
		
					jQuery(".clearIcon").click(function() {
						jQuery(".setIconTable .iconChangerBox ul").remove();
						jQuery(".iconsTable").slideDown("fast");
						
						});
				 
				 
				 	 }); // end: moreIcons2
				  
					
					 jQuery('.moreIcons4').click(function(){ 
					 
					 	jQuery(".iconList").html('<div><p>LOADING</p></div>');	
				
					 
						jQuery(".iconList").load('<?php bloginfo('url');?>/wp-content/plugins/wp-admin-icons/includes/showMoreFiles4.php li', function(response, status) {
						  if (status == "success") {
							
							var msg = "Sorry but there was an error: ";
							
							jQuery(".wpAdminIconsTable").slideDown('fast');
							
							
								//jQuery(".iconList").append("<a href='#' class='moreIcons4'>More</a>");
							
							
						  }else {
							alert('There was a problem loading the icons.');			  
						  }
						  
						   jQuery(".iconList li").click(function()  {
							   
							    window.scrollTo(0,jQuery(".iconChangerBox").offset().top);
			
								var message = jQuery(this).html();
								
								var iconSrc = jQuery(message).attr("src");
								// if there's no icon already in the changer box then add one
								
								if(jQuery(".iconChangerBox, #newIconHiddenField").html('')) {
									
									jQuery(".iconsTable").slideUp("fast");
									
									jQuery(".myIconsTable").slideUp("fast");
									
									jQuery(this).remove('div.noIcon');
									
									jQuery(".iconChangerBox").append("<ul><li>"+message+"</li></ul>");
									
									jQuery("#newIconHiddenField").append("<p>"+iconSrc+"</p>");
												
							}
		
					jQuery(".clearIcon").click(function() {
						jQuery(".setIconTable .iconChangerBox ul").remove();
						jQuery(".iconsTable").slideDown("fast");
						
						});
				 
				 
				 	 }); // end: moreIcons2
				  
						  
					});
					
					});
					 
					});
					
					
					});
				  
				   });
					
				});
				
				
			}); 
			 
		});
			
	});
			
});// load uploaded icons
		
		
});
		
		
		
     </script> 
        <a href="#" class="loadIcons">Show Admin Icons</a> </th>
      <th><p class="explanation">Check out some of our 1800+ WP admin icons you can use!</p>
      </th>
    <tr>
      <th> <a href="#" class="loadMyIcons">Show My Uploaded Icons</a><br/>
      </th>
      <th><p class="explanation">Have your own icon?  <a href="#" id="uploadShow">Upload</a> and use it.  Please note: Must me a PNG and similar same canvas size as included icons.</p>
      </th>
    </tr>
    
    
  </table>
  
   <table class="widefat uploadIconTable">
   	<thead>
    <tr>
        <th>Upload Your Own</th>
    </tr>
    </thead>
    <tr valign="top">
   
   
    
    <th>
  
   <p>Uploaded icons will appear in the "My Admin Icons" section after upload.  Please use .png files as icons.</p>
	<form name="newad" method="post" enctype="multipart/form-data" action="<?php bloginfo('url');?>/wp-content/plugins/wp-admin-icons/includes/uploader.php">
	 <table class="uploader">
	 	<tr><td><input type="file" name="icon"></td></tr>
	 	<tr><td><input name="Submit" type="submit" value="Upload"  class="button-primary"></td></tr>
	 </table>	
	</form>
    
    
    </th>
    
    
    </tr>
    
    
    
    </table><!-- end icons table -->
  
  <form method="post" action="options.php">
    <?php settings_fields( 'icons-settings-group' ); ?>
    <?php $options = get_option('admin-icons-options'); ?>
    <table class="widefat setIconTable">
      <thead>
        <tr>
          <th>New Icon</th>
          <th>Icon to Replace</th>
          <th>Save Changes</th>
        </tr>
      </thead>
      <tr>
        <td class="iconChangerBox"><div class="noIcon">None</div></td>
        <td><div id="newIconHiddenField"></div>
          
          <!-- Admin icons drop down -->
          
          <select name="admin-icons-options[iconToReplace]" value="<?php echo $options['iconToReplace']; ?>" id="iconDropDown" onchange="selectIcon">
            <option select="selected">Select...</option>
            <option value="dashboard">Dashboard</option>
            <option value="posts">Posts</option>
            <option value="media">Media</option>
            <option value="links">Links</option>
            <option value="pages">Pages</option>
            <option value="comments">Comments</option>
            <option value="appearance">Appearance</option>
            <option value="plugins">Plugins</option>
            <option value="users">Users</option>
            <option value="tools">Tools</option>
            <option value="settings">Settings</option>
            <?php 
				$args = array (
				'_builtin' => false
				);
				$post_types=get_post_types($args,'names'); 
					foreach ($post_types as $post_type ) {
						 $postTypeName = explode('-', $post_type);
					  echo ' <option value="'.$postTypeName[0] .'">' . $post_type. '</option>';
					}
			?>
          </select></td>
        <td><p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
          </p></td>
      </tr>
    </table>
    
     
    
    
    <table class="widefat setIconTable">
      <thead>
        <tr>
          <th>Icon Type</th>
          <th>Current Icon</th>
          <th>Clear Icon</th>
        </tr>
      </thead>
      <tr valign="top">
        <td><p>Dashboard</p></td>
        <td><div class="currentIcon"><img src="<?php echo $options['dashboardIconURL']; ?>" /></div>
          <input type="text" name="admin-icons-options[dashboardIconURL]" value="<?php echo $options['dashboardIconURL']; ?>" id="new-dashboard-icon" class="hiddenField" /></td>
        <td><div class="submit clearIconWrap">
            <input type="submit" class="button-primary clearIcon" value="Clear Icon" onclick="this.value = '';" name="admin-icons-options[dashboardIconURL]" />
          </div></td>
      </tr>
      <tr valign="top">
        <td><p>Posts</p></td>
        <td><div class="currentIcon"><img src="<?php echo $options['postIconURL']; ?>" /></div>
          <input type="text" name="admin-icons-options[postIconURL]" value="<?php echo $options['postIconURL']; ?>" id="new-posts-icon" class="hiddenField" /></td>
        <td><div class="submit clearIconWrap">
            <input type="submit" class="button-primary clearIcon" value="Clear Icon" onclick="this.value = '';" name="admin-icons-options[postIconURL]" />
          </div></td>
      </tr>
      <tr valign="top">
        <td><p>Media</p></td>
        <td><div class="currentIcon"><img src="<?php echo $options['mediaIconURL']; ?>" /></div>
          <input type="text" name="admin-icons-options[mediaIconURL]" value="<?php  echo $options['mediaIconURL'];?>" id="new-media-icon" class="hiddenField" /></td>
        <td><div class="submit clearIconWrap">
            <input type="submit" class="button-primary clearIcon" value="Clear Icon" onclick="this.value = '';" name="admin-icons-options[mediaIconURL]" />
          </div></td>
      </tr>
      <tr valign="top">
        <td><p>Links</p></td>
        <td><div class="currentIcon"><img src="<?php echo $options['linksIconURL']; ?>" /></div>
          <input type="text" name="admin-icons-options[linksIconURL]" value="<?php  echo $options['linksIconURL'];?>" id="new-links-icon"  class="hiddenField" /></td>
        <td><div class="submit clearIconWrap">
            <input type="submit" class="button-primary clearIcon" value="Clear Icon" onclick="this.value = '';" name="admin-icons-options[linksIconURL]" />
          </div></td>
      </tr>
      <tr valign="top">
        <td><p>Pages</p></td>
        <td><div class="currentIcon"><img src="<?php echo $options['pagesIconURL']; ?>" /></div>
          <input type="text" name="admin-icons-options[pagesIconURL]" value="<?php  echo $options['pagesIconURL'];?>" id="new-pages-icon"  class="hiddenField" /></td>
        <td><div class="submit clearIconWrap">
            <input type="submit" class="button-primary clearIcon" value="Clear Icon" onclick="this.value = '';" name="admin-icons-options[pagesIconURL]" />
          </div></td>
      </tr>
      <tr valign="top">
        <td><p>Comments</p></td>
        <td><div class="currentIcon"><img src="<?php echo $options['commentsIconURL']; ?>" /></div>
          <input type="text" name="admin-icons-options[commentsIconURL]" value="<?php  echo $options['commentsIconURL'];?>" id="new-comments-icon"  class="hiddenField" /></td>
        <td><div class="submit clearIconWrap">
            <input type="submit" class="button-primary clearIcon" value="Clear Icon" onclick="this.value = '';" name="admin-icons-options[commentsIconURL]" />
          </div></td>
      </tr>
      <tr valign="top">
        <td><p>Appearance</p></td>
        <td><div class="currentIcon"><img src="<?php echo $options['appearanceIconURL']; ?>" /></div>
          <input type="text" name="admin-icons-options[appearanceIconURL]" value="<?php  echo $options['appearanceIconURL'];?>" id="new-appearance-icon"  class="hiddenField" /></td>
        <td><div class="submit clearIconWrap">
            <input type="submit" class="button-primary clearIcon" value="Clear Icon" onclick="this.value = '';" name="admin-icons-options[appearanceIconURL]" />
          </div></td>
      </tr>
      <tr valign="top">
        <td><p>Plugins</p></td>
        <td><div class="currentIcon"><img src="<?php echo $options['pluginsIconURL']; ?>" /></div>
          <input type="text" name="admin-icons-options[pluginsIconURL]" value="<?php  echo $options['pluginsIconURL'];?>" id="new-plugins-icon"  class="hiddenField" /></td>
        <td><div class="submit clearIconWrap">
            <input type="submit" class="button-primary clearIcon" value="Clear Icon" onclick="this.value = '';" name="admin-icons-options[pluginsIconURL]" />
          </div></td>
      </tr>
      <tr valign="top">
        <td><p>Users</p></td>
        <td><div class="currentIcon"><img src="<?php echo $options['usersIconURL']; ?>" /></div>
          <input type="text" name="admin-icons-options[usersIconURL]" value="<?php  echo $options['usersIconURL'];?>" id="new-users-icon"  class="hiddenField" /></td>
        <td><div class="submit clearIconWrap">
            <input type="submit" class="button-primary clearIcon" value="Clear Icon" onclick="this.value = '';" name="admin-icons-options[usersIconURL]" />
          </div></td>
      </tr>
      <tr valign="top">
        <td><p>Tools</p></td>
        <td><div class="currentIcon"><img src="<?php echo $options['toolsIconURL']; ?>" /></div>
          <input type="text" name="admin-icons-options[toolsIconURL]" value="<?php  echo $options['toolsIconURL'];?>" id="new-tools-icon"  class="hiddenField" /></td>
        <td><div class="submit clearIconWrap">
            <input type="submit" class="button-primary clearIcon" value="Clear Icon" onclick="this.value = '';" name="admin-icons-options[toolsIconURL]" />
          </div></td>
      </tr>
      <tr valign="top">
        <td><p>Settings</p></td>
        <td><div class="currentIcon"><img src="<?php echo $options['settingsIconURL']; ?>" /></div>
          <input type="text" name="admin-icons-options[settingsIconURL]" value="<?php  echo $options['settingsIconURL'];?>" id="new-settings-icon"  class="hiddenField" /></td>
        <td><div class="submit clearIconWrap">
            <input type="submit" class="button-primary clearIcon" value="Clear Icon" onclick="this.value = '';" name="admin-icons-options[settingsIconURL]" />
          </div></td>
      </tr>
      <?php 
				$args = array (
				'_builtin' => false
				);
				$post_types=get_post_types($args,'names'); 
					foreach ($post_types as $post_type ) {
					  echo '<tr valign="top"><td><p>'.$post_type .'</p></td>';
					  $postTypeName = explode('-', $post_type);
					
					  $thisPostTypeOption =  $postTypeName[0].'IconURL';
					
					  
					  
					  
					  echo '<td><div class="currentIcon"><img src="'.$options[$thisPostTypeOption].'" />';
					  
					  echo '</div><input type="text" name="admin-icons-options['.$thisPostTypeOption.']" value="'.$options[$thisPostTypeOption];
					 
					  echo '" id="new-'.$postTypeName[0].'-icon"  class="hiddenField" /></td>';
					  
					   echo '<td> <div class="submit clearIconWrap"><input type="submit" class="button-primary clearIcon" value="Clear Icon" onclick="this.value = \'\';" name="admin-icons-options['.$thisPostTypeOption.']" />
    </div></td>';
					  
					   echo '</tr>';
					}
			?>
    </table>
    <p class="submit">
      <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>
  </form>
</div>