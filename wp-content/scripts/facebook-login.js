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
	};
	
	FacebookLogin.prototype.launchFacebookLogin = function(e){
		FB.login(THIS.onFacebookLogin, {scope:'email, publish_stream, publish_checkins'});
	};
	
	FacebookLogin.prototype.onFacebookLogin = function(response){
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