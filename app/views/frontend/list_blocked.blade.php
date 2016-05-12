@extends('frontend.layout')

@section('content')

<div  ng-controller="BlockedController" >
	
<div class="col-sm-9">
	<div class="block-page">
		
		<div class="block-cont">
			<h1>Blocked members</h1>
			<div class="row custom">
				
				
					<div ng-if="users.length==0" class="alert alert-info no-encounters">
						<strong>There are no blocked users.</strong> 
	   				</div>
				
				
				
						
						<div class="col-sm-6 blocked-user-tile" ng-repeat="user in users">
							<div class="user-1"> 
								<img  id="img-responsive-list" src="[[user.photo_url]]" >
								
								<div class="user-n" ng-model="user.blocked">
									<h3>[[user.name]] ( [[user.gender]] , [[user.age]]) </h3>
									<i class="fa fa-plus-circle cir" ng-click="unblockuser(user)"></i>
									<h3 >To unblock</h3>
								</div>
							</div>
						</div>
					
				
							
			</div>
		</div>
	</div>
</div>
</div>


@stop

@section('scripts')


@stop