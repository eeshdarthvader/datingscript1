<!-- BEGIN HEADER -->

<div class="header">
		<div class="container">
			<div class="head-txt">
				<div class="row">
					<div class="col-sm-9">
						<div class="logo"> <a href="index.html"><img class="img-responsive" style="height: 20px;width: 90px;" src="{{URL::to('/uploads/app/'.$logo)}}" alt="..."/></a> </div>
						<div class="left-txt"> <i class="fa fa-caret-right right1"></i> My location is {{$user_city}} </div>
						<div class="left-txt"> <i class="fa fa-caret-right right1"></i> I like to {{$pref_here_to_display}} with {{$pref_gender_display}} ages {{$pref_min_age}}~{{$pref_max_age}}</div>
						<div class="collapse navbar-collapse bs-example-js-navbar-collapse map-marker">
							<div class="nav navbar-nav">
								<div class="dropdown drop"> <a aria-expanded="false" role="button" aria-haspopup="true" data-toggle="dropdown" class="dropdown-toggle" href="#" id="drop1"> <i class="fa fa-map-marker map"></i> Change </a>
									<div aria-labelledby="drop1" role="menu" class="dropdown-menu bor"> <span class="x">x</span>
										<div class="arrow-up"></div>
										<div class="arrow-up-1"></div>
										<h4>Share your information to let others know more about you.<br/>
											Please don't forget to input your information for easy and joyful  meeting. </h4>
											<form action="{{ URL::to('dashboard/userprefences') }}" method="post" id="filter-users">
										<div class="row">
											<div class="col-sm-3">
												<div class="drop-cover">
													<div class="heading-drop">
														<h4>I'm here to</h4>
													</div>
													<div class="check-b">
														
															<div class="custom-check">
																<input type="radio" class="check" @if($pref_here_to == 'make_friends')checked="checked" @endif name="here_to" id="no1" value="make_friends" />
																<label class="label-check" for="no1">Make new friends </label>
															</div>
															<div class="custom-check">
																<input type="radio" class="check" @if($pref_here_to == 'chat')checked="checked" @endif name="here_to" id="no2" value="chat" /> 
																<label class="label-check" for="no2">Chat </label>
															</div>
															<div class="custom-check">
																<input type="radio" class="check" @if($pref_here_to == 'date')checked="checked" @endif name="here_to" id="no3" value="date" />
																<label class="label-check" for="no3">Date</label>
															</div>
														
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="drop-cover">
													<div class="heading-drop">
														<h4>Wanted ages</h4>
													</div>   
													<div class="check-b wntd-age">
														<ul>
															<li>
																<div class="custom-radio">
																	<input type="checkbox" @if($pref_gender == 'male' || $pref_gender == 'both')checked="checked" @endif class="custom-rad" name="gender_male" id="no-1" value="male" />
																	<label class="label" for="no-1">Male</label>
																</div>
															</li>
															<li>
																<div class="custom-radio">
																	<input type="checkbox" @if($pref_gender == 'female' || $pref_gender == 'both')checked="checked" @endif class="custom-rad" name="gender_female" id="no-2" value="female" />
																	<label class="label" for="no-2">Female</label>
																</div>
															</li>
														</ul>
														<!--<h3>Age 18-80</h3>--> 
														<!--<img src="images/bar.png" alt="...">-->
														<input type="text" id="range" value="" name="age_range" />
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="drop-cover">
													<div class="heading-drop">
														<h4>Where(Distance from me)</h4>
													</div>
													<div class="check-b slider-setting">
														<div class="search-box">
															<input type="text" class="form-control text" placeholder="Enter the location" id="location" name="location" value="{{$user_city}}">
															<i class="fa fa-search cus-search"></i> </div>
														<!--<h3>50Km</h3>
														<img src="images/bar2.png" alt="...">-->
														<input type="text" id="single" value="" name="dist_range" />
													</div>
													
													<input type="hidden" class="form-control" id="city" name="city" >
													<input type="hidden" class="form-control" id="country" name="country" >
													<input type="hidden" class="form-control" id="lat" name="lat">
													<input type="hidden" class="form-control" id="lng" name="lng" >
												</div>
											</div>
											<div class="col-sm-3">
												<div class="drop-cover">
													<div class="heading-drop">
														<h4>Enter your interests</h4>
													</div>
													<div class="check-b">
														<div class="search-box">
														<input type="hidden" id="my_interest" name="my_interest" value="">
														 <input type="text" id="interests_search" class="form-control text" name="interests_search" value="{{$pref_interest}}">
															<i class="fa fa-search cus-search"></i> </div>
														
													</div>
												</div>
											</div>
										</div>
										<div class="new-btns">
											<button type="submit" class="btn btn-ook">Save update</button>
											<button type="button" class="btn btn-ook1">Cancel</button>
										</div>
									</form>	
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="btns">
							<button type="button" class="btn btn-left"><img src="{{URL::to('/assets/frontend/images/crown.png')}}" alt="..."/>{{$user_credits}} Credits</button>
							<div class="dropdown btn-left-1">
							 <a aria-expanded="false" role="button" aria-haspopup="true" data-toggle="dropdown" class="dropdown-toggle" href="#" id="drop2">
								<img src="{{URL::to('/assets/frontend/images/setting.png')}}" alt="..."/> 
								<span class="cchi">{{$username}}</span> <span class="caret a-car"></span> 
							</a>
								<div aria-labelledby="drop2" role="menu" class="dropdown-menu dp">
									<div class="arrow-upp"></div>
									<div class="dp-img">
										<a href="{{URL::to('user/'.$user_id)}}" id="header-configuration-link"> 
											@if($profile_pic)
												<img class="img-responsive" src="{{URL::to('/uploads/photos/'.$profile_pic)}}" style="height: 60px;width: 60px;"/>
											@else
												<img class="img-responsive" src="{{URL::to($default_image)}}" style="height: 60px;width: 60px;"/>
											@endif
										</a>	
										<a href="{{URL::to('account_settings')}}"><h4>Configuration My Information</h4></a>
										<a href="{{URL::to('logout')}}" class="btn btn-log">LOGOUT</a>
									</div>
								</div>
							</div>
							
							<!--<button type="button" class="btn btn-left-1">Setting <i class="fa fa-caret-down down-c"></i></button>--> 
						</div>
					</div>
				</div>
			</div>
		</div>
</div>

<!-- END HEADER -->


