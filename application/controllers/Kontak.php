<?php
class Kontak extends CI_Controller{
	public function index(){
		$data['page'] = 'kontak';
		$data['title'] = 'Kontak';
		$this->load->view('kontak',$data);
	}

	public function post_krisar(){
		if(isset($_POST['kirim'])){
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$subjek = $this->input->post('subjek');
			$isi = $this->input->post('isi');
			$date = date('Y-m-d');
			$time = date('H:i:s');
			$data = array(
						'nama' => $nama,
						'email' => $email,
						'subject' => $subjek,
						'isi' => $isi,
						'date' => $date,
						'time' => $time
						);
			$in = $this->m_kontak->iKrisar($data);
			if($in){
				$this->session->set_flashdata('pesan', '<div class="alert alert-biru alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-check"></i> Terima Kasih, kami akan membalas secepatnya
                  </div>');
				redirect('kontak');
			}else{
				echo'Proses Gagal';
			}
		}
	}
}
