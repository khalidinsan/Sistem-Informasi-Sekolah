<?php

class Jurusan extends CI_Controller{
	public function index(){
		$data['page'] = 'jurusan';
		$data['title'] = 'Paket Keahlian';
		$data['a'] = "gAll";
		$data['b'] = $this->m_jurusan->gJurusanA()->result();
		$this->load->view('jurusan',$data);
	}
	public function p($kode){
		$data['page'] = 'jurusan';
		$cek = $this->m_jurusan->gJurusan($kode)->num_rows();
		if(isset($kode) && $cek!==0){
			$data['a'] = "gJur";
			$data['c'] = $this->m_jurusan->gJurusan($kode)->row();
			$data['s'] = $this->m_jurusan->gStaf($data['c']->icon)->result();
			$data['title'] = $data['c']->nama;
			$data['page2'] = $data['c']->kode;
			$this->load->view('jurusan',$data);
		}else{
			redirect('beranda');
		}
	}
}
