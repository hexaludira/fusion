<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function check_login(){
    $CI =& get_instance();
    if (!$CI->session->userdata('user_id')) {
        redirect('auth');
    }
}