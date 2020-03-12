<?php
	class Admin extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $user = $this->session->userdata('user');
            if(!$user){
                redirect('admin_masuk');
            }
        }
		public function index(){
            $user = $this->session->userdata('user');
            $data['u'] = $this->m_admin->cUser($user)->row();
            $data['pesan'] = $this->m_admin->gPesanA()->num_rows();
            $data['pos'] = $this->m_berita->gBeritaA()->num_rows();
            $data['page'] = "dasbor";
			$data['title'] = "Dasbor";
			$this->load->view('admin/dashboard',$data);
		}
		public function keluar(){
			$this->session->set_flashdata('pesan','
				  <div class="callout callout-info">
                    <p>Anda berhasil keluar </p>
                  </div>');
			$this->session->unset_userdata('user');
			redirect('admin_masuk');
		}
		public function siswa(){
            $data['page'] = "siswa";
			$data['title'] = 'Data Siswa';
			$data['kelas'] = $this->m_kelas->gKelasA()->result();
			$this->load->view('admin/siswa',$data);
		}
		public function siswa_list(){
        $list = $this->m_admin_siswa->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $person->nisn;
            $row[] = $person->nis;
            $row[] = $person->nama;
            $row[] = $person->jk;
            $row[] = $person->kelas;
            $row[] = '<a class="btn btn-sm btn-biru btn-flat" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".      $person->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
                      <a class="btn btn-sm btn-danger btn-flat" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_admin_siswa->count_all(),
                        "recordsFiltered" => $this->m_admin_siswa->count_filtered(),
                        "data" => $data,
                    );
        echo json_encode($output);
    }
 
    public function siswa_edit($id){
        $data = $this->m_admin_siswa->get_by_id($id);
        echo json_encode($data);
    }
 
    public function siswa_add(){
        $data = array(
                'nisn' => $this->input->post('nisn'),
                'nis' => $this->input->post('nis'),
                'nama' => $this->input->post('nama'),
                'jk' => $this->input->post('jk'),
                'kelas' => $this->input->post('kelas'),
            );
        $insert = $this->m_admin_siswa->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function siswa_update(){
        $data = array(
                'nisn' => $this->input->post('nisn'),
                'nis' => $this->input->post('nis'),
                'nama' => $this->input->post('nama'),
                'jk' => $this->input->post('jk'),
                'kelas' => $this->input->post('kelas'),
            );
        $this->m_admin_siswa->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function siswa_delete($id){
        $this->m_admin_siswa->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    public function ptk(){
        $data['page'] = "ptk";
		$data['title'] = 'Data PTK';
		$this->load->view('admin/ptk',$data);
	}

	public function ptk_list(){
        $list = $this->m_admin_ptk->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $person->nip;
            $row[] = $person->nama;
            $row[] = $person->jabatan;
            $row[] = '<a class="btn btn-sm btn-biru btn-flat" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
                  <a class="btn btn-sm btn-danger btn-flat" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_admin_ptk->count_all(),
                        "recordsFiltered" => $this->m_admin_ptk->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }
 
    public function ptk_edit($id){
        $data = $this->m_admin_ptk->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ptk_add(){
        $data = array(
                'nip' => $this->input->post('nip'),
                'nama' => $this->input->post('nama'),
                'jabatan' => $this->input->post('jabatan'),
            );
        $insert = $this->m_admin_ptk->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ptk_update(){
        $data = array(
                'nip' => $this->input->post('nip'),
                'nama' => $this->input->post('nama'),
                'jabatan' => $this->input->post('jabatan'),
            );
        $this->m_admin_ptk->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ptk_delete($id){
        $this->m_admin_ptk->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    public function jurusan(){
        $data['page'] = "jurusan";
        $data['title'] = "Data Jurusan";
        $this->load->view('admin/jurusan',$data);
    }
    public function jurusan_list(){
        $this->load->helper('url');
        $list = $this->m_admin_jurusan->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $person->kode;
            $row[] = $person->nama;
            if($person->logo)
                $row[] = '<a href="'.base_url('assets/images/jurusan/'.$person->logo).'" target="_blank"><img src="'.base_url('assets/images/jurusan/'.$person->logo).'" style="width:100%" /></a>';
            else
                $row[] = '(Belum ada Logo)';
            $row[] = '<a target="blank" class="btn btn-sm btn-success btn-flat" href="'.site_url('jurusan/p/'.$person->kode.'').'" title="Lihat"><i class="fa fa-eye"></i> Lihat</a>
            <a class="btn btn-sm btn-biru btn-flat" href="'.site_url('admin/ubah_jurusan/'.$person->id.'').'" title="Ubah"><i class="fa fa-pencil"></i> Ubah</a>
                  <a class="btn btn-sm btn-danger btn-flat" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="fa fa-trash"></i> Hapus</a>';
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_admin_jurusan->count_all(),
                        "recordsFiltered" => $this->m_admin_jurusan->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }
 
 
    public function jurusan_delete($id){
        $person = $this->m_admin_jurusan->get_by_id($id);
        $this->m_admin_jurusan->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    public function tambah_jurusan(){
        $data['page'] = "jurusan";
        $data['title'] = "Tambah Data Jurusan";
        $this->load->view('admin/t_jurusan',$data);
    }

    public function insert_jurusan(){
        if(isset($_POST['tambah'])){
            $kode = $this->input->post('kode');
            $nama = $this->input->post('nama');
            $icon = $this->input->post('icon');
            $visi = $this->input->post('visi');
            $m = $this->input->post('misi');
            $f = $this->input->post('fasilitas');
            $k = $this->input->post('kompetensi');
            $misi = str_replace("\n","|",$m);
            $fasilitas = str_replace("\n","|",$f);
            $kompetensi = str_replace("\n","|",$k);
            $logo = $_FILES['logo']['name'];
            $img = $_FILES['img']['name'];
            $struktur = $_FILES['struktur']['name'];
            $path = 'assets/uploads/jurusan/'.$kode.'/';
               if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
            $config['upload_path'] = $path;   
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '0';          
            $config['overwrite'] = false;
            $this->load->library('upload', $config);
            if ($logo !== ""){
                $this->upload->do_upload('logo');
                $upload_data1 = $this->upload->data();
                $img_logo = $kode.'/'.$upload_data1['file_name'];
            }else{
                $img_logo = ""; 
            }
            if ($img !== ""){
                $this->upload->do_upload('img');
                $upload_data2 = $this->upload->data();
                $img_img = $kode.'/'.$upload_data2['file_name'];
            }else{
                $img_img = "";
            }
            if ($struktur !== ""){
                $this->upload->do_upload('struktur');
                $upload_data3 = $this->upload->data();
                $img_struktur = $kode.'/'.$upload_data3['file_name'];
            }else{
                $img_struktur = "";
            }
            $data = array(
                        'kode' => $kode,
                        'nama' => $nama,
                        'icon' => $icon,
                        'visi' => $visi,
                        'misi' => $misi,
                        'fasilitas' => $fasilitas,
                        'kompetensi' => $kompetensi,
                        'logo' => $img_logo,
                        'img' => $img_img,
                        'struktur' => $img_struktur,
                        );
            $in = $this->m_admin_jurusan->iJurusan($data);
            if ($in){
                $this->session->set_flashdata('alert','swal("Berhasil", "Data Berhasil Disimpan!", "success");');
                redirect('admin/jurusan');
            }else{
                echo'gagal';
            }
        }

    }
    public function ubah_jurusan($id){
        if(isset($id)){
            $data['page'] = "jurusan";
            $data['title'] = "Ubah Jurusan";
            $data['hasil'] = $this->m_admin_jurusan->gJurusanFromID($id)->row();
            $this->load->view('admin/e_jurusan',$data);
        }else{
            redirect('admin/jurusan');
        }
    }    
    public function update_jurusan(){
        if(isset($_POST['ubah'])){
            $id = $this->input->post('id');
            $kode = $this->input->post('kode');
            $nama = $this->input->post('nama');
            $icon = $this->input->post('icon');
            $visi = $this->input->post('visi');
            $l = $this->input->post('l');
            $i = $this->input->post('i');
            $s = $this->input->post('s');
            $m = $this->input->post('misi');
            $f = $this->input->post('fasilitas');
            $k = $this->input->post('kompetensi');
            $misi = str_replace("\n","|",$m);
            $fasilitas = str_replace("\n","|",$f);
            $kompetensi = str_replace("\n","|",$k);
            $logo = $_FILES['logo']['name'];
            $img = $_FILES['img']['name'];
            $struktur = $_FILES['struktur']['name'];
            $path = 'assets/images/jurusan/'.$kode.'/';
               if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }
            $config['upload_path'] = $path;   
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '0';          
            $config['overwrite'] = false;
            $this->load->library('upload', $config);
            if ($logo !== ""){
                $this->upload->do_upload('logo');
                $upload_data1 = $this->upload->data();
                $img_logo = $kode.'/'.$upload_data1['file_name'];
            }else{
                $img_logo = $l; 
            }
            if ($img !== ""){
                $this->upload->do_upload('img');
                $upload_data2 = $this->upload->data();
                $img_img = $kode.'/'.$upload_data2['file_name'];
            }else{
                $img_img = $i;
            }
            if ($struktur !== ""){
                $this->upload->do_upload('struktur');
                $upload_data3 = $this->upload->data();
                $img_struktur = $kode.'/'.$upload_data3['file_name'];
            }else{
                $img_struktur = $s;
            }
            $data = array(
                        'kode' => $kode,
                        'nama' => $nama,
                        'icon' => $icon,
                        'visi' => $visi,
                        'misi' => $misi,
                        'fasilitas' => $fasilitas,
                        'kompetensi' => $kompetensi,
                        'logo' => $img_logo,
                        'img' => $img_img,
                        'struktur' => $img_struktur,
                        );
            $where = array('id' => $id);
            $in = $this->m_admin_jurusan->eJurusan($data,$where);
            if ($in){
                $this->session->set_flashdata('alert','swal("Berhasil", "Data Berhasil Disimpan!", "success");');
                redirect('admin/jurusan');
            }else{
                echo'gagal';
            }
        }

    }
    
    public function kelas(){
        $data['page'] = "kelas";
        $data['title'] = 'Data Kelas';
        $data['jurusan'] = $this->m_jurusan->gJurusanA()->result();
        $this->load->view('admin/kelas',$data);
    }

    public function kelas_list(){
        $list = $this->m_admin_kelas->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $person) {
            $no++;
            $jur = $this->m_jurusan->gJurusan($person->jurusan)->row();
            $row = array();
            $row[] = $no;
            $row[] = $person->tingkat;
            $row[] = $jur->nama;
            $row[] = $person->kelas;
            $row[] = '<a class="btn btn-sm btn-biru btn-flat" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
                  <a class="btn btn-sm btn-danger btn-flat" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            $data[] = $row;
        }
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_admin_kelas->count_all(),
                        "recordsFiltered" => $this->m_admin_kelas->count_filtered(),
                        "data" => $data,
                    );
        echo json_encode($output);
    }
 
    public function kelas_edit($id){
        $data = $this->m_admin_kelas->get_by_id($id);
        echo json_encode($data);
    }
 
    public function kelas_add(){
        $data = array(
                'tingkat' => $this->input->post('tingkat'),
                'jurusan' => $this->input->post('jurusan'),
                'kelas' => $this->input->post('kelas'),
            );
        $insert = $this->m_admin_kelas->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function kelas_update(){
        $data = array(
                'tingkat' => $this->input->post('tingkat'),
                'jurusan' => $this->input->post('jurusan'),
                'kelas' => $this->input->post('kelas'),
            );
        $this->m_admin_kelas->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function kelas_delete($id){
        $this->m_admin_kelas->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }

    public function galeri(){
        $data['page'] = "galeri";
        $data['title'] = "Galeri";
        $data['album'] = $this->m_admin->gAlbum()->result();
        $data['calbum'] = $this->m_admin->gAlbum()->num_rows();
        $this->load->view('admin/galeri',$data);
    }

    public function edit_galeri($id){
        if(isset($id)){
        $data = $this->m_admin->gAlbumById($id);
        echo json_encode($data);
        }else{
            redirect('admin/galeri');
        }
    }    

    public function delete_galeri($id){
        if(isset($id)){
            $a = $this->m_admin->gAlbumById($id);
            $dir = 'assets/images/galeri/'.$a->nama.'';
            $files = array_diff(scandir($dir), array('.', '..'));
            foreach ($files as $file) { 
                (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
            }
            rmdir($dir);
            $b = $this->m_admin->gFotoByAlbumId($id)->result();
            foreach ($b as $f){
                $this->m_admin->dFoto($f->id_gal);
            } 
            $del = $this->m_admin->dAlbum($id);
            echo json_encode(array("status" => TRUE));
        }else{
            redirect('admin/galeri');
        }
    }

    public function p_galeri(){
        if (isset($_POST['simpan'])){
            $method = $this->input->post('method');
                if(($method)=='add'){
                    $nama = $this->input->post('nama');
                    $data = array(
                            'nama' => $nama
                            );

                    $path = 'assets/images/galeri/'.$nama.'/';
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                    }
                    $in = $this->m_admin->iAlbum($data);
                    if ($in){
                        $this->session->set_flashdata('alert','swal("Berhasil", "Album Berhasil Disimpan!", "success");');
                        redirect('admin/galeri');
                    }else{
                        echo "Proses Gagal";
                    }
                }
                if(($method)=='update'){
                    $id = $this->input->post('id');
                    $data = array(
                            'nama' => $this->input->post('nama')
                            );
                    $where = array('id_al' => $id);
                    $in = $this->m_admin->eAlbum($data,$where);
                    if ($in){
                        $this->session->set_flashdata('alert','swal("Berhasil", "Album Berhasil Diubah!", "success");');
                        redirect('admin/galeri');
                    }else{
                        echo "Proses Gagal";
                    }
                }
        }
    }

    public function galeri_view($id){
        if(isset($id)){
            $data['page'] = "galeri";
            $data['title'] = 'Detail Album';
            $data['foto'] = $this->m_admin->gFotoByAlbumId($id)->result();
            $data['cfoto'] = $this->m_admin->gFotoByAlbumId($id)->num_rows();
            $data['album'] = $this->m_admin->gAlbumById($id);
            $this->load->view('admin/galeri_view',$data);
        }else{
            redirect('admin/galeri');
        }
    }

    public function edit_foto($id){
        $data = $this->m_admin->gFotoById($id)->row();
        echo json_encode($data);
    }
        
    public function p_foto(){
        if (isset($_POST['simpan'])){
            $method = $this->input->post('method');
                if(($method)=='add'){
                    $caption = $this->input->post('caption');
                    $album = $this->input->post('album');
                    $id_al = $this->input->post('id_al');
                    $date = date('Y-m-d');
                    $img = $_FILES['img']['name'];

                    if ($img !== ""){
                        $path = 'assets/images/galeri/'.$album.'/';
                        if (!file_exists($path)) {
                            mkdir($path, 0777, true);
                         }
                        $config['upload_path'] = $path;   
                        $config['allowed_types'] = 'jpg|png|jpeg';
                        $config['max_size'] = '0';          
                        $config['overwrite'] = false;
                        $this->load->library('upload', $config);
                        $this->upload->do_upload('img');
                        $upload_data = $this->upload->data();
                        $img_f = $path.$upload_data['file_name'];
                    }
                    $data = array(
                            'caption' => $caption,
                            'img' => $img_f,
                            'album' => $id_al,
                            'date' => $date
                            );
                    $in = $this->m_admin->iFoto($data);
                    if ($in){
                        $this->session->set_flashdata('alert','swal("Berhasil", "Foto Berhasil Simpan!", "success");');
                        redirect('admin/galeri_view/'.$id_al.'');
                    }else{
                        echo "Proses Gagal";
                    }
                }
                if(($method)=='update'){
                    $id = $this->input->post('id');
                    $caption = $this->input->post('caption');
                    $album = $this->input->post('album');
                    $id_al = $this->input->post('id_al');
                    $date = date('Y-m-d');
                    $img = $_FILES['img']['name'];
                    $i = $this->input->post('image');
                    if ($img !== ""){
                        $path = 'assets/images/galeri/'.$album.'/';
                        if (!file_exists($path)) {
                            mkdir($path, 0777, true);
                         }
                        $config['upload_path'] = $path;   
                        $config['allowed_types'] = 'jpg|png|jpeg';
                        $config['max_size'] = '0';          
                        $config['overwrite'] = false;
                        $this->load->library('upload', $config);
                        $this->upload->do_upload('img');
                        $upload_data = $this->upload->data();
                        $img_f = $path.$upload_data['file_name'];
                    }else{
                        $img_f = $i;
                    }
                    $data = array(
                            'caption' => $caption,
                            'img' => $img_f,
                            'album' => $id_al,
                            'date' => $date
                            );
                    $where = array('id_gal' => $id);
                    $in = $this->m_admin->eFoto($data,$where);
                    if ($in){
                        $this->session->set_flashdata('alert','swal("Berhasil", "Foto Berhasil Diubah!", "success");');
                        redirect('admin/galeri_view/'.$id_al.'');
                    }else{
                        echo "Proses Gagal";
                    }
                }
        }
    }   


    public function delete_foto($id){
        if(isset($id)){
            $a = $this->m_admin->gFotoById($id)->row();
            unlink($a->img);
            $del = $this->m_admin->dFoto($id);
            echo json_encode(array("status" => TRUE));
        }else{
            redirect('admin/galeri');
        }
    }

    public function berita_pos(){
        $data['page'] = "pos";
        $data['title'] = "Pos";
        $data['berita'] = $this->m_berita->gBeritaA()->result();
        $this->load->view('admin/berita/pos',$data);
    }

    public function tambah_pos(){
        $data['page'] = "pos";
        $data['title'] = "Post";
        $data['kategori'] = $this->m_berita->gKategori()->result();
        $this->load->view('admin/berita/tambah',$data);
    }

    public function update_pos(){
        if (isset($_POST['pos'])){
            $id = $this->input->post('id_berita');
            $judul = $this->input->post('judul');
            $l = $this->input->post('label');
            $isi = $this->input->post('isi');
            $t = $this->input->post('t');
            $thumbnail = $_FILES['thumbnail']['name'];
            if ($thumbnail !== ""){
                $path = 'assets/images/berita/';
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                    }
                $config['upload_path'] = $path;   
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '0';          
                $config['overwrite'] = false;
                $this->load->library('upload', $config);
                $this->upload->do_upload('thumbnail');
                $upload_data = $this->upload->data();
                $img_t = $path.$upload_data['file_name'];
            }else{
                $img_t = $t;
            }
            $la = explode(',',$l);
                foreach($la as $ll){
                    $aq = $this->m_berita->gLabelN($ll)->num_rows();
                    if ($aq == 0){
                        $data = array('nama' => $ll);
                        $this->m_admin->iLabel($data);
                    }
                    $a = $this->m_berita->gLabelN($ll)->row();
                    $aa[] = $a->id_kat;
                }
            $label = implode(",",$aa);
            $author = 'Admin';
            $data = array('judul' => $judul,
                          'isi' => $isi,
                          'label' => $label,
                          'thumbnail' => $img_t
                    );
            $where = array('id_berita' => $id);
            $in = $this->m_admin->ePos($data,$where);
            if ($in){
                $this->session->set_flashdata('pesan', '<div class="callout callout-info"><p>Pos Berhasil Diubah </p></div>');
                redirect('admin/berita_pos');
            }else{
                echo'Proses Gagal';
            }
        }
    }

    public function insert_pos(){
        if (isset($_POST['pos'])){
            $judul = $this->input->post('judul');
            $l = $this->input->post('label');
            $isi = $this->input->post('isi');
            $thumbnail = $_FILES['thumbnail']['name'];
            if ($thumbnail !== ""){
                $path = 'assets/images/berita/';
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true);
                    }
                $config['upload_path'] = $path;   
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '0';          
                $config['overwrite'] = false;
                $this->load->library('upload', $config);
                $this->upload->do_upload('thumbnail');
                $upload_data = $this->upload->data();
                $img_t = $path.$upload_data['file_name'];
            }
            $la = explode(',',$l);
                foreach($la as $ll){
                    $aq = $this->m_berita->gLabelN($ll)->num_rows();
                    if ($aq == 0){
                        $data = array('nama' => $ll);
                        $this->m_admin->iLabel($data);
                    }
                    $a = $this->m_berita->gLabelN($ll)->row();
                    $aa[] = $a->id_kat;
                }
            $label = implode(",",$aa);
            $author = 'Admin';
            $date = date('Y-m-d');
            $time = date('H:i:s');
            $data = array('judul' => $judul,
                          'isi' => $isi,
                          'date' => $date,
                          'label' => $label,
                          'lihat' => '0',
                          'author' => $author,
                          'time' => $time,
                          'thumbnail' => $img_t
                    );
            $in = $this->m_admin->iPos($data);
            if ($in){
                $this->session->set_flashdata('pesan', '<div class="callout callout-info"><p>Pos Berhasil Diterbitkan </p></div>');
                redirect('admin/berita_pos');
            }else{
                echo'Proses Gagal';
            }
        }
    }

    public function ubah_pos($id){
        if(isset($id)){
            $data['page'] = "pos";
            $data['title'] = "Ubah Pos";
            $data['kategori'] = $this->m_berita->gKategori()->result();
            $data['pos'] = $this->m_berita->gBerita($id)->row();
            $l = explode(',',$data['pos']->label);
            foreach ($l as $ll){
                $a = $this->m_berita->gLabel($ll)->row();
                $r[] = $a->nama;
            }
            $data['label'] = implode(',',$r);
            $this->load->view('admin/berita/edit',$data);
        }else{
            redirect('admin/berita_pos');
        }
    }

    public function delete_pos($id){
        $a = $this->m_berita->gBerita($id)->row();
        unlink($a->thumbnail);
        $del = $this->m_admin->dPos($id);
        $delkom = $this->m_admin->dKomentarr($id);
        $this->session->set_flashdata('pesan', '<div class="callout callout-info"><p>Pos Berhasil Dihapus </p></div>');
        redirect('admin/berita_pos');
    }

    public function berita_kategori(){
        $data['page'] = "kategori";
        $data['title'] = 'Data Kategori';
        $data['kategori'] = $this->m_berita->gKategori()->result();
        $this->load->view('admin/berita/kategori',$data);
    }
    
    public function edit_kategori($id){
        $data = $this->m_berita->gLabel($id)->row();
        echo json_encode($data);
    }    

    public function delete_kategori($id){
        $del = $this->m_admin->dLabel($id);
        echo json_encode(array("status" => TRUE));
    }

    public function p_kategori(){
        if (isset($_POST['simpan'])){
            $method = $this->input->post('method');
                if(($method)=='add'){
                    $data = array(
                            'nama' => $this->input->post('nama')
                            );
                    $in = $this->m_admin->iLabel($data);
                    if ($in){
                        $this->session->set_flashdata('alert','swal("Berhasil", "Data Berhasil Disimpan!", "success");');
                        redirect('admin/berita_kategori');
                    }else{
                        echo "Proses Gagal";
                    }
                }
                if(($method)=='update'){
                    $id = $this->input->post('id');
                    $data = array(
                            'nama' => $this->input->post('nama')
                            );
                    $where = array('id_kat' => $id);
                    $in = $this->m_admin->eLabel($data,$where);
                    if ($in){
                        $this->session->set_flashdata('alert','swal("Berhasil", "Data Berhasil Disimpan!", "success");');
                        redirect('admin/berita_kategori');
                    }else{
                        echo "Proses Gagal";
                    }
                }
        }
    }

    public function berita_komentar(){
        $data['page'] = "komentar";
        $data['title'] = 'Data Komentar';
        $data['komenY'] = $this->m_admin->gKomentarY()->result();
        $data['komenN'] = $this->m_admin->gKomentarN()->result();
        $data['ckomenN'] = $this->m_admin->gKomentarN()->num_rows();
        $this->load->view('admin/berita/komentar',$data);
    } 

    public function delete_komentar($id){
        $del = $this->m_admin->dKomentar($id);
        echo json_encode(array("status" => TRUE));
    }

    public function agenda(){
        $data['page'] = "agenda";
        $data['title'] = 'Data Agenda';
        $data['agenda'] = $this->m_berita->gAgendaA()->result();
        $this->load->view('admin/agenda',$data);
    }

    public function p_agenda(){
        if (isset($_POST['simpan'])){
            $method = $this->input->post('method');
                if(($method)=='add'){
                    $tema = $this->input->post('tema');
                    $waktu = $this->input->post('waktu');
                    $tempat = $this->input->post('tempat');
                    $isi = $this->input->post('isi');
                    $w = explode(' - ', $waktu);
                    $start = $w['0'];
                    $end = $w['1'];
                    $s = explode(' ',$start);
                    $e = explode(' ',$end);
                    $d_s = $s['0'];
                    $d_e = $e['0'];
                    $t_s = $s['1'];
                    $t_e = $e['1'];
                    $data = array(
                            'tema' => $tema,
                            'isi' => $isi,
                            'date_s' => $d_s,
                            'date_e' => $d_e,
                            'time_s' => $t_s,
                            'time_e' => $t_e,
                            'tempat' => $tempat 
                            );
                    $in = $this->m_admin->iAgenda($data);
                    if ($in){
                        $this->session->set_flashdata('alert','swal("Berhasil", "Data Berhasil Disimpan!", "success");');
                        redirect('admin/agenda');
                    }else{
                        echo "Proses Gagal";
                    }
                }
                if(($method)=='update'){
                    $id = $this->input->post('id');
                    $tema = $this->input->post('tema');
                    $waktu = $this->input->post('waktu');
                    $tempat = $this->input->post('tempat');
                    $isi = $this->input->post('isi');
                    $w = explode(' - ', $waktu);
                    $start = $w['0'];
                    $end = $w['1'];
                    $s = explode(' ',$start);
                    $e = explode(' ',$end);
                    $d_s = $s['0'];
                    $d_e = $e['0'];
                    $t_s = $s['1'];
                    $t_e = $e['1'];
                    $data = array(
                            'tema' => $tema,
                            'isi' => $isi,
                            'date_s' => $d_s,
                            'date_e' => $d_e,
                            'time_s' => $t_s,
                            'time_e' => $t_e,
                            'tempat' => $tempat 
                            );
                    $where = array('id_agenda' => $id);
                    $in = $this->m_admin->eAgenda($data,$where);
                    if ($in){
                        $this->session->set_flashdata('alert','swal("Berhasil", "Data Berhasil Disimpan!", "success");');
                        redirect('admin/agenda');
                    }else{
                        echo "Proses Gagal";
                    }
                }
        }
    }

    public function edit_agenda($id){
        $data = $this->m_berita->gAgenda($id)->row();
        echo json_encode($data);
    }    

    public function delete_agenda($id){
        $del = $this->m_admin->dAgenda($id);
        echo json_encode(array("status" => TRUE));
    }

    public function pesan(){
        $data['page'] = "pesan";
        $data['title'] = "Pesan";
        $data['pesan'] = $this->m_admin->gPesanA()->result();
        $this->load->view('admin/pesan',$data);
    }

    public function lihat_pesan($id){
        $data = $this->m_admin->gPesan($id)->row();
        echo json_encode($data);
    }    

    public function delete_pesan($id){
        $del = $this->m_admin->dPesan($id);
        echo json_encode(array("status" => TRUE));
    }

    public function pengaturan(){
        $data['page'] = "pengaturan";
        $data['title'] = 'Pengaturan Akun';
        $this->load->view('admin/pengaturan',$data);
    }

    public function update_user(){
        if(isset($_POST['simpan'])){
            $nama = $this->input->post('nama');
            $id = $this->input->post('id');
            $data = array('nama' => $nama);
            $where = array('username' => $id);
            $up = $this->m_admin->eAdmin($data,$where);
            if($up){
                $this->session->set_flashdata('akun', '<div class="callout callout-info"><p>Data Berhasil di Perbaharui </p></div');
                redirect('admin/pengaturan');
            }else{
                $this->session->set_flashdata('akun', '<div class="callout callout-danger"><p>Terjadi Kesalahan </p></div');
                redirect('admin/pengaturan');       
            }
        }
    }

    public function update_password(){
        if(isset($_POST['simpan'])){
            $pass_l = md5($this->input->post('pass_l'));
            $pass_b = md5($this->input->post('pass_b'));
            $vpass_b = md5($this->input->post('vpass_b'));
            $id = $this->input->post('id');
            $g = $this->m_admin->cUser($id)->row();
            $old_pass = $g->password;
            if($pass_l !== $old_pass){
                $this->session->set_flashdata('pass', '<div class="callout callout-danger"><p>Kata Sandi Lama Salah </p></div>');
                redirect('admin/pengaturan');  
            }else if($pass_b !== $vpass_b){
                $this->session->set_flashdata('pass', '<div class="callout callout-danger"><p>Kata Sandi Tidak Sama </p></div>');
                redirect('admin/pengaturan');
            }else{
                $data = array('password' => $pass_b);
                $where = array('username' => $id);
                $up = $this->m_admin->eAdmin($data,$where);
                if($up){
                    $this->session->set_flashdata('pass', '<div class="callout callout-info"><p>Kata Sandi Berhasil di Perbaharui </p></div>');
                    redirect('admin/pengaturan');
                }else{
                    $this->session->set_flashdata('pass', '<div class="callout callout-danger"><p>Terjadi Kesalahan </p></div>');
                    redirect('admin/pengaturan');       
                }
            }
        }
    }

    public function backup_db($tabel=""){
        if(!empty($tabel)){
            $this->m_admin->eDB($tabel);
        }else{
            echo'Silahkan pilih Tabel';
        }
    }

    public function export_db($tabel=""){
        if(!empty($tabel)){
            $this->m_admin->eCSV($tabel);
        }else{
            echo'Silahkan pilih Tabel';
        }
    }
    
    public function accept_comment($id){
        if(isset($id)){
            $data = array('approve' => 'Y');
            $where = array('id_kom' => $id);
            $up = $this->m_admin->eKomentar($data,$where);
            if($up){
                $this->session->set_flashdata('alert','swal("Berhasil", "Komentar berhasil diterima", "success");');
                redirect('admin/berita_komentar');
            }else{
                echo "Gagal";
            }
        }
    }

}
