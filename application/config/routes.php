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

$route['aboutus'] = 'home/about_us';

$route['contact-us'] = 'contactus';
$route['submit-contact'] = 'contactus/submit_contact';

$route['products'] = 'products';
$route['products/category/(:any)'] = 'products/category/$1';
$route['products-detail/(:any)'] = 'products/product_detail/$1';

$route['ratings/submit'] = 'ratings/submit';

$route['privacy-policy'] = 'policy/privacy_policy';
$route['terms-conditions'] = 'policy/terms_conditions';
$route['cancel-policy'] = 'policy/cancel_policy';
$route['refund-policy'] = 'policy/refund_policy';
$route['shipping-policy'] = 'policy/shipping_policy';

$route['register'] = 'users/auth/register';
$route['login'] = 'users/auth/login';
$route['logout'] = 'users/auth/logout';
$route['forgot-password'] = 'users/auth/forgot_password';
$route['reset-password'] = 'users/auth/reset_password';

$route['submit-register'] = 'users/auth/submit_register';
$route['submit-login'] = 'users/auth/submit_login';
$route['submit-forgot-password'] = 'users/auth/submit_forgot_password';

$route['user/dashboard'] = 'users/account/dashboard';
$route['user/orders'] = 'users/account/orders';
$route['user/address-details'] = 'users/account/address_details';
$route['user/change-password'] = 'users/account/change_password';

$route['user/update-account-details'] = 'users/account/update_account_details';
$route['user/update-account-password'] = 'users/account/update_account_password';
$route['user/save-billing-address'] = 'users/account/save_billing_address';
$route['user/save-shipping-address'] = 'users/account/save_shipping_address';
$route['user/delete-address/(:any)'] = 'users/account/delete_address/$1';

$route['user/view-invoice/(:any)'] = 'users/account/generate_invoice/$1';
$route['user/save-invoice/(:any)'] = 'users/account/save_invoice/$1';

$route['cart'] = 'cart';
$route['cart/add'] = 'cart/add';
$route['cart/update'] = 'cart/update_qty';
$route['cart/remove'] = 'cart/remove';
$route['cart/get_cart'] = 'cart/get_cart';

// Checkout Page
$route['checkout'] = 'checkout/index';
// Place Order (POST)
$route['checkout/place-order'] = 'checkout/place_order';
// Cashfree Callback/Return URL
$route['checkout/cashfree-callback'] = 'checkout/cashfree_callback';
// Order Success & Failure
$route['checkout/success/(:num)'] = 'checkout/success/$1';
$route['checkout/failure/(:num)'] = 'checkout/failure/$1';










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

$route['admin/products-list'] = 'admin/Products/products_list';
$route['admin/add-products'] = 'admin/Products/add_products';
$route['admin/products-commit'] = 'admin/Products/products_commit';
$route['admin/edit-products/(:any)'] = 'admin/Products/edit_products/$1';
$route['admin/view-products-details/(:any)'] = 'admin/Products/view_products_details/$1';
$route['admin/delete-products/(:any)'] = 'admin/Products/delete_products/$1';
$route['admin/delete-products-image/(:any)'] = 'admin/Products/delete_products_image/$1';

$route['admin/category-list'] = 'admin/Category/category_list';
$route['admin/add-category'] = 'admin/Category/add_category';
$route['admin/category-commit'] = 'admin/Category/category_commit';
$route['admin/edit-category/(:any)'] = 'admin/Category/edit_category/$1';
$route['admin/delete-category/(:any)'] = 'admin/Category/delete_category/$1';

$route['admin/orders-list'] = 'admin/Orders/orders_list';
$route['admin/view-order-details/(:any)'] = 'admin/Orders/view_order_details/$1';
$route['admin/edit-order-status/(:any)'] = 'admin/Orders/edit_order_status/$1';
$route['admin/order-status-commit'] = 'admin/Orders/order_status_commit';

$route['admin/users-list'] = 'admin/Users/users_list';
$route['admin/view-user-details/(:any)'] = 'admin/Users/view_users_details/$1';

$route['admin/payments-list'] = 'admin/Payments/payments_list';

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

$route['admin/coupon-list'] = 'admin/Coupon/coupon_list';
$route['admin/add-coupon'] = 'admin/Coupon/add_coupon';
$route['admin/coupon-commit'] = 'admin/Coupon/coupon_commit';
$route['admin/edit-coupon/(:any)'] = 'admin/Coupon/edit_coupon/$1';
$route['admin/delete-coupon/(:any)'] = 'admin/Coupon/delete_coupon/$1';


/*** for invoice save and download ***/
$route['admin/view-invoice/(:any)'] = 'admin/Orders/generate_invoice/$1';
$route['admin/save-invoice/(:any)'] = 'admin/Orders/save_invoice/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
