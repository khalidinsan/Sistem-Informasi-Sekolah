<?php
class M_Kontak extends CI_Model{
	public function iKrisar($data){
		$in = $this->db->insert('krisar',$data);
		return $in;

	}
}
