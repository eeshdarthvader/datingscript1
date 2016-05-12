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
                                        <th style="width:4%">Id</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th style="width:4%">Date of Birth</th>
                                        <th>City</th>
                                        <th>Joined</th>
                                        <th>Credits</th>
                                        <th style="width:3%">Photos</th>
                                        <th style="width:5%">Status</th>
                                        <th style="width:5%">Account Status</th>
                                        <th style="width:6%">Action</th>

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
                                        <td>{{ $user->city }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        @if($user->credits) <td>{{ $user->credits->balance }} </td>@else <td>0</td>@endif
                                        @if($user->photos) <td>{{ count($user->photos) }} </td>@else <td>0</td>@endif
                                        <td>Offline</td>
                                        @if($user->activated) <td style="color:#00ba8b;">Verified </td>@else <td style="color:#dc4539;">Not Verified</td>@endif
                                        @if(!$user->activated)

                                        <td data-userid='{{$user->id}}' >

                                            <select class="span2 act_sel" name="act_selection"  >
                                                <option>Select</option>
                                                <option value="verify">Verify</option>
                                                <option value="delete">Delete</option>
                                            </select>
                                        </td>
                                        @else
                                        <td data-userid='{{$user->id}}' >
                                            <select class="span2 act_sel" name="act_selection" >
                                                <option>Select</option>
                                                <option value="disable">Disable</option>
                                                <option value="delete">Delete</option>
                                                <option value="change_pass">Reset Password</option>
                                                <option value="credits">Give Credits</option>
                                            </select>
                                        </td>
                                        @endif

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>


					</div> <!-- /widget-content -->

				</div> <!-- /widget -->

		    </div> <!-- /span8 -->

	      </div> <!-- /row -->





<div id="dialog_verify" title="VERIFY" class="hide">
    <p> Are you sure to VERIFY this user ?</p>
</div>


<div id="dialog_disable" title="DISABLE" class="hide">
    <p> Are you sure to DISABLE this user ?</p>
</div>


<div id="dialog_delete" title="DELETE" class="hide">
    <p> Are you sure to DELETE this user ?</p>
</div>


<div id="dialog_credits" title="CREDITS" class="hide">
    <form action="{{URL::to('/users/credituser')}}" id="credit-form" class="form-horizontal" method="post">
        <label class="control-label"> </label>
        <input type="number"  class="m-wrap" name="credits" id="credits" placeholder="credits" />
        <label class="control-label"> </label>
        <input type="text" class="m-wrap" name="reason" placeholder="reason" id="reason" value=""/>
        <input type="text" class="m-wrap hide" name="userid" id="userid" />
    </form>
</div>



<div id="dialog_password" title="New Password" class="hide">
    <form action="{{ URL::to('/users/newpassword') }}" id="password-form" class="form-horizontal" method="post">
        <label class="control-label"> </label>
        <input type="password"  class="m-wrap" name="new_password" id="new_password" placeholder="New Password" />
        <input type="text" class="m-wrap hide"  name="useridd" id="useridd" />
    </form>
</div>




@stop




@section('custom-js')


<script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable()

});


$( "#dialog_verify" ).dialog({
        resizable: false,
        autoOpen: false,
        height: 210,
        modal: true,
        buttons: [
        {
            'class' : 'btn green',
            "text" : "Verify",
            click: function() {
            var self = this;
                $.post("{{ URL::to('/users/verifyuser') }}",{'id' : $(this).data('id')},function() {
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


    $( "#dialog_disable" ).dialog({
        resizable: false,
        autoOpen: false,
        height: 210,
        modal: true,
        buttons: [
        {
            'class' : 'btn green',
            "text" : "Disable",
            click: function() {
            var self = this;
                $.post("{{ URL::to('/users/disableuser') }}",{'id' : $(this).data('id')},function() {
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
                $.post("{{ URL::to('/users/deleteuser') }}",{'id' : $(this).data('id')},function() {
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

    $( "#dialog_credits" ).dialog({
  	      	autoOpen: false,
  	      	resizable: false,
  	      	height: 210,
  	      	modal: true,
  	      	buttons: [
  	      	{
  	      		'class' : 'btn green',
  	      		"text" : "SEND",
  	      		click: function() {
  	      			$("#credit-form").submit();
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

		 	var user_idd = $($(e.target).parent()).data('userid');

		 	selected_option_element = e.target;

		 	if(selected_option == 'verify'){
		 		$("#dialog_verify").data('id', user_id);
				$( "#dialog_verify" ).dialog( "open" );

		 	}
		 	else if(selected_option == 'disable'){
		 		$("#dialog_disable").data('id', user_id);
				$( "#dialog_disable" ).dialog( "open" );
		 	}
		 	else if(selected_option == 'delete'){
		 		$("#dialog_delete").data('id', user_id);
				$( "#dialog_delete" ).dialog( "open" );
		 	}
		 	else if(selected_option == 5){
		 		$("#dialog_enable").data('id', user_id);
				$( "#dialog_enable" ).dialog( "open" );
		 	}
		 	else if(selected_option == 6){
		 		$("#dialog_reset_password").data('id', user_id);
				$( "#dialog_reset_password" ).dialog( "open" );
		 	}else if(selected_option == 'credits'){

		 		var this_url="{{URL::to('/users/credituser')}}";
		 		var data_url= this_url + user_id;
		 		$("#userid").val(user_id);
		 		$("#dialog_credits").data('url', data_url);
				$( "#dialog_credits" ).dialog( "open" );
		 	}else if(selected_option == 'change_pass'){

                var this_url="{{URL::to('/users/newpassword')}}";
                var data_url= this_url + user_idd;
                $("#useridd").val(user_idd);
                $("#dialog_password").data('url', data_url);
                $("#dialog_password").dialog( "open" );
            }
		})








/*$(".act_sel").change(function(e){

                var action = $(e.target).val();

                if(action == 'verify'){
                    if(confirm("Are you sure you want to verify this user?")){

                       $.post( "{{ URL::to('/users/verifyuser') }}", { id: $(this).data('id') } );

                    }
                }else if(action == 'delete'){
                    if(confirm("Are you sure you want to delete this user?")){
                        alert('oh ok!');
                    }
                }else if(action == 'disable'){
                    if(confirm("Are you sure you want to disable this user?")){
                        alert('oh ok!');
                    }
                }else if(action == 'reset_pass' ){
                     if(confirm("Are you sure you want to reset this user's password?")){
                        alert('oh ok!');
                     }
                }else if(action == 'credits'){
                    if(confirm("Are you sure you want to give credits to this user?")){
                        alert('oh ok!');
                    }
                }
})*/



</script>

@stop























