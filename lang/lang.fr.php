<?php
/**
 * Created by PhpStorm.
 * User: Trah
 * Date: 04/10/2016
 * Time: 10:40
 */

/*
 * Language : Français
 */
$lang = array();

//misc

$lang['WEBSITE_NAME'] = "Club Alpin Suisse";
$lang['CAS_HOMETOWN'] = "Crans-Montana";
$lang['CAS_MAIL'] = "casphphes@gmail.com";
$lang['CAS_PHONE'] = "+41 27 000 00 00";
$lang['SEO_TITLE'] = "Club alpin suisse";
$lang['SEO_DESCRIPTION'] = "Le club alpin suisse est...";
//menu

$lang['CONNECT_MENU_BUTTON'] = "Connection";
$lang['DISCONNECT_MENU_BUTTON'] = "Déconnection";
$lang['PROXIMITY_MENU_BUTTON'] = "Carte";
$lang['ACTIVITIES_MENU_BUTTON'] = "Excursions";
$lang['CONTACT_MENU_BUTTON'] = "Contact";
$lang['PROFIL_MENU_BUTTON'] = "Profil";
//Home

$lang['WELCOME_MESSAGE'] = "Bienvenue les montagnards!";

//Login

$lang['EMAIL'] = "E-mail";
$lang['PASSWORD'] = "Mot de passe";
$lang['OK_BUTTON'] = "OK";
$lang['FORGOT_PASSWORD'] = "Mot de passe oublié?";
$lang['RESET_PASSWORD'] = "Réinitialiser le mot de passe";
$lang['NO_ACCOUNT'] = "Pas de compte?";
$lang['REGISTER'] = "S'enregistrer";

//RESETPASSWORD

$lang['PASSWORD_RECOVERY'] = "Récupération de mot de passe";

//NEWUSER
$lang['FIRSTNAME'] = "Prénom";
$lang['LASTNAME'] = "Nom";
$lang['PHONE'] = "N°Tel";
$lang['MEMBER_NUMBER_IF_EXISTS'] ="Numéro de membre (si existant)";
$lang['LOGIN'] = "Se connecter";

//CHANGEPASSWORD
$lang['PASSWORD_CHANGE'] = "Changer le mot de passe";
$lang['NEW_PASSWORD'] = "Nouveau mot de passe";
$lang['CHANGE'] = "Changer";

//WELCOME
$lang['WELCOME'] = "Bienvenue";
$lang['CHANGE_DATA'] = "Changer les données";
$lang['MY_PERSONNAL_DATA'] = "Mes données personnelles";
$lang['LOGOUT'] = "Se déconnecter";
$lang['WELCOME_DATE_START'] = "Date début";
$lang['WELCOME_DATE_END'] = "Date fin";
$lang['WELCOME_STATUS'] = "Statut";
$lang['WELCOME_TITLE'] = "Titre";


//LOGIN CONTROLLER
$lang['LOGIN_TO_ACCESS_EVENTS'] = "Connectez vous pour accéder aux excursions.";
$lang['MSG_TO_RECOVER_PASSWORD'] = "Ce message est la pour vous aider a récupérer votre mot de passe : \nSuivez ce lien : ".URL_DIR."/login/changepassword/";
$lang['CAS_PWD_RECOVERY'] = "CAS Récupération de mot de passe";
$lang['CREATE_ACCOUNT'] ="Créez votre compte";

//SORTIE CONTROLLER

//SORTIES
$lang['RANDONNEES'] = "Randonnées";
$lang['SORTIES'] = "Sorties";
$lang['ANCIENEVENT'] = "Evènement passé";

// DETAILS
$lang['BUTTON_PARTICIPATION_REQUEST'] = "Je veux participer !";
$lang['BUTTON_PARTICIPATION_REQUEST_ALREADY'] = "Je participe déjà ";
$lang['BUTTON_PARTICIPATION_REQUEST_ALREADY_TOOLTIP'] = "Vous participez déjà à cet évènement";
$lang['BUTTON_PARTICIPATION_REQUEST_MEMBER_TOOLTIP'] = "Vous devez être membre pour vous inscrire";
$lang['BUTTON_FIND_ROUTE'] = "Trouver les transports ";
$lang['FIELD_DISTANCE'] = "Distance ";
$lang['FIELD_ALTITUDE'] = "Dénivelé ";
$lang['FIELD_DIFFICULTY'] = "Difficulté ";
$lang['FIELD_MAX_PARTICIPANT'] = "Participants max. ";
$lang['FIELD_CATEGORY'] = "Catégorie ";

$lang['FIELD_TRAIL_MASTER'] = "Chef de course ";
$lang['FIELD_NAME'] = "Nom ";
$lang['FIELD_EMAIL'] = "E-mail ";
$lang['FIELD_TELEPHONE'] = "N°tel. ";

$lang['SAVE_BUTTON'] = "Sauvegarder les changements";
$lang['MODIFY_BUTTON'] = "Modifier la course";

$lang['SELECT_MODIFY'] = "Modifier";
$lang['SELECT_SUBMITTED'] = "En attente";
$lang['SELECT_ACCEPTED'] = "Accepté";
$lang['SELECT_REFUSED'] = "Refusé";

$lang['PARTICIPANTS_NAME'] = "Nom";
$lang['PARTICIPANTS_PHONE'] = "Téléphone";
$lang['PARTICIPANTS_EMAIL'] = "E-mail";
$lang['PARTICIPANTS_STATUS'] = "Statut";
$lang['PARTICIPANTS_MODIFY'] = "Modifier";
$lang['PARTICIPANTS_SELECT_SUBMITTED'] = "Soumis";
$lang['PARTICIPANTS_SELECT_REFUSED'] = "Refusé";
$lang['PARTICIPANTS_SELECT_ACCEPTED'] = "Accepté";

//Save new user

$lang['SUBJECT_APPLIANCE'] = "Votre demande de participation";
$lang['SUBJECT_MODIFICATION'] = "Modification de votre participation";


//Welcome
$lang['USER_EVENTS_NO_DATA'] = "Aucune excursion à afficher.";
$lang['WELCOME_H1_LISTEVENTS'] = "Liste des excursions auxquelles vous êtes inscrit.";

//ERROR MESSAGES
$lang['E_REQUIRED_FIELD_EMPTY'] = "Un des champs reqis est vide.";
$lang['E_USERNAME_PASSWORD_INCORRECT'] = "Nom d'utilisateur ou mot de passe incorrect.";
$lang['E_FAILED_TO_DELIVER_EMAIL'] = "Echec de l'envoi d'un mail de récupération.";
$lang['E_KEY_REJECTED'] = "Votre clé de récupération est invalide ou périméée, veuillez récupérer à nouveau le mot de passe.";
$lang['E_PASSWORDS_DONT_MATCH'] = "Les mots de passe ne correspondent pas";

//SUCCCESS MESSAGES
$lang['S_RECOVERY_MAIL_SENT'] = "Un e-mail de récupération à été envoyé à votre adresse..";
$lang['S_CONTACT_MAIL_SENT'] = "Un e-mail de contact a été envoyé, nous y réponderons aussi vite que possible.";
$lang['S_PASSWORD_CHANGE_SUCCESSFUL'] = "Mot de passe changé.";
$lang['S_REGISTRATION_SUCCESSFUL'] = "Enregistrement terminé";
$lang['S_CHANGES_SUCCESSFUL'] = "Changements effectués";
$lang['S_CHANGES_ERROR'] = "Une erreur de syntaxe est survenue dans l'un des champs du formulaire.";

//WARNING MESSAGES
$lang['W_DIFFICULTY_TRAIL'] = "Grande difficulté";

//Mail content
$lang['REGISTRATION_MAIL_TITLE'] = "Bienvenue sur le site du CAS !";
$lang['REGISTRATION_MAIL_BODY'] = "Ceci est un message automatique pour vous informer de votre inscription à notre site.";

//ajouter une course
$lang['ADD_TRAIL'] = "Ajouter une course";
$lang['TRAIL_TITLE'] = "Titre";
$lang['TRAIL_MAX_PEOPLE'] = "Paricipants max.";
$lang['TRAIL_CATEGORY'] = "Catégorie";
$lang['TRAIL_DIFFICULTY'] = "Difficulté";
$lang['TRAIL_STARTDATE'] = "Temps de départ";
$lang['TRAIL_ENDDATE'] = "Temps de fin";
$lang['TRAIL_DESCRIPTION'] = "Description de la course";
$lang['TRAIL_MAP'] = "Course";
$lang['TRAIL_MAP_INSTRUCTIONS'] = "Cliquez sur la carte pour dessinner la course";
$lang['TRAIL_MAP_DELETELAST'] = "Supprimer le dernier point";
$lang['TRAIL_MAP_DELETEALL'] = "Supprimer tous les points";
$lang['TRAIL_MAP_DELETETRAIL'] = "Supprimer l'évènement";
$lang['TRAIL_MAP_UPDATETRAIL'] = "Sauvegarder les modifications";
$lang['TRAIL_MAP_SAVETRAIL'] = "Sauvegarder l'évènement";

//catégories de courses
$lang['TRAIL_CAT_1'] = "Marche";
$lang['TRAIL_CAT_2'] = "Ski hors piste";
$lang['TRAIL_CAT_3'] = "Grimpe";
$lang['TRAIL_CAT_4'] = "Raquette";
$lang['TRAIL_CAT_5'] = "Ski";
$lang['TRAIL_CAT_6'] = "Snowboard";
$lang['TRAIL_CAT_7'] = "Télémark";
$lang['TRAIL_CAT_8'] = "Ski de fond";

//difficultés des courses
$lang['TRAIL_DIFF_1'] = 'Débutant';
$lang['TRAIL_DIFF_2'] = 'Intermédiaire';
$lang['TRAIL_DIFF_3'] = 'Avancé';
$lang['TRAIL_DIFF_4'] = 'Tres Avancé';
$lang['TRAIL_DIFF_5'] = 'Professionnel';

//INSCRIPTION TO EVENT
$lang['INSCRIPTION_NUMBER_PARTICIPANTS'] = "Entrez le nombre de participants";
$lang['SEND'] = "Envoyer";

//CONTACT CONTROLLER
$lang['CONTACT_US'] = 'Contactez nous';
$lang['LEAVE_VIDEO_MSG'] = "Laissez un message video";

//-- Modal
$lang['CONTACT_SEND_BUTTON'] = "Envoyer";
$lang['CONTACT_CLOSE_BUTTON'] = "Fermer";
$lang['CONTACT_YOUR_EMAIL'] = "Votre adresse e-mail";

$lang['CONTACT_FORM'] = "Formulaire de contact";
$lang['CONTACT_NAME'] = "Nom";
$lang['CONTACT_SUBJECT'] = "Sujet";
$lang['CONTACT_MESSAGE'] = "Message";
$lang['CONTACT_LEAVE_VIDEO_MESSAGE'] = "Laisser un message audio-visuel";
$lang['CONTACT_VIDEO_PREVIEW'] = "Prévisualisation de votre vidéo";
$lang['CONTACT_INVALID_EMIAL'] = "Adresse e-mail invalide";

$lang['DOWNLOAD_CHROME'] = "Télécharger Google Chrome";
$lang['DOWNLOAD_FIREFOX'] = "Télécharger Firefox";
$lang['UNSUPPORTED_API'] = "Votre navigateur ne supporte pas l'API webcam";

//NEWSLETTER
$lang['NEWSLETTER'] = "Newsletter";
$lang['NEWSLETTER_SUBJECT'] = "Sujet";
$lang['NEWSLETTER_MSG'] = "Message";
$lang['NEWSLETTER_SENDBUTTON'] = "Envoyer";
$lang['NEWSLETTER_ERR'] = "Erreur";
$lang['NEWSLETTER_ERR_INVALID']= "Un ou plusieurs champs sont invalides.";
$lang['NEWSLETTER_ERR_SUBJECT_MAXCHAR'] = "Assurez-vous que le sujet n'est pas vide et qu'il n'excède pas 120 caractères.";
$lang['NEWSLETTER_ERR_MSG_MAXCHAR'] = "Assurez-vous que le message n'est pas vide et qu'il n'excède pas 3000 caractères.";
$lang['NEWSLETTER_SENT'] = "Newsletter envoyée !";

$lang['NEWSLETTER_SENT_NOSUBSCRIBERS'] = "Aucune newsletter envoyée. Il se peut que personne ne soit souscrit à votre site ou des erreurs d'envoi se sont produites.";
$lang['NEWSLETTER_SENTSUCCESS_0'] = "La newsletter a été remise avec succès à ";
$lang['NEWSLETTER_SENTSUCCESS_1_SING'] = "personne.";
$lang['NEWSLETTER_SENTSUCCESS_1_PL'] = "personnes.";
$lang['NEWSLETTER_NO_ERROR'] = "Aucune erreur d'envoi détectée.";
$lang['NEWSLETTER_SENTERROR_SING'] = "La newsletter n'a pas été remise à l'adresse suivante";
$lang['NEWSLETTER_SENTERROR_PL'] = "La newsletter n'a pas été remise aux adresses suivantes";

//DATATABLE

$lang['DATATABLE_TITLE'] = "Titre";
$lang['DATATABLE_START'] = "Début";
$lang['DATATABLE_END'] = "Fin";
$lang['DATATABLE_DIFFICULTY'] = "Difficulté";
$lang['DATATABLE_TYPE'] = "Type";
$lang['DATATABLE_CATEGORY'] = "Catégorie";

//FOOTER
$lang['PAGES'] = "Pages";
$lang['HOME'] = "Home";
$lang['EXCURSIONS_CALENDAR'] = "Excursions - Calendrier";
$lang['SUBSCRIBE_NEWSLETTER'] ="Inscrivez vous à notre newsletter.";
$lang['SUBSCRIBE_BUTTON'] = "S'inscrire";
$lang['BECOME_MEMBER'] = "Devenir membre";
$lang['FOR_MEMBERSHIP_CLICK_LINK'] = "Pour devenir un membre de notre section, veuillez remplir le formulaire sur ce lien : ";
$lang['CLICK_HERE'] = "Cliquez ici";