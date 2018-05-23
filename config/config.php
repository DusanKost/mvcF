<?php  

//Database config
const DB_NAME =  "mvcF"; //Database Name
const DB_HOST = '127.0.0.1'; //localhost
const DB_USER = 'root'; // DB User name
const DB_PASSWORD = '';  // DB User password
//Set project root 
const PROOT = '/mvcF/public/'; // set to '/' for a live server


//Set constants for the project
const SITE_TITLE = 'mvcF';
const DEFAULT_CONTROLLER = 'HomeController'; //default controller if no 1 is specified in url
const DEFAULT_RESTRICTED_CONTROLLER_404 = 'RestrictedController';//default 404 and restricted controller if no 1 is specified 
const DEFAULT_RESTRICTED_CONTROLLER_404_ACTION = 'pageNotFound';
const DEFAULT_FUNCTION = 'index'; // funkciju ili akciju koju pozvati po defaultu
const DEFAULT_LAYOUT = 'default';// if no layout is set in the controller use this layout
const DEFAULT_NAVBAR = 'navbar';// if no navbar specified default 1 is set

//Set the types of content for a view
const CONTENT_TYPE = ['head' => '','body' => '','script' => '']; 

//Set author and description
const AUTHOR = "Dusan Kostic";
const DESCRIPTION = "Practise MVC frameworck";

//Set cookie and session
const CURRENT_USER_SESSION_NAME = 'mfcFCurrentUserSession'; //session name for a loged in user
const REMEMBER_ME_COOKIE_NAME = 'mfcFCurrentUserCookie'; // cookie for a logged in user
const REMEMBER_ME_COOKIE_EXPIRY = 2592000; // time in seconds for remember me cookie to live 30 days
