@extends('admin.layouts.master')


@section('content')



<div class="row">
            <div class="span6">
                <div class="widget widget-nopad">
                     <!-- widget-header -->
                    <div class="widget-header">
                        <i class="icon-list-alt"></i>
                         <h3>Email Configurations </h3>
                    </div>
                    <!-- /widget-header -->
                      <!-- widget-content -->
                     <div class="widget-content">
                       @if(Session::has('configupdated'))
                         <div class="alert alert-success">{{ Session::get('configupdated') }}</div>
                       @endif
                        <form action="{{ URL::to('admin/emails/updateemailconfig') }}" method="post" id="edit-profile" class="form-horizontal">
                                <br />

                                <div class="control-group">
                                    <label class="control-label" for="host">SMTP Host</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="host" name="host" placeholder="SMTP Host" value="{{$host}}">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->


                                <div class="control-group">
                                    <label class="control-label" for="port">Port</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="port" name="port" placeholder="Port" value="{{$port}}">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->


                                <div class="control-group">
                                    <label class="control-label" for="username">Email Username</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="username" name="username" placeholder="Email Username" value="{{$username}}">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->


                                <div class="control-group">
                                    <label class="control-label" for="password">Password</label>
                                    <div class="controls">
                                        <input type="password" class="span4" id="password" name="password" placeholder="Password" value="{{$password}}">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->


                                <div class="control-group">
                                    <label class="control-label" for="encryption">Encryption</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="encryption" name="encryption" placeholder="Encryption" value="{{$encryption}}">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->


                                <div class="control-group">
                                    <label class="control-label" for="from_email">From Email</label>
                                    <div class="controls">
                                        <input type="text" class="span4" id="email" name="from_email" placeholder="From Email" value="{{$from_email}}">
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->



                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div> <!-- /form-actions -->

                                 @if(Session::has('errors'))
                                      <span style="color: red;"> {{ $errors->first('email'); }} </span><br>
                                      <span style="color: red;"> {{ $errors->first('password'); }} </span><br>
                                      <span style="color: red;"> {{ $errors->first('password_confirm'); }} </span>
                                 @endif

                        </form><!-- /form -->

                    </div>  <!-- /widget content -->
                 </div>
                 <!-- /widget -->
            </div>
            <!-- /span6 -->


            <div class="span6">
                <div class="widget widget-nopad">
                     <!-- widget-header -->

                    

                    <div class="widget-header">
                        <i class="icon-list-alt"></i>
                         <h3> Email Notifications </h3>
                    </div>
                    <!-- /widget-header -->
                      <!-- widget-content -->

                     <div class="widget-content">
                        @if(Session::has('settingupdated'))
                            <div class="alert alert-success">{{ Session::get('settingupdated') }}</div>
                        @endif
                        <form action="{{ URL::to('admin/emails/updateemailnotification') }}" method="post" id="edit-profile" class="form-horizontal">
                                <br />

                                <div class="control-group">
                                    <label class="control-label" for="title">When a user visits another profile  </label>
                                    <div class="controls">
                                        <select class="span4" name="profilevisitor">
                                            <option value="1"  @if($profilevisitor == '1')  selected="selected" @endif  >Enable</option>
                                            <option value="0"  @if($profilevisitor == '0')  selected="selected" @endif  >Disable</option>
                                        </select>
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->


                                <div class="control-group">
                                    <label class="control-label" for="title">User wants to meet another user </label>
                                    <div class="controls">
                                        <select class="span4" name="wantstomeet">
                                            <option value="1" @if($wantstomeet == '1')  selected="selected" @endif >Enable</option>
                                            <option value="0"  @if($wantstomeet == '0')  selected="selected" @endif >Disable</option>
                                        </select>
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->


                                <div class="control-group">
                                    <label class="control-label" for="title">When mutual attraction occurs  </label>
                                    <div class="controls">
                                        <select class="span4" name="mutualattraction">
                                            <option value="1" @if($mutualattraction == '1')  selected="selected" @endif >Enable</option>
                                            <option value="0" @if($mutualattraction == '0')  selected="selected" @endif  >Disable</option>
                                        </select>
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->


                                <div class="control-group">
                                    <label class="control-label" for="title">When a user adds another user as a contact </label>
                                    <div class="controls">
                                        <select class="span4" name="addcontact">
                                            <option value="1" @if($addcontact == '1')  selected="selected" @endif >Enable</option>
                                            <option value="0" @if($addcontact == '0')  selected="selected" @endif >Disable</option>
                                        </select>
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->


                                <div class="control-group">
                                    <label class="control-label" for="title">When a user sends a gift  </label>
                                    <div class="controls">
                                        <select class="span4" name="sendgift">
                                            <option value="1"  @if($sendgift == '1')  selected="selected" @endif >Enable</option>
                                            <option value="0" @if($sendgift == '0')  selected="selected" @endif >Disable</option>
                                        </select>
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->


                                <div class="control-group">
                                    <label class="control-label" for="title">User messages another user  </label>
                                    <div class="controls">
                                        <select class="span4" name="message">
                                            <option value="1" @if($message == '1')  selected="selected" @endif >Enable</option>
                                            <option value="0" @if($message == '0')  selected="selected" @endif >Disable</option>
                                        </select>
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->


                                <div class="control-group">
                                    <label class="control-label" for="title">Admin disables a user </label>
                                    <div class="controls">
                                        <select class="span4" name="disableuser">
                                            <option value="1" @if($disableuser == '1')  selected="selected" @endif >Enable</option>
                                            <option value="0" @if($disableuser == '0')  selected="selected" @endif >Disable</option>
                                        </select>
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->



                                <div class="control-group">
                                    <label class="control-label" for="title">Admin deletes a user </label>
                                    <div class="controls">
                                        <select class="span4" name="deleteuser">
                                            <option value="1" @if($deleteuser == '1')  selected="selected" @endif >Enable</option>
                                            <option value="0" @if($deleteuser == '0')  selected="selected" @endif >Disable</option>
                                        </select>
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->



                                <div class="control-group">
                                    <label class="control-label" for="title">Admin deletes a photo</label>
                                    <div class="controls">
                                        <select class="span4" name="deletephoto">
                                            <option value="1" @if($deletephoto == '1')  selected="selected" @endif >Enable</option>
                                            <option value="0" @if($deletephoto == '0')  selected="selected" @endif >Disable</option>
                                        </select>
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->



                                <div class="control-group">
                                    <label class="control-label" for="title">When a user comments on another user's photo</label>
                                    <div class="controls">
                                        <select class="span4" name="commentphoto">
                                            <option value="1"  @if($commentphoto == '1')  selected="selected" @endif >Enable</option>
                                            <option value="0" @if($commentphoto == '0')  selected="selected" @endif >Disable</option>
                                        </select>
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->


                                <div class="control-group">
                                    <label class="control-label" for="title">When a user rates on another user's photo</label>
                                    <div class="controls">
                                        <select class="span4" name="ratephoto">
                                            <option value="1" @if($ratephoto == '1')  selected="selected" @endif >Enable</option>
                                            <option value="0" @if($ratephoto == '0')  selected="selected" @endif >Disable</option>
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










@stop




@section('custom-js')



@stop