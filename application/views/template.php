<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('component/header');
$this->load->view('component/layout');
$this->load->view('component/sidebar');
echo $content;
$this->load->view('component/footer');
?>
