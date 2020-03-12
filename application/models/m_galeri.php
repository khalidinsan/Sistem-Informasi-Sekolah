<?php
class M_Galeri extends CI_Model{
	public function gGaleriA(){
		$get = $this->db->select()->from('galeri')->join('album', 'galeri.album = album.id_al')->order_by('date')->get();
		return $get;
	}

	public function gGaleri($album){
		$get = $this->db->select()->from('galeri')->join('album', 'galeri.album = album.id_al')->where('id_al',$album)->order_by('date')->get();
		return $get;
	}

	public function gAlbumA(){
		$get = $this->db->select()->from('album')->get();
		return $get;
	}

	public function gAlbum($id){
		$get = $this->db->select()->from('album')->where('id_al',$id)->get();
		return $get;
	}
}
