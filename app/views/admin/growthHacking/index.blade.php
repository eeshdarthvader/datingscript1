@extends('admin.layouts.master')


@section('content')

    <div class="row">
            <div class="span6">
                <div class="widget widget-nopad">
                     <!-- widget-header -->
                    <div class="widget-header">
                        <i class="icon-list-alt"></i>
                         <h3> Facebook </h3>
                    </div>
                    <!-- /widget-header -->
                      <!-- widget-content -->
                     <div class="widget-content">
                       @if(Session::has('success'))
                         <div class="alert alert-success">{{ Session::get('success') }}</div>
                       @endif
                        <form action="{{ URL::to('admin/growthhacking/facebookshare') }}" method="post" id="sendmsg" class="form-horizontal">
                                <br />
                                

                                

                                <div class="control-group">
                                    <label class="control-label" for="name">Facebook compulsory share</label>
                                    <div class="controls">
                                        <select  name="isfbshare">
                                            <option value="1" @if($isfbshare == '1')  selected="selected" @endif >Enable</option>
                                            <option value="0"  @if($isfbshare == '0')  selected="selected" @endif>Disable</option>
                                        </select>
                                    </div>    
                                </div> <!-- /controls -->

                             <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div> <!-- /form-actions -->
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