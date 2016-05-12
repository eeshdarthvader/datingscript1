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
                                        <th>Gender</th>
                                        <th>City</th>
                                        <th>Action</th>

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
                                        <td>{{ $user->gender }} </td>
                                        <td>{{ $user->city }}</td>
                                        <td style="text-align: center;" data-userid='{{$user->id}}'>
                                            <btn style="font-size: 10px;" class="btn btn-successs btn-mini act_sel_ver">Verify</btn>
                                            <btn style="font-size: 10px;" class="btn btn-danger btn-mini act_sel_del">Unset</btn>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>


					</div> <!-- /widget-content -->

				</div> <!-- /widget -->

		    </div> <!-- /span8 -->

	      </div> <!-- /row -->





<div id="dialog_verify" title="VERIFY" class="hide">
    <p> Are you sure to VERIFY this photo ?</p>
</div>

<div id="dialog_unset" title="UNSET" class="hide">
    <p> Are you sure to UNSET this profile photo ?</p>
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
                $.post("{{ URL::to('admin/users/verifyuserphoto') }}",{'id' : $(this).data('id')},function() {
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

$( "#dialog_unset" ).dialog({
        resizable: false,
        autoOpen: false,
        height: 210,
        modal: true,
        buttons: [
        {
            'class' : 'btn green',
            "text" : "Unset",
            click: function() {
            var self = this;
                $.post("{{ URL::to('admin/users/unsetuserphoto') }}",{'id' : $(this).data('id')},function() {
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


$(".act_sel_ver").click(function(e){
		 	var selected_option = $(e.target).val();
		 	var user_id = $($(e.target).parent()).data('userid');

		 	selected_option_element = e.target;

		 		$("#dialog_verify").data('id', user_id);
				$( "#dialog_verify" ).dialog( "open" );
});

$(".act_sel_del").click(function(e){
            var selected_option = $(e.target).val();
            var user_id = $($(e.target).parent()).data('userid');

            selected_option_element = e.target;

                $("#dialog_unset").data('id', user_id);
                $( "#dialog_unset" ).dialog( "open" );
});

</script>

@stop























