@extends('frontend.layout')

@section('content')

	<div class="col-sm-9">
		<div class="block-page">
			<div class="block-cont">
				<h1>You Liked</h1>
				<img class="background-image" src="{{URL::to('assets/frontend/images/-font-b-Men-b-font-short-font-b-wigs-b-font-Fashion-boy-s-kanekalon.jpg')}}" alt=""/>
				<img class="background-image" src="{{URL::to('assets/frontend/images/block-img-1.png')}}" alt=""/>
				<br/>
				<br/>
				<h1>You liked 14 members on LEZUM</h1>
				<h3>To see who they are right now, activate your Premium active.<br/> You can also see them playing the encounter game<br/> If they like you back. It will be recorded as matched members</h3>
														
				<div class="btn-raise-popularity" data-target="" data-toggle="modal">

					<h2 >Activate Premium active</h2>
				</div>

				
				<div class="row custom1">
					<div class="col-xs-12">
						<div class="user-3">
							<div class="row">
								<div class="col-sm-5">
									<div class="user-2"> <img src="{{URL::to('assets/frontend/images/plus-14.png')}}" alt="...">
 										<div class="get-visitors">
											<h4>Find your friends!</h4>
												
											<h4><small>Find people you on LEZUM or invite them to join you.</small></h4>
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