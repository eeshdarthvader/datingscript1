@extends('frontend.layout')

@section('css')
 <style>
.pagination li {
	display: inline;
margin: 9px;
text-align: center;
float: initial;
font-size: 20px;
}

.pagination{
	margin : 15px !important;
}

#dashboard-users-block {
	text-align: center;
}

 </style>

@stop

@section('content')
				<div class="col-sm-9" id="dashboard-users-block">
					<div class="row">
						
					@if($users_count == 0)
					<div class="meeting-game-right-part">
                            	<div class="alert alert-info no-encounters">
		                            <strong>There are no people based on your preference! Either change filters or try later</strong> 
   								</div>
					</div>			
					@else 
						@foreach($users as $user)
							<div class="col-sm-3">
								<a href="{{URL::to('user/'.$user->id)}}">
								<div class="cover-prof">
									<div class="profile">
										@if($user->photo_id)
											<img class="img-responsive" src="{{URL::to('/uploads/photos/'.$user->photo_id)}}" >
										@else
											<img class="img-responsive" src="{{URL::to($default_image)}}" >
										@endif
										<div class="tag"> <img src="{{URL::to('/assets/frontend/images/profile-tag.png')}}" alt="..."> </div>
										<div class="right-tags"> <img src="{{URL::to('/assets/frontend/images/log-2.png')}}" alt="..."> <img src="{{URL::to('/assets/frontend/images/log-1.png')}}" alt="..."> </div>
										<div class="bottom-bar"> <i class="fa fa-camera cam"></i> 15 
											<div class="vip-on"> <span class="vip">VIP</span> <span class="on">ON</span> </div>
										</div>
									</div>
									<div class="name-user">
										<h2>{{ $user->first_name }} ( {{ $user->gender}} , {{$user->age}})</h2>
										<div class="upp"><span class="box">Location</span>
											<p>{{ $user->city }}</p>
										</div>
										<div class="upp"><span class="box">Ages</span>
											<p>{{ $user->preferences()->first()->min_age}} ~ {{ $user->preferences()->first()->max_age}}</p>
										</div>
									</div>
								</div>
								</a>
							</div>
						@endforeach
	
						</div>
						{{$users->links()}}
					@endif

				</div>
@stop