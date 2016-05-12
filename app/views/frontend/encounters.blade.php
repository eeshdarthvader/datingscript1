@extends('frontend.layout')

@section('content')

    
    @if(!$encounter_user)
    <div class="col-sm-9">
        <div class="meeting-game-right-part">
                <div class="alert alert-info no-encounters">
					<strong>There are no more people based on your preference! Either change filters or try later</strong> 
   				</div>
        </div>
    </div>
	
	@else                            
    <div class="col-sm-9">
        <div class="meeting-game-right-part">
	        @if($photos['public_photos_count'] > 0)
            <div class="pics">
                <div class="pic-count"> <i class="fa fa-camera"></i>{{$photos['public_photos_count']}}</div>
                <ul>
                     @foreach($photos['public_photos'] as $photo)
	                                
					 	<li><a href="javascript:void(0)"><img src="{{URL::to('uploads/photos/'. $photo->photo_id)}}" alt="..."></a></li>
					 @endforeach   
                </ul>
            </div>
            @endif
            <!--<div class="pics">
                <div class="pic-count"> <i class="fa fa-video-camera"></i> 1 </div>
                <ul>
                    <li><a href="javascript:void(0)"><img src="{{URL::to('/assets/frontend/images/video-1.jpg')}}" alt="..."></a></li>
                </ul>
            </div>!-->

                            
            <div class="meeting-profile">
                <div class="meeting-pro-tag"><img src="{{URL::to('/assets/frontend/images/profile-tag.png')}}" alt="..."></div>
                <div class="meeting-profile-top">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="meeting-pro-detail">
                                <h1>{{$encounter_user->first_name}}<span>mobile</span></h1>
                                <p>Common Friends <span>4</span></p>
                                <p>Common interests <span>{{$common_interests}}</span></p>
                            </div>
                        </div>
                        
                        <div class="col-sm-8">
                            <div class="meet-pro-right-options">
                                <ul>
                                    {{ Form::open(array('url' => '/encounters/encounteryes', 'method' => 'POST','id' => 'encounter_yes_form',"style"=>"display:inline-block;")) }}
                                        <li><a id="encounter-yes"><img src="{{URL::to('/assets/frontend/images/icon-like.png')}}" alt="..."> I like</a></li>
                                    {{Form::close()}}
                                    {{ Form::open(array('url' => '/encounters/encounterno', 'method' => 'POST','id' => 'encounter_no_form',"style"=>"display:inline-block;")) }}
                                        <li><a id="encounter-no"><img src="{{URL::to('/assets/frontend/images/icon-discard.png')}}" alt="..."> Discard</a></li>
                                    {{Form::close()}}
                                    <li><a href="javascript:void(0)"><img src="{{URL::to('/assets/frontend/images/icon-share.png')}}" alt="..."> Share</a></li>
                                    <li><a id="view-profile"><img src="{{URL::to('/assets/frontend/images/icon-profile.png')}}" alt="..."> View profile</a></li>
                                </ul>
                                
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close close-bg" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title title-setting">
                                                Increase your chances!
                                            </h4>
                                        </div>
                                        <div class="modal-body game-over">
                                            <div class="row">
                                                                    <div class="col-xs-4">
                                                                        <div class="more-opportunities-box">
                                                                            <img src="{{URL::to('/assets/frontend/images/profile-pic.png')}}" alt="...">
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
                                                                            <img src="{{URL::to('/assets/frontend/images/profile-pic.png')}}" alt="...">
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
                                                                            <img src="{{URL::to('/assets/frontend/images/profile-pic.png')}}" alt="...">
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
                                                                        <li class="pop-send-btn"><a href="javascript:void(0)">Send them requests</a></li>
                                                                        <li class="pop-continue-btn"><a href="javascript:void(0)">keep playing</a></li>
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
                                        </div>
                                    </div>
                                </div>
                                <div class="meeting-profile-btm">
                                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators
                                        <ol class="carousel-indicators">
                                          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                        </ol>-->
                                        <!-- Wrapper for slides -->
                                        

                                        <div class="carousel-inner" role="listbox">
	                                       	 @for($i=0; $i<sizeof($photos['public_photos']);$i++ )                                        
                                            <div class="item @if($i==0)active @endif" > <img src="{{URL::to('uploads/photos/'. $photos['public_photos'][$i]->photo_id)}}" alt="..."> </div>
                                            @endfor

                                            </div>
                                                                                    

                                        <!-- Controls -->
                                        <a class="left carousel-control bg-none" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control bg-none" href="#carousel-example-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                                    </div>
                                </div>

                                <div class="expand-profile" style="display:none">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="m-game-pro-left">
                                                <div class="left-option">
                                                    <h1>Location</h1>
                                                    <div>{{$encounter_user->city}}</div>
                                                    <div id="map-profile" data-target="#myModalNew2" data-toggle="modal"></div>


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
                                                                $interest->name
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
                                                                        {{$field->name}}<span>
                                                                            <span>{{$field->value}}</span>
                                                                        </span>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                                            @endforeach


                                            <div class="personal-info m-game-pro-left about-me">
                                                <h1>Language</h1>
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
                                                                    <img src="{{URL::to('assets/frontend/images/icon-profile.png')}}" class="media-object" alt="Sample Image">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading">The Hottest people</h4>
                                                                    <small>23 January 2014</small>
                                                                </div>
                                                            </li>
                                                            <li class="media">
                                                                <a href="#" class="pull-left">
                                                                    <img src="{{URL::to('assets/frontend/images/icon-profile.png')}}" class="media-object" alt="Sample Image">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading">The Hottest people</h4>
                                                                    <small>23 January 2014</small>
                                                                </div>
                                                            </li>
                                                            <li class="media">
                                                                <a href="#" class="pull-left">
                                                                    <img src="{{URL::to('assets/frontend/images/icon-profile.png')}}" class="media-object" alt="Sample Image">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading">The Hottest people</h4>
                                                                    <small>23 January 2014</small>
                                                                </div>
                                                            </li>
                                                            <li class="media">
                                                                <a href="#" class="pull-left">
                                                                    <img src="{{URL::to('assets/frontend/images/icon-profile.png')}}" class="media-object" alt="Sample Image">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading">The Hottest people</h4>
                                                                    <small>23 January 2014</small>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div>
                                                <div class="gifts">
                                                    <p class="gifts-qnty"><strong>Gifts</strong></p>
                                                    <a href="javascript:void(0);">
                                                        <div class="btn-gifts">
                                                            <h1>Attract With gifts</h1>
                                                        </div>
                                                    </a>


                                                    <div class="bs-example gifts-container">
                                                        <ul class="media-list">
                                                            <li class="media">
                                                                <a href="#" class="pull-left">
                                                                    <img src="{{URL::to('/assets/frontend/images/icon-instagram.png')}}" class="media-object" alt="Sample Image">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading">The Hottest people</h4>
                                                                    <small>23 January 2014</small>
                                                                </div>
                                                            </li>
                                                            <li class="media">
                                                                <a href="#" class="pull-left">
                                                                    <img src="{{URL::to('/assets/frontend/images/icon-instagram.png')}}" class="media-object" alt="Sample Image">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading">The Hottest people</h4>
                                                                    <small>23 January 2014</small>
                                                                </div>
                                                            </li>
                                                            <li class="media">
                                                                <a href="#" class="pull-left">
                                                                    <img src="{{URL::to('/assets/frontend/images/icon-instagram.png')}}" class="media-object" alt="Sample Image">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading">The Hottest people</h4>
                                                                    <small>23 January 2014</small>
                                                                </div>
                                                            </li>
                                                            <li class="media">
                                                                <a href="#" class="pull-left">
                                                                    <img src="{{URL::to('/assets/frontend/images/icon-instagram.png')}}" class="media-object" alt="Sample Image">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading">The Hottest people</h4>
                                                                    <small>23 January 2014</small>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <br />
                                                    <br />
                                                    <div class="container-fluid">
                                                        <p>She is now at <span style="color:#f03f7c">position 278</span> <p>
                                                            in search results, 14 profile visitors today, 83 this months
                                                        </p></p>
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

                                <div class="col-xs-1 vmiddle">
                                   <!-- <a class="vcenter" aria-expanded="false" role="button" aria-haspopup="true" data-toggle="dropdown" class="dropdown-toggle" href="#" id="">Report Photo</a>-->
                                    <div aria-labelledby="reportphoto" role="menu" class="dropdown-menu bor" style="width:141%;background-color: #E0EAC9;margin-top:7%"> 
										
										<div class="arrow-up-2"></div>
										<div class="report-abuse">
	
                                    <h2>Report photo</h2>
                                    
                                    
                                                                       <br/>
                                    <form id="report-photo-form">
                                        <table class="table borderless">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label><input type="radio" class="radio-bootstrap-messege" name="report_photo" >Inappropriate photo</label>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>

                                                        <label><input type="radio" class="radio-bootstrap-messege" name="report_photo"   >Celebrity photo</label>

                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>
                                                        <label><input type="radio" class="radio-bootstrap-messege" name="report_photo"  >Other</label>
                                                    </td>

                                                </tr>

                                            </tbody>
                                        </table>

                                        <button class="report-btn btn-xs" type="submit">
                                            Report
                                        </button>
                                       <!-- <button class="report-cancel-btn btn-xs" type="button">
                                            cancel
                                        </button>-->
                                    </form>
                             
						</div>
                                </div>
                            </div>
                           
                        </div>
                    </div>

		<div class="modal fade" id="match" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="text-center match-header">                       
                        It's a Match !
                    </p>
                </div>
                <div class="modal-body ">
                    <div class="row">
                        <div class="col-xs-2">
                            
                        </div>
                        <div class="col-xs-4">
                            <div class="match">
                                <img src="{{URL::to('assets/frontend/images/profile-pic.png')}}" alt="...">
                            </div>
                        </div>                       
                        <div class="col-xs-4">
                            <div class="match">
                                <img src="{{URL::to('assets/frontend/images/meeting_game_11.png')}}" alt="...">
                            </div>
                        </div>
                        <div class="col-xs-2">

                        </div>
                        
                    </div>
                    <br/>
                    <p class="text-center">
                        You and <strong id="name">{{$encounter_user->first_name}}</strong> have liked each other.<br>
                       
                    </p>
                    <br/>
                    <div class="popup-btm-btn">
                        <ul>
                            <li class="pop-send-btn"><a href="{{URL::to('user/' .$encounter_user->id)}}">Visit profile</a></li>
                            <li class="pop-continue-btn btn-danger"><a href="{{URL::to('/encounters')}}">keep playing</a></li>
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

 @endif
    <!--Bootstrap pop up-->
    <!--<div class="modal fade" id="myModalNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>-->

    <div class="modal fade" id="myModalNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close close-bg" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title-addprofile">
                        Eesh Tyagi<br>
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

    

    @stop

    @section('scripts')
    
    <script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=true&libraries=places&language=en"></script>


   
    <script type="text/javascript">

        $("#view-profile").click(function () {
            //$('.expand-profile').load("encounters_partial_view.html");
           $(".expand-profile").toggle();
            $(".meeting-profile-btm").toggle();          

        });

        /*$('#myModalNew').on('shown.bs.modal', function () {
            $('#myInput').focus()
        })*/

       $("#encounter-no").click(function(){
            $("#encounter_no_form").submit();
       });
       
       

	   	@if($encounter_user)
		   	//var $jq = jQuery.noConflict(true);
            jQuery("#encounter-yes").click(function (e) {
	            if('{{$encounter_user->encountered}}' == 'yes') {
					jQuery('#match').modal({backdrop: 'static'});
					jQuery.ajax(
					{
						// The link we are accessing.
						url: "{{URL::to('/encounters/mutualyes')}}",
            
			            // The type of request.
			            type: "post" 
					});
	            
	            }
                else {
	                jQuery("#encounter_yes_form").submit();
                }
               
            });
		
		
		$(function(){ 
		  	var mapOptions = {
		        center: { lat: {{$user->lat}}, lng: {{$user->lng}}},
		        zoom: 10
		    };
		     
		    var map = new google.maps.Map(document.getElementById('map-profile'),mapOptions);
		});

		@endif
    </script>

    @stop
