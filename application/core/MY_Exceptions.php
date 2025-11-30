<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Exceptions extends CI_Exceptions{

    public function show_error($heading, $message, $template = 'error_general', $status_code = 500){
        log_message('error', 'Error: ' . (is_array($message) ? implode(', ', $message) : $message));
        if ($status_code == 403 && file_exists(APPPATH . 'views/errors/html/error_403.php')) {
            $template = 'error_403';
        } elseif ($status_code == 404 && file_exists(APPPATH . 'views/errors/html/error_404.php')) {
            $template = 'error_404';
        } elseif ($status_code == 500 && file_exists(APPPATH . 'views/errors/html/error_500.php')) {
            $template = 'error_500';
        }
        return parent::show_error($heading, $message, $template, $status_code);
    }

    public function show_db_error($heading, $message){
        log_message('error', 'Database Error: ' . (is_array($message) ? implode(', ', $message) : $message));
        if (file_exists(APPPATH . 'views/errors/html/error_db.php')) {
            return parent::show_error($heading, $message, 'error_db', 500);
        }
        return parent::show_error($heading, $message, 'error_general', 500);
    }
}
