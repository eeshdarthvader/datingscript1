@extends('frontend.layout')

@section('content')
    <div class="col-sm-9">
		<div class="meeting-game-right-part">
			@if($blocked == 'true')
				<div class="alert alert-info no-encounters">
					<strong>Content unavailable.</strong> 
   				</div>
			
			@else				
			
		  		<div class="meeting-profile">
    <div class="meeting-pro-tag"><img src="{{URL::to('assets/frontend/images/profile-tag.png')}}" alt="..."></div>
    <div class="meeting-profile-top">
        <div class="row">
         <span id="profile-tab" class="btn-Profile-visited">
										 Profile
									</span>
									<span  id="photos-tab" class="btn-Photos">
										 Photos
					</span>                 
            <div class="col-sm-4">
                <div class="meeting-pro-detail">
                    <h1>{{$user->first_name}} ({{$user->display_gender()}},{{$user->age}})</h1>
                    <p>
                        Common Friends <span>04</span>&nbsp;
                        Common interests <span>{{$common_interests}}</span>
                    </p>
                    <span class="mob">mobile</span>&nbsp;<span class="on">ON</span>&nbsp;<span class="fav"  @if(!$user->fav($user_id))  style="display: none" @endif ><img src="{{URL::to('assets/frontend/images/images.jpg')}}" alt=""></span>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="meet-pro-right-options">
                    <ul>
	                    @if($user_encountered)
	                    	@if($encounter == 'yes')
	                    		<li><p><img class="text-right" src="{{URL::to('assets/frontend/images/Heart-icon.png')}}" alt="..."></p></li>
	                    	@else 
	                    		<li><p><img src="{{URL::to('assets/frontend/images/close-128.png')}}" alt="..."></p></li>
	                    	@endif
	                    @else
	                    
		                    {{ Form::open(array('url' => '/encounters/encounteryes', 'method' => 'POST','id' => 'encounter_yes_form',"style"=>"display:inline-block;")) }}
	                            <li><a id="encounter-yes"><img src="{{URL::to('/assets/frontend/images/icon-like.png')}}" alt="..."> I like</a></li>
	                        {{Form::close()}}
	                        {{ Form::open(array('url' => '/encounters/encounterno', 'method' => 'POST','id' => 'encounter_no_form',"style"=>"display:inline-block;")) }}
	                            <li><a id="encounter-no"><img src="{{URL::to('/assets/frontend/images/icon-discard.png')}}" alt="..."> Discard</a></li>
                            {{Form::close()}}
                        @endif
                        <!--<li><a href="javascript:void(0)"><img src="{{URL::to('assets/frontend/images/icon-share.png')}}" alt="..."> Share</a></li>-->
                        <!--<li><a href="javascript:void(0)" data-toggle="modal" data-target="#view-profile-pop"><img src="{{URL::to('assets/frontend/images/icon-profile.png')}}" alt="..."> View profile</a></li>-->
                    </ul>

                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close close-bg" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title title-setting">
                                        The game is over<br>
                                        Make more opportunities.
                                    </h4>
                                </div>
                                <div class="modal-body game-over">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="more-opportunities-box">
                                                <img src="{{URL::to('assets/frontend/images/profile-pic.png')}}" alt="...">
                                                <div class="more-op-btm-option">
                                                    <ul>
                                                        <li><a href="javascript:void(0)"><i class="fa fa-camera"></i> 15</a></li>
                                                        <li><a href="javascript:void(0)"><i class="fa fa-video-camera"></i> 1</a></li>
                                                        <li><span>ON</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="more-opportunities-box">
                                                <img src="{{URL::to('assets/frontend/images/profile-pic.png')}}" alt="...">
                                                <div class="more-op-btm-option">
                                                    <ul>
                                                        <li><a href="javascript:void(0)"><i class="fa fa-camera"></i> 15</a></li>
                                                        <li><a href="javascript:void(0)"><i class="fa fa-video-camera"></i> 1</a></li>
                                                        <li><span>ON</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <div class="more-opportunities-box">
                                                <img src="{{URL::to('assets/frontend/images/profile-pic.png')}}" alt="...">
                                                <div class="more-op-btm-option">
                                                    <ul>
                                                        <li><a href="javascript:void(0)"><i class="fa fa-camera"></i> 15</a></li>
                                                        <li><a href="javascript:void(0)"><i class="fa fa-video-camera"></i> 1</a></li>
                                                        <li><span>ON</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        You have chosen above member(s).<br>
                                        Send requests to them and to your friends on Facebook and get them interested on you.
                                    </p>
                                    <div class="popup-btm-btn">
                                        <ul>
                                            <li class="pop-send-btn"><a href="javascript:void(0)">Send</a></li>
                                            <li class="pop-continue-btn"><a href="javascript:void(0)">Continue</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!--<div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary">Save changes</button>
                                </div>-->
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->



                    <div class="modal fade" id="view-profile-pop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header pop-personal1">
                                    <button type="button" class="close close-bg" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                </div>
                                <div class="modal-body game-over">
                                    <h3>
                                        Hyun-A Kim's<br>
                                        profile has been filled out more than you
                                        If you would like to know more about her,
                                        you must complete your profile more than 50%
                                    </h3>
                                    <p>
                                        When you fill more detailed profile , <br>
                                        you can see more information of other members.
                                    </p>
                                    <div class="popup-btm-btn pop-personal-btn">
                                        <ul>
                                            <li class="pop-send-btn"><a href="javascript:void(0)">Add my profile</a></li>
                                            <li class="pop-continue-btn"><a href="javascript:void(0)">Cancel</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!--<div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary">Save changes</button>
                                </div>-->
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>
                
                
                
                <div class="nav-profile">
                    <ul class="nav nav-pills">
                        <li class="active"><a href="" class="nav-pills-span">Share</a></li>
                        <li><a  class="nav-pills-span">Chat Now</a></li>
                        <li id="fav" @if($user->fav($user_id)) style="display: none;margin-left: 0px;" @endif ><a  class="nav-pills-span">Add to favourites</a></li>
                        <li id="unfav" @if(!$user->fav($user_id)) style="display: none;margin-left: 0px;" @else style="margin-left:0px" @endif ><a  class="nav-pills-span" href="#">Remove favourite</a></li>
                        <li><a class="nav-pills-span" aria-expanded="false" role="button" aria-haspopup="true" data-toggle="dropdown" class="dropdown-toggle" href="#" id="reportabuse">Report Abuse</a>
                        
                        <div aria-labelledby="reportabuse" role="menu" class="dropdown-menu bor" style="width:379%;background-color: #E0EAC9;margin-top:12%"> 
										
										<div class="arrow-up-2"></div>
										<div class="report-abuse">
	
                                    <h2>Report abuse</h2>
                                    
                                    
                                                                       <br/>
                                    <form id="report-abuse-form">
                                       <textarea class="report-abuse-reason" autocomplete="off"></textarea>
                                        <button class="report-btn btn-xs" type="submit">
                                            Report
                                        </button>
                                       <!-- <button class="report-cancel-btn btn-xs" type="button">
                                            cancel
                                        </button>-->
                                    </form>
                             
						</div>
</div>
                        
                        
                        </li>
                        <li class="blockuserli"><a class="nav-pills-span" >Block</a></li>
                        <li><a class="nav-pills-span" data-toggle="modal" data-target="#pop-gift-main">Give a gift</a></li>
                    </ul>
                </div>
                
                
            </div>
        </div>
    </div>
    <br/>
 

<div id="cnt-toggle">
    <div class="pics">
	     @if($photos['public_photos_count'] > 0)
        <div class="pic-count"> <i class="fa fa-camera"></i>{{$photos['public_photos_count']}}</div>
        <ul>
            @foreach($photos['public_photos'] as $photo)
	                                
                <li><a href="javascript:void(0)"><img src="{{URL::to('uploads/photos/'. $photo->photo_id)}}" alt="..."></a></li>
            @endforeach        
        </ul>
    </div>
    @endif
    <!--<div class="pics mr-b20">
        <div class="pic-count"> <i class="fa fa-video-camera"></i> 1 </div>
        <ul>
            <li><a href="javascript:void(0)"><img src="{{URL::to('assets/frontend/images/video-1.jpg')}}" alt="..."></a></li>
        </ul>
    </div>!-->

    <div class="row">
        <div class="col-sm-9">
            <div class="m-game-pro-left">
                <div class="left-option">
                    <h1>Location</h1>
                    <div>{{$user->city}}</div>
                    <div id="map-profile" data-target="#myModalNew2" data-toggle="modal" ></div>


                </div>
            </div>

            <div class="m-game-pro-left">
                <div class="left-option">
                    <h1>I'm here to</h1>
                    <p>{{$user_pref->here_to_display()}}</p>
                </div>
            </div>

            <div class="m-game-pro-left">
                <div class="left-option">
                    @if($interests)
                        <h1>{{$interests->count()}} Interests</h1>
                        <p>
                        	@foreach($interests as $interest)
	                            {{$interest->name}},
                            @endforeach
                                                       
                            <a class="add-Interests">Add them to your profile !</a>
                                                       
                        </p>
                    @endif
                </div>
            </div>
            
            @foreach($user_custom_profile as $section)

                @if($section->filled)

                    <div class="personal-info m-game-pro-left">
                        <h1>{{$section->name}}</h1>
                        <ul style="padding-top: 0px;">

                            @foreach($section->fields as $field)
                                @if($field->filled)
                                    <li>
                                        {{$field->name}}
                                        <span>
                                             <span>{{$field->value}}</span>
                                        </span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                @endif
            @endforeach

            
            <!-- <button data-target="#myModalNew" data-toggle="modal" class="btn-link" type="button">
                                show
                            </button>!-->
                        


			<div class="personal-info m-game-pro-left about-me">
                <h1>Language</h2>
                <p>English</p>
            </div>
            
            </br>    

            @if($user_profile['exists'])
                <div class="personal-info m-game-pro-left about-me" style="padding-top: 10px;width:90%">
                    <h1>About Me</h1>
                    <p style="padding-bottom: 10px;">{{$user_profile['about_me']}}</p>
                </div>
                </br>
                                                
                <div class="personal-info m-game-pro-left about-me" style="padding-top: 10px;">
                    <h1>Interested In</h1>
                    <p>{{$user_profile['interested_in']}}</p>
                </div>
            @endif

            <div class="view-friends">
                <h1>View my friends</h1>

                <div class="slider3">
                    <div class="row">
                        <div class="col-xs-12 pd-left">

                            <div class="ca-container" id="ca-container">
                                <div class="ca-nav"> <span class="ca-nav-prev">Previous</span> <span class="ca-nav-next">Next</span> </div>
                                <div class="ca-wrapper" style="overflow: hidden;">
                                    <div class="ca-item ca-item-8" style="position: absolute; left: 0px;">
                                        <div class="ca-item-main">
                                            <div class="ca-icon"></div>
                                            <div class="name">
                                                <a href="#">
                                                    <h4>cchiwhoo(21)</h4>
                                                    <h4>Paju</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ca-item ca-item-1" style="position: absolute; left: 100px;">
                                        <div class="ca-item-main">
                                            <div class="ca-icon"></div>
                                            <div class="name">
                                                <a href="#">
                                                    <h4>cchiwhoo(21)</h4>
                                                    <h4>Paju</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ca-item ca-item-2" style="position: absolute; left: 200px;">
                                        <div class="ca-item-main">
                                            <div class="ca-icon"></div>
                                            <div class="name">
                                                <a href="#">
                                                    <h4>cchiwhoo(21)</h4>
                                                    <h4>Paju</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ca-item ca-item-3" style="position: absolute; left: 300px;">
                                        <div class="ca-item-main">
                                            <div class="ca-icon"></div>
                                            <div class="name">
                                                <a href="#">
                                                    <h4>cchiwhoo(21)</h4>
                                                    <h4>Paju</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ca-item ca-item-4" style="position: absolute; left: 400px;">
                                        <div class="ca-item-main">
                                            <div class="ca-icon"></div>
                                            <div class="name">
                                                <a href="#">
                                                    <h4>cchiwhoo(21)</h4>
                                                    <h4>Paju</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ca-item ca-item-5" style="position: absolute; left: 500px;">
                                        <div class="ca-item-main">
                                            <div class="ca-icon"></div>
                                            <div class="name">
                                                <a href="#">
                                                    <h4>cchiwhoo(21)</h4>
                                                    <h4>Paju</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ca-item ca-item-6" style="position: absolute; left: 600px;">
                                        <div class="ca-item-main">
                                            <div class="ca-icon"></div>
                                            <div class="name">
                                                <a href="#">
                                                    <h4>cchiwhoo(21)</h4>
                                                    <h4>Paju</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ca-item ca-item-7" style="position: absolute; left: 700px;">
                                        <div class="ca-item-main">
                                            <div class="ca-icon"></div>
                                            <div class="name">
                                                <a href="#">
                                                    <h4>cchiwhoo(21)</h4>
                                                    <h4>Paju</h4>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>





            </div>
            <br/>
            <br/>
            <div class="add-m-profile">
                <div class="row">
                    <div class="col-sm-8">
                        <p>
                            Do you like to see more common interests?<br>
                            Please add more interests in your profile.
                        </p>
                    </div>
                    <div class="col-sm-4">
                        <a href="javascript:void(0)" class="btn-add-profile">Add my profile</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-sm-3">
            <strong class="text-left profile-score">Profile Score</strong>
            <div class="profile-score-container">
                <h2 class="profile-score-header text-center">Level 3-36 Points</h2>
                <div id="linear"></div>
                <h2 class="container profile-score-data text-center">761 out of 1,632 <br /> People liked Remember </h2>
                <div class="awards">
                    <p class="awards-qnty"><label class="text-muted">20</label>&nbsp;<strong>AWARDS</strong></p>
                    <a href="javascript:void(0);">
                        <div class="btn-awards ">
                            <h1>Get Awards</h1>
                        </div>
                    </a>

                   <div class="bs-example awards-container">
                                                <ul class="media-list">
                                                    <li class="media">
                                                        <a href="#" class="pull-left">
                                                            <img src="{{URL::to('assets/frontend/images/award_logo1.png')}}" class="media-object" alt="Sample Image">
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">The Hottest people</h4>
                                                            <h4><small>23 January 2014</small></h4>
                                                        </div>
                                                    </li>
                                                    <li class="media">
                                                        <a href="#" class="pull-left">
                                                            <img src="{{URL::to('assets/frontend/images/award_logo2.png')}}" class="media-object" alt="Sample Image">
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">The Hottest people</h4>
                                                            <h4><small>23 January 2014</small></h4>
                                                        </div>
                                                    </li>
                                                    <li class="media">
                                                        <a href="#" class="pull-left">
                                                            <img src="{{URL::to('assets/frontend/images/award_logo3.png')}}" class="media-object" alt="Sample Image">
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">The Hottest people</h4>
                                                           <h4><small>23 January 2014</small></h4>
                                                        </div>
                                                    </li>
                                                    <li class="media">
                                                        <a href="#" class="pull-left">
                                                            <img src="{{URL::to('assets/frontend/images/award_logo4.png')}}" class="media-object" alt="Sample Image">
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">The Hottest people</h4>
                                                            <h4><small>23 January 2014</small></h4>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>

                </div>
                <div class="gifts">
                    <p class="gifts-qnty"><strong>Gifts</strong></p>
                    <a href="" data-target="#pop-gift-main" data-toggle="modal" >
                        <div class="btn-gifts" >
                            <h1>Attract With gifts</h1>
                        </div>
                    </a>


                    <div class="bs-example gifts-container">
                        <ul class="media-list">
                            <li class="media">
                                <a href="#" class="pull-left">
                                    <img src="{{URL::to('assets/frontend/images/icon-instagram.png')}}" class="media-object" alt="Sample Image">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">The Hottest people</h4>
                                     <h4><small>23 January 2014</small></h4>
                                </div>
                            </li>
                            <li class="media">
                                <a href="#" class="pull-left">
                                    <img src="{{URL::to('assets/frontend/images/icon-instagram.png')}}" class="media-object" alt="Sample Image">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">The Hottest people</h4>
                                    <h4><small>23 January 2014</small></h4>
                                </div>
                            </li>
                            <li class="media">
                                <a href="#" class="pull-left">
                                    <img src="{{URL::to('assets/frontend/images/icon-instagram.png')}}" class="media-object" alt="Sample Image">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">The Hottest people</h4>
                                     <h4><small>23 January 2014</small></h4>
                                </div>
                            </li>
                            <li class="media">
                                <a href="#" class="pull-left">
                                    <img src="{{URL::to('assets/frontend/images/icon-instagram.png')}}" class="media-object" alt="Sample Image">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">The Hottest people</h4>
                                     <h4><small>23 January 2014</small></h4>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <br />
                    <br />
                    <div class="container-fluid">
                       <p>She is now at <span style="color:#f03f7c">position 278</span> 
	                       <p>in search results, 14 profile visitors today, 83 this months</p>
                    </div>
                    <br />

                    <div class="container-fluid">
                        Her Popularity<br />
                        <a style="color:#ff7f00" href="">Average or below</a>


                    </div>
                </div>
            </div>

        </div>

    </div>

    

</div>
<br/>
 <div id="profile-photos" style="display:none">
	                             <div id="lightbox-background" style="display:none">
		                             
	                             </div>
	                             
	                             
	                             <div id="lightbox" style="display:none">
								  	<div id="content">
								        <img src="#" />						        
								       <a style="position: fixed; margin-left: 11%; margin-top: 7.5%;" aria-expanded="false" role="button" aria-haspopup="true" data-toggle="dropdown" class="dropdown-toggle" href="#" id="reportphoto">Report 	Photo</a>

								    
								     </div>
								    
								</div>
								
								


                                <div class="profile-photos-header">
                                    <h1>Your photos ({{$photos['public_photos_count']}})</h1>
                                </div>

                                <div id="container-gutter" class="js-masonry" >
                                    @foreach($photos['public_photos'] as $photo)
	                                
                                    	<div class='item'><img class="lightbox_trigger" src="{{URL::to('uploads/photos/'. $photo->photo_id)}}" style="max-width:300px;max-height:300px"  data-id="{{$photo->id}}" alt=""></div>
                                    @endforeach

                                </div>
                                
                                <br />
                                @if($photos['public_photos_count'] > 0)
                                <div>
                                    <ul class="list-group">
	                                    @if($can_comment == 'true')
                                        <li class="list-group-item add-commemnts">
                                        <form method="post" action="{{URL::to('profile/comment')}}">
                                            <img class="round" src="{{URL::to('uploads/photos/'.$user->photo_id)}}" data-id="{{$user->photo_id}}" alt="...">&nbsp;&nbsp;
                                            	
	                                            <input type="hidden" value="public" name="album">
                                            	<input type="hidden" value="{{$user->id}}" name="user_id">	
	                                            <textarea class="add-comments-comments" name="comment" autocomplete="off" ></textarea>
	                                            <div class="btn-add-comments" >
	                                                <h1>Add Comments</h1>
	                                            </div>
                                            </form>    
                                        </li>
                                        @endif
                                        
                                        @foreach($comments['public_comments'] as $comment)
                                        <li class="comment-reply" data-id="reply">
                                        	<img class="round-comment" src="{{URL::to('uploads/photos/'.$comment->photo)}}" alt="...">&nbsp;&nbsp;
                                        	<h4><strong>{{$comment->user_name}}</strong>
	                                        	<br /><br /><p class="comment_text">{{$comment->comment}}</p><br /><br />
	                                        	 <small> {{$comment->date}}</small> &nbsp;&nbsp;&nbsp;&nbsp;
	                                        	 @if($can_comment == 'true')<a href="" class="reply">Reply</a>@endif
	                                        	 <textarea class="reply-textarea" style="display:none"></textarea>
	                                        	              	 @if($comment->can_delete == 'true') <a href="" class="delete" data-id="{{$comment->id}}">Delete</a> @endif
	                                        	 <textarea class="reply-delete-textarea" style="display:none" autocomplete="off" ></textarea>
	                                        	 @if($comment->can_edit == 'true') <a href="" class="edit-comment">Edit</a> @endif
	                                        	 <textarea class="reply--edit-textarea" style="display:none" autocomplete="off" ></textarea>
	                                        	 <div class="btn-add-comments-reply"  id="reply_btn" style="display: none" data-id="{{$comment->id}}">
	                                                <h1>Add Comments</h1>
	                                            </div>
	                                        	 <div class="btn-save_comments"  id="save_comment_btn" style="display: none" data-id="{{$comment->id}}">
	                                                <h1>Save</h1>
	                                            </div>
	                                        	 
	                                        		</h4>
	                                    </li>
	                                        	 @foreach($comment->replies as $reply)
	                                        	 
	                                        	 <li class="comment-reply comment-secondary">
		                                        	 
	                                                     <img class="round-comment" src="{{URL::to('uploads/photos/'.$reply->photo)}}" alt="...">	
	                                                     	<h4>
	                                                    <strong>{{$reply->user_name}}</strong>
	                                                    <br /><br /> <p class="reply_text">{{$reply->reply}}</p>
	
	                                                    <br/>
	                                                    <br />
	                                                    <small> {{$reply->date}}</small> &nbsp;&nbsp;&nbsp;&nbsp;
	                                                    @if($reply->can_delete == 'true') <a href="" class="delete_reply" data-id="{{$reply ->id}}">Delete</a> @endif
	                                                    @if($reply->can_edit == 'true') <a href="" class="edit-sec">Edit</a> @endif
	                                                    <br />
	                                                     <textarea class="reply--edit-textarea-sec" style="display:none" autocomplete="off" ></textarea>
	                                                     

	                                                     <div class="btn-save_reply"  id="save_reply_btn" style="display: none" data-id="{{$reply->id}}">
	                                                <h1>Save</h1>
	                                            </div>

	
	                                                     </h4>
	                                                     
	                                        	 </li>
	                                        		                                            @endforeach
	                                    @endforeach
	                                    
	                                   
                                    </ul>
                                </div>
								@endif

                                <div class="buffer_your_photos"></div>
                                <div class="profile-photos-header">
                                    <h1>Photos of your friend ({{$photos['friends_photos_count']}})</h1>
                                </div>
                                <div id="container-gutter2" class="js-masonry" >
                                    @foreach($photos['friends_photos'] as $photo)
	                                
                                    	<div class='item'><img class="lightbox_trigger" src="{{URL::to('uploads/photos/'. $photo->photo_id)}}" style="max-width:300px;max-height:300px"  data-id="{{$photo->id}}" alt=""></div>
                                    @endforeach                                
                                </div>
                                
                                @if($photos['friends_photos_count'] > 0)
                                <div>
                                    <ul class="list-group">
	                                    @if($can_comment == 'true')
                                        <li class="list-group-item add-commemnts">
                                        <form method="post" action="{{URL::to('profile/comment')}}">
                                            <img class="round" src="{{URL::to('uploads/photos/'.$user->photo_id)}}" alt="...">&nbsp;&nbsp;
                                            	
	                                            <input type="hidden" value="album" name="album">
                                            	<input type="hidden" value="{{$user->id}}" name="user_id">	
	                                            <textarea class="add-comments-comments" name="comment" autocomplete="off" ></textarea>
	                                            <div class="btn-add-comments" >
	                                                <h1>Add Comments</h1>
	                                            </div>
                                            </form>    
                                        </li>
                                        @endif
                                        
                                        @foreach($comments['album_comments'] as $comment)
                                        <li class="comment-reply" data-id="reply">
                                        	<img class="round-comment" src="{{URL::to('uploads/photos/'.$comment->photo)}}" alt="...">&nbsp;&nbsp;
                                        	<h4><strong>{{$comment->user_name}}</strong>
	                                        	<br /><br /><p class="comment_text">{{$comment->comment}}</p><br /><br />
	                                        	 <small> {{$comment->date}}</small> &nbsp;&nbsp;&nbsp;&nbsp;
	                                        	 @if($can_comment == 'true')<a href="" class="reply">Reply</a>@endif
	                                        	 <textarea class="reply-textarea" style="display:none"></textarea>
	                                        	              	 @if($comment->can_delete == 'true') <a href="" class="delete" data-id="{{$comment->id}}">Delete</a> @endif
	                                        	 <textarea class="reply-delete-textarea" style="display:none" autocomplete="off" ></textarea>
	                                        	 @if($comment->can_edit == 'true') <a href="" class="edit-comment">Edit</a> @endif
	                                        	 <textarea class="reply--edit-textarea" style="display:none" autocomplete="off" ></textarea>
	                                        	 <div class="btn-add-comments-reply"  id="reply_btn" style="display: none" data-id="{{$comment->id}}">
	                                                <h1>Add Comments</h1>
	                                            </div>
	                                        	 <div class="btn-save_comments"  id="save_comment_btn" style="display: none" data-id="{{$comment->id}}">
	                                                <h1>Save</h1>
	                                            </div>
	                                        	 
	                                        		</h4>
	                                    </li>
	                                        	 @foreach($comment->replies as $reply)
	                                        	 
	                                        	 <li class="comment-reply comment-secondary">
		                                        	 
	                                                     <img class="round-comment" src="{{URL::to('uploads/photos/'.$reply->photo)}}" alt="...">	
	                                                     	<h4>
	                                                    <strong>{{$reply->user_name}}</strong>
	                                                    <br /><br /> <p class="reply_text">{{$reply->reply}}</p>
	
	                                                    <br/>
	                                                    <br />
	                                                    <small> {{$reply->date}}</small> &nbsp;&nbsp;&nbsp;&nbsp;
	                                                    @if($reply->can_delete == 'true') <a href="" class="delete_reply" data-id="{{$reply ->id}}">Delete</a> @endif
	                                                    @if($reply->can_edit == 'true') <a href="" class="edit-sec">Edit</a> @endif
	                                                    <br />
	                                                     <textarea class="reply--edit-textarea-sec" style="display:none" autocomplete="off" ></textarea>
	                                                     

	                                                     <div class="btn-save_reply"  id="save_reply_btn" style="display: none" data-id="{{$reply->id}}">
	                                                <h1>Save</h1>
	                                            </div>

	
	                                                     </h4>
	                                                     
	                                        	 </li>
	                                        		                                            @endforeach
	                                    @endforeach
	                                    
	                                   
                                    </ul>
                                </div>
								@endif


								
								
								@if($matches ==  'true' )
									<div class="buffer_your_photos"></div>
	             	                <div class="profile-photos-header">
	                                    <h1>Your Private photos ({{$photos['private_photos_count']}})</h1>
	                                </div>
	                                <div id="container-gutter3" class="js-masonry" >
	                                    @foreach($photos['private_photos'] as $photo)
		                                
	                                    <div class='item'><img class="lightbox_trigger" src="{{URL::to('uploads/photos/'. $photo->photo_id)}}" style="max-width:300px;max-height:300px"  data-id="{{$photo->id}}" alt=""></div>
	                                    @endforeach
	                               
	                                </div>
	                                
	                                @if($photos['private_photos_count'] > 0)
                                <div>
                                    <ul class="list-group">
	                                    @if($can_comment == 'true')
                                        <li class="list-group-item add-commemnts">
                                        <form method="post" action="{{URL::to('profile/comment')}}">
                                            <img class="round" src="{{URL::to('uploads/photos/'.$user->photo_id)}}" alt="...">&nbsp;&nbsp;
                                            	
	                                            <input type="hidden" value="private" name="album">
                                            	<input type="hidden" value="{{$user->id}}" name="user_id">	
	                                            <textarea class="add-comments-comments" name="comment" autocomplete="off" ></textarea>
	                                            <div class="btn-add-comments" >
	                                                <h1>Add Comments</h1>
	                                            </div>
                                            </form>    
                                        </li>
                                        @endif
                                        
                                        @foreach($comments['private_comments'] as $comment)
                                        <li class="comment-reply" data-id="reply">
                                        	<img class="round-comment" src="{{URL::to('uploads/photos/'.$comment->photo)}}" alt="...">&nbsp;&nbsp;
                                        	<h4><strong>{{$comment->user_name}}</strong>
	                                        	<br /><br /><p class="comment_text">{{$comment->comment}}</p><br /><br />
	                                        	 <small> {{$comment->date}}</small> &nbsp;&nbsp;&nbsp;&nbsp;
	                                        	 @if($can_comment == 'true')<a href="" class="reply">Reply</a>@endif
	                                        	 <textarea class="reply-textarea" style="display:none"></textarea>
	                                        	              	 @if($comment->can_delete == 'true') <a href="" class="delete" data-id="{{$comment->id}}">Delete</a> @endif
	                                        	 <textarea class="reply-delete-textarea" style="display:none" autocomplete="off" ></textarea>
	                                        	 @if($comment->can_edit == 'true') <a href="" class="edit-comment">Edit</a> @endif
	                                        	 <textarea class="reply--edit-textarea" style="display:none" autocomplete="off" ></textarea>
	                                        	 <div class="btn-add-comments-reply"  id="reply_btn" style="display: none" data-id="{{$comment->id}}">
	                                                <h1>Add Comments</h1>
	                                            </div>
	                                        	 <div class="btn-save_comments"  id="save_comment_btn" style="display: none" data-id="{{$comment->id}}">
	                                                <h1>Save</h1>
	                                            </div>
	                                        	 
	                                        		</h4>
	                                    </li>
	                                        	 @foreach($comment->replies as $reply)
	                                        	 
	                                        	 <li class="comment-reply comment-secondary">
		                                        	 
	                                                     <img class="round-comment" src="{{URL::to('uploads/photos/'.$reply->photo)}}" alt="...">	
	                                                     	<h4>
	                                                    <strong>{{$reply->user_name}}</strong>
	                                                    <br /><br /> <p class="reply_text">{{$reply->reply}}</p>
	
	                                                    <br/>
	                                                    <br />
	                                                    <small> {{$reply->date}}</small> &nbsp;&nbsp;&nbsp;&nbsp;
	                                                    @if($reply->can_delete == 'true') <a href="" class="delete_reply" data-id="{{$reply ->id}}">Delete</a> @endif
	                                                    @if($reply->can_edit == 'true') <a href="" class="edit-sec">Edit</a> @endif
	                                                    <br />
	                                                     <textarea class="reply--edit-textarea-sec" style="display:none" autocomplete="off" ></textarea>
	                                                     

	                                                     <div class="btn-save_reply"  id="save_reply_btn" style="display: none" data-id="{{$reply->id}}">
	                                                <h1>Save</h1>
	                                            </div>

	
	                                                     </h4>
	                                                     
	                                        	 </li>
	                                        		                                            @endforeach
	                                    @endforeach
	                                    
	                                   
                                    </ul>
                                </div>
								@endif
	                                
                                @endif
                                
                            </div>


						@endif
						
					</div>
				</div>
			
    <div class="modal fade" id="myModalNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header-add-my-profile">
                    <button type="button" class="close close-bg" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title-addprofile">
                        <strong>Eesh Tyagi</strong><br />
                        profile has been filled out more than you<br />
                        If you would like to know more about her,<br />
                        you must complete your profile more than 50%<br /><br />
                        <small>
                            When you will fill more detailed profile,<br />
                            you can see more information about members.
                        </small>

                    </h2>
                </div>
                <div class="modal-body game-over">

                    <div class="popup-btm-btn">
                        <ul>
                            <li class="pop-send-btn"><a href="javascript:void(0)">Add my profile</a></li>
                            <li class="pop-continue-btn"><a href="javascript:void(0)">Cancel</a></li>
                        </ul>
                    </div>
                </div>
                <!--<div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>-->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <div class="modal fade" id="myModalNew2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content container-fluid">
                <div class="modal-header">
                    <button type="button" class="close close-bg" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    
                    <div class="row pop-header">
                        <div class="col-sm-6">
                            <img src="{{URL::to('assets/frontend/images/meeting_game_05.png')}}" class="media-object" alt="Sample Image">
                        </div>
                        <div class="col-sm-6 sec">
                            <img src="{{URL::to('assets/frontend/images/girl3.png')}}" class="media-object" alt="Sample Image">
                        </div>
                    </div>                   
                                  
                </div>

                <div class="modal-footer-how-close container">
                   
                        <h2>Please select  one of the following opions</h2>
                        <div class="row">
                            <div class="col-sm-6 platform-div">
                                <h3><strong> Get LEZUM  for your mobile!</strong></h3>
                                <h4><small>Please choose your type of device:</small></h4>
                                <div id="platforms">
                                    <button type="button" class="btn btn-primary btn-md btn-blue">Apple</button>&nbsp;
                                    <button type="button" class="btn btn-primary btn-md btn-blue">Windows</button>&nbsp;
                                    <button type="button" class="btn btn-primary btn-md btn-blue">Android</button>&nbsp;
                                    <button type="button" class="btn btn-primary btn-md btn-blue">Blackberry</button>&nbsp;
                                </div>


                            </div>
                            <div class="col-sm-6">

                                <h3><strong>Show you how close other users are to you right now.</strong></h3>
                              <br/>
                                <button type="button" class="btn btn-primary btn-md btn-blue btn-block">m.LEZUM.com</button>&nbsp;
                               
                            </div>
                        </div> 
                    
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
    
    
    
      <div class="modal fade" id="reportphotomodel" tabindex="-1" role="dialog" aria-labelledby="reportphoto" aria-hidden="true"> 

        <div class="modal-dialog reportphotodailog">
            <div class="modal-content-reportphoto">
                <div class="modal-header">
                    <button type="button" class="close close-bg" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    
                                  
                </div>

                <div class="modal-footer-reportphoto">
                   <div class="report-photo">
	
                                    <h2>Report photo</h2>
                                    
                                    
                                                                       <br/>
                                    <form id="report-photo-form">
                                        <table class="table borderless">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label><input type="radio" class="radio-bootstrap-messege" value="Inappropriate_photo" name="report_photo" >Inappropriate photo</label>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>

                                                        <label><input type="radio" class="radio-bootstrap-messege" name="report_photo" value="Celebrity photo"  >Celebrity photo</label>

                                                    </td>

                                                </tr>


                                            </tbody>
                                        </table>

                                        <button class="report-btn-reportphoto btn-xs" type="submit">
                                            Report
                                        </button>
                                       <!-- <button class="report-cancel-btn btn-xs" type="button">
                                            cancel
                                        </button>-->
                                    </form>
                             
						</div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
     
    
@stop

@section('scripts')
@if($blocked == 'false')
<!-- custom scrollbar plugin -->
	<script src="{{URL::to('assets/frontend/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
     <script src="{{URL::to('assets/frontend/js/masonry.pkgd.js')}}"></script>
	<script>
		(function($){
			$(window).load(function(){
				
				$("#content-7").mCustomScrollbar({
					scrollButtons:{enable:true},
					theme:"3d-thick"
				});
				
			});
		})(jQuery);
	</script>
	
	<script>
		
		$(".blockuserli").click(function (e){
		$.ajax({
             url: base_url + "/users/blockuser",
             type: 'POST',
             dataType: 'html',
             data: {
               user_id:'{{$user->id}}'
             },
             success: function(data) {
	             alert('user blocked');                 
                 window.location.href=base_url+"/users/blockedusers"; 
                              }
     	});
     });

		
	var photoid;
		$("#reportabuse").click(function (e){		  
		
			$('.report-abuse-reason').val("");
			
		
	   });
	   
	   	
	$(document).on('click', '#reportphoto', function (e) {
    
		photoid= $(this).siblings('img').data('id');
		//alert(photoid);
		
		$('#reportphotomodel').modal({
        	show: 'true'
    	}); 
    	
    	
	});
	
	$(document).on('click', '#other_reason', function (e) {
		
        	$('.other_reason_tr').toggle();
	});
	
	
	  
	   
	   
	   $(".report-btn-reportphoto").click(function (e){
		
		var url="{{URL::to('users/reportphoto')}}";
		
		var reason= $(this).parents('input[name=report_photo]').val();
		
		
		 var dataid=$(this).data('id');
		
			$.ajax({
	             url: url,
	             type: 'POST',
	             dataType: 'html',
	             data: {
	                photo_id:photoid,reason:reason,user_id:'{{$user->id}}'
	             },
	             success: function(data) {
	                 
	               
	                 alert('Photo Reported');
	                window.location.href=base_url+"/user/"+'{{$user->id}}'+"?tab=photos";
	                
	             }
	     });
		
	  });

	   

		
		$(".report-btn").click(function (e){
		
		var url="{{URL::to('users/reportuser')}}";
		
		
		
		var reason= $(this).siblings('.report-abuse-reason').val();
		$.ajax({
             url: url,
             type: 'POST',
             dataType: 'html',
             data: {
                user_id:'{{$user->id}}',reason:reason
             },
             success: function(data) {
                 
               
                 alert('Report Submitted');
               window.location.href=base_url+"/user/"+'{{$user->id}}'+"?tab=photos";
                
             }
     });
		
	});

	 	
   </script>


    <script type="text/javascript">
		
        $('#myModalNew').on('shown.bs.modal', function () {
            $('#myInput').focus()
        })
        
        $("#encounter-no").click(function(){
            $("#encounter_no_form").submit();
       });

       $("#encounter-yes").click(function(){
            $("#encounter_yes_form").submit();
       });
       
       $(function(){ 
		  	var mapOptions = {
		        center: { lat: {{$user->lat}}, lng: {{$user->lng}}},
		        zoom: 10
		    };
		     
		    var map = new google.maps.Map(document.getElementById('map-profile'),mapOptions);
		});
		
		
		$(".reply").click(function (e){			
			
		$(this).siblings(".reply-textarea").show();
		$(this).siblings('.btn-add-comments-reply').show();		
		$(this).hide();
		$(this).siblings('.delete').hide();
		$(this).siblings('.edit-comment').hide();
		
	});
	
	$(".btn-add-comments-reply").click(function (e){
		e.preventDefault();
		
		
		var userid= $('input:hidden[name=user_id]').val();
		
		var reply=$(this).siblings('.reply-textarea').val();
		
		var url="{{URL::to('profile/commentreply')}}";
        
        var dataid=$(this).data('id');

		
		 
		 $.ajax({
		       url: url,
		       type: 'POST',
		       dataType: 'json',
		       data: {user_id:userid,reply:reply,comment_id:dataid}, 
			       success : function(data) 
			      {			      
				      window.location.href=base_url+"/user/"+userid+"?tab=photos";
				  }
	     });

        
    });
    
    $(".btn-add-comments").click(function (e){
		e.preventDefault();
		var query = window.location;
		
				     
		var userid= $('input:hidden[name=user_id]').val();
		
		var comment=$(this).siblings('.add-comments-comments').val();
		
		var url="{{URL::to('profile/comment')}}";
        
        var dataid=$(this).data('id');
        
        var album= $(this).siblings('input:hidden[name=album]').val();    
       
		 
		 $.ajax({
		       url: url,
		       type: 'POST',
		       dataType: 'json',
		       data: {user_id:userid,album:album,comment:comment}, 
			       success : function(data) 
			      {		
				      
					   		   
					   		window.location.href=base_url+"/user/"+userid+"?tab=photos";
				  }
	     });

        
    });

    
    
	
	
	
	$(".delete").click(function (e){
		

		var comment_reply;
		
		var userid= $('input:hidden[name=user_id]').val();
		  var dataid=$(this).data('id');
		
		var url="{{URL::to('profile/deletecomment')}}";
		
		 $.ajax({
		       url: url,
		       type: 'POST',
		       dataType: 'json',
		       data: {id:dataid}, 
			       success : function(data) 
			      {			 
				     window.location.href=base_url+"/user/"+userid+"?tab=photos";
				     		          
				  }
	     });
				
		//location.reload();
	});
	
		$(".delete_reply").click(function (e){
		  var dataid=$(this).data('id');
		  var url="{{URL::to('profile/deletereply')}}";
		var userid= $('input:hidden[name=user_id]').val();
		 $.ajax({
		       url: url,
		       type: 'POST',
		       dataType: 'json',
		       data: {id:dataid}, 
			       success : function(data) 
			      {			      
				       window.location.href=base_url+"/user/"+userid+"?tab=photos";
				     		          
				  }
	     });
				
		//location.reload();
	});
	
	
	
	$(".btn-save_reply").click(function (e){
		e.preventDefault();
		
		
		var userid= $('input:hidden[name=user_id]').val();
		
		var reply=$(this).siblings('.reply--edit-textarea-sec').val();
		
		var url="{{URL::to('profile/editreply')}}"
        
        var dataid=$(this).data('id');

		
		 
		 $.ajax({
		       url: url,
		       type: 'POST',
		       dataType: 'json',
		       data: {reply_id:dataid,reply:reply}, 
			       success : function(data) 
			      {			      
				      window.location.href=base_url+"/user/"+userid+"?tab=photos";
				  }
	     });

        
    });

	$(".btn-save_comments").click(function (e){
		e.preventDefault();
		
		
		var userid= $('input:hidden[name=user_id]').val();
		
		var comment=$(this).siblings('.reply--edit-textarea').val();
		
		var url="{{URL::to('profile/editcomment')}}";
        
        var dataid=$(this).data('id');

		
		 
		 $.ajax({
		       url: url,
		       type: 'POST',
		       dataType: 'json',
		       data: {comment_id:dataid,comment:comment}, 
			       success : function(data) 
			      {			      
				      window.location.href=base_url+"/user/"+userid+"?tab=photos";
				  }
	     });

        
    });
	
	
	
	
	$(".edit-comment").click(function (e){
		
		$(this).siblings(".reply--edit-textarea").show().text($(this).siblings(".comment_text").text());
		$(this).siblings(".comment_text").hide();		
		$(this).siblings('.btn-save_comments').show();		
		$(this).hide();
		$(this).siblings('.delete').hide();
		$(this).siblings('.reply').hide();
		
						
		
	});
	
	$(".edit-sec").click(function (e){
		
		$(this).siblings(".reply--edit-textarea-sec").show($(this).siblings(".reply_text").text());
		$(this).siblings(".reply_text").hide();
		
		$(this).siblings('.btn-save_reply').show();		
		$(this).hide();
		$(this).siblings('.delete_reply').hide();
						
		
	});

		
    </script>

    	<script type="text/javascript">
	    	
	    	
		$(document).ready(function () {
			
			  var url = window.location.search;
			  url = url.replace("?", ''); 
			  
			  console.log(url);
						
		
		     if(url=="tab=photos")		     
		     {
			     if($('#photos-tab').hasClass('btn-Photos-visited'))
	                {return false;}
	                else
	                { 
	                    
	                    $('#profile-tab').addClass('btn-Profile').removeClass('btn-Profile-visited');
	                   $('#photos-tab').addClass('btn-Photos-visited').removeClass('btn-Photos'); 
	                }
	            $(window).trigger('resize');
	
			    $('#cnt-toggle').hide();
	            $('#profile-photos').show();
	           
	            callmasonry();	            
			}		
		     
		    	 
        });

           $('#profile-tab').click(function (event) {
				if($('#profile-tab').hasClass('btn-Profile-visited'))
                {return false;}
                else
                { $('#profile-tab').addClass('btn-Profile-visited').removeClass('btn-Profile');
                   $('#photos-tab').addClass('btn-Photos').removeClass('btn-Photos-visited'); 
                }
		     $('#cnt-toggle').show();
             $('#profile-photos').hide();
		   });

            $('#photos-tab').click(function (event) {
				if($('#photos-tab').hasClass('btn-Photos-visited'))
                {return false;}
                else
                { 
                    
                    $('#profile-tab').addClass('btn-Profile').removeClass('btn-Profile-visited');
                   $('#photos-tab').addClass('btn-Photos-visited').removeClass('btn-Photos'); 
                }
            $(window).trigger('resize');

		    $('#cnt-toggle').hide();
            $('#profile-photos').show();
           
            callmasonry();
		   });
                

	
    </script>
    
    <script type="text/javascript">
	    
	    
	    function callmasonry()
	    
	    {
		    
		     var container = document.querySelector('#container-gutter2');
var msnry = new Masonry( container, {
  // options
  columnWidth: 25,
  itemSelector: '.item',
  gutter:6
});

var container = document.querySelector('#container-gutter3');
var msnry = new Masonry( container, {
  // options
  columnWidth: 25,
  itemSelector: '.item',
  gutter:6
});


var container = document.querySelector('#container-gutter');
var msnry = new Masonry( container, {
  // options
  columnWidth: 25,
  itemSelector: '.item',
  gutter:6
});
		    
	    }
	   
    </script>		    
    <script>
jQuery(document).ready(function($) {
	
	$('.lightbox_trigger').click(function(e) {
		
		//prevent default action (hyperlink)
		e.preventDefault();
		$('#lightbox-background').show();
		
		//Get clicked link href
		var image_href = $(this).attr("src");
		
		var dataid=$(this).data('id');
		
		
		
		/* 	
		If the lightbox window HTML already exists in document, 
		change the img src to to match the href of whatever link was clicked
		
		If the lightbox window HTML doesn't exists, create it and insert it.
		(This will only happen the first time around)
		*/
		
		if ($('#lightbox').length > 0) { // #] exists
			
			var lightbox = 
			'<div id="lightbox">' +				 
				'<div id="content_sec" class="show-image">' + //insert clicked link's href into img src
					'<img data-id="'+dataid+'" src="' + image_href +'" />' +
					
				'</div>' +	
			'</div>';  
			
			
			//place href as img src value
			$('#content').html(lightbox);
		   	
			//show lightbox window - you could use .show('fast') for a transition
			$('#lightbox').show();
			
			//$('#content_sec').prepend('<a style="position: absolute; margin-left: 46%; margin-top: 68.7%;z-index: 2;font-size: 11px;" aria-expanded="false" role="button" aria-haspopup="true" data-target="#reportphotomodel" data-toggle="modal" class="dropdown-toggle" href="#" id="reportphoto">Report Photo</a>');
			
			$('#content_sec').prepend('<input id="reportphoto" class="reportphoto" type="button" value="Report Photo" />');
			
		}
		
		else { //#lightbox does not exist - create and insert (runs 1st time only)
			
			//create HTML markup for lightbox window
			var lightbox = 
			'<div id="lightbox">' +				 
				'<div id="content" class="show-image">' + //insert clicked link's href into img src
					'<img data-id="'+dataid+'"  src="' + image_href +'" />' +
					'<a style="position: absolute; margin-left: 23%; margin-top: 7.5%;z-index: 2;" aria-expanded="false" role="button" aria-haspopup="true" data-toggle="dropdown" class="dropdown-toggle" href="#" id="reportphoto">Report Photo</a>'+
				'</div>' +	
			'</div>';
				
			//insert lightbox HTML into page
			$('body').append(lightbox);
		}
		
	});
	
	//Click anywhere on the page to get rid of lightbox window
	$('#lightbox').on('click', function() { //must use live, as the lightbox element is inserted into the DOM
		$('#lightbox').hide();
		$('#lightbox-background').hide();
	});

});
</script>

<script type="text/javascript">
	

	
	
	
	 $('#fav').click(function (event) {
		 $('.fav').show();
		 $('#fav').toggle();
		 $('#unfav').show();
		 
		 //ajax call to add to favourites 
		var url="{{URL::to('users/favoriteuser')}}";
        $.post(url,{user_id:'{{$user->id}}'},
		    function(data, textStatus, jqXHR)
		    {
		          
		    });		 
        });
      
      $('#unfav').click(function (event) {
		 $('.fav').hide();
		 $('#fav').toggle();
		 $('#unfav').hide();
		 
		 
		 //ajax call to remove from favourites
		 var url="{{URL::to('users/unfavoriteuser')}}";
        $.post(url,{user_id:'{{$user->id}}'},
		    function(data, textStatus, jqXHR)
		    {
		          
		    });		 
        });
		 
      
	
</script>
@endif
 @stop
