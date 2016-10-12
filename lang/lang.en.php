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

$lang['WEBSITE_NAME'] = "Alpine club Switzerland";
$lang['CAS_HOMETOWN'] = "Crans-Montana";

//menu

$lang['CONNECT_MENU_BUTTON'] = "Connect";
$lang['DISCONNECT_MENU_BUTTON'] = "Disconnect";
$lang['PROXIMITY_MENU_BUTTON'] = "Near me";
$lang['ACTIVITIES_MENU_BUTTON'] = "Excursions";
$lang['CONTACT_MENU_BUTTON'] = "Contact";

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
$lang['MY_PERSONNAL_DATA'] = "My personnal data";
$lang['LOGOUT'] = "Logout";

//LOGIN CONTROLLER
$lang['LOGIN_TO_ACCESS_EVENTS'] = "Login to access excurions.";
$lang['MSG_TO_RECOVER_PASSWORD'] = "This message is here to help you recover your password : \nFollow this link : ".URL_DIR."/login/changepassword/";
$lang['CAS_PWD_RECOVERY'] = "CAS password recovery";
$lang['CREATE_ACCOUNT'] ="Create your account";

//SORTIE CONTROLLER
// DETAILS
$lang['BUTTON_PARTICIPATION_REQUEST'] = "I want to participate ";
$lang['BUTTON_FIND_ROUTE'] = "Find a route ";
$lang['FIELD_DISTANCE'] = "Distance ";
$lang['FIELD_ALTITUDE'] = "Altitude ";
$lang['FIELD_DIFFICULTY'] = "Difficulty ";
$lang['FIELD_MAX_PARTICIPANT'] = "Max participants ";
$lang['FIELD_CATEGORY'] = "Category ";

$lang['FIELD_TRAIL_MASTER'] = "Trail master ";
$lang['FIELD_NAME'] = "Name ";
$lang['FIELD_EMAIL'] = "Email ";
$lang['FIELD_TELEPHONE'] = "Tel. ";

//Welcome
$lang['USER_EVENTS_NO_DATA'] = "No events to show.";
$lang['WELCOME_H1_LISTEVENTS'] = "List of events you are subscribed to.";

//Welcome
$lang['USER_EVENTS_NO_DATA'] = "No events to show.";
$lang['WELCOME_H1_LISTEVENTS'] = "List of events you are subscribed to.";

//ERROR MESSAGES
$lang['E_REQUIRED_FIELD_EMPTY'] = "A reqired field is empty.";
$lang['E_USERNAME_PASSWORD_INCORRECT'] = "Username or password incorrect.";
$lang['E_FAILED_TO_DELIVER_EMAIL'] = "Email delivery failed.";
$lang['E_KEY_REJECTED'] = "Key out of date or invalid, please recover again.";
$lang['E_PASSWORDS_DONT_MATCH'] = "Passwords don't match";

//SUCCCESS MESSAGES
$lang['S_RECOVERY_MAIL_SENT'] = "A recovery email was sent to your address.";
$lang['S_PASSWORD_CHANGE_SUCCESSFUL'] = "Password change successful.";
$lang['S_REGISTRATION_SUCCESSFUL'] = "Registration successful";
$lang['S_CHANGES_SUCCESSFUL'] = "Changes successful";

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