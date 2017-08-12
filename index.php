<!-- Coded by Datageni @ HackForums -->

<?php
session_start(); ob_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require($_SERVER['DOCUMENT_ROOT'].'/inc/config.php');
require($_SERVER['DOCUMENT_ROOT'].'/inc/db.php');
require($_SERVER['DOCUMENT_ROOT'].'/inc/functions.php');

// Global sessions
if(isset($_SESSION['UID'])) { $UID = $_SESSION['UID']; }

// Global functions
IssetPage();
GetTimezone();

// All pages
switch($_GET['page'])
{
	case 'ajax': include("assets/ajax/ajax.php"); break;
	case 'login': include("pages/login.php"); break;
	case 'logout': include("pages/logout.php"); break;
	case 'dashboard': include("pages/dashboard.php"); break;
	case 'register': include("pages/register.php"); break;
	case 'score': include("pages/score.php"); break;
	case 'general-management': include("pages/general-management.php"); break;
	case 'user-management': include("pages/user-management.php"); break;
	case 'log-center': include("pages/log-center.php"); break;
	case 'manage-predictions': include("pages/manage-predictions.php"); break;
	case 'football': include("pages/football.php"); break;
	case 'subscriptions': include("pages/subscriptions.php"); break;
	case 'manage-subscriptions': include("pages/manage-subscriptions.php"); break;
	case 'edit-profile': include("pages/edit-profile.php"); break;
	default: include("pages/login.php"); break;
}

?>