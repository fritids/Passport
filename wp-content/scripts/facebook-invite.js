var fbInvite;

;(function() {
	
	var THIS;
	var APP_ID = '271915746217211';
	function FacebookInvite() {
		THIS = this;
		this.bindHandlers();
	}

   
	FacebookInvite.prototype.bindHandlers = function() {
   		$('.trigger-facebook-invite-friends').bind('click', this.launchFacebookInviter);
	};
	
	FacebookInvite.prototype.launchFacebookInviter = function(e){
		/*
		FB.ui({method: 'apprequests',
          message: 'Join Denizen!!!'
        }, THIS.onFriendsSelected);
        */
		//read_friendlists
		var school = $('meta[property="og:title"]').attr('content');
		FB.ui({
			method: 'send',
			name: school + ' on the Denizen Network',
			link: window.location.href,
			description: 'Join other classmates from ' + school + ' to find out about other happenings at International Schools and for Third Culture Kids'
		});
	};
	
	FacebookInvite.prototype.onFriendsSelected = function(friends){
		console.log(friends);
	}
	
	fbInvite = new FacebookInvite();

})();