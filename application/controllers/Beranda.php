<?php
defined ('BASEPATH') OR exit ('NO direct script allowed');

class Beranda extends CI_Controller{
	public function index() {
		$data['page'] = 'beranda';
		$data['title'] = 'Beranda';
		$data['b'] = $this->m_berita->gBeritaB()->result();
		$data['a'] = $this->m_berita->gAgendaB()->result();
		$this->load->view('beranda',$data);
	}
} 
