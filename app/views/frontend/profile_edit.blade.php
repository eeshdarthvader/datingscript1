﻿@extends('frontend.layout')

@section('content')


				<div class="col-sm-9">
					<div class="meeting-game-right-part">
                   
						
                        <div class="meeting-profile"  >
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
                                            <span  class="btn-primary btn-xs edit_main_profile">Edit</span>
                                            
                                            <h1>{{$user->first_name}} ({{$user->display_gender()}},{{$user->age}})</h1>
                                        </div>
                                    </div>
									
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="container save-profile-div" style="display:none;">
                                       
                                        <form id="general-info" method="post" action="{{URL::to('profile/general')}}">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <label class="control-label">Name or nickname</label>
                                                        <input type="text" class="form-control" name="name" value="{{$user->first_name}}"/>
                                                    </div>

                                                    <div class="col-xs-6 selectContainer">
                                                        <label class="control-label">Birthday</label>
                                                        <div id="demo" ></div> 
                                                    </div> 
                                                    
                                                    <div class="col-xs-3 selectContainer">
                                                        <label class="control-label">Gender</label>
                                                        <select class="form-control" name="gender">
                                                            <option value="male" @if($user->gender =="male") selected @endif >Male</option>
                                                            <option value="female" @if($user->gender =="female") selected @endif >Female</option>                                                       
                                                        </select>
                                                    </div>                                                 
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-4 col-sm-10">
                                                    <input type="submit" class="btn btn-default btn-Save" value="Save Update"/>
                                                    <button type="button" id="cancel-profile"  class="btn btn-default ">Cancel</button>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                                <br/>
                            </div>
<div id="cnt-toggle">
                            <div class="pics">
                                <div class="pic-count"> <i class="fa fa-camera"></i> {{$photos['public_photos_count']}} </div>
                                <ul>
                                    <li><a href="javascript:void(0)"><img data-toggle="modal" data-target="#imageUploadEdit" src="{{URL::to('assets/frontend/images/add.png')}}" width="86px" height="80px" alt="..."></a></li>
                                    
                                     @foreach($photos['public_photos'] as $photo)
	                                
                                    <li><a href="javascript:void(0)"><img src="{{URL::to('uploads/photos/'. $photo->photo_id)}}" alt="..."></a></li>
                                    @endforeach
                                    
                                    
                                   
                                </ul>
                            </div>
                           

                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="m-game-pro-left">
                                        <div class="left-option">                                           
                                            <h1>Location</h1>
                                            <form id="map-update" action="{{URL::to('profile/location')}}" method="post">
                                                <div class="dropdown-map-update">
                                                    <span  class="btn-primary btn-xs edit-map">Edit</span>
                                                    <div aria-labelledby="drop10" role="menu" class="bor2" style="display:none">                                                        
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="drop-cover">
                                                                    <div class="heading-drop">
                                                                        <h4>Where(Distance from me)</h4>
                                                                    </div>
                                                                    <div class="check-b slider-setting">
                                                                        <div class="search-box">
                                                                            <input type="text" class="form-control text" placeholder="{{$user->city}}" name="pref_location" value="{{$user->city}}" id="pref_location">
                                                                            <input type="hidden" class="form-control" id="pref_lat" name="pref_lat" value="{{$user->lat}}">
																			<input type="hidden" class="form-control" id="pref_lng" name="pref_lng" value="{{$user->lng}}">
																			<input type="hidden" class="form-control" id="pref_city" name="pref_city" value="{{$user->city}}">
                                                                            <i class="fa fa-search cus-search"></i>
                                                                        </div>

                                                                        <input type="text" id="single3" value="" name="pref_dist" />
                                                                    </div>
                                                                </div>


                                                            </div>

                                                        </div>
                                                        <div class="new-btns">
                                                            <input type="submit" id="save_map" style="color:white" class="btn btn-ook" value="Save update"/>
                                                            <button type="button" id="cancel-map" class="btn btn-default ">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <div>{{$user->city}}</div>
                                            <div id="map-profile" data-target="#myModalNew2" data-toggle="modal" ></div>


                                        </div>
                                    </div>

                                    <div class="m-game-pro-left">
                                        <div class="left-option">
                                            <span  class="btn-primary btn-xs edit">Edit</span>
                                            <h1>I'm here to</h1>
                                           
                                            <p>{{$user_pref->here_to_display()}}</p>
											<div class="cnt" style="display:none">
												<form method="post" action="{{URL::to('profile/hereto')}}">
													<div class="drop-cover2">
														<div class="heading-drop" style="color:white">
															<h4>I'm here to</h4>
														</div>
														<div class="check-b">
																
															<div class="custom-check">
																<input type="radio" class="check" @if($pref_here_to == 'make_friends')checked="checked" @endif  name="pro_here_to" id="pro_no1" value="make_friends" />
																<label class="label-check" for="pro_no1">Make new friends </label>
															</div>
															<div class="custom-check">
																<input type="radio" class="check"  name="pro_here_to" @if($pref_here_to == 'chat')checked="checked" @endif id="pro_no2" value="chat" /> 
																<label class="label-check" for="pro_no2">Chat </label>
															</div>
															<div class="custom-check">
																<input type="radio" class="check"  name="pro_here_to" id="pro_no3" value="date" @if($pref_here_to == 'date')checked="checked" @endif/>
																<label class="label-check" for="pro_no3">Date</label>
															</div>
																
														</div>
													</div>
													
													<div class="drop-cover2" >
														<div class="heading-drop" style="color:white">
															<h4>Wanted ages</h4>
														</div>   
														<div class="check-b wntd-age">
															<ul>
															<li>
																<div class="custom-radio">
																	<input type="checkbox" @if($pref_gender == 'male' || $pref_gender == 'both')checked="checked" @endif class="custom-rad" name="pro_gender_male" id="pro_gender_male" value="male" />
																	<label class="label" for="pro_gender_male">Male</label>
																</div>
															</li>
															<li>
																<div class="custom-radio">
																	<input type="checkbox" @if($pref_gender == 'female' || $pref_gender == 'both')checked="checked" @endif class="custom-rad" name="pro_gender_female" id="pro_gender_female" value="female" />
																	<label class="label" for="pro_gender_female">Female</label>
																</div>
															</li>
														</ul>
																
															<input type="text" id="range2" value="" name="pro_age_range" />
														</div>
													</div>
													
													<div class="new-btns4">
		                                   	            <input type="submit" id="save_here_to" style="color:white" class="btn btn-ook" value="Save update"/>
		                                                <button type="button" id="cancel_here_to" class="btn btn-default ">Cancel</button>
		                                            </div>
												</div>
											</form>
                                        </div>
                                    </div>

                                    <div class="m-game-pro-left">
                                        <div class="left-option">
                                            <span class="btn-primary btn-xs edit-interests">Add</span>
                                            @if($interests)
	                                            <h1>Interests</h1>
	                                           
	                                            @foreach($interests as $interest)
							                           
						                           
                                                <p class="styleInterests" name="interest">
						                                   <span class="styleInterests-inrtext"> {{$interest->name}}</span>
                                                           <i class="ico ico--xsm ico--grey ico--cross">

                                                            <span class="b-link js-search-interest-remove" data-interests-id="1951" ></span>

                                                        </i>					                            
						                        </p>
                                                 @endforeach
					                        @else
					                        <h1> Interests</h1>
					                        <p>
						                        No interests added till now. Add Interests
					                        </p>
					                        @endif 
                                            <form method="post" action="{{URL::to('profile/addnewinterest')}}" id="add-interest">
                                                <div class="interests" style="display:none">
                                                    <div class="arrow-upp"></div>
                                                    <div class="arrow-up-2"></div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="interests-open">
                                                                <div class="check-b slider-setting">
                                                                    <div class="search-box">
	                                                                    <input type="hidden" id="user_interest" name="user_interest" value="">
                                                                        <input type="text" id="user_interest_search" name="user_interest_search" class="form-control text" placeholder="Enter interest to add">
                                                                        <i class="fa fa-search cus-search"></i>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>

                                                    </div>
                                                    <div class="new-btns2">
                                                        <input type="submit" style="color:white" class="btn btn-ook" value="Add" />
                                                        <button type="button" id="cancel-interests" class="btn btn-default ">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>                                          
                                        </div>
                                    </div>
                                    
                                    @foreach($user_custom_profile as $section)
						
						                    <div class="personal-info m-game-pro-left">
							                    <span  class="btn-primary btn-xs edit-profile-section-{{$section->id}} edit-personalInfo">Edit</span>
						                        <h1>{{$section->name}}</h1>
						                        <ul style="padding-top: 0px;">
						
						                            @foreach($section->fields as $field)
						 
						                                <li>
						                                    {{$field->name}}
						                                    <span>
						                                    @if($field->filled)
						                                        <span>{{$field->value}}</span>
						                                    @else
						                                    	<span> Not filled in </span>
						                                    
						                                    @endif
						                                    
						                                    </span>
						                                </li>
						                                
						                            @endforeach
						                        </ul>
						                        
						                        
						                    </div>
						                    
						                    <div class="personal-info m-game-pro-left">
                                       
                                        <div class="row  profile-section-{{$section->id}}-div personalInfo-div" style="display:none">
                                            <div class="container">
						                    
                                                <form id="profile-section-{{$section->id}}-form" method="post" class="form-horizontal" role="form" action="{{URL::to('profile/profilesection')}}">
                                                    
	                                                    
	                                                <input type="hidden" name="section_id" value="{{$section->id}}" />
	                                                    
	                                                @foreach($section->fields as $field)
	                                                    <div class="form-group">
	                                                        <label class="control-label col-sm-2 col-sm-offset-1" for="relationshipstatus">{{$field->name}}</label>
	                                                        <div class="col-sm-6">
		                                                        @if($field->type == 'text')
																	
																	<input type="text" name="{{$field->id}}" class="form-control" name="position" @if($field->filled) value="{{$field->value}}" @endif/>
		                                                        
		                                                        @elseif($field->type == 'dropdown')
		                                                        
		                                                        	<select class="form-control" name="{{$field->id}}">
		                                                                @foreach($field->options as $option)
		                                                                	<option value="{{$option->name}}" @if($field->filled && $field->value == $option->name) selected @endif>{{$option->name}}</option>
		                                                                @endforeach	                                                            																</select>
		                                                        
		                                                        @elseif($field->type == 'checkbox')
		                                                        	
																			<input type="radio" class="check" @if($field->filled && $field->value == "yes") checked="checked" @endif  name="{{$field->id}}" id="{{$field->id}}_1" value="yes" />
																			<label class="label-check" for="{{$field->id}}_1">Yes</label>
																		
																			<input type="radio" class="check"  name="{{$field->id}}" @if($field->filled && $field->value == "no") checked="checked" @endif id="{{$field->id}}_2" value="no" /> 
																			<label class="label-check" for="{{$field->id}}_2">No</label>
		                                                        
		                                                        @endif
	                                                        </div>
														</div>
                                                    @endforeach
                                                   
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <input type="submit" class="btn btn-default btn-Save" value="Save Update" />
                                                            <input type="button" id="cancel-profile-section-{{$section->id}}" class="btn btn-default " value="Cancel" />
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
						                    </div>
                                            
						                @endforeach

									<div class="personal-info m-game-pro-left about-me">
						                <h1 >Language</h2>
						                <p>English</p>
						            </div> 
						            </br>
                                    <div class="personal-info m-game-pro-left about-me">
                                        <span class="btn-primary btn-xs edit-about-me">Edit</span>
                                        <h1>About Me</h1>
                                       
                                       @if($user_profile['exists'] && $user_profile['about_me'])
                                        <p>{{$user_profile['about_me']}}</p>
                                       @else
                                       	<p> Not filled in </p>
                                       @endif
                                       
                                       <form name="about-me" style="width: 170%;" method="post" action="{{URL::to('profile/aboutme')}}">
                                        <div class="form-group edit-about-me-div" style="display:none" >
                                                <textarea class="edit-about-me-textarea" name="about_me" id="about_me"></textarea>
                                                <div class="col-sm-offset-4 col-sm-10" style="margin-top: 5%; margin-left: 31%;width: 179.333%">
                                                    <input class="btn btn-ook" type="submit" value="Save update" style="color:white"></input>
                                                    <button type="button" id="cancel-aboutme"  class="btn btn-default ">Cancel</button> 
                                                </div>
                                        </div>
                                       </form>
                                    </div>
                                    </br>
                                    <div class="personal-info m-game-pro-left about-me">
                                        <span class="btn-primary btn-xs edit-interested-in">Edit</span>
                                        <h1>Interested In</h1>
                                       
                                       @if($user_profile['exists'] && $user_profile['interested_in'])
                                        <p>{{$user_profile['interested_in']}}</p>
                                       @else
                                       	<p> Not filled in </p>
                                       @endif
                                       
                                       <form name="interested_in" style="width: 170%;" method="post" action="{{URL::to('profile/interestedin')}}">
                                        <div class="form-group edit-interested-in-div" style="display:none" >
                                                <textarea class="edit-interested-in-textarea" name="interested_in"></textarea>
                                                <div class="col-sm-offset-4 col-sm-10" style="margin-top: 5%; margin-left: 31%;width: 179.333%">
                                                    <input class="btn btn-ook" type="submit" value="Save update" style="color:white"></input>
                                                    <button type="button" id="cancel-interested"  class="btn btn-default ">Cancel</button> 
                                                </div>
                                        </div>
                                       </form>
                                    </div>

                                    <div class="view-friends">
                                        <h1>People I know</h1>

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

                                            <div class="bs-example awards-container" style="height:267px">
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
                                        
                                    </div>

                                </div>

                            </div>
                            </div>
                            
                             <div id="profile-photos" style="display:none">
	                             <div id="lightbox-background" style="display:none">
		                             
	                             </div>
	                             
	                             
	                             <div id="lightbox"  style="display:none">
								    
								    <div id="content">
								        <img src="#" />
								        
								    </div>
								    								</div>


                                <div class="profile-photos-header">
                                    <h1>Your photos ({{$photos['public_photos_count']}})</h1>
                                </div>

                                <div id="container-gutter" class="js-masonry" >
	                                <div class='item'><img data-toggle="modal" data-target="#imageUploadEdit" src="{{URL::to('assets/frontend/images/add.png')}}" alt="" width="86px" height="80px"></div>
	                                @foreach($photos['public_photos'] as $photo)
	                                
                                    <div class='item'><img class="lightbox_trigger" src="{{URL::to('uploads/photos/'. $photo->photo_id)}}" style="max-width:300px;max-height:300px" data-id="{{$photo->id}}" alt="">
	                                    
                                    </div>
                                    
                                    @endforeach
                                </div>
                                
                                <br />
                                @if($photos['public_photos_count'] > 0)
                                <div>
                                    <ul class="list-group">
                                        <li class="list-group-item add-commemnts">
                                        <form method="post" action="{{URL::to('profile/comment')}}">
                                            <img class="round" src="{{URL::to('uploads/photos/'.$user->photo_id)}}" alt="...">&nbsp;&nbsp;
                                            	
	                                            <input type="hidden" value="public" name="album">
                                            	<input type="hidden" value="{{$user->id}}" name="user_id">	
	                                            <textarea class="add-comments-comments" name="comment" autocomplete="off" ></textarea>
	                                            <div class="btn-add-comments" >
	                                                <h1>Add Comments</h1>
	                                            </div>
                                            </form>    
                                        </li>
                                        
                                        @foreach($comments['public_comments'] as $comment)
                                        <li class="comment-reply" data-id="reply">
                                        	<img class="round-comment" src="{{URL::to('uploads/photos/'.$comment->photo)}}" alt="...">&nbsp;&nbsp;
                                        	<h4><strong>{{$comment->user_name}}</strong>
	                                        	<br /><br /><p class="comment_text">{{$comment->comment}}</p><br /><br />
	                                        	 <small> {{$comment->date}}</small> &nbsp;&nbsp;&nbsp;&nbsp;
	                                        	 <a href="" class="reply">Reply</a>
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
                                    <div class='item'><img data-toggle="modal" data-target="#imageUploadFriends" src="{{URL::to('assets/frontend/images/add.png')}}" alt="" width="86px" height="80px"></div>
									@foreach($photos['friends_photos'] as $photo)
	                                
                                    <div class='item'><img class="lightbox_trigger" src="{{URL::to('uploads/photos/'. $photo->photo_id)}}" style="max-width:300px;max-height:300px" data-id="{{$photo->id}}" alt=""></div>
                                    @endforeach
                                
                                
                                </div>
                                
                                @if($photos['friends_photos_count'] > 0)
                                <div>
                                    <ul class="list-group">
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
                                        
                                        @foreach($comments['album_comments'] as $comment)
                                        <li class="comment-reply" data-id="reply">
                                        	<img class="round-comment" src="{{URL::to('uploads/photos/'.$comment->photo)}}" alt="...">&nbsp;&nbsp;
                                        	<h4><strong>{{$comment->user_name}}</strong>
	                                        	<br /><br /><p class="comment_text">{{$comment->comment}}</p><br /><br />
	                                        	 <small> {{$comment->date}}</small> &nbsp;&nbsp;&nbsp;&nbsp;
	                                        	 <a href="" class="reply">Reply</a>
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
                                    <h1>Your Private photos ({{$photos['private_photos_count']}})</h1>
                                </div>
                                <div id="container-gutter3" class="js-masonry" >
                                    <div class='item'><img data-toggle="modal" data-target="#imageUploadPrivate" src="{{URL::to('assets/frontend/images/add.png')}}" alt="" width="86px" height="80px"></div>
									@foreach($photos['private_photos'] as $photo)
	                                
                                    <div class='item'><img class="lightbox_trigger" src="{{URL::to('uploads/photos/'. $photo->photo_id)}}" style="max-width:300px;max-height:300px" data-id="{{$photo->id}}" alt=""></div>
                                    @endforeach
                                
                                
                                </div>
								
								@if($photos['private_photos_count'] > 0)
                                <div>
                                    <ul class="list-group">
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
                                        @foreach($comments['private_comments'] as $comment)
                                        <li class="comment-reply" data-id="reply">
                                        	<img class="round-comment" src="{{URL::to('uploads/photos/'.$comment->photo)}}" alt="...">&nbsp;&nbsp;
                                        	<h4><strong>{{$comment->user_name}}</strong>
	                                        	<br /><br /><p class="comment_text">{{$comment->comment}}</p><br /><br />
	                                        	 <small> {{$comment->date}}</small> &nbsp;&nbsp;&nbsp;&nbsp;
	                                        	 <a href="" class="reply">Reply</a>
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

								
                            </div>
                            
                            
                        </div>

                        
						
						
					</div>
				</div>
			</div>

            
		</div>

       
	</div>
</div>

  <div class="modal fade" id="imageUploadEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content container-fluid">
                <div class="modal-header">
                    <button type="button" class="close close-bg" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title-popularity">
                        Add photos of yourself
                        <br />
                        <small>
                            Meet new people<br />
                            in your area today -just upload your pictures...
                        </small>

                    </h2>
                    <form id="profile_pic" method="POST" accept-charset="utf-8" enctype="multipart/form-data" action="{{URL::to('profile/uploadimage')}}">

					   <input type="hidden" value="public" name="album"/>
	                   <input title="Choose a file" id="file" class="image-upload-cnt image_uploaded_public" name="file" type="file">
					   <button type="submit" class="btn btn-primary btn-block btn-pink image-upload-public">Upload from your computer</button>
                    </form>
                    <br/>
                   
                   
                </div>
            </div>    
        </div>
  </div>
                
                <div class="modal fade" id="imageUploadFriends" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content container-fluid">
                <div class="modal-header">
                    <button type="button" class="close close-bg" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title-popularity">
                        Add photos of yourself with your friends
                        <br />
                        <small>
                            Meet new people<br />
                            in your area today -just upload your pictures...
                        </small>

                    </h2>
                    <form id="profile_pic" method="POST" accept-charset="utf-8" enctype="multipart/form-data" action="{{URL::to('profile/uploadimage')}}">
					   <input type="hidden" value="album" name="album"/>
	                   <input title="Choose a file" id="file" class="image-upload-cnt image_uploaded_friends" name="file" type="file">
                    <button type="submit" class="btn btn-primary btn-block btn-pink image-upload-friends">Upload from your computer</button>
                    </form>
                    <br/>
                   
                   
                 </div>
            </div>    
        </div>
  </div>


<div class="modal fade" id="imageUploadPrivate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content container-fluid">
                <div class="modal-header">
                    <button type="button" class="close close-bg" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h2 class="modal-title-popularity">
                        Add Private photos of yourself
                        <br />
                        <small>
                            Only your matches will be able to see then
                        </small>

                    </h2>
                    <form id="profile_pic" method="POST" accept-charset="utf-8" enctype="multipart/form-data" action="{{URL::to('profile/uploadimage')}}">
					   <input type="hidden" value="private" name="album"/>
	                   <input title="Choose a file" id="file" class="image-upload-cnt image_uploaded_private" name="file" type="file">
                    <button type="submit" class="btn btn-primary btn-block btn-pink image-upload-private">Upload from your computer</button>
                    </form>
                    <br/>
                   
                   
                 </div>
            </div>    
        </div>
  </div>


@stop

@section('scripts')

<script>
	var photoid;
	
	$(document).on('click', '#reportphoto', function (e) {
    
		photoid= $(this).siblings('img').data('id');
		//alert(photoid);
		
		$('#reportphotomodel').modal({
        	show: 'true'
    	}); 
    	
    	
	});
	
	
	
	$(document).on('click', '.deletephoto', function (e) {
		   
		var photoid=$(this).siblings('img').data('id');
		
		var url="{{URL::to('profile/deletephoto')}}";
		
		 var dataid=$(this).data('id');
		
			$.ajax({
	             url: url,
	             type: 'POST',
	             dataType: 'html',
	             data: {
	                id:photoid
	             },
	             success: function(data) {
	                 
	               
	                 alert('Photo deleted');
	                  window.location.href=base_url+"/user/"+'{{$user->id}}'+"?tab=photos";
	                
	             }
	     });

		
		
	});
	
	
	  
	


	</script>

<script>
	
	  		var interestsearch_selected = 0;
	  		var user_interest= $("#user_interest").val();
	  		$("#user_interest_search").autocomplete({
               source: function(request,response)
			   {
					$.ajax({
						type:"post",
						url:"{{URL::to('dashboard/getinterests')}}",
						dataType:"json",
						data:
						{
							query:request.term
						},
						success:function(data){
							console.log(data);
							response(data);
					
						},
						error:function(){
							alert("Error!Something went wrong! Try again.");
						}
					});
			   
			   },
			   minLength:2,
			   select:function(event,ui)
			   {
			   		event.stopPropagation();
					jQuery(this).val(ui.item.value);
			   
			   },
			   open: function () {
			   		setTimeout(function () {
			   			$('.ui-autocomplete').css('z-index', 99999999999999);
        			}, 0);
					jQuery(this).removeClass("ui-corner-all").addClass("ui-corner-top");
				},
			
			   change:function(event,ui)
			   {
					if (ui.item) {
					}
				
			   },
			   close: function() {
			   		$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
      			}
     		}).val(user_interest).data('autocomplete');
	 	
</script>


<script>
	
	var inputCity = $("#pref_location").get(0);
 var autocompleteCity = new google.maps.places.Autocomplete(inputCity);
 /*
var input = document.getElementById('location');
  google.maps.event.addDomListener(input, 'keydown', function(e) { 
    if (e.keyCode == 13) { 
        e.preventDefault(); 
    }
  });  */

google.maps.event.addListener(autocompleteCity, 'place_changed', function(e, l) {

    var place = autocompleteCity.getPlace();
    
    $("#pref_lat").val(place.geometry.location.lat());

    $("#pref_lng").val(place.geometry.location.lng());

    $("#pref_city").val(place.name);


    for (var i = 0; i < place.address_components.length; i++) {
    	var addressType = place.address_components[i].types[0];
    	if (addressType == 'country') {
      		var country = place.address_components[i]['long_name'];
      		//$("#country").val(country);
      		break;
    	}
  	}
    

    });
	
	

    $(function () {

		$("#single3").ionRangeSlider({
		    hide_min_max: true,
		    keyboard: true,
		    min: 0,
		    max: 100,
		    from: "{{$user_pref->dist}}",
		    //to: 80,
		    type: 'single',
		    step: 1,
		    prefix: "Km :",
		    grid: true
		});
		
        $("#range2").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 80,
            from: "{{$user_pref->min_age}}",
            to: "{{$user_pref->max_age}}",
            type: 'double',
            step: 1,
            prefix: "",
            grid: true
        });


      
   
    });
	$(function(){ 
	 
	 $(".dropdown-menu.bor2").click(function (event) {
	     event.stopPropagation();
	 });
	
   }); 
</script>
<!-- custom scrollbar plugin -->
	<script src="{{URL::to('assets/frontend/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{URL::to('assets/frontend/js/masonry.pkgd.js')}}"></script>
    <script src="{{URL::to('assets/frontend/js/index.js')}}"></script>
	<script>
		(function($){
        $(window).trigger('resize');
			$(window).load(function(){
				
				$("#content-7").mCustomScrollbar({
					scrollButtons:{enable:true},
					theme:"3d-thick"
				});
				
			});
		})(jQuery);

		$('.edit_main_profile').click(function (event) {
		    $('.save-profile-div').show();
		});

		$('#cancel-profile').click(function (event) {
		    $('.save-profile-div').hide();
		}
        );
		$('#cancel-map').click(function (event) {
		    $('.dropdown-map-update').removeClass('open');
		    $('#map-profile').show();
		}
        );

		$('#cancel-interests').click(function (event) {
		    $('.interests').hide();
		}
        );

		

		$('.edit').click(function (event) {
			 $('.cnt').show();
		}
        );

		$('.edit-map').click(function (event) {
			 $('.bor2').show();
		    $('#map-profile').hide();
		}
        );

		

		
		$('#save_map,#cancel-map').click(function (event) {
			 $('.bor2').hide();
		    
		}
        );
		$('#save_here_to,#cancel_here_to').click(function (event) {
			 $('.cnt').hide();
		    
		}
        );
		
		

		$('.edit-interests').click(function (event) {
		    $('.interests').show();
		}
        );
		
		
				


		
	</script>

    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.js"></script>
    <script>
        $(document).ready(function () {

            $('#general-info').validate({ // initialize the plugin
                rules: {
                    name: {
                        required: true
                       
                    },
                    gender: {
                        required: true
                    }
                }
            });
            
            $('#add-interest').validate({ // initialize the plugin
                rules: {
                    user_interest_search: {
                        required: true
                       
                    }             
                }
            });

           
        });
    </script>
    
    <script src="{{URL::to('assets/frontend/js/jquery-birthday-picker.min.js')}}"></script>


    <script type="text/javascript">

         
         $("#demo").birthdayPicker({"defaultDate" : "{{$user->dob}}"});
       
		 $(function(){ 
		  	var mapOptions = {
		        center: { lat: {{$user->lat}}, lng: {{$user->lng}}},
		        zoom: 10
		    };
		     
		    var map = new google.maps.Map(document.getElementById('map-profile'),mapOptions);
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
		
		if ($('#lightbox').length > 0) { // #lightbox exists
			
			
			
			var lightbox = 
			'<div id="lightbox">' +				 
				'<div id="content_sec-edit"  class="show-image">' + //insert clicked link's href into img src
					'<img data-id="'+dataid+'" src="' + image_href +'" />' +
					
				'</div>' +	
			'</div>';  
			
			
			//place href as img src value
			$('#content').html(lightbox);
		   	
			//show lightbox window - you could use .show('fast') for a transition
			$('#lightbox').show();
			
			$('#content_sec-edit').prepend('<input class="deletephoto" type="button" value="Delete" />');


			
		}
		
		else { //#lightbox does not exist - create and insert (runs 1st time only)
			
			//create HTML markup for lightbox window
			var lightbox = 
			'<div id="lightbox">' +
				
				'<div id="content">' + //insert clicked link's href into img src
					'<img src="' + image_href +'" />' +					
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
	
	

    $('.edit-about-me').click(function (event) {
		$('.edit-about-me-div').show();
	});

    $('.edit-interested-in').click(function (event) {
		$('.edit-interested-in-div').show();
	});


                
    $('#cancel-aboutme').click(function (event) {
		$('.edit-about-me-div').hide();
	});

    $('#cancel-interested').click(function (event) {
		$('.edit-interested-in-div').hide();
	});
	
	 $('.ico--cross').click(function (e) {
		$(this).parent().hide();

        var interest_name=$(this).siblings("span").html().trim();

        var url="{{URL::to('profile/deleteinterest')}}";
        $.post(url,
    {name:interest_name},
    function(data, textStatus, jqXHR)
    {
         
    });
       

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
       
    
    @foreach($user_custom_profile as $section) 

		$('.edit-profile-section-{{$section->id}}').click(function (event) {
		    $('.profile-section-{{$section->id}}-div').show();
		});
		
		$('#cancel-profile-section-{{$section->id}}').click(function (event) {
		    $('.profile-section-{{$section->id}}-div').hide();
		});

    @endforeach
    
      $('.image-upload-private').click(function(e){
            if($('.image_uploaded_private').val()=="")
            {
	            e.preventDefault();
	            alert('Please upload image !');
	            return false;
            }
        });	
        $('.image-upload-friends').click(function(e){
            if($('.image_uploaded_friends').val()=="")
            {
	            e.preventDefault();
	            alert('Please upload image !');
	            return false;
            }
        });	
        $('.image-upload-public').click(function(e){
            if($('.image_uploaded_public').val()=="")
            {
	            e.preventDefault();
	            alert('Please upload image !');
	            return false;
            }
        });	
</script>

	
@stop
