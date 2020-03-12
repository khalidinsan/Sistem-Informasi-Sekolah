<?php
class Mitra extends CI_Controller{
	public function index(){
		$data['title'] = 'Mitra Kerja';
		$data['page'] = 'mitra';
		$data['mitra'] = $this->m_admin->gMitra()->result();
		$this->load->view('mitra',$data);
	}
}
