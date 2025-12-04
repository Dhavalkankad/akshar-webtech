<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// $autoloadPath = APPPATH . '../vendor/autoload.php';
// if (file_exists($autoloadPath)) {
//     require_once $autoloadPath;
// } else {
//     die("Autoload file not found: $autoloadPath");
// }

if (!function_exists('p')) {
    function p($data = "")
    {
        echo "<pre>";
        print_r($data);
        exit;
    }
}

if (!function_exists('settings')) {
    function settings()
    {
        $CI = &get_instance();
        $CI->load->database();
        $q = $CI->db->query('SELECT * FROM `company_settings`');
        return $q->row();
    }
}

if (!function_exists('dateFormat')) {
    function dateFormat($date = "", $time = false)
    {
        $return = "";
        if (isset($time) && ($time == true)) {
            $return = date("d/m/Y", strtotime($date));
        } else {
            $return = date("d/m/Y H:i", strtotime($date));
        }
        return $return;
    }
}

if (!function_exists('encrypt')) {
    function encrypt($data = "")
    {
        return base64_encode($data);
    }
}

if (!function_exists('decrypt')) {
    function decrypt($data = "")
    {
        return base64_decode($data);
    }
}

if (!function_exists('header_category')) {
    function header_category()
    {
        $CI = &get_instance();
        $CI->load->database();
        $q = $CI->db->query('SELECT * FROM `categories` WHERE `status` = "1" AND `parent_id` = "0" ORDER BY `name` ASC');
        return $q->result();
    }
}

if (!function_exists('footer_category')) {
    function footer_category()
    {
        $CI = &get_instance();
        $CI->load->database();
        $q = $CI->db->query('SELECT * FROM `categories` WHERE `status` = "1" AND `show_in_footer` = "1" ORDER BY `name` ASC');
        return $q->result();
    }
}

if (!function_exists('sub_category_list')) {
    function sub_category_list($catgory_id)
    {
        $CI = &get_instance();
        $CI->load->database();
        $q = $CI->db->query('SELECT * FROM `categories` WHERE `status` = "1" AND `parent_id` = "' . $catgory_id . '" ORDER BY `name` ASC');
        return $q->result();
    }
}

if (!function_exists('testimonials_list')) {
    function testimonials_list()
    {
        $CI = &get_instance();
        $CI->load->database();
        $q = $CI->db->query('SELECT * FROM `testimonials` WHERE `status` = "1" ORDER BY `name` ASC');
        return $q->result();
    }
}


if (!function_exists('generate_pdf')) {
    function generate_pdf($html, $filename = 'document.pdf', $output = 'I', $params = [])
    {
        $mpdf = new \Mpdf\Mpdf($params);
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename, $output);
    }
}

if (!function_exists('amount')) {
    function amount($price = "")
    {
        if (!empty($price) && is_numeric($price)) {
            $exploded = explode(".", number_format($price, 2, ".", ""));
            $int_part = $exploded[0];
            $decimal_part = $exploded[1];
            $len = strlen($int_part);
            if ($len > 3) {
                $last3 = substr($int_part, -3);
                $rest = substr($int_part, 0, $len - 3);
                $rest = preg_replace("/\B(?=(\d{2})+(?!\d))/", ",", $rest);
                $int_part = $rest . "," . $last3;
            }
            return "&#8377; " . $int_part . "." . $decimal_part;
        } else {
            return "&#8377; 0.00";
        }
    }
}

if (!function_exists('generate_unique_order_id')) {
    function generate_unique_order_id()
    {
        $uuid = date('YmdHis') . mt_rand(1000, 9999);;
        // $uuid = strtoupper(bin2hex(random_bytes(8)));
        return 'SW-' . $uuid;
    }
}

if (!function_exists('order_status')) {
    function order_status($status = "")
    {
        $return = "";
        if (!empty($status)) {
            if ($status == 'pending') {
                $return = 'Pending';
            } else if ($status == 'confirmed') {
                $return = 'Confirmed';
            } else if ($status == 'on_hold') {
                $return = 'On Hold';
            } else if ($status == 'cancelled') {
                $return = 'Cancelled';
            } else if ($status == 'failed') {
                $return = 'Failed';
            } else if ($status == 'refunded') {
                $return = 'Refunded';
            } else if ($status == 'shipped') {
                $return = 'Shipped';
            } else if ($status == 'out_for_delivery') {
                $return = 'Out for Delivery';
            } else if ($status == 'delivered') {
                $return = 'Delivered';
            } else if ($status == 'returned') {
                $return = 'Returned';
            }
        }
        return $return;
    }
}

if (!function_exists('get_user_image')) {
    function get_user_image($image_path)
    {
        if (file_exists(FCPATH . $image_path) && is_file(FCPATH . $image_path)) {
            return base_url($image_path);
        }
        return base_url('assets/images/no-user.png');
    }
}
