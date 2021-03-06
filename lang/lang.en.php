<?php
/**
 * Created by PhpStorm.
 * User: Trah
 * Date: 04/10/2016
 * Time: 10:40
 */

/*
 * Language : English
 */
$lang = array();

//misc

$lang['WEBSITE_NAME'] = "Swiss Alpine Club";
$lang['CAS_HOMETOWN'] = "Crans-Montana";
$lang['CAS_MAIL'] = "casphphes@gmail.com";
$lang['CAS_PHONE'] = "+41 27 000 00 00";
$lang['SEO_TITLE'] = "Swiss alpine club";
$lang['SEO_DESCRIPTION'] = "The swiss alpine club is...";
//menu

$lang['CONNECT_MENU_BUTTON'] = "Connect";
$lang['DISCONNECT_MENU_BUTTON'] = "Disconnect";
$lang['PROXIMITY_MENU_BUTTON'] = "Map";
$lang['ACTIVITIES_MENU_BUTTON'] = "Excursions";
$lang['CONTACT_MENU_BUTTON'] = "Contact";
$lang['PROFIL_MENU_BUTTON'] = "Profil";
//Home

$lang['WELCOME_MESSAGE'] = "Welcome mountaineers!";

//Login

$lang['EMAIL'] = "E-mail";
$lang['PASSWORD'] = "Password";
$lang['OK_BUTTON'] = "OK";
$lang['FORGOT_PASSWORD'] = "Forgot password?";
$lang['RESET_PASSWORD'] = "Reset password";
$lang['NO_ACCOUNT'] = "No account?";
$lang['REGISTER'] = "Register";

//RESETPASSWORD

$lang['PASSWORD_RECOVERY'] = "Password recovery";

//NEWUSER
$lang['FIRSTNAME'] = "Firstname";
$lang['LASTNAME'] = "Lastname";
$lang['PHONE'] = "Phone number";
$lang['MEMBER_NUMBER_IF_EXISTS'] ="Member number (if exists)";
$lang['LOGIN'] = "Login";

//CHANGEPASSWORD
$lang['PASSWORD_CHANGE'] = "Change password";
$lang['NEW_PASSWORD'] = "New password";
$lang['CHANGE'] = "Change";

//WELCOME
$lang['WELCOME'] = "Welcome";
$lang['CHANGE_DATA'] = "Change data";
$lang['MY_PERSONNAL_DATA'] = "My personal data";
$lang['LOGOUT'] = "Logout";

//LOGIN CONTROLLER
$lang['LOGIN_TO_ACCESS_EVENTS'] = "Login to access excurions.";
$lang['MSG_TO_RECOVER_PASSWORD'] = "This message is here to help you recover your password : \nFollow this link : ".URL_DIR."/login/changepassword/";
$lang['CAS_PWD_RECOVERY'] = "CAS password recovery";
$lang['CREATE_ACCOUNT'] = "Create your account";

//SORTIE CONTROLLER

//SORTIES
$lang['RANDONNEES'] = "Hikes";
$lang['SORTIES'] = "Trips";
$lang['ANCIENEVENT'] = "Past Event";


// DETAILS
$lang['BUTTON_PARTICIPATION_REQUEST'] = "I want to participate ";
$lang['BUTTON_PARTICIPATION_REQUEST_ALREADY'] = "Already participating ";
$lang['BUTTON_PARTICIPATION_REQUEST_ALREADY_TOOLTIP'] = "You are already attending this event";
$lang['BUTTON_PARTICIPATION_REQUEST_MEMBER_TOOLTIP'] = "You need to be a member to attend this event";
$lang['BUTTON_FIND_ROUTE'] = "Find a route ";
$lang['FIELD_DISTANCE'] = "Distance ";
$lang['FIELD_ALTITUDE'] = "Altitude difference ";
$lang['FIELD_DIFFICULTY'] = "Difficulty ";
$lang['FIELD_MAX_PARTICIPANT'] = "Max participants ";
$lang['FIELD_CATEGORY'] = "Category ";

$lang['FIELD_TRAIL_MASTER'] = "Trail master ";
$lang['FIELD_NAME'] = "Name ";
$lang['FIELD_EMAIL'] = "Email ";
$lang['FIELD_TELEPHONE'] = "Tel. ";

$lang['SAVE_BUTTON'] = "Save changes";
$lang['MODIFY_BUTTON'] = "Modify the trail";

$lang['SELECT_MODIFY'] = "Modify";
$lang['SELECT_ACCEPTED'] = "Accepted";
$lang['SELECT_REFUSED'] = "Refused";
$lang['SELECT_SUBMITTED'] = "Submitted";

$lang['PARTICIPANTS_NAME'] = "Name";
$lang['PARTICIPANTS_PHONE'] = "Phone";
$lang['PARTICIPANTS_EMAIL'] = "E-mail";
$lang['PARTICIPANTS_STATUS'] = "Status";
$lang['PARTICIPANTS_MODIFY'] = "Modify";
$lang['PARTICIPANTS_SELECT_SUBMITTED'] = "Submitted";
$lang['PARTICIPANTS_SELECT_REFUSED'] = "Refused";
$lang['PARTICIPANTS_SELECT_ACCEPTED'] = "Accepted";

//Save new user

$lang['SUBJECT_APPLIANCE'] = "Your participation request.";
$lang['SUBJECT_MODIFICATION'] = "Modification of your participation.";


//Welcome
$lang['USER_EVENTS_NO_DATA'] = "No events to show.";
$lang['WELCOME_H1_LISTEVENTS'] = "List of events you are subscribed to.";
$lang['WELCOME_DATE_START'] = "Start date";
$lang['WELCOME_DATE_END'] = "End date";
$lang['WELCOME_STATUS'] = "Status";
$lang['WELCOME_TITLE'] = "Title";

//ERROR MESSAGES
$lang['E_REQUIRED_FIELD_EMPTY'] = "A reqired field is empty.";
$lang['E_USERNAME_PASSWORD_INCORRECT'] = "Username or password incorrect.";
$lang['E_FAILED_TO_DELIVER_EMAIL'] = "Email delivery failed.";
$lang['E_KEY_REJECTED'] = "Key out of date or invalid, please recover again.";
$lang['E_PASSWORDS_DONT_MATCH'] = "Passwords don't match";

//SUCCCESS MESSAGES
$lang['S_RECOVERY_MAIL_SENT'] = "A recovery email was sent to your address.";
$lang['S_CONTACT_MAIL_SENT'] = "A contact mail has been sent, we'll get to you ASAP.";
$lang['S_PASSWORD_CHANGE_SUCCESSFUL'] = "Password change successful.";
$lang['S_REGISTRATION_SUCCESSFUL'] = "Registration successful";
$lang['S_CHANGES_SUCCESSFUL'] = "Changes successful";
$lang['S_CHANGES_ERROR'] = "A syntax error occured in the form.";

//WARNING MESSAGES
$lang['W_DIFFICULTY_TRAIL'] = "High difficulty";

//Mail content
$lang['REGISTRATION_MAIL_TITLE'] = "Welcome on the CAS website !";
$lang['REGISTRATION_MAIL_BODY'] = "This is an automatic email to inform you of your registration on our website.";

//ajouter une course
$lang['ADD_TRAIL'] = "Add a trail";
$lang['TRAIL_TITLE'] = "Title";
$lang['TRAIL_MAX_PEOPLE'] = "Max participants";
$lang['TRAIL_CATEGORY'] = "Category";
$lang['TRAIL_DIFFICULTY'] = "Difficulty";
$lang['TRAIL_STARTDATE'] = "Start date/time";
$lang['TRAIL_ENDDATE'] = "End date/time";
$lang['TRAIL_DESCRIPTION'] = "Trail description";
$lang['TRAIL_MAP'] = "Trail";
$lang['TRAIL_MAP_INSTRUCTIONS'] = "Click on the map to draw the trail";
$lang['TRAIL_MAP_DELETELAST'] = "Delete last point";
$lang['TRAIL_MAP_DELETEALL'] = "Delete all points";
$lang['TRAIL_MAP_DELETETRAIL'] = "Delete event";
$lang['TRAIL_MAP_UPDATETRAIL'] = "Save changes";
$lang['TRAIL_MAP_SAVETRAIL'] = "Save event";

//catégories de courses
$lang['TRAIL_CAT_1'] = "Hiking";
$lang['TRAIL_CAT_2'] = "Backcountry ski";
$lang['TRAIL_CAT_3'] = "Climbing";
$lang['TRAIL_CAT_4'] = "Snowshoeing";
$lang['TRAIL_CAT_5'] = "Ski";
$lang['TRAIL_CAT_6'] = "Snowboard";
$lang['TRAIL_CAT_7'] = "Télémark";
$lang['TRAIL_CAT_8'] = "Cross country ski";

//difficultés des courses
$lang['TRAIL_DIFF_1'] = 'Beginner';
$lang['TRAIL_DIFF_2'] = 'Moderate';
$lang['TRAIL_DIFF_3'] = 'Advanced';
$lang['TRAIL_DIFF_4'] = 'Very Advanced';
$lang['TRAIL_DIFF_5'] = 'Professionnal';

//CONTACT CONTROLLER
$lang['CONTACT_US'] = 'Contact us';
$lang['LEAVE_VIDEO_MSG'] = "Leave video message";

//INSCRIPTION TO EVENT
$lang['INSCRIPTION_NUMBER_PARTICIPANTS'] = "Please enter the number of participants";
$lang['SEND'] = "Send";

//-- Modal
$lang['CONTACT_SEND_BUTTON'] = "Send";
$lang['CONTACT_CLOSE_BUTTON'] = "Close";
$lang['CONTACT_YOUR_EMAIL'] = "Your e-mail address";

//-- Contact form
$lang['CONTACT_FORM'] = "Contact form";
$lang['CONTACT_NAME'] = "Name";
$lang['CONTACT_SUBJECT'] = "Subject";
$lang['CONTACT_MESSAGE'] = "Message";
$lang['CONTACT_LEAVE_VIDEO_MESSAGE'] = "Leave a video message";
$lang['CONTACT_VIDEO_PREVIEW'] = "Video preview";
$lang['CONTACT_INVALID_EMIAL'] = "Invalid e-mail address";

$lang['DOWNLOAD_CHROME'] = "Download Google Chrome";
$lang['DOWNLOAD_FIREFOX'] = "Download Firefox";
$lang['UNSUPPORTED_API'] = "Your browser does not support the webcam API.";

//NEWSLETTER
$lang['NEWSLETTER'] = "Newsletter";
$lang['NEWSLETTER_SUBJECT'] = "Subject";
$lang['NEWSLETTER_MSG'] = "Message";
$lang['NEWSLETTER_SENDBUTTON'] = "Send";
$lang['NEWSLETTER_ERR'] = "Error";
$lang['NEWSLETTER_ERR_INVALID']= "One or more invalid inputs";
$lang['NEWSLETTER_ERR_SUBJECT_MAXCHAR'] = "Make sure the subject is not empty and it doesn't exceed 120 characters.";
$lang['NEWSLETTER_ERR_MSG_MAXCHAR'] = "Make sure the message is not empty and it doesn't exceed 3000 characters.";
$lang['NEWSLETTER_SENT'] = "Newsletter sent !";

$lang['NEWSLETTER_SENTSUCCESS_0'] = "Newsletter successfully sent to the following to ";
$lang['NEWSLETTER_SENTSUCCESS_1_SING'] = "person.";
$lang['NEWSLETTER_SENTSUCCESS_1_PL'] = "people.";
$lang['NEWSLETTER_NO_ERROR'] = "No error detected.";
$lang['NEWSLETTER_SENTERROR_SING'] = "Failed to deliver to the following e-mail address";
$lang['NEWSLETTER_SENTERROR_PL'] = "Failed to deliver to the following e-mail addresses";

//DATATABLE

$lang['DATATABLE_TITLE'] = "Title";
$lang['DATATABLE_START'] = "Start";
$lang['DATATABLE_END'] = "End";
$lang['DATATABLE_DIFFICULTY'] = "Difficulty";
$lang['DATATABLE_TYPE'] = "Type";
$lang['DATATABLE_CATEGORY'] = "Category";

//FOOTER
$lang['PAGES'] = "Pages";
$lang['HOME'] = "Home";
$lang['EXCURSIONS_CALENDAR'] = "Excursions - Calendar";
$lang['SUBSCRIBE_NEWSLETTER'] ="Subscribe to our newsletter.";
$lang['SUBSCRIBE_BUTTON'] = "Subscribe";
$lang['BECOME_MEMBER'] = "Become member";
$lang['FOR_MEMBERSHIP_CLICK_LINK'] = "To become a member of our section, please fill in the form on the following link : ";
$lang['CLICK_HERE'] = "Click here";