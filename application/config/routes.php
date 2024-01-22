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
$route['default_controller'] = 'Home';

//admin
$route['admin'] = 'administrator/Login/index';
$route['adminloginform'] = 'administrator/Login/log';
$route['adminlogin'] = 'administrator/Login/index';
$route['adminhome'] = 'administrator/Home/index';
$route['footer_info'] = 'administrator/Home/footer_info';
$route['admin_newslatter'] = 'administrator/Home/newslatter';
$route['admin_homepage'] = 'administrator/Home/homepage';
$route['pages_setting'] = 'administrator/Pages';
$route['contactpages_setting'] = 'administrator/Pages/contactinfo';

$route['quizarea'] = 'administrator/Quiz';
$route['quizadd'] = 'administrator/Quiz/add';
$route['quiz_edit/(:any)'] = 'administrator/Quiz/edit/$1';
$route['quiz_delete/(:any)'] = 'administrator/Quiz/delete/$1';

$route['admin_faq'] = 'administrator/Home/faq';


// User 
$route['login'] = 'Login';
$route['User'] = 'User/index';
$route['Newuser'] = 'User/add';
$route['History'] = 'User/history';
$route['Profile'] = 'User/profile';
$route['Account'] = 'User/useraccount';
$route['Profileedit'] = 'User/edit';


$route['test'] = 'Home/test';
$route['selectplan/(:any)'] = 'Home/selectplan/$1';
$route['payment/(:any)/(:any)'] = 'Home/payment/$1/$2';

$route['contactus'] = 'Home/contact';
$route['contact'] = 'Home/contact';
$route['faq'] = 'Home/faq';
$route['privacy_policy'] = 'Home/privacy_policy';
$route['termsandcondition'] = 'Home/termsandcondition';



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

