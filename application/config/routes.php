<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['lupa-password'] = 'authentication/lupa_password';
$route['recovery-password/(:any)'] = 'authentication/ubah_password/$1';

$route['aktivasi-akun'] = 'authentication/aktivasi_email';

$route['otp'] = 'authentication/otp_send';
$route['send-otp/email'] = 'authentication/send_otp_email';
$route['send-otp/sms'] = 'authentication/send_otp_sms';
$route['send-otp/wa'] = 'authentication/send_otp_wa';
$route['verifikasi-otp'] = 'authentication/verifikasi_otp';

$route['login'] = 'authentication';
$route['logout'] = 'authentication/logout';


$route['default_controller'] = 'home';
$route['404_override'] = 'utility/not_found';
$route['translate_uri_dashes'] = true;
