@extends('admin.layouts.master')







@section('content')

    <div class="row">
            <div class="span6">
                <div class="widget widget-nopad">
                     <!-- widget-header -->
                    <div class="widget-header">
                        <i class="icon-list-alt"></i>
                         <h3> Settings </h3>
                    </div>
                    <!-- /widget-header -->
                      <!-- widget-content -->
                     <div class="widget-content">
                       @if(Session::has('success_setting'))
                         <div class="alert alert-success">{{ Session::get('success_setting') }}</div>
                       @endif
                        <form action="{{ URL::to('admin/premiumfeatures/settings') }}" method="post" id="sendmsg" class="form-horizontal">
                                <br />

                                <div class="control-group">
                                    <label class="control-label" for="spotlightType">SpotLight Tpye</label>
                                    <div class="controls">
                                        <select  name="spotlightType">
                                            <option value="single" @if($spotlightType == 'single')  selected="selected" @endif >Single</option>
                                            <option value="double"  @if($spotlightType == 'double')  selected="selected" @endif>Double</option>
                                        </select>
                                    </div>    
                                </div> <!-- /controls -->


                                 <div class="control-group">
                                    <label class="control-label" for="spotlight">SpotLight</label>
                                    <div class="controls">
                                        <select  name="spotlight">
                                            <option value="enable" @if($spotlight == 'enable')  selected="selected" @endif >Enable</option>
                                            <option value="disable"  @if($spotlight == 'disable')  selected="selected" @endif>Disable</option>
                                        </select>
                                    </div>    
                                </div> <!-- /controls -->

                                <div class="control-group">
                                    <label class="control-label" for="riseup">Rise Up in Search</label>
                                    <div class="controls">
                                        <select  name="riseup">
                                            <option value="enable" @if($riseup == 'enable')  selected="selected" @endif >Enable</option>
                                            <option value="disable"  @if($riseup == 'disable')  selected="selected" @endif>Disable</option>
                                        </select>
                                    </div>    
                                </div> <!-- /controls -->

                                <div class="control-group">
                                    <label class="control-label" for="superpower">Superpowers</label>
                                    <div class="controls">
                                        <select  name="superpower">
                                            <option value="enable" @if($superpower == 'enable')  selected="selected" @endif >Enable</option>
                                            <option value="disable"  @if($superpower == 'disable')  selected="selected" @endif>Disable</option>
                                        </select>
                                    </div>    
                                </div> <!-- /controls -->

                                <div class="control-group">
                                    <label class="control-label" for="superpowerInvisiblity">Superpower Invisibility</label>
                                    <div class="controls">
                                        <select  name="superpowerInvisiblity">
                                            <option value="enable" @if($superpowerInvisiblity == 'enable')  selected="selected" @endif >Enable</option>
                                            <option value="disable"  @if($superpowerInvisiblity == 'disable')  selected="selected" @endif>Disable</option>
                                        </select>
                                    </div>    
                                </div> <!-- /controls -->

                                <div class="control-group">
                                    <label class="control-label" for="superpowerMode">Superpower Mode</label>
                                    <div class="controls">
                                        <select  name="superpowerMode">
                                            <option value="global" @if($superpowerMode == 'global')  selected="selected" @endif >Global</option>
                                            <option value="country" @if($superpowerMode == 'country')  selected="selected" @endif >Country Based</option>
                                            <option value="city"  @if($superpowerMode == 'city')  selected="selected" @endif>City Based</option>
                                        </select>
                                    </div>    
                                </div> <!-- /controls --> 


                             <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div> <!-- /form-actions -->
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
                         <h3> Feature Cost </h3>
                    </div>

                    <!-- /widget-header -->
                      <!-- widget-content -->
                     <div class="widget-content">
                       @if(Session::has('success_cost'))
                         <div class="alert alert-success">{{ Session::get('success_cost') }}</div>
                       @endif
                        <form action="{{ URL::to('admin/premiumfeatures/featurecost') }}" method="post" id="edit-profile" class="form-horizontal">
                                <br />
                                <div class="control-group">
                                    <label class="control-label" for="superpower_credits">Superpower</label>
                                    <div class="controls">
                                        <input type="number" class="span4" id="superpower_credits" name="superpower_credits" placeholder="Credits" value="{{$superpower_credits}}">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="control-group">
                                    <label class="control-label" for="riseup_credits">Rise Up</label>
                                    <div class="controls">
                                        <input type="number" class="span4" id="riseup_credits" name="riseup_credits" placeholder="Credits" value="{{$riseup_credits}}">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="control-group">
                                    <label class="control-label" for="spotlight_credits">Spotlight</label>
                                    <div class="controls">
                                        <input type="number" class="span4" id="spotlight_credits" name="spotlight_credits" placeholder="Credits" value="{{$spotlight_credits}}">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Save</button>
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