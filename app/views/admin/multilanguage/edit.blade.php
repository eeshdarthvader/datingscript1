@extends('admin.layouts.master')


@section('content')

    <div class="row">

        <div class="span12">

            <div class="widget ">

                <div class="widget-header">
                    <h3>Vocabulary</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    @if(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    @if(!$is_writable)
						<div class="alert alert-error">
								{{ $lang_path }} is not writable. Please make it writable. <button class="btn yellow btn-small" onclick="window.location.reload();">Check Again</button>
						</div>
					@endif

					<form action="{{URL::to('admin/multilanguage/editlanguage')}}" id="form-general" class="form-horizontal" method="post">
						<input type="hidden" name="l" value="{{ $l }}" />

						<table class="table table-striped table-bordered">
							<tbody>
								@foreach($language as $l)
									<tr>
										<td>{{ $l->left_lang }}</td>
										<td>
											@if(!$is_writable)
												<textarea name="{{ $l->mcode }}"  disabled>{{ $l->right_lang }}</textarea>
		
											@else
												<textarea name="{{ $l->mcode }}">{{ $l->right_lang }}</textarea>
											@endif
										</td>
									</tr>
								@endforeach
											
							</tbody>
						</table>

						<div class="form-actions">
							@if(!$is_writable)
								<button type="submit" class="btn green" disabled>Update</button>
							@else
								<button type="submit" class="btn green">Update</button>	
							@endif
						
						</div>
					</form>
                   
                </div> <!-- /widget-content -->

            </div> <!-- /widget -->

        </div> <!-- /span -->

    </div> <!-- /row -->


@stop
