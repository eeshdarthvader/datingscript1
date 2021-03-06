@extends('admin.layouts.master')


@section('content')

	<div class="widget">
						
		<div class="widget-header">
			<i class="icon-th-large"></i>
			<h3>Financial Management</h3>
		</div> <!-- /widget-header -->
					
		<div class="widget-content">
						
			<div class="pricing-plans plans-3">
							
				<div class="plan-container">
					<div class="plan">
						<div class="plan-header">
					                
						    <div class="plan-title">
						        Revenue Total     		
					        </div> <!-- /plan-title -->
					                
						    <div class="plan-price">
					            3964<span class="term"></span>
							</div> <!-- /plan-price -->

						</div>
					</div>
				</div>	

				<div class="plan-container">
					<div class="plan">
						<div class="plan-header">
					                
						    <div class="plan-title">
						        Revenue This month        		
					        </div> <!-- /plan-title -->
					                
						    <div class="plan-price">
					            100<span class="term"></span>
							</div> <!-- /plan-price -->

						</div>
					</div>
				</div>	

				<div class="plan-container">	

					<div class="plan">
						<div class="plan-header">
					                
						    <div class="plan-title">
						       Revenue Today        		
					        </div> <!-- /plan-title -->
					                
						    <div class="plan-price">
					            18<span class="term"></span>
							</div> <!-- /plan-price -->

						</div>
					</div>

				</div>
			</div>
		</div>				

	</div>	
	<div class="row">

		<div class="span4">

			<div class="widget">
						
				<div class="widget-header">
					<i class="icon-th-large"></i>
					<h3>Revenue Share : Gender</h3>
				</div> <!-- /widget-header -->

				<div class="widget-content">
		    		<div id="gender-revenue"></div>
		   		</div>
		    </div>

		</div>	

		<div class="span4">

			<div class="widget">
						
				<div class="widget-header">
					<i class="icon-th-large"></i>
					<h3>Revenue Share : Country</h3>
				</div> <!-- /widget-header -->

				<div class="widget-content">
		    		<div id="country-revenue"></div>
		   		</div>
		    </div>

		</div>	

		<div class="span4">

			<div class="widget">
						
				<div class="widget-header">
					<i class="icon-th-large"></i>
					<h3>Revenue Share : Payment</h3>
				</div> <!-- /widget-header -->

				<div class="widget-content">
		    		<div id="payment-revenue"></div>
		   		</div>
		    </div>

		</div>	


		
	</div>	

				




	<div class="widget">
						
		<div class="widget-header">
			<i class="icon-th-large"></i>
			<h3>Monthly Revenue</h3>
		</div> <!-- /widget-header -->
					
		<div class="widget-content">
    		<div id="monthly-revenue" style="width: 1100px; height: 600px;"></div>
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
      google.setOnLoadCallback(drawAll);


      function drawAll(){


      	drawChart();
      	draw4Chart();
      }


      function drawChart() {

        var data_gender = google.visualization.arrayToDataTable([
          ['Gender', 'Users'],
          ['Male',     61],
          ['Female',      39]
        ]);

        var options_gender = {
          title: 'Gender Statistics',
          chartArea:{left:20,top:20,width:'100%',height:'100%'},
        };

        var chart_gender = new google.visualization.PieChart(document.getElementById('gender-revenue'));

        chart_gender.draw(data_gender, options_gender);

        var data_country = google.visualization.arrayToDataTable([
          ['Country', 'Revenue'],
          ['France',     30],
          ['U.S.',      30],
          ['India',  10],
          ['Spain', 15],
          ['Germany',    10],
          ['China',    5]
        ]);

        var options_country = {
          title: 'Country share',
          chartArea:{left:20,top:20,width:'100%',height:'100%'},
        };

        var chart_country = new google.visualization.PieChart(document.getElementById('country-revenue'));

        chart_country.draw(data_country, options_country);

        var data_payment = google.visualization.arrayToDataTable([
          ['Gateway', 'Revenue'],
          ['Paypal',     57],
          ['Swripe',      23],
          ['Fortumo',  20]
        ]);

        var options_payment = {
          title: 'Payment Gateway Share',
          chartArea:{left:20,top:20,width:'100%',height:'100%'}
        };

        var chart_payment  = new google.visualization.PieChart(document.getElementById('payment-revenue'));

        chart_payment.draw(data_payment , options_payment );
      }
    </script>




    <script type="text/javascript">
     
      //google.setOnLoadCallback(draw4Chart);
      function draw4Chart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', '2014', '2015'],
          ['Jan', 1000, 400],
          ['Feb', 1170, 460],
          ['March', 660, 1120],
          ['April', 1030, 540]
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Revenue: 2014 vs 2015',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.visualization.BarChart(document.getElementById('monthly-revenue'));

        chart.draw(data, options);
      }




    </script>


@stop