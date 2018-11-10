<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$banner_query=$this->db->query("SELECT * FROM content WHERE menu='banner' and isdel = '0' AND isrun = '0' order by id asc; ");
		$zxdt_query=$this->db->query("SELECT * FROM content WHERE menu='zxdt' and isdel = '0' AND isrun = '0' order by id asc; ");
		$cpzx_query=$this->db->query("SELECT * FROM content WHERE menu='cpzx' and isdel = '0' AND isrun = '0' order by id asc; ");
		$cpzx=$cpzx_query->result();
		$foot_query=$this->db->query("SELECT * FROM content WHERE menu='foot' and isdel = '0' AND isrun = '0' order by id asc; ");
		$foot=$foot_query->result()[0];
		$this->load->view('index',
		[
			'banner_query'=>$banner_query,
			'zxdt_query'=>$zxdt_query,
			'cpzx'=>$cpzx,
			'foot'=>$foot,
		]);
	}
	public function cpzx($id=null,$page=1)
	{
		if($id==null){
			$id_query=$this->db->query("SELECT * FROM cpzx WHERE isdel = '0' AND isrun = '0' order by id asc limit 1 ; ");
			$id=$id_query->result()[0]->id;
		}
		$cpzx_query=$this->db->query("SELECT * FROM cpzx WHERE cpfl='".$id."' and isdel = '0' AND isrun = '0' order by id asc limit ". 8*($page-1).",". 8*$page."; ");
		$cpzx=$cpzx_query->result();
		$cpzx_count_query=$this->db->query("SELECT count(*) as count FROM cpzx WHERE cpfl='".$id."' and isdel = '0' AND isrun = '0' ;");
		$cpzx_count=ceil(($cpzx_count_query->result()[0]->count)/8);
		$foot_query=$this->db->query("SELECT * FROM content WHERE menu='foot' and isdel = '0' AND isrun = '0' order by id asc; ");
		$foot=$foot_query->result()[0];
		$cpfl_img_query=$this->db->query("SELECT * FROM cpfl WHERE id = '".$id."'; ");
		$cpfl_img=$cpfl_img_query->result()[0];
		$this->load->view('cpzx',
		[
			'page'=>$page,
			'cpfl_img'=>$cpfl_img,
			'id'=>$id,
			'cpzx_count'=>$cpzx_count,
			'cpzx'=>$cpzx,
			'foot'=>$foot,
		]);
	}
	public function qxzb($id=null,$page=1)
	{
		if($id==null){
			$id_query=$this->db->query("SELECT * FROM cpzx WHERE isdel = '0' AND isrun = '0' order by id asc limit 1 ; ");
			$id=$id_query->result()[0]->id;
		}
		$cpzx_query=$this->db->query("SELECT * FROM cpzx WHERE cpfl='".$id."' and isdel = '0' AND isrun = '0' order by id asc limit ". 8*($page-1).",". 8*$page."; ");
		$cpzx=$cpzx_query->result();
		$cpzx_count_query=$this->db->query("SELECT count(*) as count FROM cpzx WHERE cpfl='".$id."' and isdel = '0' AND isrun = '0' ;");
		$cpzx_count=ceil(($cpzx_count_query->result()[0]->count)/8);
		$foot_query=$this->db->query("SELECT * FROM content WHERE menu='foot' and isdel = '0' AND isrun = '0' order by id asc; ");
		$foot=$foot_query->result()[0];
		$cpfl_img_query=$this->db->query("SELECT * FROM cpfl WHERE id = '".$id."'; ");
		$cpfl_img=$cpfl_img_query->result()[0];
		$this->load->view('qxzb',
		[
			'page'=>$page,
			'cpfl_img'=>$cpfl_img,
			'id'=>$id,
			'cpzx_count'=>$cpzx_count,
			'cpzx'=>$cpzx,
			'foot'=>$foot,
		]);
	}
	public function details($id)
	{
		$cpzx_query=$this->db->query("SELECT * FROM cpzx WHERE id='".$id."' ");
		$cpzx=$cpzx_query->result()[0];
		$cpps_query=$this->db->query("SELECT * FROM cpps WHERE mid='".$id."' and isdel = '0' AND isrun = '0' ;");
		$cpps=$cpps_query->result();
		$cpxx_query=$this->db->query("SELECT * FROM cpxx WHERE mid='".$id."' and isdel = '0' AND isrun = '0' ;");
		$cpxx=$cpxx_query->result();
		$foot_query=$this->db->query("SELECT * FROM content WHERE menu='foot' and isdel = '0' AND isrun = '0' order by id asc; ");
		$foot=$foot_query->result()[0];
		$this->load->view('details',
		[
			'id'=>$id,
			'cpzx'=>$cpzx,
			'cpxx'=>$cpxx,
			'cpps'=>$cpps,
			'foot'=>$foot,
		]);
	}
	public function qydt()
	{
		$qydt_query=$this->db->query("SELECT * FROM news WHERE type='1' and isdel = '0' AND isrun = '0' order by date desc limit 6;");
		$qydt=$qydt_query->result();
		$foot_query=$this->db->query("SELECT * FROM content WHERE menu='foot' and isdel = '0' AND isrun = '0' order by id asc; ");
		$foot=$foot_query->result()[0];
		$qydt_banner_img_query=$this->db->query("SELECT * FROM xwss_img WHERE type='0' ;");
		$qydt_banner_img=$qydt_banner_img_query->result()[0];
		$this->load->view('qydt',
		[
			'qydt_banner_img'=>$qydt_banner_img,
			'qydt'=>$qydt,
			'foot'=>$foot,
		]);
	}
	public function hyxw()
	{
		$qydt_query=$this->db->query("SELECT * FROM news WHERE type='2' and isdel = '0' AND isrun = '0' order by date desc limit 6;");
		$qydt=$qydt_query->result();
		$foot_query=$this->db->query("SELECT * FROM content WHERE menu='foot' and isdel = '0' AND isrun = '0' order by id asc; ");
		$foot=$foot_query->result()[0];
		$qydt_banner_img_query=$this->db->query("SELECT * FROM xwss_img WHERE type='1' ;");
		$qydt_banner_img=$qydt_banner_img_query->result()[0];
		$this->load->view('hyxw',
		[
			'qydt_banner_img'=>$qydt_banner_img,
			'qydt'=>$qydt,
			'foot'=>$foot,
		]);
	}
	public function news($id)
	{
		$news_query=$this->db->query("SELECT * FROM news WHERE id='".$id."'");
		$news=$news_query->result()[0];
		//var_dump($news);
		$foot_query=$this->db->query("SELECT * FROM content WHERE menu='foot' and isdel = '0' AND isrun = '0' order by id asc; ");
		$foot=$foot_query->result()[0];
		$this->load->view('news',
		[
			'news'=>$news,
			'foot'=>$foot,
		]);
	}
	public function xsmd()
	{
		$foot_query=$this->db->query("SELECT * FROM content WHERE menu='foot' and isdel = '0' AND isrun = '0' order by id asc; ");
		$foot=$foot_query->result()[0];
		if($_POST){
			$areas_query=$this->db->query("SELECT * FROM areas WHERE area='".$_POST['area3']."';");
			$areas=$areas_query->result()[0]->areaid;			
			$zsjm_query=$this->db->query("SELECT * FROM zsjm WHERE xq='".$areas."';");
			$zsjm=$zsjm_query->result();
			$this->load->view('xsmd',
			[
				'zsjm'=>$zsjm,
				'foot'=>$foot,
			]);
		}else{
			$this->load->view('xsmd',
			[
				'zsjm'=>array(),
				'foot'=>$foot,
			]);
		}
	}
	public function join()
	{
		$massage=0;
		if($_POST){
			$data=$_POST;
			$str='';
			foreach($_POST['qd'] as $key=>$value){
				$str=$str.'|'.$value;
			}
			$data['qd']=$str;
			$this->db->insert('join', $data);
			$massage=1;
		}
		$foot_query=$this->db->query("SELECT * FROM content WHERE menu='foot' and isdel = '0' AND isrun = '0' order by id asc; ");
		$foot=$foot_query->result()[0];
		$this->load->view('join',
		[
			'massage'=>$massage,
			'foot'=>$foot,
		]);
	}
	public function zsjm()
	{
		$foot_query=$this->db->query("SELECT * FROM content WHERE menu='foot' and isdel = '0' AND isrun = '0' order by id asc; ");
		$foot=$foot_query->result()[0];
		$this->load->view('zsjm',
		[
			'foot'=>$foot,
		]);
	}
	public function ljwm()
	{
		$ljwmsp_query=$this->db->query("SELECT * FROM content WHERE menu='ljwmsp' and isdel = '0' AND isrun = '0' order by id asc; ");
		$ljwmsp=$ljwmsp_query->result()[0];
		$ppgs_query=$this->db->query("SELECT * FROM content WHERE menu='ppgs' and isdel = '0' AND isrun = '0' order by id asc; ");
		$ppgs=$ppgs_query->result()[0];
		$ljwm_query=$this->db->query("SELECT * FROM content WHERE menu='ljwm' and isdel = '0' AND isrun = '0' order by id asc; ");
		$ljwm=$ljwm_query->result()[0];
		
		$foot_query=$this->db->query("SELECT * FROM content WHERE menu='foot' and isdel = '0' AND isrun = '0' order by id asc; ");
		$foot=$foot_query->result()[0];
		$this->load->view('ljwm',
		[
			'ljwmsp'=>$ljwmsp,
			'ppgs'=>$ppgs,
			'ljwm'=>$ljwm,
			'foot'=>$foot,
		]);
	}
	
}
