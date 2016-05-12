<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="{{ URL::to('admin/dashboard') }}">Dating Admin Panel </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Account <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Settings</a></li>
              <li><a href="javascript:;">Help</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> {{ Sentry::getUser()->first_name  }} <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Profile</a></li>
              <li><a href="{{URL::to('admin/logout')}}">Logout</a></li>
            </ul>
          </li>
        </ul>

      </div>
      <!--/.nav-collapse -->
    </div>
    <!-- /container -->
  </div>
  <!-- /navbar-inner -->
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li @if(Request::segment(2) == 'dashboard') class="active" @else  @endif ><a href="{{ URL::to('admin/dashboard') }}"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>

        <li  @if(Request::segment(2) == 'users' or Request::segment(2) == 'admin'  or Request::segment(2) == 'importer' or Request::segment(3) == 'dashboard' ) class="dropdown active" @else class="dropdown"  @endif    ><a href="javascript:;"  class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><span>Users</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li> <a href="{{ URL::to('admin/users') }}" >User Managment</a></li>
                <li> <a href="{{ URL::to('admin/users/userbots') }}" >User Bot Managment</a></li>
                <li><a href="{{ URL::to('admin/admin') }}">Admin Managment</a></li>
                <li><a href="{{ URL::to('admin/gifts/dashboard') }}">Gifts Dashboard</a></li>
                <li><a href="{{ URL::to('admin/users/messageusers') }}">Message Users</a></li>
                <li><a href="{{ URL::to('admin/importer') }}">Import Users</a></li>
                <li><a href="{{ URL::to('admin/users/verifyprofilephoto') }}">Verify Profile Photo</a></li>
                 <li><a href="{{ URL::to('admin/users/userpopularity') }}">Popularity Ranking</a></li>
              </ul>
        </li>

        <li @if(Request::segment(2) == 'multilanguage' or Request::segment(2) == 'events' or Request::segment(2) == 'gifts' or Request::segment(2) == 'interests'  ) class="dropdown active" @else class="dropdown"  @endif ><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-list-alt"></i><span>Content</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{ URL::to('admin/gifts') }}">Gifts</a></li>
                 <li><a href="{{ URL::to('admin/events') }}">Events</a></li>
                <li><a href="{{ URL::to('admin/interests') }}">Interests</a></li>
                <li><a href="{{ URL::to('admin/profilefields') }}">Profile Fields</a></li>
                <li><a href="{{ URL::to('admin/multilanguage') }}">Multilanguage</a></li>
              </ul>
        </li>

        <li  @if(Request::segment(2) == 'googleanalytics' or Request::segment(2) == 'app_settings' or Request::segment(2) == 'social' or Request::segment(2) == 'payment') class="dropdown active" @else class="dropdown"  @endif   ><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-cog"></i><span>Settings</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{ URL::to('admin/app_settings') }}">General Settings</a></li>
                <li><a href="{{ URL::to('admin/payment') }}">Payment Gateways</a></li>
                <li><a href="{{ URL::to('admin/social') }}">Social Network Settings</a></li>
                <li><a href="{{ URL::to('admin/seo') }}">Seo Settings</a></li>
                 <li><a href="{{ URL::to('admin/googleanalytics') }}">Google Analytics Settings</a></li>
              </ul>
        </li>


        <li @if(Request::segment(2) == 'premiumfeatures' or Request::segment(2) == 'growthhacking' or Request::segment(2) == 'gamemechanics') class="dropdown active" @else class="dropdown"  @endif><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class=" icon-magic"></i><span>User Acquisition</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="{{URL::to('admin/gamemechanics')}}">Game Mechanics</a></li>
            <li><a href="{{URL::to('admin/growthhacking')}}">Growth Hacking</a></li>
            <li><a href="{{URL::to('admin/premiumfeatures')}}">Premium Features</a></li>
          </ul>
        </li>

        <li  @if(Request::segment(2) == 'thirdparty' or Request::segment(2) == 'rewards' or Request::segment(2) == 'abuse' or Request::segment(2) == 'emails') class="dropdown active" @else class="dropdown"  @endif   ><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-beaker"></i><span>Misc</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{ URL::to('/admin/abuse/users') }}">User Abuse Reports</a></li>
                <li><a href="{{ URL::to('/admin/abuse/photos') }}">Photos Abuse Reports</a></li>
                <li><a href="{{ URL::to('/admin/rewards') }}">Rewards Managment</a></li>
                <li><a href="{{ URL::to('/admin/emails') }}">Email Managment</a></li>
                <li><a href="{{ URL::to('/admin/thirdparty') }}">Third Part Apis</a></li>
              </ul>
        </li>

        <li  @if(Request::segment(2) == 'credits' or Request::segment(2) == 'coupons' or Request::segment(2) == 'financials') class="dropdown active" @else class="dropdown"  @endif   ><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-dollar"></i><span>Economics</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="{{ URL::to('/admin/coupons') }}">Coupons Managment</a></li>
                <li><a href="{{ URL::to('/admin/credits') }}">Credits Managment</a></li>
                <li><a href="{{URL::to('/admin/financials')}}">Financial Managment</a></li>
              </ul>
        </li>




      </ul>
    </div>
    <!-- /container -->
  </div>
  <!-- /subnavbar-inner -->
</div>
<!-- /subnavbar -->