<?php
class Language extends CI_Model{

	public function findByLanguage($language='english'){
		$this->db->from("languages");
		$this->db->limit(1);
		$this->db->where('language',$language);
		return $this->db->get()->row();
	}
}
?>