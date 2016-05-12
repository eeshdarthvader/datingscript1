@extends('admin.layouts.master')


@section('content')



  <div class="row">

            <div class="span12">

                <div class="widget ">

                    <div class="widget-header">
                        <i class="icon-user"></i>
                        <h3>Unseen Reports</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">

                        <table id="example" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Reporting User</th>
                                        <th>Reported User</th>
                                        <th style="width:40%" >Reason</th>
                                        <th style="width:10%">Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($unseenreports as $reports)
                                    <tr>
                                        <td>
                                        @if($reports->reportinguser)
                                            <a class="hidden-phone" href="{{ $reports->reportinguser->profile_url()}}">
                                                <img src="{{$reports->reportinguser->thumbnailPhoto()}}" alt="" height="45px" width="45px" />
                                                {{$reports->reportinguser->first_name}}
                                            </a>
                                        @else
                                            deleted user
                                        @endif
                                        </td>


                                        <td>
                                        @if($reports->reporteduser)
                                               <a class="hidden-phone" href="{{ $reports->reporteduser->profile_url()}}">
                                                   <img src="{{$reports->reporteduser->thumbnailPhoto()}}" alt="" height="45px" width="45px" />
                                                   {{$reports->reporteduser->first_name}}
                                               </a>
                                        @else
                                               deleted user
                                        @endif
                                        </td>




                                       <td>{{$reports->reason}}</td>
                                        <td>
                                        <a href="{{ URL::to('admin/abuse/seen/'.$reports->id) }}"  onclick="return confirm('Are you sure you want to mark this as a Seen Report ?')" style="font-size: 10px;"  type="submit" class="btn btn-info btn-mini">Mark Seen</a>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>


                    </div> <!-- /widget-content -->

                </div> <!-- /widget -->

            </div> <!-- /span8 -->

          </div> <!-- /row -->


 <div class="row">

            <div class="span12">

                <div class="widget ">

                    <div class="widget-header">
                        <i class="icon-user"></i>
                        <h3>Seen Reports</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">

                        <table id="example2" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Reporting User</th>
                                        <th>Reported User</th>
                                        <th style="width:40%" >Reason</th>
                                        <th style="width:10%">Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($seenreports as $reports)
                                    <tr>
                                        <td>
                                        @if($reports->reportinguser)
                                            <a class="hidden-phone" href="{{ $reports->reportinguser->profile_url()}}">
                                                <img src="{{$reports->reportinguser->thumbnailPhoto()}}" alt="" height="45px" width="45px" />
                                                {{$reports->reportinguser->first_name}}
                                            </a>
                                        @else
                                            deleted user
                                        @endif
                                        </td>


                                        <td>
                                        @if($reports->reporteduser)
                                               <a class="hidden-phone" href="{{ $reports->reporteduser->profile_url()}}">
                                                   <img src="{{$reports->reporteduser->thumbnailPhoto()}}" alt="" height="45px" width="45px" />
                                                   {{$reports->reporteduser->first_name}}
                                               </a>
                                        @else
                                               deleted user
                                        @endif
                                        </td>

                                       <td>{{$reports->reason}}</td>
                                        <td>
                                        <a href="{{ URL::to('admin/abuse/unseen/'.$reports->id) }}" onclick="return confirm('Are you sure you want to mark this as an Unseen Report ?')" style="font-size: 10px;"  type="submit" class="btn btn-info btn-mini">Mark Unseen</a>
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




@section('custom-js')

<script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable()

});

$(document).ready(function() {
    $('#example2').DataTable()

});

</script>



@stop