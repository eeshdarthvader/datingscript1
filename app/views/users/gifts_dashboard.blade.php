@extends('admin.layouts.master')


@section('content')

	<div class="widget">
						
		<div class="widget-header">
			<i class="icon-th-large"></i>
			<h3>Gifts statistics</h3>
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
					            3964<span class="term">Gifts sent</span>
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
					            100<span class="term">Gifts sent</span>
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
					            18<span class="term">Gifts sent</span>
							</div> <!-- /plan-price -->

						</div>
					</div>

				</div>
			</div>
		</div>				




	<div class="widget">
						
		<div class="widget-header">
			<i class="icon-th-large"></i>
			<h3>Gifts exchange timeline</h3>
		</div> <!-- /widget-header -->
					
		<div class="widget-content">
    		<div id="gifts-timeline" style="width: 1100px; height: 600px;"></div>
   		</div>
    </div>		

    <div class="widget">
						
		<div class="widget-header">
			<i class="icon-th-large"></i>
			<h3>Top Gifts</h3>
		</div> <!-- /widget-header -->

		<div class="widget-content">
    		<div id="top-gifts" style="width: 1100px; height: 600px;"></div>
   		</div>
    </div>			





@stop


@section('custom-css')

	 <link href="{{ asset('assets/admin/css/plans.css') }}" rel="stylesheet">

@stop



@section('custom-js')

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Gifts', 'Shared'],
          ['Flowers',     637],
          ['Beer',      290],
          ['Kiss',  1592],
          ['Puppy', 281],
          ['Diamond',    457],
          ['Minions',    707]
        ]);

        var options = {
          title: 'Top Gifts Shared'
        };

        var chart = new google.visualization.PieChart(document.getElementById('top-gifts'));

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
          ['Month', 'Gifts'],
          ['Feb',  350],
          ['March',  79],
          ['April',  210],
          ['May',  308],
          ['June',  128],
          ['July',  80],
          ['Aug',  377],
          ['Sep',  190],
          ['Oct',  504],
          ['Nov',  608],
          ['Dec',  1030],
          ['Jan',  100]
        ]);

        var options = {
          title: 'Gifts Shared',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('gifts-timeline'));

        chart.draw(data, options);
      }
    </script>
  </head>
  

@stop