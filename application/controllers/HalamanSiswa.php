<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HalamanSiswa extends CI_Controller {

	public function index(){
		$data['title'] = "Halaman Siswa";
		$this->load->view('halaman/siswa/beranda',$data);	
	}

}
