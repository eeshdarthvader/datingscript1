@extends('admin.layouts.master')







@section('content')

    <div class="row">
            <div class="span6">
                <div class="widget widget-nopad">
                     <!-- widget-header -->
                    <div class="widget-header">
                        <i class="icon-list-alt"></i>
                         <h3> Facebook Settings </h3>
                    </div>
                    <!-- /widget-header -->
                      <!-- widget-content -->
                     <div class="widget-content">
                       @if(Session::has('successfb'))
                         <div class="alert alert-success">{{ Session::get('successfb') }}</div>
                       @endif
                        <form action="{{ URL::to('social/createfacebook') }}" method="post" id="edit-profile" class="form-horizontal">
                                <br />
                                <div class="control-group">
                                    <label class="control-label" for="fbid">Facebook App ID</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="fbid" name="fbid" placeholder="Facebook App ID" value="{{ $fbid }}">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="control-group">
                                    <label class="control-label" for="fbsecret">Facebook Secret</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="fbsecret" name="fbsecret" placeholder="Facebook Secret" value="{{ $fbsecret }}" >
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button class="btn">Cancel</button>
                                </div> <!-- /form-actions -->

                                 @if(Session::has('errors'))
                                      <span style="color: red;"> {{ $errors->first('fbid'); }} </span><br>
                                      <span style="color: red;"> {{ $errors->first('fbsecret'); }} </span><br>
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