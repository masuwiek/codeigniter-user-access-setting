<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// general configuration
$app_dir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
$path =  realpath($_SERVER['DOCUMENT_ROOT']) . $app_dir;
$media = 'public/media/';
$media_path = $path . $media;

// Application Title
$config['website_title']		= "Senior Living D'Khayangan - Customer Relationship Management";					// Title websitenya
$config['short_app_title']		= "@D'Khayangan";
$config['footer_title']			= "2015 &copy; Senior Living D'Khayangan - Customer Relationship Management"; 		// Title untuk Footer
$config['website_login_title']	= "Admin Login. Senior Living D'Khayangan"; 					// Title websitenya login
$config['footer_login_title']	= "&copy; 2014. Senior Living D'Khayangan.";		 			// Title untuk Footer Login

// Application Logo
$config['login_logo']			= $app_dir.$media.'logo/login_logo.png';
$config['app_logo']				= $app_dir.$media.'logo/app_logo.png';

// Application & Media Path
$config['app_path']				= $path; 														// Alamat path dari aplikasi, misal: c:\xampp\htdoc\aplikasi, digunakan utk Upload
$config['media_path']			= $media_path; 													// Alamat path untuk media, misal c:\xampp\htdoc\aplikasi\media\, digunakan utk Upload

//Themes & Media URL
$config['media']				= $app_dir.$media; 												// Alamat URL media, misal http://localhost/aplikasi
$config['theme']				= $app_dir.'public/themes'; 									// Alamat URL untuk themes, misal http://localhost/aplikasi/media

// EMAIL
$config['email']				= 'info@seniorlivingdkhayangan.com';
$config['emailsms']				= 'sms@seniorlivingdkhayangan.com';

$config['email_alert']			= 'masuwiek@gmail.com';
$config['sms_alert']			= '';



// PAGINATION
$config['page']['full_tag_open']		= '<div><ul class="pagination">';
$config['page']['full_tag_close']		= '</ul></div>';
$config['page']['first_tag_open']		= '<li>';
$config['page']['first_tag_close']		= '</li>';
$config['page']['last_tag_open']		= '<li>';
$config['page']['last_tag_close']		= '</li>';
$config['page']['cur_tag_open']			= '<li class="active"><a href="#">';
$config['page']['cur_tag_close']		= '</a></li>';
$config['page']['next_tag_open']		= '<li>';
$config['page']['next_tag_close']		= '</li>';
$config['page']['next_link']			= 'Next';
$config['page']['prev_tag_open']		= '<li>';
$config['page']['prev_tag_close']		= '</li>';
$config['page']['prev_link']			= 'Prev';
$config['page']['num_tag_open']			= '<li>';
$config['page']['num_tag_close']		= '</li>';
$config['page']['use_page_numbers']		= TRUE;




