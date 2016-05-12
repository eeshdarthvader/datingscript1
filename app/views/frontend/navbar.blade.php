<div class="container">
		<div class="navigation">
			<ul>
				<li @if(Request::segment(1) == 'dashboard') class="active" @endif><a href="{{URL::to('/dashboard')}}">Members nearby</a></li>
				<li><a href="javascript:void(0);">Photo certified</a></li>
				<li @if(Request::segment(1) == 'encounters') class="active" @endif><a href="{{URL::to('/encounters')}}">Encounters</a></li>
				<li><a href="javascript:void(0);">Messages</a></li>
				<li @if(Request::segment(2) == 'likedyou') class="active" @endif><a href="{{URL::to('users/likedyou')}}">Liked you</a>@if($left_menu_vals['liked_new']>0)<span class="no-msgs">{{$left_menu_vals['liked_new']}}</span><i class="arrow-angle2"></i>@endif</li>
				<li @if(Request::segment(2) == 'likes') class="active" @endif><a href="{{URL::to('users/likes')}}">I like</a></li>
				<li><a href="javascript:void(0);">Global popularity contest</a></li>
				<li><a href="javascript:void(0);"><i class="fa fa-caret-down c-down"></i></a></li>
			</ul>
		</div>
	</div>