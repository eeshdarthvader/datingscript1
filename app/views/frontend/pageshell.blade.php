<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LEZUM</title>

<!-- Bootstrap -->
<link href="{{ URL::to('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::to('assets/frontend/css/style.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::to('assets/frontend/css/style_2.css') }}" type="text/css">
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ URL::to('assets/frontend/css/demo.css')}}" />
<link rel="stylesheet" type="text/css" href="{{ URL::to('assets/frontend/css/jquery.jscrollpane.css')}}" media="all" />
<link rel="stylesheet" href="{{ URL::to('assets/frontend/css/ion.rangeSlider.css')}}" />
<link rel="stylesheet" href="{{ URL::to('assets/frontend/css/ion.rangeSlider.skinFlat.css')}}" />

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

@yield('custom-css') 

</head>

<body>
<div class="wrap">
	<div class="header">
		<div class="container">
			<div class="head-txt">
				<div class="row">
					<div class="col-sm-9">
						<div class="logo"> <a href="index.html"><img src="assets/frontend/images/logo-main.png" alt="..."></a> </div>
						<div class="left-txt"> <i class="fa fa-caret-right right1"></i> My location is Paju </div>
						<div class="left-txt"> <i class="fa fa-caret-right right1"></i> I like to date with male ages 25~30 </div>
						<div class="collapse navbar-collapse bs-example-js-navbar-collapse map-marker">
							<div class="nav navbar-nav">
								<div class="dropdown drop"> <a aria-expanded="false" role="button" aria-haspopup="true" data-toggle="dropdown" class="dropdown-toggle" href="#" id="drop1"> <i class="fa fa-map-marker map"></i> Change </a>
									<div aria-labelledby="drop1" role="menu" class="dropdown-menu bor"> <span class="x">x</span>
										<div class="arrow-up"></div>
										<div class="arrow-up-1"></div>
										<h4>Share your information to let others know more about you.<br>
											Please don't forget to input your information for easy and joyful  meeting. </h4>
										<div class="row">
											<div class="col-sm-3">
												<div class="drop-cover">
													<div class="heading-drop">
														<h4>I'm here to</h4>
													</div>
													<div class="check-b">
														<form class="form-control ab-form">
															<div class="custom-check">
																<input type="checkbox" class="check" checked="checked" name="checkbox1" id="no1">
																<label class="label-check" for="no1">Make new friends </label>
															</div>
															<div class="custom-check">
																<input type="checkbox" class="check" checked="checked" name="checkbox2" id="no2">
																<label class="label-check" for="no2">Chat </label>
															</div>
															<div class="custom-check">
																<input type="checkbox" class="check" checked="checked" name="checkbox3" id="no3">
																<label class="label-check" for="no3">Date</label>
															</div>
														</form>
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
																	<input type="radio" class="custom-rad" name="radio" id="no-1">
																	<label class="label" for="no-1">Male</label>
																</div>
															</li>
															<li>
																<div class="custom-radio">
																	<input type="radio" class="custom-rad" name="radio" id="no-2">
																	<label class="label" for="no-2">Female</label>
																</div>
															</li>
														</ul>
														<!--<h3>Age 18-80</h3>--> 
														<!--<img src="images/bar.png" alt="...">-->
														<input type="text" id="range" value="" name="range" />
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
															<input type="text" class="form-control text" placeholder="Paju, Kyuonggi-Do">
															<i class="fa fa-search cus-search"></i> </div>
														<!--<h3>50Km</h3>
														<img src="images/bar2.png" alt="...">-->
														<input type="text" id="single" value="" name="range" />
													</div>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="drop-cover">
													<div class="heading-drop">
														<h4>Lorem ipsum</h4>
													</div>
													<div class="check-b">
														<div class="search-box">
															<input type="text" class="form-control text" placeholder="Bycile">
															<i class="fa fa-search cus-search"></i> </div>
														<p>Please reg. your interest section. Registring interest make you easier communication with other members.</p>
													</div>
												</div>
											</div>
										</div>
										<div class="new-btns">
											<button type="button" class="btn btn-ook">Save update</button>
											<button type="button" class="btn btn-ook1">Cancel</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="btns">
							<button type="button" class="btn btn-left"><img src="assets/frontend/images/crown.png" alt="...">3400 Credits</button>
							<div class="dropdown btn-left-1"> <a aria-expanded="false" role="button" aria-haspopup="true" data-toggle="dropdown" class="dropdown-toggle" href="#" id="drop2"><img src="assets/frontend/images/setting.png" alt="..."> <span class="cchi">cchiwhoo</span> <span class="caret a-car"></span> </a>
								<div aria-labelledby="drop2" role="menu" class="dropdown-menu dp">
									<div class="arrow-upp"></div>
									<div class="arrow-up-2"></div>
									<div class="dp-img"> <img src="assets/frontend/images/dp.png" alt="...">
										<h4>Configuration My Information</h4>
										<button type="button" class="btn btn-log">LOGOUT</button>
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
	<div class="bottom-head">
		<div class="container">
			<div class="right-txt">
				<div class="lorem">
					<p>"I like" Add more filters for matching members</p>
					<span class="bg-w1">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn like-check">
							<input type="checkbox" autocomplete="off" >
						</label>
					</div>
					</span> <a href="javascript:void(0);"><img src="assets/frontend/images/bing.png" alt="..."> See online members</a> </div>
				<div class="conn"> <span>now connecting</span><span class="green">144,583,323</span> </div>
				<div class="conn"> <span>members</span><span class="green">12,356,886,546</span> </div>
			</div>
		</div>
	</div>
	
	<!-- content slider -->
	
	<div class="cover-div">
		<div class="container">
			<div class="slider">
				<div class="row">
					<div class="col-xs-12 pd-left">
						<div class="boys"> <img src="assets/frontend/images/boys.png" alt="..."> </div>
						<div class="ca-container" id="ca-container">
							<div class="ca-nav"> <span class="ca-nav-prev">Previous</span> <span class="ca-nav-next">Next</span> </div>
							<div class="ca-wrapper" style="overflow: hidden;">
								<div class="ca-item ca-item-8" style="position: absolute; left: 0px;">
									<div class="ca-item-main">
										<div class="ca-icon"></div>
										<div class="name"> <a href="#">
											<h4>cchiwhoo(21)</h4>
											<h4>Paju</h4>
											</a> </div>
									</div>
								</div>
								<div class="ca-item ca-item-1" style="position: absolute; left: 330px;">
									<div class="ca-item-main">
										<div class="ca-icon"></div>
										<div class="name"> <a href="#">
											<h4>cchiwhoo(21)</h4>
											<h4>Paju</h4>
											</a> </div>
									</div>
								</div>
								<div class="ca-item ca-item-2" style="position: absolute; left: 660px;">
									<div class="ca-item-main">
										<div class="ca-icon"></div>
										<div class="name"> <a href="#">
											<h4>cchiwhoo(21)</h4>
											<h4>Paju</h4>
											</a> </div>
									</div>
								</div>
								<div class="ca-item ca-item-3" style="position: absolute; left: 990px;">
									<div class="ca-item-main">
										<div class="ca-icon"></div>
										<div class="name"> <a href="#">
											<h4>cchiwhoo(21)</h4>
											<h4>Paju</h4>
											</a> </div>
									</div>
								</div>
								<div class="ca-item ca-item-4" style="position: absolute; left: 1320px;">
									<div class="ca-item-main">
										<div class="ca-icon"></div>
										<div class="name"> <a href="#">
											<h4>cchiwhoo(21)</h4>
											<h4>Paju</h4>
											</a> </div>
									</div>
								</div>
								<div class="ca-item ca-item-5" style="position: absolute; left: 1650px;">
									<div class="ca-item-main">
										<div class="ca-icon"></div>
										<div class="name"> <a href="#">
											<h4>cchiwhoo(21)</h4>
											<h4>Paju</h4>
											</a> </div>
									</div>
								</div>
								<div class="ca-item ca-item-6" style="position: absolute; left: 1980px;">
									<div class="ca-item-main">
										<div class="ca-icon"></div>
										<div class="name"> <a href="#">
											<h4>cchiwhoo(21)</h4>
											<h4>Paju</h4>
											</a> </div>
									</div>
								</div>
								<div class="ca-item ca-item-7" style="position: absolute; left: 2310px;">
									<div class="ca-item-main">
										<div class="ca-icon"></div>
										<div class="name"> <a href="#">
											<h4>cchiwhoo(21)</h4>
											<h4>Paju</h4>
											</a> </div>
									</div>
								</div>
								<div class="ca-item ca-item-1" style="position: absolute; left: 330px;">
									<div class="ca-item-main">
										<div class="ca-icon"></div>
										<div class="name"> <a href="#">
											<h4>cchiwhoo(21)</h4>
											<h4>Paju</h4>
											</a> </div>
									</div>
								</div>
								<div class="ca-item ca-item-6" style="position: absolute; left: 1980px;">
									<div class="ca-item-main">
										<div class="ca-icon"></div>
										<div class="name"> <a href="#">
											<h4>cchiwhoo(21)</h4>
											<h4>Paju</h4>
											</a> </div>
									</div>
								</div>
								<div class="ca-item ca-item-4" style="position: absolute; left: 1320px;">
									<div class="ca-item-main">
										<div class="ca-icon"></div>
										<div class="name"> <a href="#">
											<h4>cchiwhoo(21)</h4>
											<h4>Paju</h4>
											</a> </div>
									</div>
								</div>
								<div class="ca-item ca-item-5" style="position: absolute; left: 1650px;">
									<div class="ca-item-main">
										<div class="ca-icon"></div>
										<div class="name"> <a href="#">
											<h4>cchiwhoo(21)</h4>
											<h4>Paju</h4>
											</a> </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="slider-1">
				<div class="row">
					<div class="col-xs-12 pd-left">
						<div class="boys"> <img src="assets/frontend/images/girls.png" alt="..."> </div>
						<div class="ca-container" id="ca-container-1">
							<div class="ca-nav"> <span class="ca-nav-prev">Previous</span> <span class="ca-nav-next">Next</span> </div>
							<div class="ca-wrapper" style="overflow: hidden;">
								<div class="ca-item ca-item-8" style="position: absolute; left: 0px;">
									<div class="ca-item-main">
										<div class="new-img"></div>
										<div class="name"> <a href="#">
											<h4>hyena kim(26)</h4>
											<h4>Seoul</h4>
											</a> </div>
									</div>
								</div>
								<div class="ca-item ca-item-1" style="position: absolute; left: 330px;">
									<div class="ca-item-main">
										<div class="new-img1"></div>
										<div class="name"> <a href="#">
											<h4>hyena kim(26)</h4>
											<h4>Seoul</h4>
											</a> </div>
									</div>
								</div>
								<div class="ca-item ca-item-2" style="position: absolute; left: 660px;">
									<div class="ca-item-main">
										<div class="new-img"></div>
										<div class="name"> <a href="#">
											<h4>hyena kim(26)</h4>
											<h4>Seoul</h4>
											</a> </div>
									</div>
								</div>
								<div class="ca-item ca-item-3" style="position: absolute; left: 990px;">
									<div class="ca-item-main">
										<div class="new-img1"></div>
										<div class="name"> <a href="#">
											<h4>hyena kim(26)</h4>
											<h4>Seoul</h4>
											</a> </div>
									</div>
								</div>
								<div class="ca-item ca-item-4" style="position: absolute; left: 1320px;">
									<div class="ca-item-main">
										<div class="new-img"></div>
										<div class="name"> <a href="#">
											<h4>hyena kim(26)</h4>
											<h4>Seoul</h4>
											</a> </div>
									</div>
								</div>
								<div class="ca-item ca-item-5" style="position: absolute; left: 1650px;">
									<div class="ca-item-main">
										<div class="new-img1"></div>
										<div class="name"> <a href="#">
											<h4>hyena kim(26)</h4>
											<h4>Seoul</h4>
											</a> </div>
									</div>
								</div>
								<div class="ca-item ca-item-6" style="position: absolute; left: 1980px;">
									<div class="ca-item-main">
										<div class="new-img"></div>
										<div class="name"> <a href="#">
											<h4>hyena kim(26)</h4>
											<h4>Seoul</h4>
											</a> </div>
									</div>
								</div>
								<div class="ca-item ca-item-7" style="position: absolute; left: 2310px;">
									<div class="ca-item-main">
										<div class="new-img1"></div>
										<div class="name"> <a href="#">
											<h4>hyena kim(26)</h4>
											<h4>Seoul</h4>
											</a> </div>
									</div>
								</div>
								<div class="ca-item ca-item-1" style="position: absolute; left: 330px;">
									<div class="ca-item-main">
										<div class="new-img"></div>
										<div class="name"> <a href="#">
											<h4>hyena kim(26)</h4>
											<h4>Seoul</h4>
											</a> </div>
									</div>
								</div>
								<div class="ca-item ca-item-6" style="position: absolute; left: 1980px;">
									<div class="ca-item-main">
										<div class="new-img1"></div>
										<div class="name"> <a href="#">
											<h4>hyena kim(26)</h4>
											<h4>Seoul</h4>
											</a> </div>
									</div>
								</div>
								<div class="ca-item ca-item-4" style="position: absolute; left: 1320px;">
									<div class="ca-item-main">
										<div class="new-img"></div>
										<div class="name"> <a href="#">
											<h4>hyena kim(26)</h4>
											<h4>Seoul</h4>
											</a> </div>
									</div>
								</div>
								<div class="ca-item ca-item-5" style="position: absolute; left: 1650px;">
									<div class="ca-item-main">
										<div class="new-img1"></div>
										<div class="name"> <a href="#">
											<h4>hyena kim(26)</h4>
											<h4>Seoul</h4>
											</a> </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- content slider ends -->
	
	<div class="container">
		<div class="navigation">
			<ul>
				<li><a href="javascript:void(0);">Members nearby</a></li>
				<li class="messages"><a href="javascript:void(0);">Photo certified</a> <span class="no-msgs">new</span> <i class="arrow-angle1"></i></li>
				</li>
				<li><a href="javascript:void(0);">Encounters</a></li>
				<li class="messages"><a href="javascript:void(0);">Messages</a> <span class="no-msgs">39</span> <i class="arrow-angle"></i></li>
				<li class="active"><a href="javascript:void(0);">Liked you</a></li>
				<li><a href="javascript:void(0);">I like</a></li>
				<li><a href="javascript:void(0);">Global popularity contest</a></li>
				<li><a href="javascript:void(0);"><i class="fa fa-caret-down c-down"></i></a></li>
			</ul>
		</div>
	</div>
	<div class="profiles">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="user-profile">
						<div class="pro-dp"> <img src="assets/frontend/images/img-1.png" alt="...">
							<div class="plus-sign"> <i class="fa fa-plus pls"></i> </div>
						</div>
						<div class="name-info">
							<h3>My Popularity</h3>
							<h3 class="white">Level 3-36 Point</h3>
							
							<a href="javascript:void(0);">Increase<br> My Populairty</a> </div>
					</div>
					<div class="user-profile">
						<ul>
							<li><a href="javascript:void(0);">Profile visitors</a> <span class="cover-sp"> <span class="bubble">546</span><i class="left-caret"></i> </span> </li>
							<li><a href="javascript:void(0);">My friends</a> <span class="cover-sp"> <span class="bubble">23</span><i class="left-caret"></i> </span> </li>
							<li><a href="javascript:void(0);">Favorites</a> <span class="cover-sp"> <span class="bubble">19</span><i class="left-caret"></i> </span> </li>
							<li><a href="javascript:void(0);">Interested friends</a> <span class="cover-sp"> <span class="bubble">7</span><i class="left-caret"></i> </span> </li>
							<li><a href="javascript:void(0);">Matched members</a> <span class="cover-sp"> <span class="bubble">32</span><i class="left-caret"></i> </span> </li>
							<li><a href="javascript:void(0);">Blocked members</a> <span class="cover-sp"> <span class="bubble">54</span><i class="left-caret"></i> </span> </li>
							<li><a href="javascript:void(0);">My popularity</a> <span class="cover-sp"> <span class="bubble">Lev.5 </span><i class="left-caret"></i> </span> </li>
							<li><a href="javascript:void(0);">Event</a> <span class="cover-sp"> <span class="bubble">8</span><i class="left-caret"></i> </span> </li>
						</ul>
						<div class="btns-1"> <a href="javascript:void(0);">
							<div class="dollar-btn">
								<div class="inner-dollar"></div>
								<h3>Point Exchange</h3>
							</div>
							</a> <a href="javascript:void(0);">
							<div class="dollar-btn1">
								<div class="inner-dollar1"></div>
								<h3>Premium Active</h3>
							</div>
							</a> </div>
					</div>
				</div>
				
				@yield('content')

				</div>
			</div>
		</div>
	</div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="{{ URL::to('assets/frontend/js/jquery.min.js') }}"></script> 
<script src="{{ URL::to('assets/frontend/js/bootstrap.min.js') }}"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 

<script src="{{ URL::to('assets/frontend/js/jquery1.6.2.j') }}s"></script> 
<script type="text/javascript" src="{{ URL::to('assets/frontend/js/jquery.easing.1.3.js') }}"></script> 
<!-- the jScrollPane script --> 
<script type="text/javascript" src="{{ URL::to('assets/frontend/js/jquery.mousewheel.js') }}"></script> 
<script type="text/javascript" src="{{ URL::to('assets/frontend/js/jquery.contentcarousel.js') }}"></script> 
<script type="text/javascript">
			$('#ca-container').contentcarousel();
			$('#ca-container-1').contentcarousel();
		</script>
<script src="{{ URL::to('assets/frontend/js/jquery-1.11.1.min.js') }}"></script> 
<script src="{{ URL::to('assets/frontend/js/ion.rangeSlider.js') }}"></script> 
<script>

    $(function () {

        $("#range").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 0,
            max: 80,
            from: 18,
            to: 80,
            type: 'double',
            step: 1,
            prefix: "Age : ",
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
            prefix: "Km : ",
            grid: true
        });
      
   
    });
	$(function(){ 
	 $( ".dropdown-menu.bor" ).click(function( event ) {
        event.stopPropagation();
     });
	$('.x, .btn.btn-ook1').click(function(){
	  $('.dropdown.drop').removeClass('open');	
	}); 
   }); 
</script>

@yield('custom-js')

</body>
</html>
