<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * pagination.php
 * Created by PhpStorm.
 * Created at 10.05.2019 23:27 as part of test project
 * @author    : ikalaushin
 * @copyright 2013-2019 YOU GLOBAL LTD
 */

$config['page_query_string'] = true;
$config['query_string_segment'] = 'start_from';
$config['reuse_query_string'] = true;
$config['first_link'] = 'Первая';
$config['last_link'] = 'Последняя';
$config['full_tag_open'] = '<ul class="nav justify-content-center">';
$config['full_tag_close'] = '</ul>';
$config['first_tag_open'] = '<li class="nav-item">';
$config['first_tag_close'] = '</li>';
$config['last_tag_open'] = '<li class="nav-item">';
$config['last_tag_close'] = '</li>';
$config['prev_tag_open'] = '<li class="nav-item">';
$config['prev_tag_close'] = '</li>';
$config['next_tag_open'] = '<li class="nav-item">';
$config['next_tag_close'] = '</li>';
$config['num_tag_open'] = '<li class="nav-item">';
$config['num_tag_close'] = '</li>';
$config['cur_tag_open'] = '<li class="nav-item nav-link active">';
$config['cur_tag_close'] = '</li>';
$config['attributes'] = array('class' => 'nav-link');