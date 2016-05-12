@extends('admin.layouts.master')







@section('content')

    <div class="row">
            <div class="span6">
                <div class="widget widget-nopad">
                     <!-- widget-header -->
                    <div class="widget-header">
                        <i class="icon-list-alt"></i>
                         <h3> QuickBlox </h3>
                    </div>
                    <!-- /widget-header -->
                      <!-- widget-content -->
                     <div class="widget-content">
                       @if(Session::has('successqb'))
                         <div class="alert alert-success">{{ Session::get('successqb') }}</div>
                       @endif
                        <form action="{{ URL::to('thirdparty/quickblox') }}" method="post" id="edit-profile" class="form-horizontal">
                                <br />
                                <div class="control-group">
                                    <label class="control-label" for="qbappid">Application ID</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="qbappid" name="qbappid" value="{{ $qbappid }}">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                 <div class="control-group">
                                    <label class="control-label" for="authkey">Authentication Key</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="authkey" name="authkey" value="{{ $authkey }}">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                 <div class="control-group">
                                    <label class="control-label" for="authsecret">Authentication Secret</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="authsecret" name="authsecret" value="{{ $authsecret }}">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                 <div class="control-group">
                                    <label class="control-label" for="apiendpt">API Endpoint</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="apiendpt" name="apiendpt" value="{{ $apiendpt }}">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div> <!-- /form-actions -->

                                 @if(Session::has('errors'))
                                      <span style="color: red;"> {{ $errors->first('appid'); }} </span><br>
                                      <span style="color: red;"> {{ $errors->first('authkey'); }} </span><br>
                                      <span style="color: red;"> {{ $errors->first('authsecret'); }} </span><br>
                                      <span style="color: red;"> {{ $errors->first('apiendpt'); }} </span><br>
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
                         <h3> Pandora Bots </h3>
                    </div>
                    <!-- /widget-header -->
                      <!-- widget-content -->
                     <div class="widget-content">
                       @if(Session::has('successpb'))
                         <div class="alert alert-success">{{ Session::get('successpb') }}</div>
                       @endif
                        <form action="{{ URL::to('thirdparty/pandora') }}" method="post" id="edit-profile" class="form-horizontal">
                                <br />
                                <div class="control-group">
                                    <label class="control-label" for="pbappid">Application ID</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="pbappid" name="pbappid" value="{{ $pbappid }}">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                 <div class="control-group">
                                    <label class="control-label" for="userkey">User Key</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="userkey" name="userkey" value="{{ $userkey }}">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                 <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div> <!-- /form-actions -->

                               
                                 @if(Session::has('errors'))
                                      <span style="color: red;"> {{ $errors->first('appid'); }} </span><br>
                                      <span style="color: red;"> {{ $errors->first('userkey'); }} </span><br>
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