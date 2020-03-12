<?php
	class M_Admin extends CI_Model{
		public function cLogin($username,$password){
			$cek = $this->db->select()->from('acc_admin')->where('username',$username)->where('password',$password)->get();
			return $cek;
		}

		public function cUser($user){
			$cek = $this->db->select()->from('acc_admin')->where('username',$user)->get();
			return $cek;
		}

		public function gAlbum(){
			$get = $this->db->select()->from('album')->get();
			return $get;
		}

		public function gAlbumThumb($id){
			$get = $this->db->select()->from('galeri')->where('album',$id)->limit('1')->get();
			return $get;
		}

		public function gAlbumById($id){
			$get = $this->db->select()->from('album')->where('id_al',$id)->get();
			return $get->row();
		}

		public function iAlbum($data){
			$in = $this->db->insert('album',$data);
			return $in;
		}

		public function eAlbum($data,$where){
			$up = $this->db->update('album',$data,$where);
			return $up;
		}

		public function dAlbum($id){
        	$this->db->where('id_al', $id);
        	$this->db->delete('album');
		}

		public function gFotoByAlbumId($id){
			$get = $this->db->select()->from('galeri')->where('album',$id)->get();
			return $get;
		}

		public function gFotoById($id){
			$get = $this->db->select()->from('galeri')->where('id_gal',$id)->get();
			return $get;
		}

		public function iFoto($data){
			$in = $this->db->insert('galeri',$data);
			return $in;
		}

		public function eFoto($data,$where){
			$up = $this->db->update('galeri',$data,$where);
			return $up;
		}

		public function dFoto($id){
        	$this->db->where('id_gal', $id);
        	$this->db->delete('galeri');
		}

		public function iLabel($data){
			$in = $this->db->insert('kategori',$data);
			return $in;
		}

		public function eLabel($data,$where){
			$up = $this->db->update('kategori',$data,$where);
			return $up;
		}

		public function dLabel($id){
        	$this->db->where('id_kat', $id);
        	$this->db->delete('kategori');
		}

		public function iPos($data){
			$in = $this->db->insert('berita',$data);
			return $in;
		}

		public function ePos($data,$where){
			$up = $this->db->update('berita',$data,$where);
			return $up;
		}

		public function dPos($id){
        	$this->db->where('id_berita', $id);
        	$this->db->delete('berita');
		}

		public function gKomentar(){
			$get = $this->db->select()->from('komentar')->get();
			return $get;
		}

		public function gKomentarY(){
			$get = $this->db->select()->from('komentar')->where('approve','Y')->get();
			return $get;
		}

		public function gKomentarN(){
			$get = $this->db->select()->from('komentar')->where('approve','N')->get();
			return $get;
		}

		public function eKomentar($data,$where){
			$up = $this->db->update('komentar',$data,$where);
			return $up;
		}

		public function dKomentar($id){
        	$this->db->where('id_kom', $id);
        	$this->db->delete('komentar');
		}

		public function dKomentarr($id){
        	$this->db->where('id_berita', $id);
        	$this->db->delete('komentar');
		}

		public function iAgenda($data){
			$in = $this->db->insert('agenda',$data);
			return $in;
		}

		public function eAgenda($data,$where){
			$up = $this->db->update('agenda',$data,$where);
			return $up;
		}

		public function dAgenda($id){
        	$this->db->where('id_agenda', $id);
        	$this->db->delete('agenda');
		}

		public function gPesanA(){
			$get = $this->db->select()->from('krisar')->order_by('date')->get();
			return $get;
		}

		public function gPesan($id){
			$get = $this->db->select()->from('krisar')->where('id',$id)->get();
			return $get;
		}

		public function dPesan($id){
        	$this->db->where('id', $id);
        	$this->db->delete('krisar');
		}

		public function eAdmin($data,$where){
			$up = $this->db->update('acc_admin',$data,$where);
			return $up;
		}

		public function eDB($tabel){
        	$this->load->dbutil();
        	$prefs = array(
        	'tables'        => array($tabel),
        	'format'        => 'zip',
        	'filename'      => $tabel.'.sql'       
        	);
        	$r = rand(10,100);
        	if($this->db->table_exists($tabel)){
            	$backup = $this->dbutil->backup($prefs);
            	$this->load->helper('file');
            	write_file('backup_db/backup_'.$tabel.'_'.$r.'.zip', $backup);
            	$this->load->helper('download');
            	return force_download('backup_'.$tabel.'_'.$r.'.zip', $backup);
        	}else{
        		echo "Tabel <b>$tabel</b> tidak ditemukan";
            	return;
        	}
    	}
    	public function eCSV($tabel){
        	if($this->db->table_exists($tabel)){
        		$this->load->dbutil();
        		$this->load->helper('file');
        		$this->load->helper('download');
        		$delimiter = ",";
        		$newline = "\r\n";
        		$filename = "$tabel.csv";
				$enclosure = '"';
        		$query = "SELECT * FROM $tabel";
        		$result = $this->db->query($query);
        		$data = $this->dbutil->csv_from_result($result, $delimiter, $newline, $enclosure);
        		return force_download($filename, $data);
        	}else{
        		echo"gagal";
        		return;
        	}
		}

		public function gMitra(){
			$get = $this->db->select()->from('mitra')->get();
			return $get;
		}

		public function gMitraF(){
			$get = $this->db->select()->from('mitra')->limit('4')->get();
			return $get;
		}


}
