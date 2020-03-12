<?php
class Direktori extends CI_Controller{
	public function index(){
		redirect('beranda');
	}

	public function siswa($sort="null"){
        $data['page'] = 'siswa';
		$data['s'] = $sort;
		if ($sort=='null'){
			redirect('direktori/siswa/j');
		}else{
		  $data['a'] = $this->m_jurusan->gJurusanA();
		  $data['c'] = $data['a']->result();
		  $data['title'] = 'Direktori Siswa';
		  $this->load->view('direktori/siswa',$data);
		}
	}

    public function export_siswa($kelas){
        $kls = str_replace("-", " ", $kelas);
        $kelass = $this->m_kelas->gKelasK($kls)->row();
        $data['kelas'] = $kelass->kelas;
        $jur = $this->m_jurusan->gJurusan($kelass->jurusan)->row();
        $data['jurusan'] = $jur->nama;
        $data['siswa'] = $this->m_siswa->gSiswaFromKls($kls)->result();
        $this->load->view('direktori/export_siswa',$data);
    }

	public function kelas($kls){
        $data['page'] = 'siswa';
        $z = str_replace("-"," ",$kls);
		$data['a'] = $this->m_siswa->gSiswaFromK($z)->order_by('nama')->get()->result();
		$data['b'] = $this->m_siswa->gSiswaFromK($z)->get()->num_rows();
		$data['title'] = $kls;
		$this->load->view('direktori/kelas',$data);
	}

    public function datatables_ajax(){
    	if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
    		!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
    		strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    		$datatables  = $_POST;
            $datatables['table']    = 'siswa';
    		$datatables['id-table'] = '*';
    		$datatables['col-display'] = array(
            	    		               'nisn',
            	    		               'nis',
            	    		               'nama',
            	    		               'jk',
            	    		               'kelas'
            	    		             );
	    	$this->m_general->DataSiswaA($datatables);
    	}
    	return;
    } 

    public function datatables_ajax_ptk(){
    	if(
    		isset($_SERVER['HTTP_X_REQUESTED_WITH']) && 
    		!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
    		strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
    		)
    	{
    		$datatables  = $_POST;
            $datatables['table']    = 'ptk';
    		$datatables['id-table'] = '*';
    		$datatables['col-display'] = array(
            	    		               'nip',
            	    		               'nama',
            	    		               'jabatan'
            	    		             );
	    	$this->m_siswa->DataSiswaA($datatables);
    	}
    	return;
    }
	public function ptk(){
        $data['page'] = 'ptk';
		$data['title'] = "Direktori PTK";
		$this->load->view('direktori/ptk',$data);

	}
}
