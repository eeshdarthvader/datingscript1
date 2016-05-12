@extends('admin.layouts.master')


@section('content')



	      <div class="row">

	      	<div class="span12">

	      		<div class="widget ">

	      			<div class="widget-header">
	      				<i class="icon-user"></i>
	      				<h3>User Managment</h3>
	  				</div> <!-- /widget-header -->

					<div class="widget-content">

                        <table id="example" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th >Id</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date of Birth</th>
                                        <th>Country</th>
                                        <th>Gender</th>
                                        <th>Gifts Received</th>
                                    </tr>
                                </thead>



                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>

                                        @if($user->photo_id == '')
                                        <td><img class="img" src="{{ URL::to('uploads/app/male-thumbnail.jpg') }}" style="width:70px;height:70px"/></td>

                                        @else
                                        
                                        <td><img class="img" src="{{ URL::to('uploads/photos/'.$user->photo_id) }}" style="width:70px;height:70px"/></td>
                                        @endif
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->dob }} </td>
                                        <td>{{ $user->country }}</td>
                                        <td>{{ $user->gender }}</td>
                                        <td>0</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>


					</div> <!-- /widget-content -->

				</div> <!-- /widget -->

		    </div> <!-- /span8 -->

	      </div> <!-- /row -->

@stop




@section('custom-js')

<script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable()

});

</script>


@stop























