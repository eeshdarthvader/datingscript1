@extends('frontend.layout')

@section('content')

<div class="col-sm-9">
	<div class="block-page">
		<div class="block-cont">
			<h1>Profile visitors</h1>
			<br/>
			<h3>You have 3 profile visitors not viewed.<br> Rise your popularity to attract more visitors <br> Make your profile in first place in nearby  searching.</h3>
														
			<div class="btn-raise-popularity" data-target="#raise_your_popularity_popup" data-toggle="modal">
				<h2>Raise your popularity</h2>
			</div>

						
			<div class="row custom1">
				<div class="col-xs-12 ">
					<div class="user-3">
						<div class="row">
							<div class="col-sm-5">
								<div class="user-2"> <img src="{{URL::to('assets/frontend/images/plus-14.png')}}" alt="...">
		 							<div class="get-visitors">
										<h4>Get more visitors!</h4>
														
										<h4><small>Raise your popularity - be shown in first place in search results for your area.</small></h4>
									</div>
								</div>
							</div>								
						</div>
					</div>
				</div>
			</div>
			
			@include('frontend.list')
	
		</div>
	</div>
</div>




@stop

@section('scripts')

@include('frontend.list_script')

@stop