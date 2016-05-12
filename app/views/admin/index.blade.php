@extends('admin.layouts.master')


@section('content')

	<div class="widget">
						
		<div class="widget-header">
			<i class="icon-th-large"></i>
			<h3>Sign up statistics</h3>
		</div> <!-- /widget-header -->
					
		<div class="widget-content">
						
			<div class="pricing-plans plans-3">
							
				<div class="plan-container">
					<div class="plan">
						<div class="plan-header">
					                
						    <div class="plan-title">
						        Total        		
					        </div> <!-- /plan-title -->
					                
						    <div class="plan-price">
					            12345<span class="term">Sign ups</span>
							</div> <!-- /plan-price -->

						</div>
					</div>
				</div>	

				<div class="plan-container">
					<div class="plan">
						<div class="plan-header">
					                
						    <div class="plan-title">
						        This month        		
					        </div> <!-- /plan-title -->
					                
						    <div class="plan-price">
					            143<span class="term">Sign ups</span>
							</div> <!-- /plan-price -->

						</div>
					</div>
				</div>	

				<div class="plan-container">	

					<div class="plan">
						<div class="plan-header">
					                
						    <div class="plan-title">
						        Today        		
					        </div> <!-- /plan-title -->
					                
						    <div class="plan-price">
					            18<span class="term">Sign ups</span>
							</div> <!-- /plan-price -->

						</div>
					</div>

				</div>
			</div>
		</div>				




	<div class="widget">
						
		<div class="widget-header">
			<i class="icon-th-large"></i>
			<h3>Country based user statistics </h3>
		</div> <!-- /widget-header -->
					
		<div class="widget-content">
    		<div id="country-users" style="width: 1100px; height: 600px;"></div>
   		</div>
    </div>		

    <div class="widget">
						
		<div class="widget-header">
			<i class="icon-th-large"></i>
			<h3>Users signups</h3>
		</div> <!-- /widget-header -->

		<div class="widget-content">
    		<div id="signup-users" style="width: 1100px; height: 600px;"></div>
   		</div>
    </div>			





@stop


@section('custom-css')

	 <link href="{{ asset('assets/admin/css/plans.css') }}" rel="stylesheet">

@stop



@section('custom-js')

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["geochart"]});
      google.setOnLoadCallback(drawRegionsMap);

      function drawRegionsMap() {

        var data = google.visualization.arrayToDataTable([
          ['Country', 'Users'],
          ['Germany', 200],
          ['United States', 300],
          ['Brazil', 400],
          ['Canada', 500],
          ['France', 600],
          ['RU', 700]
        ]);

        var options = {};

        var chart = new google.visualization.GeoChart(document.getElementById('country-users'));

        chart.draw(data, options);
      }




    </script>


    <script type="text/javascript"
          src="https://www.google.com/jsapi?autoload={
            'modules':[{
              'name':'visualization',
              'version':'1',
              'packages':['corechart']
            }]
          }"></script>

    <script type="text/javascript">
      google.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Users'],
          ['Jan',  200],
          ['Feb',  350],
          ['March',  649],
          ['April',  560],
          ['May',  788],
          ['June',  438],
          ['July',  660],
          ['Aug',  987],
          ['Sep',  1000],
          ['Oct',  734],
          ['Nov',  600],
          ['Dec',  1030]
        ]);

        var options = {
          title: 'Signups',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('signup-users'));

        chart.draw(data, options);
      }
    </script>
  </head>
  

@stop