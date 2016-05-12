@extends('admin.layouts.master')







@section('content')

    <div class="row">
            <div class="span6">
                <div class="widget widget-nopad">
                     <!-- widget-header -->
                    <div class="widget-header">
                        <i class="icon-list-alt"></i>
                         <h3> Paypal Settings </h3>
                    </div>
                    <!-- /widget-header -->
                      <!-- widget-content -->
                     <div class="widget-content">
                       @if(Session::has('successp'))
                         <div class="alert alert-success">{{ Session::get('successp') }}</div>
                       @endif
                        <form action="{{ URL::to('payment/createpaypal') }}" method="post" id="edit-profile" class="form-horizontal">
                                <br />
                                <div class="control-group">
                                    <label class="control-label" for="paypalusername">Paypal Business account user name</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="paypalusername" name="paypalusername" placeholder="Paypal Business account user name" value="{{ $paypalusername }}">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div> <!-- /form-actions -->

                                 @if(Session::has('errors'))
                                      <span style="color: red;"> {{ $errors->first('paypalusername'); }} </span><br>
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
                         <h3> Stripe Settings </h3>
                    </div>
                    <!-- /widget-header -->
                      <!-- widget-content -->
                     <div class="widget-content">
                       @if(Session::has('successstripe'))
                         <div class="alert alert-success">{{ Session::get('successstripe') }}</div>
                       @endif
                        <form action="{{ URL::to('payment/stripekey') }}" method="post" id="edit-profile" class="form-horizontal">
                                <br />
                                <div class="control-group">
                                    <label class="control-label" for="stripekey">Stripe API Key</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="stripekey" name="stripekey" placeholder="Stripe api key" value="{{ $stripekey }}">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                 <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div> <!-- /form-actions -->

                               
                                 @if(Session::has('errors'))
                                      <span style="color: red;"> {{ $errors->first('stripekey'); }} </span><br>
                                 @endif
                        </form><!-- /form -->

                    </div>  <!-- /widget content -->
                 </div>
                 <!-- /widget -->
            </div>
            <!-- /span6 -->


        </div>







@stop







@section('custom-js')



@stop