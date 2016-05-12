<div class="meeting-profile">
    <div class="meeting-pro-tag"><img src="images/profile-tag.png" alt="..."></div>
    <div class="meeting-profile-top">
        <div class="row">
            <div class="col-sm-4">
                <div class="meeting-pro-detail">
                    <h1>{{$user->first_name}} <span>mobile</span></h1>
                    <p>
                        Common Friends <span>04</span>&nbsp;
                        Common interests <span>{{$common_interests}}</span>
                    </p>

                </div>
            </div>
            <div class="col-sm-8">
                <div class="meet-pro-right-options">
                    <ul>
	                    {{ Form::open(array('url' => '/encounters/encounteryes', 'method' => 'POST','id' => 'encounter_yes_form',"style"=>"display:inline-block;")) }}
                                                        <li><a id="encounter-yes" data-toggle="modal" data-target="#myModal"><img src="{{URL::to('/assets/frontend/images/icon-like.png')}}" alt="..."> I like</a></li>
                                                    {{Form::close()}}
                        {{ Form::open(array('url' => '/encounters/encounterno', 'method' => 'POST','id' => 'encounter_no_form',"style"=>"display:inline-block;")) }}
                                                        <li><a id="encounter-no"><img src="{{URL::to('/assets/frontend/images/icon-discard.png')}}" alt="..."> Discard</a></li>
                                                    {{Form::close()}}
                        <!--<li><a href="javascript:void(0)"><img src="images/icon-share.png" alt="..."> Share</a></li>-->
                        <!--<li><a href="javascript:void(0)" data-toggle="modal" data-target="#view-profile-pop"><img src="images/icon-profile.png" alt="..."> View profile</a></li>-->
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
                                                <img src="images/profile-pic.png" alt="...">
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
                                                <img src="images/profile-pic.png" alt="...">
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
                                                <img src="images/profile-pic.png" alt="...">
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
                        <li id="fav"><a  class="nav-pills-span">Add to favourites</a></li>
                        <li id="unfav" style="display: none" ><a  class="nav-pills-span" href="#">Remove favourite</a></li>
                        <li><a class="nav-pills-span" data-tool="reportabuse" >Report Abuse</a></li>
                        <li><a class="nav-pills-span" class="blockuser">Block</a></li>
                        <li><a class="nav-pills-span">Give a gift</a></li>
                    </ul>
                </div>                
            </div>
        </div>
    </div>

    <div class="pics">
        <div class="pic-count"> <i class="fa fa-camera"></i> 2 </div>
        <ul>
            <li><a href="javascript:void(0)"><img src="images/pic-1.jpg" alt="..."></a></li>
            <li><a href="javascript:void(0)"><img src="images/pic-2.jpg" alt="..."></a></li>
        </ul>
    </div>
    <div class="pics mr-b20">
        <div class="pic-count"> <i class="fa fa-video-camera"></i> 1 </div>
        <ul>
            <li><a href="javascript:void(0)"><img src="images/video-1.jpg" alt="..."></a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-sm-9">
            <div class="m-game-pro-left">
                <div class="left-option">
                    <h1>Location</h1>
                    <div>{{$user->city}}</div>
                    <div id="map-profile" data-target="#myModalNew2" data-toggle="modal"><img src="images/map.png" alt="..."></div>


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
                                    <img src="images/icon-profile.png" class="media-object" alt="Sample Image">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">The Hottest people</h4>
                                    <small>23 January 2014</small>
                                </div>
                            </li>
                            <li class="media">
                                <a href="#" class="pull-left">
                                    <img src="images/icon-profile.png" class="media-object" alt="Sample Image">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">The Hottest people</h4>
                                    <small>23 January 2014</small>
                                </div>
                            </li>
                            <li class="media">
                                <a href="#" class="pull-left">
                                    <img src="images/icon-profile.png" class="media-object" alt="Sample Image">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">The Hottest people</h4>
                                    <small>23 January 2014</small>
                                </div>
                            </li>
                            <li class="media">
                                <a href="#" class="pull-left">
                                    <img src="images/icon-profile.png" class="media-object" alt="Sample Image">
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
                                    <img src="images/icon-instagram.png" class="media-object" alt="Sample Image">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">The Hottest people</h4>
                                    <small>23 January 2014</small>
                                </div>
                            </li>
                            <li class="media">
                                <a href="#" class="pull-left">
                                    <img src="images/icon-instagram.png" class="media-object" alt="Sample Image">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">The Hottest people</h4>
                                    <small>23 January 2014</small>
                                </div>
                            </li>
                            <li class="media">
                                <a href="#" class="pull-left">
                                    <img src="images/icon-instagram.png" class="media-object" alt="Sample Image">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">The Hottest people</h4>
                                    <small>23 January 2014</small>
                                </div>
                            </li>
                            <li class="media">
                                <a href="#" class="pull-left">
                                    <img src="images/icon-instagram.png" class="media-object" alt="Sample Image">
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

    <div class="row">
        <div class="col-xs-12">
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
    </div>
</div>


