<?php
class Galeri extends CI_Controller{
	public function index($album=""){
		$data['page'] = 'galeri';
		$data['title'] = 'Galeri';
		$data['album'] = $album;
		$data['albuma'] = $this->m_galeri->gAlbumA()->result();
		$data['galeria'] = $this->m_galeri->gGaleriA()->result();
		$data['galeri'] = $this->m_galeri->gGaleri($album)->result();
		$data['a'] = $this->m_galeri->gAlbum($album)->row();
		$this->load->view('galeri',$data);
	}
}
