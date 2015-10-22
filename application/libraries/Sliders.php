<?php

class Sliders{

	private $CI;
	
	function __construct(){
		$this->CI = & get_instance();
	}

	function getSlidesByType($type="slide"){
		$this->CI->db->select('s.sliderid, s.linkto, s.ordering, s.type, sd.title, sd.languageid, sd.caption, sd.description, sd.imageurl');
		$this->CI->db->from('SLIDERS s');
		$this->CI->db->join('SLIDERDETAIL sd', 's.sliderid = sd.sliderid');
		$this->CI->db->where('sd.languageid', lang('lang_id')); //$this->CI->input->cookie("LANGUAGE_ID") || 
		$this->CI->db->where('s.type', $type);
		$this->CI->db->order_by('s.ordering', 'desc');
		if($type=="subslide"){
			$this->CI->db->limit(2);
		}else if($type=="feature"){
			$this->CI->db->limit(3);
		}
		$query = $this->CI->db->get();
		return $query->result();
	}
}
?>