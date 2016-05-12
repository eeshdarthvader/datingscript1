@extends('admin.layouts.master')


@section('content')

    <div class="row">
            <div class="span6">
                <div class="widget widget-nopad">
                     <!-- widget-header -->
                    <div class="widget-header">
                        <i class="icon-list-alt"></i>
                         <h3> Select Default Lanaguage </h3>
                    </div>
                    <!-- /widget-header -->
                      <!-- widget-content -->
                     <div class="widget-content">
                       @if(Session::has('success'))
                         <div class="alert alert-success">{{ Session::get('success') }}</div>
                       @endif
                       
                        <form action="{{ URL::to('admin/multilanguage/settings') }}" method="post" id="sendmsg" class="form-horizontal">
                                <br />
                                

                                

                                <div class="control-group">
                                    <label class="control-label" for="default_language">Default Lanaguage</label>
                                    <div class="controls">
										{{ Form::select('default_language',$user_languages,$default_language, array("class"=>"span3 select2")) }}
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

    <div class="row">

        <div class="span12">

            <div class="widget ">

                <div class="widget-header">
                    <h3>Languages Selectable By User</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    @if(Session::has('user_language_updated'))
                        <div class="alert alert-success">{{ Session::get('user_language_updated') }}</div>
                    @endif
                    @if(Session::has('default_language'))
                         <div class="alert alert-error">{{ Session::get('default_language') }}</div>
                    @endif

					<form action="{{URL::to('/admin/multilanguage/userlanguages')}}" id="form-general" class="form-horizontal" method="post">
						<table class="table table-striped table-bordered">
							<tbody>
								@foreach($all_languages as $k => $v)
									<tr>
										<td>{{ $k }}</td>
										<td>{{ Form::checkbox("$k", "$v", $v) }}</td>
										<td><a href="{{ url('admin/multilanguage/edit/'.$k) }}">Edit Vocabulary</a></td>
									</tr>
								@endforeach
											
							</tbody>
						</table>

						<div class="form-actions">
							<button type="submit" class="btn green">Update</button>
						</div>
					</form>
                   
                </div> <!-- /widget-content -->

            </div> <!-- /widget -->

        </div> <!-- /span -->

    </div> <!-- /row -->


       
@stop







@section('custom-js')


@stop


