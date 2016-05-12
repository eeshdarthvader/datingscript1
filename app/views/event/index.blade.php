@extends('admin.layouts.master')


@section('content')




    <div class="row">
            <div class="span6">
                <div class="widget widget-nopad">
                     <!-- widget-header -->
                    <div class="widget-header">
                        <i class="icon-list-alt"></i>
                         <h3>Create Events</h3>
                    </div>
                    <!-- /widget-header -->
                      <!-- widget-content -->
                     <div class="widget-content">
                       @if(Session::has('success'))
                         <div class="alert alert-success">{{ Session::get('success') }}</div>
                       @endif
                        <form action="{{ URL::to('events/createevent') }}" method="post"  class="form-horizontal" enctype="multipart/form-data">
                                <br />
                                <div class="control-group">
                                    <label class="control-label" for="title">Event Title</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="title" name="title" placeholder="Title">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                  <div class="control-group">
                                       <label class="control-label" for="photo">Event Icon</label>
                                       <div class="controls">
                                           <input type="file" class="span4" id="photo" name="photo" >
                                       </div> <!-- /controls -->
                                   </div> <!-- /control-group -->

                                    <div class="control-group">
                                                   <label class="control-label" for="title">Interest Category</label>
                                                   <div class="controls">
                                                       <select class="span4" name="category">
                                                          <option value="-1">Uncategorized </option>
                                                           @foreach($categories as $cats)
                                                           <option value="{{ $cats->id }}"> {{ $cats->name }}</option>
                                                           @endforeach
                                                       </select>
                                                   </div> <!-- /controls -->
                                               </div> <!-- /control-group -->

                                    <div class="control-group">
                                       <label class="control-label" for="writer">Writer</label>
                                       <div class="controls">
                                           <input type="text" class="span4" id="writer" name="writer" placeholder="Writer">
                                       </div> <!-- /controls -->
                                   </div> <!-- /control-group -->
                                          
                                   <div class="control-group">
                                       <label class="control-label" for="writer">Content</label>
                                       <div class="controls" style="margin-top:-30px;margin-right:5px">
                                   <textarea name="content" id="content" class="jqte-test"><b> <u><span style="color:rgb(0, 148, 133);"></span></u></b></textarea>

                                    </div> <!-- /controls -->
                                   </div> <!-- /control-group -->

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                    <button class="btn">Cancel</button>
                                </div> <!-- /form-actions -->

                                 @if(Session::has('errors'))
                                      <span style="color: red;"> {{ $errors->first('title'); }} </span><br>
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
                            <h3>Current Events</h3>
                        </div> <!-- /widget-header -->

                        <div class="widget-content">

                            <table id="example" class="display" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th >Icon Image</th>
                                             <th >Category</th>
                                              <th  >Writer</th>
                                            <th>Content</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($events as $event)
                                        <tr>
                                            <td style="text-align: center;">{{ $event->title }}</td>

                                            <td style="text-align: center;"><img src="{{URL::to('/uploads/events/'.$event->icon_id )}}" width="100px" /> </td>

                                            @if($event->interest_category_id == -1)
                                              <td>Uncategorized</td>
                                            @else
                                              <td style="text-align: center;">{{$event->interestcategory->name}}</td>
                                            @endif
                                            <td style="text-align: center;">{{ $event->writer }}</td>
                                            <td style="text-align: center;">{{ $event->content }}</td>
                                            <td style="text-align: center;">
                                            <a href="{{ URL::to('events/deleteevent/'.$event->id )}}"s onclick="return confirm('Are you sure you want to delete this event ?')" style="font-size: 10px;"  type="submit" class="btn btn-danger btn-mini">Delete</a>
                                            </td>


                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>


                        </div> <!-- /widget-content -->

                    </div> <!-- /widget -->

                </div> <!-- /span8 -->

              </div> <!-- /row -->

@stop

@section('custom-css')

   <link href="{{ asset('assets/admin/css/jquery-te-1.4.0.css') }}" rel="stylesheet">

@stop


@section('custom-js')

 <script type="text/javascript" src="assets/admin/js/jquery-te-1.4.0.min.js" charset="utf-8"></script>



<script>
       $('.jqte-test').jqte();
       
       // settings of status
       var jqteStatus = true;
       $(".status").click(function()
       {
               jqteStatus = jqteStatus ? false : true;
               $('.jqte-test').jqte({"status" : jqteStatus})
       });
</script>

<script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable()

});

</script>


@stop