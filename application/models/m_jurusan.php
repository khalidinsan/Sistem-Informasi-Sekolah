<?php
class M_Jurusan extends CI_Model{
	public function gJurusan($kode){
		$cek = $this->db->select()->from('jurusan')->where('kode',$kode)->get();
		return $cek;
	}

	public function gJurusanA(){
		$cek = $this->db->select()->from('jurusan')->get();
		return $cek;
	}

	public function gStaf($m){
		$get = $this->db->select()->from('ptk')->where('m_prod',$m)->get();
		return $get;
	}
}
