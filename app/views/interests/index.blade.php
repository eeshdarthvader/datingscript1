@extends('admin.layouts.master')


@section('content')

    <div class="row">
            <div class="span6">
                <div class="widget widget-nopad">
                     <!-- widget-header -->
                    <div class="widget-header">
                        <i class="icon-list-alt"></i>
                         <h3> Add Interest Category </h3>
                    </div>
                    <!-- /widget-header -->
                      <!-- widget-content -->
                     <div class="widget-content">
                       @if(Session::has('successcat'))
                         <div class="alert alert-success">{{ Session::get('successcat') }}</div>
                       @endif
                        <form action="{{ URL::to('interests/createcategory') }}" method="post" id="edit-profile" class="form-horizontal">
                                <br />
                                <div class="control-group">
                                    <label class="control-label" for="category_name">Name of Category</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="category_name" name="category_name" placeholder="Name of Category">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div> <!-- /form-actions -->

                                 @if(Session::has('errors'))
                                      <span style="color: red;"> {{ $errors->first('category_name'); }} </span><br>
                                 @endif
                        </form><!-- /form -->

                    </div>  <!-- /widget content -->
                 </div>
                 <!-- /widget -->
            </div>
            <!-- /span6 -->

            @if(!$categories_empty)
                  <div class="span6">
                            <div class="widget widget-nopad">
                                 <!-- widget-header -->
                                <div class="widget-header">
                                    <i class="icon-list-alt"></i>
                                     <h3> Add Interest </h3>
                                </div>
                                <!-- /widget-header -->
                                  <!-- widget-content -->
                                 <div class="widget-content">
                                   @if(Session::has('successint'))
                                     <div class="alert alert-success">{{ Session::get('successint') }}</div>
                                   @endif
                                    <form action="{{ URL::to('interests/createinterest') }}" method="post" id="edit-profile" class="form-horizontal">
                                            <br />
                                            <div class="control-group">
                                                <label class="control-label" for="interest_name">Name of Interest</label>
                                                <div class="controls">
                                                    <input type="text" class="span4" id="interest_name" name="interest_name" placeholder="Name of Interest">
                                                </div> <!-- /controls -->
                                            </div> <!-- /control-group -->

                                              <div class="control-group">
                                                   <label class="control-label" for="title">Interest Category</label>
                                                   <div class="controls">
                                                       <select class="span4" name="category">
                                                           @foreach($categories as $cats)
                                                           <option value="{{ $cats->name }}"> {{ $cats->name }}</option>
                                                           @endforeach
                                                       </select>
                                                   </div> <!-- /controls -->
                                               </div> <!-- /control-group -->


                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary">Create</button>
                                            </div> <!-- /form-actions -->

                                             @if(Session::has('errors'))
                                                  <span style="color: red;"> {{ $errors->first('interest_name'); }} </span>
                                             @endif

                                    </form><!-- /form -->

                                </div>  <!-- /widget content -->
                             </div>
                             <!-- /widget -->
                        </div>
                        <!-- /span6 -->
            @endif
        </div>


      <div class="row">


                <div class="span12">

                    <div class="widget ">

                        <div class="widget-header">
                            <i class="icon-user"></i>
                            <h3>Interest Categories</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">

                            <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Interest Category</th>
                                            <th>Number of Interests</th>
                                            <th style="width:5%">Delete</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($categories as $cats)
                                            <tr class="interest-category-tr">
                                                <td>{{ $cats->name }}</td>
                                                @if($cats->interests) <td><a href="javascript:;" class="interest_count">{{ $cats->interests_count() }}</a> </td>@else <td>0</td>@endif
                                                
                                                 <td>
                                                  <span style="font-size: 10px;" data-id="{{$cats->id}}"  class="btn btn-danger btn-mini del_cat">Delete</span>
                                                </td>
                                            </tr>


										<tr class="interest-tr" style="display:none;">

                                            <td>

                                                    <table class="table">
                                                        <tbody>
                                                            @foreach($cats->all_interests() as $interest)

                                                                <tr>
                                                                    <td> {{ $interest->name }} </td>
                                                                     <td>
                                                                      <span style="font-size: 10px;" data-id="{{$interest->id}}"  class="btn btn-danger btn-mini del_int">Delete</span>
                                                                    </td>
                                                                    
                                                                </tr>

                                                            @endforeach
                                                        </tbody>
                                                    </table>

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
    <p> Are you sure to DELETE this category ?</p>
</div>

<div id="dialog_delete_interest" title="DELETE" class="hide">
    <p> Are you sure to DELETE this interest ?</p>
</div>


@stop




@section('custom-js')


<script>

$(function(){

   $(".interest_count").click(function(){

             var tr = $(this).parents('.interest-category-tr').get(0);

            $(tr).next().toggle();

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
                $.post("{{ URL::to('/interests/deletecategory/') }}",{'id' : $(this).data('id')},function() {
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

    $( "#dialog_delete_interest" ).dialog({
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
                $.post("{{ URL::to('/interests/deleteinterest/') }}",{'id' : $(this).data('id')},function() {
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


    $(".del_cat").click(function(e){

        var id = $(e.target).data('id');
        $("#dialog_delete").data('id', id);
        $( "#dialog_delete" ).dialog( "open" );
    }) 

    $(".del_int").click(function(e){

        var id = $(e.target).data('id');
        $("#dialog_delete_interest").data('id', id);
        $( "#dialog_delete_interest" ).dialog( "open" );
    }) 


});



</script>






@stop