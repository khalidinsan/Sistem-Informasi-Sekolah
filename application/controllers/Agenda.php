<?php
class Agenda extends CI_Controller{
	public function index(){
		$data['page'] = 'agenda';
		$data['title'] = 'Agenda';
		$data['ag'] = $this->m_berita->gAgendaA()->result();
		$this->load->view('agendaa',$data);

	}
	public function detail($id){
		if(isset($id)){
		$data['page'] = 'agenda';
		$data['da'] = $this->m_berita->gAgenda($id)->row();
		$data['title'] = $data['da']->tema;
		$this->load->view('agenda',$data);
		}else{
			redirect('agenda');
		}
	}
}
