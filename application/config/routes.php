<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'home';

/**** User routes ****/
$route['/'] = 'home';
$route['home'] = 'home';
$route['about-us'] = 'home/about_us';
$route['services'] = 'services';
$route['blogs'] = 'blogs';
$route['contact-us'] = 'contactus';
$route['submit-contact'] = 'contactus/submit_contact';
$route['privacy-policy'] = 'policy/privacy_policy';
$route['terms-conditions'] = 'policy/terms_conditions';
$route['cancel-policy'] = 'policy/cancel_policy';
$route['refund-policy'] = 'policy/refund_policy';











/**** Admin routes ****/
$route['admin'] = 'admin/Auth/index';
$route['admin/login'] = 'admin/Auth/login';
$route['admin/logout'] = 'admin/Auth/logout';
$route['admin/forgot-password'] = 'admin/Auth/forgot_password';
$route['admin/reset-password'] = 'admin/Auth/reset_password';

$route['admin/dashboard'] = 'admin/Home/dashboard';

$route['admin/settings'] = 'admin/Auth/edit_profile';
$route['admin/change-profile-password'] = 'admin/Auth/change_profile_password';

$route['admin/company-details'] = 'admin/Home/company_details';
$route['admin/update-company-details'] = 'admin/Home/update_company_details';
$route['admin/invoice-settings'] = 'admin/Home/invoice_settings';
$route['admin/update-invoice-settings'] = 'admin/Home/update_invoice_settings';
$route['admin/contactus'] = 'admin/Contact/index';

$route['admin/homepage-details'] = 'admin/Pages/homepage_details';
$route['admin/update-homepage-details'] = 'admin/Pages/update_homepage_details';

$route['admin/aboutpage-details'] = 'admin/Pages/aboutpage_details';
$route['admin/update-aboutpage-details'] = 'admin/Pages/update_aboutpage_details';

$route['admin/privacy-policy-page-details'] = 'admin/Pages/privacy_policy_page_details';
$route['admin/update-privacy-policy-page-details'] = 'admin/Pages/update_privacy_policy_page_details';

$route['admin/terms-conditions-page-details'] = 'admin/Pages/terms_conditions_page_details';
$route['admin/update-terms-conditions-page-details'] = 'admin/Pages/update_terms_conditions_page_details';

$route['admin/cancellation-returns-policy-page-details'] = 'admin/Pages/cancellation_returns_policy_page_details';
$route['admin/update-cancellation-returns-policy-page-details'] = 'admin/Pages/update_cancellation_returns_policy_page_details';

$route['admin/refund-policy-page-details'] = 'admin/Pages/refund_policy_page_details';
$route['admin/update-refund-policy-page-details'] = 'admin/Pages/update_refund_policy_page_details';

$route['admin/shipping-policy-page-details'] = 'admin/Pages/shipping_policy_page_details';
$route['admin/update-shipping-policy-page-details'] = 'admin/Pages/update_shipping_policy_page_details';

$route['admin/category-list'] = 'admin/Category/category_list';
$route['admin/add-category'] = 'admin/Category/add_category';
$route['admin/category-commit'] = 'admin/Category/category_commit';
$route['admin/edit-category/(:any)'] = 'admin/Category/edit_category/$1';
$route['admin/delete-category/(:any)'] = 'admin/Category/delete_category/$1';


$route['admin/slider-list'] = 'admin/Slider/slider_list';
$route['admin/add-slider'] = 'admin/Slider/add_slider';
$route['admin/slider-commit'] = 'admin/Slider/slider_commit';
$route['admin/edit-slider/(:any)'] = 'admin/Slider/edit_slider/$1';
$route['admin/delete-slider/(:any)'] = 'admin/Slider/delete_slider/$1';

$route['admin/testimonials-list'] = 'admin/Testimonials/testimonials_list';
$route['admin/add-testimonials'] = 'admin/Testimonials/add_testimonials';
$route['admin/testimonials-commit'] = 'admin/Testimonials/testimonials_commit';
$route['admin/edit-testimonials/(:any)'] = 'admin/Testimonials/edit_testimonials/$1';
$route['admin/delete-testimonials/(:any)'] = 'admin/Testimonials/delete_testimonials/$1';


/*** for invoice save and download ***/
$route['admin/view-invoice/(:any)'] = 'admin/Orders/generate_invoice/$1';
$route['admin/save-invoice/(:any)'] = 'admin/Orders/save_invoice/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
