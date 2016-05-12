<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LEZUM</title>

<!-- Bootstrap -->
<link href="{{ URL::to('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::to('assets/frontend/css/bootstrap-select.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ URL::to('assets/frontend/css/style.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::to('assets/frontend/css/jquery-ui.css') }}" type="text/css">


<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="intro-page">
	<header>
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="intro-logo"><a href="index.html"><img src="assets/frontend/images/intro-logo.png" alt="..."></a></div>
					<div class="mobile-web">
						<ul>
							<li>
								<div class="form-group">
									<select id="lunch" class="selectpicker" title="Please select a lunch ...">
										<option>English</option>
										<option>Option 2</option>
									</select>
								</div>
							</li>
							<li class="m-web-btn"><a href="javascript:void(0)">Mobile Web</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="already-member">
						<ul>
							<li class="member"><a href="{{URL::to('/')}}">New to Lezum?</a></li>
							<li class="sign"><a href="{{URL::to('/')}}">Sign up</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div class="intro-banner-bg">
		<div class="intro-banner-img">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="banner-text">
							<h1>Welcome to <span>LEZUM</span></h1>
							<h2>Enjoy your new meeting and date.
								With members over the world,</h2>
							<p>you can enjoy our various services, 
								such as chatting, new encounters, 
								sharing interests, encounter & matching games,
								global popularity contest and searching 
								photo certified members, etc. And 
								at the same time, you can win the prizes
								awarded by Lezum. </p>
						</div>
					</div>
					<div class="col-sm-5 col-sm-offset-1">
						<div class="sign-up">
							<h1>Already a member? Sign In</h1>

							@if(Session::has('errors'))
				           		<h4> Error.. please fill in all the fields </h4>
				            @endif
							 <form action="{{ URL::to('loginPost') }}" method="post" id="edit-profile" class="form-horizontal">
							<div class="row">
								<div class="col-xs-4">
									<label>Email</label>
								</div>
								<div class="col-xs-8">
									<input type="email" class="form-control" id="email" name="email">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-4">
									<label>Password</label>
								</div>
								<div class="col-xs-8">
									<input type="password" class="form-control" id="password" name="password">
								</div>
							</div>
							<div class="row">
							  <div class="col-xs-12">
							    <button type="submit" class="sign-up-btn ">Sign in</button>
							  </div>
							</div>
						</form>	
						</div>
					</div>
				</div>
				
				<div class="download-from">
				  <ul>
				    <li><a href="javascript:void(0)"><img src="assets/frontend/images/app-store.png" alt="..."></a></li>
					<li><a href="javascript:void(0)"><img src="assets/frontend/images/goole-play.png" alt="..."></a></li>
					<li><a href="javascript:void(0)"><img src="assets/frontend/images/win-ph-store.png" alt="..."></a></li>
					<li><a href="javascript:void(0)"><img src="assets/frontend/images/black-b.png" alt="..."></a></li>
					<li><a href="javascript:void(0)"><img src="assets/frontend/images/rigola.png" alt="..."></a></li>
				  </ul>
				</div>
				
			</div>
		</div>
	</div>
	
	
	<div class="container match-encounter-main">
	  <div class="row">
	    <div class="col-sm-8"><img src="assets/frontend/images/m&e-game.png" alt="..."></div>
		<div class="col-sm-4">
		  <div class="match-encounter">
		    <h1>MATCH& ENCOUNTER GAME</h1>
			<p>Find your exactly matched
partner through our Match & 
Encounter game, 
and get started new meetings.</p>
             <a href="javascript:void(0)" class="encounter-btn">Go to Encounter</a>
			
		  </div>
		</div>
	  </div>
	</div>
	
	<div class="container-fluid connect-mian-bg">
	  <div class="row">
	    <div class="col-sm-7 contect-bg">
		
		  <div class="connect-box">
		 <h1>CONNECT<br> ANYWHERE ANYTIME</h1>
		 <p>LEZUM can be connected with all kinds of 
equipments as computer, tablet, mobile and 
cellular phones. You can connect
anytime and anywhere to LEZUM and
meet people over the world.</p>
          <div class="download-app">
		    <ul>
			  <li><a href="javascript:void(0)"><img alt="..." src="assets/frontend/images/app-store.png"></a></li>
					<li><a href="javascript:void(0)"><img alt="..." src="assets/frontend/images/goole-play.png"></a></li>
					<li><a href="javascript:void(0)"><img alt="..." src="assets/frontend/images/win-ph-store.png"></a></li>
					<li><a href="javascript:void(0)"><img alt="..." src="assets/frontend/images/black-b.png"></a></li>
			</ul>
		  </div>
         </div>
		 
		</div>
		<div class="col-sm-5"><img src="assets/frontend/images/contact-anywhere.png" class="connect-img" alt="..."></div>
	  </div>
	</div>
	
	<div class="nearby-member">
	  <div class="container">
	    <div class="row">
		  <div class="col-sm-6"><img src="assets/frontend/images/nearby-member.jpg" alt="..."></div>
		  <div class="col-sm-6">
		    <div class="nearby-mem-box">
			  <h1>Members nearby</h1>
			  <p>LEZUM never open your exact location for 
				your privacy.<br>
				But you will be able to search members nearby
				your location, in your city and in your country.
				</p>
				<p><span>See people who is nearby my area PAJU</span></p>
				<a class="nearby-btn" href="javascript:void(0)">Nearby members</a>
			</div>
		  </div>
		</div>
	  </div>
	</div>
	
	<div class="sharing-interest">
	  <div class="container">
	    <div class="row">
		  
		  <div class="col-sm-6">
		    <div class="nearby-mem-box">
			  <h1>Sharing interests</h1>
			  <p>Sharing your interests can be exposed more and
given more opportunity to chat.
				</p>
				<p><span>Meet people who has same interests. </span></p>
				<a class="nearby-btn" href="javascript:void(0)">See same interests members</a>
			</div>
		  </div>
		  
		  <div class="col-sm-6"><img src="assets/frontend/images/sharing.png" alt="..."></div>
		  
		</div>
	  </div>

        <div class="container">
            <h4><b>PAJU Memebers nearby</b></h4>
            <div class="row">

                <div class="col-sm-3 paju-member-div">
                    <img src="assets/frontend/images/block-img-1.png" class="paju-member" alt="...">                    
                    <img src="assets/frontend/images/pop.png" class="pop" alt="..."> 
                    <div class="transbox"></div>                       
                    <h6><b>Anny Kim (Female, 29)</b></h6>
                    <h6 class="location">Location</h6>
                    <h6 class="location-value">Pakistan</h6>
                    <p class="glyphicon glyphicon-camera transbox-fonts">&nbsp;15</p>
                    <p class="glyphicon glyphicon-facetime-video transbox-fonts">&nbsp;1</p>
                    
                </div>

                <div class="col-sm-3 paju-member-div">
                    <img src="assets/frontend/images/girl2.png" class="paju-member" alt="...">                   
                    <img src="assets/frontend/images/pop.png" class="pop" alt="...">   
                    <div class="transbox"></div>                     
                    <h6><b>Anny Kim (Female, 25)</b></h6>
                    <h6 class="location">Location</h6>
                    <h6 class="location-value">India</h6>
                    <p class="glyphicon glyphicon-camera transbox-fonts">&nbsp;12</p>
                    <p class="glyphicon glyphicon-facetime-video transbox-fonts">&nbsp;1</p>
                </div>
                <div class="col-sm-6">
                   
                </div>
            </div>
        </div>
	</div>
	
	<footer>
  <div class="container">
    <div class="row">
	  <div class="col-xs-12">
	    <div class="copyright">
		  <p>Copyright 2015ⓒRigola. All Rights Reserved.</p>
		  <p>하단은 각 커뮤니티 로고를 찾고 있는 중 입니다.</p>
		</div>
	  </div>
	</div>
  </div>
</footer>
	
</div>






<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="{{ URL::to('assets/frontend/js/bootstrap.min.js') }}"></script> 
<script src="{{ URL::to('assets/frontend/js/bootstrap-select.js') }}"></script>
<script src="{{ URL::to('assets/frontend/js/jquery-1.11.1.min.js') }}"></script> 
<script src="{{ URL::to('assets/frontend/js/custom.js') }}"></script>


</body>
</html>
