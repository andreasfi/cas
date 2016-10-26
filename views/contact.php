<?php
/**
 * Created by PhpStorm.
 * User: andreasfi
 * Date: 27.09.16
 * Time: 15:18
 */

$msg = $this->vars['msg'];
$pageTitle = $this->vars['pageTitle'];
$pageMessage = $this->vars['pageMessage'];
include_once ROOT_DIR.'views/header.inc';


?>
    <div class="content">
        <div class="container">
            <div class="row">

                <section id="form_container" class="col-lg-12">

                    <!-- Formulaire de contact -->

                    <div class="cwell col-md-6">
                        <h3 class="title"><?php echo $lang['CONTACT_FORM'] ?></h3>

                        <div class="form">
                            <form class="form-horizontal" action="<?php echo URL_DIR.'/contact';?>" method="post">
                                <!-- Name -->
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="name"><?php echo $lang['CONTACT_NAME'] ?></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" id="name" maxlength="40">
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="emailFrom"><?php echo $lang['CONTACT_YOUR_EMAIL'] ?></label>
                                    <div class="col-md-9">
                                        <input type="email" class="form-control" name="emailFrom" id="email">
                                    </div>
                                </div>
                                <!-- Subject -->
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="subject"><?php echo $lang['CONTACT_SUBJECT'] ?></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="subject" id="subject">
                                    </div>
                                </div>

                                <!-- Message -->
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="message"><?php echo $lang['CONTACT_MESSAGE'] ?></label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" name="message" id="message" rows="4"></textarea>
                                    </div>
                                </div>
                                <!-- Buttons -->
                                <div class="form-group">
                                    <!-- Buttons -->
                                    <div class="col-md-9 col-md-offset-3">
                                        <button type="submit" class="btn btn-info"><?php echo $lang['CONTACT_SEND_BUTTON'] ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-1">

                    </div>

                    <!-- Laisser un message audio-visuel -->
                    <div class="cwell col-lg-5">
                        <!-- Address section -->

                        <div id="message_audio_visuel" class="col-lg-12">
                            <div id="video_container">
                                <div id="button_container" class="col-lg-offset-1 col-lg-10">
                                    <i class="fa fa-video-camera circle_image" aria-hidden="true"
                                       style="font-size: 40px;"></i>
                                    <button id="button_message_visuel" type="button" class="btn blue-button" onclick="display_video()">
                                        <?php echo $lang['CONTACT_LEAVE_VIDEO_MESSAGE'] ?>
                                    </button>
                                </div>
                                <div id="webcam_video_error" style="display: none;">
                                    <div class="container col-md-12">
                                        <p><span id="ban_logo" style="font-size: 50px" class="fa fa-wrench"></span></p>
                                        <div id="webcam_error_message"></div>
                                    </div>
                                </div>

                                <div id="webcam_video_container" style="display: none;">
                                    <video id="webcam_video"></video>
                                    <div id="webcam_video_controls">
                                        <ul>
                                            <li>
                                                <button id="start_recording" class="blue-button" onclick="start_recording()"><i class="fa fa-circle"
                                                                                                            style="color: red"> </i>
                                                </button>
                                            </li>
                                            <li>
                                                <button id="pause_recording" class="blue-button" onclick="pause_recording()"><i class="fa fa-pause"
                                                                                                          aria-hidden="true"></i>
                                                </button>
                                            </li>
                                            <li>
                                                <button id="stop_recording" class="blue-button" onclick="stop_recording()"><i class="fa fa-stop"
                                                                                                          aria-hidden="true"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modal_video_preview" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"><?php echo $lang['CONTACT_VIDEO_PREVIEW']  ?></h4>
                                </div>
                                <div class="form-group col-lg-offset-1 col-lg-10">
                                    <label for="input_email_modal"><?php echo $lang['CONTACT_YOUR_EMAIL'] ?></label>
                                    <input type="email" required id="input_email_modal" class="form-control"/>
                                    <small id="error_email_modal" style="color: red; display: none;"><?php echo $lang['CONTACT_INVALID_EMIAL']?></small>
                                </div>
                                <div class="modal-body col-lg-offset-1 col-lg-10">
                                    <video autoplay id="video_preview" class="col-lg-12" src="#"></video>
                                </div>
                                <div class="modal-footer video_modal_footer">
                                    <ul>
                                        <li>
                                            <button type="button" class="btn blue-button" data-dismiss="modal"><?php echo $lang['CONTACT_CLOSE_BUTTON'] ?></button>
                                        </li>
                                        <li>
                                            <button type="button" class="btn blue-button" onclick="postVideo()"><?php echo $lang['CONTACT_SEND_BUTTON'] ?></button>
                                        </li>
                                        <li>

                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
            </div>
        </div>
    </div>

        <script>

            var index = 0;
            var mediaRecorder = null;
            var video = document.querySelector('video');
            var mediaConstraints = {
                audio: true,
                video: true
            };
            var blob_to_send = null;
            var paused = false;

            function hasGetUserMedia() {
                return !!(navigator.getUserMedia || navigator.webkitGetUserMedia ||
                navigator.mozGetUserMedia || navigator.msGetUserMedia);
            }

            if (hasGetUserMedia()) {
                console.log("Success : Webcam/micro are supported.");
                //Disable pause and stop buttons
                $('#pause_recording').prop("disabled", true);
                $('#stop_recording').prop("disabled", true);

            } else {
                //Inform the user that the browser is not supported.

                console.log("error : Webcam/micro not supported.");

                var p0 = $('<p></p>').text("<?php echo $lang['UNSUPPORTED_API'] ?>");
                
                var a_chrome = $("<a></a>").text("<?php echo $lang['DOWNLOAD_CHROME'] ?>");
                a_chrome.attr("href", "https://www.google.com/chrome/browser/desktop/");
                a_chrome.attr("target", "_blank");

                var p1 = $("<p></p>").append(a_chrome);

                var a_moz = $("<a></a>").text("<?php echo $lang['DOWNLOAD_FIREFOX'] ?>");
                a_moz.attr("href", "https://www.mozilla.org/en-US/firefox/new/");
                a_moz.attr("target", "_blank");

                var p2 = $("<p></p>").append(a_moz);

                var msg = $('<div></div>').append(p0).append(p1).append(p2);

                display_error(msg);
                console.log("Error : Webcam/micro are not supported.");
            }

            var errorCallback = function (e) {
                //Display the error page
                var msg = "<p>An error occured</p><p>"+e.name+"</p><p>"+e.message+"</p>";
                display_error(msg);
            };


            function camera_on() {
                navigator.getUserMedia(mediaConstraints, function (localMediaStream) {

                    video.src = window.URL.createObjectURL(localMediaStream);
                    video.autoplay = true;

                    video.onloadedmetadata = function (e) {
                        // Ready to go. Do some stuff.
                    };

                }, errorCallback);
            }


            function display_video() {
                //0. Remove the current content
                $('#button_container').hide();
                //1. Append the video to message_audio_visuel
                $('#webcam_video_container').show();
                camera_on();
            }

            function display_error(error_message) {
                //0. Remove the current content
                $('#button_container').hide();
                $('#webcam_video_error').append(error_message);
                $('#webcam_video_error').show();
            }

            function start_recording() {

                $('#start_recording').prop("disabled", true);
                $('#pause_recording').prop("disabled", false);
                $('#stop_recording').prop("disabled", false);

                if(paused){
                    mediaRecorder.resume();
                    paused = false;
                    return;
                }

                navigator.getUserMedia(mediaConstraints, onMediaSuccess, onMediaError);

            }

            function pause_recording() {
                mediaRecorder.pause();
                $('#pause_recording').prop('disabled', true);
                $('#start_recording').prop('disabled', false);
                $('#stop_recording').prop('disabled', false);
                paused = true;
            }

            function stop_recording() {

                if(paused){
                    paused = false;;
                }

                mediaRecorder.stop()
                //mediaRecorder.stream.stop();

                $('#start_recording').prop("disabled", false);
                $('#pause_recording').prop("disabled", true);
                $('#stop_recording').prop("disabled", true);

                $('#modal_video_preview').modal('show');

            }


            function onMediaSuccess(stream) {
                mediaRecorder = new MediaStreamRecorder(stream);
                mediaRecorder.mimeType = 'video/webm';
                mediaRecorder.ondataavailable = function (blob) {

                    blob_to_send = blob;
                    // POST/PUT "Blob" using FormData/XHR2
                    var blobURL = URL.createObjectURL(blob);
                    appendLink('' + blobURL + '');
                };
                mediaRecorder.start(10000);
            }

            function onMediaError(e) {
                console.error('media error', e);
            }

            function appendLink(blob) {

                $('#video_preview').attr("src", blob);
                $('#video_preview').prop('controls', true);
                //$('#links').append(a);
                //$('#links').append(document.createElement('hr'));

                //Stop the video
                stop_recording();
            }

            function postVideo() {

                //Only if the e-mail address is valid

                var email = $('#input_email_modal').val();

                var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
                if(!testEmail.test(email))
                {
                    $('#error_email_modal').show();
                    return;
                }

                $('#error_email_modal').hide();

                var xhr = new XMLHttpRequest();

                xhr.onreadystatechange = function() {
                    if (xhr.readyState == XMLHttpRequest.DONE) {
                        console.log(xhr.responseText);
                    }
                }
                xhr.open('POST', 'contact/sendVideo', true);
                xhr.send(blob_to_send);

            }

        </script>
    </section>
<section id="map">

</section>


<?php include_once ROOT_DIR . 'views/footer.inc';  ?>