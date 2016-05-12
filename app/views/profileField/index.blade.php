@extends('admin.layouts.master')


@section('content')


<div class="row">
    <div class="span6">
        <div class="widget widget-nopad">
             <!-- widget-header -->
            <div class="widget-header">
                <i class="icon-list-alt"></i>
                 <h3> Add Profile Field Section </h3>
            </div>
            <!-- /widget-header -->
              <!-- widget-content -->
             <div class="widget-content">
               @if(Session::has('successsection'))
                 <div class="alert alert-success">{{ Session::get('successsection') }}</div>
               @endif

                <form action="{{ URL::to('profilefields/addfieldsection') }}" method="post" id="edit-profile" class="form-horizontal">
                        <br />
                        <div class="control-group">
                            <label class="control-label" for="sectiontitle">Title</label>
                            <div class="controls">
                                <input type="text" class="span4" id="sectiontitle" name="sectiontitle" >
                            </div> <!-- /controls -->
                        </div> <!-- /control-group -->

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div> <!-- /form-actions -->
                </form><!-- /form -->

            </div>  <!-- /widget content -->
         </div>
         <!-- /widget -->
    </div>
    <!-- /span6 -->


</div>
<!-- /row -->

  

@if(!$section_empty)

  <div class="row">
      <div class="span6">
          <div class="widget widget-nopad">
               <!-- widget-header -->
              <div class="widget-header">
                  <i class="icon-list-alt"></i>
                   <h3> Add Field to Section </h3>
              </div>
              <!-- /widget-header -->
                <!-- widget-content -->
               <div class="widget-content">
                 @if(Session::has('successfield'))
                   <div class="alert alert-success">{{ Session::get('successfield') }}</div>
                 @endif

                  <form action="{{ URL::to('profilefields/addfield') }}" method="post" id="edit-profile" class="form-horizontal">
                          <br />
                          <div class="control-group">
                              <label class="control-label" for="fieldtitle">Title</label>
                              <div class="controls">
                                  <input type="text" class="span4" id="fieldtitle" name="fieldtitle" >
                              </div> <!-- /controls -->
                          </div> <!-- /control-group -->

                          <div class="control-group">
                              <label class="control-label" for="section">Section</label>
                              <div class="controls">
                                <select class="span4" name="section">
                                  @foreach($sections as $section)
                                    <option value="{{ $section->id }}">{{ $section->name }}</option>
                                  @endforeach
                                </select>
                              </div> <!-- /controls -->
                          </div> <!-- /control-group -->

                          <div class="control-group">
                              <label class="control-label" for="fieldtype">Field Type</label>
                              <div class="controls">
                                <select class="span4" name="fieldtype">
                                    <option value="text">Textbox</option>
                                    <option value="dropdown">Dropdown</option>
                                     <option value="checkbox">Checkbox</option>

                                  </select>
                              </div> <!-- /controls -->
                          </div> <!-- /control-group -->

                          <div class="form-actions">
                              <button type="submit" class="btn btn-primary">Create</button>
                          </div> <!-- /form-actions -->
                  </form><!-- /form -->

              </div>  <!-- /widget content -->
           </div>
           <!-- /widget -->
      </div>
      <!-- /span6 -->


  </div>
  <!-- /row -->

@endif





<div class="row">
    <div class="span12">
        <div class="widget widget-nopad">
             <!-- widget-header -->
            <div class="widget-header">
                <i class="icon-list-alt"></i>
                 <h3> Sections </h3>
            </div>
            <!-- /widget-header -->
              <!-- widget-content -->
             <div class="widget-content">
               @if(Session::has('successoption'))
                 <div class="alert alert-success">{{ Session::get('successoption') }}</div>
               @endif


              
              <div class="control-group">
                  
                  <div class="controls">
                                                
                    <div class="accordion" id="accordion2">

                       @foreach($sections as $section)

                        <div class="accordion-group">
                          <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" href="#{{ $section->code }}" data-parent="#accordion2" >{{ $section->name }}</a>
                    
                              <a href="javascript:;" class="pull-right delete_section" style="margin-top: -30px;margin-right: 10px;color:red;" data-section="{{ $section->id }}">
                                <i class="icon-trash"></i>
                              </a>
                            
                          </div>
                          
                          <div id="{{ $section->code }}" class="accordion-body collapse">
                            <div class="accordion-inner">

                              <table class="table table-striped table-bordered">
                                 <thead>
                                    <tr>
                                      <th>Field Name</th>
                                      <th>Field Type</th>
                                      <th>Field Options</th>
                                    </tr>
                                  </thead>   
                                  <tbody>

                                    @foreach($section->fields as $field)
                                      <tr>
                                        <td>
                                          {{ $field->name }}
                                          <a href="javascript:;" class="delete_field" style="color:red;margin-right: 10px;" data-field="{{ $field->id }}">
                                            <i class="icon-trash"></i>
                                          </a>
                                        </td>
                            
                                        <td>{{ $field->type }}</td>

                                        @if($field->type == "text" || $field->type == 'checkbox')

                                          <td>-</td>

                                        @else

                                          <td>
                                            <ul>
                                              @foreach($field->options as $option)

                                                <li>
                                                  {{ $option->name }}
                                                  <a href="javascript:;" class="delete_field_option" style="color:red;margin-right: 10px;" data-option="{{ $option->id }}">
                                                    <i class="icon-trash"></i>
                                                  </a>
                                                </li>


                                              @endforeach
                                            </ul>

                                            <form action="{{URL::to('/profilefields/addfieldoption')}}"  class="form-horizontal" method="post">
                                              <input type="text" name="optiontitle" />
                                              <input type="hidden" name="field" value="{{ $field->id }}" />
                                              <input type="submit" class="btn btn-success" value="Add" />
                                            </form>
                                          </td>

                                        @endif
                            

                                      </tr>
                                    @endforeach

                                  </tbody>
                                </table>

                            </div>
                          </div>
                        </div>
                            
                      @endforeach                               
                    </div>
                </div> <!-- /controls --> 
              </div> 





            </div>  <!-- /widget content -->
         </div>
         <!-- /widget -->
    </div>
    <!-- /span6 -->


</div>
<!-- /row -->




      

</div>


@stop




@section('custom-js')


<script type="text/javascript">

$(function  () {
  $('.delete_section').click(function(){
    var section_id = $(this).data('section');
    $.post("{{URL::to('/profilefields/deletesection')}}",{ id: section_id}, function(){
      location.reload();
    });
  });
  $('.delete_field').click(function(){
    var field_id = $(this).data('field');
    $.post("{{URL::to('/profilefields/deletefield')}}",{ id: field_id}, function(){
      location.reload();
    });
  });
  $('.delete_field_option').click(function(){
    var option_id = $(this).data('option');
    $.post("{{URL::to('/profilefields/deletefieldoption')}}",{ id: option_id }, function(){
      location.reload();
    });
  });
});
</script>




@stop