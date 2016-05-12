@extends('admin.layouts.master')







@section('content')

    <div class="row">
            <div class="span6">
                <div class="widget widget-nopad">
                     <!-- widget-header -->
                    <div class="widget-header">
                        <i class="icon-list-alt"></i>
                         <h3> Send Message </h3>
                    </div>
                    <!-- /widget-header -->
                      <!-- widget-content -->
                     <div class="widget-content">
                       @if(Session::has('success'))
                         <div class="alert alert-success">{{ Session::get('success') }}</div>
                       @endif
                        <form action="{{ URL::to('admin/users/sendmsg') }}" method="post" id="sendmsg" class="form-horizontal">
                                <br />
                                <div class="control-group">
                                    <label class="control-label" for="msg">Enter Message</label>
                                    <div class="controls">
                                        <textarea class="span4" id="msg" name="msg" > </textarea>
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="control-group">
                                    <label class="control-label" for="name">Chat Display Name</label>
                                    <div class="controls">
                                        <input type="text" class="span4" class="span4" id="name" name="name" >
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                                <div class="control-group">
                                    <label class="control-label" for="country">Country</label>
                                    <div class="controls">
                                        {{ Form::select('country',  $country_list) }}
                                    </div> <!-- /controls -->
                                </div> 

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div> <!-- /form-actions -->

                                 @if(Session::has('errors'))
                                      <span style="color: red;"> {{ $errors->first('name'); }} </span><br>
                                      <span style="color: red;"> {{ $errors->first('msg'); }} </span><br>

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
<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=true&libraries=places&language=en"></script>
<script>
$(function(){ 




      var input = $("#country").get(0);

      var options = {   types: ['(countries)'] }
      var autocomplete = new google.maps.places.Autocomplete(input, options);
 
      var input = document.getElementById('country');
      google.maps.event.addDomListener(input, 'keydown', function(e) { 
        if (e.keyCode == 13) { 
            e.preventDefault(); 
        }
      }); 

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        
        var place = autocomplete.getPlace();



        });
})
</script>

@stop