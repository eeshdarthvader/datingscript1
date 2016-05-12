var app = angular.module('App', [], function($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});
app.controller('FavoritesController', function($scope) {
    $scope.firstName = "John";
    $scope.lastName = "Doe";
    $scope.names=['eesh','john'];
    $scope.users=[];  
    $scope.hiddenusers=[];
    $scope.hiddenuserscount=0;
    
    
    $scope.URL=function(u){
	    
	    return base_url+u;
    };
    
        var page_url;		 
	    
		switch($('div.block-cont h1').html())
		{
			case "Favorites Members": 
			    page_url='favoriteusers';
				break;
			case "Profile visitors":
				page_url='profilevisitors';
				break;
			case "Interested Friends":
				page_url='interestedusers';
			    break;	
			case "Matched Members":
				page_url='matches';
				break;
			case "Liked You":
				page_url='likedyou';
			    break;			    
			case "You Liked":
			   page_url='likes';
			    break;
		}
    
     $scope.showhiddenmembers=function(hiddenusers){
	    	var tgle;
	    	
	    	if($('.hiddenmembers > h2').text()=='Hidden members')
	    	{
		    	$('.hiddenmembers > h2').html('Click to see hidden members <span class="new-list-count ng-binding">'+$scope.hiddenuserscount+'</span>');
		    	tgle=true;
	    	}
	    	else
	    	{
		    	$('.hiddenmembers > h2').text('Hidden members');
		    	tgle=false;
	    	}
	    			
	    	
	     $.ajax({
		       url: base_url+"/users/"+page_url,
		       type: 'POST',
		       dataType: 'json',
		       data: {user_id:''}, 
			       success : function(data) 
			      {		
				      if(!tgle)
				      {$scope.hiddenusers=data.data.hidden;	}
				      else
				      {	$scope.hiddenusers=null;
					      
				      }
				      	
				      		      
				      $scope.$apply(); 
				      
				     			          
				  }
				  ,error:function(data)
				  {
					  console.log(data);
				  }
	     });

	    
    };
    
    
	$(document).on('click', '.report-abuse-reason', function () {   
		
		e.preventDefault();
		$(this).val("");
		$(this).focus();
		
	});

    
    var page_name;		 
	    
		switch($('div.block-cont h1').html())
		{
			case "Favorites Members": 
			    page_name='fav';
				break;
			case "Profile visitors":
				page_name='profile';
				break;
			case "Interested Friends":
				page_name='interested';
			    break;	
			case "Matched Members":
				page_name='matches';
				break;
			case "Liked You":
				page_name='liked';
			    break;			    
			case "You Liked":
			   page_name='likes';
			    break;
		}

   
	if(page_name=='fav')
	{
		 $.ajax({
		       url: base_url+"/users/favoriteusers",
		       type: 'POST',
		       dataType: 'json',
		       data: {user_id:''}, 
			       success : function(data) 
			      {			      
				      
				      $scope.users=data.data.visible;
				      $scope.hiddenuserscount=data.data.hidden.length;
				      
				      $scope.$apply();   
				      
				      
			          
				  }
				  ,error:function(data)
				  {
					  console.log(data);
				  }
	     });
	}   
	else if(page_name=='profile')
	{
		 $.ajax({
		       url: base_url+"/users/profilevisitors",
		       type: 'POST',
		       dataType: 'json',
		       data: {user_id:''}, 
			       success : function(data) 
			      {			      
				      
					  $scope.users=data.data.visible;				      
				      $scope.$apply();   
				      
				      console.log(data.data);  
			          
				  }
	     });
		
	}
	else if(page_name=='interested')
	{
		$.ajax({
		       url: base_url+"/users/interestedusers",
		       type: 'POST',
		       dataType: 'json',
		       data: {user_id:''}, 
			       success : function(data) 
			      {			      
				      
				      $scope.users=data.data.visible;
				      
				      $scope.$apply();   
				      
				      console.log(data.data);  
			          
				  }
	     });

		
	}
	else if(page_name=='liked')
	{
		$.ajax({
		       url: base_url+"/users/likedyou",
		       type: 'POST',
		       dataType: 'json',
		       data: {user_id:''}, 
			       success : function(data) 
			      {			      
				      
				       $scope.users=data.data.visible;
				      
				      $scope.$apply();   
				      
				      console.log(data.data);  
			          
				  }
	     });

	}
	else if(page_name=='likes')
	{
		$.ajax({
		       url: base_url+"/users/likes",
		       type: 'POST',
		       dataType: 'json',
		       data: {user_id:''}, 
			       success : function(data) 
			      {			      
				      
				      $scope.users=data.data.visible;
				      
				      $scope.$apply();   
				      
				      console.log(data.data);  
			          
				  }
	     });

		
	}
	else if(page_name=='matches')
	{
		$.ajax({
		       url: base_url+"/users/matches",
		       type: 'POST',
		       dataType: 'json',
		       data: {user_id:''}, 
			       success : function(data) 
			      {			      
				      
				       $scope.users=data.data.visible;
				      
				      $scope.$apply();   
				      
				      console.log(data.data);  
			          
				  }
	     });

		
	}
	
	
	
	
	
	
	
	
	     
	 //remove from favorites    
	$scope.removefav = function(userdata) {
   
	     $.ajax({
	             url: base_url + "/users/unfavoriteuser",
	             type: 'POST',
	             dataType: 'json',
	             data: {
	                 user_id: userdata.id,list_name:page_name
	             },
	             success: function(data) {
	                  $scope.users=data.data.visible;
	                 $scope.$apply();
	                 	                
	             }
	     });
     
     };
     
     
     
     //add to favorites
 $scope.addfav = function(userdata) {
     	     $.ajax({
	             url: base_url + "/users/favoriteuser",
	             type: 'POST',
	             dataType: 'json',
	             data: {
	                 user_id: userdata.id,list_name:page_name
	             },
	             success: function(data) {
	                 $scope.users=data.data.visible;
	                 $scope.$apply();
	                 
	                
	             }
	     });
     
     };
     
     
     
     
     
     
     //remove from list
    $scope.removefromlist = function(userdata) {
          $.ajax({
             url: base_url + "/users/removefromlist",
             type: 'POST',
             dataType: 'json',
             data: {
                user_id:userdata.id,list_name:page_name
             },
             success: function(data) {
                  $scope.users=data.data.visible;
                 $scope.$apply();
                 
                
             }
     });
     
     };
     
     
     
     $scope.blockuser = function(userdata) {
    
     $.ajax({
             url: base_url + "/users/blockuser",
             type: 'POST',
             dataType: 'html',
             data: {
                user_id:userdata.id
             },
             success: function(data) {
                 $scope.$apply();
                 
                 
                 window.location.href=base_url+"/users/blockedusers";
                 
               
             }
     });
     
     };

        
     
     $scope.reportuserreason="";
     
     
     $scope.reportuser = function(userdata) {
     
     
    
     
     $.ajax({
             url: base_url + "/users/reportuser",
             type: 'POST',
             dataType: 'html',
             data: {
                user_id:userdata.id,reason:userdata.reportuserreason
             },
             success: function(data) {
                 
                 
                 //userdata.reportuserreason='';               
                 $scope.$apply();
                 alert('Report Submitted');
                                  
                
             }
     });
     
     };


	 		 

    
});


app.controller('BlockedController',function($scope){
	$scope.users=[];
    $scope.URL=function(u){
	    
	    return base_url+u;
    };

	 $.ajax({
             url: base_url + "/users/blockedusers",
             type: 'POST',
             dataType: 'json',
             data: {
                user_id:''
             },
             success: function(data) {
                 $scope.users=data.data;
                 $scope.$apply();
                                 
             }
     });




     $scope.blockuser = function(userdata) {
     $('#loading').html(
         '<img id="loader-img" src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...'
     );
     $("#loading").css("position", "relative");
     $("#loading").css("margin-left", "45%");
     $("#loading").css("margin-top", "20%");
     $("#loading_cnt").css("display", "block");
     $("#loading_cnt").css("z-index", "997");
     $.ajax({
             url: base_url + "/users/blockuser",
             type: 'POST',
             dataType: 'json',
             data: {
                user_id:userdata.id
             },
             success: function(data) {
                  $scope.users=data.data;
                 $scope.$apply();
                 setTimeout(function() {
                     $('#loading').html(
                         '<img  style="display:none" src="https://avatars.githubusercontent.com/u/303202?v=3">'
                     );
                     $("#loading_cnt").css("display",
                         "none");
                 }, 50);
                
             }
     });
     
     };
     
     
 $scope.unblockuser = function(userdata) {
     $('#loading').html(
         '<img id="loader-img" src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...'
     );
     $("#loading").css("position", "relative");
     $("#loading").css("margin-left", "45%");
     $("#loading").css("margin-top", "20%");
     $("#loading_cnt").css("display", "block");
     $("#loading_cnt").css("z-index", "997");
     $.ajax({
             url: base_url + "/users/unblockuser",
             type: 'POST',
             dataType: 'json',
             data: {
                user_id:userdata.id
             },
             success: function(data) {
                 $scope.users=data.data.visible;
                 $scope.$apply();
                 setTimeout(function() {
                     $('#loading').html(
                         '<img  style="display:none" src="https://avatars.githubusercontent.com/u/303202?v=3">'
                     );
                     $("#loading_cnt").css("display",
                         "none");
                 }, 50);
                
             }
     });
     
     };

	
	
	
});

app.controller('AccountSettingsController', function($scope) {
    $scope.firstName = "John";
    $scope.lastName = "Doe";
    $scope.names=['eesh','john'];
    $scope.settings=[];
    
    $scope.settings.current_email_model="";
    $scope.settings.new_pwd_model="";
$scope.settings.retype_new_pwd_model="";
    
    
    $scope.URL=function(u){
	    
	    return base_url+u;
    };
     
     
     
  
		 
		 $.ajax({
		       url: base_url+"/account_settings/settings",
		       type: 'POST',
		       dataType: 'json',
		       data: {user_id:''}, 
			       success : function(data) 
			      {			      
				      
				      $scope.settings=data.setting;
				      $scope.checkmodeldiscoverable=data.setting.discoverable;
				      $scope.share_my_profile=data.setting.share_my_profile;
				      $scope.comment_on_photos=data.setting.comment_on_photos;
				      $scope.view_profile_model=data.setting.view_profile;
				      $scope.show_distance_model=data.setting.show_distance;
				      $scope.checkmodeldiscoverable=data.setting.discoverable;
				      $scope.show_online_model=data.setting.show_online;
				      
				      
				      
				      $scope.email_notify_msg_model=data.setting.email_notify_msg;
				      $scope.cell_notify_msg_model=data.setting.cell_notify_msg;
				      $scope.email_notify_visitors_model=data.setting.email_notify_visitors;
				      $scope.cell_notify_visitors_model=data.setting.cell_notify_visitors;
					  
					  
					  $scope.email_notify_likes_model=data.setting.email_notify_likes;
					  $scope.cell_notify_likes_model=data.setting.cell_notify_likes;
					  $scope.email_notify_gifts_model=data.setting.email_notify_gifts;
					  
					  
					  $scope.email_notify_fav_model=data.setting.email_notify_fav;
					  $scope.cell_notify_fav_model=data.setting.cell_notify_fav;
					  
					  $scope.msg_not_interested_model=data.setting.msg_not_interested;
					  
					  $scope.invisible_mode_hide_presence_model=data.setting.invisible_mode_hide_presence;
					  $scope.invisible_mode_hide_visitor_model=data.setting.invisible_mode_hide_visitor;
					  $scope.invisible_mode_hide_super_powers_model=data.setting.invisible_mode_hide_super_powers;
					  
					  
					  $scope.settings.user_email=data.user_email;
					  
				      
					  $scope.$apply(); 
					  console.log($scope.settings);
					  
					  
			          
				  }
	     });
	     
	     
	    
	$scope.submit_privacy = function(settings) {
		
		 $('#loading').html('<img id="loader-img" src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...');
		 $("#loading").css("position","relative"); 
		 
		 $("#loading").css("margin-left","45%");  
		  $("#loading").css("margin-top","20%"); 
		 $("#loading_cnt").css("display","block");
		 $("#loading_cnt").css("z-index","997"); 
        $.ajax({
		       url: base_url+"/account_settings/privacy",
		       type: 'POST',
		       dataType: 'json',
		       data: {show_online:settings.show_online,show_distance:settings.show_distance,view_profile:settings.view_profile,discoverable:settings.discoverable,share_my_profile:settings.share_my_profile}, 
			       success : function(data) 
			      {			      
				      
				      $scope.settings=data.setting;
				      $scope.$apply();   
				      console.log('in submit post');
				      
				      setTimeout(function () {
									                $('#loading').html('<img  style="display:none" src="https://avatars.githubusercontent.com/u/303202?v=3">');
									            
									               $("#loading_cnt").css("display","none");
									         }, 50);
									            
									             
				      $('#privacy-div-form').hide();
                      $('#privacy-div').show(); 
                      
			          
				  }
	     });

    };    
    
    $scope.submit_photos = function(settings) {
	    $('#loading').html('<img id="loader-img" src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...');
		 $("#loading").css("position","relative"); 
		 
		 $("#loading").css("margin-left","45%");  
		  $("#loading").css("margin-top","20%"); 
		 $("#loading_cnt").css("display","block");
		 $("#loading_cnt").css("z-index","997"); 
	            $.ajax({
		       url: base_url+"/account_settings/photos-videos",
		       type: 'POST',
		       dataType: 'json',
		       data: {comment_on_photos:settings.comment_on_photos}, 
			       success : function(data) 
			      {			      
				      
				      //$scope.settings.comment_on_photos=data.setting.comment_on_photos;
				      $scope.$apply();  
				      setTimeout(function () {
									                $('#loading').html('<img  style="display:none" src="https://avatars.githubusercontent.com/u/303202?v=3">');
									            $("#loading_cnt").css("display","none");
									            
									         }, 50);
									            

				      $('#Photos-videos-div-form').hide();
					  $('#Photos-videos-div').show();
				      
				  }
	     });

    };    
    
    $scope.submit_notification = function(settings) {
	    $('#loading').html('<img id="loader-img" src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...');
		$("#loading").css("position","relative"); 
		 
		 $("#loading").css("margin-left","45%");  
		  $("#loading").css("margin-top","20%"); 
		 $("#loading_cnt").css("display","block");
		 $("#loading_cnt").css("z-index","997"); 
	            $.ajax({
		       url: base_url+"/account_settings/notifications",
		       type: 'POST',
		       dataType: 'json',
		       data: {email_notify_msg:settings.email_notify_msg,email_notify_visitors:settings.email_notify_visitors,email_notify_likes:settings.email_notify_likes,email_notify_gifts:settings.email_notify_gifts,email_notify_fav:settings.email_notify_fav,cell_notify_msg:settings.cell_notify_msg,cell_notify_visitors:settings.cell_notify_visitors,cell_notify_likes:settings.cell_notify_likes,cell_notify_gifts:settings.cell_notify_gifts,cell_notify_fav:settings.cell_notify_fav}, 
			       success : function(data) 
			      {			      
				      
				      //$scope.settings.comment_on_photos=data.setting.comment_on_photos;
				      $scope.$apply();  
				      setTimeout(function () {
									                $('#loading').html('<img  style="display:none" src="https://avatars.githubusercontent.com/u/303202?v=3">');
									            
									            $("#loading_cnt").css("display","none");
									         }, 50);
									            

				      $('#notification-div-form').hide();
					  $('#notification-div').show();
				      
				  }
	     });

    };   
    
    $scope.submit_messege = function(settings) {
	    $('#loading').html('<img id="loader-img" src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...');
		 $("#loading").css("position","relative"); 
		 
		 $("#loading").css("margin-left","45%");  
		  $("#loading").css("margin-top","20%"); 
		 $("#loading_cnt").css("display","block");
		 $("#loading_cnt").css("z-index","997"); 
	            $.ajax({
		       url: base_url+"/account_settings/message-settings",
		       type: 'POST',
		       dataType: 'json',
		       data: {msg_not_interested:settings.msg_not_interested}, 
			       success : function(data) 
			      {			      
				      
				      //$scope.settings.comment_on_photos=data.setting.comment_on_photos;
				      $scope.$apply();  
				      setTimeout(function () {
									                $('#loading').html('<img  style="display:none" src="https://avatars.githubusercontent.com/u/303202?v=3">');
									            
									            $("#loading_cnt").css("display","none");
									         }, 50);
									            

				  
				      
				  }
	     });

    };    
    
        $scope.submit_invisible = function(settings) {
	        $('#loading').html('<img id="loader-img" src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...');
		 $("#loading").css("position","relative"); 
		 
		 $("#loading").css("margin-left","45%");  
		  $("#loading").css("margin-top","20%"); 
		 $("#loading_cnt").css("display","block");
		 $("#loading_cnt").css("z-index","997"); 
	            $.ajax({
		       url: base_url+"/account_settings/invisible-mode-settings",
		       type: 'POST',
		       dataType: 'json',
		       data: {invisible_mode_hide_presence:settings.invisible_mode_hide_presence,invisible_mode_hide_visitor:settings.invisible_mode_hide_visitor,invisible_mode_hide_super_powers:settings.invisible_mode_hide_super_powers}, 
			       success : function(data) 
			      {			      
				      
				      //$scope.settings.comment_on_photos=data.setting.comment_on_photos;
				      $scope.$apply();  
				      setTimeout(function () {
									                $('#loading').html('<img  style="display:none" src="https://avatars.githubusercontent.com/u/303202?v=3">');
									            $("#loading_cnt").css("display","none");
									            
									         }, 50);
									            

					  console.log($scope);
					  console.log(settings.invisible_mode_hide_presence);
				      
				  }
	     });

    };        
		
		
		$scope.submit_password = function(settings) {
			$('#loading').html('<img id="loader-img" src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...');
		 $("#loading").css("position","relative"); 
		 
		 $("#loading").css("margin-left","45%");  
		  $("#loading").css("margin-top","20%"); 
		 $("#loading_cnt").css("display","block");
		 $("#loading_cnt").css("z-index","997");  
	            $.ajax({
		       url: base_url+"/account_settings/change-password",
		       type: 'POST',
		       dataType: 'json',
		       data: {current_email:settings.current_email_model,new_pwd:settings.new_pwd_model,retype_new_pwd:settings.retype_new_pwd_model}, 
			       success : function(data) 
			      {			      
				      
				      //$scope.settings.comment_on_photos=data.setting.comment_on_photos;
				      $scope.$apply();  
				      setTimeout(function () {
									                $('#loading').html('<img  style="display:none" src="https://avatars.githubusercontent.com/u/303202?v=3">');
									            $("#loading_cnt").css("display","none");
									            
									         }, 50);
									            

					  console.log($scope);
					  console.log(settings.invisible_mode_hide_presence);
				      
				  }
	     });

    };        
 
    
});