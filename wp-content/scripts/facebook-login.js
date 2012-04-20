var fbLogin;
var APP_ID = '271915746217211';
var THIS;

;(function() {

	function FacebookLogin() {
		THIS = this;
		this.bindHandlers();
		this.model = new FacebookLoginModel();
	}

   
	FacebookLogin.prototype.bindHandlers = function() {
   		$('.trigger-facebook-login').bind('click', this.launchFacebookLogin);
   		$('.comment-submit').bind('click', this.sendFacebookComment);
	};
	
	FacebookLogin.prototype.sendFacebookComment = function(e){
		e.preventDefault();
		var comment = $('#comment').val();
		var attach = {};
		attach.name = $('.entry-title').text();
		attach.href = $('link[rel=canonical]').attr('href');
		attach.description = $('.left-col .excerpt').text();
		attach.picture = $('.entry-content img.size-full').first().attr('src');
		//attach.picture = $('meta[property="og:image"]').attr('content');
		attach.action = 'Read';
		astring = $.param(attach);
		//picture:''+attach.picture
		FB.api('/me/feed', 'post', {message:''+comment, link:attach.href, caption:"Denizen: For Third Culture Kids", description:attach.description, name:attach.name, picture:''+attach.picture, actions:{name:attach.action, link:attach.href}}, function(response){
			trace('response');
			trace(response);
			if (!response || response.error){
				alert('Sorry, there was an error posting your comment to Facebook');
			} else {
				trace('susccess');
				trace(response);
				//alert('post id = ' + response.id);
			}
			$('#submit').unbind('click').click();
		});
	}
	
	FacebookLogin.prototype.onFacebookCommentSent = function(response){
	
	};
	
	FacebookLogin.prototype.launchFacebookLogin = function(e){
		e.preventDefault();
		FB.login(THIS.onFacebookLogin, {scope:'email, publish_stream'});
	};
	
	FacebookLogin.prototype.onFacebookLogin = function(response){
		$('#message-center').addClass('show');
		if (response.authResponse){
			//success
			FB.api('/me', THIS.onFacebookData);
		} else {
			this.onFacebookError();
		}
	};
	
	FacebookLogin.prototype.onFacebookError = function(){
		trace('Error');
	};
	
	FacebookLogin.prototype.onFacebookData = function(user){
		if (user){
			THIS.model.login(user);
		}
	};
	
	FacebookLogin.prototype.onWordPressLogin = function(data){
		trace(data);
		if (data == 'success'){
			window.location = window.location;
		}
	}
	
	function FacebookLoginModel(){
		this.load();
		this.init();
	}
	
	FacebookLoginModel.prototype.load = function(){
	}
	
	FacebookLoginModel.prototype.login = function(user){
		trace(user);
		$.post('/wp-content/scripts/facebook-login.php', {user:user}, THIS.onWordPressLogin);
	};
	
	FacebookLoginModel.prototype.init = function(){
		window.fbAsyncInit = function() {
			FB.init({
			  appId      : APP_ID, 
			  channelUrl : '//'+document.domain+'/wp-content/scripts/js/facebook-channel.php',
			  status     : true, // check login status
			  cookie     : true, // enable cookies to allow the server to access the session
			  xfbml      : true  // parse XFBML
			});
			// Additional initialization code here
			console.log('Facebook Connection Established');
		};
		
	};	
	
	fbLogin = new FacebookLogin();

})();

function trace(msg){
	try {
		console.log(msg);
	} catch(e){
	}
}