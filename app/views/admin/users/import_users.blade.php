@extends('admin.layouts.master')


@section('content')




    <div class="row">
            <div class="span6">
                <div class="widget widget-nopad">
                     <!-- widget-header -->
                    <div class="widget-header">
                        <i class="icon-list-alt"></i>
                         <h3> Add Gifts</h3>
                    </div>
                    <!-- /widget-header -->
                      <!-- widget-content -->
                     <div class="widget-content">
                       @if(Session::has('success'))
                         <div class="alert alert-success">{{ Session::get('success') }}</div>
                       @endif
                        <form action="{{ URL::to('admin/users/importusers') }}" method="post"  class="form-horizontal" enctype="multipart/form-data">
                                <br />
                                
                                  <div class="control-group">
                                       <label class="control-label" for="file">Upload Excel File</label>
                                       <div class="controls">
                                           <input type="file" class="span4" id="file" name="file" >
                                       </div> <!-- /controls -->
                                   </div> <!-- /control-group -->

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Upload</button>
                                    <button class="btn">Cancel</button>
                                </div> <!-- /form-actions -->

                                 @if(Session::has('errors'))
                                      <span style="color: red;"> {{ $errors->first('file'); }} </span><br>
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

<script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable()

});

</script>


@stop