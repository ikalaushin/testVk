<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * base_layout.php
 * Created by PhpStorm.
 * Created at 12.05.2019 14:19 as part of test project
 * @author    : ikalaushin
 * @copyright 2013-2019 YOU GLOBAL LTD
 */

/**
 * @var array $layoutParams
 * @var string $contents
 */
$this->load->view('/common/header', $layoutParams);

echo $contents ;

$this->load->view('/common/footer', $layoutParams);
