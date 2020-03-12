<?php
class Berita extends CI_Controller{
	public function index($offset=NULL){
		$data['page'] = 'berita';
		$config['base_url'] = base_url('berita/index');
		$config['total_rows'] = $this->m_berita->gBeritaA()->num_rows();
		$config["per_page"] = 5;
		$config["uri_segment"] = 3;
		$config['suffix'] = !empty($uri['berita']) ? '/berita/'. $uri['berita'] : '.html'; 
		$config['full_tag_open'] = '<hr class="batas"><div class="pagination"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="paginate_button">';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="paginate_button">';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li class="paginate_button">';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li class="paginate_button">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li  class="paginate_button active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li  class="paginate_button">';
		$config['num_tag_close'] = '</li>';
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['offset'] = $offset;
		$data["results"] = $this->m_berita->gBeritaP($config["per_page"], $offset);
		$this->pagination->initialize($config);
		$data["links"] = $this->pagination->create_links();
		$data['title'] = 'Berita';
		$data['b'] = $this->m_berita->gBeritaA()->result();
		$data['hotnews'] = $this->m_berita->gHotNews()->result();
		$data['kategori'] = $this->m_berita->gKategori()->result();
		$this->load->view('berita/berita',$data);
	}

	public function view($id){
	if(isset($id)){
	$peler = $this->m_berita->gBerita($id)->num_rows();
	if($peler==1){
			$data['page'] = 'berita';
			$data['b'] = $this->m_berita->gBerita($id)->row();
			$data['komen'] = $this->m_berita->gKomentar($data['b']->id_berita)->result();
			$data['ckomen'] = $this->m_berita->gKomentar($data['b']->id_berita)->num_rows();
			$data['title'] = $data['b']->judul;
			$tag = $data['b']->label;
			$data['tag'] = explode(',', $tag);
			$data['nberita'] = $this->m_berita->gNextBerita($data['b']->id_berita)->row();
			$data['pberita'] = $this->m_berita->gPrevBerita($data['b']->id_berita)->row();
			$data['cnberita'] = $this->m_berita->gNextBerita($data['b']->id_berita)->num_rows();
			$data['cpberita'] = $this->m_berita->gPrevBerita($data['b']->id_berita)->num_rows();
			$data['hotnews'] = $this->m_berita->gHotNews()->result();
			$data['kategori'] = $this->m_berita->gKategori()->result();
			$this->load->view('berita/vberita',$data);
	}else{
		echo'BERITA TIDAK DITEMUKAN';
	}
	}else{
		redirect('berita');
	}
	}

	public function post_komen(){
		if(isset($_POST['komen'])){
			$id_berita = $this->input->post('id_berita');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$isi = $this->input->post('isi');
			$date = date('Y-m-d');
			$time = date('H:i:s');
			$data = array(
						'id_berita' => $id_berita,
						'nama' => $nama,
						'email' => $email,
						'isi' => $isi,
						'date' => $date,
						'time' => $time,
						'approve' => 'N'
						);
			$in = $this->m_berita->iKomentar($data);
			$l = $this->db->insert_id();
			if ($in) {
				$this->session->set_flashdata('pesan', '<div id="alert-komen" class="alert alert-biru alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-check"></i> <b>Terima kasih atas komentar anda, silahkan menunggu persetujuan Admin untuk menampilkan komentar anda</b>
                  </div>');
				redirect(site_url('berita/view/'.$id_berita.'').'#alert-komen');
			}else{
				echo'cacad';
			}
		}
	}

	public function cari(){
		$data['page'] = 'berita';
		$data['key'] = $this->input->get('keyword');
		if (empty($data['key'])){
			redirect('berita');
		}else{
			$data['title'] = 'Cari Berita';
			$data['b'] = $this->m_berita->gSearchBerita($data['key'])->result();
			$data['cb'] = $this->m_berita->gSearchBerita($data['key'])->num_rows();
			$data['hotnews'] = $this->m_berita->gHotNews()->result();
			$data['kategori'] = $this->m_berita->gKategori()->result();
			$this->load->view('berita/searchresult',$data);
		}
	}	

	public function label($id){
		if(isset($id)){
			$data['page'] = 'berita';
			$data['b'] = $this->m_berita->gNewsFromLabel($id)->result();
			$data['c'] = $this->m_berita->gLabelFromID($id)->row();
			$data['cb'] = $this->m_berita->gNewsFromLabel($id)->num_rows();
			$data['title'] = $data['c']->nama;
			$data['hotnews'] = $this->m_berita->gHotNews()->result();
			$data['kategori'] = $this->m_berita->gKategori()->result();
			$this->load->view('berita/searchlabel',$data);
		}else{
			redirect('berita');
		}
	}
}
