@extends('admin.layouts.master')


@section('content')
        <div class="row">
            <div class="span6">
                <div class="widget widget-nopad">
                     <!-- widget-header -->
                    <div class="widget-header">
                        <i class="icon-list-alt"></i>
                         <h3> Create New Admin </h3>
                    </div>
                    <!-- /widget-header -->
                      <!-- widget-content -->
                     <div class="widget-content">
                       @if(Session::has('success'))
                         <div class="alert alert-success">{{ Session::get('success') }}</div>
                       @endif
                        <form action="{{ URL::to('admin/admin/create') }}" method="post" id="edit-profile" class="form-horizontal">
                                <br />
                                <div class="control-group">
                                    <label class="control-label" for="email">Admin Email</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="email" name="email" placeholder="Admin Email">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="control-group">
                                    <label class="control-label" for="first_name">Admin Name</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="first_name" name="first_name" placeholder="Admin Name">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="control-group">
                                    <label class="control-label" for="password">Password</label>
                                    <div class="controls">
                                        <input type="password" class="span4" id="password" name="password" placeholder="Password">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="control-group">
                                    <label class="control-label" for="title">Confirm Password</label>
                                    <div class="controls">
                                        <input type="password" class="span4" id="password_confirm" name="password_confirm" placeholder="Confirm Password">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button class="btn">Cancel</button>
                                </div> <!-- /form-actions -->

                                 @if(Session::has('errors'))
                                      <span style="color: red;"> {{ $errors->first('email'); }} </span><br>
                                      <span style="color: red;"> {{ $errors->first('password'); }} </span><br>
                                      <span style="color: red;"> {{ $errors->first('password_confirm'); }} </span>
                                 @endif

                        </form><!-- /form -->

                    </div>  <!-- /widget content -->
                 </div>
                 <!-- /widget -->
            </div>
            <!-- /span6 -->


        </div>
        <!-- /row -->

	      <div class="row">

	      	<div class="span12">

	      		<div class="widget ">

	      			<div class="widget-header">
	      				<i class="icon-user"></i>
	      				<h3>Admin Managment</h3>
	  				</div> <!-- /widget-header -->

					<div class="widget-content">

                        <table id="example" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width:4%">id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Last Login</th>
                                        <th>Last Ip Address</th>
                                        <th style="width:6%">Action</th>

                                    </tr>
                                </thead>



                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->first_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->last_login }} </td>
                                        <td>{{ $user->last_ip }}</td>
                                        <td data-userid='{{$user->id}}' >
                                            <select class="span2 act_sel" name="act_selection"  >
                                                <option>Select</option>
                                                <option value="delete">Delete</option>
                                                <option value="change_pass">Change Password</option>
                                            </select>
                                        </td>


                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>


					</div> <!-- /widget-content -->

				</div> <!-- /widget -->

		    </div> <!-- /span8 -->

	      </div> <!-- /row -->





<div id="dialog_delete" title="DELETE" class="hide">
    <p> Are you sure to DELETE this user ?</p>
</div>


<div id="dialog_password" title="New Password" class="hide">
    <form action="{{URL::to('admin/admin/newpassword')}}" id="password-form" class="form-horizontal" method="post">
        <label class="control-label"> </label>
        <input type="password"  class="m-wrap" name="new_password" id="new_password" placeholder="New Password" />
        <input type="text" class="m-wrap hide" name="userid" id="userid" />
    </form>
</div>


@stop




@section('custom-js')


<script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable()

});

    $( "#dialog_delete" ).dialog({
        resizable: false,
        autoOpen: false,
        height: 210,
        modal: true,
        buttons: [
        {
            'class' : 'btn green',
            "text" : "Delete",
            click: function() {
            var self = this;
                $.post("{{ URL::to('admin/admin/deleteuser') }}",{'id' : $(this).data('id')},function() {
                    $(self).dialog( "close" );
                    window.location.reload();
            });
            }
        },
        {
            'class' : 'btn',
            "text" : "Cancel",
            click: function() {
                $(selected_option_element).val(0);
                $(selected_option_element).trigger("liszt:updated");

                $(this).dialog( "close" );
            }
        }]
    });

    $( "#dialog_password" ).dialog({
  	      	autoOpen: false,
  	      	resizable: false,
  	      	height: 210,
  	      	modal: true,
  	      	buttons: [
  	      	{
  	      		'class' : 'btn green',
  	      		"text" : "SEND",
  	      		click: function() {
  	      			$("#password-form").submit();
          			$(this).dialog( "close" );
        			}
  	      	},
  	      	{
  	      		'class' : 'btn',
  	      		"text" : "CANCEL",
  	      		click: function() {
  	      			$(selected_option_element).val(0);
              		$(selected_option_element).trigger("liszt:updated");
          			$(this).dialog( "close" );
        			}
  	      	}]
  	    });


$(".act_sel").change(function(e){
		 	var selected_option = $(e.target).val();
		 	var user_id = $($(e.target).parent()).data('userid');

		 	selected_option_element = e.target;

		 	if(selected_option == 'delete'){
		 		$("#dialog_delete").data('id', user_id);
				$( "#dialog_delete" ).dialog( "open" );

		 	}else if(selected_option == 'change_pass'){

		 		var this_url="{{URL::to('admin/admin/newpassword')}}";
		 		var data_url= this_url + user_id;
		 		$("#userid").val(user_id);
		 		$("#dialog_password").data('url', data_url);
				$( "#dialog_password" ).dialog( "open" );
		 	}
		})


</script>

@stop
