@extends('frontend.layout')

@section('content')

 <div class="col-sm-9">
                        <div class="meeting-game-right-part">
	                        
	                        @if(Session::has('email_changed'))
                            <div id="change-email-success">
                                <div  id="change_email-success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close close-bg" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h2 class="modal-title-change-email-success">
                                                    Check your new email
                                                </h2>
                                                                                              
                                                <h2 class="modal-title-content-change-email-success">
                                                    <small>
                                                        A confirmation email has been sent to our @naver.com. Follow the directions in the <br />
                                                        email to complete this change of email address.
                                                    </small>
                                                </h2>

                                            </div>

                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                            </div>
                            @endif
                            <div class="account-settings-header">
                                <ul class="nav nav-pills acc-settings-ul">
                                    <li class="active"><a href="#" class="navlink">Profile Settings</a></li>
                                    <li><a href="#" class="navlink">Notification settings</a></li>
                                    <li><a href="#" class="navlink">Message settings</a></li>
                                    
                                    <li><a href="#" class="navlink">Invisible mode</a></li>
                                    <li><a href="#" class="navlink">Verified status settings</a></li>
                                    <li><a href="#" class="navlink">Payment settings</a></li>
                                    <li><a href="#" class="navlink">Change password</a></li>
                                    <li><a href="#" class="navlink">Change email address</a></li>
                                    <li><a href="#" class="navlink">Delete profile</a></li>
                                </ul>
                            </div>
                            <div class="container account-settings-content" ng-controller="AccountSettingsController">
	                           
	                            <div id="loading_cnt">
									<div id="loading"></div>
								</div>
								
                                <div class="account-settings-privacy">
                                    <h1><strong> Profile Settings</strong></h1>
                                    <div id="privacy-div">

                                        <br />

                                        <h2>Privacy</h2> <span class="btn-primary btn-xs edit_privacy"> Edit </span>

                                        <div class="table-responsive">
                                            <table class="table">

                                                <tbody>
                                                    <tr>
                                                        <td>Show me online status</td>
                                                        <td ng-if="settings.show_online=='1'"> Yes</td>
                                                        
                                                        <td ng-if="settings.show_online=='0'" > No</td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td>Show my distance</td>
                                                        <td ng-if="settings.show_distance=='1'">Yes </td>
                                                        <td ng-if="settings.show_distance=='0'">No</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Who can view my profile ?</td>
                                                        <td ng-if="settings.view_profile=='anyone'"> Anyone </td> 
                                                        <td ng-if="settings.view_profile!='anyone'">Only Members </td>                                         </tr>

                                                    <!--<tr>
                                                        <td>Sign in security level</td>
                                                        <td>Medium, email saved</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Secure browsing</td>
                                                        <td>Yes</td>
                                                    </tr>


                                                    <tr>
                                                        <td>Lets others find me by my email address</td>
                                                        <td>Yes</td>
                                                    </tr>!-->

                                                    <tr>
                                                        <td>Show me to only to people i like and visit</td>
                                                        <td ng-if="settings.discoverable=='1'">Yes</td>   
                                                        <td ng-if="settings.discoverable=='0'">No </td>     
                                                                                           </tr>

                                                    <tr>
                                                        <td>Lets others share my profile</td>
                                                        <td ng-if="settings.share_my_profile=='1'">Yes</td>
                                                         <td ng-if="settings.share_my_profile=='0'">No</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                    <div id="privacy-div-form" style="display:none">
                                        <form id="privacy-form" ng-submit="submit_privacy(settings)" >
                                            <br />
                                            <h2>Privacy</h2>
                                            <div class="table-responsive">
                                                <table class="table">

                                                    <tbody>
                                                        <tr>
                                                            <td>Show me online status</td>
                                                            <td>
                                                                <label><input type="radio" class="radio-bootstrap" name="show_online" value="1"  ng-checked="show_online_model=='1'" ng-model="settings.show_online">Yes</label>
                                                                <label><input type="radio" class="radio-bootstrap" name="show_online" value="0" ng-checked="show_online_model=='0'" ng-model="settings.show_online">No</label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Show my distance</td>
                                                            <td>
                                                                <label><input type="radio" class="radio-bootstrap"  ng-model="settings.show_distance" name="show_distance" value="1" ng-checked="show_distance_model=='1'">Yes</label>
                                                                <label><input type="radio" class="radio-bootstrap"  ng-model="settings.show_distance"  name="show_distance" value="0" ng-checked="show_distance_model=='0'" >No</label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Who can view my profile ?</td>
                                                            <td>
                                                                <label><input type="radio" class="radio-bootstrap"  ng-model="settings.view_profile"  name="view_profile" value="anyone"  ng-checked="view_profile_model=='anyone'"  >Anyone</label>
                                                                <label><input type="radio" class="radio-bootstrap" ng-model="settings.view_profile" name="view_profile" value="members" ng-checked="view_profile_model=='members'"  >Only members</label>
                                                            </td>
                                                        </tr>

                                                        <!--<tr>
                                                            <td>Sign in security level</td>
                                                            <td>Medium, email saved</td>
                                                        </tr>

                                                        <tr>
                                                            <td>Secure browsing</td>
                                                            <td>

                                                                <label><input type="radio" class="radio-bootstrap" name="securebrowsing">Yes</label>
                                                                <label><input type="radio" class="radio-bootstrap" name="securebrowsing">No</label>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td>Lets others find me by my email address</td>
                                                            <td>
                                                                <label><input type="radio" class="radio-bootstrap" name="findemailaddr">Yes</label>
                                                                <label><input type="radio" class="radio-bootstrap" name="findemailaddr">No</label>
                                                            </td>
                                                        </tr>!-->

                                                        <tr>
                                                            <td>Show me to only to people i like and visit</td>
                                                            <td>
                                                                <label><input type="radio" class="radio-bootstrap"  ng-model="settings.discoverable" name="discoverable" value="1" 
                                                                ng-checked="checkmodeldiscoverable=='1'"  >Yes</label>
                                                                <label><input type="radio" class="radio-bootstrap" ng-model="settings.discoverable"  name="discoverable" value="0" ng-checked="checkmodeldiscoverable=='0'">No</label>

                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Lets others share my profile</td>
                                                            <td>

                                                                <label><input type="radio" class="radio-bootstrap" ng-model="settings.share_my_profile"   name="share_my_profile" value="1" ng-checked="share_my_profile=='1'" >Yes</label>
                                                                <label><input type="radio" class="radio-bootstrap" ng-model="settings.share_my_profile" name="share_my_profile" value="0" ng-checked="share_my_profile=='0'"  >No</label>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <button type="submit" class="save-changes-privacy" ng-click> Save changes</button>
                                            <button type="button" class="cancel-changes-privacy">Cancel</button>
                                            <br />
                                            <br />
                                        </form>
                                    </div>

                                    <div id="Photos-videos-div">

                                        <br />

                                        <h2>Photos and videos</h2> <span class="btn-primary btn-xs edit_photos"> Edit </span>

                                        <div class="table-responsive">
                                            <table class="table">

                                                <tbody>
                                                    <tr>
                                                        <td>Who can comment on your photos and videos?</td>
                                                        <td ng-if="settings.comment_on_photos=='anyone'">Any member with access to album  </td>
                                                        <td ng-if="settings.comment_on_photos!='anyone'"> Only My matches </td>

                                                    </tr>
                                                    <!--<tr>
                                                        <td>Watermarks on your photos and videos</td>
                                                        <td>On</td>
                                                    </tr>!-->

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                    <div id="Photos-videos-div-form" style="display:none">
                                        <form id="Photos-videos-form" ng-submit="submit_photos(settings)">
                                            <br />

                                            <h2>Photos and videos</h2>

                                            <div class="table-responsive">
                                                <table class="table">

                                                    <tbody>
                                                        <tr>
                                                            <td>Who can comment on your photos and videos?</td>
                                                            <td>
                                                                <label for="comment_on_photos" ng-if="settings.comment_on_photos=='anyone'"> Any member with access to album</label>
                                                                <label for="comment_on_photos" ng-if="settings.comment_on_photos!='anyone'">  Only My matches</label>

                                                                
                                                                    
                                                                    <select ng-model="settings.comment_on_photos" ng-app >
    <option ng-selected="settings.comment_on_photos=='anyone'" value="anyone">Any member with access to album</option>
    <option  ng-selected="settings.comment_on_photos=='matches'" value="matches">Only My Matches</option>
    
</select>
                                                               
                                                            </td>
                                                        </tr>
                                                        <!--<tr>
                                                            <td>Watermarks on your photos and videos</td>
                                                            <td>
                                                                <label><input type="radio" class="radio-bootstrap" name="watermarks">On</label>
                                                                <label><input type="radio" class="radio-bootstrap" name="watermarks">Off</label>
                                                            </td>
                                                        </tr>!-->

                                                    </tbody>
                                                </table>
                                            </div>

                                            <button type="submit" class="save-changes-photos" ng-click> Save changes</button>
                                            <button type="button" class="cancel-changes-photos">Cancel</button>
                                            <br />
                                            <br />
                                        </form>
                                    </div>

                                    <div id="Langauge-div">

                                        <br />

                                        <h2>Language</h2> <span class="btn-primary btn-xs edit_Change_lan"> Change </span>

                                        <div class="table-responsive">
                                            <table class="table">

                                                <tbody>
                                                    <tr>
                                                        <td>Your language</td>
                                                        <td>English (United States)</td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                    <div id="Langauge-div-form" style="display:none">
                                        <form id="Langauge-form">
                                            <br />

                                            <h2>Language</h2> <span class="btn-primary btn-xs edit_Change_lan"> Change </span>

                                            <div class="table-responsive">
                                                <table class="table">

                                                    <tbody>
                                                        <tr>
                                                            <td>Your language</td>
                                                            <td>
                                                                <select class="form-control" id="sel2">
                                                                    <option value="eng-us">English (United States)</option>
                                                                    <option value="eng-uk">English (UK)</option>
                                                                </select>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>

                                            <button type="submit" class="save-changes-lang"> Save changes</button>
                                            <button type="button" class="cancel-changes-lang">Cancel</button>
                                            <br />
                                            <br />
                                        </form>
                                    </div>
                                </div>
                                
                                <div class="account-settings-notification" style="display:none">
                                    <h1><strong> Notification Settings</strong></h1>

                                    <div id="notification-div">

                                        <br />

                                        <h2>Email and mobile notifications</h2> <span class="btn-primary btn-xs edit_notification"> Edit </span>

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>Email address</td>
                                                        <td>[[settings.user_email]]</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><span class="mob">Email</span></td>
                                                        <td><span class="mob">Cell Phones</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>New messages and comments</td>
                                                        <td ng-if="settings.email_notify_msg=='1'"> On </td>
                                                        <td ng-if="settings.email_notify_msg=='0'">Off</td>
                                                        <td ng-if="settings.cell_notify_msg=='1'"> On </td>
                                                        <td ng-if="settings.cell_notify_msg=='0'">Off</td>

                                                    </tr>
                                                    <tr>
                                                        <td>Profile visitors</td>
                                                        <td ng-if="settings.email_notify_visitors=='1'"> On</td>
                                                        <td ng-if="settings.email_notify_visitors=='0'">Off </td>
                                                        <td ng-if="settings.cell_notify_visitors=='1'"> On</td>
                                                        <td ng-if="settings.cell_notify_visitors=='0'">Off </td>
                                                    </tr>

                                                    <tr>
                                                        <td>People who liked you and matches</td>
                                                        <td ng-if="settings.email_notify_likes=='1'" >On </td>
                                                        <td ng-if="settings.email_notify_likes=='0'" >Off </td>
                                                          <td ng-if="settings.cell_notify_likes=='1'" >On </td>
                                                        <td ng-if="settings.cell_notify_likes=='0'" >Off </td>
                                                    </tr>

                                                    <!--<tr>
                                                        <td>Alerts</td>
                                                        <td>On</td>
                                                        <td>On</td>
                                                    </tr>


                                                    <tr>
                                                        <td>Lezum news</td>
                                                        <td>On</td>
                                                        <td></td>
                                                    </tr>!-->

                                                    <tr>
                                                        <td>Gifts</td>
                                                        <td ng-if="settings.email_notify_gifts=='1'" > On</td>
                                                        <td ng-if="settings.email_notify_gifts=='0'" > Off</td>
                                                                                                            </tr>

                                                    <!--<tr>
                                                        <td>Photo ratings</td>
                                                        <td>On</td>
                                                        <td>On</td>
                                                    </tr>!-->
                                                    <tr>
                                                        <td>Favourited You</td>
                                                        <td ng-if="settings.email_notify_fav=='1'">On</td>
                                                        <td ng-if="settings.email_notify_fav=='0'">Off</td>
                                                        <td ng-if="settings.cell_notify_fav=='1'">On</td>
                                                        <td ng-if="settings.cell_notify_fav=='0'">Off</td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                    <div id="notification-div-form" style="display:none">
                                        <form id="notification-form" ng-submit="submit_notification(settings)">
                                            <br />
                                            <h2>Email and mobile notifications</h2>

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Email address</td>
                                                            <td>[[settings.user_email]]</td>
                                                            <td>
                                                                <span class="btn-primary btn-xs change_email" data-target="#change_email" data-toggle="modal"> Change </span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><span class="mob">Email</span></td>
                                                            <td><span class="mob">Cell Phones</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>New messages and comments</td>
                                                            <td>
                                                                <label><input type="radio" class="radio-bootstrap" name="email_notify_msg" value="1" ng-checked="email_notify_msg_model=='1'" ng-model="settings.email_notify_msg">On</label>
                                                                <label><input type="radio" class="radio-bootstrap" name="email_notify_msg" value="0" ng-checked="email_notify_msg_model=='0'" ng-model="settings.email_notify_msg">Off</label>
                                                            </td>
                                                            <td>
                                                                <label><input type="radio" class="radio-bootstrap" name="cell_notify_msg" value="1" ng-checked="cell_notify_msg_model=='1'" ng-model="settings.cell_notify_msg" >On</label>
                                                                <label><input type="radio" class="radio-bootstrap" name="cell_notify_msg" value="0" ng-checked="cell_notify_msg_model=='0'" ng-model="settings.cell_notify_msg" >Off</label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Profile visitors</td>
                                                            <td>
                                                                <label><input type="radio" class="radio-bootstrap" name="email_notify_visitors" value="1" ng-checked="email_notify_visitors_model=='1'" ng-model="settings.email_notify_visitors" >On</label>
                                                                <label><input type="radio" class="radio-bootstrap" name="email_notify_visitors" value="0" ng-checked="email_notify_visitors_model=='0'" ng-model="settings.email_notify_visitors" >Off</label>
                                                            </td>
                                                            <td>
                                                                <label><input type="radio" class="radio-bootstrap" name="cell_notify_visitors" value="1" ng-checked="cell_notify_visitors_model=='1'" ng-model="settings.cell_notify_visitors" >On</label>
                                                                <label><input type="radio" class="radio-bootstrap" name="cell_notify_visitors" value="0" ng-checked="cell_notify_visitors_model=='0'" ng-model="settings.cell_notify_visitors" >Off</label>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>People who liked you and matches</td>
                                                            <td>
                                                                <label><input type="radio" class="radio-bootstrap" name="email_notify_likes" value="1" ng-checked="email_notify_likes_model=='1'" ng-model="settings.email_notify_likes" >On</label>
                                                                <label><input type="radio" class="radio-bootstrap" name="email_notify_likes" value="0" ng-checked="email_notify_likes_model=='0'" ng-model="settings.email_notify_likes">Off</label>
                                                            </td>
                                                            <td>
                                                                <label><input type="radio" class="radio-bootstrap" name="cell_notify_likes" value="1" ng-checked="cell_notify_likes_model=='1'" ng-model="settings.cell_notify_likes">On</label>
                                                                <label><input type="radio" class="radio-bootstrap" name="cell_notify_likes" value="0" ng-checked="cell_notify_likes_model=='0'" ng-model="settings.cell_notify_likes">Off</label>
                                                            </td>
                                                        </tr>

                                                        <!--<tr>
                                                            <td>Alerts</td>
                                                            <td>
                                                                <label><input type="radio" class="radio-bootstrap" name="alerts1">On</label>
                                                                <label><input type="radio" class="radio-bootstrap" name="alerts1">Off</label>
                                                            </td>
                                                            <td>
                                                                <label><input type="radio" class="radio-bootstrap" name="alerts2">On</label>
                                                                <label><input type="radio" class="radio-bootstrap" name="alerts2">Off</label>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td>Lezum news</td>
                                                            <td>
                                                                <label><input type="radio" class="radio-bootstrap" name="news1">On</label>
                                                                <label><input type="radio" class="radio-bootstrap" name="news1">Off</label>
                                                            </td>
                                                            <td></td>
                                                        </tr>!-->

                                                        <tr>
                                                            <td>Gifts</td>
                                                            <td>
                                                                <label><input type="radio" class="radio-bootstrap" name="email_notify_gifts" value="1" ng-checked="email_notify_gifts_model=='1'" ng-model="settings.email_notify_gifts">On</label>
                                                                <label><input type="radio" class="radio-bootstrap" name="email_notify_gifts" value="0" ng-checked="email_notify_gifts_model=='0'" ng-model="settings.email_notify_gifts">Off</label>
                                                            </td>
                                                            <td></td>
                                                        </tr>

                                                        <!--<tr>
                                                            <td>Photo ratings</td>
                                                            <td>
                                                                <label><input type="radio" class="radio-bootstrap" name="photoratings1">On</label>
                                                                <label><input type="radio" class="radio-bootstrap" name="photoratings1">Off</label>
                                                            </td>
                                                            <td>
                                                                <label><input type="radio" class="radio-bootstrap" name="photoratings2">On</label>
                                                                <label><input type="radio" class="radio-bootstrap" name="photoratings2">Off</label>
                                                            </td>
                                                        </tr>!-->
                                                        <tr>
                                                            <td>Favourited You</td>
                                                            <td>
                                                                <label><input type="radio" class="radio-bootstrap" name="email_notify_fav" value="1" ng-checked="email_notify_fav_model=='1'" ng-model="settings.email_notify_fav" >On</label>
                                                                <label><input type="radio" class="radio-bootstrap" name="email_notify_fav" value="0" ng-checked="email_notify_fav_model=='0'" ng-model="settings.email_notify_fav" >Off</label>
                                                            </td>
                                                            <td>
                                                                <label><input type="radio" class="radio-bootstrap" name="cell_notify_fav" value="1" ng-checked="cell_notify_fav_model=='1'" ng-model="settings.cell_notify_fav" >On</label>
                                                                <label><input type="radio" class="radio-bootstrap" name="cell_notify_fav" value="0" ng-checked="cell_notify_fav_model=='0'" ng-model="settings.cell_notify_fav" >Off</label>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <button type="submit" class="save-changes-notification"> Save changes</button>
                                            <button type="button" class="cancel-changes-notification">Cancel</button>
                                            <br />
                                            <br />
                                        </form>
                                    </div>
                                </div>
                                
                                <div class="account-settings-message" style="display:none">
                                    <h1><strong> Message Settings</strong></h1>
                                    
                                    
                                    <h2><small>When a user contacts you again after you've clicked the 'I'm not interested' button,<br/>
                                            how would you like us to deal wit him or her?
                                     </small></h2>

                                    <br/>
                                    <form id="account-settings-message-form" ng-submit="submit_messege(settings)" >
                                        <table class="container table table-message-change">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label><input type="radio" class="radio-bootstrap-messege" name="msg_not_interested" value="no_action"  ng-checked="msg_not_interested_model=='no_action'" ng-model="settings.msg_not_interested" >Let me decide on a message by message basis when this happens</label>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>

                                                        <label><input type="radio" class="radio-bootstrap-messege" name="msg_not_interested" value="delete_all_msg" ng-checked="msg_not_interested_model=='delete_all_msg'" ng-model="settings.msg_not_interested" >Delete all messages from this user.</label>

                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>
                                                        <label><input type="radio" class="radio-bootstrap-messege" name="msg_not_interested" value="block" ng-checked="msg_not_interested_model=='block'" ng-model="settings.msg_not_interested">Block this user from being able to message me again. </label>
                                                    </td>

                                                </tr>

                                            </tbody>
                                        </table>
                                        <button class="save-btn" type="submit">
                                            Save
                                        </button>
                                    </form>
                                </div>
                                
                                
                                <div class="account-settings-invisible_mode" style="display:none">
                                    <h1><strong>Invisible mode </strong></h1>


                                    <h2>
                                        <small>
                                            While it is fun to be a ghost sometimes, remember that with great power comes grewat responsibility.<br />
                                            If people can't see you, they won't know how much fun you are to hang out and chat with.
                                        </small>
                                    </h2>

                                    <br />
                                    <form id="account-settings-invisible_mode-form" ng-submit="submit_invisible(settings)" >
                                        <table class="container table table-message-change">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label><input type="checkbox"  ng-model="settings.invisible_mode_hide_presence" ng-init="checked=true" ng-true-value='1' ng-false-value="0">Hide my presence from other users.</label>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>

                                                        <label><input type="checkbox"   name="invisible_mode_hide_visitor" ng-checked="invisible_mode_hide_visitor_model=='1'" ng-model="settings.invisible_mode_hide_visitor" ng-true-value='1' ng-false-value="0">Don't show me as 'profile visitor' on people's profiles</label>

                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>
                                                        <label><input type="checkbox"  name="invisible_mode_hide_super_powers" ng-checked="invisible_mode_hide_super_powers_model=='1'" ng-model="settings.invisible_mode_hide_super_powers" ng-true-value='1' ng-false-value="0">Hide my Super Powers from other users. </label>
                                                    </td>

                                                </tr>

                                            </tbody>
                                        </table>
                                        <button class="save-btn" type="submit">
                                            Save
                                        </button>
                                    </form>
                                </div>
                                
                                <div class="account-settings-payments-settings" style="display:none">
                                    <h1><strong>Payment settings </strong></h1>

                                    <div id="payments-div">

                                        <br />

                                        <h2>Credits</h2>

                                        <div class="table-responsive">
                                            <table class="table">

                                                <tbody>
                                                    <tr>
                                                        <td>Current balance</td>
                                                        <td>You have 0 credits &nbsp;<span data-toggle="modal" data-target="#choosepayment" 
	                                                        class="btn-primary btn-xs edit_refill" > Refill </span>
	                                                        
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Automatic Refill</td>
                                                        <td>On</td>
                                                    </tr>
                                                   
                                                </tbody>
                                            </table>
                                        </div>


                                        <h2>Premium Active package</h2>
                                        <h2><small>You are not subscribed to the Super Powers package.</small></h2>
                                        <br/>
                                        <!--<h2>Payment method</h2>
                                        <h2><small>You haven't set up a payment method yet.<br/>
                                            When you make payment on LEZUM using a method we can store(e.g. credit card or PayPal).<br/>
                                            you can access all of LEZUM's premium features  with just one click.                                                
                                        </small></h2>!-->
                                    </div>
                                </div>
                                
                                <div class="account-settings-change-password" style="display:none">
                                    
                                    <h1><strong>Change your password</strong></h1>
                                   
                                    <h4>
                                        Remember to change your password to something you won't forget and<br/>
                                        other people won't be able to guess.
                                    </h4>

                                    <br />
                                    <form id="account-settings-change-password-form" ng-submit="submit_password(settings)" action="{{URL::to('account_settings/change-password')}}">
                                        <table class="container table table-pwd-change">
                                            <tbody>
                                                <tr>
                                                    <td class="label-change-email">Current password</td>
                                                    <td><input type="password" name="old_pwd" ng-model="settings.current_email_model" value="" /><h2><small>Forgot your password?</small></h2></td>

                                                </tr>
                                                <tr>
                                                    <td class="label-change-email">New password</td>
                                                    <td><input type="password" name="new_pwd" ng-model="settings.new_pwd_model" value="" /></td>
                                                </tr>
                                                <tr>
                                                    <td class="label-change-email">Re-type new password</td>
                                                    <td>
                                                        <input type="password" name="re_new_pwd" ng-model="settings.retype_new_pwd_model"  value="" />

                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td class="label-change-email">What is the text?</td>
                                                    <td>
                                                        <img src="{{Captcha::img()}}" name='Captcha image'>                                                 
                                                            
                                                        <input type="text" name="captcha" id="catcha" style="margin-left:2%">
                                                        <h2><small>Can't read this? <a href="" class="captcha_new">Try different text</a></small></h2>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="popup-btm-btn change-pwd-save">
                                            <button class="save-btn" type="submit">
                                                Change password
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                
                                <div class="account-settings-change-email" style="display:none">
                                    <form id="account-settings-change-email-form" method="post" action="{{URL::to('account_settings/change-email')}}">
                                        <div class="modal-header">
                                            <h2 class="modal-title-change-email">
                                                Change email address
                                            </h2>
                                            <br />

                                            <h3>
                                                You'll have to confirm your new email address after you change it,<br />
                                                If you don't confirm this address,we will switch back to the old one<br />
                                                you must complete your profile more than 50%<br /><br />
                                            </h3>

                                            <br />

                                            <table class="container table table-pwd-change">
                                                <tbody>
                                                    <tr>
                                                        <td class="label-change-email">Current email address</td>
                                                        <td>[[settings.user_email]]</td>

                                                    </tr>
                                                    <tr>
                                                        <td class="label-change-email">New email address</td>
                                                        <td><input type="text" name="email" value="" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="label-change-email">Current password</td>
                                                        <td>
                                                            <input type="password" name="pwd" value="" />
                                                            <h2><small>Forgot your password?</small></h2>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td class="label-change-email">What is the text?</td>
                                                        <td>
                                                            <img src="{{Captcha::img()}}" name='Captcha image'>                                                 
                                                            
                                                        <input type="text" name="captcha" id="catcha" style="margin-left:2%">
                                                            <h2><small>Can't read this? <a href="" class="captcha+_new">Try different text</a></small></h2>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="popup-btm-btn change-pwd-save">
                                            <button class="save-btn" type="submit">
                                                Send Confirmation email
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                
                                 <div class="account-settings-delete-profile" style="display:none">
                                    <h1><strong>Are you sure you want to delete your account?</strong></h1>


                                    <h2>
                                        <small>
                                           Are you really sure?<br />
                                           Remember, once you delete your account, it will be disabled yo use again your name, photos and information from <br/>
                                           you've saved on LEZUM. All the people who joins LEZUM everyday will miss you, so think more.
                                        </small>
                                    </h2>

                                    <br />
                                    <form id="account-settings-delete-profile-form">
	                                    <h2>
	                                        <small>
	                                           If you'd rather just take a break or start over, you can:
	                                        </small>
                                        </h2>
                                        <table class="container table table-message-change table-delete">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label><input type="radio" class="radio-bootstrap-delete" name="delete_account" value="">Get removed from Google, and stop your profile from appearing in Google search results. It will be like you deleted it, but you will still be able to meet new people and have fun! </label>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>

                                                        <label><input type="radio" class="radio-bootstrap-delete" name="delete_account" value="" >Get shown only to people you like or visit. You will be able to use Badoo to meet and chat with new people,but you won't appear in People nearby, Encounters, Google etc.</label>

                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>
                                                        <label><input type="radio" class="radio-bootstrap-delete" name="delete_account" value="" >Remove all messages, profile visits, people who like you and Favorites, permanently. But still existing your account </label>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label><input type="radio" class="radio-bootstrap-delete" name="delete_account" value="" >Delete your account.</label>
                                                    </td>

                                                </tr>

                                            </tbody>                                        
                                           </table>
                                        <button class="save-btn" type="submit">
                                            Save
                                        </button>
                                       </form>
                                </div>
                                 
                                 <div class="account-settings-verified_status" style="display:none">
                                    <h1><strong>Verified status settings </strong></h1>


                                    <h2>
                                        <small>
                                           Once you've proven your identity, you get the option to only receive messages from people who have proven theirs.<br />
                                           You can only use this feature if you  have Verified status.
                                        </small>
                                    </h2>

                                    <br />
                                    <form id="account-settings-verified_status-form">
                                        <table class="container table table-message-change">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label><input type="checkbox" name="verified_status1">Only people with "Verified status" can contact me.</label>
                                                    </td>

                                                </tr>

                                                <tr>
                                                    <td>

                                                        <label><input type="checkbox" name="verified_status2">Show the verification section in my profile.</label>

                                                    </td>

                                                </tr>

                                            </tbody>
                                        </table>
                                        <button class="save-btn" type="submit">
                                            Save
                                        </button>
                                        <h2><small><a href="" id="getVerified">You need to get verfied to use this option.</a> </small></h2>
                                    </form>
                                </div>

								 		<div class="modal fade" id="change_email" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close close-bg" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <form id="account-settings-change-email-form" method="post" action="{{URL::to('account_settings/change-email')}}">
                                        <div class="modal-header">
                                            <h2 class="modal-title-change-email">
                                                Change email address
                                            </h2>
                                            <br />

                                            <h3>
                                                You'll have to confirm your new email address after you change it,<br />
                                                If you don't confirm this address,we will switch back to the old one<br />
                                                you must complete your profile more than 50%<br /><br />
                                            </h3>

                                            <br />

                                            <table class="container table table-pwd-change-popup">
                                                <tbody>
                                                    <tr>
                                                        <td class="label-change-email">Current email address</td>
                                                        <td>[[settings.user_email]]</td>

                                                    </tr>
                                                    <tr>
                                                        <td class="label-change-email">New email address</td>
                                                        <td><input type="text" name="email" value="" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="label-change-email">Current password</td>
                                                        <td>
                                                            <input type="password" name="pwd" value="" />
                                                            <h2><small>Forgot your password?</small></h2>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td class="label-change-email">What is the text?</td>
                                                        <td>
                                                            <img src="{{Captcha::img()}}" name='Captcha image'>                                                 
                                                            
                                                        <input type="text" name="captcha" id="catcha" style="margin-left:2%">
                                                            <h2><small>Can't read this? <a href="" class="captcha+_new">Try different text</a></small></h2>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                        <div class="popup-btm-btn change-pwd-save-popup">
                                            <button class="save-btn" type="submit">
                                                Send Confirmation email
                                            </button>
                                        </div>
                                    </form>
                </div>
                <!--<div class="modal-body game-over">

                    <div class="popup-btm-btn">
                        <ul>
                            <li class="pop-send-btn"><a href="javascript:void(0)" id="send_confirmation_email">Send Confirmation email</a></li>
                            <li class="pop-continue-btn"><a href="javascript:void(0)" id="cancel_confirmation_email">Cancel</a></li>
                        </ul>
                    </div>
                </div>-->
               
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

                            </div>



                        </div>
                    </div>








@stop

@section('scripts')

<script>

        $(function () {

            $("#single3").ionRangeSlider({
                hide_min_max: true,
                keyboard: true,
                min: 0,
                max: 100,
                from: 50,
                //to: 80,
                type: 'single',
                step: 1,
                prefix: "Km",
                grid: true
            });



        });
        $(function () {
            
            $(".dropdown-menu.bor2").click(function (event) {
                event.stopPropagation();
            });
        });
    </script>
    <!-- custom scrollbar plugin -->
    <script src="{{URL::to('assets/frontend/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

    <script>
        (function ($) {
            $(window).load(function () {

                $("#content-7").mCustomScrollbar({
                    scrollButtons: { enable: true },
                    theme: "3d-thick"
                });

            });
        })(jQuery);

        $('.edit_main_profile').click(function (event) {
            $('.save-profile-div').show();
        });

        $('#cancel-profile').click(function (event) {
            $('.save-profile-div').hide();
        }
        );
        $('#cancel-map').click(function (event) {
            $('.dropdown-map-update').removeClass('open');
            $('#map-profile').show();
        }
        );

        $('#cancel-interests').click(function (event) {
            $('.interests').hide();
        }
        );

        $('#cancel-personalInfo').click(function (event) {
            $('.personalInfo-div').hide();
        }
        );


        $('.edit-map').click(function (event) {
            $('#map-profile').hide();
        }
        );

        $('.edit-interests').click(function (event) {
            $('.interests').show();
        }
        );

        $('.edit-personalInfo').click(function (event) {
            $('.personalInfo-div').show();
        }
                );

       

    </script>

    <script type="text/javascript">
        $('ul.nav.nav-pills li a').click(function () {
            $(this).parent().addClass('active').siblings().removeClass('active');
        });

        $('.edit_privacy').click(function () {
            $('#privacy-div-form').show();
            $('#privacy-div').hide();
        });

        $('.edit_notification').click(function () {
            $('#notification-div-form').show();
            $('#notification-div').hide();
        });

        $('.cancel-changes-notification').click(function () {
            $('#notification-div-form').hide();
            $('#notification-div').show();
        });

        $('.cancel-changes-privacy').click(function () {
            $('#privacy-div-form').hide();
            $('#privacy-div').show();
        });

        $('.edit_photos').click(function () {
            $('#Photos-videos-div-form').show();
            $('#Photos-videos-div').hide();
        });

        $('.cancel-changes-photos').click(function () {
            $('#Photos-videos-div-form').hide();
            $('#Photos-videos-div').show();
        });

        $('.edit_Change_lan').click(function () {
            $('#Langauge-div-form').show();
            $('#Langauge-div').hide();
        });

        $('.cancel-changes-lang').click(function () {
            $('#Langauge-div-form').hide();
            $('#Langauge-div').show();
        });


        

        
        
    </script>

    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.js"></script>
    <script>
        $(document).ready(function () {

            $('#movieForm').validate({ // initialize the plugin
                rules: {
                    nickname: {
                        required: true

                    },
                    gender: {
                        required: true
                    }
                }
            });

            $('#personalInfoForm').validate({ // initialize the plugin
                rules: {
                    relationshipstatus: {
                        required: true

                    },
                    sexuality: {
                        required: true
                    },
                    sexuality: {
                        required: true
                    },
                    Height: {
                        required: true
                    },
                    Weight: {
                        required: true
                    },
                    bodytype: {
                        required: true
                    },
                    haircolor: {
                        required: true
                    },
                    eyecolor: {
                        required: true
                    },
                    living: {
                        required: true
                    },
                    kids: {
                        required: true
                    },
                    smoking: {
                        required: true
                    },
                    drinking: {
                        required: true
                    },
                    education: {
                        required: true
                    },
                    language: {
                        required: true
                    },
                    position: {
                        required: true
                    },
                    income: {
                        required: true
                    },
                    companyname: {
                        required: true
                    }
                }
            });

        });
    </script>
  

    <script type="text/javascript">
	    
	    $('#save').click(function () {
									    // add loading image to div
									    $('#loading').html('<img src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...');
									    
									    $("#loading").css("margin-left","29%"); 
									    
									    // run ajax request
									    $.ajax({
									        type: "GET",
									        dataType: "json",
									        url: "https://api.github.com/users/jveldboom",
									        success: function (d) {
									            // replace div's content with returned data
									            // $('#loading').html('<img src="'+d.avatar_url+'"><br>'+d.login);
									            // setTimeout added to show loading
									            setTimeout(function () {
									                $('#loading').html('<img src="' + d.avatar_url + '"><br>' + d.login);
									            }, 2000);
									        }
									    });
									    
									    
									    
		});							    
	    $('.navlink').click(function (e) {
           switch($(e.target).text())
           {
	           case 'Notification settings': 
	             $('.account-settings-notification').show();
	             $('.account-settings-privacy').hide();
	             $('.account-settings-message').hide();
	             $('.account-settings-invisible_mode').hide();
	             $('.account-settings-payments-settings').hide();
	             $('.account-settings-change-password').hide();
	             $('.account-settings-change-email').hide();
	              $('.account-settings-verified_status').hide();
	              $('.account-settings-delete-profile').hide();
	             break;
	             
	             case 'Message settings': 
	            $('.account-settings-notification').hide();
	             $('.account-settings-privacy').hide();
	             $('.account-settings-message').show();
	             $('.account-settings-invisible_mode').hide();
	             $('.account-settings-payments-settings').hide();
	             $('.account-settings-change-password').hide();
	             $('.account-settings-change-email').hide();
	              $('.account-settings-verified_status').hide();
	              $('.account-settings-delete-profile').hide();
	             break;
	             
	            
	             
	             case 'Invisible mode': 
	           $('.account-settings-notification').hide();
	             $('.account-settings-privacy').hide();
	             $('.account-settings-message').hide();
	             $('.account-settings-invisible_mode').show();
	             $('.account-settings-payments-settings').hide();
	             $('.account-settings-change-password').hide();
	             $('.account-settings-change-email').hide();
	              $('.account-settings-verified_status').hide();
	              $('.account-settings-delete-profile').hide();
	             break;
	             
	             case 'Verfied status settings': 
	           $('.account-settings-notification').hide();
	             $('.account-settings-privacy').hide();
	             $('.account-settings-message').hide();
	             $('.account-settings-invisible_mode').hide();
	             $('.account-settings-payments-settings').hide();
	             $('.account-settings-change-password').hide();
	             $('.account-settings-change-email').hide();
	             $('.account-settings-verified_status').show();
	             $('.account-settings-delete-profile').hide();
	             
	             break;
	             
	              case 'Payment settings': 
	            $('.account-settings-notification').hide();
	             $('.account-settings-privacy').hide();
	             $('.account-settings-message').hide();
	             $('.account-settings-invisible_mode').hide();
	             $('.account-settings-payments-settings').show();
	             $('.account-settings-change-password').hide();
	             $('.account-settings-change-email').hide();
	              $('.account-settings-verified_status').hide();
	              $('.account-settings-delete-profile').hide();
	             break;
	             
	              case 'Change password': 
	             $('.account-settings-notification').hide();
	             $('.account-settings-privacy').hide();
	             $('.account-settings-message').hide();
	             $('.account-settings-invisible_mode').hide();
	             $('.account-settings-payments-settings').hide();
	             $('.account-settings-change-password').show();
	             $('.account-settings-change-email').hide();
	              $('.account-settings-verified_status').hide();
	              $('.account-settings-delete-profile').hide();
	             break;
	             
	              case 'Change email address': 
	             $('.account-settings-notification').hide();
	             $('.account-settings-privacy').hide();
	             $('.account-settings-message').hide();
	             $('.account-settings-invisible_mode').hide();
	             $('.account-settings-payments-settings').hide();
	             $('.account-settings-change-password').hide();
	             $('.account-settings-change-email').show();
	             $('.account-settings-verified_status').hide();
	             $('.account-settings-delete-profile').hide();
	             break;
	             
	          
	             
	               case 'Profile Settings': 
	            $('.account-settings-notification').hide();
	             $('.account-settings-privacy').show();
	             $('.account-settings-message').hide();
	             $('.account-settings-invisible_mode').hide();
	             $('.account-settings-payments-settings').hide();
	             $('.account-settings-change-password').hide();
	             $('.account-settings-change-email').hide();
	             $('.account-settings-verified_status').hide();
	             $('.account-settings-delete-profile').hide();
	             break;
	             
	                case 'Delete profile': 
	            $('.account-settings-notification').hide();
	             $('.account-settings-privacy').hide();
	             $('.account-settings-message').hide();
	             $('.account-settings-invisible_mode').hide();
	             $('.account-settings-payments-settings').hide();
	             $('.account-settings-change-password').hide();
	             $('.account-settings-change-email').hide();
	             $('.account-settings-verified_status').hide();
	             $('.account-settings-delete-profile').show();
	             break;
	           
	           
           }
           
           
    });
    </script>



@stop