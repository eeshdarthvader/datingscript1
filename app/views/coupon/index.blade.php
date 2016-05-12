@extends('admin.layouts.master')


@section('content')




    <div class="row">
            <div class="span6">
                <div class="widget widget-nopad">
                     <!-- widget-header -->
                    <div class="widget-header">
                        <i class="icon-list-alt"></i>
                         <h3> Add Coupons</h3>
                    </div>
                    <!-- /widget-header -->
                      <!-- widget-content -->
                     <div class="widget-content">
                       @if(Session::has('successcoupon'))
                         <div class="alert alert-success">{{ Session::get('successcoupon') }}</div>
                       @endif
                        <form action="{{ URL::to('coupons/createcoupon') }}" method="post"  class="form-horizontal" enctype="multipart/form-data">
                                <br />
                                <div class="control-group">
                                    <label class="control-label" for="name">Coupon Title</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="title" name="title" placeholder="Coupon Title">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                    <div class="control-group">
                                       <label class="control-label" for="price">Coupon Code</label>
                                       <div class="controls">
                                           <input type="text" class="span4" id="coupon_code" name="coupon_code" placeholder="Coupon Code">
                                       </div> <!-- /controls -->
                                   </div> <!-- /control-group -->

                                <div class="control-group">
                                    <label class="control-label" for="name">Minimum Transaction Amount</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="min_amount" name="min_amount" placeholder="Minimum Amount">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                    <div class="control-group">
                                       <label class="control-label" for="price">Discount amount or percentage</label>
                                       <div class="controls">
                                           <input type="text" class="span4" id="discount_amount" name="discount_amount" placeholder="Discount">
                                       </div> <!-- /controls -->
                                   </div> <!-- /control-group -->   


                                   <div class="control-group">
                                    <label class="control-label" for="name">Description</label>
                                    <div class="controls">
                                        <textarea id="description" name="description"></textarea>
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                    <div class="control-group">
                                                   <label class="control-label" for="title">Discount Type</label>
                                                   <div class="controls">
                                                       <select class="span4" name="discount_type">
                                                           <option value="flat"> Flat</option>
                                                           <option value="percent"> Percentage</option>
                                                       </select>
                                                   </div> <!-- /controls -->
                                               </div> <!-- /control-group -->

                                      <div class="control-group">
                                        <label class="control-label" for="name">Validity</label>
                                        <div class="controls">
                                            <input type="text" id="validity" name="validity" placeholder="Validity">
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->          

                                     <div class="control-group">
                                                   <label class="control-label" for="title">Per User Limit Option</label>
                                                   <div class="controls">
                                                       <select class="span4" name="per_user_limit_option" id="per_user_limit_option">
                                                           <option value="limit"> Limited</option>
                                                           <option value="limitless"> Limitless</option>
                                                       </select>
                                                   </div> <!-- /controls -->
                                               </div> <!-- /control-group -->           

                                    <div class="control-group">
                                       <label class="control-label" for="price">Per User Limit</label>
                                       <div class="controls">
                                           <input type="text" class="span4" id="per_user_limit" name="per_user_limit" placeholder="User Limit">
                                       </div> <!-- /controls -->
                                   </div> <!-- /control-group -->


                                    <div class="control-group">
                                                   <label class="control-label" for="title">Overall Limit Option</label>
                                                   <div class="controls">
                                                       <select class="span4" name="overall_limit_option" id="overall_limit_option">
                                                           <option value="limit"> Limited</option>
                                                           <option value="limitless"> Limitless</option>
                                                       </select>
                                                   </div> <!-- /controls -->
                                               </div> <!-- /control-group -->     

                                <div class="control-group">
                                    <label class="control-label" for="name">Overall Limit</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="overall_limit" name="overall_limit" placeholder="Overall Limit">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->


                                   <div class="control-group">
                                                   <label class="control-label" for="title">Status</label>
                                                   <div class="controls">
                                                       <select class="span4" name="status">
                                                           <option value="enable"> Enabled</option>
                                                           <option value="disable"> Disabled</option>
                                                       </select>
                                                   </div> <!-- /controls -->
                                               </div> <!-- /control-group -->

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button class="btn">Cancel</button>
                                </div> <!-- /form-actions -->

                                 @if(Session::has('errors'))
                                      <span style="color: red;"> {{ $errors->first('title'); }} </span><br>
                                      <span style="color: red;"> {{ $errors->first('coupon_code'); }} </span><br>
                                      <span style="color: red;"> {{ $errors->first('discount_amount'); }} </span><br>
                                       <span style="color: red;"> {{ $errors->first('discount_type'); }} </span><br>
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
                            <h3>Current Coupons</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">

                           @if(Session::has('actioncoupon'))
                                 <div class="alert alert-success">{{ Session::get('actioncoupon') }}</div>
                            @endif

                            <table id="example" class="display" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th  >Code</th>
                                             <th >Discription</th>
                                            <th >Discount Type</th>
                                            <th >Min Amt</th>
                                            <th >Discount Amt</th>
                                             <th >Per User Limit</th>
                                            <th >Overall Limit</th>
                                            <th >Validity</th>
                                            <th >Status</th>
                                            <th >Action</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($coupons as $coupon)
                                        <tr>
                                            <td style="text-align: center;">{{ $coupon->title }}</td>
                                            <td style="text-align: center;">{{ $coupon->coupon_code }}</td>
                                            <td style="text-align: center;">{{ $coupon->description }}</td>
                                            <td style="text-align: center;">{{ $coupon->discount_type }}</td>
                                            <td style="text-align: center;">{{ $coupon->min_amount }}</td>
                                            <td style="text-align: center;">{{ $coupon->discount_amount }}</td>

                                            @if($coupon->per_user_limit_option == 'limit')
                                              <td style="text-align: center;">{{ $coupon->per_user_limit }}</td>
                                            @else  
                                              <td style="text-align: center;">--</td>
                                            @endif
                                            
                                            @if($coupon->overall_limit_option == 'limit')  
                                              <td style="text-align: center;">{{ $coupon->overall_limit }}</td>
                                             @else  
                                              <td style="text-align: center;">--</td>
                                            @endif
                                            
                                            <td style="text-align: center;">{{ $coupon->validity }}</td>

                                            <td style="text-align: center;">{{ $coupon->status }}</td>

                                            <td style="text-align: center;" data-id="{{$coupon->id}}">
                                              <select class="span4 act_sel" name="act_sel" id="act_sel">
                                                        <option>Select</option>
                                                        @if( $coupon->status == 'disable') 
                                                            <option value="enable"  >Enable</option>
                                                        @else
                                                            <option value="disable"  >Disable</option>
                                                        @endif  
                                                         <option value="delete"  >Delete</option>  
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
    <p> Are you sure to DELETE this coupon ?</p>
</div>


<div id="dialog_enable" title="ENABLE" class="hide">
    <p> Are you sure to ENABLE this coupon ?</p>
</div>

<div id="dialog_disable" title="DISABLE" class="hide">
    <p> Are you sure to DISABLE this coupon ?</p>
</div>


@stop

@section('custom-css')

  <link href="{{ asset('/timepicker/jquery.timepicker.css') }}" rel="stylesheet">

@stop


@section('custom-js')

 <script src="{{ URL::to('/timepicker/jquery.timepicker.min.js') }}"></script>

<script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable()

});


$(function() {
    $( "#validity" ).datepicker({dateFormat : 'yy-mm-dd'});


    $("#per_user_limit_option").change(function(){
      
        if($("#per_user_limit_option").val() == "limitless") {

          $("#per_user_limit").attr("readonly","true");
        } else {
          $("#per_user_limit").attr("readonly","false");
        }
    });

     $("#overall_limit_option").change(function(){
      
        if($("#overall_limit_option").val() == "limitless") {

          $("#overall_limit").attr("readonly","true");
        } else {
          $("#overall_limit").attr("readonly","false");
        }
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
                $.post("{{ URL::to('/coupons/deletecoupon') }}",{'id' : $(this).data('id')},function() {
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

 $( "#dialog_enable" ).dialog({
        resizable: false,
        autoOpen: false,
        height: 210,
        modal: true,
        buttons: [
        {
            'class' : 'btn green',
            "text" : "Enable Coupon",
            click: function() {
            var self = this;
                $.post("{{ URL::to('/coupons/enablecoupon') }}",{'id' : $(this).data('id')},function() {
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
            "text" : "Disable Coupon",
            click: function() {
            var self = this;
                $.post("{{ URL::to('/coupons/disablecoupon') }}",{'id' : $(this).data('id')},function() {
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


    $(".act_sel").change(function(e){

      var selected_option = $(e.target).val();
      var id = $($(e.target).parent()).data('id');
      


      selected_option_element = e.target;

      if(selected_option == 'delete'){
        $("#dialog_delete").data('id', id);
        $( "#dialog_delete" ).dialog( "open" );

      }else if(selected_option == 'enable'){

        $("#dialog_enable").data('id', id);
        $( "#dialog_enable" ).dialog( "open" );
      }else if(selected_option == 'disable'){

        $("#dialog_disable").data('id', id);
        $( "#dialog_disable" ).dialog( "open" );
      }
    }) 

 }); 



</script>


@stop