<?php
defined('BASEPATH') OR exit('No direct script access allowed');

abstract class MY_Controller extends CI_Controller

{
	function __construct()
    {      
        parent::__construct();
        
        $this->load->database(); //初始化数据库链接
		$this->load->helper('html');
        $this->load->library('javascript');
        $this->load->helper(array('form', 'url'));
		$this->load->helper('my_home');
    }
}