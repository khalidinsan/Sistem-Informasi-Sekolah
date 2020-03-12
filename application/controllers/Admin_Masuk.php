<?php
class Admin_Masuk extends CI_Controller{
	
		public function index(){
			$s = $this->session->has_userdata('user');
			if ($s){
				redirect('admin/index');
			}else{
				$data['title'] = "Masuk";
				$this->load->view('admin/masuk',$data);
			}
		}
		public function verifikasi(){
			if ($this->input->post('masuk')){
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_message('required', '<div class="callout callout-warning"><p>{field} masih kosong</p></div>');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$query = $this->m_admin->cLogin($username,$password);
			$cek = $query->num_rows();
				if($this->form_validation->run() == FALSE){
     				$this->load->view('admin/masuk');
   				}else{
				if ($cek == 0){
					$this->session->set_flashdata('pesan','
				  <div class="callout callout-danger">
                    <p>Nama Pengguna atau Kata Sandi Salah</p>
                  </div>');
					redirect('admin_masuk');
				}else{
					$data = array(
							'last_login_f' => $_SERVER['REMOTE_ADDR'],
							'last_login_a' => time()
							);
					$where = array('username' => $username);
					$this->m_admin->eAdmin($data,$where);
					$this->session->set_userdata('user',$username);
					redirect('admin');				}
				}
			}else{
				redirect('admin_masuk');
			}
		}
}
