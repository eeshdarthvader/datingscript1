<script type="text/javascript">
	
	    var page_name;		 
	    
		switch($('div.block-cont h1').html())
		{
			case 'Favorites Members': 
			    page_name='fav';
				break;
			case 'Profile visitors':
				page_name='profile';
				break;
			case 'Interested Friends':
				page_name='interested';
			    break;	
			case 'Matched Members':
			case 'Liked You':
				page_name='liked';
			    break;			    
			case 'You Liked':
			   page_name='likes';
			    break;
		}
		
		var user_id=$('#user_id').val();

	//post call to adding to favorites
	 $('#addtofavorites').click(function (e) {
		
        var url="{{URL::to('users/favoriteuser')}}";
        $.post(url,
			    {user_id:user_id},
			    function(data, textStatus, jqXHR)
			    {
			          console.log('added to favorites');
			          var wrapper = document.createElement('div');
					  wrapper.appendChild($('#removefavorites'));
					  $('#addtofavorites').hide();
					  $(this).parent().html(wrapper.innerHTML);

		        });
	});
	
	
	//post call to adding to remove from favorites
	$('#removefavorites').click(function (e) {	        
		  
		 var url_post="{{URL::to('users/unfavoriteuser')}}";
		 
		 $.ajax({
		       url: url_post,
		       type: 'POST',
		       dataType: 'html',
		       data: {user_id:user_id}, 
			       success : function(data) 
			      {
				      
				     console.log('removed from favorites');
			          
			          if(page_name=='fav')
			          {
				          $('.block-cont').remove();				          
				          
				          var success = $(data).find('.block-page').html(); 
				           $('.block-page').html(success);			          
				       }
			          //else
			          //{
				        //  var wrapper = document.createElement('div');
						  //wrapper.appendChild($('#addtofavorites'));
						  //$('#removefavorites').hide()
						  //$(this).parent().html(wrapper.innerHTML);
			          //}
				  }
		 });
		 
		 
    });	               
		
    //post call to block and unblock user        
    $('#block').click(function (e) {	        
		  
		 var url="{{URL::to('users/blockuser')}}";
        $.post(url,
			    {user_id:user_id},
			    function(data, textStatus, jqXHR)
			    {
			          console.log('user blocked');
		        });
	
	});	 
       
    //post call to report user
      $('#reportabuse').click(function (e) {	        
		  
		 var url="{{URL::to('users/reportuser')}}";
        $.post(url,
			    {user_id:user_id},
			    function(data, textStatus, jqXHR)
			    {
			          console.log('abuse ahaginst user reported');
		        });
	
	});	
	
	
	   
    //post call to report user
      $('#reportphoto').click(function (e) {	        
		  
		 var url="{{URL::to('users/reportuser')}}";
        $.post(url,
			    {user_id:user_id},
			    function(data, textStatus, jqXHR)
			    {
			          console.log('report against photo');
		        });
	
	});	
	
	//post call to remove from list --delete from list
	
	   $('#reportphoto').click(function (e) {	        
		  
		 var url="{{URL::to('users/removeforlist')}}";
        $.post(url,
			    {user_id:user_id,list_name:page_name},
			    function(data, textStatus, jqXHR)
			    {
			          console.log('removed from list');
			          e.parent().hide();
		        });
	
	});	
	</script>
	
	<script  src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js" type="text/javascript"/>