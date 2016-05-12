@extends('admin.layouts.master')


@section('content')

<div class="row">
    <div class="span6">
        <div class="widget widget-nopad">
             <!-- widget-header -->

            @if(Session::has('disabled'))
                <div class="alert alert-link">{{ Session::get('disabled') }}</div>
             @endif

            <div class="widget-header">
                <i class="icon-list-alt"></i>
                 <h3> Rewards Control </h3>
            </div>
            <!-- /widget-header -->
              <!-- widget-content -->

             <div class="widget-content">
                <form action="{{ URL::to('rewards/updaterewardsettings') }}" method="post" id="edit-profile" class="form-horizontal">
                        <br />
                        @if(Session::has('enabled'))
                            <div class="alert alert-success">{{ Session::get('enabled') }}</div>
                         @endif

                        <div class="control-group">
                            <label class="control-label" for="title">Rewards</label>
                            <div class="controls">
                                <select class="span4" name="isrewards">
                                    <option value="1" @if($isrewards == '1')  selected="selected" @endif >Enable</option>
                                    <option value="0"  @if($isrewards == '0')  selected="selected" @endif>Disable</option>
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

@if($isrewards == 1)


<div class="row">
   <!-- /widget -->
    <div class="span12">
         @if(Session::has('rewards_topup_disabled'))
                        <div class="alert alert-link">{{ Session::get('rewards_topup_disabled') }}</div>
         @elseif(Session::has('rewards_disabled'))
                        <div class="alert alert-link">{{ Session::get('rewards_disabled') }}</div>
         @endif
          <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Reward Details</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Reason</th>
                    <th> Credits </th>
                    <th class="td-actions"> Action</th>
                  </tr>
                </thead>
                <tbody>

                <form action="{{url('rewards/updaterewards')}}"  class="form-horizontal" method="post">

                  <tr>
                  @foreach($rewards as $reward)

                    <td> {{ $reward->reason }} </td>
                    <td><input class="span2" type="text" name="credits{{$reward->id}}" value="{{ $reward->credits }}">  </td>
                    <td class="td-actions">
                       <select class="span2" name="isenable{{$reward->id}}" >
                           <option value="1" @if($reward->status == '1')  selected="selected" @endif >Enable</option>
                           <option value="0" @if($reward->status == '0')  selected="selected" @endif>Disable</option>
                       </select>
                    </td>
                  @endforeach
                  </tr>

                </tbody>
              </table>

            </div>
            <!-- /widget-content -->

              <div class="form-actions">
                                  <button type="submit" class="btn btn-primary">Update</button>
              </div> <!-- /form-actions -->

          </form>

          </div>
          <!-- /widget -->

    </div>
</div>

@endif





@stop




@section('custom-js')



@stop