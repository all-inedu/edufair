<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'HomeController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['api/country/(:any)'] = 'ApiController/showCountry/$1';
$route['api/country/(:any)'] = 'ApiController/showCountry/$1';
$route['api/participant/(:any)'] = 'ApiController/showParticipant/$1';
$route['api/registrant'] = 'ApiController/showRegistrant';
$route['api/user/lead'] = 'ApiController/showUserLead';
$route['api/user/topic'] = 'ApiController/showUserTopic';
$route['api/user/consult/(:num)'] = 'ApiController/showUserConsult/$1';

/* VIEW START HERE */
$route['registration'] = 'RegisterController/view';
$route['registration/topic'] = 'RegisterController/topic';
$route['registration/submit'] = 'RegisterController/register';
$route['registration/consult'] = 'RegisterController/book';

$route['home/dashboard'] = 'HomeController/dashboard';
/* VIEW END HERE */

/* PROCESS START HERE */
$route['registration/topic/booking'] = 'RegisterController/bookingTopic';
$route['registration/consult/booking'] = 'RegisterController/bookingConsult';
$route['forgot-password'] = 'HomeController/forgotPassword';
$route['reset-password/token/(:any)'] = 'HomeController/resetPassword';
$route['reset-password'] = 'HomeController/updatePassword';
$route['login'] = 'HomeController/login';
$route['logout'] = 'HomeController/logout';
$route['home/book/topic'] = 'HomeController/bookingTopic';
$route['home/cancel/(:any)'] = 'HomeController/cancelBooking';
$route['request/getAllDataLead'] = 'RegisterController/getAllDataLead';
$route['home/dashboard/update/information'] = 'HomeController/updateInformation';
$route['home/waiting-list'] = 'HomeController/insertToWaitingList';
$route['verify/token/(:any)'] = 'RegisterController/getTokenVerifyEmail';
/* PROCESS END HERE */


// ADMIN FUNCTION 
$route['admin'] = 'AdminController/login';
$route['admin/auth'] = 'AdminController/auth';
$route['admin/logout'] = 'AdminController/logout';

$route['dashboard/admin'] = 'AdminController/index';

//* New */
$route['dashboard/admin/faq'] = 'AdminController/indexFaq';
$route['resend/verification-link'] = 'RegisterController/resendVerificationLink';

$route['dashboard/admin/topic'] = 'AdminController/indexTopic';
$route['dashboard/admin/topic/add'] = 'AdminController/addTopic';
$route['dashboard/admin/topic/submit'] = 'AdminController/saveTopic';
$route['dashboard/admin/topic/inactive/(:num)'] = 'AdminController/inactiveTopic/$1';
$route['dashboard/admin/topic/active/(:num)'] = 'AdminController/activeTopic/$1';
$route['dashboard/admin/topic/edit/(:num)'] = 'AdminController/editTopic/$1';
$route['dashboard/admin/topic/update'] = 'AdminController/updateTopic';

$route['dashboard/admin/uni'] = 'AdminController/indexUni';
$route['dashboard/admin/uni/add'] = 'AdminController/addUni';
$route['dashboard/admin/uni/submit'] = 'AdminController/saveUni';
$route['dashboard/admin/uni/edit/(:any)'] = 'AdminController/editUni/$1';
$route['dashboard/admin/uni/update'] = 'AdminController/updateUni';
$route['dashboard/admin/uni/delete/(:num)'] = 'AdminController/deleteUni/$1';

$route['dashboard/admin/uni/consult/add'] = 'AdminController/saveUniConsult';
$route['dashboard/admin/uni/consult/edit/(:num)'] = 'AdminController/editUniConsult/$1';
$route['dashboard/admin/uni/consult/update'] = 'AdminController/updateUniConsult';
$route['dashboard/admin/uni/consult/delete/(:num)'] = 'AdminController/deleteUniConsult/$1';

$route['dashboard/admin/user/(:any)'] = 'AdminController/indexUser/$1';
// $route['dashboard/admin/user/view/(:any)'] = 'AdminController/editUser/$1';
$route['dashboard/admin/user/export/excel'] = 'AdminController/exportUser';

$route['dashboard/admin/book/topic'] = 'AdminController/indexBookTopic';
$route['dashboard/admin/book/export/topic'] = 'AdminController/exportBookTopic';

$route['dashboard/admin/book/consult'] = 'AdminController/indexBookConsult';
$route['dashboard/admin/book/export/consult'] = 'AdminController/exportBookConsult';

$route['dashboard/admin/waiting/consult/(:any)'] = 'AdminController/waitingList/$1';
// END FUNCTION ADMIN 

// $route['welcome'] = 'ReminderController/welcome';
$route['reminder-h7'] = 'ReminderController/reminderh7';
$route['reminder-h3'] = 'ReminderController/reminderh3';
$route['reminder-h1'] = 'ReminderController/reminderh1';
$route['reminder-d1'] = 'ReminderController/reminderd1';
$route['reminder-d2'] = 'ReminderController/reminderd2';
$route['see-you']      = 'ReminderController/thanks';