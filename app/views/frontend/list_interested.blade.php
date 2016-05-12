@extends('frontend.layout')

@section('content')

	<div class="col-sm-9">
		<div class="block-page">
			<div class="block-cont">
				<h1>Interested Friends</h1>
				<img class="background-image" src="{{URL::to('assets/frontend/images/-font-b-Men-b-font-short-font-b-wigs-b-font-Fashion-boy-s-kanekalon.jpg')}}" alt=""/>
				<img class="background-image" src="{{URL::to('assets/frontend/images/block-img-1.png')}}" alt=""/>
							
				<br/>
				<br/>
				<h3>Make sure who is your big fan!.<br>Currently 34 members have been registered me as.<br/>
					<small>To see who they are right now, active your Premium Active</small>
				</h3>
														
				<div class="btn-raise-popularity activatePremium" data-target="#choosepayment" data-toggle="modal">
					<h2 >Activate Premium active</h2>
				</div>

				
<div class="row custom1">
					<div class="col-xs-12">
						<div class="user-3">
							<div class="row">
								<div class="col-sm-5">
									<div class="user-2"> <img src="{{URL::to('assets/frontend/images/plus-14.png')}}" alt="...">
 										<div class="get-visitors">
											<h4>Find people you like!</h4>
												
											<h4><small>Add contacts to your Favourites, so you can find them again in future.</small></h4>
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