<?php
defined('BASEPATH') or exit('No direct script access allowed');

//TESTING CRED
// $config['razorpay_key_id']                  = "rzp_test_RP3TN3TK7qWSlL";
// $config['razorpay_secret_key']              = "MUa2RMXrvIy0Ov0C3hE24jkd";

//LIVE CRED
// $config['razorpay_key_id']                  = "rzp_test_RP3TN3TK7qWSlL";
// $config['razorpay_secret_key']              = "MUa2RMXrvIy0Ov0C3hE24jkd";


$config['razorpay_key_id']                  = "rzp_test_RP3TN3TK7qWSlL";    // Replace with your Razorpay KEY ID
$config['razorpay_secret_key']              = "MUa2RMXrvIy0Ov0C3hE24jkd";   // Replace with your Razorpay Secret Key
$config['razorpay_mode']                    = "TEST";              // TEST or PRODUCTION
$config['razorpay_production_endpoint']     = "https://api.razorpay.com/v1";    // PRODUCTION endpoint
$config['razorpay_test_endpoint']           = "https://api.razorpay.com/v1";    // TEST endpoint
