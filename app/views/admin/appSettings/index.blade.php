@extends('admin.layouts.master')


@section('content')
<div class="row">
    <div class="span6">
        <div class="widget widget-nopad">
             <!-- widget-header -->
            <div class="widget-header">
                <i class="icon-list-alt"></i>
                 <h3> General </h3>
            </div>
            <!-- /widget-header -->
              <!-- widget-content -->
             <div class="widget-content">
               @if(Session::has('success'))
                 <div class="alert alert-success">{{ Session::get('success') }}</div>
               @endif

                <form action="{{ URL::to('admin/app_settings/generals') }}" method="post" id="edit-profile" class="form-horizontal">
                        <br />
                        <div class="control-group">
                            <label class="control-label" for="title">WebSite Title</label>
                            <div class="controls">
                                <input type="text" class="span4" id="title" name="title" placeholder="Web Site Title" value="{{ $siteTitle }}">
                            </div> <!-- /controls -->
                        </div> <!-- /control-group -->

                        <div class="control-group">
                            <label class="control-label" for="title">Maintenance Mode</label>
                            <div class="controls">
                                <select class="span4" name="mode">
                                    <option value="1" @if($mode == '1')  selected="selected" @endif >No</option>
                                    <option value="0"  @if($mode == '0')  selected="selected" @endif>Yes</option>
                                </select>
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
<!-- /row -->


      <div class="row">




      <div class="span6">

             <div class="widget widget-nopad">

                       <div class="widget-header">
                           <i class="icon-picture"></i>
                            <h3> Site Logo </h3>
                       </div>
                       <!-- /widget-header -->

                        <div class="widget-content"> <br />
                            @if( $sitelogourl == null )
                                <div class="alert alert-danger">Application currently doesnt have any logo</div>
                            @else
                            @if(Session::has('successpic')) <div class="alert alert-success">{{ Session::get('successpic') }}</div> @endif
                                <div class="shortcuts">
                                        <p>Current Logo</p>
                                        <img src="{{URL::to('/uploads/app/'.$sitelogourl )}}" width="200px"  /> <br>
                                         <a type="submit" onclick="return confirm('Are you sure you want to delete the logo ?')"  href="{{ URL::to('admin/app_settings/deletelogo') }}" class="btn btn-danger">Delete Photo</a>
                                </div>
                            @endif

                               <form id="edit-profile" class="form-horizontal" action="{{ URL::to('admin/app_settings/uploadlogo') }}" method="post" enctype="multipart/form-data">
                                       <br />
                                       <div class="control-group">
                                           <div class="controls">
                                               <input type="file" class="span4" id="title" name="site_logo" placeholder="Web Site Title">
                                           </div> <!-- /controls -->
                                       </div> <!-- /control-group -->


                                       <div class="form-actions">
                                           <button type="submit" class="btn btn-primary">Upload</button>
                                       </div> <!-- /form-actions -->
                               </form>
                               @if(Session::has('errors'))
                                      <span style="color: red;"> {{ $errors->first('site_logo'); }} </span><br>
                                 @endif


                       </div>  <!-- /widget content -->
             </div>
                 <!-- /widget -->
       </div>
         <!-- /span6 -->


      <div class="span6">

             <div class="widget widget-nopad">

                       <div class="widget-header">
                           <i class="icon-picture"></i>
                            <h3> Site Favicon </h3>
                       </div>
                       <!-- /widget-header -->

                        <div class="widget-content"> <br />
                            @if( $sitefaviconurl == null )
                                <div class="alert alert-danger">Application currently doesnt have any favicon</div>
                            @else
                            @if(Session::has('successfav')) <div class="alert alert-success">{{ Session::get('successfav') }}</div> @endif
                                <div class="shortcuts">
                                        <p>Current Favicon</p>
                                        <img src="{{URL::to('/uploads/app/'.$sitefaviconurl )}}" width="200px"  /> <br>
                                         <a type="submit" onclick="return confirm('Are you sure you want to delete the favicon?')"  href="{{ URL::to('admin/app_settings/deletefavicon') }}" class="btn btn-danger">Delete Photo</a>
                                </div>
                            @endif

                               <form id="edit-profile" class="form-horizontal" action="{{ URL::to('admin/app_settings/uploadfavicon') }}" method="post" enctype="multipart/form-data">
                                       <br />
                                       <div class="control-group">
                                           <div class="controls">
                                               <input type="file" class="span4" id="title" name="site_favicon" placeholder="Web Site Title">
                                           </div> <!-- /controls -->
                                       </div> <!-- /control-group -->


                                       <div class="form-actions">
                                           <button type="submit" class="btn btn-primary">Upload</button>
                                       </div> <!-- /form-actions -->
                               </form>

                                @if(Session::has('errors'))
                                      <span style="color: red;"> {{ $errors->first('site_favicon'); }} </span><br>
                                 @endif


                       </div>  <!-- /widget content -->
             </div>
                 <!-- /widget -->
       </div>
         <!-- /span6 -->





      </div>




@stop




@section('custom-js')



@stop