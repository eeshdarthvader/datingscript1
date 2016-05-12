<div class="bottom-head">
		<div class="container">
			<div class="right-txt">
				<div class="lorem">
					<!--<p>"I like" Add more filters for matching members</p>-->
					<span class="bg-w1">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn like-check">
							<input type="checkbox" autocomplete="off" >
						</label>
					</div>
					</span> <a href="javascript:void(0);"><img src="{{URL::to('assets/frontend/images/bing.png')}}" alt="..."> See online members</a> </div>
				<div class="conn"> <span>now connecting</span><span class="green">{{$online_users}}</span> </div>
				<div class="conn"> <span>members</span><span class="green">{{$total_users}}</span> </div>
			</div>
		</div>
	</div>