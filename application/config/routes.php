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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'pages/showIndex';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| PUBLIC PAGES ROUTES
| -------------------------------------------------------------------------
*/
$route['events'] = 'pages/showEvents';
$route['requests'] = 'pages/showRequests';
$route['about'] = 'pages/showAbout';

$route['contactus'] = 'pages/sendMessage';

$route['devotion'] = 'pages/showDevotion';
$route['devotion/comment/post'] = 'pages/postWMcomment';

$route['gallery'] = 'gallery/showIndex';
$route['gallery/health'] = 'gallery/showHealth';
$route['gallery/love'] = 'gallery/showLove';
$route['gallery/music'] = 'gallery/showMusic';
$route['gallery/december'] = 'gallery/showDecember';
$route['gallery/training'] = 'gallery/showTraining';
$route['gallery/matters'] = 'gallery/showMatters';
$route['gallery/fellowship'] = 'gallery/showFellowship';

$route['login'] = 'public/auth/showLogin';
$route['login/auth'] = 'public/auth/login';
$route['logout'] = 'public/auth/logout';
$route['signup'] = 'public/applicant/application';
$route['signup/success'] = 'public/applicant/showSuccess';
$route['verifyaccount/verify'] = 'public/auth/verifyAccount';
$route['verifyaccount/success'] = 'public/auth/showVerificationsuccess';
$route['verifyaccount/(:any)'] = 'public/auth/showVerification/$1';
//$route['about'] = 'about/showIndex';
//$route['devotion'] = 'devotion/showIndex';

/*
| -------------------------------------------------------------------------
| ADMIN ROUTES
| -------------------------------------------------------------------------
*/
$route['admin'] = 'admin/admin/showLogin';
$route['admin/login'] = 'admin/admin/showLogin';
$route['admin/auth'] = 'admin/admin/login';
$route['admin/dashboard'] = 'admin/dashboard/showIndex';
$route['admin/logout'] = 'admin/admin/logout';

$route['admin/members'] = 'admin/members/showMembers';
$route['admin/members/view/(:any)'] = 'admin/members/viewMember/$1';
$route['admin/members/add'] = 'admin/members/addMember';
$route['admin/members/edit/(:any)'] = 'admin/members/editMember/$1';
$route['admin/members/delete/(:any)'] = 'admin/members/removeMember/$1';

$route['admin/applications'] = 'admin/applicants/showApplications';
$route['admin/applications/view/(:any)'] = 'admin/applicants/viewApplication/$1';
$route['admin/applications/approve/(:any)'] = 'admin/applicants/approveApplication/$1';
$route['admin/applications/reject/(:any)'] = 'admin/applicants/rejectApplication/$1';

$route['admin/pages/info'] = 'admin/info/viewInfo';
$route['admin/pages/info/edit'] = 'admin/info/editInfo';

$route['admin/pages/gallery'] = 'admin/gallery/showGallery';
$route['admin/pages/gallery/view/(:any)'] = 'admin/gallery/viewAlbum/$1';
$route['admin/pages/gallery/add'] = 'admin/gallery/addAlbum';
$route['admin/pages/gallery/view/(:any)/upload'] = 'admin/gallery/uploadPhotos/$1';

$route['admin/pages/events'] = 'admin/events/showList';
$route['admin/pages/events/view/(:any)'] = 'admin/events/viewEvent/$1';
$route['admin/pages/events/add'] = 'admin/events/addEvent';
$route['admin/pages/events/edit/(:any)'] = 'admin/events/editEvent/$1';
$route['admin/pages/events/delete/(:any)'] = 'admin/events/removeEvent/$1';

$route['admin/pages/weeklymessage'] = 'admin/weeklymessage/showList';
$route['admin/pages/weeklymessage/view/(:any)'] = 'admin/weeklymessage/viewMessage/$1';
$route['admin/pages/weeklymessage/add'] = 'admin/weeklymessage/addMessage';
$route['admin/pages/weeklymessage/edit/(:any)'] = 'admin/weeklymessage/editMessage/$1';
$route['admin/pages/weeklymessage/delete/(:any)'] = 'admin/weeklymessage/removeMessage/$1';
$route['admin/pages/weeklymessage/comments/(:any)'] = 'admin/weeklymessage/showComments/$1';
$route['admin/pages/weeklymessage/comments/delete/(:any)'] = 'admin/weeklymessage/removeComment/$1';
