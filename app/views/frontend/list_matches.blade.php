@extends('frontend.layout')

@section('content')

	<div class="col-sm-9">
		<div class="block-page">
			<div class="block-cont">
				<h1>Matched Members</h1>
				<img class="background-image" src="{{URL::to('assets/frontend/images/-font-b-Men-b-font-short-font-b-wigs-b-font-Fashion-boy-s-kanekalon.jpg')}}" alt=""/>
				<img class="background-image" src="{{URL::to('assets/frontend/images/block-img-1.png')}}" alt=""/>
				<br/>
				<br/>			
				<h1>Check out now your matching member.</h1>
						
				<h3>
					<small>You have matching members.<br/>To see who they are right now, active your Premium Active</small>
				</h3>
														
				<div class="btn-raise-popularity activatePremium"  data-target="#choosepayment" data-toggle="modal">
					<h2>Activate Premium active</h2>
    			</div>
				
				
    			
    			<div class="row custom1">
					<div class="col-xs-12">
						<div class="user-3">
							<div class="row">
								<div class="col-sm-5">
									<div class="user-2"> <img src="{{URL::to('assets/frontend/images/plus-14.png')}}" alt="...">
 										<div class="get-visitors">
											<h4>Find matching people with you!</h4>
												
											<h4><small>Find your matching members. You can discover them now later, incidentally.</small></h4>
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
