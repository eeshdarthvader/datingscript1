@extends('admin.layouts.master')


@section('content')

    <div class="row">
            <div class="span6">
                <div class="widget widget-nopad">
                     <!-- widget-header -->
                    <div class="widget-header">
                        <i class="icon-list-alt"></i>
                         <h3> Add Credits Package </h3>
                    </div>

                    <!-- /widget-header -->
                      <!-- widget-content -->
                     <div class="widget-content">
                       @if(Session::has('successpackage'))
                         <div class="alert alert-success">{{ Session::get('successpackage') }}</div>
                       @endif
                        <form action="{{ URL::to('admin/credits/addpackage') }}" method="post" id="edit-profile" class="form-horizontal">
                                <br />
                                <div class="control-group">
                                    <label class="control-label" for="credits">Credits</label>
                                    <div class="controls">
                                        <input type="number" class="span4" id="credits" name="credits" placeholder="">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="control-group">
                                    <label class="control-label" for="cost">Package Amount</label>
                                    <div class="controls">
                                        <input type="number" class="span4" id="cost" name="cost" placeholder="">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div> <!-- /form-actions -->

                                 @if(Session::has('errors'))
                                      <span style="color: red;"> {{ $errors->first('credits'); }} </span><br>
                                       <span style="color: red;"> {{ $errors->first('cost'); }} </span><br>
                                 @endif
                        </form><!-- /form -->

                    </div>  <!-- /widget content -->
                 </div>
                 <!-- /widget -->
            </div>
            <!-- /span6 -->

                  <div class="span6">
                            <div class="widget widget-nopad">
                                 <!-- widget-header -->
                                <div class="widget-header">
                                    <i class="icon-list-alt"></i>
                                     <h3> Credit All Users</h3>
                                </div>
                                <!-- /widget-header -->
                                  <!-- widget-content -->
                                 <div class="widget-content">
                                   @if(Session::has('creditall'))
                                     <div class="alert alert-success">{{ Session::get('creditall') }}</div>
                                   @endif

                                    <form action="{{ URL::to('admin/credits/creditall') }}" method="post" id="edit-profile" class="form-horizontal">
                                            <br />
                                            <div class="control-group">
                                                <label class="control-label" for="all_users_credit">Credits</label>
                                                <div class="controls">
                                                    <input type="number" class="span4" id="all_users_credit" name="all_users_credit" pattern="\d+" min="0" step="1">
                                                </div> <!-- /controls -->
                                            </div> <!-- /control-group -->

                                              <div class="control-group">
                                                <label class="control-label" for="reason">Reason</label>
                                                <div class="controls">
                                                    <input type="text" class="span4" id="reason" name="reason" >
                                                </div> <!-- /controls -->
                                            </div> <!-- /control-group -->


                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary">Send</button>
                                            </div> <!-- /form-actions -->

                                             @if(Session::has('errors'))
                                                  <span style="color: red;"> {{ $errors->first('all_users_credit'); }} </span>
                                                  <span style="color: red;"> {{ $errors->first('reason'); }} </span>
                                             @endif

                                    </form><!-- /form -->

                                </div>  <!-- /widget content -->
                             </div>
                             <!-- /widget -->
                        </div>
                        <!-- /span6 -->

        </div>

    <div class="row">
            <div class="span6">
                <div class="widget widget-nopad">
                     <!-- widget-header -->
                    <div class="widget-header">
                        <i class="icon-list-alt"></i>
                         <h3>General Settings </h3>
                    </div>

                    <!-- /widget-header -->
                      <!-- widget-content -->
                     <div class="widget-content">
                       @if(Session::has('updategeneral'))
                         <div class="alert alert-success">{{ Session::get('updategeneral') }}</div>
                       @endif


                        <form action="{{ URL::to('admin/credits/updategeneral') }}" method="post" id="edit-profile" class="form-horizontal">
                                <br />
                                <div class="control-group">
                                    <label class="control-label" for="defaultcredits">Default Credits</label>
                                    <div class="controls">
                                        <input type="number" class="span4" id="defaultcredits" name="defaultcredits" pattern="\d+" min="0" step="1" value="{{$defaultcredits}}">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="control-group">
                                    <label class="control-label" for="isenabled">Credit System</label>
                                    <div class="controls">
                                        <select  name="isenabled">
                                            <option value="1" @if($isenabled == '1')  selected="selected" @endif >Enable</option>
                                            <option value="0"  @if($isenabled == '0')  selected="selected" @endif>Disable</option>
                                        </select>
                                    </div>    
                                </div> <!-- /control-group -->

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div> <!-- /form-actions -->

                                 @if(Session::has('errors'))
                                      <span style="color: red;"> {{ $errors->first('defaultcredits'); }} </span><br>
                                       <span style="color: red;"> {{ $errors->first('isenabled'); }} </span><br>
                                 @endif
                        </form><!-- /form -->

                    </div>  <!-- /widget content -->
                 </div>
                 <!-- /widget -->
            </div>
        </div>    


      <div class="row">


                <div class="span12">

                    <div class="widget ">

                        <div class="widget-header">
                            <i class="icon-user"></i>
                            <h3>Current Credit Packages</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">

                            @if(Session::has('packagedeleted'))
                                 <div class="alert alert-success">{{ Session::get('packagedeleted') }}</div>
                            @endif

                            <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Credits</th>
                                            <th>Dollars</th>
                                            <th style="width:5%">Delete</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($packages as $package)
                                            <tr class="interest-category-tr">
                                                <td>{{ $package->credits }}</td>
                                                <td>{{ $package->cost}}</td>
                                                <td>
                                                    <span style="font-size: 10px;" data-id="{{$package->id}}"  class="btn btn-danger btn-mini act_sel">Delete</span>
                                                </td>
                                            </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                        </div> <!-- /widget-content -->

                    </div> <!-- /widget -->

                </div> <!-- /span -->

              </div> <!-- /row -->


<div id="dialog_delete" title="DELETE" class="hide">
    <p> Are you sure to DELETE this credit package ?</p>
</div>

@stop



@section('custom-js')


<script type="text/javascript">


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
                $.post("{{ URL::to('admin/credits/deletepackage/') }}",{'id' : $(this).data('id')},function() {
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