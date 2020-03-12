<?php
class M_Kelas extends CI_Model{
	public function gKelas($jur){
		$cek = $this->db->select()->from('kelas')->where('jurusan',$jur)->get();
		return $cek;
	}
	public function gKelasK($kls){
		$cek = $this->db->select()->from('kelas')->where('kelas',$kls)->get();
		return $cek;
	}
	public function gKelasA(){
		$get = $this->db->select()->from('kelas')->get();
		return $get;
	}
}
