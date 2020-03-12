<?php
class Profil extends CI_Controller{
	public function index(){
		$data['page'] = 'profil';
		$data['title'] = 'Profil Sekolah';
		$this->load->view('profil',$data);
	}
}
