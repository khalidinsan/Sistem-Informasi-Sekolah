<?php
class M_Berita extends CI_Model{
	public function gBeritaP($limit,$offset){
		$this->db->limit($limit, $offset);
		$get = $this->db->select()->from('berita')->order_by('date','desc')->get();
		return $get->result();
	}
	public function gBeritaA(){
		$get = $this->db->select()->from('berita')->order_by('date','desc')->get();
		return $get;
	}

	public function gBeritaB(){
		$cek = $this->db->select()->from('berita')->limit('4')->order_by('date')->get();
		return $cek;
	}

	public function gBerita($id){
		$cek = $this->db->select()->from('berita')->where('id_berita',$id)->get();
		return $cek;
	}

	public function gKomentar($id){
		$cek = $this->db->select()->from('komentar')->where('id_berita',$id)->where('approve','Y')->get();
		return $cek;
	}

	public function iKomentar($data){
		$cek = $this->db->insert('komentar',$data);
		return $cek;
	}

	public function gLabel($id){
		$cek = $this->db->select()->from('kategori')->where('id_kat',$id)->get();
		return $cek;
	}

	public function gLabelN($nama){
		$cek = $this->db->select()->from('kategori')->where('nama',$nama)->get();
		return $cek;
	}

	public function gNextBerita($id){
		$get = $this->db->select()->from('berita')->where('id_berita >',$id)->limit('1')->get();
		return $get;
	}

	public function gPrevBerita($id){
		$get = $this->db->select()->from('berita')->where('id_berita <',$id)->limit('1')->get();
		return $get;
	}

	public function uView($id){
		$this->db->set('lihat', 'lihat+1', FALSE);
		$this->db->where('id_berita', $id);
		$this->db->update('berita');
	}

	public function gHotNews(){
		$get = $this->db->select()->from('berita')->order_by('lihat')->limit('4')->get();
		return $get;
	}

	public function gHotNewsB(){
		$get = $this->db->select()->from('berita')->order_by('lihat','desc')->limit('3')->get();
		return $get;
	}

	public function gKategori(){
		$get = $this->db->select()->from('kategori')->get();
		return $get;
	}

	public function gKategoriFromID($id){
		$get = $this->db->select()->from('kategori')->where('id_kat',$id)->get();
		return $get;
	}

	public function time_elapsed_string($datetime, $full = false) {
		 		 $today = time();    
                 $createdday= strtotime($datetime); 
                 $datediff = abs($today - $createdday);  
                 $difftext="";  
                 $years = floor($datediff / (365*60*60*24));  
                 $months = floor(($datediff - $years * 365*60*60*24) / (30*60*60*24));  
                 $days = floor(($datediff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));  
                 $hours= floor($datediff/3600);  
                 $minutes= floor($datediff/60);  
                 $seconds= floor($datediff);  
                 //year checker  
                 if($difftext=="")  
                 {  
                   if($years>1)  
                    $difftext=$years." tahun yang lalu";  
                   elseif($years==1)  
                    $difftext=$years." tahun yang lalu";  
                 }  
                 //month checker  
                 if($difftext=="")  
                 {  
                    if($months>1)  
                    $difftext=$months." bulan yang lalu";  
                    elseif($months==1)  
                    $difftext=$months." bulan yang lalu";  
                 }  
                 //month checker  
                 if($difftext=="")  
                 {  
                    if($days>1)  
                    $difftext=$days." hari yang lalu";  
                    elseif($days==1)  
                    $difftext=$days." hari yang lalu";  
                 }  
                 //hour checker  
                 if($difftext=="")  
                 {  
                    if($hours>1)  
                    $difftext=$hours." jam yang lalu";  
                    elseif($hours==1)  
                    $difftext=$hours." jam yang lalu";  
                 }  
                 //minutes checker  
                 if($difftext=="")  
                 {  
                    if($minutes>1)  
                    $difftext=$minutes." menit yang lalu";  
                    elseif($minutes==1)  
                    $difftext=$minutes." menit yang lalu";  
                 }  
                 //seconds checker  
                 if($difftext=="")  
                 {  
                    if($seconds>1)  
                    $difftext=$seconds." detik yang lalu";  
                    elseif($seconds==1)  
                    $difftext="Baru saja";  
                 }  
                 return $difftext;  
	}

	public function gSearchBerita($key){
		$get = $this->db->select()->from('berita')->like('judul',$key)->limit('4')->order_by('date')->get();
		return $get;
	}

	public function gAgendaA(){
		$get = $this->db->select()->from('agenda')->get();
		return $get;
	}

	public function gAgendaB(){
		$get = $this->db->select()->from('agenda')->limit('3')->get();
		return $get;
	}

	public function gAgenda($id){
		$get = $this->db->select()->from('agenda')->where('id_agenda',$id)->get();
		return $get;
	}

	public function gNewsFromLabel($id){
		$get = $this->db->query("select * from berita where FIND_IN_SET($id,label)");
		return $get;
	}

	public function gLabelFromID($id){
		$get = $this->db->select()->from('kategori')->where('id_kat',$id)->get();
		return $get;
	}
}

