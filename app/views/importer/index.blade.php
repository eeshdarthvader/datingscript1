@extends('admin.layouts.master')



@section('content')

    <div class="row">
            <div class="span6">
                <div class="widget widget-nopad">
                     <!-- widget-header -->
                    <div class="widget-header">
                        <i class="icon-list-alt"></i>
                         <h3> Impoter Fields </h3>
                    </div>
                    <!-- /widget-header -->
                      <!-- widget-content -->
                     <div class="widget-content">
                       @if(Session::has('success'))
                         <div class="alert alert-success">{{ Session::get('success') }}</div>
                       @endif
                        <form action="{{ URL::to('importer/importusers') }}" method="post" id="import" class="form-horizontal" enctype="multipart/form-data">
                                <br />
                                
                                <div class="control-group">
                                    <label class="control-label" for="type">Type of user</label>
                                    <div class="controls">
                                        <select class="span4" name="category">
                                            <option value="0">Users</option>
                                            <option value="1">User Bot</option>
                                            <option value="2">Bot Blueprint</option>
                                        </select>
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="control-group">
                                    <label class="control-label" for="file">Csv or Excel File</label>
                                    <div class="controls">
                                       <input type="file" class="span4" id="file" name="file" >
                                   </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="control-group">
                                    <label class="control-label" for="photo_folder">Profile Photos Folder Name</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="photo_folder" name="photo_folder" placeholder="">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                               

                                <div class="control-group">                                            
                                    <label class="control-label">Password</label>
                                    <div class="controls">
                                        <label class="radio inline">
                                            <input type="radio"  value="0" name="pwd-for" checked>Specify Password
                                        </label>
                                            
                                        <label class="radio inline">
                                            <input type="radio" value="1" name="pwd-for">Password In File
                                        </label>
                                    </div>    <!-- /controls -->
                                </div> <!-- /control-group -->    

                                <div class="control-group" id="pwd_all_users">
                                    <label class="control-label" for="password_all">Password for all Users</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="password_all" name="password_all" placeholder="">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div id="pwd-file-options" style="display:none">

                                <div class="control-group" id="pwd_col_no" >
                                    <label class="control-label" for="password_column">Password Column No</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="password_column" name="password_column" placeholder="column no">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                 <div class="control-group">                                            
                                    <label class="control-label">Password Type</label>
                                    <div class="controls">
                                        <label class="radio inline">
                                            <input type="radio"  value="0" name="pwd-hashed"> Hashed
                                        </label>
                                            
                                        <label class="radio inline">
                                            <input type="radio" value="1" name="pwd-hashed" checked> Not Hashed
                                        </label>
                                    </div>    <!-- /controls -->
                                </div> <!-- /control-group --> 
                                </div>   

                                <div class="control-group">             
                                    <label class="control-label" for="columns_separated">Columns Separated With</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="columns_separated" name="columns_separated" placeholder="">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="control-group">
                                    <label class="control-label" for="id">User Id</label>
                                    <div class="controls">
                                        <input type="number" class="span4" id="id" name="id" placeholder="column no">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="control-group">
                                    <label class="control-label" for="email">Email</label>
                                    <div class="controls">
                                        <input type="number" class="span4" id="email" name="email" placeholder="column no">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                 <div class="control-group">
                                    <label class="control-label" for="fname">First Name</label>
                                    <div class="controls">
                                        <input type="number" class="span4" id="fname" name="fname" placeholder="column no">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                 <div class="control-group">
                                    <label class="control-label" for="lname">Last Name</label>
                                    <div class="controls">
                                        <input type="number" class="span4" id="lname" name="lname" placeholder="column no">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                 <div class="control-group">
                                    <label class="control-label" for="dob">Date of Birth (yyyy-mm-dd)</label>
                                    <div class="controls">
                                        <input type="number" class="span4" id="dob" name="dob" placeholder="column no">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                 <div class="control-group">
                                    <label class="control-label" for="gender">Gender</label>
                                    <div class="controls">
                                        <input type="number" class="span4" id="gender" name="gender" placeholder="column no">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                 <div class="control-group">
                                    <label class="control-label" for="country">Country</label>
                                    <div class="controls">
                                        <input type="number" class="span4" id="country" name="country" placeholder="column no">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="control-group">
                                    <label class="control-label" for="city">City</label>
                                    <div class="controls">
                                        <input type="number" class="span4" id="city" name="city" placeholder="column no">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="control-group">
                                    <label class="control-label" for="lat">Latitude</label>
                                    <div class="controls">
                                        <input type="number" class="span4" id="lat" name="lat" placeholder="column no">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="control-group">
                                    <label class="control-label" for="lng">Longitude</label>
                                    <div class="controls">
                                        <input type="number" class="span4" id="lng" name="lng" placeholder="column no">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                               

                                @if(!$section_empty)


                                    @foreach($sections as $section)

                                        @if(sizeof($section->fields)>0)

                                            <h4><center style="margin-bottom:10px">{{ $section->name }} </center></h4>

                                            @foreach($section->fields as $field)

                                                <div class="control-group">
                                                    <label class="control-label" for="{{ $field->id}}"> {{ $field->name }}</label>
                                                    <div class="controls">
                                                        <input type="number" class="span4" id="{{ $field->id}}" name="{{ $field->id}}" placeholder="column no">
                                                    </div> <!-- /controls -->
                                                </div> <!-- /control-group -->
                        
                                            @endforeach

                                        @endif    

                                    @endforeach        

                                @endif

                                

                             <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div> <!-- /form-actions -->

                        @if(Session::has('errors'))
                            <span style="color: red;"> {{ $errors->first('file'); }} </span><br>
                            <span style="color: red;"> {{ $errors->first('email'); }} </span><br>
                            <span style="color: red;"> {{ $errors->first('fname'); }} </span><br>
                            <span style="color: red;"> {{ $errors->first('dob'); }} </span><br>
                            <span style="color: red;"> {{ $errors->first('country'); }} </span><br>
                            <span style="color: red;"> {{ $errors->first('gender'); }} </span><br>
                            <span style="color: red;"> {{ $errors->first('columns_separated'); }} </span><br>
                            <span style="color: red;"> {{ $errors->first('password_all'); }} </span><br>
                            <span style="color: red;"> {{ $errors->first('password_column'); }} </span><br>

                            
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
       $("input[name='pwd-for']").click(function(){
            if($(this).val() == 1) {
                $('#pwd_all_users').hide();
                $('#pwd-file-options').show();
            } else {
                 $('#pwd_all_users').show();
                $('#pwd-file-options').hide();
            }
            
        });
    });

</script>

@stop