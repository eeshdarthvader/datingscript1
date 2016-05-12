@extends('admin.layouts.master')







@section('content')

    <div class="row">
            <div class="span6">
                <div class="widget widget-nopad">
                     <!-- widget-header -->
                    <div class="widget-header">
                        <i class="icon-list-alt"></i>
                         <h3> Seo Settings </h3>
                    </div>
                    <!-- /widget-header -->
                      <!-- widget-content -->
                     <div class="widget-content">
                       @if(Session::has('successseo'))
                         <div class="alert alert-success">{{ Session::get('successseo') }}</div>
                       @endif
                        <form action="{{ URL::to('seo/createseo') }}" method="post" id="edit-profile" class="form-horizontal">
                                <br />
                                <div class="control-group">
                                    <label class="control-label" for="description">Description</label>
                                    <div class="controls">
                                        <textarea class="span4" id="description" name="description" > {{ $description }}  </textarea>
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="control-group">
                                    <label class="control-label" for="keywords">Keywords</label>
                                    <div class="controls">
                                        <textarea class="span4" id="keywords" name="keywords" > {{ $keywords }}  </textarea>
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                  <div class="control-group">
                                        <label class="control-label" for="title">Block content access to search engines</label>
                                        <div class="controls">
                                            <select class="span4" name="mode">
                                                <option value="no" @if($isSearchEngineAccess == 'no')  selected="selected" @endif >No</option>
                                                <option value="yes"  @if($isSearchEngineAccess == 'yes')  selected="selected" @endif>Yes</option>
                                            </select>
                                        </div> <!-- /controls -->
                                  </div> <!-- /control-group -->


                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button class="btn">Cancel</button>
                                </div> <!-- /form-actions -->

                                 @if(Session::has('errors'))
                                      <span style="color: red;"> {{ $errors->first('description'); }} </span><br>
                                      <span style="color: red;"> {{ $errors->first('keywords'); }} </span>
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