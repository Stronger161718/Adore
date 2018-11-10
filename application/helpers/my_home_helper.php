<?php
defined('BASEPATH') OR exit('No direct script access allowed');


	function uploads()
	{
		return base_url().'admin/web/uploads/';
	}
	function getlogo()
	{
		$CI =& get_instance();
		$logo_q = $CI->db->query("SELECT img FROM content WHERE menu = 'logo' AND isDel = '0' AND isrun = '0'; ");
		$logo = $logo_q->row_array();
		return $logo['img'];
	}
	function getcpfl()
	{
		$CI =& get_instance();
		$cpfl_q = $CI->db->query("SELECT id,cpfl FROM cpfl WHERE isdel = '0' AND isrun = '0' and type='1' order by id asc; ");
		$cpfl=[];
		foreach ($cpfl_q->result() as $row)
		{
			$cpfl[$row->id]=$row->cpfl;
		}
		return $cpfl;
	}
	function getqxzb()
	{
		$CI =& get_instance();
		$cpfl_q = $CI->db->query("SELECT id,cpfl FROM cpfl WHERE isdel = '0' AND isrun = '0' and type='2' order by id asc; ");
		$cpfl=[];
		foreach ($cpfl_q->result() as $row)
		{
			$cpfl[$row->id]=$row->cpfl;
		}
		return $cpfl;
	}