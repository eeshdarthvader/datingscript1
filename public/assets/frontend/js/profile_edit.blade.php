@extends('frontend.layout')

@section('content')


				<div class="col-sm-9">
					<div class="meeting-game-right-part">
                    <span id="profile-tab" class="btn-Profile-visited">
										 Profile
									</span>
									<span  id="photos-tab" class="btn-Photos">
										 Photos
					</span>
						
                        <div class="meeting-profile"  >
                            <div class="meeting-pro-tag"><img src="{{URL::to('assets/frontend/images/profile-tag.png')}}" alt="..."></div>
                            <div class="meeting-profile-top">
                                <div class="row">                                    
                                    <div class="col-sm-4">
                                        <div class="meeting-pro-detail">
                                            <span  class="btn-primary btn-xs edit_main_profile">Edit</span>
                                            <h1>{{$user->first_name}} ({{$user->display_gender()}},{{$user->age()}})</h1>
                                        </div>
                                    </div>
									
                                </div>
                                <br/>
                                <div class="row">
                                    <div class="container save-profile-div" style="display:none;">
                                       
                                        <form id="movieForm" method="post">
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
                                                            <option value="{{$user->gender}}">Choose a gender</option>
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>                                                       
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

                            <div class="pics">
                                <div class="pic-count"> <i class="fa fa-camera"></i> 2 </div>
                                <ul>
                                    <li><a href="javascript:void(0)"><img src="{{URL::to('assets/frontend/images/pic-1.jpg')}}" alt="..."></a></li>
                                    <li><a href="javascript:void(0)"><img src="{{URL::to('assets/frontend/images/pic-2.jpg')}}" alt="..."></a></li>
                                </ul>
                            </div>
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
                                            <form id="map-update">
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
                                                                            <input type="text" class="form-control text" placeholder="{{$user->city}}">
                                                                            <i class="fa fa-search cus-search"></i>
                                                                        </div>

                                                                        <input type="text" id="single3" value="" name="range" />
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
											<div class="drop-cover2">
													<div class="heading-drop" style="color:white">
														<h4>I'm here to</h4>
													</div>
													<div class="check-b">
														
															<div class="custom-check">
																<input type="radio" class="check" checked="checked"  name="here_to" id="no1" value="make_friends" />
																<label class="label-check" for="no1">Make new friends </label>
															</div>
															<div class="custom-check">
																<input type="radio" class="check"  name="here_to" id="no2" value="chat" /> 
																<label class="label-check" for="no2">Chat </label>
															</div>
															<div class="custom-check">
																<input type="radio" class="check"  name="here_to" id="no3" value="date" />
																<label class="label-check" for="no3">Date</label>
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
																	<input type="radio" class="custom-rad" name="no-4" id="no-4">
																	<label class="label" for="no-4">Male</label>
																</div>
															</li>
															<li>
																<div class="custom-radio">
																	<input type="radio" class="custom-rad" name="no-4" id="no-5">
																	<label class="label" for="no-5">Female</label>
																</div>
															</li>
														</ul>
														
														<input type="text" id="range2" value="" name="age_range2" />
													</div>
												</div>
												 <div class="new-btns4">
                                                            <input type="submit" id="save_here_to" style="color:white" class="btn btn-ook" value="Save update"/>
                                                            <button type="button" id="cancel_here_to" class="btn btn-default ">Cancel</button>
                                                </div>
											</div>

                                        </div>
                                    </div>

                                    <div class="m-game-pro-left">
                                        <div class="left-option">
                                            <span class="btn-primary btn-xs edit-interests">Edit</span>
                                            @if($interests)
	                                            <h1>{{$interests->count()}}Interests</h1>
	                                           
	                                            <p>@foreach($interests as $interest)
							                            {{$interest->name}},
						                            @endforeach ,
						                        </p>
					                        @else
					                        <h1>Interests</h1>
					                        <p>
						                        No interests assed till now. Add Interests
					                        </p>
					                        @endif 
                                            <form>
                                                <div class="interests" style="display:none">
                                                    <div class="arrow-upp"></div>
                                                    <div class="arrow-up-2"></div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="interests-open">
                                                                <div class="heading-drop">
                                                                    <h4>Interests</h4>
                                                                </div>
                                                                <div class="check-b slider-setting">
                                                                    <div class="search-box">
                                                                        <input type="text" class="form-control text" placeholder="Paju, Kyuonggi-Do">
                                                                        <i class="fa fa-search cus-search"></i>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>

                                                    </div>
                                                    <div class="new-btns2">
                                                        <input type="submit" style="color:white" class="btn btn-ook" value="Save update" />
                                                        <button type="button" id="cancel-interests" class="btn btn-default ">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>                                          
                                        </div>
                                    </div>
                                    
                                    @foreach($user_custom_profile as $section)
						
						                    <div class="personal-info m-game-pro-left">
							                    <span  class="btn-primary btn-xs edit-personalInfo">Edit</span>
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
						                @endforeach

                                    <!--
<div class="personal-info m-game-pro-left">
                                       
                                        <h1>Personal information</h1>
                                        <div class="row  personalInfo-div" style="display:none">
                                            <div class="container">

                                                <form id="personalInfoForm" method="post" class="form-horizontal" role="form">
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2 col-sm-offset-1" for="relationshipstatus">Relationship status</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" name="relationshipstatus">
                                                                <option value=""></option>
                                                                <option value="Single">Single</option>
                                                                <option value="Married">Married</option>
                                                                <option value="Divorced">Divorced</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2 col-sm-offset-1" for="sex">Sexuality</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" name="sexuality">
                                                                <option value=""></option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2 col-sm-offset-1" for="sex">Appearance</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" name="Height" placeholder="Height(in cms)" />
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" name="Weight" placeholder="Weight (in Kgs)" />
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-6 col-sm-offset-3">
                                                            <select class="form-control" name="bodytype">
                                                                <option value="">Body type</option>
                                                                <option value="thin">Thin</option>
                                                                <option value="slender">Slender</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-sm-6 col-sm-offset-3">
                                                            <select class="form-control" name="haircolor">
                                                                <option value="">Hair color</option>
                                                                <option value="black">Black</option>
                                                                <option value="brown">brown</option>
                                                                <option value="blonde">blonde</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-sm-6 col-sm-offset-3">
                                                            <select class="form-control" name="eyecolor">
                                                                <option value="">Eye Color</option>
                                                                <option value="black">Black</option>
                                                                <option value="brown">Brown</option>
                                                                <option value="blue">Blue</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2 col-sm-offset-1" for="living">Living</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" name="living">
                                                                <option value=""></option>
                                                            </select>
                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2 col-sm-offset-1" for="kids">Kids</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" name="kids">
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2 col-sm-offset-1" for="smoking">Smoking</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" name="smoking">
                                                                <option value=""></option>
                                                                <option value="no">No</option>
                                                                <option value="yes">Yes</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2 col-sm-offset-1" for="drinking">Drinking</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" name="drinking">
                                                                <option value=""></option>
                                                                <option value="no">No</option>
                                                                <option value="yes">Yes</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2 col-sm-offset-1" for="education">Education</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" name="education">
                                                                <option value=""></option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2 col-sm-offset-1" for="language">Language</label>
                                                        <div class="col-sm-6">
                                                            <select class="form-control" name="language">
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2 col-sm-offset-1" for="work">Work</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="position" placeholder="professional or Current position" />
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-sm-6 col-sm-offset-3">
                                                            <select class="form-control" name="income">
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <div class="col-sm-6 col-sm-offset-3">
                                                            <input type="text" class="form-control" name="companyname" placeholder="Company Name" />
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <input type="submit" class="btn btn-default btn-Save" value="Save Update" />
                                                            <input type="button" id="cancel-personalInfo" class="btn btn-default " value="Cancel" />
                                                        </div>
                                                    </div>

                                                </form>


                                            </div>
                                        </div>
-->
                                        <!--
<ul>
                                            <li>
                                                Love Mode <span>
                                                    <button data-target="#myModalNew" data-toggle="modal" class="btn-link" type="button">
                                                        show
                                                    </button>
                                                </span>
                                            </li>
                                            <li>
                                                Sexual Identity <span>
                                                    <button data-target="#myModalNew" data-toggle="modal" class="btn-link" type="button">
                                                        show
                                                    </button>
                                                </span>
                                            </li>
                                            <li>
                                                Appearance <span>
                                                    <button data-target="#myModalNew" data-toggle="modal" class="btn-link" type="button">
                                                        show
                                                    </button>
                                                </span>
                                            </li>
                                            <li>
                                                Residence Type<span>
                                                    <button data-target="#myModalNew" data-toggle="modal" class="btn-link" type="button">
                                                        show
                                                    </button>
                                                </span>
                                            </li>
                                            <li>
                                                Children <span>
                                                    <button data-target="#myModalNew" data-toggle="modal" class="btn-link" type="button">
                                                        show
                                                    </button>
                                                </span>
                                            </li>
                                            <li>
                                                Smoking <span>
                                                    <button data-target="#myModalNew" data-toggle="modal" class="btn-link" type="button">
                                                        show
                                                    </button>
                                                </span>
                                            </li>
                                            <li>
                                                Drinking Capacity <span>
                                                    <button data-target="#myModalNew" data-toggle="modal" class="btn-link" type="button">
                                                        show
                                                    </button>
                                                </span>
                                            </li>
                                            <li>
                                                Academic Career <span>
                                                    <button data-target="#myModalNew" data-toggle="modal" class="btn-link" type="button">
                                                        show
                                                    </button>
                                                </span>
                                            </li>
                                            <li>Language <span><a href="javascript:void(0)">Korean</a></span></li>
                                            <li>
                                                Job <span>
                                                    <button data-target="#myModalNew" data-toggle="modal" class="btn-link" type="button">
                                                        show
                                                    </button>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
-->

									<div class="personal-info m-game-pro-left about-me">
						                <h1>Language</h2>
						                <p>English</p>
						            </div> 
						            </br>
                                    <div class="personal-info m-game-pro-left about-me">
                                        <span class="btn-primary btn-xs edit-about-me">Edit</span>
                                        <h1>About Me</h1>
                                       
                                       @if($user_profile['exists'])
                                        <p>{{$user_profile['about_me']}}</p>
                                       @else
                                       	<p> Not filled in </p>
                                       @endif
                                    </div>
                                    </br>
                                    <div class="personal-info m-game-pro-left about-me">
                                        <span class="btn-primary btn-xs edit-interested-in">Edit</span>
                                        <h1>Interested In</h1>
                                       
                                       @if($user_profile['exists'])
                                        <p>{{$user_profile['interested_in']}}</p>
                                       @else
                                       	<p> Not filled in </p>
                                       @endif
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
                                                            <img src="{{URL::to('assets/frontend/images/icon-instagram.png')}}" class="media-object" alt="Sample Image">
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">The Hottest people</h4>
                                                            <small>23 January 2014</small>
                                                        </div>
                                                    </li>
                                                    <li class="media">
                                                        <a href="#" class="pull-left">
                                                            <img src="{{URL::to('assets/frontend/images/icon-instagram.png')}}" class="media-object" alt="Sample Image">
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">The Hottest people</h4>
                                                            <small>23 January 2014</small>
                                                        </div>
                                                    </li>
                                                    <li class="media">
                                                        <a href="#" class="pull-left">
                                                            <img src="{{URL::to('assets/frontend/images/icon-instagram.png')}}" class="media-object" alt="Sample Image">
                                                        </a>
                                                        <div class="media-body">
                                                            <h4 class="media-heading">The Hottest people</h4>
                                                            <small>23 January 2014</small>
                                                        </div>
                                                    </li>
                                                    <li class="media">
                                                        <a href="#" class="pull-left">
                                                            <img src="{{URL::to('assets/frontend/images/icon-instagram.png')}}" class="media-object" alt="Sample Image">
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
                                                <p>She is now at<p style="color:#f03f7c">position 278</p> <p>
                                                    <br />
                                                    in search results,14 profile visitor <br />
                                                    visitors today, 83 months
                                                </p>
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

                         <div id="profile-photos" style="display:none">

                                <div class="profile-photos-header">
                                    <h1>Your photos (6)</h1>
                                </div>

                                <div id="container-gutter" class="js-masonry" data-masonry-options='{ "columnWidth": 25, "itemSelector": ".item","gutter": 1 }'>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/Cute-Chinese-Hairstyles-Ideas-for-party-2.jpg" alt=""></div>
                                    <div class='item w2'><img src="http://arsenal.minglematic.com/assets/frontend/images/top2.jpg" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/-font-b-Men-b-font-short-font-b-wigs-b-font-Fashion-boy-s-kanekalon.jpg" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/girl3.png" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/-font-b-Men-b-font-short-font-b-wigs-b-font-Fashion-boy-s-kanekalon.jpg" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/girl3.png" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/-font-b-Men-b-font-short-font-b-wigs-b-font-Fashion-boy-s-kanekalon.jpg" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/girl3.png" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/-font-b-Men-b-font-short-font-b-wigs-b-font-Fashion-boy-s-kanekalon.jpg" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/girl3.png" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/-font-b-Men-b-font-short-font-b-wigs-b-font-Fashion-boy-s-kanekalon.jpg" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/girl3.png" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/-font-b-Men-b-font-short-font-b-wigs-b-font-Fashion-boy-s-kanekalon.jpg" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/girl3.png" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/-font-b-Men-b-font-short-font-b-wigs-b-font-Fashion-boy-s-kanekalon.jpg" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/girl3.png" alt=""></div>
                                </div>
                                
                                <br />
                                <div>
                                    <ul class="list-group">
                                        <li class="list-group-item add-commemnts">
                                            <img class="round" src="http://arsenal.minglematic.com/assets/frontend/images/img-1.png" alt="...">&nbsp;&nbsp;<textarea class="add-comments-comments"></textarea><div class="btn-add-comments">
                                                <h1>Add Comments</h1>
                                            </div>
                                        </li>
                                        <li class="comment-reply"><img class="round" src="http://arsenal.minglematic.com/assets/frontend/images/img-1.png" alt="...">&nbsp;&nbsp;<h4><strong>Rise up to first place</strong><br /><br />You are number 856 in search results. Rise Up to first place and get seen<br />by more people near you. <br /><br /> <small> 23rd August 2015</small> &nbsp;&nbsp;&nbsp;&nbsp;<a href="" id="reply">Reply</a><a href="" id="delete">Delete</a><a href="" id="edit">Edit</a></h4></li>
                                        <li class="comment-reply">
                                            <img class="round" src="http://arsenal.minglematic.com/assets/frontend/images/img-1.png" alt="...">&nbsp;&nbsp;
                                            <h4>
                                                <strong>Be Seen more in Encounters</strong><br /><br />Get your photo shown more often in Encounters, so many people can<br />vote 'Yes' to you.
                                                <br /><br /> <small> 23rd August 2015</small> &nbsp;&nbsp;&nbsp;&nbsp;
                                                <a href="" id="reply">Reply</a><a href="" id="delete">Delete</a>
                                                <a href="" id="edit">Edit</a>
                                                <br />

                                               
                                                
                                                <span>
                                                     <img class="round" src="http://arsenal.minglematic.com/assets/frontend/images/img-1.png" alt="...">
                                                    <strong>Be Seen more in Encounters</strong><br /><br />Get your photo shown more often in Encounters, so many people can<br />vote 'Yes' to you.

                                                    <br/>
                                                    <br />
                                                    <small> 23rd August 2015</small> &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <a href="" id="reply">Reply</a><a href="" id="delete">Delete</a>
                                                    <a href="" id="edit">Edit</a>
                                                    <br />

                                                </span>

                                            </h4>

                                        </li>


                                    </ul>
                                </div>

                                <div class="buffer"></div>
                                <div class="profile-photos-header">
                                    <h1>Photos of your friend (4)</h1>
                                </div>
                                <div id="container-gutter2" class="js-masonry" data-masonry-options='{ "columnWidth": 25, "itemSelector": ".item","gutter": 1,"resizable":"false" }'>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/Cute-Chinese-Hairstyles-Ideas-for-party-2.jpg" alt=""></div>
                                    <div class='item w2'><img src="http://arsenal.minglematic.com/assets/frontend/images/top2.jpg" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/-font-b-Men-b-font-short-font-b-wigs-b-font-Fashion-boy-s-kanekalon.jpg" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/girl3.png" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/-font-b-Men-b-font-short-font-b-wigs-b-font-Fashion-boy-s-kanekalon.jpg" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/girl3.png" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/-font-b-Men-b-font-short-font-b-wigs-b-font-Fashion-boy-s-kanekalon.jpg" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/girl3.png" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/-font-b-Men-b-font-short-font-b-wigs-b-font-Fashion-boy-s-kanekalon.jpg" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/girl3.png" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/-font-b-Men-b-font-short-font-b-wigs-b-font-Fashion-boy-s-kanekalon.jpg" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/girl3.png" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/-font-b-Men-b-font-short-font-b-wigs-b-font-Fashion-boy-s-kanekalon.jpg" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/girl3.png" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/-font-b-Men-b-font-short-font-b-wigs-b-font-Fashion-boy-s-kanekalon.jpg" alt=""></div>
                                    <div class='item'><img src="http://arsenal.minglematic.com/assets/frontend/images/girl3.png" alt=""></div>
                                </div>

                            </div>
						
						
					</div>
				</div>
			</div>

            
		</div>

       
	</div>
</div>

@stop

@section('scripts')

<script>

    $(function () {

		$("#single3").ionRangeSlider({
		    hide_min_max: true,
		    keyboard: true,
		    min: 0,
		    max: 100,
		    from: 50,
		    //to: 80,
		    type: 'single',
		    step: 1,
		    prefix: "Km",
		    grid: true
		});

		$("#single").ionRangeSlider({
		    hide_min_max: true,
		    keyboard: true,
		    min: 0,
		    max: 100,
		    from: 50,
		    //to: 80,
		    type: 'single',
		    step: 1,
		    prefix: "Km",
		    grid: true
		});

		$("#range").ionRangeSlider({
		    hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 80,
            from: 18,
            to: 80,
            type: 'double',
            step: 1,
            prefix: "",
            grid: true
		});

	
        $("#range2").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 80,
            from: 18,
            to: 80,
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
        $(window).smartresize();
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

		$('#cancel-personalInfo').click(function (event) {
		    $('.personalInfo-div').hide();
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
		
		$('.edit-personalInfo').click(function (event) {
		    $('.personalInfo-div').show();
		}
                );

				


		
	</script>

    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.js"></script>
    <script>
        $(document).ready(function () {

            $('#movieForm').validate({ // initialize the plugin
                rules: {
                    nickname: {
                        required: true
                       
                    },
                    gender: {
                        required: true
                    }
                }
            });

            $('#personalInfoForm').validate({ // initialize the plugin
                rules: {
                    relationshipstatus: {
                        required: true

                    },
                    sexuality: {
                        required: true
                    },
                    sexuality: {
                        required: true
                    },
                    Height: {
                        required: true
                    },
                    Weight: {
                        required: true
                    },
                    bodytype: {
                        required: true
                    },
                    haircolor: {
                        required: true
                    },
                    eyecolor: {
                        required: true
                    },
                    living: {
                        required: true
                    },
                    kids: {
                        required: true
                    },
                    smoking: {
                        required: true
                    },
                    drinking: {
                        required: true
                    },
                    education: {
                        required: true
                    },
                    language: {
                        required: true
                    },
                    position: {
                        required: true
                    },
                    income: {
                        required: true
                    },
                    companyname: {
                        required: true
                    }
                }
            });

        });
    </script>
    
    <script src="{{URL::to('assets/frontend/js/jquery-birthday-picker.min.js')}}"></script>
    <script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=true&libraries=places&language=en"></script>


    <script type="text/javascript">

         $("#demo").birthdayPicker();
       
		 $(function(){ 
		  	var mapOptions = {
		        center: { lat: {{$user->lat}}, lng: {{$user->lng}}},
		        zoom: 10
		    };
		     
		    var map = new google.maps.Map(document.getElementById('map-profile'),mapOptions);
		});
	
	
    </script>

	<script type="text/javascript">

           $('#profile-tab').click(function (event) {
				if($('#profile-tab').hasClass('btn-Profile-visited'))
                {return false;}
                else
                { $('#profile-tab').addClass('btn-Profile-visited').removeClass('btn-Profile');
                   $('#photos-tab').addClass('btn-Photos').removeClass('btn-Photos-visited'); 
                }
		     $('.meeting-profile').show();
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
		    $('.meeting-profile').hide();
            $('#profile-photos').show();
		   });
                

	
    </script>

	
@stop
