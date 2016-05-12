@extends('admin.layouts.master')


@section('content')




    <div class="row">
            <div class="span6">
                <div class="widget widget-nopad">
                     <!-- widget-header -->
                    <div class="widget-header">
                        <i class="icon-list-alt"></i>
                         <h3> Add Gifts</h3>
                    </div>
                    <!-- /widget-header -->
                      <!-- widget-content -->
                     <div class="widget-content">
                       @if(Session::has('successgift'))
                         <div class="alert alert-success">{{ Session::get('successgift') }}</div>
                       @endif
                        <form action="{{ URL::to('gifts/creategift') }}" method="post"  class="form-horizontal" enctype="multipart/form-data">
                                <br />
                                <div class="control-group">
                                    <label class="control-label" for="name">Gift Name</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="name" name="name" placeholder="Gift Name">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                  <div class="control-group">
                                       <label class="control-label" for="photo">Gift Icon</label>
                                       <div class="controls">
                                           <input type="file" class="span4" id="photo" name="photo" >
                                       </div> <!-- /controls -->
                                   </div> <!-- /control-group -->

                                    <div class="control-group">
                                       <label class="control-label" for="price">Gift Price</label>
                                       <div class="controls">
                                           <input type="number" class="span4" id="price" name="price" placeholder="Gift Price">
                                       </div> <!-- /controls -->
                                   </div> <!-- /control-group -->

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div> <!-- /form-actions -->

                                 @if(Session::has('errors'))
                                      <span style="color: red;"> {{ $errors->first('name'); }} </span><br>
                                      <span style="color: red;"> {{ $errors->first('photo'); }} </span><br>
                                      <span style="color: red;"> {{ $errors->first('price'); }} </span><br>
                                 @endif
                        </form><!-- /form -->

                    </div>  <!-- /widget content -->
                 </div>
                 <!-- /widget -->
            </div>
            <!-- /span6 -->


        </div>



      <div class="row">

                <div class="span12">

                    <div class="widget ">

                        <div class="widget-header">
                            <i class="icon-user"></i>
                            <h3>Current Gifts</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">

                            <table id="example" class="display" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Gift Name</th>
                                            <th style="width:25%" >Gift Price</th>
                                            <th style="width:25%">Icon Image</th>
                                            <th style="width:15%">Delete</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($gifts as $gift)
                                        <tr>
                                            <td style="text-align: center;">{{ $gift->name }}</td>
                                            <td style="text-align: center;">{{ $gift->price }}</td>
                                            <td style="text-align: center;"><img src="{{URL::to('/uploads/gifts/'.$gift->icon_id )}}" width="100px" /> </td>
                                            <td>
                                              <span style="font-size: 10px;" data-id="{{$gift->id}}"  class="btn btn-danger btn-mini act_sel">Delete</span>
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
    <p> Are you sure to DELETE this credit package ?</p>
</div>

@stop



@section('custom-js')


<script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable()

});


$(function() {

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
                $.post("{{ URL::to('/gifts/deletegift/') }}",{'id' : $(this).data('id')},function() {
                    $(self).dialog( "close" );
                    window.location.reload();
            });
            }
        },
        {
            'class' : 'btn',
            "text" : "Cancel",
            click: function() {
                $(this).dialog( "close" );
            }
        }]
    }); 


    $(".act_sel").click(function(e){

        var id = $(e.target).data('id');
        $("#dialog_delete").data('id', id);
        $( "#dialog_delete" ).dialog( "open" );
    }) 

 }); 



</script>




@stop 